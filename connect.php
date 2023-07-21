<?php
$servername= 'localhost';
$username = 'root';
$password = '';
$database = 'db';
$conn = new mysqli($servername,$username,$password,$database);
if($conn == false){
    die("connection error:");
}else{
    // echo "database connected successfully";
}