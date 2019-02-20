<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 8/6/17
 * Time: 9:14 PM
 */

namespace Infrastructure\Services\Crawler;


class Request
{

    public $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function request($url)
    {
        $res = $this->client->request('GET', $url,['http_errors' => false]);
        return ['content'=>$res->getBody()->getContents(),'code'=>$res->getStatusCode()];
    }

    public function requestWithOptions($url,$options)
    {
        $options['http_errors'] = false;

        $res = $this->client->request('GET', $url, $options);
        return ['content'=>$res->getBody()->getContents(),'code'=>$res->getStatusCode()];
    }

    public function getRandomString()
    {
        $milliseconds = round(microtime(true) * 1000);
        $hash = md5($milliseconds);
        $hash = $hash .'-'. md5($hash);
        return $hash;
    }

    public function normalizeStringOnlyResponse($string)
    {
        $string = preg_replace('/\s+/', '', $string);
        $string = preg_replace('/[^A-Za-z0-9]/', '', $string);

        return $string;
    }

}