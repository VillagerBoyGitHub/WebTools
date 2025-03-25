<?php
/*
    
 ░██╗       ██╗███████╗██████╗ ██████╗ ███████╗██████╗ ███╗   ███╗ ██████╗
 ░██║░░██╗░░██║██╔════╝██╔══██╗██╔══██╗██╔════╝██╔══██╗████╗░████║██╔════╝
 ░╚██╗████╗██╔╝█████╗░░██████╦╝██████╔╝█████╗░░██████╔╝██╔████╔██║╚█████╗░
 ░░████╔═████║░██╔══╝░░██╔══██╗██╔═══╝░██╔══╝░░██╔══██╗██║╚██╔╝██║░╚═══██╗
 ░░╚██╔╝░╚██╔╝░███████╗██████╦╝██║░░░░░███████╗██║░░██║██║░╚═╝░██║██████╔╝
 ░░░╚═╝░░░╚═╝░░╚══════╝╚═════╝░╚═╝░░░░░╚══════╝╚═╝░░╚═╝╚═╝░░░░░╚═╝╚═════╝░

 Made by Villager Boy.
 Website: https://villagerboy.com
 YouTube: https://youtube.com/@LookedRobob

 This class contains the form to create a rank.

*/


    global $con;
    include "../../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<header>
    

        </div>
        <?php


        include "../header.html";
        ?>
    <title>Document</title>
</header>
<body>
<div class="form-container">
    <center><img src="../assets/images/logo.png" width="128px"/></center>
    <form method="post">
        
        <input name="groupName" placeholder="Group Name" required>
        <input name="perms" placeholder="Permissions" required>
        <input name="alias" placeholder="Alias">
        <input name="inheritance" placeholder="Inheritance">
        <input name="pass" placeholder="Database Password" required>
        <input class="button" type="submit" name="submit" required>
    </form>
    <?php
    
    echo "Created groups:";
    $query = mysqli_query($con,"SELECT * FROM `groups` ORDER BY `id` ASC");
    echo "<div>";
    while($row = mysqli_fetch_array($query)) {
        echo("<div><p style=\"margin:0;\"><strong> $row[1]</strong>" . " with an ID of <strong>$row[0]</strong></p></div>");
    }
    echo "</div>";
    ?>
    <div class="form-footer">
        <a href="/">Back to homepage</a>
        <a href="remove.php">Remove a group</a>
        <a href="edit.php">Edit a group</a>
        <a href="/">List groups</a>
    </div>
</div>

    <?php
    

if(array_key_exists("submit", $_POST)) {
    $pass = $_POST["pass"];
    if($pass != $db_pass) {
        
        echo ("<div class=\"msg error\">Your database password is incorrect.</div>");

    } else {

            $groupName = $_POST["groupName"];
            $perms = $_POST["perms"];
            $alias = $_POST["alias"];
            $inheritance = $_POST["inheritance"];
            $id = rand(0, 100);
            $highest_id = mysqli_fetch_array( mysqli_query($con, "SELECT MAX(id) FROM groups"));
            $newid = $highest_id["0"] + 1;
            mysqli_query($con,"INSERT INTO `groups` (`id`, `groupName`, `alias`, `isDefault`, `inheritance`, `permissions`) VALUES (
            '$newid',
            '$groupName',
            '$alias',
            '0',
            '$inheritance',
            '$perms');
            "); //Submits the input
            echo 'Success! You can now return to your game and assign the rank.
        
            <a href="list.php">Back to list</a>
            ';
        }
}


    ?>
</body>
</html>