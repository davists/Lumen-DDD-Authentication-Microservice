<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 3/23/17
 * Time: 5:47 PM
 */

namespace Domain\Services;

use Domain\Contracts\Repositories\ManagerRepositoryContract;
use Domain\Contracts\Services\UserLoginServiceContract;
use Domain\Contracts\Repositories\UserRepositoryContract;
use Domain\Entities\User;
use Firebase\JWT\JWT;
use Application\Core\Exceptions\ApplicationException;
use Ramsey\Uuid\Uuid; //should be domain dependency

/**
 * Class ManagerLoginService
 * @package Domain\Manager\Services
 */
class UserLoginService implements UserLoginServiceContract
{
    /**
     * @var UserRepositoryContract
     */
    public $repository;

    /**
     * @var ManagerRepositoryContract
     */
    public $managerRepository;

    /**
     * UserLoginService constructor.
     * @param UserRepositoryContract $repository
     */
    public function __construct(UserRepositoryContract $repository,ManagerRepositoryContract $managerRepositoryContract)
    {
        $this->repository = $repository;
        $this->managerRepository = $managerRepositoryContract;
    }

    /**
     * @param $email
     * @param $password
     * @return array
     */
    public function execute($post)
    {
        $email= $post['email'];
        $password = $post['password'];
        $platform = $post["platform"];//manager, customer, healthFolder, shopping
        $permanent = true;

        $user = $this->getPetdriveUser($email,$password,$platform);

        $serverName = getenv('APP_SERVER_NAME');

        $tokenData = [
            'iss'  => $serverName,       // Issuer
            'data' => [                  // Data related to the signer user
                'userId' => $user->getId(),
            ]
        ];

        $companyId = $this->managerRepository->getManagerCompanyByUserId($user->getId());
        if(!is_null($companyId)){
            $tokenData['data']['companyId'] = $companyId;
        }

        //dd($tokenData);

        $tokenData = $this->getTemporalParameters($tokenData,$permanent);

        $jwt = JWT::encode(
            $tokenData,      //Data to be encoded in the JWT
            getenv('JWT_KEY'), // The signing key
            getenv('JWT_ENCRYPT_ALGORITHM')  // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
        );

        $response['jwt']=$jwt;
        return $response;
    }

    private function verifyPassword($password, User $user)
    {
        return  password_verify($password, $user->getPassword());
    }

    public function getTemporalParameters($tokenData,$permanent)
    {
        $issuedAt   = time();
        $notBefore  = $issuedAt + 0;  //Adding 3 seconds
        $expire     = $notBefore + 3600; // Adding 1 hour

        $tokenData['iat'] = $issuedAt;         // Issued at: time when the token was generated
        $tokenData['nbf']  = $notBefore;       // Not before

        if(!$permanent){
            $tokenData['exp']  = $expire;           // Expire
        }

        return $tokenData;
    }

    public function getPetdriveUser($email,$password,$platform)
    {
        $user = $this->repository->findUserByEmailAndPlatform($email,$platform);

        if(!$user){
            throw new ApplicationException('Invalid email or password',401);
        }

        if (!$this->verifyPassword($password, $user)) {
            throw new ApplicationException('Invalid email or password',401);
        }

        return $user;
    }
}