<?php
include 'connect.php';
$id=$_GET['updateid'];
$data="select *from `student_information` where id=$id";
$result=mysqli_query($conn,$data);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$gender=$row['gender'];
$department=$row['department'];
$phone=$row['phone'];
$email=$row['email'];
$staff=$row['staff'];
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $gender=$_POST['gender'];
  $department=$_POST['department'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $staff=$_POST['staff'];

  $user="update `student_information` set id='$id', name='$name',gender='$gender',department='$department', phone='$phone' ,email='$email', staff='$staff' where id='$id' ";
  $result=mysqli_query($conn,$user);
  if($result){ 
    header('location:display.php');
  }
  else{
    die(mysqli_error($conn));
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
}

.container {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
  margin-top: 0;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}
input[type="radio"]{
  font-size: 1.2rem;
  margin: 5px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"],
select {
  width: 70%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color:#fff;
  font-size: 16px;
  color: #555;
  box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
}
label{
  margin:10px;
}

input[type="submit"] {
  padding: 10px 20px;
  width: 100%;
  margin-top: 20px;
  border: none;
  background-color: #2196f3;
  color: white;
  font-weight: 700;
  font-size: 1.2rem;
  border-radius: 10px;
  cursor: pointer;

}


@media only screen and (max-width: 600px) {
  .container {
    padding: 10px;
  }
}
 
    </style>
</head>
<body>
    <div class="container">
    <form method="post">
    <div class="student-data">
        <div class="text">
            <h1>Student Registration Form  </h1>
        </div>
        <div class="student-input-field">
            <label>Name</label>
            <input type="text" name="name" required value='<?php echo $name ?>'><br>
            <label>Email</label>
            <input type="email" required name="email" value='<?php echo $email ?>'><br>
            <label>Phone</label>
            <input type="tel" required name="phone" value='<?php echo $phone ?>'><br>
            <label>Staff</label>
            <input type="text" required name="staff" value='<?php echo $staff ?>'><br>
            <label>Gender</label><br>
            <input type="radio" name="gender" value="male" <?php if ($gender == 'male') echo 'checked="checked"'; ?> /> Male
           <input type="radio" name="gender" value="female" <?php if ($gender == 'female') echo 'checked="checked"'; ?> /> Female<br />

            <label>Department</label>
            <select name="department">
              <?php 
              $sql=" SELECT * FROM departments ";
              $result=mysqli_query($conn,$sql);
              $dept=mysqli_fetch_all($result,MYSQLI_ASSOC);
              mysqli_close($conn);
              ?>
              <?php
              foreach($dept as $department){   ?> 
              
                 <option value='<?php echo $department['id']; ?>'><?php echo $department['name'];?> </option>
                 <?php }?>
                </select>
            <div class="register">
                <input type="submit" name="submit" value="Update">
            </div>
        </div>   
    </div>
    </form>  
    </div>
</body>
</html>