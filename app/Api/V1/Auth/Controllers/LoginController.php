<?php
/**
 * Created by PhpStorm.
 * User: Felix
 * Email: felix@1201.us
 * Date: 2017/3/17
 * Time: 12:17
 */

namespace App\Api\V1\Auth\Controllers;

use App\Api\V1\Auth\Response\AuthStatus;
use App\Api\V1\BaseController as Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {


    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        try{

            $token = Auth::guard($this->guard)->attempt($credentials);

            if (!$token){
                return $this->status(AuthStatus::INVALID_CREDENTIALS)
                    ->msg(AuthStatus::getStatusDesc(AuthStatus::INVALID_CREDENTIALS))
                    ->ok();
            }

        }catch (JWTException $e){
            return $this->status(AuthStatus::COULD_NOT_CREATE_TOKEN)
                ->msg(AuthStatus::getStatusDesc(AuthStatus::COULD_NOT_CREATE_TOKEN))
                ->ok();
        }

        $user =  Auth::guard($this->guard)->user();

        return $this->json([
            "token" => $token,
            "user" => $user,
        ])->status(AuthStatus::SUCCESS)
            ->msg(AuthStatus::getStatusDesc(AuthStatus::SUCCESS))
            ->ok();

    }

}
