<?php 
   include_once "connection.php";
   try {
    $stmt1 = $conn->prepare("SELECT * FROM department");
    $stmt1->execute();
    $stmt1->setFetchMode(PDO::FETCH_OBJ);
    $departments = $stmt1->fetchAll();
   //  course fetch
    $courseStmt = $conn->prepare("SELECT * FROM course");
    $courseStmt->execute();
    $courses = $courseStmt->fetchAll(PDO::FETCH_OBJ);
    
    //subject fetch
    $subjectStmt = $conn->prepare("SELECT * FROM  `subject`");
    $subjectStmt->execute();
    $subjects = $subjectStmt->fetchAll(PDO::FETCH_OBJ);

   //  staff fetch
   $staffStmt = $conn->prepare("SELECT * FROM staff");
   $staffStmt->execute();
   $staffs= $staffStmt->fetchAll(PDO::FETCH_OBJ);
    
   } catch (Exception $ex) {
    echo "Connection failed: " . $ex->getMessage();
   }
   
   
?>