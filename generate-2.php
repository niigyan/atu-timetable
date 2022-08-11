<?php
  include "fetch.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <title>timetable</title>
</head>
<body>
    <form action="#" method="post" id="form">
        <div>
        <label for="course">Select the course</label>
        <select name="course" id="course">
          <?php foreach($courses as $course) : ?>
          
          <option value="<?=$course->course_name?>"><?=$course->course_name?></option>
          <?php endforeach ?>
        </select>
        </div>
    <div>
    <label for="level">Select the level</label>
        <select name="level" id="level">
        <option value="100">100</option>
            <option value="200">200</option>
            <option value="300">300</option>
        </select>
    </div>
    <div>
    <label for="level">Select the Sem</label>
        <select name="sem" id="sem">
        <option value="1">first</option>
            <option value="2">second</option>
        </select>
    </div>
    <input type="submit" value="submit" id="submit">
    
    </form>

    
      <table border="2">
        <thead border>
          <tr>
          <th>1iiiiiiiiiiiiiiiiiii</th>
          <th>1</th>
          <th>1</th>

          </tr>
        </thead>
          <tbody id="demo">

          </tbody>
      </table>
    

    <script>
        
        document.getElementById("form").addEventListener("click", function(event){
  event.preventDefault()
});

document.getElementById("submit").addEventListener("click",()=>{
    let level = document.getElementById("level").value;
  let course = document.getElementById("course").value;
  let sem = document.getElementById("sem").value;



  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    document.getElementById("demo").innerHTML = this.responseText;
  }
  xhttp.open("POST", "string2.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("course=" + course + "&level=" + level +"&sem="+ sem);
})


    </script>
</body>
</html>