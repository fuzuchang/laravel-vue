<?php
namespace App\Test;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: Felix
 * Email: felix@1201.us
 * Date: 2017/3/16
 * Time: 11:39
 */
class AuthUserTest
{
    public function getAuth()
    {
        return Auth::user();
    }
}