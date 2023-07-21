<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
    include 'connect.php';
    // error_reporting(0);
    // define variable
    $username= $email = $password= $confirm_password= "" ;
    $usernameErr= $emailErr = $passwordErr= $confirm_passwordErr = "";
    if(isset($_POST['submit'])){
        if(empty($_POST['uname'])){
           $usernameErr= "username is empty";
           
        }else{
            $username=$_POST['uname'];
            echo $username;
            if (!preg_match("/^[a-zA-Z]*$/",$username)) {  
                $usernameErr = "Only alphabets and white space are allowed";  
            }  
            
        }
        $email = $_POST["email"];
        $query= "SELECT * FROM problem where email= '$email'";
        $result =mysqli_query($conn,$query);
        $row= mysqli_num_rows($result);
        if($row==1){
          $emailErr= "*email already used*";
         
        }
         elseif(empty($_POST["email"])){
             $emailErr= "*email is required*";

          }else{
             // $email = $_POST["email"];
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
          }
        // if(empty($_POST['email'])){
        //     $emailErr ="email is empty";
        // }else{
        //     $email =$_POST['email'];
        //     echo "<br>".$email;
        //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
        //         $emailErr = "Invalid email format";  
        //     }  
        // }
        if(empty($_POST['password'])){
            $passwordErr ="password shouldn't be empty";
        }else{
            $password =$_POST['password'];
            echo "<br>".$password;
        }
        if(empty($_POST['confirm_password'])){
            $confirm_passwordErr ="confirm_password shouldn't be empty";
        } elseif($_POST["password"] != $_POST["confirm_password"]){
            $confirm_passwordErr= " password doesn't match pls write correct password";
        }
        else{
            $confirm_password =$_POST['confirm_password'];
            echo $confirm_password;
        }
        if($usernameErr == "" && $emailErr == "" && $passwordErr == "" && $confirm_passwordErr == "" ) {  
         $sql = "INSERT INTO problem (username,email,password ,confirm_password) VALUES ('$username','$email','$password','$confirm_password')";
            if(mysqli_query ($conn,$sql)){
                header("location:signupboard.php");
               echo "<br> data stored in database successfully";
               
            }else{
               echo"cannot insert into database";
               
            }
        }
    }
    ?>
    <center>
    <h2>Signup Page</h2>
    <form method="post">
    <p>
        <label for="username">Username:</label>
        <input type="text" name="uname" >
        <span style="color:red;">*<?php echo $usernameErr; ?></span>
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="text" name="email">
        <span style="color:red;">*<?php echo $emailErr; ?></span>
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" name="password">
        <?php echo $passwordErr; ?>
    </p>
    <p>
        <label for="Confirm password">Confirm Password:</label>
        <input type="password" name="confirm_password">
        <?php echo $confirm_passwordErr; ?>
        
    </p>
    <input type="submit" name="submit" value="Register">
    <p>Already have an account? <a href="loginpage.php">Login here</a>.</p>
    </form>
    
</center> 
</body>
</html>