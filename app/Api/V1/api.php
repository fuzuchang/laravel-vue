<?php
/**
 * Created by PhpStorm.
 * User: Felix
 * Email: felix@1201.us
 * Date: 2017/3/17
 * Time: 12:15
 */

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->group(['namespace' => 'App\Api\V1\Auth\Controllers'], function($api) {
        //用户认证
        $api->post('/login', ['uses'=>'LoginController@login']);
        //用户注册
        $api->post('/register', 'RegisterController@register');
        //刷新token
        $api->post('/refersh-token', 'RefershTokenController@refershToken');
    });

    $api->group(['middleware' => ['auth:api']], function($api) {
        $api->group(['namespace' => 'App\Api\V1\Auth\Controllers'], function($api) {
            $api->post('/logout', 'LogoutController@logout'); //退出
        });
        $api->group(['namespace' => 'App\Api\V1\User\Controllers'], function($api) {
            $api->get('/me', 'UserController@me'); //显示用户信息
        });
    });

});



