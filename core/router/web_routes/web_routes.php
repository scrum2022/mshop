<?php

namespace Core\Router\web_routes;


//use exceptions\ExceptionClass as Ex;

/**
 * Class web_routes
 * @package web_routes
 */
class web_routes
{
    /**
     * @var array
     */
    private static $routes = [
        '' => array(
            'route' => '/',
            'file' => 'app/controllers/indexController.php',
            'class' => 'App\Controllers\IndexController',
            'function' => 'index',
            'method' => 'get',
            'middleware' => 'anyone',
            'view' => 'index.html',
        ),
        "404" => array (
            'route' => '/',
            'file' => 'core/exceptions/ExceptionClass.php',
            'class' => 'Core\Exception\ExceptionClass',
            'function' => 'error',
            'method' => 'get',
            'middleware' => 'anyone',
            'view' => '404.html',
        ),
        "test" => array (
            'route' => '/',
            'file' => 'app/controllers/TestController.php',
            'class' => 'App\Controllers\TestController',
            'function' => 'index',
            'method' => 'get',
            'middleware' => 'anyone',
            'view' => '404.html',
        ),
        "add" => array (
            'route' => '/add',
            'file' => 'app/controllers/AddController.php',
            'class' => 'App\Controllers\AddController',
            'function' => 'index',
            'method' => 'get',
            'middleware' => 'anyone',
        ),
        "index.php" => array(
            'route' => '/',
            'file' => 'app/controllers/indexController.php',
            'class' => 'App\Controllers\IndexController',
            'function' => 'index',
            'method' => 'get',
            'middleware' => 'anyone',
            'view' => 'index.html',
        ),
    ];

    public static function FindRoute($route){
        try {
            foreach (self::$routes as $k => $v){
                if ($k == $route[1]){
                    return $v;
                }
            }
			
			return self::$routes["404"];
        } catch (Exception $e){
            throw new Exception("Указанный путь не найден!");
        }

        return 0;
    }
} 