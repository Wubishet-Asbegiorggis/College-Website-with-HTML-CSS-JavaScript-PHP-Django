<?php
include 'connect.php';
$id=$_GET['viewid'];
$data="select *from `new_course` where id='$id'";
$result=mysqli_query($conn,$data);
$row=mysqli_fetch_assoc($result);
$name=$row['course_name'];
$code=$row['course_code'];
$title=$row['course_title'];
$chr=$row['course_chr'];
$department=$row['department'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Course Information</title>
    <style>
    .course-data{
        background-color:lightgrey;
        width: 100vh;
        margin: 0 auto;
        padding: 15px 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        height:70vh;
       

    }
    .student-input-field{
          display: flex;
          justify-content: space-between;
    }
    .course-data h3{
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        font-style: oblique;
    }
    .course-list{
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        font-size: 1.1rem;
        font-variant: small-caps;

    }
     .back-btn{
        display: flex;
        justify-content: end;
        margin-right:100px;
     }
    input[type="button"]{
        background: deepskyblue;
        border:none;
        border-radius: 5px;
        padding: 10px 20px;
        color: whitesmoke;
        font-weight: 700;
        cursor: pointer;
    }
       input[type="button"]:active{
        background-color: aquamarine;
        transform:scale(1,1);
        transition:.5s ;
       }    
    </style>
</head>
<body>
<form method="post">
    <div class="course-data">
        <div class="text">
            <h3>Course Detail </h3>
        </div>
        <div class="course-input-field">
            <div class="course-list">
           <p>
          <?php echo" Course Name: $name "?>
           </p>
            <p>
              <?php echo" Course Code: $code" ?>
            </p>
           <p>
            <?php echo " Course Title: $title "?><br>
           </p>
            <p>
          <?php echo" Course Chr: $chr" ?>
            </p>
            <p>
              <?php echo" Course Department: $department" ?>
            </p>
            </div>
        </div>
    </div>
</form>
  <div class="back-btn">
          <a href="courseList.php"> <input type="button" value ="Back To Dashboard"></a>
        </div>
       
</body>
    </html>
    