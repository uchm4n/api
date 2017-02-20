<?php

//Registre Dingo PI Router
$api = app('Dingo\Api\Routing\Router');


//Endpoints
$api->version('v1',['middleware' => 'cors','namespace' => 'App\Http\Controllers'], function ($api) {

    $api->post('/auth','UserController@authenticate');
    $api->post('/register','UserController@register');

    $api->group(['middleware' => 'api.auth'], function ($api) {
        //Authenticated Users Route
        $api->get('/user','UserController@user');
        $api->get('/users','UserController@all');
        $api->get('/token','UserController@token');


    });

    $api->group(['middleware' => 'api.auth'], function ($api) {
        //Tasks Route
        $api->get('/task','TaskController@index');
        $api->get('/task/{id}','TaskController@show');
        $api->post('/task/store','TaskController@store');
        $api->put('/task/update/{id}','TaskController@update');
        $api->delete('/task/delete/{id}','TaskController@destroy');
    });

});
