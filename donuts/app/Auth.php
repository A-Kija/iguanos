<?php
namespace Donuts;
use Donuts\DB\FileDB;


class Auth {

        public static function attempt($email, $password) : bool
        {
            $users = (new FileDB('users'))->showAll();
            foreach ($users as $user) {
                if ($user['email'] == $email && $user['password'] == md5($password)) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user'] = $user;
                    return true;
                }
            }
            return false;
        }
    
        public static function check(array $roles, bool $header = false)
        {
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && in_array($_SESSION['user']['role'], $roles)) {
                return true;
            }
            if ($header) {
                http_response_code(403);
            } else {
                return false;
            }
        }

    
        public static function user()
        {
            if (isset($_SESSION['user'])) {
                return $_SESSION['user'];
            }
            return null;
        }
    
    
        public static function logout()
        {
            $_SESSION['logged_in'] = false;
            unset($_SESSION['user']);
        }

        public static function register($name, $email, $password, $color)
        {
            $user = [
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'color' => $color,
                'role' => 'user',
            ];
    
            (new FileDB('users'))->create($user);

        }
}