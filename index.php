<?php
    include_once 'header.php';
?>

    <div class='sign-in'>
        <div class="login-container">
            <h1>Food Centre</h1>
            <h2>Daily sales, coupons, and news about food worldwide here.</h2>

            <form action='/includes/login.inc.php' method='post'>
                <div class="form-container">
                    <input id="username" type="text" placeholder="Enter Username" name="uname" required>
                    <br>
                    <input id="password" type="password" placeholder="Enter Password" name="psw" required>
                    <br>
                    <label> <input id='remember' type="checkbox" checked="checked" name="remember"> Remember me </label>
                    <br>
                    <button id="submit-button" type="submit">Login</button>
                  </div>    
            </form>
            <br>
            <a href=#>Forgot Password</a>
            <a href="signup.php">Sign up?</a>
        </div>
    </div>
<?php
if (isset($_GET["error"])) {
    if($_GET["error"] == "wronglogin") {
        echo "<script> alert(\"Incorrect Login Information\") </script>";
    }
}
?>
<?php
    include_once 'footer.php';
?>