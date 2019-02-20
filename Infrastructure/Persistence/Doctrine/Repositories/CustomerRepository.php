<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 2/26/17
 * Time: 12:35 AM
 */

namespace Infrastructure\Persistence\Doctrine\Repositories;

use Domain\Contracts\Repositories\CustomerRepositoryContract;
use Domain\Entities\Customer;
use Infrastructure\Persistence\Doctrine\Repositories\AbstractRepository;
use Doctrine\ORM\EntityManager;

/**
 * Class ManagerRepository
 * @package Infrastructure\Doctrine\Repositories\Manager
 */
class CustomerRepository extends AbstractRepository implements CustomerRepositoryContract
{

    public function __construct(EntityManager $em, Customer $entity)
    {
        parent::__construct($em, $entity);
    }

}