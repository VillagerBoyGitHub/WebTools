<?php
$query = $con->query("SELECT * FROM `bans` ORDER BY `playerID` ASC");
echo "<div class=\"rank-list\">";
    while($row = mysqli_fetch_array($query)) {
            echo("<div class=\"rank\"><strong>$row[0]</strong></div>");
    }