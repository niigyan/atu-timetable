<?php 
   include_once "connection.php";
   $departmentName = $_POST['departName'];
   $numOfCourse = $_POST['numCourse'];
   

   try {
    $stmt = $conn->prepare("INSERT INTO department (department_name, number_of_courses) 
   VALUES (:departmentName, :numOfCourse)");
   $stmt->bindParam(':departmentName', $departmentName);
   $stmt->bindParam(':numOfCourse', $numOfCourse);
   $stmt->execute();
   header('Location: ' . $_SERVER['HTTP_REFERER']);


   } catch (Exception $ex) {
    echo "Connection failed: " . $ex->getMessage();
   }
   
?>