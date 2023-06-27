<!DOCTYPE html>
<html>
<head>
    <title>Course Registration</title>
</head>
<body>
    <?php
 include 'connect.php';

    // Retrieve department and course information for the student
    $student_id = $_GET['id'];
    $query = "SELECT departments.id AS dept_id, departments.name AS dept_name, courses.id AS course_id, courses.name AS course_name FROM departments JOIN courses ON departments.id = courses.department_id WHERE departments.id IN (SELECT department_id FROM students WHERE id = $student_id)";
    $result = mysqli_query($conn, $query);
    $departments = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $dept_id = $row['dept_id'];
        if (!isset($departments[$dept_id])) {
            $departments[$dept_id] = array(
                'name' => $row['dept_name'],
                'courses' => array()
            );
        }
        $departments[$dept_id]['courses'][] = array(
            'id' => $row['course_id'],
            'name' => $row['course_name']
        );
    }

    // Process form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $student_id = $_POST['student_id'];
        $courses = $_POST['courses'];

        // Delete any existing registrations for this student
        $query = "DELETE FROM dept_course_reg WHERE student_id = $student_id";
        mysqli_query($conn, $query);

        // Insert new registrations for the selected courses
        foreach ($courses as $course_id) {
            $query = "INSERT INTO dept_course_reg (student_id, course_id) VALUES ($student_id, $course_id)";
            mysqli_query($conn, $query);
        }

        echo "Course registrations updated successfully!";
    }
    ?>

    <h1>Course Registration</h1>
    <form method="post">
        <input type="hidden" name="student_id" value="<?php echo $_GET['id']; ?>">
        <?php foreach ($departments as $dept_id => $dept_info): ?>
        <h2><?php echo $dept_info['name']; ?></h2>
        <ul>
            <?php foreach ($dept_info['courses'] as $course_info): ?>
            <li>
                <label>
                    <input type="checkbox" name="courses[]" value="<?php echo $course_info['id']; ?>">
                    <?php echo $course_info['name']; ?>
                </label>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endforeach; ?>
        <input type="submit" value="Register Courses">
    </form>

    
</body>
</html>