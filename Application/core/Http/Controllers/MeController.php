<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 5/7/17
 * Time: 2:00 AM
 */

namespace Application\Core\Http\Controllers;

use Application\Core\Http\Controllers\Controller;
use Application\Core\Services\MeService;
use Illuminate\Support\Facades\Auth;
use Application\Core\Http\Response\JsonResponseDefault;

class MeController extends Controller
{

    public function __construct(MeService $meService)
    {
        parent::__construct($meService);
    }

    public function userInformation()
    {
        $user = Auth::user()->data;

        if(empty($user)){
            return JsonResponseDefault::create(true, ['User not found'], 'success', 200);
        }

        $userId = Auth::user()->data->userId;
        $data = $this->serialize($this->applicationService->get($userId));

        return JsonResponseDefault::create(true, $data, 'success', 200);
    }
}