<?php 

include_once "../db.php"; 

session_start();
if($_SESSION['student_user_type'] != 'A'){
    header("location: index.php");
    exit;
}
if(isset($_GET['logout'])){
    session_destroy();
    header("location: ../login.php");
    die();
}
//echo "welcome admin";
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/css/bootstrap.css"> 
    <title>Admin</title>
</head>
<body> 
    <div class="container-fluid"> 
    <div class=border-top>
        <a href="?logout" class="btn btn-link">Log out</a>
    </div>
    <!--Deactivate Product Status-->
        <div class="row">
            <div class="col-4 bg-success text-light">
                <?php
                    if(isset($_GET['deactivate_student'])){
                        $student_id = $_GET['deactivate_student'];

                        $sql_deactivate_student = "UPDATE `student_info`
                                                    SET `student_status`='I'
                                                WHERE `student_id`='$student_id'";
                        mysqli_query($conn, $sql_deactivate_student);
                    }
                    if(isset($_GET['activate_student'])){
                        $student_id = $_GET['activate_student'];

                        $sql_activate_student = "UPDATE `student_info`
                                                    SET `student_status`='A'
                                                WHERE `student_id`='$student_id'";
                        mysqli_query($conn, $sql_activate_student);
                    }            
      /*Update Product*/
                  if(isset($_GET['update_student'])){
                  $student_id = $_GET['update_student'];
                          
                  $sql_get_student_info = "SELECT * 
                                              FROM `student_info`
                                            WHERE student_id = '$student_id'";

                  $result = mysqli_query($conn, $sql_get_student_info);
                  $data_row = mysqli_fetch_assoc($result);
                ?>

                  <h3 class="display-6">Update Student Info</h3>
                    <form action="../admin/update_student_info.php" method="POST">
                          <label for="">Student Id</label>
                          <input value="<?php echo $data_row['student_id'];?>" type="text" name="u_student_id" readonly class="form-control mb-3">
                          
                          <label for="">Student Name</label>
                          <input value="<?php echo $data_row['fullname'];?>" type="text" name="u_fullname" class="form-control mb-3">

                          <label for="">Course and Section</label>
                          <input value="<?php echo $data_row['section'];?>"  type="text" name="u_section" class="form-control mb-3">

                          <label for="">Midterm Grade</label>
                          <input value="<?php echo $data_row['midterm_grade'];?>"  type="text" name="u_midterm_grade" class="form-control mb-3">

                          <label for="">Finals Grade</label>
                          <input value="<?php echo $data_row['finals_grade'];?>"  type="text" name="u_finals_grade" class="form-control mb-3">
                          
                          <label for="">Change Unique Password</label>
                          <input value="<?php echo $data_row['uniquepass'];?>"  type="text" name="u_uniquepass" class="form-control mb-3">

                          <input type="submit" class="btn btn-primary">
                    </form>
                  <?php
                  }
                  ?>
        <!--Add New Student Information-->   
              <hr>
              <h3 class="display-6">Add New Student Information</h3>
              
                  <?php 
                      if(isset($_GET['insert_status'])){
                          echo "<div class='alert alert-warning'>";
                              if($_GET['insert_status'] == '1') {
                                  echo "Student Information Added Successfully.";
                              }
                              else{
                                  echo "There was an error.";
                              }
                          echo "</div>";
                      }
                  ?>

               <form action="../admin/new_student_info.php" method="get">
                  <label for="">Student Name</label>
                   <input type="text" name="n_fullname" class="form-control mb-3">
                  
                  <label for="">Course and Section</label>
                   <input type="text" name="n_section" class="form-control mb-3">
                  
                  <label for="">Midterm Grade</label>
                   <input type="text" name="n_midterm_grade" class="form-control mb-3">

                  <label for="">Finals Grade</label>
                   <input type="text" name="n_finals_grade" class="form-control mb-3">

                  <label for="">Provide Unique Password</label>
                   <input type="text" name="n_uniquepass" class="form-control mb-3">
                  
                  <input type="submit" class="btn btn-primary">
               </form>
        </div>

    <!--Update, Deactivate Function-->
           <div class="col-8">
               <?php
                    $sql_get_student = "SELECT * FROM `student_info` WHERE `student_status`='A' order by student_id DESC";
                    $get_result = mysqli_query($conn, $sql_get_student); 
               ?>
               <table class="table">
                   <?php
                       while ($row = mysqli_fetch_assoc($get_result) ){ ?>
                        <tr>
                            <td><?php echo $row['student_id'];?></td>
                            <td><?php echo $row['fullname'];?></td>
                            <td><?php echo $row['section'];?></td>                           
                            <td><?php echo number_format($row['midterm_grade'],2);?></td>
                            <td><?php echo number_format($row['finals_grade'],2);?></td>
                            <td> <a href="../admin/index.php?update_student=<?php echo $row['student_id'];?>" class="btn btn-success">Update</a> </td>
                            <td> <a href="../admin/index.php?deactivate_student=<?php echo $row['student_id'];?>" class="btn btn-danger">Deactivate</a></td>
                            <td><?php echo $row['uniquepass'];?></td>
                        </tr>
                       <?php 
                       }
                   ?>
               </table>    

    <!--Activate Function-->
           <div class="col-8">
               <?php
                    $sql_get_student2 = "SELECT * FROM `student_info` WHERE `student_status`='I' order by student_id DESC";
                    $get_result2 = mysqli_query($conn, $sql_get_student2); 
               ?>
               <table class="table">
                   <?php
                       while ($row = mysqli_fetch_assoc($get_result2) ){ ?>
                        <tr>
                            <td><?php echo $row['student_id'];?></td>
                            <td><?php echo $row['fullname'];?></td>
                            <td><?php echo $row['section'];?></td>                           
                            <td><?php echo number_format($row['midterm_grade'],2);?></td>
                            <td><?php echo number_format($row['finals_grade'],2);?></td>
                            <td> <a href="../admin/index.php?update_student=<?php echo $row['student_id'];?>" class="btn btn-success">Update</a> </td>
                            <td> <a href="../admin/index.php?activate_student=<?php echo $row['student_id'];?>" class="btn btn-info">Activate</a></td>
                            <td><?php echo $row['uniquepass'];?></td>
                        </tr>
                       <?php 
                       }
                   ?>
               </table> 
           </div>
           
        </div>
    </div>
</body>
    <script src="../style/js/bootstrap.js"></script>
</html>

