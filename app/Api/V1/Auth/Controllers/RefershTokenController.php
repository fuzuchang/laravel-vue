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
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class RefershTokenController extends Controller {

    /**
     * 刷新token
     * @return \Illuminate\Http\JsonResponse
     */
    public function refershToken()
    {
        try{
            $token = Auth::guard($this->guard)->refresh();
        }catch (JWTException $exception){
            return $this->status(AuthStatus::INVALID_TOKEN)
                ->msg($exception->getMessage())
                ->ok();
        }

        return $this->json([
            'token' => $token
        ])->ok();
    }
}
