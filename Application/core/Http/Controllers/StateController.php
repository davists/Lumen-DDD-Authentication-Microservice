<?php
namespace Application\Core\Http\Controllers;

use Application\Core\Services\StateService;
use Application\Core\Http\Controllers\Controller;

class StateController extends Controller
{
    public function __construct(StateService $applicationService)
    {
        parent::__construct($applicationService);
    }

    public function getCities($stateId)
    {
        $data = $this->applicationService->getCities($stateId);
        return $this->sendResponse($data);
    }
}