<?php

namespace App\Controller;

use Core\Controller;

class Standard  extends Controller
{

    public function index(): void
    {
            $this->View->render('Standard/index');
    }

    public function help():void{
        $this->View->render('Standard/help');
    }
}