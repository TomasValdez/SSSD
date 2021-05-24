<?php 
require "sendMailL.php";



if(sendMail($_POST['mail']) ){
        echo  json_encode(array("success"=>true));
}
else{
    
    echo json_encode(array("success"=>false));
}


