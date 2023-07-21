<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <center>

<?php
include 'connect.php';
include 'navbar.php';
// include 'csession.php';
session_start();
if (!isset($_SESSION['username'])){
    header('location:loginpage.php');
}
$username = $_SESSION['username'];
// echo $username;

$sql = "SELECT * FROM problem";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
// print_r ($data);

?>
<!-- <p><input type="button" class =btn btn primary;> <a href="#">Add users</a></p> -->
   
    <table border = "3">
    <p><button class= btn btn primary;><a href="addsignup.php">Add users</a></button> </p> 
       <thead>
            <tr>
                <td>id</td>
                <td>username</td>
                <td>email</td>
                <td>password</td>
                <td>confirm_password</td>
                <td>Operations</td>
            </tr>
       </thead>
       <tbody>
        <?php foreach($data as $value):?>
        <tr>
            <td><?php  echo $value['id']?></td>
            <td><?php  echo $value['username']?></td>
            <td><?php  echo $value['email']?></td>
            <td><?php  echo $value['password']?></td>
            <td><?php  echo $value['confirm_password']?></td>
            <td><button><a href="Update.php?updid=<?php echo $value['id']?>">Update </a></button></td>
            <td><button style="<?php echo($username == $value['username'])? 'display:none;': '' ?>"><a href="Del.php?delid=<?php echo $value['id']?>" >Delete </a></button></td>

        </tr>
        <?php endforeach;?>
       </tbody>
       </center>
       </body>
</html>