<?php   
   try {
    include "connection.php";

   $subject_id = $_GET['id'];

   $stmt = $conn->prepare("DELETE FROM `subject` WHERE subject_id = $subject_id");
   $stmt->execute();
   header("Location:" . $_SERVER['HTTP_REFERER']);
 
  } catch (Exception $ex) {
    echo "Connection failed: " . $ex->getMessage();
  }

?>