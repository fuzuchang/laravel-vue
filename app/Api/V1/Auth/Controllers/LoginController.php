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
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller {

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        try{

            $token = JWTAuth::attempt($credentials);

            if (!$token){
                $json = ['error' => 'invalid_credentials'];
                return $this->json($json)->status(AuthStatus::UNAUTHENTICATED)->ok();
            }

        }catch (JWTException $e){
            $json = [
                'error' => 'could_not_create_token'
            ];
            return $this->json($json)->status(AuthStatus::UNAUTHENTICATED)->ok();
        }

        return $this->json(compact($token))->status(AuthStatus::UNAUTHENTICATED)->ok();

    }
}
