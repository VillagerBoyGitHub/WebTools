<?php
session_start();
include "../config.php";
include "../assets/scripts/sessioncheck.php";
include "../assets/elements/top-bar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <center><h1 class="title">WebPerms</h1>
    <h2>the easiest ban system without <br>
        having to type long commands.</h2>
    </center>
    <?php include "../header.php";?>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebBans</title>
    
</head>
<body>
    
    <?php
        try {
            include "assets/scripts/listBans.php";
            $con->query("SELECT * FROM bans");

        } catch (mysqli_sql_exception $e) {
            $msg = $e->getMessage();
            echo "<div class=\"msg error\">{$msg}. This means your database hasn\'t been set up for WebBan. <a href=\"installation.php\">Click here</a> to set it up.</div>";
        }
    
    ?>
        <a class="button" href="bans/add.php">Add a ban</a>
        <a class="button" href="bans/remove.php">Remove a ban</a>
</body>
</html>