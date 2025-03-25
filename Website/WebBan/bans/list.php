<?php

include ("../../config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ("../../header.php");?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banned Players</title>
    <?php include "../../assets/elements/top-bar.php"?>
    <center><h1 class="title">Banned Players</h1></center>
</head>
<body>
    
    
    <?php
    $query = $con->query("SELECT * FROM bans");
    echo "<div class=\"list\">";
    while($rows = mysqli_fetch_array($query)) {
        
        echo"<div class=\"row\"><strong>$rows[0]</strong> for <strong>$rows[2]</strong> on <strong>$rows[1]</strong> until <strong>$rows[3]</strong></div>";
    }
    echo "</div>"
?>
</body>
</html>