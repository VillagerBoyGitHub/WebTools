<?php include "../../config.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a ban - WebBans</title>
    <h1>Add a ban</h1>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="ign" placeholder="Player name">
        <input type="reason" name="reason" placeholder="Reason">

        <input type="text" placeholder="Banned until" name="until">
        (format the date as Year-month-day). For example, <?php echo date("Y-m-d");?>.
        <input type="submit" value="Submit" name="submit">
    </form>

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
</body>
</html>