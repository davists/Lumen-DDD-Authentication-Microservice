<?php
namespace Application\Core\Http\Controllers;

use Application\Core\Services\CompanyService;
use Application\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JansenFelipe\CnpjGratis\CnpjGratis;

class CompanyController extends Controller
{
    public function __construct(CompanyService $applicationService)
    {
        parent::__construct($applicationService);
    }

    public function consultaCNPJByCaptchaTextReceita(Request $request)
    {
        $params = $request->all();

        $dadosEmpresa = CnpjGratis::consulta(
            $params['cnpj'],
            $params['solvedCaptcha'],
            $params['cookie']
        );

        return $dadosEmpresa;
    }

    public function getCustomerPetshops(Request $request)
    {
        $filter = $request->all();
        $userId = Auth::user()->data->userId;
        $filter['userId'] = $userId;

        $data = $this->applicationService->getCustomerPetshops($filter);
        return $this->sendResponse($data);
    }

    public function getCustomerFavoriteCompany()
    {
        $userId = Auth::user()->data->userId;
        $data = $this->applicationService->getCustomerFavoriteCompany($userId);
        return $this->sendResponse($data);
    }

    public function getCompanyByUuid($uuid)
    {
        $data = $this->applicationService->getCompanyByUuid($uuid);
        return $this->sendResponse($data);
    }
}