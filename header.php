<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='css/style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;900&display=swap" rel="stylesheet">
    <title>SPAM</title>
</head>
    <body> 
        <!-- Main Page -->
        <div class='navbar'>
            <div class='navbar-items'>
                <?php
                if(isset($_SESSION["userEmail"])) {
                    echo "<a href='includes/logout.inc.php'>Log out </a>";
                } 
                else {
                    echo "<a href='index.php'>Login</a>";
                    echo "<a href='signup.php'>Sign Up</a>";
                }
                ?>
            </div>
        </div>