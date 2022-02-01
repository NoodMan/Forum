<?php

namespace App;

session_start();

require_once('vendor/autoload.php');

use Router\Router;
$router = new Router($_GET['url']);

$router->get("/articles/:id", "App\Controller\ArticleController@show");

$router->get("/user", "App\Controller\UserController@add");
$router->post("/user", "App\Controller\UserController@add");

$router->get("/article", "App\Controller\ArticleController@add");
$router->post("/article", "App\Controller\ArticleController@add");

$router->get("/article/:id", "App\Controller\ArticleController@modify");
$router->post("/article/:id", "App\Controller\ArticleController@modify");

$router->get("/user/:id", "App\Controller\UserController@modify");
$router->post("/user/:id", "App\Controller\UserController@modify");

$router->post("/note/:id", "App\Controller\NoteController@add");

$router->get("/deletearticle/:id", "App\Controller\ArticleController@delete");

$router->get("/deleteuser/:id", "App\Controller\UserController@delete");


$router->get("/", "App\Controller\LoginController@login"); //ne fonctionne pas probleme router ou eh!!


$router->run();
