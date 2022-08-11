<?php

 
include "connection.php";
  $course = $_POST["course"];
   $level = $_POST['level'];
   $sem = $_POST['sem'];
  

  $mondayStmt = $conn->prepare("SELECT * FROM day_table WHERE `day` = 1  AND semester = $sem AND `level` = $level AND  course = :course");
  $mondayStmt->bindParam(":course",$course);
  $mondayStmt->execute();
  $mondayRows = $mondayStmt->rowCount();
  $mondays = $mondayStmt->fetchAll(PDO::FETCH_OBJ);

   $tuesdayStmt = $conn->prepare("SELECT * FROM day_table WHERE `day` = 2 AND semester = $sem AND `level` = $level AND  course = :course");
   $tuesdayStmt->bindParam(":course",$course);
   $tuesdayStmt->execute();
   $tuesdayRows = $tuesdayStmt->rowCount();
   $tuesdays = $tuesdayStmt->fetchAll(PDO::FETCH_OBJ);

   $wednesdayStmt = $conn->prepare("SELECT * FROM day_table WHERE `day` = 3 AND semester = $sem AND `level` = $level AND  course = :course");
   $wednesdayStmt->bindParam(":course",$course);
   $wednesdayStmt->execute();
   $wednesdayRows = $wednesdayStmt->rowCount();
   $wednesdays = $wednesdayStmt->fetchAll(PDO::FETCH_OBJ);

   $thursdayStmt = $conn->prepare("SELECT * FROM day_table WHERE `day` = 4 AND semester = $sem AND `level` = $level AND  course = :course");
   $thursdayStmt->bindParam(":course",$course);
   $thursdayStmt->execute();
   $thursdayRows = $thursdayStmt->rowCount();
   $thursdays = $thursdayStmt->fetchAll(PDO::FETCH_OBJ);

   $fridayStmt = $conn->prepare("SELECT * FROM day_table WHERE `day` = 5 AND semester = $sem AND `level` = $level AND  course = :course");
   $fridayStmt->bindParam(":course",$course);
   $fridayStmt->execute();
   $fridayRows = $fridayStmt->rowCount();
   $fridays = $fridayStmt->fetchAll(PDO::FETCH_OBJ);

  //counts
  $monCnt = $mondayRows;
   $tueCnt = $tuesdayRows;
   $wedCnt = $wednesdayRows;
   $thurCnt =$thursdayRows;
   $friCnt = $fridayRows;
   $mr = "";
   $tr = "";
   $wr = "";
   $thr = "";
   $fr ="";
             
   foreach ($mondays as $monday)  {
   //<tr>

    if ($mondayRows == ($monCnt++)) {
       $md = "<th rowspan='$mondayRows' >Monday</th>";
     }

     else {
        $md = "";
     }

     if($monday->time == 1001) {
       $mt = "<td> 7am - 9am  </td>";
       }
       elseif($monday->time == 1006) {
           $mt  = "<td> 7am - 10am </td>";
       }
       elseif($monday->time == 1002) {
         $mt  = "<td> 11am - 1pm  </td>";
       }
        elseif ($monday->time == 1007) {
         $mt  = "<td> 11am - 2pm  </td>";
       }
        elseif($monday->time == 1003) {
         $mt  = "<td> 1pm - 3pm  </div>";
       }
        elseif ($monday->time == 1008) {
         $mt  = "<td> 1pm - 4pm  </td>";
       }
        elseif ($monday->time == 1004) {
         $mt  = "<td> 2pm - 4pm  </td>";
       }
        elseif($monday->time == 1005) {
         $mt  = "<td> 3pm - 5pm  </td>";
       }
        elseif($monday->time == 1009) {
         $mt  = "<td> 2pm - 5pm  </td>";
       }


      $course   = "<td> <span>$monday->subject</span></td>";
   $mr = $mr . "<tr> $md  $mt $course </tr>";
  
   }

   foreach ($tuesdays as $tuesday)  {
    //<tr>
 
     if ($tuesdayRows == ($tueCnt++)) {
        $td = "<th rowspan='$tuesdayRows' >Tuesday</th>";
      }
    else {
        $td = "";
    }
 
      if($tuesday->time == 1001) {
        $tt = "<td> 7am - 9am  </td>";
        }
        elseif($tuesday->time == 1006) {
            $tt  = "<td> 7am - 10am </td>";
        }
        elseif($tuesday->time == 1002) {
          $tt  = "<td> 11am - 1pm  </td>";
        }
         elseif ($tuesday->time == 1007) {
          $tt  = "<td> 11am - 2pm  </td>";
        }
         elseif($tuesday->time == 1003) {
          $tt  = "<td> 1pm - 3pm  </div>";
        }
         elseif ($tuesday->time == 1008) {
          $tt  = "<td> 1pm - 4pm  </td>";
        }
         elseif ($tuesday->time == 1004) {
          $tt  = "<td> 2pm - 4pm  </td>";
        }
         elseif($tuesday->time == 1005) {
          $tt  = "<td> 3pm - 5pm  </td>";
        }
         elseif($tuesday->time == 1009) {
          $tt  = "<td> 2pm - 5pm  </td>";
        }
 
 
       $tcourse   = "<td> <span>$tuesday->subject</span></td>";
       
       
        $tr = $tr . "<tr> $td  $tt $tcourse </tr>";
      

    
   
    }

    foreach ($wednesdays as $wednesday)  {
        //<tr>
     
         if ($wednesdayRows == ($wedCnt++)) {
            $wd = "<th rowspan='$wednesdayRows' >Wednesday</th>";
          }
        else {
            $wd = "";
        }
     
          if($wednesday->time == 1001) {
            $wt = "<td> 7am - 9am  </td>";
            }
            elseif($wednesday->time == 1006) {
                $wt  = "<td> 7am - 10am </td>";
            }
            elseif($wednesday->time == 1002) {
              $wt  = "<td> 11am - 1pm  </td>";
            }
             elseif ($wednesday->time == 1007) {
              $wt  = "<td> 11am - 2pm  </td>";
            }
             elseif($wednesday->time == 1003) {
              $wt  = "<td> 1pm - 3pm  </div>";
            }
             elseif ($wednesday->time == 1008) {
              $wt  = "<td> 1pm - 4pm  </td>";
            }
             elseif ($wednesday->time == 1004) {
              $wt  = "<td> 2pm - 4pm  </td>";
            }
             elseif($wednesday->time == 1005) {
              $wt  = "<td> 3pm - 5pm  </td>";
            }
             elseif($wednesday->time == 1009) {
              $wt  = "<td> 2pm - 5pm  </td>";
            }
            
     
     
           $wcourse   = "<td> <span>$wednesday->subject</span></td>";
           
           
            $wr = $wr . "<tr> $wd  $wt $wcourse </tr>";
       
        }
    
        foreach ($thursdays as $thursday) {
            //<tr>
         
             if ($thursdayRows == ($thurCnt++)) {
                $thd = "<th rowspan='$thursdayRows' >Thursday</th>";
              }
            else {
                $thd = "";
            }
         
              if($thursday->time == 1001) {
                $tht = "<td> 7am - 9am  </td>";
                }
                elseif($thursday->time == 1006) {
                    $tht  = "<td> 7am - 10am </td>";
                }
                elseif($thursday->time == 1002) {
                  $tht  = "<td> 11am - 1pm  </td>";
                }
                 elseif ($thursday->time == 1007) {
                  $tht  = "<td> 11am - 2pm  </td>";
                }
                 elseif($thursday->time == 1003) {
                  $tht  = "<td> 1pm - 3pm  </div>";
                }
                 elseif ($thursday->time == 1008) {
                  $tht  = "<td> 1pm - 4pm  </td>";
                }
                 elseif ($thursday->time == 1004) {
                  $tht  = "<td> 2pm - 4pm  </td>";
                }
                 elseif($thursday->time == 1005) {
                  $tht  = "<td> 3pm - 5pm  </td>";
                }
                 elseif($thursday->time == 1009) {
                  $tht  = "<td> 2pm - 5pm  </td>";
                }
         
         
               $thcourse   = "<td> <span>$thursday->subject</span></td>";
               
               
                $thr = $thr . "<tr> $thd  $tht $thcourse </tr>";
           
            }


            foreach ($fridays as $friday)  {
                //<tr>
             
                 if ($fridayRows == ($friCnt++)) {
                    $fd = "<th rowspan='$fridayRows' >Friday</th>";
                  }
                else {
                    $fd = "";
                }
             
                  if($friday->time == 1001) {
                    $ft = "<td> 7am - 9am  </td>";
                    }
                    elseif($friday->time == 1006) {
                        $ft  = "<td> 7am - 10am </td>";
                    }
                    elseif($friday->time == 1002) {
                      $ft  = "<td> 11am - 1pm  </td>";
                    }
                     elseif ($friday->time == 1007) {
                      $ft  = "<td> 11am - 2pm  </td>";
                    }
                     elseif($friday->time == 1003) {
                      $ft  = "<td> 1pm - 3pm  </div>";
                    }
                     elseif ($friday->time == 1008) {
                      $ft  = "<td> 1pm - 4pm  </td>";
                    }
                     elseif ($friday->time == 1004) {
                      $ft  = "<td> 2pm - 4pm  </td>";
                    }
                     elseif($friday->time == 1005) {
                      $ft  = "<td> 3pm - 5pm  </td>";
                    }
                     elseif($friday->time == 1009) {
                      $ft  = "<td> 2pm - 5pm  </td>";
                    }
             
             
                   $fcourse   = "<td> <span>$friday->subject</span></td>";
                   
                   
                    $fr = $fr . "<tr> $fd  $ft $fcourse </tr>";
               
                }



   echo "$mr $tr $wr $thr $fr";


?>
       
     
       
