<?php
    include_once 'header.php';
?>

    <div class='sign-in'>
        <div class="login-container">
            <h1>Sign Up</h1>

            <form action="includes/signup.inc.php" method='post'>
                <div class="form-container">
                    <input id="first-name" type="text" placeholder="First name" name="fname" required>
                    <input id="last-name" type="text" placeholder="Last Name" name="lname" required>
                    <br>
                    <input id="email" type="email" placeholder="Email Address" name="email" required>
                    <br>
                    <input id="password" type="password" placeholder="Enter Password" name="pwd" required>
                    <br>
                    <input id="c-password" type="password" placeholder="Confirm Password" name="rpwd" required>
                    <br>
                    <button id="submit-button" name="submit">Login</button>
                </div>    
            </form>
            <br>
        </div>
    </div>

<?php 
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "passwordnotmatch") {
            echo "<script> alert(\"Passwords do not match.\") </script>";
        }
        else if ($_GET["error"] == "emailtaken") {
            echo "<script> alert(\"Email is already registered. \") </script>";
        }
        else if ($_GET["error"] == "none") {
            echo "<script> alert(\"You successfully signed up. \") </script>";
        }
    }
?>
<?php
    include_once 'footer.php';
?>