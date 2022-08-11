<?php 
   include_once "connection.php";
   $courseName = $_POST['courseName'];
   $courseDepart = $_POST['couDepName'];
   $numOfSem = $_POST['semNum'];

   try {
    $stmt = $conn->prepare("INSERT INTO course (course_name	, department_name , number_of_semester) 
   VALUES (:course_name, :department_name, :number_of_semester)");
   $stmt->bindParam(':course_name', $courseName);
   $stmt->bindParam(':department_name', $courseDepart);
   $stmt->bindParam(':number_of_semester', $numOfSem);
   $stmt->execute();
   header('Location: ' . $_SERVER['HTTP_REFERER']);

   } catch (Exception $ex) {
    echo "Connection failed: " . $ex->getMessage();
   }
   
?>