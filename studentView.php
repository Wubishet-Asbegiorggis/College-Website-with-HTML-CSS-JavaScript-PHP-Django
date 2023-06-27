<?php
include 'connect.php';
$id=$_GET['viewid'];
$data="select *from `student_information` where id='$id'";
$result=mysqli_query($conn,$data);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$phone=$row['phone'];
$email=$row['email'];
$staff=$row['staff'];
$department=$row['department'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Profile</title>
    <style>
    .student-data{
        background-color: antiquewhite;
        width: 100vh;
        margin: 0 auto;
        padding: 15px 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;

    }
    .student-input-field{
          display: flex;
          justify-content: space-between;
    }
    .student-data h3{
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        font-style: oblique;
    }
    .student-list{
        font-family: Georgia, 'Times New Roman', Times, serif;
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
    <div class="student-data">
        <div class="text">
            <h3>Student Information  </h3>
        </div>
        <div class="student-input-field">
            <div class="profile-img">
                <img src="">
            </div>
          
            <div class="student-list">
           <p>
          <?php echo" Name: .$name "?>
           </p>
            <p>
              <?php echo" Department: $department" ?>
            </p>
           <p>
            <?php echo " Email: $email "?><br>
           </p>
            <p>
          <?php echo" Phone: $phone" ?>
            </p>
            <p>
              <?php echo" Staff: $staff" ?>
            </p>
            </div>
        </div>
    </div>
</form>
  <div class="back-btn">
          <a href="display.php"> <input type="button" value ="Back To Dashboard"></a>
        </div>
       
</body>
    </html>
    