<?php

function pwdMatch($pwd, $rpwd) {
    if ($pwd !== $rpwd) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function uidExist($conn, $email) {
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
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $fname, $lname, $email, $pwd) {
    $sql = "INSERT INTO users (firstname, lastname, userEmail, userpwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function loginUser($userEmail, $userPwd) {
    $uidExist = uidExist($conn, $email);

    if ($uidExist === false){
        header("location: ../signup.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExist["userPwd"];
    $checkPwd  = password_verify($userPwd, $pwdHashed);

    if ($checkedPwd === false) {
        header("location: ../signup.php?error=wronglogin");
        exit();
    }
    else if ($checkedPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExist["usersId"];
        $_SESSION["userEmail"] = $uidExist["userEmail"];
        header("location: ../home.php");
        exit();
    }
}