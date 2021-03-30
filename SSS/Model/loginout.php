<?php
    session_start();
    $_SESSION['mail'];

    session_reset();
    session_destroy();

    header("location:../View/LoginTec.php");