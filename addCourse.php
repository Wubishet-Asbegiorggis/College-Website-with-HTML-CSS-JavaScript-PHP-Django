<?php
// Connect to the database
   include 'connect.php';
if(isset($_POST['submit'])){
$name = $_POST['name'];
$code = $_POST['code'];
$title = $_POST['title'];
$chr = $_POST['chr'];
$department = $_POST['department'];

// Insert the course into the database
$query = "insert into `new_course` (course_name, course_code,course_title,course_chr, department) values ('$name', '$code','$title','$chr', '$department')";
$result=mysqli_query($conn, $query);
  if($result){
 echo "<h3>course added successfully</h3>";
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
	<title>Add Course</title>
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
	<h1>Add Course</h1>
	<form method="post" action="">
		<label for="name">Course Name:</label>
		<input type="text" name="name" required><br>

		<label for="code">Course Code:</label>
		<input type="text" name="code" required><br>
        <label for="code">Course Title:</label>
		<input type="text" name="title" required><br>
        <label for="code">Course credit hour:</label>
		<input type="text" name="chr" required><br>

		<label for="department">Department:</label><br>
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
  <input type="submit" name="submit" value="Add Course">
	</form>
</body>
</html>





