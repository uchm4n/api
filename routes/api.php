<?php
//Registre Dingo PI Router
$api = app('Dingo\Api\Routing\Router');


//Endpoints
$api->version('v1',['namespace' => 'App\Http\Controllers'], function ($api) {
    $api->get('/test','Test@test');
    $api->group(['middleware' => 'auth:api'], function ($api) {
        $api->get('/testing','Test@test');
    });
});
