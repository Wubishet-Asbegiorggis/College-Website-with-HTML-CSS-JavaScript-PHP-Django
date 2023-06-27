<?php
include 'connect.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define search term variable
$search_term = "";

// Handle form submission
if (isset($_GET['search'])) {
    $search_term = $_GET['search'];

    // Retrieve the records
    if (!empty($search_term)) {
        $sql = "SELECT * FROM student_information WHERE name LIKE '%$search_term%' OR email LIKE '%$search_term%'";
    } else {
        $sql = "SELECT * FROM student_information";
    }
    $result = mysqli_query($conn, $sql);

    // Convert the results to JSON format
    $records = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $records[] = $row;
    }
    $json = json_encode($records);

    // Return the JSON-encoded records
    header('Content-Type: application/json');
    echo $json;

} else {
    // Retrieve all records
    $sql = "SELECT * FROM student_information";
    $result = mysqli_query($conn, $sql);

    // Display the results
    ?>
    <body>
    <form method="get">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" value="<?php echo $search_term; ?>">
    </form>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No results found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <script>
    var search_input = document.getElementById("search");
    var table_body = document.querySelector("#records tbody");

    // Handle the text input event
    search_input.addEventListener("input", function() {
        var search_term = search_input.value;

        if (search_term.length > 0) {
            // Send an AJAX request to retrieve the records
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_records.php?search=" + search_term, true);
            xhr.onload = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Parse the JSON response
                    var records = JSON.parse(xhr.responseText);

                    // Display the filtered records in the table
                    table_body.innerHTML = "";
                    records.forEach(function(record) {
                        var row = table_body.insertRow(-1);
                        var name_cell = row.insertCell(0);
                        var email_cell = row.insertCell(1);
                        var phone_cell = row.insertCell(2);
                        name_cell.textContent = record.name;
                        email_cell.textContent = record.email;
                        phone_cell.textContent = record.phone;
                    });
                }
            };
            xhr.send();
        } else {
            // Clear the table when the search term is empty
            table_body.innerHTML = "";
        }
    });
</script>
          </body>
    <?php
}

// Close the database connection
mysqli_close($conn);

?>