<?php
  session_start();
  include "../header.php";
  include "../assets/scripts/sessioncheck.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php include "../assets/elements/top-bar.php";?>
<center><h1 class="title">WebPerms</h1></center>
  <?php

      $process = mysqli_query($con,"SHOW TABLES");
      $processed = mysqli_fetch_array($process);

    if($processed < 4) {
      
      $message = '
        <div class="msg error">
        PurePerms has not initialized the database.<br>
        Go to your PurePerms config and make sure the data-provider is set to <strong>"mysql"</strong> and not <strong>"yaml"</strong>.<br>
        Make sure the MySQL details are filled in properly in the PurePerms and WebPerms config.<br>
        If the error persists after making these changes, contact Villager Boy and send him the error code 14.
        </div>
        ';
      echo $message;

    } else {
      $message = "<div class=\"msg success\">The database has been set up properly. You can now proceed with making the groups.</div>";
      echo $message;
    }
  ?> 
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>PurePerms Web Manager</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
      
      <a class="button" href="groups/create.php">Add a group</a>
        <a class="button" href="groups/remove.php">Remove a group</a>
</body>
</html>