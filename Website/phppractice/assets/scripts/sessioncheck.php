<?php
if (!isset($_SESSION["DB_PASS"])) {
    header("Location: login.php?notloggedin=true");
    $_SESSION["DB_PASS"] = null;
    exit(); // Always exit after header redirection
}

?>