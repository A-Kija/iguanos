<?php
namespace Donuts;

use Donuts\Controllers\DonutsController as DC;
use Donuts\Controllers\LoginController as L;
use Donuts\Controllers\HomeController as H;
use Donuts\Auth;
use Donuts\Messages;

class App {

    public static function start() {
        return self::router();
    }


    public static function router()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('/', $uri);
        array_shift($uri);
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'GET' && count($uri) == 1 && $uri[0] == '') {
            return (new H)->index();
        }

        if ($method == 'GET' && count($uri) == 1 && $uri[0] == 'login') {
            return !Auth::check(['admin', 'user'], true) ? (new L)->showLogin() : self::redirect('');
        }

        if ($method == 'POST' && count($uri) == 1 && $uri[0] == 'login') {
            return !Auth::check(['admin', 'user'], true) ? (new L)->login() : self::redirect('');
        }

        if ($method == 'POST' && count($uri) == 1 && $uri[0] == 'logout') {
            return Auth::check(['admin', 'user'], true) ? (new L)->logout() : self::redirect('');
        }

        if ($method == 'GET' && count($uri) == 1 && $uri[0] == 'register') {
            return !Auth::check(['admin', 'user'], true) ? (new L)->showRegister() : self::redirect('');
        }

        if ($method == 'POST' && count($uri) == 1 && $uri[0] == 'register') {
            return !Auth::check(['admin', 'user'], true) ? (new L)->register() : self::redirect('');
        }


        // Donuts routes

        if ($method == 'GET' && count($uri) == 1 && $uri[0] == 'donuts') {
            return Auth::check(['admin', 'user'], true) ? (new DC)->index() : self::viewError('403');
        }

        if ($method == 'GET' && count($uri) == 2 && $uri[0] == 'donuts' && $uri[1] == 'create') {
            return Auth::check(['admin'], true) ? (new DC)->create() : self::viewError('403');
        }

        if ($method == 'POST' && count($uri) == 2 && $uri[0] == 'donuts' && $uri[1] == 'store') {
            return Auth::check(['admin'], true) ? (new DC)->store() : self::viewError('403');
        }

        if ($method == 'GET' && count($uri) == 3 && $uri[0] == 'donuts' && $uri[1] == 'delete') {
            return Auth::check(['admin'], true) ? (new DC)->delete($uri[2]) : self::viewError('403');
        }

        if ($method == 'POST' && count($uri) == 3 && $uri[0] == 'donuts' && $uri[1] == 'destroy') {
            return Auth::check(['admin'], true) ? (new DC)->destroy($uri[2]) : self::viewError('403');
        }

        if ($method == 'GET' && count($uri) == 3 && $uri[0] == 'donuts' && $uri[1] == 'edit') {
            return Auth::check(['admin'], true) ? (new DC)->edit($uri[2]) : self::viewError('403');
        }

        if ($method == 'POST' && count($uri) == 3 && $uri[0] == 'donuts' && $uri[1] == 'update') {
            return Auth::check(['admin'], true) ? (new DC)->update($uri[2]) : self::viewError('403');
        }

        if ($method == 'GET' && count($uri) == 3 && $uri[0] == 'donuts' && $uri[1] == 'show') {
            return Auth::check(['admin', 'user'], true) ? (new DC)->show($uri[2]) : self::viewError('403');
        }

        http_response_code(404);
        return self::viewError('404');

    }

    public static function view($path, $data = null)
    {
        if ($data) {
            extract($data);
        }

        $user = Auth::user();
        $messages = Messages::get();

        ob_start();

        require ROOT . 'resources/views/layout/top.php';

        require ROOT . 'resources/views/' . $path . '.php';

        require ROOT . 'resources/views/layout/bottom.php';

        clearFlash();

        return ob_get_clean();
    }

    public static function viewError($path)
    {

        ob_start();

        require ROOT . 'resources/views/errors/' . $path . '.php';

        clearFlash();

        return ob_get_clean();
    }



    public static function redirect($url)
    {
        header('Location: ' . URL . $url);
        return;
    }

}