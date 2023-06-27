<?php
include 'connect.php';
$id=$_GET['updateid'];
$data="select *from `new_course` where id=$id";
$result=mysqli_query($conn,$data);
$row=mysqli_fetch_assoc($result);
$name=$row['course_name'];
$code=$row['course_code'];
$title=$row['course_title'];
$chr=$row['course_chr'];
$department=$row['department'];
if(isset($_POST['submit'])){
  $name=$_POST['course_name'];
  $code=$_POST['course_code'];
  $title=$_POST['course_title'];
  $chr=$_POST['course_chr'];
  $department=$_POST['department'];

  $user="update `new_course` set id='$id', course_name='$name',course_code='$code',course_title='$title', course_chr='$chr' ,department='$department' where id='$id' ";
  $result=mysqli_query($conn,$user);
  if($result){ 
    header('location:courseList.php');
  }
  else{
    die(mysqli_error($conn));
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Course</title>
    <style>
		form {
			max-width: 400px;
			margin: 0 auto;
			padding: 20px;
			border: 1px solid #ddd;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			font-family: Arial, sans-serif;
		}
		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}
        h3{
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
            background-color: cornflowerblue;
            color: #ddd;
            text-align: center;
            width: 300px;
            padding: 10px;
            margin: 0 auto;
        }
        h1{
         
          padding: 10px;
          text-align: center;
          font-family: Arial, Helvetica, sans-serif;
          
        }
		input, select {
			display: block;
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-size: 16px;
			font-family: Arial, sans-serif;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
			font-family: Arial, sans-serif;
		}
	</style>
</head>
<body>
	<h1>Update Course</h1>
	<form method="post" action="">
		<label for="name">Course Name:</label>
		<input type="text" name="course_name" required value='<?php echo $name ?>'><br>

		<label for="code">Course Code:</label>
		<input type="text" name="course_code" required value='<?php echo $code ?>'><br>
        <label for="code">Course Title:</label>
		<input type="text" name="course_title" required value='<?php echo $title?>'><br>
        <label for="code">Course credit hour:</label>
		<input type="text" name="course_chr" required value='<?php echo $chr ?>'><br>

		<label for="department">Department:</label>
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
                </select><br>
  <input type="submit" name="submit" value="Update Course">
	</form>
</body>
</html>





