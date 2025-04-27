<?php
if(isset($_GET['n_fullname'])){ //trap
    include_once "../db.php";
    
    $student_fullname = $_GET['n_fullname']; 
    $student_section = $_GET['n_section'];
    $student_uniquepass = $_GET['n_uniquepass'];
    $student_midterm_grade = $_GET['n_midterm_grade'];
    $student_finals_grade = $_GET['n_finals_grade'];
    
    $sql_insert_student = "INSERT INTO `student_info`
                    (`fullname`, `section`, `midterm_grade`, `finals_grade`, `uniquepass`)
                      VALUES
                    ('$student_fullname','$student_section','$student_midterm_grade','$student_finals_grade','$student_uniquepass');";

    $execute_query= mysqli_query($conn, $sql_insert_student);
    
    if($execute_query){
        echo "Data inserted.";   
        header("location: ../admin/index.php?insert_status=1");
    }
}
else{
    header("location: ../admin/index.php?you_cant_be_here");
}