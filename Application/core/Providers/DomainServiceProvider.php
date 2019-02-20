<?php
namespace Application\Core\Providers;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //login
        $this->app->bind('Domain\Contracts\Services\UserLoginServiceContract', 'Domain\Services\UserLoginService');
        //me
        $this->app->bind('Domain\Contracts\Services\MeServiceContract', 'Domain\Services\MeService');
        
        //user
        $this->app->bind('Domain\Contracts\Repositories\UserRepositoryContract', 'Infrastructure\Persistence\Doctrine\Repositories\UserRepository');
        $this->app->bind('Domain\Contracts\Services\UserServiceContract', 'Domain\Services\UserService');
        
        //company
        $this->app->bind('Domain\Contracts\Repositories\CompanyRepositoryContract', 'Infrastructure\Persistence\Doctrine\Repositories\CompanyRepository');
        $this->app->bind('Domain\Contracts\Services\CompanyServiceContract', 'Domain\Services\CompanyService');

        //country
        $this->app->bind('Domain\Contracts\Repositories\CountryRepositoryContract', 'Infrastructure\Persistence\Doctrine\Repositories\CountryRepository');

        //state
        $this->app->bind('Domain\Contracts\Repositories\StateRepositoryContract', 'Infrastructure\Persistence\Doctrine\Repositories\StateRepository');
        $this->app->bind('Domain\Contracts\Services\StateServiceContract', 'Domain\Services\StateService');

        //city
        $this->app->bind('Domain\Contracts\Repositories\CityRepositoryContract', 'Infrastructure\Persistence\Doctrine\Repositories\CityRepository');
        $this->app->bind('Domain\Contracts\Services\CityServiceContract', 'Domain\Services\CityService');

        //plan
        $this->app->bind('Domain\Contracts\Repositories\PlanRepositoryContract', 'Infrastructure\Persistence\Doctrine\Repositories\PlanRepository');

        //manager
        $this->app->bind('Domain\Contracts\Repositories\ManagerRepositoryContract', 'Infrastructure\Persistence\Doctrine\Repositories\ManagerRepository');

        //customer
        $this->app->bind('Domain\Contracts\Repositories\CustomerRepositoryContract', 'Infrastructure\Persistence\Doctrine\Repositories\CustomerRepository');

    }
}
