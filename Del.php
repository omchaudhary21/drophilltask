<?php 
include 'connect.php';
if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    // echo $id;
    $sql ="DELETE from problem where id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location:dash.php");
        echo "Deleted successfully";
    }else{
        echo"Error:";
    }
}
?>