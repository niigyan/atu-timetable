<?php
include "connection.php";
  $course = $_POST['course'];
  $level = $_POST['level'];
  $sem = $_POST['sem'];
  $output = "";
  $stmt = $conn->prepare("SELECT * FROM `subject` WHERE subject_course =:course AND subject_level=:sublevel AND subject_semester=:sem");
  $stmt->bindParam(":course", $course);
  $stmt->bindParam(":sublevel", $level);
  $stmt->bindParam(":sem", $sem);
  $stmt->execute();
  $subRows = $stmt->rowCount();
  $results = $stmt->fetchAll(PDO::FETCH_OBJ);

  if ($subRows > 0) {
    foreach ($results as $result) {

      $stmt = $conn->prepare("SELECT * FROM staff WHERE staff_subject=:subName ");
      $stmt->bindParam(":subName", $result->subject_name);
      $stmt->execute();
      $staffs = $stmt->fetchAll(PDO::FETCH_OBJ);
      foreach ($staffs as $staff) {
          $stmt = $conn->prepare("SELECT * FROM day_table WHERE `subject`=:subName ");
          $stmt->bindParam(":subName", $result->subject_name);
          $stmt->execute();
          $TABLES=$stmt->fetchAll(PDO::FETCH_OBJ);
          if (!$stmt->rowCount()) {
              $subjectName= $result->subject_name;
              $subjectCourse = $result->subject_course;
              $staffDur =$staff->duration;
              $subjectLevel = $result->subject_level;
              $staffSem = $result->subject_semester;
              $time = null;
              $tabDay =  rand(1,5);
              if ($staffDur <= 2) {
                  $time=rand(1001,1005);
              }
  
              else{
               $time = rand(1006,1009);
              }
  
              $insertTimeTable = $conn->prepare("INSERT INTO day_table ( `subject` , course , duration , semester , `level` , `time`, `day`)
               VALUES ( :subjectName , :subjectCourse , :staffDur , :staffSem , :subjectLevel , :tabtime , :tabday)");
               $insertTimeTable->bindParam(":subjectName", $subjectName);
               $insertTimeTable->bindParam(":subjectCourse", $subjectCourse);
               $insertTimeTable->bindParam(":staffDur", $staffDur);
               $insertTimeTable->bindParam(":staffSem", $staffSem);
               $insertTimeTable->bindParam(":subjectLevel", $subjectLevel);
               $insertTimeTable->bindParam(":tabtime", $time);
               $insertTimeTable->bindParam(":tabday", $tabDay);
               $insertTimeTable->execute();
  
  
          } 
          else{
              $subjectCourse = $result->subject_course;
              $subjectName= $result->subject_name;
              $staffDur =$staff->duration;
              $tabDay =  rand(1,5);
              
              $time = null;
              if ($staffDur <= 2) {
                  $time=rand(1001,1005);
              }
  
              else{
               $time = rand(1006,1009);
              }
              $insertTimeTable = $conn->prepare("UPDATE  day_table SET  course = :subjectCourse  ,`time` = :tabtime , `day` = :tabDay 
              WHERE   `subject` = :subjectName  ");
               $insertTimeTable->bindParam(":subjectCourse", $subjectCourse);
               $insertTimeTable->bindParam(":subjectName", $subjectName);
               $insertTimeTable->bindParam(":tabtime", $time);
               $insertTimeTable->bindParam(":tabDay", $tabDay);
               $insertTimeTable->execute();
  
  
  
               
          }
      }
    }
  
    // preventing courses at the same time
    $days = array(1 ,2 ,3 ,4 ,5);
    $row1 = 2;
    $row2 = 2;
    $row3 = 2;
    $row4 = 2;
    $row5 = 2;
    $row6 = 2;
    $row7 = 2;
    $row8 = 2;
    $row9 = 2;
  
    foreach ($days as $d) {
       while ($row1 >= 2 || $row2 >= 2 || $row3 >= 2|| $row4 >= 2 || $row5 >= 2 || $row6 >= 2 || $row7 >= 2 || $row8 >= 2 || $row9 >=2) {
        $stmt1 = $conn->prepare("SELECT * FROM day_table WHERE (`time` = 1006 or `time` = 1001  ) AND `day` = $d");
       $stmt1->execute();
       $row1 = $stmt1->rowCount();
      //  1
      if ($row1 >= 2) {
        $result1 = $stmt1->fetchAll(PDO::FETCH_OBJ);
             foreach ($result1 as $r) {
               if ($r->time == 1008) {
                if ($r->day == 1) {
                  $a = array(2,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                  
                } elseif ($r->day == 2) {
                  $a = array(1,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                } elseif ($r->day == 3) {
                  $a = array(1,2,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }elseif ($r->day == 4) {
                  $a = array(1,2,3,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
                elseif ($r->day == 5) {
                  $a = array(1,2,3,4);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
  
              $insertTimeTable = $conn->prepare("UPDATE  day_table SET   `day` = :tabDay  WHERE   `subject` = :subjectName ");
               $insertTimeTable->bindParam(":subjectName", $r->subject);
               $insertTimeTable->bindParam(":tabDay", $d);
               $insertTimeTable->execute();
               }
             }
           }
  
          //  
  
  
       $stmt2 = $conn->prepare("SELECT * FROM day_table WHERE (`time` = 1007  or `time` = 1002)  AND `day` = $d");
       $stmt2->execute();
       $row2 = $stmt2->rowCount();
      //  2
      if ($row2 >= 2) {
        $result2 = $stmt2->fetchAll(PDO::FETCH_OBJ);
             foreach ($result2 as $r) {
               if ($r->time == 1008) {
                if ($r->day == 1) {
                  $a = array(2,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                  
                } elseif ($r->day == 2) {
                  $a = array(1,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                } elseif ($r->day == 3) {
                  $a = array(1,2,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }elseif ($r->day == 4) {
                  $a = array(1,2,3,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
                elseif ($r->day == 5) {
                  $a = array(1,2,3,4);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
  
              $insertTimeTable = $conn->prepare("UPDATE  day_table SET   `day` = :tabDay  WHERE   `subject` = :subjectName ");
               $insertTimeTable->bindParam(":subjectName", $r->subject);
               $insertTimeTable->bindParam(":tabDay", $d);
               $insertTimeTable->execute();
               }
             }
           }
          //  
  
       $stmt3 = $conn->prepare("SELECT * FROM day_table WHERE (`time` = 1007 or `time` = 1003 )  AND `day` = $d");
       $stmt3->execute();
       $row3 = $stmt3->rowCount();
      //  3
      if ($row3 >= 2) {
        $result3 = $stmt3->fetchAll(PDO::FETCH_OBJ);
             foreach ($result3 as $r) {
               if ($r->time == 1008) {
                if ($r->day == 1) {
                  $a = array(2,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                  
                } elseif ($r->day == 2) {
                  $a = array(1,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                } elseif ($r->day == 3) {
                  $a = array(1,2,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }elseif ($r->day == 4) {
                  $a = array(1,2,3,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
                elseif ($r->day == 5) {
                  $a = array(1,2,3,4);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
  
              $insertTimeTable = $conn->prepare("UPDATE  day_table SET   `day` = :tabDay  WHERE   `subject` = :subjectName ");
               $insertTimeTable->bindParam(":subjectName", $r->subject);
               $insertTimeTable->bindParam(":tabDay", $d);
               $insertTimeTable->execute();
               }
             }
           }
  // 
  
       $stmt4 = $conn->prepare("SELECT * FROM day_table WHERE (`time` = 1008  or `time` = 1003 ) AND `day` = $d");
       $stmt4->execute();
       $row4 = $stmt4->rowCount();
      //  4
      if ($row4 >= 2) {
        $result4 = $stmt4->fetchAll(PDO::FETCH_OBJ);
             foreach ($result4 as $r) {
               if ($r->time == 1008) {
                if ($r->day == 1) {
                  $a = array(2,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                  
                } elseif ($r->day == 2) {
                  $a = array(1,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                } elseif ($r->day == 3) {
                  $a = array(1,2,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }elseif ($r->day == 4) {
                  $a = array(1,2,3,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
                elseif ($r->day == 5) {
                  $a = array(1,2,3,4);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
  
              $insertTimeTable = $conn->prepare("UPDATE  day_table SET   `day` = :tabDay  WHERE   `subject` = :subjectName ");
               $insertTimeTable->bindParam(":subjectName", $r->subject);
               $insertTimeTable->bindParam(":tabDay", $d);
               $insertTimeTable->execute();
               }
             }
           }
  
  
      // 
  
       $stmt5 = $conn->prepare("SELECT * FROM day_table WHERE (`time` = 1008 or `time` = 1004 )  AND `day` = $d");
       $stmt5->execute();
       $row5 = $stmt5->rowCount();
      //  5
      if ($row5 >= 2) {
        $result5 = $stmt5->fetchAll(PDO::FETCH_OBJ);
             foreach ($result5 as $r) {
               if ($r->time == 1008) {
                if ($r->day == 1) {
                  $a = array(2,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                  
                } elseif ($r->day == 2) {
                  $a = array(1,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                } elseif ($r->day == 3) {
                  $a = array(1,2,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }elseif ($r->day == 4) {
                  $a = array(1,2,3,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
                elseif ($r->day == 5) {
                  $a = array(1,2,3,4);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
  
              $insertTimeTable = $conn->prepare("UPDATE  day_table SET   `day` = :tabDay  WHERE   `subject` = :subjectName ");
               $insertTimeTable->bindParam(":subjectName", $r->subject);
               $insertTimeTable->bindParam(":tabDay", $d);
               $insertTimeTable->execute();
               }
             }
           }
      // 
  
       $stmt6 = $conn->prepare("SELECT * FROM day_table WHERE (`time` = 1009  or `time` = 1004 ) AND `day` = $d");
       $stmt6->execute();
       $row6 = $stmt6->rowCount();
      //  6
      if ($row6 >= 2) {
        $result6 = $stmt6->fetchAll(PDO::FETCH_OBJ);
             foreach ($result6 as $r) {
               if ($r->time == 1009) {
                if ($r->day == 1) {
                  $a = array(2,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                  
                } elseif ($r->day == 2) {
                  $a = array(1,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                } elseif ($r->day == 3) {
                  $a = array(1,2,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }elseif ($r->day == 4) {
                  $a = array(1,2,3,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
                elseif ($r->day == 5) {
                  $a = array(1,2,3,4);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
  
              $insertTimeTable = $conn->prepare("UPDATE  day_table SET   `day` = :tabDay  WHERE   `subject` = :subjectName ");
               $insertTimeTable->bindParam(":subjectName", $r->subject);
               $insertTimeTable->bindParam(":tabDay", $d);
               $insertTimeTable->execute();
               }
             }
           }
      //  
      $stmt7 = $conn->prepare("SELECT * FROM day_table WHERE (`time` = 1009  or `time` = 1005) AND `day` = $d");
      $stmt7->execute();
      $row7 = $stmt7->rowCount();
      // 7
      if ($row7 >= 2) {
       $result7 = $stmt7->fetchAll(PDO::FETCH_OBJ);
            foreach ($result8 as $r) {
              if ($r->time == 1005) {
               if ($r->day == 1) {
                 $a = array(2,3,4,5);
                 $rd = array_rand($a);
                 $d = $a[$rd];
                 
               } elseif ($r->day == 2) {
                 $a = array(1,3,4,5);
                 $rd = array_rand($a);
                 $d = $a[$rd];
               } elseif ($r->day == 3) {
                 $a = array(1,2,4,5);
                 $rd = array_rand($a);
                 $d = $a[$rd];
               }elseif ($r->day == 4) {
                 $a = array(1,2,3,5);
                 $rd = array_rand($a);
                 $d = $a[$rd];
               }
               elseif ($r->day == 5) {
                 $a = array(1,2,3,4);
                 $rd = array_rand($a);
                 $d = $a[$rd];
               }
 
             $insertTimeTable = $conn->prepare("UPDATE  day_table SET   `day` = :tabDay  WHERE   `subject` = :subjectName ");
              $insertTimeTable->bindParam(":subjectName", $r->subject);
              $insertTimeTable->bindParam(":tabDay", $d);
              $insertTimeTable->execute();
              }
            }
          }

    // 
  
       $stmt8 = $conn->prepare("SELECT * FROM day_table WHERE (`time` = 1008 or `time` = 1009) AND `day` = $d ");
       $stmt8->execute();
       $row8 = $stmt8->rowCount();
       // 8
       if ($row8 >= 2) {
        $result8 = $stmt8->fetchAll(PDO::FETCH_OBJ);
             foreach ($result8 as $r) {
               if ($r->time == 1008) {
                if ($r->day == 1) {
                  $a = array(2,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                  
                } elseif ($r->day == 2) {
                  $a = array(1,3,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                } elseif ($r->day == 3) {
                  $a = array(1,2,4,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }elseif ($r->day == 4) {
                  $a = array(1,2,3,5);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
                elseif ($r->day == 5) {
                  $a = array(1,2,3,4);
                  $rd = array_rand($a);
                  $d = $a[$rd];
                }
  
              $insertTimeTable = $conn->prepare("UPDATE  day_table SET   `day` = :tabDay  WHERE   `subject` = :subjectName ");
               $insertTimeTable->bindParam(":subjectName", $r->subject);
               $insertTimeTable->bindParam(":tabDay", $d);
               $insertTimeTable->execute();
               }
             }
           }

          //  
          $stmt9 = $conn->prepare("SELECT * FROM day_table WHERE (`time` = 1008  or `time` = 1007) AND `day` = $d");
          $stmt9->execute();
          $row9 = $stmt9->rowCount();
          // 7
          if ($row9 >= 2) {
           $result9 = $stmt9->fetchAll(PDO::FETCH_OBJ);
                foreach ($result9 as $r) {
                  if ($r->time == 1008) {
                   if ($r->day == 1) {
                     $a = array(2,3,4,5);
                     $rd = array_rand($a);
                     $d = $a[$rd];
                     
                   } elseif ($r->day == 2) {
                     $a = array(1,3,4,5);
                     $rd = array_rand($a);
                     $d = $a[$rd];
                   } elseif ($r->day == 3) {
                     $a = array(1,2,4,5);
                     $rd = array_rand($a);
                     $d = $a[$rd];
                   }elseif ($r->day == 4) {
                     $a = array(1,2,3,5);
                     $rd = array_rand($a);
                     $d = $a[$rd];
                   }
                   elseif ($r->day == 5) {
                     $a = array(1,2,3,4);
                     $rd = array_rand($a);
                     $d = $a[$rd];
                   }
     
                 $insertTimeTable = $conn->prepare("UPDATE  day_table SET   `day` = :tabDay  WHERE   `subject` = :subjectName ");
                  $insertTimeTable->bindParam(":subjectName", $r->subject);
                  $insertTimeTable->bindParam(":tabDay", $d);
                  $insertTimeTable->execute();
                  }
                }
              }

          // 
       }
    }
    echo "<tr><td colspan='3' style='text-align: center;'>Table generated - Click view table to see the timetable</td></tr>" ;
  }
  else {
     echo "<tr><td colspan='3' style='text-align: center;'>No subjects available</td></tr>";
  }


?>