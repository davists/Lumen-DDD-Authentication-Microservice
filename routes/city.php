<?php
$app->group(['prefix' => 'cities','middleware' => ['jwt','cors']], function () use ($app) {
    $app->get('/', 'CityController@index');
    $app->get('/{cityId}', 'CityController@show');
});
