<?php
//Registre Dingo PI Router
$api = app('Dingo\Api\Routing\Router');


//Endpoints
$api->version('v1',['namespace' => 'App\Http\Controllers'], function ($api) {

    $api->post('/auth','UserController@authenticate');
    $api->post('/register','UserController@register');

    //Authenticated Users Route
    $api->group(['middleware' => 'api.auth'], function ($api) {
        $api->get('/user','UserController@user');
        $api->get('/users','UserController@all');
        $api->get('/token','UserController@token');
    });
});
