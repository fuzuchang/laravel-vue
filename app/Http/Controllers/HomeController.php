<?php

namespace App\Http\Controllers;

use App\Test\AuthUserTest;

class HomeController extends Controller
{
    protected $user ;

    public function __construct(AuthUserTest $authUserTest)
    {
        $this->middleware('auth');
        $this->user = $authUserTest;
    }

    public function index()
    {
//        dump($this->user->getAuth());
        return view('home');
    }
}
