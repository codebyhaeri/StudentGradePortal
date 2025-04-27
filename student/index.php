<?php
        include "../db.php";

        session_start();

        $s_student_id = $_SESSION['student_id'];
        if($_SESSION['student_user_type'] != 'S'){
            header("location: ../index.php");
        }
        if(isset($_GET['logout'])){
            session_destroy();
            header("location: ../login.php");
            die();
        }
 ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/css/bootstrap.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>Student's Information</title>
</head>
<body>
    <div class=border-top>
        <a href="?logout" class="btn btn-link">Log out</a>
    </div>
    <?php 
        // Check if the necessary session variables are set
        if(isset($_SESSION['student_fullname'], $_SESSION['student_section'], $_SESSION['student_uniquepass'])) {
            // Display student information using session variables
            $s_fullname = $_SESSION['student_fullname'];
            $s_section = $_SESSION['student_section'];
            $s_uniquepass = $_SESSION['student_uniquepass'];
        
            // Retrieve student information based on session variables
            $sql_student_info = "SELECT * 
                                FROM `student_info`
                                WHERE `fullname`='$s_fullname'
                                AND `section`='$s_section'
                                AND `uniquepass`='$s_uniquepass'";
        
            $student_result = mysqli_query($conn, $sql_student_info);
    
            if ($student_result) {
                if (mysqli_num_rows($student_result) > 0) {
                    // Fetch student information
                    $row = mysqli_fetch_assoc($student_result);
                    $s_midterm_grade = $row['midterm_grade'];
                    $s_finals_grade = $row['finals_grade'];
                } 
                else {
                    echo "No student information found for the logged-in student.";
                }
            } 
            else {
                echo "Error: " . mysqli_error($conn);
            }
            } 
            else {
                // If session variables are not set, display an error message
                echo "Student information not available. Please log in first.";
            }
            ?>
        
        <?php if(isset($s_fullname, $s_section, $s_midterm_grade, $s_finals_grade)): ?>
        <div class="student-info">
            <p><span class="grade-label">Fullname:</span> <?php echo $s_fullname; ?></p>
            <p><span class="grade-label">Section:</span> <?php echo $s_section; ?></p>
            <p><span class="grade-label">Midterm Grade:</span> <?php echo $s_midterm_grade; ?></p>
            <p><span class="grade-label">Finals Grade:</span> <?php echo $s_finals_grade; ?></p>
        </div>
        <?php endif; ?>
</body>
    <script src="../style/js/bootstrap.js"></script>
</html>