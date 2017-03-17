<?php
/**
 * Created by PhpStorm.
 * User: Felix
 * Email: felix@1201.us
 * Date: 2017/3/17
 * Time: 12:15
 */

$api = app('Dingo\Api\Routing\Router');

$api->version('v1',['namespace' => 'App\Api\V1\Auth\Controllers'], function ($api) {

    //用户认证
    $api->post('/authenticate', ['uses'=>'AuthenticateController@authenticate']);
    $api->post('/login', ['uses'=>'LoginController@login']);
    $api->post('/register', 'RegisterController@register');

    $api->group(['middleware' => ['auth:api']], function($api) {
        $api->post('/logout', 'LogoutController@logout');
    });

});
