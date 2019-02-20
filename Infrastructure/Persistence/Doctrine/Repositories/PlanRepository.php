<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 2/26/17
 * Time: 12:35 AM
 */

namespace Infrastructure\Persistence\Doctrine\Repositories;

use Domain\Contracts\Repositories\PlanRepositoryContract;
use Domain\Entities\Plan;
use Infrastructure\Persistence\Doctrine\Repositories\AbstractRepository;
use Doctrine\ORM\EntityManager;

/**
 * Class ManagerRepository
 * @package Infrastructure\Doctrine\Repositories\Manager
 */
class PlanRepository extends AbstractRepository implements PlanRepositoryContract
{

    public function __construct(EntityManager $em, Plan $entity)
    {
        parent::__construct($em, $entity);
    }

}