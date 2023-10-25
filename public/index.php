<?php
// use Whoops\Run;
// use App\Classes\Mail;
// use Whoops\Handler\PrettyPageHandler;

require_once("../bootstrap/init.php");
// use App\Classes\ValidateRequest;
// $post = [
//     "name"=>"Bruce Lee",
//     "age"=>20,
//     "email"=>"tester1@gmail.com"
// ];

// $policy = [
//     "name" => ["string"=>true, "minLength"=>"5"],
//     "age" => ["number"=>true, "minLength"=>"2"],
//     "email"=> ["email"=>true, "maxLength"=> "25"]
// ];

// $validator = new ValidateRequest();
// $validator->checkVaidate($post,$policy);

// if($validator->hasError()) {
//     beautify($validator->getErrors());
// }else {
//     echo "Good To Go!";
// }

// $whoops = new Run;
// $whoops->pushHandler(new PrettyPageHandler);
// $whoops->register();

// $mailer = new Mail();

// $body = "To sign up for Gmail, create a Google Account.
//          You can use the username and password to sign in to Gmail and other Google products like YouTube, 
//          Google Play, and Google Drive.";

// $data = [
//     "to"=>"mizukiakaman@gmail.com",
//     "to_name"=>"Yustave",
//     "content"=>$body,
//     "subject"=>"Testing",
//     "filename"=>"home",
//     "img_link"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwQvqanVnOdFV6vhw4KZSvodolpfLVAbnB8w&usqp=CAU"
// ];

// $mailer->send();
// if($mailer->send($data)){
//     echo "<br>success";
// }else{
//     echo "<br>fail";
// }
