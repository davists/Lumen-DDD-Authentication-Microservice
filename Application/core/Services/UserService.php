<?php
namespace Application\Core\Services;

use Domain\Contracts\Services\UserServiceContract;

class UserService
{
    private $userService;

    public function __construct(UserServiceContract $userServiceContract)
    {
        $this->userService = $userServiceContract;
    }

    public function findAll()
    {
        return $this->userService->findAll();
    }

    public function find($contactId)
    {
        return $this->userService->find($contactId);
    }

    public function create($post)
    {
        return $this->userService->create($post);
    }

    public function update($contactId, $post)
    {
        return $this->userService->update($contactId, $post);
    }

    public function delete($contactId)
    {
        return $this->userService->delete($contactId);
    }

    public function getAllCustomers($companyId)
    {
        return $this->userService->getAllCustomers($companyId);
    }

    public function clientBelongsToCompany($companyId,$userId)
    {
        return $this->userService->clientBelongsToCompany($companyId,$userId);
    }

    public function getCustomerDetail($customerId)
    {
        return $this->userService->getCustomerDetail($customerId);
    }

    public function createCustomer($filter)
    {
        return $this->userService->createCustomer($filter);
    }
}