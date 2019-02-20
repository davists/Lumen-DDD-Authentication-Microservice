<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 8/6/17
 * Time: 11:23 PM
 */

namespace Infrastructure\Services\Crawler\Cnpj\Portals;

use Infrastructure\Services\Crawler\Cnpj\CnpjContract;
use Infrastructure\Services\Crawler\Request;

class ReceitaWS extends Request implements CnpjContract
{
    public $urlReceitaWS = 'https://www.receitaws.com.br/v1/cnpj/';

    public function getInformationByCnpj($cnpj)
    {
        $cnpjInformation = [];

        $searchUrl = $this->urlReceitaWS . $cnpj ;
        $document = $this->request($searchUrl);

        if($document['code'] != 200){
            return $cnpjInformation;
        }

        try{
            $company = json_decode($document['content'],true);

            if(is_array($company) && $company['status'] != 'ERROR'){
                $activity = $company['atividade_principal'][0]['code'];
                $activity =  preg_replace( '/[^0-9]/', '', $activity);
                $cnpjInformation['cnae'] = $activity;
            }

            //pode ter mais dados razao social, nome fantasia, cep, telefone ...
            //dd($cnpjInformation);

        }catch (\Exception $e){
            return $cnpjInformation;
        }

        return $cnpjInformation;
    }
}