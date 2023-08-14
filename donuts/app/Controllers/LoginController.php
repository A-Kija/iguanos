<?php
namespace Donuts\Controllers;

use Donuts\App;
use Donuts\Auth;
use Donuts\Messages;


class LoginController
{

    public function showLogin()
    {
        return App::view('auth/login', [
            'pageTitle' => 'Login page',
            'showNav' => false,
        ]);
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (Auth::attempt($email, $password)) {
           return App::redirect('donuts');
        } else {
            return App::redirect('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        Messages::add('You have been logged out');
        return App::redirect('');
    }

}