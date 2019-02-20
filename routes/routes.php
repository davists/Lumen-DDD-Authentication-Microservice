<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () {
    //echo password_hash("1234", PASSWORD_DEFAULT)."\n";
    return 'Petdrive Auth API Service';
});

$app->group(['prefix'=>'api/v1', 'middleware' => ['cors']], function () use ($app) {

    $app->post('/login',['middleware' => ['throttle:30:5','cors'],'uses'=>'SingInController@login']);
    $app->get('/me',['middleware' => ['jwt','throttle:30:5','cors'],'uses'=>'MeController@userInformation']);

    $app->post('/emailSiteContact', 'EmailController@siteContact');

    require_once (__DIR__ .'/user.php');
    require_once (__DIR__ .'/company.php');

    require_once (__DIR__ .'/city.php');
    require_once (__DIR__ .'/state.php');
});
