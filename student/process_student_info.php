<?php
    /*if (!isset($_POST['s_fullname'])) {//trap
        include_once "../db.php";  

        $fullname = $_POST['s_fullname'];
        $section = $_POST['s_section'];
        $midterm_grade = $_POST['s_midterm_grade'];
        $finals_grade = $_POST['s_finals_grade'];

        // Prepare and execute SQL query to fetch student info
        $sql_get_student_info = "SELECT * 
                                    FROM `student_info`
                                    , `section` = '$section'
                                    , `midterm_grade` = '$midterm_grade'
                                    , `finals_grade`  = `$finals_grade`
                                    WHERE `fullname`='$fullname'";

        $get_result = mysqli_query($conn, $sql_get_student_info);
        //palitan
        if(mysqli_query($conn, $sql_get_student_info)) {
            header("location: ../student/index.php");
        }
    }*/
?>