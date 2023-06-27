<?php 
include 'connect.php';

?>




<!DOCTYPE html>
<html>
<head>
    <title>Student Profile Page</title>
    <style>
        body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

header {
  background-color: #333;
  color: #fff;
  padding: 10px;
}

.navbar {
  background-color: #f2f2f2;
  display: flex;
  justify-content: center;
  align-items: center;
}

.navbar ul {
  list-style: none;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0;
  padding: 0;
  position: relative;
}

.navbar li {
  margin: 0 10px;
}

.navbar a {
  color: #333;
  text-decoration: none;
  font-size: 18px;
  display: block;
  padding: 10px;
  font-weight: 600;
}

.navbar a:hover {
  background-color: #ddd;
}

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <header>
    <nav class="navbar">
      <ul>
        <li><a href="#">Admission</a></li>
        <li><a href="#">Grade Report</a></li>
        <li><a href="stuRegCourse.php">Course Registration</a>
        
      </li>
        <li><a href="front/stuService.html">Student Service</a></li>
         <li><a href="login.php">Logout</a></li>
         <li>
         </li>
      </ul>
    </nav>
  </header> 
</body>
</html>