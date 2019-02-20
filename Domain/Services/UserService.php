<?php
namespace Domain\Services;

use Domain\Contracts\Repositories\CompanyRepositoryContract;
use Domain\Contracts\Repositories\CustomerRepositoryContract;
use Domain\Contracts\Services\UserServiceContract;
use Domain\Contracts\Repositories\UserRepositoryContract;
use Domain\Abstractions\AbstractDomainService;
use Domain\Entities\Customer;
use Domain\Entities\User;

class UserService extends AbstractDomainService  implements UserServiceContract
{
    private $customerRepository;
    private $companyRepository;

    public function __construct(
        UserRepositoryContract $repositoryContract,
        CustomerRepositoryContract $customerRepositoryContract,
        CompanyRepositoryContract $companyRepositoryContract
    )
    {
        parent::__construct($repositoryContract);
        $this->customerRepository = $customerRepositoryContract;
        $this->companyRepository = $companyRepositoryContract;
    }

    public function create($post)
    {
        $user = new User();
        $this->repository->fillEntityWithArray($user,$post);
        $user->setConfirmed(0);
        $user->setCreatedAt(new \DateTime('now'));

        $this->repository->save($user);

        if(isset($post['company']))
        {
            $company = $this->companyRepository->find($post['company']);
            $customer = new Customer();
            $customer->setCompany($company);
            $customer->setUser($user);
            $customer->setFirstPetshop(true);
            $customer->setCreatedAt(new \DateTime());
            $this->customerRepository->save($customer);
        }

        return $user;
    }

    public function getAllCustomers($companyId)
    {
        return $this->repository->getAllCustomers($companyId);
    }

    public function clientBelongsToCompany($companyId,$userId)
    {
        return $this->repository->clientBelongsToCompany($companyId,$userId);
    }

    public function getCustomerDetail($customerId)
    {
        return $this->repository->getCustomerDetail($customerId);
    }

    public function createCustomer($filter)
    {
        $filter['password'] = password_hash('www12w213',PASSWORD_DEFAULT);
        $company = $this->companyRepository->find($filter['__session']['companyId']);
        $user = $this->create($filter);

        $customer = new Customer();
        $customer->setCompany($company);
        $customer->setUser($user);
        $customer->setCreatedAt(new \DateTime());
        $this->customerRepository->save($customer);
    }
}