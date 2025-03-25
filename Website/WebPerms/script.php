<?php


function listTables() {
    global $con;
    $row = mysqli_query($con, "SHOW TABLES");
    $result = mysqli_fetch_array($row);
    return strval($result[0]);
}


if (isset($_POST['submit'])) {

    listTables();
    
}