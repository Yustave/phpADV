<?php

use Philo\Blade\Blade;
use voku\helper\Paginator;



function view($path,$data = []){
    $view = APP_ROOT . "/resources/views";
    
    $cache = APP_ROOT . "/bootstrap/cache";

    $blade = new Blade($view,$cache);

    echo $blade->view()->make($path,$data)->render();

}

function make($filename,$data){
    extract($data);

    ob_start();

    require_once APP_ROOT."/resources/views/mail/".$filename.".php";

    $content = ob_get_contents();

    ob_end_clean();

    return $content;
}

function assets($link){
    echo URL_ROOT."/assets/".$link;
}

function slug($value){
    $value = preg_replace('/[^'. preg_quote('_') . '\pL\pN\s]+/u' , "", mb_strtolower($value));
    $value = preg_replace('/[ _]+/u', '-', $value);
    return $value;
}

function paginate($num_of_records,$total_record,$object){
    $pages = new Paginator($num_of_records,'p');
    $cats = $object->getPaginate($pages->get_limit());
    $pages->set_total($total_record);

    return [$cats,$pages->page_links()];
}

?>