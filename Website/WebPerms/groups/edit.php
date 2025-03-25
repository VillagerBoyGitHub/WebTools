<?php
    session_start();
    include ("../../config.php");
    unset( $isLoaded);
    include "../../assets/scripts/sessioncheck.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php         include "../../header.php";
        include "../../assets/elements/top-bar.php";?>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a group - WebPerms</title>
</head>
<body>
    <div class="body-form-container">
    <center><h1 class="title">Edit a group</h1></center>
<div class="form-container">
<div class="form-header">

    <?php
    // backend script
        if(array_key_exists("edit", $_POST)) {

            
            $pass = $_POST["pass"];
            if($pass != $db_pass) {
                
                echo ("<div class=\"msg error\">Your database password is incorrect.</div>");
        
            } else {
                    $inputid = $_POST["groupID"]; // Assign a variable to each input field.
                    $gname = $_POST["groupName"];
                    $aliass = $_POST["alias"];
                    $inherit = $_POST["inheritance"];
                    $perms = $_POST["perms"];
                    $default = $_POST["isdefault"];

                    mysqli_query($con,"UPDATE `groups` SET
                    `groupName` = '$gname',
                    `alias` = '$aliass',
                    `isDefault` = '$default',
                    `inheritance` = '$inherit',
                    `permissions` = '$perms'
                    WHERE `groups`.`id` = $inputid");


                    echo 'Success! You can now return to your game and assign the rank.
                
                    <a href="list.php">Back to list</a>
                    ';
                }
        }

    // UPDATE `groups` SET `groupName` = '$gname', `alias` = '$aliass', `isDefault` = '$default', `inheritance` = '$inherit', `permissions` = '$perms' WHERE `groups`.`id` = $gid;
        
    
    ?>
    <center><img src="../assets/images/logo.png" width="200px"/>
    <div class="desc-container">
    <p>Fill out the form inputs only for the properties you need to change. Whatever you don't need to change can be left blank.</p></center>
    </div>
    
    
    <form method="post">
    
    
    <input name="groupID" placeholder="Group ID">
    <input class="form-button" type="submit" name="load" value="Get values">
    
    <?php
    if(array_key_exists("load", $_POST)) {
        $inputid = $_POST["groupID"];
        $stmt = $con->prepare("SELECT groupName, alias, isDefault, inheritance, permissions FROM groups WHERE id = ?");
        $stmt->bind_param("i", $inputid);
        $stmt->execute();
        $stmt->bind_result($groupName, $alias, $isDefault, $inheritance, $permissions);
        $stmt->fetch();
        $stmt->close(); //We need to.
        global $groupName, $alias, $isDefault, $inheritance, $permissions;
        $inputs = '
        <input name="groupName" placeholder="Group Name" value="' . $groupName. '">
        <input name="alias" placeholder="Alias" value="' . $alias. '">
        <input name="isdefault" placeholder="Default" value="' . $isDefault. '">
        <input name="inheritance" placeholder="Inheritance" value="' . $inheritance. '">
        <textarea name="perms" placeholder="Permissions">' . $permissions. '</textarea>
        <input name="pass" placeholder="Database Password">
        <input class="form-button" name="edit" type="submit" value="Edit">
        '; //Once the load button is clicked, it will echo out these inputs.
        echo $inputs;
    }

    ?>

</form>
<?php
echo "<div>Created groups:";
    $query = mysqli_query($con,"SELECT * FROM `groups` ORDER BY `id` ASC");
    echo "";
    while($row = mysqli_fetch_array($query)) {
        echo("<div><p style=\"margin:0;\"><strong> $row[1]</strong>" . " with an ID of <strong>$row[0]</strong></p></div>");
    }
    echo "</div>";?>
</div>  
    </div>

    </div>
</body>
</html>