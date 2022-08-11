<?php 
   include_once "connection.php";
   try {
    $staffId = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM staff WHERE staff_id = $staffId");
    $stmt->execute();
    header("Location:" . $_SERVER['HTTP_REFERER']);
   } catch (Exception $ex) {
    echo "Connection failed: " . $ex->getMessage();
   }
   
   
?>