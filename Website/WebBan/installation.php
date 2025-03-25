<?php
session_start();
include "../assets/scripts/sessioncheck.php";
include("../config.php");

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
$con->query("CREATE TABLE `bans` (
`playerID` VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`banDate` DATE NOT NULL ,
`banReason` TEXT CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL
DEFAULT 'no reason' ,
`banUntil` DATE NOT NULL ,
PRIMARY KEY (`playerID`))
ENGINE = InnoDB;");
header("Location: /phppractice?db_configured=true");
} catch (mysqli_sql_exception $e) {
    echo "<div class=\"msg info\">".  $e->getMessage() . ". This means the database has already been set up. If you encounter any problems, make sure to delete the bans table.</div>";
}


/*CREATE TABLE IF NOT EXISTS `bans` (`id` INT(16) NOT NULL,
`playerID` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`banDate` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
`banReason` TEXT NOT NULL DEFAULT 'no reason',
`banUntil` DATE NOT NULL , PRIMARY KEY (`id`))
ENGINE = InnoDB;
*/