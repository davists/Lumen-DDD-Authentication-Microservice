<?php
namespace Application\Core\Services;

use Domain\Contracts\Services\CityServiceContract;

class CityService
{
    private $cityService;

    public function __construct(CityServiceContract $cityService)
    {
        $this->cityService = $cityService;
    }

    public function findAll($filter)
    {
        return $this->cityService->findAll($filter);
    }

    public function find($cityId)
    {
        return $this->cityService->find($cityId);
    }

    public function create($post)
    {
        return $this->cityService->create($post);
    }

    public function update($cityId, $post)
    {
        return $this->cityService->update($cityId, $post);
    }

    public function delete($cityId)
    {
        return $this->cityService->delete($cityId);
    }
}