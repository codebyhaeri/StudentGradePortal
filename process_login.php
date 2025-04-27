<?php
include_once "db.php";
session_start();

if(isset($_POST['l_fullname'])){
    $fullname = $_POST['l_fullname'];
    $section = $_POST['l_section'];
    $uniquepass = $_POST['l_uniquepass'];

    $sql_check_students_table = "SELECT *
                                FROM `student_info`
                                    WHERE `fullname` = '$fullname' 
                                AND `section` = '$section'
                                    AND `uniquepass` = '$uniquepass'";

    $sql_result = mysqli_query($conn,$sql_check_students_table);
    $count_result = mysqli_num_rows($sql_result);
    
    if($count_result == 1){
        //existing user
        $row = mysqli_fetch_assoc($sql_result);
        
        //create session variables
        $_SESSION['student_id'] = $row['student_id'];
        $_SESSION['student_fullname'] = $row['fullname'];
        $_SESSION['student_section'] = $row['section'];
        $_SESSION['student_uniquepass'] = $row['uniquepass'];
        $_SESSION['student_midterm_grade'] = $row['midterm_grade'];
        $_SESSION['student_finals_grade'] = $row['finals_grade'];
        $_SESSION['student_user_type'] = $row['user_type'];

        if($row['user_type'] == 'A'){
            //admin
            header("location: admin");
        }
        else if($row['user_type'] == 'S'){
            //student
            header("location: student");
        }
        else{
            header("location: index.php?error=user_not_found");
        }
    }
    else{
        //username and password does not exist
        header("location: login.php?error=Invalid name or password. Please try again.");
    }
}
?>