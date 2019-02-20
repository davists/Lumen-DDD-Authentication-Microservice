<?php
namespace Domain\Services;

use Domain\Contracts\Services\CityServiceContract;
use Domain\Contracts\Repositories\CityRepositoryContract;
use Domain\Abstractions\AbstractDomainService;

class CityService extends AbstractDomainService implements CityServiceContract
{
    public function __construct(CityRepositoryContract $repositoryContract)
    {
        parent::__construct($repositoryContract);
    }
}