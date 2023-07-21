<?php
//check connection
include 'connect.php';

//taking 5 values from the form data(input)
$first_name = $_REQUEST['firstname'];
$last_name = $_REQUEST['lastname'];
$gender = $_REQUEST['gender'];
$address = $_REQUEST['address'];
$email = $_REQUEST['email'];
 
$sql = "INSERT INTO data VALUES('$first_name','$last_name','$gender','$address','$email')";
$result = mysqli_query($conn,$sql);
if($result){
    echo "data store in a database successfully";
    echo nl2br("\n$first_name\n$last_name\n$gender\n$address\n$email");
}else{
    echo "error";
}