<?php
namespace Donuts;

use Donuts\Controllers\DonutsController as DC;

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

        if ($method == 'GET' && count($uri) == 1 && $uri[0] == 'donuts') {
            return (new DC)->index();
        }




        return '<h1> 404 Page not found </h1>';


    }

    public static function view($path, $data = null)
    {
        if ($data) {
            extract($data);
        }

        ob_start();

        require ROOT . 'resources/views/layout/top.php';

        require ROOT . 'resources/views/' . $path . '.php';

        require ROOT . 'resources/views/layout/bottom.php';

        return ob_get_clean();
    }

}