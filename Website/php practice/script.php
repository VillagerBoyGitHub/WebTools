<?php
namespace phppractice;
class Script {
function connect() {
    $con = mysqli("176.100.36.109", "u147_B8jH6uFw2d", "gnAe+RYnz2!HuiJtF4R6=V0A", "s147_db_test");
}

function listTables() {
mysqli_query($con, "USE s147_db_test");
$row = mysqli_query($con, "SHOW TABLES");
$result = mysqli_fetch_array($row);
return strval($result[0]);
}
}