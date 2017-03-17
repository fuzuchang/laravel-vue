<?php
/**
 * Created by PhpStorm.
 * User: Felix
 * Email: felix@1201.us
 * Date: 2017/3/17
 * Time: 12:17
 */

namespace App\Api\V1\Auth\Controllers;

use App\Api\V1\BaseController as Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutController extends Controller {

    public function logout()
    {
        Auth::guard($this->guard)->logout();

        $json = [
            'error' => 0,
            'status_code'  => 200,
        ];

        return $this->json($json)->ok();
    }
}
