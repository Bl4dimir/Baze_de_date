<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_COOKIE['username']);
    unset($_COOKIE['password']);
    setcookie('username','',time()-60*60*24*365);
    setcookie('password','',time()-60*60*24*365);
    header('location:../index.php');
?>