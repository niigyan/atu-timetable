<?php 
   include "connection.php";
   try {
    $departmentId = $_GET['id'];
    $departmentName =$_POST['departName'];
    $numberOfCourse = $_POST['numCourse'];
    $stmt3 = $conn->prepare("UPDATE department SET department_name = :department_name , number_of_courses = :number_of_courses  WHERE id=:id");
    $stmt3->bindParam(':id', $departmentId);    
    $stmt3->bindParam(':department_name', $departmentName);
    $stmt3->bindParam(':number_of_courses', $numberOfCourse);
    $stmt3->execute();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
   } catch (Exception $ex) {
    echo "Connection failed: " . $ex->getMessage();
   }
   
   
?>