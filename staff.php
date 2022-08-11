<?php

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
        <li><a href="subject.php"><i class="fa-solid fa-book-open"></i><span>Subject</span></a></li>
        <li  class="active"><a href="staff.php"><i class="fa-solid fa-people-group"></i><span>Staff</span></a></li>
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
            <h3>Staff</h3>
        </div>
        <div class="table-container">
          <div class="addBtn">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa-solid fa-plus" style="margin-right: 2px;"></i></i>Add New</button>
          </div>
        <table  id="table_id" class="display table table-striped table-bordered">
        <thead>
            
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Course</th>
              <th scope="col">Duration</th>  
              <th scope="col"></th>  
            </tr>
          </thead>
          <tbody>
          <?php foreach ($staffs as $staff) : ?>
            <tr>
              <th scope="row"><?=$sum++?></th>
              <td><?=$staff->staff_name?></td>
              <td><?=$staff->email?></td>
              <td><?=$staff->staff_subject?></td>
              <td><?=$staff->duration?></td>
              <td>
                   
             <!-- Edit n Delete -->
             <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal<?=$staff->staff_id?>"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
             <a href="deleteStaff.php?id=<?=$staff->staff_id?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>Delete</button></a>


              <!-- Modal update -->
            
<div class="modal fade" id="Modal<?=$staff->staff_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" >New Staff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="updateStaff.php?id=<?=$staff->staff_id?>" method="POST">
      <div class="modal-body">
       
          <div class="mb-3">
            <label for="staffName" class="form-label">Staff Name:</label>
            <input type="text" name="staffName" class="form-control" id="staffName" value="<?=$staff->staff_name?>" aria-required="true" required>
          </div>
          <div class="mb-3">
            <label for="staffMail" class="form-label">Email: </label>
            <input type="email" name="staffMail" class="form-control" id="staffMail" value="<?=$staff->email?>" aria-required="true" required>
          </div>
          <div class="mb-3">
            <label for="staffSubject" class="form-label">Subject:</label>
            <select name="staffSubject"class="form-control" id="staffSubject" aria-required="true" required>
            <option selected value="<?=$staff->staff_subject?>"> Select the subject</option>
            <?php foreach ($subjects as $subject) : ?>
              <?php
                 if ($staff->staff_subject == $subject->subject_name) {
                   echo "<option value='$subject->subject_name' selected>$subject->subject_name</option>";
                 }

                 else{
                  echo "<option value='$subject->subject_name'>$subject->subject_name</option>";
                 }
                ?>
            <?php endforeach ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="staffDuration" class="form-label">Duration(hrs): </label>
            <input type="number" name="staffDuration" class="form-control" value="<?=$staff->duration?>" id="staffDuration" aria-required="true" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
    </div>
  </div>
</div>
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
      <h5 class="modal-title" >New Staff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="insertStaff.php" method="POST">
      <div class="modal-body">
       
          <div class="mb-3">
            <label for="staffName" class="form-label">Staff Name:</label>
            <input type="text" name="staffName" class="form-control" id="staffName" aria-required="true" required>
          </div>
          <div class="mb-3">
            <label for="staffMail" class="form-label">Email: </label>
            <input type="email" name="staffMail" class="form-control" id="staffMail" aria-required="true" required>
          </div>
          <div class="mb-3">
            <label for="staffSubject" class="form-label">Subject:</label>
            <select name="staffSubject"class="form-control" id="staffSubject" aria-required="true" required>
            <option selected> Select the subject</option>
            <?php foreach ($subjects as $subject) : ?>
              <option value="<?=$subject->subject_name?>"><?=$subject->subject_name?></option>
            <?php endforeach ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="staffDuration" class="form-label">Duration(hrs): </label>
            <input type="number" name="staffDuration" class="form-control" id="staffDuration" aria-required="true" required>
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