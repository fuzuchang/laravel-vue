<?php
namespace App\Models;

use App\User;
use Tymon\JWTAuth\Contracts\JWTSubject as AuthenticatableUserContract;
class UserModels extends User implements AuthenticatableUserContract
{
    protected $table = 'users';


    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey(); // Eloquent model method
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


}