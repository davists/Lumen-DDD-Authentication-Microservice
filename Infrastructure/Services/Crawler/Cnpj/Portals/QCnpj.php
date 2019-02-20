<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 8/6/17
 * Time: 12:10 PM
 */

//https://qcnpj.com.br/consulta/empresa/marcia-giovana-pires-e-cia-ltda-me-me/20065457000191.html

namespace Infrastructure\Services\Crawler\Cnpj\Portals;

use Infrastructure\Services\Crawler\Cnpj\CnpjContract;
use Infrastructure\Services\Crawler\Request;
use League\Flysystem\Exception;
use Symfony\Component\DomCrawler\Crawler;

class QCnpj extends Request implements CnpjContract
{
    private $urlQCnpj = 'https://qcnpj.com.br/consulta/empresa/';

    public function getInformationByCnpj($cnpj)
    {
        $cnpjInformation = [];

        $searchUrl = $this->urlQCnpj . $this->getRandomString() . '/' . $cnpj .'.html';
        $document = $this->request($searchUrl);

        if($document['code'] != 200){
            return $cnpjInformation;
        }

        try {
            $crawler = new Crawler($document['content']);
            $details = $crawler->filter('#main > div:nth-child(2)');

            $cnae = $details->filter('ul')->eq(1)->html();
            $cnae = strip_tags($cnae);
            $cnae = preg_match('/Principal:(.*)(-.*){1}/i',$cnae,$cnaeEncontrado);

            if(!isset($cnaeEncontrado[1])){
                return $cnpjInformation;
            }

            $cnpjInformation['cnae'] = $this->normalizeStringOnlyResponse($cnaeEncontrado[1]);

            //pode ter mais dados razao social, nome fantasia, cep, telefone ...
            //dd($cnpjInformation);
        }
        catch(\Exception $e) {
            return $cnpjInformation;
        }


        return $cnpjInformation;
    }

}