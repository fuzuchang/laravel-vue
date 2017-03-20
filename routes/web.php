<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index');
Route::get('/api-index', function (){

    $routes = [
        [
            'method' => 'POST',
            'uri' => '/api/login',
            'params' => [['k'=> 'mobile','v'=> '是','c'=> '登录手机号',],['k'=> 'password','v'=> '是','c'=> '登录密码',]],
            'result' => '
        {
          "status_code": 0,
          "error": "请求成功",
          "data": {
            "user": {
              "name": "yue",
              "email": "yue@qq.com",
              "mobile": "18945613256",
              "updated_at": "2017-03-20 09:17:21",
              "created_at": "2017-03-20 09:17:21",
              "id": 9
            },
            "token": "eyJ0eXAiOiJ..."
          }
        }',
        ],
        [
            'method' => 'POST',
            'uri' => '/api/register',
            'params' => [['k'=> 'mobile','v'=> '是','c'=> '登录手机号',],['k'=> 'password','v'=> '是','c'=> '登录密码',]],
            'result' => '
        {
          "status_code": 0,
          "error": "请求成功",
          "data": {
            "user": {
              "name": "yue",
              "email": "yue@qq.com",
              "mobile": "18945613256",
              "updated_at": "2017-03-20 09:17:21",
              "created_at": "2017-03-20 09:17:21",
              "id": 9
            },
            "token": "eyJ0eXAiOiJ..."
          }
        }',
        ],
        [
            'method' => 'POST',
            'uri' => '/api/logout',
            'params' => [['k'=> 'token','v'=> '是','c'=> 'token',]],
            'result' =>'
        {
          "status_code": 0,
          "error": "请求成功",
          "data":[]
        }',
        ],
        [
            'method' => 'POST',
            'uri' => '/api/refresh-token',
            'params' => [['k'=> 'token','v'=> '是','c'=> 'token',]],
            'result' =>'
        {
          "status_code": 0,
          "error": "请求成功",
          "data": {
            "token": "eyJ0eXAiOiJ..."
          }
        }',
        ],
    ];



    return view("api",[
        'routes'=>$routes
    ]);
});
