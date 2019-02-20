<?php
namespace Application\Core\Http\Controllers;

use Application\Core\Exceptions\ApplicationException;
use Application\Core\Services\UserService;
use Application\Core\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(UserService $applicationService)
    {
        parent::__construct($applicationService);
    }

    public function getAllCustomers()
    {
        $filter = $this->getRequestAndSessionData();
        $data = $this->applicationService->getAllCustomers($filter);
        return $this->sendResponse($data);
    }

    public function getCustomerDetail($customerId)
    {
        $filter = $this->getRequestAndSessionData();
        if(!$this->applicationService->clientBelongsToCompany($filter['__session']['companyId'],$customerId)){
            throw new ApplicationException('Cliente nao encontrado para esta petshop','403');
        }

        $data = $this->applicationService->getCustomerDetail($customerId);
        return $this->sendResponse($data);
    }

    public function createCustomer()
    {
        $filter = $this->getRequestAndSessionData();
        $data = $this->applicationService->createCustomer($filter);
        return $this->sendResponse($data);
    }
}