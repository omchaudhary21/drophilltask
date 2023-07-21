<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
    include 'navbar.php';
    include 'connect.php';
    session_start();
if (!isset($_SESSION['username'])){
    header('location:loginpage.php');
}
   $sql = "SELECT * FROM prob";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $gender = $bloodgroup = '';
    if(isset($_POST['search'])){
        // echo 'Search btn clicked';
        $gender = $_POST['gender'];
        $bloodgroup = $_POST['bloodgroup'];
        if(empty($gender) && empty($bloodgroup)){
            $sql = "SELECT * FROM prob";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // echo 'All values selected';
        
        }
        if(!empty($gender) && empty($bloodgroup)){
            $sql ="SELECT * FROM prob where gender = '$gender'";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //     if($result){
        //         echo "done";
        //     }
        // else{
        //             echo "Error:";
        //     }
        }
        
        if(empty($gender) && !empty($bloodgroup)){
            $sql ="SELECT * FROM prob where bloodgroup = '$bloodgroup'";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //     if($result){
        //         echo "done";
        //     }
        // else{
        //             echo "Error:";
        //     }
        }
            
    
        if(!empty($gender) && !empty($bloodgroup)){
            $sql ="SELECT * FROM prob where gender ='$gender' OR bloodgroup='$bloodgroup'";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //       if($result){
    //         echo "done";
    //       }
        } 
    }
?>

    <center>
        <h2>Display all Details</h2>
        <form method="POST">
    <p>
        
        Gender:<select name="gender"> 
        <option value="">Select</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
</select>
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
    <p><button type="submit" name ="search">search</button></p>
    </form>



    <!-- table shows data -->
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