<?php 
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $course="DELETE FROM new_course WHERE id=$id";
    $result=mysqli_query($conn,$course);
    if($result){
        header("location:courseList.php");
    }
}



?>