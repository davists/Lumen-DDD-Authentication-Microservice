<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 2/26/17
 * Time: 12:35 AM
 */

namespace Infrastructure\Persistence\Doctrine\Repositories;

use Domain\Contracts\Repositories\CompanyRepositoryContract;
use Domain\Entities\Company;
use Infrastructure\Persistence\Doctrine\Repositories\AbstractRepository;
use Doctrine\ORM\EntityManager;

/**
 * Class ManagerRepository
 * @package Infrastructure\Doctrine\Repositories\Manager
 */
class CompanyRepository extends AbstractRepository implements CompanyRepositoryContract
{
    public function __construct(EntityManager $em, Company $entity)
    {
        parent::__construct($em, $entity);
    }

    public function getCustomerPetshops($userId,$page=1,$perPage=10)
    {
        $page = ($page - 1) * $perPage;

        //faltou ponderar a distancia do customer ate distancia da petshop menor que 10 metros ou distancia ennviada
        $sql = "
          
            SELECT 
            company.id, 
            company.name, 
            company.address, 
            company.address_number,
            
            (SELECT COUNT(product.id) FROM manager.product product WHERE product.company_id = company.id) as total_products,
            (SELECT COUNT(service.id) FROM manager.service service WHERE service.company_id = company.id) as total_services,
            (SELECT COUNT(promotion.id) FROM manager.promotion promotion WHERE promotion.company_id = company.id) as total_promotions
        
            FROM authentication.company company
            GROUP BY company.id   
            LIMIT $page,$perPage
              
        ";

        //fazer union com as petshops onde mais gastou
        return $this->em->getConnection()->query($sql)->fetchAll();
    }

    public function getTotalPetshops()
    {
        $qb = $this->em->createQueryBuilder();
        return $qb
            ->select('count(u.id)')
            ->from($this->entityNamespace , 'u')
            ->getQuery()
            ->useQueryCache(true)
            ->useResultCache(true, 3600)
            ->getSingleScalarResult();
    }

    public function getCustomerFavoriteCompany($userId)
    {
        $companyId = 1;

        $sql = "
            SELECT 
            company_id as id 
            FROM customer
            WHERE user_id = $userId AND first_petshop = 1
            LIMIT 1
        ";

        $favoriteCompany =  $this->em->getConnection()->query($sql)->fetchAll();

        if(!empty($favoriteCompany)){
            $companyId =  $favoriteCompany[0]['id'];
        }

        $qb = $this->em->createQueryBuilder();

        $qb
            ->select('u')
            ->from($this->entityNamespace , 'u')
            ->where("u.id = $companyId");

        $result = $qb->getQuery()->getResult();

        if(!empty($result)){
            $result = $result[0];
        }

        return $result;
    }
}