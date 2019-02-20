<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 8/6/17
 * Time: 9:23 PM
 */
namespace Infrastructure\Services\Crawler\Cnpj;


interface CnpjContract{

    public function getInformationByCnpj($cnpj);

}