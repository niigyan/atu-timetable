<?php
 include "fetch.php";

   if ($_POST) {
    
    include "connection.php";
      $course = $_POST['course'];
      $level = $_POST['level'];
      $sem = $_POST['sem'];
      
    
      $mondayStmt = $conn->prepare("SELECT * FROM day_table WHERE `day` = 1  AND semester = $sem AND `level` = $level AND  course = :course");
      $mondayStmt->bindParam(":course",$course);
      $mondayStmt->execute();
      $mondayRows = $mondayStmt->rowCount();
      $mondays = $mondayStmt->fetchAll(PDO::FETCH_OBJ);
    
      $tuesdayStmt = $conn->prepare("SELECT * FROM day_table WHERE `day` = 2 AND semester = $sem AND `level` = $level AND  course = :course");
      $tuesdayStmt->bindParam(":course",$course);
      $tuesdayStmt->execute();
      $tuesdayRows = $tuesdayStmt->rowCount();
      $tuesdays = $tuesdayStmt->fetchAll(PDO::FETCH_OBJ);
    
      $wednesdayStmt = $conn->prepare("SELECT * FROM day_table WHERE `day` = 3 AND semester = $sem AND `level` = $level AND  course = :course");
      $wednesdayStmt->bindParam(":course",$course);
      $wednesdayStmt->execute();
      $wednesdayRows = $wednesdayStmt->rowCount();
      $wednesdays = $wednesdayStmt->fetchAll(PDO::FETCH_OBJ);
    
      $thursdayStmt = $conn->prepare("SELECT * FROM day_table WHERE `day` = 4 AND semester = $sem AND `level` = $level AND  course = :course");
      $thursdayStmt->bindParam(":course",$course);
      $thursdayStmt->execute();
      $thursdayRows = $thursdayStmt->rowCount();
      $thursdays = $thursdayStmt->fetchAll(PDO::FETCH_OBJ);
    
      $fridayStmt = $conn->prepare("SELECT * FROM day_table WHERE `day` = 5 AND semester = $sem AND `level` = $level AND  course = :course");
      $fridayStmt->bindParam(":course",$course);
      $fridayStmt->execute();
      $fridayRows = $fridayStmt->rowCount();
      $fridays = $fridayStmt->fetchAll(PDO::FETCH_OBJ);
    
      //counts
      $monCnt = $mondayRows;
      $tueCnt = $tuesdayRows;
      $wedCnt = $wednesdayRows;
      $thurCnt =$thursdayRows;
      $friCnt = $fridayRows;


      echo "done";
    
   }
   include_once "fetch.php";
   


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="icons/css/all.css">
  <link rel="stylesheet" href="CSS/dashboard.css">
  <link rel="stylesheet" href="CSS/department.css">
   <link rel="stylesheet" href="CSS/generate.css">
  
  <title>Dashboard</title>
</head>

<body>
  <div class="sidebar" >
    <div class="sidebar-brand">
      <div class="brand">ATU</div>
      <div class="label">Timetable Generator</div>
    </div>
    <div class="sidebar-menu">
      <ul>
      <li ><a href="dashboard.php"><i class="fa-solid fa-desktop"></i><span>Dashboard</span></a></li>
        <li><a href="department.php"><i class="fa-solid fa-building"></i><span>Department</span></a></li>
        <li ><a href="course.php"><i class="fa-solid fa-book"></i><span>Course</span></a></li>
        <li><a href="subject.php"><i class="fa-solid fa-book-open"></i><span>Subject</span></a></li>
        <li><a href="staff.php"><i class="fa-solid fa-people-group"></i><span>Staff</span></a></li>
        <li class="active"><a href="generate.php"><i class="fa-solid fa-gauge"></i><span>Generate Timetable</span></a></li>
      </ul>
    </div>
  </div>
   <main>
   <div class="header">
      <div class="icon-bar" id="bars"><i class="fa-solid fa-bars"></i></div>
      <div class="profile">
        <div class="img">Admin</div>
        <div class="log-out"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
      </div>
    </div>
    <div class="main-content" >
        <div class="menu-title">
            <h3>Generate timetable</h3>
            
            <div class="form-container" >
                <form action="#" method="POST" id="form">
                    <div class="mb-3">
                    <label for="course">Course:</label>
                    <select name="course" id="course" class="form-control">
                    <?php foreach( $courses as $course) :?>
                       <option value="<?=$course->course_name?>"><?=$course->course_name ?></option>
                    <?php endforeach ?>
            </select>
                    </select>
                   </div>
                   <div class="mb-3">
                    <label for="level">Level:</label>
                    <select name="level" id="level" class="form-control">
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                    </select>
                   </div>
                   <div class="mb-3">
                    <label for="sem">Semester: </label>
                    <select name="sem" id="sem" class="form-control">
                        <option value="1">First</option>
                        <option value="2">Second</option>
                    </select>
                   </div>
                   <div class="mb-3 button">
                   <button type="submit" class="btn btn-primary" id="view">View Table</button><button type="submit" class="btn btn-primary" id="generate">Generate</button>
                   </div>
                </form>
            </div>
        </div>
        <div class="table-container ">
        <div class="addBtn">
          <button type="button" class="btn btn-danger btn-sm" id="pdf" style="margin-right: 5px;"> <i class="fa-solid fa-file-export" style="margin-right: 2px;"></i>Export to Pdf</button>
          <button type="button" class="btn btn-success btn-sm" id="excel"  > <i class="fa-solid fa-file-export" style="margin-right: 2px;"></i>Export to Excel</button>

          </div>
            
            <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <td colspan="3"><div class="table-title">
              <div class="head" id="head"></div>
              <div class="sem" id="semester"></div>
            </div> </td>
          </tr>
          <tr>
            <th>Days</th>
            <th>Time</th>
            <th>Course</th>
          </tr>
        </thead>
        <tbody id="message">
             
        </tbody>
      </table>
            </div>
    </div>
   <!-- JS -->
   <script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="JS/generate.js"></script>
    <script src="table2excel/dist/table2excel.js"></script>



  <script src="icons/js/all.js"></script>

</body>
</html>