<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 8/6/17
 * Time: 9:20 PM
 */

namespace Infrastructure\Services\Crawler\Cnpj;

use Infrastructure\Services\Crawler\Cnpj\Portals\FoneEmpresas;
use Infrastructure\Services\Crawler\Cnpj\Portals\QCnpj;
use Infrastructure\Services\Crawler\Cnpj\Portals\ReceitaWS;

class CnpjService
{
    public function getInfoPortalFoneEmpresas($cnpj)
    {
        $portal = new FoneEmpresas();
        return $portal->getInformationByCnpj($cnpj);
    }

    public function getInfoPortalQCnpj($cnpj)
    {
        $portal = new QCnpj();
        return $portal->getInformationByCnpj($cnpj);
    }

    public function getInfoPortalReceitaWS($cnpj)
    {
        $portal = new ReceitaWS();
        return $portal->getInformationByCnpj($cnpj);
    }

    public function getPrimaryActivity($cnpj)
    {
        $activity = 0;

        //fone empresas
        $portal = $this->getInfoPortalFoneEmpresas($cnpj);

        if(isset($portal['cnae']) && strlen($portal['cnae']) > 5 ){
           return $activity = $portal['cnae'];
        }

        //qcnpj
        $portal = $this->getInfoPortalQCnpj($cnpj);

        if(isset($portal['cnae']) && strlen($portal['cnae']) > 5){
            return $activity = $portal['cnae'];
        }

        //receitaws
        $portal = $this->getInfoPortalReceitaWS($cnpj);

        if(isset($portal['cnae']) && strlen($portal['cnae']) > 5){
            return $activity = $portal['cnae'];
        }

        //nenhum crawler ativo
        return $activity;
    }
}