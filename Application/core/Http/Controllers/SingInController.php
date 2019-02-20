<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 5/7/17
 * Time: 2:00 AM
 */

namespace Application\Core\Http\Controllers;

use Illuminate\Http\Request;
use Application\Core\Services\SingInService;
use Laravel\Lumen\Routing\Controller as BaseController;
use Application\Core\Http\Response\JsonResponseDefault;

class SingInController extends BaseController
{
    private $singInService;

    public function __construct(SingInService $singInService)
    {
        $this->singInService = $singInService;
    }

    public function login(Request $request)
    {
        $post = $request->all();
        $response = $this->singInService->login($post);
        return JsonResponseDefault::create(true,$response,'user successfully logged in',200);
    }
}