<?php
 include "fetch.php";
 if ($_POST) {
     include "insertCourse.php";
     include "updateCourse.php";
 }
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
        <li class="active"><a href="course.php"><i class="fa-solid fa-book"></i><span>Course</span></a></li>
        <li><a href="subject.php"><i class="fa-solid fa-book-open"></i><span>Subject</span></a></li>
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
            <h3>Course</h3>
        </div>
        <div class="table-container">
          <div class="addBtn">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa-solid fa-plus" style="margin-right: 2px;"></i></i>Add New</button>
          </div>
        <table  id="table_id" class="display table table-striped table-bordered">
        <thead>
            
            <tr>
              <th scope="col">#</th>
              <th scope="col">Course</th>
              <th scope="col">Department</th>
              <th scope="col">Number of Semesters</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($courses as $course) :?>
            <tr>
              <th scope="row"><?=$sum++?></th>
              <td><?=$course->course_name?></td>
              <td><?=$course->department_name?></td>
              <td><?=$course->number_of_semester?></td>      
              <td>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal<?=$course->course_id?>"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                <a href="deleteCourse.php?id=<?=$course->course_id?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>Delete</button></a>

                <!-- Modal -->
  <div class="modal fade" id="Modal<?=$course->course_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" >Edit department</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="updateCourse.php?id=<?=$course->course_id?>" method="POST">
      <div class="modal-body">
      <div class="mb-3">
            <label for="course-name" class="form-label">Course Name:</label>
            <input type="text" name="courseName" class="form-control" id="course-name" value="<?=$course->course_name?>">
          </div>
          <div class="mb-3">
            <label for="couDepName" class="form-label">Department:</label>

            <select name="couDepName"class="form-control" id="couDepName" value="<?=$course->department_name?>">
              <?php foreach ($departments as $department)  :?>
                <?php 
                   if ($department->department_name == $course->department_name) {
                     echo " <option value='$department->department_name)' selected> $department->department_name</option>";
                   }
                   else{
                    echo " <option value='$department->department_name)' > $department->department_name</option>";
                   }
                   ?>                  
                   
                   <?php endforeach ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="semNum" class="form-label">Number Of Semesters:</label>
            <input type="number" name="semNum" class="form-control" id="semNum" value="<?=$course->number_of_semester?>">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>


   </td>
            </tr>
          <?php endforeach?>
          </tbody>
    </table>
        </div>
   </main>






   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="insertCourse.php" method="POST">
      <div class="modal-body">
       
          <div class="mb-3">
            <label for="course-name" class="form-label">Course Name:</label>
            <input type="text" name="courseName" class="form-control" id="course-name">
          </div>
          <div class="mb-3">
            <label for="couDepName" class="form-label">Department:</label>

            <select name="couDepName"class="form-control" id="couDepName">
              <option selected> select the department</option>
              <?php foreach ($departments as $department)  :?>
            <option value="<?= $department->department_name?>"><?= $department->department_name?></option>
            <?php endforeach ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="semNum" class="form-label">Number Of Semesters:</label>
            <input type="number" name="semNum" class="form-control" id="semNum">
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