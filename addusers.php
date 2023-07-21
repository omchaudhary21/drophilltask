
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
<?php
// error_reporting(0);
include 'connect.php';
session_start();
include 'navbar.php';
include 'search.php';
$sql = "SELECT * FROM prob";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
// print_r ($data);

?>
    
    <table border = "3">
       <thead>
            <tr>
                <td>first_name</td>
                <td>last_name</td>
                <td>email</td>
                <td>gender</td>
                <td>bloodgroup</td>
                <td>qualification</td>
            </tr>
       </thead>
       <tbody>
        <?php foreach($data as $value):?>
        <tr>
            <td><?php  echo $value['first_name']?></td>
            <td><?php  echo $value['last_name']?></td>
            <td><?php  echo $value['email']?></td>
            <td><?php  echo $value['gender']?></td>
            <td><?php  echo $value['bloodgroup']?></td>
            <td><?php  echo $value['qualification']?></td>
        </tr>
        <?php endforeach;?>
       </tbody>
        </table>
       </center>
       </body>
</html>