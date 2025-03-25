<?php
$address = "45.11.229.105";
$port = 3306;
$db = "s147_db_test";
$db_user = "u147_B8jH6uFw2d";
$password = "gnAe+RYnz2!HuiJtF4R6=V0A";

//Don't modify this line.
$con = mysqli_connect(hostname: $address,username: $db_user,password: $password,database: $db, port: $port);
global $db_user;
global $password;