<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
    session_start();
    include 'connect.php';
    // echo "data base connected";
    // Intitalize username and password
$usernameErr = $passwordErr="";
$username = $password = "";
    if(isset($_POST['submit'])){
        if(empty($_POST['username'])){
           $usernameErr= "enter your username";
           
        }else{
            $username=$_POST['username'];
            // echo $username;
        }
             if(empty($_POST['password'])){
        $passwordErr="enter password";
    }else{
        $password = $_POST["password"];
        // echo $password;
    }
    $sql = "SELECT username FROM problem WHERE username='$username'
                     AND password='$password'";
        // echo "sql ".$sql;
        $result = mysqli_query($conn, $sql);
        // var_dump($result);
        $rows = mysqli_num_rows($result);
        // echo "number of rows ".$rows;
        // var_dump($rows);exit;
        if ($rows) {
            $_SESSION['username'] = $_POST['username'];
            header("location:logindboard.php");
            echo "<br>Dashboard";
            
        }else {
                echo "you have don't have an account signup for new account !";
            }
        }
    ?>
<center>
    <h2>Login Page</h2>
    <form action=""method="post">
       <p><label for="username">Username:</label>
       <input type="text" name="username" id=>
       <box-icon type='solid' name='user'></box-icon>
       <span style="color:red;"><?php echo $usernameErr; ?></span>
    </p> 
    <p><label for="password">Password:</label>
       <input type="password" name="password" >
       <span style="color:red;"><?php echo $passwordErr; ?></span>
    </p> 
    <input type="submit" name ="submit" value="Login"> 
    <p>Don't have an account? <a href="validation.php">Sign up now</a>.</p>
</form>
</center>
</body>
</html>