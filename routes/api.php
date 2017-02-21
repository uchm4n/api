<?php

//Registre Dingo PI Router
$api = app('Dingo\Api\Routing\Router');


//Endpoints
$api->version('v1',['middleware' => ['cors','locale'],'namespace' => 'App\Http\Controllers'], function ($api) {

    $api->get('/locale/{lang}','LocaleController@index');
    $api->post('/auth','UserController@authenticate');
    $api->post('/register','UserController@register');

    //Authenticated endpoints
    $api->group(['middleware' => 'api.auth'], function ($api) {
        $api->get('/user','UserController@user');
        $api->get('/token','UserController@token');

        //Admin Endpoints
        $api->group(['middleware' => 'role:admin'], function ($api) {
            $api->get('/users','UserController@all');
            $api->get('/task','TaskController@index');
            $api->get('/task/{id}','TaskController@show');
            $api->post('/task/store','TaskController@store');
            $api->put('/task/update/{id}','TaskController@update');
            $api->delete('/task/delete/{id}','TaskController@destroy');
        });


    });

});
