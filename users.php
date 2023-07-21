
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
        <p><label for="bloodgroup">Blood Group:</label>
        <select name="icon"> 
    <option value="dashboard"><a href="dash.php">Dashboard</a></option>
    <option value="logout"><a href="loginpage.php">Logout</a></option>
    </p>
</select>
    </div>
    </center>
</body>
</html>