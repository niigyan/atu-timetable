<?php
  try {
    include "connection.php";
  //staffName
  $staffName = $_POST['staffName'];
  $staffMail = $_POST['staffMail'];
  $staffSubject = $_POST['staffSubject'];
  $duration = $_POST['staffDuration'];


  if ($duration < 0) {
     $duration = -1 * $duration;
  }
  
  $stmt= $conn->prepare("INSERT INTO staff ( staff_name , email , staff_subject , duration ) 
  VALUES  (:staffName , :staffMail , :staffSubject , :staffDuration)");
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