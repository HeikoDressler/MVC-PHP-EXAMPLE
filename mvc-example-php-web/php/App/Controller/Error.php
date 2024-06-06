<?php

namespace App\Controller;

use Core\Controller;

class Error extends Controller
{

    public function index(): void
    {
        $this->View->render('Error/404');
    }
}