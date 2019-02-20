<?php
namespace Application\Core\Http\Controllers;

use Application\Core\Services\CityService;
use Application\Core\Http\Controllers\Controller;

class CityController extends Controller
{
    public function __construct(CityService $applicationService)
    {
        parent::__construct($applicationService);
    }
}