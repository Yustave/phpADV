<?php

namespace App\Classes;

use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

class ErrorHandler{

    public function __construct(){
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler);
        $whoops->register();
    }

    // public function handelErrors($error_number,$error_file){
       
    // }
}

?>