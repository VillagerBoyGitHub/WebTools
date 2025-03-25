<?php
session_start();
include ("../../config.php");
include "../../assets/scripts/sessioncheck.php";

$error = "<h1>There is something wrong with your database. Here's what you can do:</h1> <br>
    <p>Make sure you have started PurePerms in your Minecraft server already.</p>
    <p>Make sure you have connected PurePerms to your MySQL database.</p>
    <p>Make sure you have connected this panel to your MySQL database.</p>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../../header.php";?>
    <center><h1 class="title">Current ranks</h1></center>
</head>
<body>
<?php
    
    include "../assets/scripts/listRanks.php";
?>
            
            <a href="create.php">Create Rank</a>

</body>
</html>