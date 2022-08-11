<?php
   try {
    include "connection.php";
   $course_id = $_GET['id'];
   $courseName = $_POST['courseName'];
   $courseDepart = $_POST['couDepName'];
   $numOfSem = $_POST['semNum'];
    // course_name department_name number_of_semester course_id
   $updateCourseStmt = $conn->prepare("UPDATE course SET course_name=:course_name, department_name =:department_name , number_of_semester=:number_of_semester  WHERE  course_id=:course_id ");
   $updateCourseStmt->bindParam(":course_id", $course_id);
   $updateCourseStmt->bindParam(":course_name", $courseName);
   $updateCourseStmt->bindParam(":department_name", $courseDepart);
   $updateCourseStmt->bindParam(":number_of_semester", $numOfSem);
   $updateCourseStmt->execute();
   header('Location: ' . $_SERVER['HTTP_REFERER']);
   } catch (Exception $ex) {
    echo "Connection failed: " . $ex->getMessage();
   }

?>