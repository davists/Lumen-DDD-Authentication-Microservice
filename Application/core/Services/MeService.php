<?php
namespace Application\Core\Services;

use Domain\Contracts\Services\MeServiceContract;

class MeService
{
    private $meService;

    public function __construct(MeServiceContract $meServiceContract)
    {
        $this->meService = $meServiceContract;
    }
    
    public function get($userId)
    {
        return $this->meService->get($userId);
    }
}