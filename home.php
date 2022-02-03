<?php
    include_once 'header.php';
?>

    <div class='sign-in'>
        <div class="login-container">
            <h1>Food Centre</h1>
            <h2>Daily sales, coupons, and news about food worldwide here.</h2>
            <?php
                echo "<h1> Welcome ", $_SESSION["userEmail"], "</h1>";
            ?>
        </div>
    </div>
<?php
    include_once 'footer.php';
?>