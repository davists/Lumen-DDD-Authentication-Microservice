<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 2/26/17
 * Time: 12:35 AM
 */

namespace Infrastructure\Persistence\Doctrine\Repositories;

use Domain\Contracts\Repositories\CountryRepositoryContract;
use Domain\Entities\Country;
use Infrastructure\Persistence\Doctrine\Repositories\AbstractRepository;
use Doctrine\ORM\EntityManager;

/**
 * Class ManagerRepository
 * @package Infrastructure\Doctrine\Repositories\Manager
 */
class CountryRepository extends AbstractRepository implements CountryRepositoryContract
{
    public function __construct(EntityManager $em, Country $entity)
    {
        parent::__construct($em, $entity);
    }
}