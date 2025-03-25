<?php
$host= "176.100.36.109";
$username= "u147_B8jH6uFw2d";
$db_pass= "gnAe+RYnz2!HuiJtF4R6=V0A";

$db= "s147_db_test";
$port= 3306;

$con = mysqli_connect(
    hostname: $host,
    username: $username,
    password: $db_pass,
    database: $db,
    port: $port
);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

global $con;
global $db_pass;
?>
