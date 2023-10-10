<?php

namespace App\Routing;

use AltoRouter;
class RouteDispacher{

    private $match;
    private $controller;
    private $method;

    public function __construct(AltoRouter $router){
        $this->match = $router->match();
        if($this->match){
            list($controller,$method) = explode("@",$this->match['target']);
            
            $this->controller = $controller;
            $this->method=$method;

            if(is_callable([new $this->controller,$this->method])){
                call_user_func_array([new $this->controller,$this->method],$this->match["params"]);
            }else{
                echo "Not Callable";
            }

        }else{
            header($_SERVER["SERVER_PROTOCOL"]. "404 NOT FOUND!");
            echo "not match";
        }
    }
}

?>