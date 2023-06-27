
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password']; 
$sql="Select *from `creating_account` where username='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
        session_start();
        $_SESSION["username"]=$username;
        header('location:index.html');
    }
}
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Login Page </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      body{
            margin:0;
            padding:0;
            height:100vh;
            overflow:hidden
        }
        .center{
            width: 430px;
            margin: 130px auto;
            position: relative;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .center .header{
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            color: white;
            padding: 25px 0 30px 25px;
            background-color: #000;
            border-bottom: 1px solid #370e3f;
            border-radius: 5px 5px 0 0;
        }
        .center form{
            position: absolute;
            background-color: white;
            width: 100%;
            padding: 50px 10px 0 30px;
            box-sizing: border-box;

        }
        form input{
            height: 50px;
            width: 90%;
            padding: 0 10px;
            border-radius: 3px;
            border: 1px solid silver;
            font-size: 18px;
            outline: none;
        }
        form input[type="password"]{
            margin-top: 20px;
        }
        form i{
            position: absolute;
            font-size: 24px;
            color: dark;
            margin: 15px 0 0 -45px;
        }
        i.fa-lock{
            margin-top: 35px;
        }
        form input[type="submit"]{
            margin-top: 40px;
            margin-bottom: 40px;
            width: 100%;
            height: 45px;
            color: white;
            cursor: pointer;
            line-height: 45px;
            border-radius: 5px;
            background-color: #2691d9;
        }
        form input[type="submit"]:hover{
            background-color: #2691d7;
            transition: .5s;
        }
        form a{
            text-decoration: none;
         
        }
    </style>
  </head>
  <body>


<div class="center">
        <div class="header">Student Login</div>
    <form method='POST'>
        <div class="admin-input">
          <input type="text" placeholder="username" name="username" id="adminName" required>
          <i class="fa fa-envelope" ></i>
         <input type="password" placeholder="password" name="password" id="adminPassword" required>
         <i class="fas fa-lock"onclick="display()"></i>
         <input type="submit" name="submit" value="Login">
       
    </form>
</div>


<script>
        function display(){
            var pass=document.getElementById('adminPassword');
            var icon=document.querySelector('.fas');
            if(pass.type==="password"){
                pass.type="text";
                pass.style.marginTop="20px";
                icon.style.color="red";
            }
            else{
                pass.type="password";
                icon.style.color="blue";
            }

        }
         
    </script>

  </body>
</html>

