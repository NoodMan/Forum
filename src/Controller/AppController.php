<?php

namespace App\Controller;

use Router\Router;

final class AppController extends AbstractController
{

    public function index(): void
    {
        print_r("Hello World");
    }

    public function error404(): void
    {
        Router::redirect("404");
    }
}



