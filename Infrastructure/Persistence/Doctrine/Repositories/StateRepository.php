<?php
namespace Infrastructure\Persistence\Doctrine\Repositories;

use Domain\Entities\State;
use Infrastructure\Persistence\Doctrine\Repositories\AbstractRepository;
use Domain\Contracts\Repositories\StateRepositoryContract;
use Doctrine\ORM\EntityManager;

class StateRepository extends AbstractRepository implements StateRepositoryContract
{
    public function __construct(EntityManager $em, State $entity)
    {
        parent::__construct($em, $entity);
    }

    public function getStateNameById($stateId)
    {
        $state = $this->find($stateId);
        if(!is_null($state))
            return $state->getNome();
    }

}