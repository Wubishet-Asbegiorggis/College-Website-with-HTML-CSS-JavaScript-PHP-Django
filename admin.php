<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $staff=$_POST['staff'];
  $gender=$_POST['gender'];
  $department=$_POST['department'];
  
  
  $user="insert into `student_information` (name,phone,email,staff,gender,department) values('$name','$phone','$email','$staff','$gender',$department)";
  $result=mysqli_query($conn,$user);

  if($result){
    // echo "Data inserted successfully";
    session_start();
        $_SESSION["name"]=$name;
    header('location:studentProfile.php');
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
    <title>Student Registration Form</title>
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
  height: 100vh;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
  margin-top: 0;
}

.form-group {
  margin-bottom: 20px;
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
.register{
  border:1px solid black;
  width:100px;
  margin:0 auto;
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

.radio-label:hover .checkmark {
  background-color: #ccc;
}

input[type="radio"]:checked + .checkmark {
  background-color: #2196f3;
  border-color: #2196f3;
}

button {
  background-color: #2196f3;
  border: none;
  border-radius: 5px;
  color: #fff;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

button:hover {
  background-color: #0d8bf0;
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
            <input type="text" name="name" required><br>
            
            <label>Email</label>
            <input type="email" required name="email"><br>
            
            <label>Phone</label>
            <input type="tel" required name="phone"><br>
            
            <label>Staff</label>
            <input type="text" required name="staff"><br>
           
            <label>Gender</label><br>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female<br>
            </div>
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

           
                <input type="submit" name="submit" value="submit">
            
        </div>   
    </div>
    </form> 
    </div> 
</body>
</html>