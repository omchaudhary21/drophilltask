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
    include 'navbar.php';
    
    session_start();
if (!isset($_SESSION['username'])){
    header('location:loginpage.php');
}
    // define variable
    $firstname= $lastname = $email = $gender = $bloodgroupErr  = $qualification = "" ;
    $firstnameErr= $lastnameErr = $emailErr= $genderErr = $bloodgroup = $qualificationErr = "";
    if(isset($_POST['submit'])){
        if(empty($_POST['first_name'])){
           $firstnameErr= "firstname is empty";
           
        }else{
            $firstname=$_POST['first_name'];
            echo $firstname;
            if (!preg_match("/^[a-zA-Z]*$/",$firstname)) {  
                $firstnameErr = "Only alphabets and white space are allowed";  
            }  
            
        }
        if(empty($_POST['last_name'])){
            $lastnameErr= "lastname is empty";
            
         }else{
             $lastname=$_POST['last_name'];
             echo $lastname;
             if (!preg_match("/^[a-zA-Z]*$/",$lastname)) {  
                 $usernameErr = "Only alphabets and white space are allowed";  
             }  
             
         }
        $email = $_POST["email"];
        echo "<br>".$email;

        $query= "SELECT * FROM prob where email= '$email'";
        $result =mysqli_query($conn,$query);
        $row= mysqli_num_rows($result);
        if($row==1){
          $emailErr= "*email already used*";
         
        }
         elseif(empty($_POST["email"])){
             $emailErr= "*email is required*";

          }else{
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
                
            }  
          }
        
        if(empty($_POST['gender'])){
            $genderErr ="select gender";
        }else{
            $gender =$_POST['gender'];
            echo "<br>".$gender;
        }
        if(empty($_POST['bloodgroup'])){
            $bloodgroupErr ="select bloodgroup";
        }else{
            $bloodgroup =$_POST['bloodgroup'];
            echo "<br>".$bloodgroup;
        }
        if(empty($_POST['qualification'])){
            $qualificationErr ="select qualification";
        }else{
            $qualification =$_POST['qualification'];
            echo "<br>".$qualification;
        }
        if(!empty($firstnameErr) && !empty($lastnameErr) && !empty($emailErr) && !empty($genderErr) && !empty($bloodgroupErr) && !empty($qualificationErr) ){
            // echo" erorr found";
        }else{
        // if($firstnameErr == ""  && $lastnameErr == "" && $emailErr == ""&& $genderErr == "" && $bloodgroupErr =="" &&  $qualificationErr = "" ) {  
         $sql = "INSERT INTO prob(first_name,last_name,email,gender,bloodgroup,qualification) VALUES ('$firstname','$lastname','$email','$gender','$bloodgroup','$qualification')";
            if(mysqli_query ($conn,$sql)){
                header("location:search.php");
               echo "<br> data stored in database successfully";
               
            }else{
               echo"cannot insert into database";
               
            }
        }
    }
    ?>
    <center>
    <h2>Add User Details</h2>
    <form method="post">
    <p>
        <label for="firstname">First Name:</label>
        <input type="firstname" name="first_name" >
        <span style="color:red;">*<?php echo $firstnameErr; ?></span>
    </p>
    <p>
        <label for="lastname">Last Name:</label>
        <input type="lastname" name="last_name">
        <span style="color:red;">*<?php echo $lastnameErr; ?></span>
    </p>
    <p>
        <label for="email">email:</label>
        <input type="text" name="email">
        <span style="color:red;">*<?php echo $emailErr; ?></span>
    </p>
    <p>
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
        <span style="color:red;">*<?php echo $genderErr; ?></span>
    </p>
    <p>
        <label for="bloodgroup">Blood Group:</label>
        <select name="bloodgroup"> 
        <option value="">Select</option>
    <option value="A+">A+</option>
    <option value="B+">B+</option>
    <option value="AB+">AB+</option>
    <option value="O+">O+</option>
    <option value="A-">A-</option>
    <option value="B-">B-</option>
    <option value="AB-">AB-</option>
    <option value="O-">O-</option>
</select>
        
    </p>
    <p>
        <label for="qualification">Qualification:</label>
        <input type="text" name="qualification">
        <span style="color:red;">*<?php echo $qualificationErr; ?></span>
        
    </p>
    <input type="submit" name="submit" value="Add User">
    </form>
    
</center> 
</body>
</html>