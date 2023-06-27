<?php
include 'connect.php';
// Step 2: Retrieve search query from the form
if (isset($_POST['search'])) {
  $search = $_POST['search'];
} else {
  $search = '';
}

// Step 3: Retrieve records from the database based on search query
$sql = "SELECT * FROM student_information WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%'";
$result = mysqli_query($conn, $sql);

// Step 4: Display search form
echo '<form method="post">';
echo '<label for="search">Search:</label>';
echo '<input type="text" id="search" name="search" value="' . $search . '">';
echo '<input type="submit" name="submit" value="Search">';
echo '</form>';

// Step 5: Display records on the server
if (mysqli_num_rows($result) > 0) {
  echo '<table>';
  echo '<tr><th>Name</th><th>Email</th><th>Phone</th></tr>';
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '</tr>';
  }
  echo '</table>';
} else {
  echo 'No records found.';
}

// Step 6: Close the database connection
mysqli_close($conn);
?>







<?php
    if($login){
        echo '<div class=" text-center alert alert-success alert-dismissible fade show" role="alert">
            <strong>woow!</strong> Successfully logged in 
            </div>';
    }

     
    ?>
     <?php
    if($invalid){
        echo '<div class=" text-center alert alert-danger alert-dismissible fade show" role="alert">
            <strong>warning!</strong>incorrect username or password
            </div>';
    }

     
    ?>
    