<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Admin Dashboard</title>
    <style>

  .dashboard {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  align-items: center;
  margin: 10px;
}

.box {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
  text-align: center;
  width: calc(33.33% - 13.33px);
  margin-bottom: 20px;
}

.box h3 {
  margin-top: 0;
}

.box .number {
  font-size: 36px;
  font-weight: bold;
  margin: 20px 0;
}

@media only screen and (max-width: 768px) {
  .box {
    width: 100%;
  }
  
  .box:first-child {
    margin-bottom: 0;
  }
}   
         .admin-op{
            margin-left: 120px;
         }
         
         .student-information table {
            margin:10px;
            width: 100vh;
          
         }
        button{
           display: inline;
           border:1px solid #000
         }
           button a{
           float :center;
          
         }
         .sidebar {
            background-color:ghostwhite;
            color: #fff;
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            overflow-x: hidden;
            padding-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);       
}
.sidebar .menu  li a{
  font-weight: 700;
  color: #000;
  font-size: 1.2rem;

}
.sidebar .menu  li{
  list-style: none;
}
.sidebar .menu  li a:hover{
  background-color: #ffffff
}
.sidebar .menu  li a svg{
  color: darkturquoise;
}

.logo {
  text-align: center;
  margin-bottom: 20px;
}

.logo img {
  width: 40%;
  max-width: 150px;
  border-radius: 50%;
}


.menu li {
  margin-bottom: 10px;

}

.menu a {
   color:darkgrey;
  text-decoration: none;
  font-size: 18px;
  display: block;
  padding: 10px;
}

.menu a:hover {
 color: lightgray;
  color: #333;
}


.admin-cont{
    display: flex;
    justify-content: space-around;
}
.icon{
  width:20px;
  height:20px;
  font-size:10px;
  display: inline;
  font-family: Arial, Helvetica, sans-serif;
}
.content {
  margin-left: 250px;
  padding: 20px;
}

/* }
.btn-operation{
    display: flex;
    justify-content: space-around;
    border: none;
}
.btn-operation button{
    border-radius: 5px;
    padding: 8px;
    margin: 4px;
    font-weight: 700;
    border: none;
    cursor: pointer;
}
button a{
    text-decoration: none;
}
.view-btn{
    background-color:darkorange;  
}
.update-btn{
    background-color:#2691d7;  
}
.delete-btn{
    background-color:brown;
}
.delete-btn a{
    color:#fff
}
.view-btn a{
    color:#fff
}
.update-btn a{
    color:#fff
}
.add-user{
    display: flex;
    justify-content: space-between;
}
.add-user input[type="submit"]{
   background-color:gainsboro;
   cursor: pointer;
   padding: 5px 8px;
   border-radius: 5px;
}
.add-user input[type="search"]{
    padding: 5px 8px;
    border-radius: 5px;
} */

    </style>
   <div class="admin-cont">
  <div class="sidebar">
    <div class="logo">
      <img src="img/wisdom.jpg" alt="Logo">
    </div>
    <ul class="menu">
      <li><a href="courseList.php"><svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
</svg>
Course List</a></li>
      <li><a href="student.php"><svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
</svg>
Students</a></li>
      <li><a href="admin.php"><svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
</svg>
Add Student</a></li>
      <li><a href="addCourse.php"><svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
Add Course</a></li>
      <li><a href="adminLogin.php"><svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>
Logout</a></li>
    </ul>
  </div>  
</div>


  <?php

  // $search_value="";
  // if(isset($_POST['submit'])){
  //   $search_value=$_POST['searchValue'];
  //   $sql="SELECT * FROM student_information WHERE  email like '%$email'";
  //   $result=mysqli_query($conn,$sql);
  //   if(mysqli_num_rows($result)>0){
  //     while($row=mysqli_fetch_assoc($result)){
  //        echo '<tr>';
  //   echo '<td>' . $row['name'] . '</td>';
  //   echo '<td>' . $row['gender'] . '</td>';
  //   echo '<td>' . $row['department'] . '</td>';
  //   echo '<td>' . $row['phone'] . '</td>';
  //   echo '<td>' . $row['email'] . '</td>';
  //   echo '<td>' . $row['staff'] . '</td>';
  //   echo '</tr>';
  //     }
  //   }

  // }
  // $sql="SELECT * FROM student_information";
  // $query=mysqli_query($conn,$sql);
  ?>
  
  <div class="dashboard">
     <h3>Dashboard</h3>
   <div class="box">
    <h3>Students</h3>
    <?php
      // Connect to database
    include 'connect.php';
      // Query database for number of students
      $sql = "SELECT COUNT(*) as count FROM student_information";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      // Display number of students in box
      echo "<p class='number'>" . $row['count'] . "</p>";

      // Close database connection
      mysqli_close($conn);
    ?>
  </div>
  <div class="box">
    <h3>Courses</h3>
    <?php
      // Connect to database
     include 'connect.php';

      // Query database for number of courses
      $sql = "SELECT COUNT(*) as count FROM new_course";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      // Display number of courses in box
      echo "<p class='number'>" . $row['count'] . "</p>";

      // Close database connection
      mysqli_close($conn);
      ?>
  </div>
  <!-- <div class="box">
    <h3>Departments</h3> -->
    <?php
      // Connect to database
     

      // Query database for number of departments
      // $sql = "SELECT COUNT(*) as count FROM departments";
      // $result = mysqli_query($conn, $sql);
      // $row = mysqli_fetch_assoc($result);

      // Display number of departments in box
      // echo "<p class='number'>" . $row['count'] . "</p>";

      // Close database connection
      // mysqli_close($conn);
    ?>
  </div>
</div>

  
 
  <!-- <div class="admin-op">
    <div class="add-user">
        <a href="admin.php"><button>Add User</button></a>
        <form method="post">
        <div class="search-field">
        <input type="search" name="searchValue" placeholder="search record">
        <input type="submit" name="submit" value="search">
       </form>
        </div> 
    </div>
    
    <div class="student-information">
        <table class="table">
            <tr> 
                <th>Id</th> 
                <th>Name</th>
                <th>Gender</th>
                <th>Department</th>
                <th>Phone</th>
                <th>Email</th>
                <th>staff</th>
                <th>Operation</th>
            </tr> -->
            <?php 
            // $user="select *from `student_information` ";
            // $result=mysqli_query($conn,$user);
            // if($result){
            //     while($row=mysqli_fetch_assoc($result)){
            //     $id=$row['id'];
            //     $name=$row['name'];
            //     $gender=$row['gender'];
            //     $department=$row['department'];
            //     $phone=$row['phone'];
            //     $email=$row['email'];
            //     $staff=$row['staff'];
            //     echo '
            //     <tr>
            //     <td scope="row">'.$id.'</td>
            //     <td>'.$name.'</td>
            //     <td>'.$gender.'</td>
            //     <td>'.$department.'</td>
            //     <td>'.$phone.'</td>
            //     <td>'.$email.'</td>
            //     <td>'.$staff.'</td>
            //     <td>
            //     <div class="btn-operation">
            //     <button class="view-btn" ><a href="studentview.php? viewid='.$id.'">View</a></button>
            //     <button class="update-btn"><a href="update.php? updateid='.$id.'">Update</a></button>
            //     <button class="delete-btn"><a href="delete.php? deleteid='.$id.'">Delete</a></button>
            //     </div>
            //    </td>
            //     </tr>
            //     ';
            // }
            // }  
            ?>     
        </table>
    </div>
    </div>
    </div>
    <?php


?>  
</body>
</html>