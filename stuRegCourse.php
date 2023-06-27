<?php 
include 'connect.php';
$sql="SELECT GROUP_CONCAT(course_name) as allowed_courses, nc.id as id,  d.name department, si.name student_name FROM new_course nc
JOIN departments d on nc.department = d.id
JOIN student_information si on si.department = d.id
GROUP BY si.name";
$result=mysqli_query($conn,$sql);

 if($result){
                while($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $course_names=$row['allowed_courses'];
                $name=$row['student_name'];
                echo '
                <tr
                <td scope="row">'.$id.'</td>
                <td>'. $course_names.'</td>
               </tr>
             

               ';
                }
            }

              
?>