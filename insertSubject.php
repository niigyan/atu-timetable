<?php
  try {
    include "connection.php";
  //subjectName subjectCode subjectCourseType subjectLevel subjectSem
  $subjectName = $_POST['subjectName'];
  $subjectCode = $_POST['subjectCode'];
  $subjectCourseType = $_POST['subjectCourseType'];
  $subjectLevel = $_POST['subjectLevel'];
  $subjectSem = $_POST['subjectSem'];
  
  $stmt= $conn->prepare("INSERT INTO `subject` ( subject_name , subject_code ,subject_course , subject_level , subject_semester ) 
  VALUES  (:subjectName , :subjectCode , :subjectCourseType , :subjectLevel , :subjectSem)");
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