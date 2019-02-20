<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 3/23/17
 * Time: 5:47 PM
 */

namespace Domain\Services;

use Domain\Contracts\Repositories\ManagerRepositoryContract;
use Domain\Contracts\Services\MeServiceContract;
use Domain\Contracts\Repositories\UserRepositoryContract;

class MeService implements MeServiceContract
{
    /**
     * @var UserRepositoryContract
     */
    public $repository;

    public $managerRepository;

    /**
     * UserLoginService constructor.
     * @param UserRepositoryContract $repository
     */
    public function __construct(UserRepositoryContract $repository, ManagerRepositoryContract $managerRepositoryContract)
    {
        $this->repository = $repository;
        $this->managerRepository = $managerRepositoryContract;
    }

    public function get($userId){
        $userInfo = [];
        $user = $this->repository->find($userId);

        if(empty($user)){
            return 'User not found';
        }

        $userInfo['name'] = $user->getName();
        $userInfo['email'] = $user->getEmail();
        $userInfo['user'] = $user->getId();
        $userInfo['profile'] = !empty($user->getProfile())?$user->getProfile():'';
        $userInfo['createAt'] = $user->getCreatedAt();

        $userInfo['id'] = $user->getId();
        $userInfo['addressZipcode'] = $user->getAddressZipcode();
        $userInfo['addressStreet'] = $user->getAddressZipcode();
        $userInfo['addressDistrict'] = $user->getAddressZipcode();
        $userInfo['addressNumber'] = $user->getAddressZipcode();
        $userInfo['addressCity'] = $user->getAddressZipcode();
        $userInfo['addressState'] = $user->getAddressZipcode();
        $userInfo['oneClickBuy'] = $user->getOneClickBuy() == 1 ? true : false;
        $userInfo['cpf'] = $user->getCpf();
        $userInfo['birthday'] = $user->getBirthday();

        $manager = $this->managerRepository->findBy(['user'=>$userId]);

        if(!is_null($manager)){
            $userInfo['company'] = $manager->getCompany()->getId();
            $userInfo['companyName'] = $manager->getCompany()->getName();
        }

        return $userInfo;
    }

}