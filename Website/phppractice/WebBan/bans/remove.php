<?php include "../../config.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove a ban - WebBans</title>
</head>
<body>
    <h1>Remove a ban</h1>
    <form method="post">
        <input type="text" name="ign" placeholder="Player Name">
        <input type="submit" value="Remove Ban" name="rmBan">
    </form>

    <?php
        
        if(isset($_POST["rmBan"])) {
            $ign = $_POST["ign"];
            $con->query("DELETE FROM bans WHERE `bans`.`playerID` = '$ign'");
            echo "<div class=\"msg success\">The player has been unbanned.</div>";
        }
    
    ?>
</body>
</html>