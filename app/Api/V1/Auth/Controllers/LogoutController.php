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

class LogoutController extends Controller {

    /**
     * 退出
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try{
            Auth::guard($this->guard)->logout();
        }catch (JWTException $e)
        {
            return $this->status(AuthStatus::INVALID_TOKEN)
                ->msg($e->getMessage())
                ->ok();
        }
        return $this->ok();
    }
}
