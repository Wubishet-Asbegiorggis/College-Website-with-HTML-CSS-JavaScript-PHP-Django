<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .student-information{
            background-color:ghostwhite;
            margin: 0 auto;
            max-width: 90%;
        }
        table{
            border-collapse:collapse;
            margin: 0 auto;
        }
        table tr td{
            border:1px solid #000000;
            text-align: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
            padding: 10px;
        }
        tr th{
            background-color: black;
            color: #ffffff;
            padding: 10px 10px;
            
           
        }
        button{
            width:100%;
            margin:10px;
            border:none;
            border-radius:10px;
            cursor:pointer;
        }
        .view-icon,.update-icon,.delete-icon{
            font-size:10px;
            height:20px;
            width:20xp

        }
         .view-icon{
            color:goldenrod
         }
         .update-icon{
            color:green
         }
         .delete-icon{
            color:crimson
         }
          .back-btn{
        display: flex;
        justify-content: end;
        margin-right:100px;
        margin-top: 50px;
        margin-bottom: 100px;
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
  <div class="course-list">
    <h3 style="text-align:center">  List of Course</h3>
  </div>
       <div class="student-information">
        <table class="table">
            <tr> 
                <th>Id</th> 
                <th>Name</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Credit Hour</th>
                <th>Department</th>
                <th>Operation</th>
            </tr>
            <?php 
            include 'connect.php';
            $user="select *from `new_course` ";
            $result=mysqli_query($conn,$user);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $name=$row['course_name'];
                $code=$row['course_code'];
                $title=$row['course_title'];
                $chr=$row['course_chr'];
                $department=$row['department'];
                
                echo '
                <tr>
                <td scope="row">'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$code.'</td>
                <td>'.$title.'</td>
                <td>'.$chr.'</td>
                <td>'.$department.'</td>
                
                <td>
                <div class="btn-operation">
                <button class="view-btn" ><a href="courseView.php? viewid='.$id.'"> <svg class="view-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
  <path strokeLinecap="round" strokeLinejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
  <path strokeLinecap="round" strokeLinejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>
</a>
               
                </button>
                <button class="update-btn"><a href="courseUpdate.php? updateid='.$id.'"><svg class="update-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
  <path strokeLinecap="round" strokeLinejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
</svg>
</i> </a>
                </button>
                <button class="delete-btn"><a href="deleteCourse.php? deleteid='.$id.'"><svg class="delete-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
</svg>
</a>
               
                </button>
                </div>
               </td>
                </tr>
                ';
            }
            }  
            ?>     
        </table>
       <div class="back-btn">
          <a href="display.php"> <input type="button" value ="Back To Dashboard"></a>
        </div>
        
    </div>
    </body>
</html>