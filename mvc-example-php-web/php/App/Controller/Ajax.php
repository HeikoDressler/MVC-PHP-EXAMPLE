<?php

namespace App\Controller;

use Core\Controller;

class Ajax extends Controller
{

    public function __construct($aViewTemplate = 'ajax')
    {
        parent::__construct($aViewTemplate);
        $this->View->Data=['ajax' => true];
    }
    public function index(): void
    {
        $this->doRender();
    }
    protected function doRender() {
        $this->View->render('Ajax/index');
    }
    public function getInvoices() {
        // lade
        $this->View->Data=['1234' => ['blo', 'bla']];
        $this->doRender();
    }
}