<?php

use Carbon\Carbon;
use Philo\Blade\Blade;
use voku\helper\Paginator;
use Illuminate\Database\Capsule\Manager as Capsule;


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

function paginate($num_of_records,$total_record,$table_name){
    $categories = [];
    $pages = new Paginator($num_of_records,'p');
    $cats = Capsule::select("SELECT * FROM $table_name ORDER BY id DESC ". $pages->get_limit());
    $pages->set_total($total_record);

    foreach ($cats as $cat) {
        $date = new Carbon($cat->created_at);
        array_push($categories, [
            "id" => $cat->id,
            "name" => $cat->name,
            "slug" => $cat->slug,
            "created" => $date->toFormattedDateString()
        ]);
    }

    return [$categories,$pages->page_links()];
}

?>