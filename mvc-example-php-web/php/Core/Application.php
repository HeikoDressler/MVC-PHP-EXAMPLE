<?php

namespace Core;

use App\Controller\Error;

class Application
{
    public function __construct()
    {
    }

    public function run()
    {
        // Request Get
        $Controller = 'Standard';
        $Method = 'index';
        $URL = $this->splitUrL();
        if (\array_key_exists(0, $URL)) {
                $Controller = ucfirst($URL[0]);
        }
        if (\array_key_exists(1, $URL) && !empty($URL[1])) {
            $Method = $URL[1];
            unset($URL[1]);
        }
        $this->createController($Controller, $Method);
    }

    private function createController($Controller, $Method): void
    {
        $ControllerName = 'App\\Controller\\' . $Controller;
        if (class_exists($ControllerName)) {
            $Controller = new $ControllerName(DEFAULT_TEMPLATE);
            if (method_exists($Controller, $Method)) {
                $Controller->$Method();
            } else {
                $Controller->index();
            }
        }else{
            $Controller = new Error(DEFAULT_TEMPLATE);
            $Controller->index();
        }
    }

    /**
     * split url by /
     * @return array
     */
    private function splitUrL(): array
    {
        $URL = $_GET['url'] ?? 'Home';
        return explode('/', trim($URL, '/'));
    }
}