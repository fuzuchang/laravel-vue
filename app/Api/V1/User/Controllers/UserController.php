<?php
namespace App\Api\V1\User\Controllers;

/**
 * Created by PhpStorm.
 * User: Felix
 * Email: felix@1201.us
 * Date: 2017/3/20
 * Time: 15:44
 */
use App\Api\V1\BaseController as Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function me()
    {
        $user = Auth::guard($this->guard)->user();

        return $this->json(['user'=>$user])->ok();
    }
}