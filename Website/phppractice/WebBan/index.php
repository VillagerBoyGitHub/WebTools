<?php
include __DIR__ ."../config.php";
include __DIR__ ."../assets/scripts/sessioncheck.php";
include __DIR__ . "../assets/elements/top-bar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../header.php";?>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1>WebBans - the easiest ban system without having to type long commands.</h1>
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
</body>
</html>