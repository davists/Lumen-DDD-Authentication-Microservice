<?php
namespace Application\Core\Services;

use Domain\Contracts\Services\UserLoginServiceContract;
use Application\Core\Http\Request\UserRequestValidation;

class SingInService
{
    private $requestValidation;
    private $singInDomainService;

    public function __construct(UserLoginServiceContract $userLoginServiceContract, UserRequestValidation $userRequestValidation)
    {
        $this->singInDomainService = $userLoginServiceContract;
        $this->requestValidation = $userRequestValidation;
    }
    
    public function login($post)
    {
        $this->requestValidation->validateLogin($post);
        return $this->singInDomainService->execute($post);
    }
}