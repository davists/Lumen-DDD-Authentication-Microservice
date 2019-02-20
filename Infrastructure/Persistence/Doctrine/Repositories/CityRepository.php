<?php
namespace Infrastructure\Persistence\Doctrine\Repositories;

use Domain\Entities\City;
use Infrastructure\Persistence\Doctrine\Repositories\AbstractRepository;
use Domain\Contracts\Repositories\CityRepositoryContract;
use Doctrine\ORM\EntityManager;

class CityRepository extends AbstractRepository implements CityRepositoryContract
{
    public function __construct(EntityManager $em, City $entity)
    {
        parent::__construct($em, $entity);
    }

    public function getCityNameById($cityId)
    {
        if(empty($cityId)){
            return '';
        }

        $qb = $this->em->createQueryBuilder();
        $result = $qb
            ->select('
               u.name as cityName
            ')
            ->from($this->entityNamespace,'u')
            ->where("u.id = $cityId")
            ->getQuery()
            ->getOneOrNullResult();

        if(isset($result['cityName'])){
            $result = $result['cityName'];
        }

        return $result;
    }
}