<?php
//include csession.php file on all user panel pages
// include("csession.php");
include 'dash.php';



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LoginDashboard</title>

</head>
<body>
    <center>
    <div class="form">
        <p>Hi <?php echo $_SESSION['username']; ?>!</p>
        <p>welcome to dashboard page</p>
        <p><a href="logoutpage.php">Logout</a></p>
    </div>
    </center>
</body>
</html>