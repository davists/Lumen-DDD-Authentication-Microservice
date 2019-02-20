<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 3/22/17
 * Time: 1:38 PM
 */

$app->group(['prefix' => 'companies'], function () use ($app) {

    $app->group(['middleware' => ['throttle:300:5','cors']], function () use ($app) {
        $app->post('/', 'CompanyController@store');
    });

    $app->group(['middleware' => ['jwt','throttle:300:5','cors']], function () use ($app) {
        $app->get('/', 'CompanyController@index');
        $app->get('/{companyId}', 'CompanyController@show');

        $app->put('/{companyId}', 'CompanyController@update');
        $app->delete('/{companyId}', 'CompanyController@destroy');
    });

    $app->group(['prefix'=>'customer','middleware' => ['jwt','throttle:300:5','cors']], function () use ($app) {
        $app->get('/get-petshops', 'CompanyController@getCustomerPetshops');
        $app->get('/favorite-company', 'CompanyController@getCustomerFavoriteCompany');
    });

    //for external exposure of companies identification
    $app->group(['prefix'=>'uuid','middleware' => ['throttle:300:5','cors']], function () use ($app) {
        $app->get('/{uuid}', 'CompanyController@getCompanyByUuid');
    });

});
