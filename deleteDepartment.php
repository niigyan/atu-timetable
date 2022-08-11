<?php 
   include_once "connection.php";
   try {
    $departmentId = $_GET['id'];
    $stmt2 = $conn->prepare("DELETE FROM department WHERE id = $departmentId");
    $stmt2->execute();
    header('Location: department.php');
    header("Location:" . $_SERVER['HTTP_REFERER']);
   } catch (Exception $ex) {
    echo "Connection failed: " . $ex->getMessage();
   }
   
   
?>