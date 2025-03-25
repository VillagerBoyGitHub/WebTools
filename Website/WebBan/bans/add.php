<?php
session_start();
include "../../config.php";
include "../../assets/scripts/sessioncheck.php";
$root = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $root . "/header.php";?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a ban - WebBans</title>
    <?php include "../../assets/elements/top-bar.php";?>
</head>
<body>
    
<div class="body-form-container">
    <center><h1 class="title">Add a ban</h1></center>
    <div class="form-container">
    <div class="form-header">
    <img src="/assets/images/logo.png" alt="" width="200px">
    
    <!--
    Next update will contain ban duration, stay tuned!
    
    <h2>Ban someone from the server</h2>
    (format the date as Year-month-day).<br> For example, <?php //echo date("Y-m-d");?>.
    
    -->
    </div>
    <form action="" method="post">
        <input type="text" name="ign" placeholder="Player name">
        <input type="reason" name="reason" placeholder="Reason">

        <input type="text" placeholder="Coming soon..." name="until" disabled>
        
        <input type="submit" value="Submit" name="submit" class="form-button">
    </form>
    <div class="form-footer">
        <a href="remove.php">Remove a ban</a>
        <a href="list.php">List bans</a>
    </div>
</div>
    <?php
        
        if(isset($_POST["submit"])){
            $ign = $_POST["ign"];
            $reason = $_POST["reason"];
            $until = $_POST["until"];
            $currentDate = date("Y-m-d");

            // INSERT INTO `bans` (`playerID`, `banDate`, `banReason`, `banUntil`) VALUES ('asdasdasd', '2025-03-23', 'no reason', '2025-03-30');
            //INSERT INTO `bans` (`playerID`, `banDate`, `banReason`, `banUntil`) VALUES ('LookedRobob', '2025-03-23', 'no reason', '2025-03-31')
            $con->query("INSERT INTO `bans` (`playerID`, `banDate`, `banReason`, `banUntil`) VALUES ('{$ign}', '{$currentDate}', '{$reason}', '{$until}')");
        }
    ?>
    </div>
</body>
</html>