<?php

namespace App\Controllers;

class Home extends BaseController
{
  
    public function index(): string
    {
        return view('home');
    }

    public function login(): string
    {
        return view('login');
    }

    public function register(): string
    {
        return view('register');
    }


}
