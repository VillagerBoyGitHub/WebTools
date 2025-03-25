
<?php

include "../config.php";

global $con;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post">
        <input name="id" placeholder="Group ID"><br>
        <input name="pass" placeholder="Database password" required><br>
        <input type="submit" name="remove" value="remove">
        
        <br><br>
        
        <?php

            if(array_key_exists("remove", $_POST)) {
                $pass = $_POST["pass"];
                if($pass != $db_pass) {
                    echo ("<div class=\"msg error\">Your database password is incorrect.</div>");
            
                } else {
                    $id = $_POST["id"];
                    mysqli_query($con,"DELETE FROM groups WHERE `groups`.`id` = $id");
                    echo "This group has been successfully deleted.<br><br>";
                }
            }

            global $con;
            $query = mysqli_query($con,"SELECT * FROM `groups` ORDER BY `id` ASC");
                
            while($row = mysqli_fetch_array($query)) {
                echo("<strong> $row[1]</strong>" . " with an ID of <strong>$row[0]</strong>" ."<BR>");
            }
            

        ?>
    </form>
    <?php
    
    
    //DELETE FROM groups WHERE `groups`.`id` = 5
    
    

    ?>
</body>
</html>
