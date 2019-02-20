<?php
namespace Domain\Services;

use Domain\Contracts\Services\StateServiceContract;
use Domain\Contracts\Repositories\StateRepositoryContract;
use Domain\Abstractions\AbstractDomainService;

class StateService extends AbstractDomainService implements StateServiceContract
{
    public function __construct(StateRepositoryContract $repositoryContract)
    {
        parent::__construct($repositoryContract);
    }
}