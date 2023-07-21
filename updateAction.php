<?php
include "connect.php";
if(isset($_POST["update"])){
    $username = $_POST["username"];
    $id = $_POST["id"];           
     $email = $_POST["email"];
     $password = $_POST["password"];
     $confirm_password = $_POST["confirm_password"];
     echo $username,$email, $password, $confirm_password, $id;
     
     $query = "UPDATE problem SET username='$username', email='$email', password ='$password', confirm_password='$confirm_password' where id='$id'"; 
     $result = mysqli_query($conn, $query);
    if($result) {
        header("location: dash.php");
    }
}
?>