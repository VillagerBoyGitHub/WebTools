
<?php
session_start();
include "../../assets/scripts/sessioncheck.php";
include "../../config.php";

global $con;


?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
include "../../header.php";
include "../../assets/elements/top-bar.php"
?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="body-form-container">
    <h1 class="title">Remove a group</h1>
    <div class="form-container">
        <div class="form-header">    <center><img src="../assets/images/logo.png" width="200px"/></center></div>
    <form method="post">
        <input name="id" placeholder="Group ID"><br>
        <input type="submit" name="remove" value="remove" class="form-button">
        
        <br><br>
        
        <?php

            if(array_key_exists("remove", $_POST)) {
                    $id = $_POST["id"];
                    mysqli_query($con,"DELETE FROM groups WHERE `groups`.`id` = $id");
                    echo "This group has been successfully deleted.<br><br>";
            }

            global $con;
            $query = mysqli_query($con,"SELECT * FROM `groups` ORDER BY `id` ASC");
                
            while($row = mysqli_fetch_array($query)) {
                echo("<strong> $row[1]</strong>" . " with an ID of <strong>$row[0]</strong>" ."<BR>");
            }
            

        ?>
    </form>
</div>
    <?php
    
    
    //DELETE FROM groups WHERE `groups`.`id` = 5
    
    

    ?>
</div>
</body>
</html>
