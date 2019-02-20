<?php
namespace Application\Core\Services;

use Domain\Contracts\Services\StateServiceContract;
use Domain\Contracts\Repositories\CityRepositoryContract;

class StateService
{
    private $stateService;
    private $cityRepository;

    public function __construct(
        StateServiceContract $stateService,
        CityRepositoryContract $cityRepositoryContract
    )
    {
        $this->stateService = $stateService;
        $this->cityRepository = $cityRepositoryContract;
    }

    public function findAll()
    {
        return $this->stateService->findAll();
    }

    public function find($stateId)
    {
        return $this->stateService->find($stateId);
    }

    public function getCities($stateId)
    {
        return $this->cityRepository->findAllBy(['state'=>$stateId]);
    }

    public function create($post)
    {
        return $this->stateService->create($post);
    }

    public function update($stateId, $post)
    {
        return $this->stateService->update($stateId, $post);
    }

    public function delete($stateId)
    {
       //
    }
}