<?php
/**
 * Created by PhpStorm.
 * User: Felix
 * Email: felix@1201.us
 * Date: 2017/3/17
 * Time: 12:30
 */

namespace App\Api\V1\Auth\Controllers;

use App\Api\V1\Auth\Response\AuthStatus;
use App\Api\V1\BaseController as Controller;
use App\Models\UserModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{

    public function register(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()){

            return $this->json([ $validator->errors()])
                ->msg(AuthStatus::getStatusDesc(AuthStatus::INVALID_PARAM))
                ->status(AuthStatus::INVALID_PARAM)
                ->ok();
        }

        $data = [];
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['mobile'] = $request->input('mobile');
        $data['password'] = bcrypt($request->input('password'));
        $user = UserModels::create($data);
        $token = JWTAuth::fromUser($user);

        return $this->json([
                'user' => $user->toArray(),
                'token' => $token
            ])
            ->msg(AuthStatus::getStatusDesc(AuthStatus::SUCCESS))
            ->status(AuthStatus::SUCCESS)
            ->ok();
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'max:255|unique:users',
            'email' => 'email|max:255|unique:users',
            'mobile' => 'required|digits:11|unique:users',
            'password' => 'required|min:6',
        ],[
            'name.max' => "用户名最多255字符",
            'name.unique' => "用户名已存在",
            'email.email' => "邮箱格式不正确",
            'email.max' => "邮箱最多255字符",
            'email.unique' => "邮箱已存在",
            'mobile.required' => "手机号必填",
            'mobile.digits' => "手机号最多11字符",
            'mobile.unique' => "手机号已存在",
            'password.required' => "密码必填",
            'password.min' => "密码最少6字符"
        ]);
    }
}