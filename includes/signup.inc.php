<?php

if (isset($_POST["submit"])) {
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $rpwd = $_POST['rpwd'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (pwdMatch($pwd, $rpwd) !== false) {
        header("location: ../signup.php?error=passwordnotmatch");
        exit();
    }

    if (userExists($conn, $email) !== false) {
        header("location: ../signup.php?error=emailtaken");
        exit();
    }

    createUser($conn, $fname, $lname, $email, $pwd);
}

else {
    header("location: ../signup.php?error=notaccess");
    exit();
}