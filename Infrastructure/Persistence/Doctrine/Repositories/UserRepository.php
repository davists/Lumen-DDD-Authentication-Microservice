<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 2/26/17
 * Time: 12:35 AM
 */

namespace Infrastructure\Persistence\Doctrine\Repositories;

use Doctrine\ORM\QueryBuilder;
use Domain\Entities\User;
use Domain\Contracts\Repositories\UserRepositoryContract;
use Infrastructure\Persistence\Doctrine\Repositories\AbstractRepository;
use Doctrine\ORM\EntityManager;

/**
 * Class ManagerRepository
 * @package Infrastructure\Doctrine\Repositories\Manager
 */
class UserRepository extends AbstractRepository implements UserRepositoryContract
{
    public function __construct(EntityManager $em, User $entity)
    {
        parent::__construct($em, $entity);
    }

    public function getAll()
    {
        return $this->em->getRepository($this->entityNamespace)->findAll();
    }

    public function findUserByEmailAndPlatform($email,$platform)
    {
        $qb = $this->em->createQueryBuilder();

        $qb
            ->select('u')
            ->from($this->entityNamespace , 'u')
            ->where("u.email = '$email'");

        $this->joinPlatform($platform,$qb);

        $result = $qb->getQuery()->getResult();

        if(!empty($result)){
            $result = $result[0];
        }

        return $result;
    }

    public function joinPlatform($platform,QueryBuilder $queryBuilder)
    {
        switch ($platform){
            case 'manager':
                $queryBuilder->join('Domain\\Entities\\Manager','m','WITH','m.user=u.id');
                break;

            default:

        }
    }

    public function getAllCustomers($filter)
    {
        $companyId = $filter['__session']['companyId'];

        $qb = $this->em->createQueryBuilder();

        $dependencies = $qb->select('u')
            ->from($this->entityNamespace , 'u')
            ->join('Domain\Entities\Customer','c','WITH','c.user = u.id')
            ->where("c.company = $companyId");
            ;

        if(isset($filter['search'])){
            $term = $this->normalizeSearchTerm($filter['search']);
            $dependencies->andWhere("(   
                u.name LIKE '$term' OR u.email LIKE '$term'
            )");
        }

        return $this->getPaginatedData($dependencies,$filter);
    }

    public function clientBelongsToCompany($companyId,$userId)
    {
        $clientBelongsToCompany = false;

        $qb = $this->em->createQueryBuilder();

        $qb
            ->select('COUNT(u.id) as total')
            ->from('Domain\Entities\Customer' , 'u')
            ->where("u.company = $companyId AND u.user = $userId");

        $result = $qb->getQuery()->getResult();

        if(!empty($result)){
            $result = $result[0]['total'];

            if($result > 0){
                $clientBelongsToCompany = true;
            }
        }

        return $clientBelongsToCompany;
    }

    public function getCustomerDetail($userId)
    {
        return $this->find($userId);
    }
}