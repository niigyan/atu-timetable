<?php
   try {
    include "connection.php";
   $course_id = $_GET['id'];
   
    // course_name department_name number_of_semester course_id
   $delCourseStmt = $conn->prepare("DELETE FROM course  WHERE  course_id = $course_id");
   $delCourseStmt->execute();
   header('Location: ' . $_SERVER['HTTP_REFERER']);
   } catch (Exception $ex) {
    echo "Connection failed: " . $ex->getMessage();
   }

?>