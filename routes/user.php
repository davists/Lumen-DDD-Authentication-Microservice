<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 3/22/17
 * Time: 1:38 PM
 */

$app->group(['prefix' => 'users'], function () use ($app) {

    $app->group(['middleware' => ['jwt','cors']], function () use ($app) {
        $app->get('/', 'UserController@index');
        $app->get('/{userId}', 'UserController@show');
        $app->put('/{userId}', 'UserController@update');
        $app->delete('/{userId}', 'UserController@destroy');
    });

    $app->group(['middleware' => ['cors']], function () use ($app) {
        $app->post('/', 'UserController@store');
    });

});

$app->group(['prefix' => 'customers'], function () use ($app) {

    $app->group(['middleware' => ['jwt','cors']], function () use ($app) {
        $app->get('/get-all', 'UserController@getAllCustomers');
        $app->get('/detail/{customerId}', 'UserController@getCustomerDetail');
        $app->post('/', 'UserController@createCustomer');
    });

});
