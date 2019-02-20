<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 8/6/17
 * Time: 12:10 PM
 */

//http://www.foneempresas.com/telefone/cnpj/sts-cad-online/20065457000191

namespace Infrastructure\Services\Crawler\Cnpj\Portals;

use Infrastructure\Services\Crawler\Cnpj\CnpjContract;
use Infrastructure\Services\Crawler\Request;
use Symfony\Component\DomCrawler\Crawler;

class FoneEmpresas extends Request implements CnpjContract
{
    private $urlFoneEmpresas = 'http://www.foneempresas.com/telefone/cnpj/';

    public function getInformationByCnpj($cnpj)
    {
        $cnpjInformation = [];

        $searchUrl = $this->urlFoneEmpresas . $this->getRandomString() . '/' . $cnpj;
        $document = $this->request($searchUrl);

        if($document['code'] != 200){
            return $cnpjInformation;
        }

        try{
            $crawler = new Crawler($document['content']);

            $details = $crawler->filter('#details');

            $cnae = $details->filter('div > div > div:nth-child(2) > div:nth-child(6) > p:nth-child(3)')->html();
            $cnae = strip_tags($cnae);
            $cnae = preg_match('/CNAE(.*)/i',$cnae,$cnaeEncontrado);

            if(!isset($cnaeEncontrado[1])){
                return $cnpjInformation;
            }

            $cnpjInformation['cnae'] = $this->normalizeStringOnlyResponse($cnaeEncontrado[1]);

            //pode ter mais dados razao social, nome fantasia, cep, telefone ...
            //dd($cnpjInformation);

        }catch (\Exception $e){
            return $cnpjInformation;
        }

        return $cnpjInformation;
    }


}