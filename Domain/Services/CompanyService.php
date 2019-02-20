<?php
namespace Domain\Services;

use Application\Core\Exceptions\ApplicationException;
use Domain\Abstractions\AbstractDomainService;
use Domain\Contracts\Repositories\CompanyRepositoryContract;
use Domain\Contracts\Services\CompanyServiceContract;
use Domain\Entities\CNAE;
use Domain\Entities\Company;
use Domain\Entities\Manager;
use Domain\Entities\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Infrastructure\Services\Crawler\Cnpj\CnpjService;
use Infrastructure\Services\Localization\Localization;
use Domain\Contracts\Repositories\UserRepositoryContract;
use Domain\Contracts\Repositories\ManagerRepositoryContract;

class CompanyService extends AbstractDomainService  implements CompanyServiceContract
{
    private $userRepository;
    private $managerRepository;
    private $cnpjService;
    private $invalidCnpjMessage = 'Desculpe, mas o CNPJ informado não está relacionado a Pet Shop ou Veterinária. 
                        Por favor, informe CNPJ válido ou entre em contato conosco pelo contato@petdrive.com.br Obrigado.';

    public function __construct(
        CompanyRepositoryContract $repositoryContract,
        UserRepositoryContract $userRepositoryContract,
        ManagerRepositoryContract $managerRepositoryContract
    )
    {
        parent::__construct($repositoryContract);
        $this->userRepository = $userRepositoryContract;
        $this->managerRepository = $managerRepositoryContract;
        $this->cnpjService = new CnpjService();
    }

    public function create($post)
    {
        $post['slugName'] = $this->slugify($post['companyName']);
        //$post['zipcode'] = preg_replace( '/[^0-9]/', '', $post['zipcode']);
        $post['cnpj'] = preg_replace( '/[^0-9]/', '', $post['cnpj']);
        $post['telephone'] = preg_replace( '/[^0-9]/', '', $post['telephone']);

        $this->isCnpj($post['cnpj']);
        $cnae = $this->verifyCNPJ($post);

        //@TODO factory company
        $company = new Company();
        $this->repository->fillEntityWithArray($company,$post);

        $company->setCnae($cnae);
        $company->setSocialReason($post['companyName']);
        $company->setName($post['companyName']);
        $company->setContactPerson($post['contactName']);

//        $localization = new Localization();
//        $geoPoint = $localization->getGeoPointByZipCode($post['zipcode']);
//
//        $company->setLatitude($geoPoint['latitude']);
//        $company->setLongitude($geoPoint['longitude']);

        $company->setActive(1);
        $company->setCreatedAt(new \DateTime());
        $this->repository->save($company);

        //@TODO transaction for user and manager
        $user = $this->userRepository->findBy(['email'=>$post['email']]);

        if(empty($user)){
            $user = new User();
            $user->setName($company->getName());
            $user->setEmail($company->getEmail());
            $user->setPassword($post['password']);
            $user->setConfirmed(1);
            $user->setCreatedAt(new \DateTime());
            $this->userRepository->save($user);
        }

        $manager = new Manager();
        $manager->setCompany($company);
        $manager->setUser($user);
        $manager->setCreatedAt(new \DateTime());
        $this->managerRepository->save($manager);

        return $company;
    }

    public function verifyCNPJ($post)
    {
        $cnae = new CNAE();
        $companyActivity = $this->cnpjService->getPrimaryActivity($post['cnpj']);

        if(!in_array($companyActivity,$cnae->getValid())){
            $date = date('d/m/Y H:i');
            $resume = '';

            foreach ($post as $key=>$value){
                $resume .= $key .' = '.$value.'<br>';
            }

            Mail::send('email.alert', ['cnpj'=>$post['cnpj'],'activity'=>$companyActivity,'date'=>$date, 'resume'=>$resume], function ($message){
                $message->subject('CNPJ Invalido - Verificar');
                $message->from('mail@petdrive.com.br', 'Petdrive');
                $message->to('')->cc('');
            });

            throw new ApplicationException($this->invalidCnpjMessage,403);
        }

        return $companyActivity;
    }

    public function isCnpj($cnpj)
    {
        $valid = true;

        if(!ctype_digit($cnpj))
            return false;

        for ($x = 0; $x < 10; $x++) {
            if ($cnpj == str_repeat($x, 14)) {
                $valid = false;
            }
        }

        if ($valid) {
            if (strlen($cnpj) != 14) {
                $valid = false;
            } else {
                for ($t = 12; $t < 14; $t ++) {
                    $d = 0;
                    $c = 0;
                    for ($m = $t - 7; $m >= 2; $m --, $c ++) {
                        $d += $cnpj {$c} * $m;
                    }
                    for ($m = 9; $m >= 2; $m --, $c ++) {
                        $d += $cnpj {$c} * $m;
                    }
                    $d = ((10 * $d) % 11) % 10;
                    if ($cnpj {$c} != $d) {
                        $valid = false;
                        break;
                    }
                }
            }
        }

        if(!$valid){
            throw new ApplicationException('CNPJ digitado é inválido.',403);
        }
    }

    public function getCustomerPetshops($filter)
    {
        $page = 1;

        if(isset($filter['page'])){
            $page = $filter['page'];
        }

        $total = $this->repository->getTotalPetshops();
        $perPage = 10;
        $items = $this->repository->getCustomerPetshops($filter,$page);

        $response = [
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $page,
            'items' => $items
        ];

        return $response;
    }

    public function getCustomerFavoriteCompany($userId)
    {
        return $this->repository->getCustomerFavoriteCompany($userId);
    }

    public function getCompanyByUuid($uuid)
    {
        return $this->repository->findBy(['uuid'=>$uuid]);
    }

    public function update($entityId, $post)
    {
        $post['slugName'] = $this->slugify($post['name']);

        return parent::update($entityId, $post); // TODO: Change the autogenerated stub
    }
}