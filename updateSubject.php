<?php
  try {
    include "connection.php";
  $subject_id = $_GET['id'];
  $subjectName = $_POST['subjectName'];
  $subjectCode = $_POST['subjectCode'];
  $subjectCourseType = $_POST['subjectCourseType'];
  $subjectLevel = $_POST['subjectLevel'];
  $subjectSem = $_POST['subjectSem'];
  
  $stmt= $conn->prepare("UPDATE `subject`  SET subject_name=:subjectName  , subject_code=:subjectCode  ,subject_course=:subjectCourseType , 
  subject_level=:subjectLevel , subject_semester=:subjectSem  WHERE subject_id=:subject_id");
  $stmt->bindParam(":subject_id", $subject_id);
  $stmt->bindParam(":subjectName", $subjectName);
  $stmt->bindParam(":subjectCode", $subjectCode);
  $stmt->bindParam(":subjectCourseType", $subjectCourseType);
  $stmt->bindParam(":subjectLevel", $subjectLevel);
  $stmt->bindParam(":subjectSem", $subjectSem);
  $stmt->execute();

  header("Location:" . $_SERVER['HTTP_REFERER']);

  } catch (Exception $ex) {
    echo "Connection failed: " . $ex->getMessage();
  }

?>