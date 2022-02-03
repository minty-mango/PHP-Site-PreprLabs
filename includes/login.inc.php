<?php

if (isset($_POST["submit"])) {
    
    $userEmail = $_POST["uname"];
    $userPwd   = $_POST["psw"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    loginUser($conn, $userEmail, $userPwd);
}
else {
    header("location: ../index.php");
    exit();
}