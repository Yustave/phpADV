<?php

use App\Classes\Mail;

require_once("../bootstrap/init.php");

$mailer = new Mail();

if($mailer->send()){
    echo "<br>success";
}else{
    echo "<br>fail";
}
?>