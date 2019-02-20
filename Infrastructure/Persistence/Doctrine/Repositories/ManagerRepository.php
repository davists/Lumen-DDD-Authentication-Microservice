<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 2/26/17
 * Time: 12:35 AM
 */

namespace Infrastructure\Persistence\Doctrine\Repositories;

use Domain\Contracts\Repositories\ManagerRepositoryContract;
use Domain\Entities\Manager;
use Infrastructure\Persistence\Doctrine\Repositories\AbstractRepository;
use Doctrine\ORM\EntityManager;

/**
 * Class ManagerRepository
 * @package Infrastructure\Doctrine\Repositories\Manager
 */
class ManagerRepository extends AbstractRepository implements ManagerRepositoryContract
{
    public function __construct(EntityManager $em, Manager $entity)
    {
        parent::__construct($em, $entity);
    }

    public function getManagerCompanyByUserId($userId)
    {
        $sql = "
            SELECT 
              company_id
              FROM manager
              WHERE user_id = $userId
        ";

        $manager = $this->em->getConnection()->query($sql)->fetchAll();

        if(!empty($manager)){
            $manager = $manager[0]['company_id'];
        }

        return $manager;
    }
}