<?php

if (isset($_POST["submit"])) {

    $email = $_POST["uname"];
    $pwd = $_POST["psw"];

    require_once "dbh.inc.php";
    require_once 'functions.inc.php';

    loginUser($conn, $email, $pwd);
}

else {
    header("location: ../index.php?error=notaccess");
    exit();
}