<?php

class SessionClass{
    
    function setMail($mail){
        session_start();
        $_SESSION['mail']=$mail;
    }
    function getMail(){
        session_start();
        $mail=$_SESSION['mail'];
        return $mail;
    }

    function setError($error){
        session_start();
        $_SESSION['error']=$error;
    }

    function getError(){
        session_start();
        $mail=$_SESSION['error'];
        return $mail;
    }
    

}