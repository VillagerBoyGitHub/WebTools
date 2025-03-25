<?php

        global $con;
        $query = mysqli_query($con,"SELECT * FROM `groups` ORDER BY `id` ASC");
        echo "<div class=\"list\">";
        while($row = mysqli_fetch_array($query)) {
            echo("<div class=\"row\"><strong> $row[1]</strong> <p>with an ID of</p> <strong>$row[0]</strong></div>");
        }
        echo "</div>";
?>