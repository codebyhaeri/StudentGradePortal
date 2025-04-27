<?php
    include_once "db.php";

    if(isset($_SESSION['student_user_type'])) {
        if($_SESSION['student_user_type'] == 'A'){
        header("location: admin/");   
        exit; // Always exit after header redirection
        }

        if(isset($_SESSION['student_user_type']) == 'S'){
                // Redirect to student index.php and pass necessary parameters
                if(isset($_SESSION['student_fullname'], $_SESSION['student_section'] , $_SESSION['student_uniquepass'])) {
        
                    $sql_student_info = "SELECT * 
                                            FROM `student_info`
                                                WHERE `fullname`='$fullname'
                                                AND `section` = '$section'
                                                AND `uniquepass` = '$uniquepass'";

                    $sql_result = mysqli_query($conn,$sql_student_info);
                    $count_result = mysqli_num_rows($sql_result);
        
                    header("location: student/index.php?fullname=$fullname&section=$section&uniquepass=$uniquepass");
                    exit; // Always exit after header redirection
        } 
    }
    } else {
        // Handle the case when the key is not set
        // Redirect the user to a login page or display an error message
        echo "User type not defined. Please login first.";
    }

    /* session_start();

    if(isset($_SESSION['students_user_type'])) {
        if($_SESSION['students_user_type'] == 'A'){
        header("location: admin/");   
        exit; 
        }

        if($_SESSION['students_user_type'] == 'S'){
        // Redirect to student index.php and pass necessary parameters
        if(isset($_SESSION['students_fullname'], $_SESSION['students_uniquepass'])) {

            $sql_student_info = "SELECT * 
                                    FROM `student_info`
                                        WHERE `fullname`='$fullname'
                                        AND `section` = '$section'
                                        AND `uniquepass` = '$uniquepass';";
            $sql_result = mysqli_query($conn,$sql_student_info);
            $count_result = mysqli_num_rows($sql_result);

            header("location: student/index.php?fullname=$fullname&section=$section&uniquepass=$uniquepass");
            exit; 
        } else {
            ("location: login.php?error=Invalid name or password. Please try again.");
            exit;
        }
        }
    } else {
        echo "User type not defined. Please try again.";
        exit;
    }*/



?> 
