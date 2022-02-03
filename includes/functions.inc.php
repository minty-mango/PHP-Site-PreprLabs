<?php

function pwdMatch($pwd, $rpwd) {
    if ($pwd !== $rpwd) {
        return true;
    }
    else {
        return false;
    }
}

function userExists($conn, $email) {
    $sql = "SELECT * FROM users WHERE userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $fname, $lname, $email, $pwd) {
    $sql = "INSERT INTO users (firstName, lastName, userEmail, userPassword) VALUES (?,?,?,?); ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}

function loginUser($conn, $email, $pwd) {
    $userExists = userExists($conn, $email);

    if ($userExists === false ) {
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    $pwdDatabase = $userExists["userPassword"];

    if ($pwdDatabase !== $pwd) {
        header("location: ../index.php?error=wronglogin");
        exit();
    } 
    
    session_start();
    $_SESSION["userId"] =$userExists["userId"];
    $_SESSION["userEmail"] =$userExists["userEmail"];
    header("location: ../home.php");
    exit();
    
}