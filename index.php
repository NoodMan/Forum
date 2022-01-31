<?php

namespace App;

session_start();

require_once('vendor/autoload.php');

use Router\Router;

$router = new Router($_GET['url']);

if(!isset($_SESSION['Type'])) {
    $_SESSION['Type'] = null;  
}

switch ($_SESSION['Type']) {
    case 'client':
        $router->get("/home", "App\Controller\AppController@index");
        $router->get("/cats", "App\Controller\CatController@index");
        $router->get("/logout", "App\Controller\AppController@logout"); //
        break;
        
    case 'manager':
        $router->get("/logout", "App\Controller\AppController@logout");
        $router->get("/home", "App\Controller\AppController@index");

        $router->get("/cats", "App\Controller\CatController@index");
        $router->post("/cats", "App\Controller\CatController@add");
        $router->put("/cats/:id", "App\Controller\CatController@modify");
        break;
    default:
        $router->get("/", "App\Controller\AppController@login");
        $router->post("/", "App\Controller\AppController@login");
    
        $router->get("/cats", "App\Controller\CatController@index");
        $router->get("/lahaine", "App\Controller\AppController@addFake");
        $router->get("/logout", "App\Controller\AppController@logout"); //
        break;
}

$router->run(); ?>

