
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$hide=1;
echo'<div class="success"><a href="login.php">Login<a/>You are Successfully Registerd</div>';
$user="select *from `creating_account` where username='$username'";
 $result=mysqli_query($conn,$user);
if(mysqli_num_rows($result)>0){
  echo"Username/email is already exist";
  $hide=0;
}
else{
  $user="insert into `creating_account` (username,password,email,phone)
   values('$username','$password','$email','$phone')";
     $result=mysqli_query($conn,$user);
  
 
}
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sign in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"]
 {
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
p{
  margin-top:15px;
}
p a{
  color:cornflowerblue;
}

.radio-label:hover .checkmark {
  background-color: #ccc;
}

input[type="radio"]:checked + .checkmark {
  background-color: #2196f3;
  border-color: #2196f3;
}


@media only screen and (max-width: 600px) {
  .container {
    padding: 10px;
  }
}


    </style>

  </head>
  <body>
  
  
  <?php if(!isset($hide)){ ?>
    <div class="container">
<form method="post">
    <div class="student-data">
        <div class="text">
            <h1>Creating Account  </h1>
        </div>
        <div class="student-input-field">
           
            <label>Name</label>
            <input type="text" name="username" required><br>

            <label>Phone</label>
            <input type="tel" required name="phone"><br>
            
            <label>password</label>
            <input type="password" required name="password"><br>

               <label>Email</label>
            <input type="email" required name="email"><br>
            <input type="submit" name="register" value="Register"><br>
            <p>Already have account <a href="login.php">Login</a></p>
           
            </div>
            
        </div>   
    </div>
    </form> 
    </div>



 <?php }?>
  </body>
</html>