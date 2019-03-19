<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 19.03.2019
 * Time: 8:49
 */
namespace core;
use core\router\Router;
use core\router\RouterException;
class Application
{
    public static function run(){
        $router_config = new Configurator("router");
        $routes = $router_config->routes;
        $router = new Router($routes);
        try{
            $router->route();
        }catch (RouterException $e){
            echo "404!";
        }
    }
}