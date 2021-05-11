<?php 
require "sendMailL.php";

//isset($_POST['mail'])

if(
    sendMail($_POST['mail'])
    ){
        print  json_encode(array("success"=>true));
}
else{
    
    print json_encode(array("success"=>false));
}