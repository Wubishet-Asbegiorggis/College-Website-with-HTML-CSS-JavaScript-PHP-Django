<?php  
$HOSTNAME = 'localhost:3307';  
$USERNAME = 'username';  
$PASSWORD = 'password';
$DATABASE='signupform';
$conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD,$DATABASE);  
if( !$conn )  
{  
   die((mysqli_connect_error($conn)));
}

?>  