<title>My CV</title>
<link rel='stylesheet' href='global.css'>

<nav class="nav">
    <div class="text-wrapper">
        <span class="main-text">Priyanshu Kharel</span>
    </div>
    <div style="display:flex;flex:1;align-items:center;margin-left:20px;">
        <div style="flex:1;">
            <a href="./index.php" class="nav-a">
                Home
            </a>
        </div>
        <div>
            <?php if ($isLoggedIn) {
            ?>
                <a href="./update.php" class="button">Change Your CV</a>
                &nbsp;


                <a href="./logout.php" class="button">Logout</a>

            <?php  } else { ?>
                <a href="./login.php" class="button">Login</a>
                &nbsp;
                <a href="./register.php" class="button">Register</a>
            <?php } ?>
        </div>
    </div>
</nav>

<?php if (isset($_SESSION["message"])) {
?>
    <div class="message">
        <?php
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
        ?>
    </div>

<?php } ?>

<?php if (isset($error) || isset($_SESSION["error"])) {
?>
    <div class="error">
        <?php
        echo $error ?? $_SESSION["error"];
        unset($_SESSION["error"]);
        ?>
    </div>

<?php } ?>