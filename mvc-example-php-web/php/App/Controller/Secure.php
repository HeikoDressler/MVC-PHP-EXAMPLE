<?php

namespace App\Controller;

use Core\Controller;

class Secure extends Controller
{

    public function index(): void
    {
        $this->View->render('Secure/login');
    }
}