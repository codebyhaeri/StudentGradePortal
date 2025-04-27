<?php
if(isset($_POST['u_fullname'])){
    include_once "../db.php";
    
    $student_id = $_POST['u_student_id'];
    $student_fullname = $_POST['u_fullname']; 
    $student_section = $_POST['u_section'];
    $student_uniquepass = $_POST['u_uniquepass'];
    $student_midterm_grade = $_POST['u_midterm_grade'];
    $student_finals_grade = $_POST['u_finals_grade'];
 
    
    $sql_update_student_info = "UPDATE `student_info`
                           SET `fullname`='$student_fullname'
                              , `section`='$student_section'
                              , `uniquepass`='$student_uniquepass'
                              , `midterm_grade`='$student_midterm_grade'
                              , `finals_grade`='$student_finals_grade'
                        WHERE student_id ='$student_id'";
    //echo $sql_update_item;
    if(mysqli_query($conn, $sql_update_student_info)) {
        header("location: ../admin/index.php?update_status=1");
    }
}