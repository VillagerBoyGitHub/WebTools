<?php
session_start();
include __DIR__ . "/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="body-form-container">
        <div class="form-container">
        <div class="form-header">
            <img src="assets/images/logo.png" width="200px">
            <h1>Welcome to WebPerms</h1>
            <h4>Please login to start your session.</h4>
        <?php
         
            if(isset($_GET["notloggedin"])) {
                echo "<div class=\"msg error\">You need to login before using the website.</div>";
            } else if (isset($_GET["loggedout"])) {
                echo "<div class=\"msg success\">You have successfully logged out.</div>";
            } else if (isset($_GET["passincorrect"])) {
                echo "<div class=\"msg error\">The password is incorrect.</div>";
            }
        ?>
        </div>
            <form action="" method="post">
                <input type="password" placeholder="Database Password" name="pass">
                <input type="submit" name="login" value="Login">
            </form>
    <?php

    if(isset($_POST["login"])) {
        $login = $_POST["pass"];
        if($login == $password) {
            $_SESSION["DB_PASS"] = $password;
            header("Location: index.php");
            
        } else {
            header("Location: login.php?passincorrect=true");
        }


    }
    ?>
    
    </div>
</div>
</body>
</html>