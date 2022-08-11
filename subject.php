<?php
  if ($_POST) {
    include "insertSubject.php";
  }
   include "fetch.php";
   $sum = 1;
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
        <li class="active"><a href="subject.php"><i class="fa-solid fa-book-open"></i><span>Subject</span></a></li>
        <li><a href="staff.php"><i class="fa-solid fa-people-group"></i><span>Staff</span></a></li>
        <li><a href="generate.php"><i class="fa-solid fa-gauge"></i><span>Generate Timetable</span></a></li>
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
            <h3>Subject</h3>
        </div>
        <div class="table-container">
          <div class="addBtn">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa-solid fa-plus" style="margin-right: 2px;"></i></i>Add New</button>
          </div>
        <table  id="table_id" class="display table table-striped table-bordered">
        <thead>
            
            <tr>
              <th scope="col">#</th>
              <th scope="col">Subject Name</th>
              <th scope="col">Subject Code</th>
              <th scope="col">Course</th>
              <th scope="col">Level</th>
              <th scope="col">Semester</th>
              <th scope="col"></th>
             
            </tr>
          </thead>
          <tbody>
            <?php foreach ($subjects as $subject):?>
            <tr>
              <th scope="row"><?=$sum++?></th>
              <td><?=$subject->subject_name?></td>
              <td><?=$subject->subject_code?></td>
              <td><?=$subject->subject_course?></td>
              <td><?=$subject->subject_level?></td>
              <td><?=$subject->subject_semester?></td>
              <td>

              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal<?=$subject->subject_id?>"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                <a href="deleteSubject.php?id=<?=$subject->subject_id?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>Delete</button></a>




   <!-- Modal -->
<div class="modal fade" id="Modal<?=$subject->subject_id?>">" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" >Edit Subject</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="updateSubject.php?id=<?=$subject->subject_id?>" method="POST">
      <div class="modal-body">
       
          <div class="mb-3">
            <label for="subject-name" class="form-label">Subject Name:</label>
            <input type="text" name="subjectName" class="form-control" id="subject-name" value="<?=$subject->subject_name?>" required>
          </div>
          <div class="mb-3">
            <label for="subjectCode" class="form-label">Subject Code:</label>
            <input type="text" name="subjectCode" class="form-control" id="subjectCode" value="<?=$subject->subject_code?>" required>
          </div>
          <div class="mb-3">
            <label for="subjectCourseType" class="form-label">Course:</label>

            <select name="subjectCourseType"class="form-control" id="subjectCourseType" required>
            <?php foreach( $courses as $course) :?>
              <?php 
                   if ($course->course_name == $subject->subject_course) {
                     echo " <option value='$course->course_name)' selected> $course->course_name</option>";
                   }
                   else{
                    echo " <option value='$course->course_name)' > $course->course_name</option>";
                   }
                   ?>                  
                <?php endforeach ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="subjectLevel" class="form-label">Level:</label>
            <select name="subjectLevel"class="form-control" id="subjectLevel" required>
            <option value = ""> Select the level</option>
            <?php
              if ($subject->subject_level == 100) {
                
                echo "<option value='100' selected>100</option>";

              } 

              else{
                echo "<option value='100' >100</option>";
              }
              
              if ($subject->subject_level == 200) {
                echo "<option value='200' selected>200</option>";
              } 

              else{
                echo "<option value='200'>200</option>";
              }

              if($subject->subject_level == 300){
                echo "<option value='300' selected>300</option>";
              }
              else{
                echo "<option value='300'>300</option>";

              }
              
            ?>

            </select>
          </div>
          <div class="mb-3">
            <label for="subjectSem" class="form-label">Semester:</label>
            <select name="subjectSem"class="form-control" id="subjectSem" required>
            <option selected>Select the semester</option>
            <?php
              if ($subject->subject_semester == 1) {
                
                echo "<option value='1' selected>first</option>";

              } 

              else{
                echo "<option value='1' >First</option>";
              }
              
              if ($subject->subject_semester == 2) {
                echo "<option value='2' selected>Second</option>";
              } 

              else{
                echo "<option value='2'>Second</option>";
              }
              
            ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>


 <!-- Modal Ends  -->

              </td>
            </tr>
            <?php endforeach ?> 
          </tbody>
    </table>
        </div>
   </main>






   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" >New Subject</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="insertSubject.php" method="POST">
      <div class="modal-body">
       
          <div class="mb-3">
            <label for="subject-name" class="form-label">Subject Name:</label>
            <input type="text" name="subjectName" class="form-control" id="subject-name" required>
          </div>
          <div class="mb-3">
            <label for="subjectCode" class="form-label">Subject Code:</label>
            <input type="text" name="subjectCode" class="form-control" id="subjectCode" required>
          </div>
          <div class="mb-3">
            <label for="subjectCourseType" class="form-label">Course:</label>

            <select name="subjectCourseType"class="form-control" id="subjectCourseType" required>
            <option> Select the course</option>
            <?php foreach( $courses as $course) :?>
            <option value="<?=$course->course_name?>"><?=$course->course_name ?></option>
            <?php endforeach ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="subjectLevel" class="form-label">Level:</label>
            <select name="subjectLevel"class="form-control" id="subjectLevel" required>
            <option value = ""> Select the level</option>
            <option value="100">100</option>
            <option value="200">200</option>
            <option value="300">300</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="subjectSem" class="form-label">Semester:</label>
            <select name="subjectSem"class="form-control" id="subjectSem" required>
            <option selected>Select the semester</option>
            <option value="1">first</option>
            <option value="2">Second</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
    </div>
  </div>
</div>
   <!-- JS -->
   <script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>



<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
  <script src="icons/js/all.js"></script>
</body>
</html>