<?php
session_start();
include __DIR__ . "/header.php";
include  __DIR__ ."/assets/scripts/sessioncheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ ."/assets/elements/top-bar.php";
    if(isset($_GET["db_configured"])) {
        echo "<div class=\"msg success\">Your database has been set up properly.</div>";
    }
    ?>

    <link rel="stylesheet" href="assets/css/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebTools</title>
</head>
<?php
try {
    $con-> query("SELECT * FROM bans");
} catch (mysqli_sql_exception $e) {

    echo "<div class=\"error\">You haven't set up your database for WebBan. <a href=\"WebBan/installation.php\">Click here</a> to set up your database properly.</div>";
}
try {
    $con->query("SELECT * FROM groups");
    $con->query("SELECT * FROM groups_mw");
    $con->query("SELECT * FROM players");
    $con->query("SELECT * FROM players_mw");
} catch (mysqli_sql_exception $e) {

    echo 
    "<div class=\"error\">You haven't set up your database for WebPerms. Make sure you have started WebPerms and added the database details properly.
    <a href=\"WebPerms/installation.php\">Click here</a> if you want the website to setup the database automatically. This isn't recommended because PurePerms should configure the database If there is a problem, it's likely in the PurePerms configuration. 
    </div>";
}


?>
<body>
    <center><h1 class="title">WebTools</h1>
    <h4>Best website to avoid long commands.</h4></center>

    <div class="homepage-links">
        <div>
            <a href="webBan/" class="main-a">
                <img style="border-right: 2px solid #fff;" src="assets/images/banhammer.png" width="48">
                <p>Manage bans</p>
            </a>
            <a class="sub-a" href="">Ban someone</a>
            <a class="sub-a" href="">Unban someone</a>
        </div>
        <div>
            <a href="WebPerms/" class="main-a">
                <img src="assets/images/banhammer.png" width="48">
                <p>Manage ranks</p>
            </a>
            
            <a class="sub-a" href="WebPerms/groups/create.php">Add a rank</a>
            <a class="sub-a" href="WebPerms/groups/remove.php">Remove a rank</a>
        </div>
    </div>
</body>

<?php include __DIR__ ."/assets/scripts/footer.php";?>
</html>