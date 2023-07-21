<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<?php
include "connect.php";
$id = $_GET['updid'];
$sql ="SELECT * FROM problem WHERE id= $id";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
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
    <center>
    <form method="post" action="updateAction.php" >    
    <?php foreach($data as $items): ?>
        <h1>Update Page</h1>
        <p>please fill the form</p>
        <input type="hidden" name="id" value="<?php echo $items['id']?>">
        <p>Username: <input type="text" name="username" value="<?php echo $items['username']?>" required></p>
        <p>Email: <input type="email" name="email" value="<?php echo $items['email']?>" required></p>
        <p>Password: <input type="password" name="password" value="<?php echo $items['password']?>" required></p>
        <p>Confirm Password: <input type="password" name="confirm_password" value="<?php echo $items['confirm_password']?>" required></p>
      <?php endforeach; ?>
         <input type="submit" name="update" value="Update">
 
        
        <p>Already have an account? <a href="loginpage.php">Login here</a>.</p>
    </form>
    </center>

</body>
</html>
