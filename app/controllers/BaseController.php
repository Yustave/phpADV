<?php

namespace App\controllers;

class BaseController{

    public function index(){
        echo __METHOD__."method of ". __CLASS__;
    }
}

?>