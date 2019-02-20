<?php
namespace Application\Core\Services;

use Application\Core\Exceptions\ApplicationException;
use Domain\Contracts\Services\CompanyServiceContract;
use Infrastructure\Services\Email\Mailgun;

class CompanyService
{
    private $companyService;

    public function __construct(CompanyServiceContract $companyServiceContract)
    {
        $this->companyService = $companyServiceContract;
    }

    public function findAll()
    {
        return $this->companyService->findAll();
    }

    public function find($contactId)
    {
        return $this->companyService->find($contactId);
    }

    public function create($post)
    {
        $message = "Cadastro em análise!";

        $this->companyService->alreadyExists(['cnpj'=>$post['cnpj']],'Empresa já cadastrada!');

        $company =  $this->companyService->create($post);

        if(!is_null($company)){
            $email = new Mailgun();
            $email->setToEmail($company->getEmail());
            $email->setWelcomeMessage($post);
            $email->send();

            $message = "Registro concluido, você recebera em instantes um email com seu token de acesso. Caso nao receba o email verifique sua caixa de Spam.";
        }

        return $message;
    }

    public function update($contactId, $post)
    {
        return $this->companyService->update($contactId, $post);
    }

    public function delete($contactId)
    {
        return $this->companyService->delete($contactId);
    }

    public function getCustomerPetshops($filter)
    {
        return $this->companyService->getCustomerPetshops($filter);
    }

    public function getCustomerFavoriteCompany($userId)
    {
        return $this->companyService->getCustomerFavoriteCompany($userId);
    }

    public function getCompanyByUuid($uuid)
    {
        return $this->companyService->getCompanyByUuid($uuid);
    }
}