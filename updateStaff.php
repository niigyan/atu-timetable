<?php
  try {
    include "connection.php";
  //staffName
  $staffId = $_GET['id'];
  $staffName = $_POST['staffName'];
  $staffMail = $_POST['staffMail'];
  $staffSubject = $_POST['staffSubject'];
  $duration = $_POST['staffDuration'];


  if ($duration < 0) {
     $duration = -1 * $duration;
  }
  
  $stmt= $conn->prepare("UPDATE  staff SET staff_name=:staffName , email=:staffMail , staff_subject=:staffSubject , duration=:staffDuration  
   WHERE staff_id=:staffId ");
  $stmt->bindParam(":staffId", $staffId);
  $stmt->bindParam(":staffName", $staffName);
  $stmt->bindParam(":staffMail", $staffMail);
  $stmt->bindParam(":staffSubject", $staffSubject);
  $stmt->bindParam(":staffDuration", $duration);
  $stmt->execute();

  header("Location:" . $_SERVER['HTTP_REFERER']);

  } catch (Exception $ex) {
    echo "Connection failed: " . $ex->getMessage();
  }

?>