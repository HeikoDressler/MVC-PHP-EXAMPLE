<?php

namespace Core;

/**
 * base class of all controllers
 */
abstract class Controller
{

    public View $View;



    public function __construct($aViewTemplate='default')
    {

        $this->View = new View();
        $this->View->setTemplate($aViewTemplate);

    }
    abstract public function index():void;
}