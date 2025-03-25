<?php
session_start();
include "../../config.php";
include "../../assets/scripts/sessioncheck.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../../header.php";?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove a ban - WebBans</title>
    <?php include "../../assets/elements/top-bar.php";?>
</head>
<body>

<div class="body-form-container">
    <h1 class="title" style="margin-bottom:20px!important">Remove a ban</h1>
    <div class="form-container">
    <div class="form-header">
        
        <img src="/assets/images/logo.png" alt="" width="200px" style="margin-bottom: 15px;">
        <h2>Unban a player from the server</h2>
    <!--
    Next update will contain ban duration, stay tuned!
    
    <h2>Ban someone from the server</h2>
    (format the date as Year-month-day).<br> For example, <?php //echo date("Y-m-d");?>.
    
    -->
    </div>

    <form method="post">
        <input type="text" name="ign" placeholder="Player Name">
        <input type="submit" value="Remove Ban" name="rmBan" class="form-button">
    </form>
    <div class="form-footer">
        <a href="remove.php">Add a ban</a>
        <a href="list.php">List bans</a>
    </div>
    <?php
        
        if(isset($_POST["rmBan"])) {
            $ign = $_POST["ign"];
            $con->query("DELETE FROM bans WHERE `bans`.`playerID` = '$ign'");
            echo "<div class=\"msg success\">The player has been unbanned.</div>";
        }
    
    ?>
</div>
</div>
    </div>
</body>
</html>