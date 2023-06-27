<?php 
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $user="delete from `student_information` where id='$id' ";
    $result=mysqli_query($conn,$user);
    if($result){
        // echo "Data deleted successfully";
        header('location:display.php');
    }
    else{
        die(mysqli_error($conn));
    }
}


?>