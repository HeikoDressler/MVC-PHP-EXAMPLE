<?php

namespace App\Controller;

use Core\Controller;

class Admin extends Controller
{

    public function index(): void
    {
    }
    public function handleUsers(){
        $action = $_GET['action'];
        switch($action){
            case 'addUser':
               echo 'benutzer hinzugenommen';
                break;
            case 'delUser':
                echo 'benutzer gelöscht';
                break;
            case 'modUser':
                echo 'benutzer modif';
                break;

        }
    }
    public function handleRight(){

    }
}