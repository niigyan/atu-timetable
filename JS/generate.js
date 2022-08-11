document.getElementById("form").addEventListener("click", function(event){
    event.preventDefault()
  });

  document.getElementById("view").addEventListener("click",()=>{
  let level = document.getElementById("level").value;
  let course = document.getElementById("course").value;
  let sem = document.getElementById("sem").value;



  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {

  if (this.readyState ==  1 && this.status ==200 ) {
    document.getElementById("message").innerHTML = "<tr><td colspan='3'><div class='gif'><img src='img/load.svg'  alt='Loading..' class='loading-gif'></div></td></tr>";
  }

  if (this.readyState ==  2 && this.status ==200) {
    document.getElementById("message").innerHTML = "<tr><td colspan='3'><div class='gif'><img src='img/load.svg'  alt='Loading..' class='loading-gif'></div></td></tr>";
  }

  if (this.readyState ==  3 && this.status ==200) {
    document.getElementById("message").innerHTML = "<tr><td colspan='3'><div class='gif'><img src='img/load.svg'  alt='Loading..' class='loading-gif'></div></td></tr>";
 }

if (this.readyState ==  4 && this.status ==200) {
 document.getElementById("message").innerHTML = "<tr><td colspan='3'><div class='gif'><img src='img/load.svg'  alt='Loading..' class='loading-gif'></div></td></tr>";

    setTimeout(() => {
      document.getElementById("head").innerHTML= course+ "  Level " + level; 
      if (sem == 1 || sem == "1" ) {
        document.getElementById("semester").textContent = "first " + "semester";
      } else {
        document.getElementById("semester").textContent = "Second " + "semester";
      }
      document.getElementById("message").innerHTML = this.responseText;
    }, 750);
        
    
}
    
  }
  xhttp.open("POST", "table.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("course=" + course + "&level=" + level +"&sem="+ sem);
});

document.getElementById("generate").addEventListener("click",()=>{
  let level = document.getElementById("level").value;
  let course = document.getElementById("course").value;
  let sem = document.getElementById("sem").value;
  


  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {

  if ((this.readyState ==  1 || this.readyState ==  2 || this.readyState ==  3) && this.status ==200 ) {
    document.getElementById("message").innerHTML = "<tr><td colspan='3'><div class='gif'><img src='img/load.svg'  alt='Loading..' class='loading-gif'></div></td></tr>";
  }


if (this.readyState ==  4 && this.status ==200) {
 document.getElementById("message").innerHTML = "<tr><td colspan='3'><div class='gif'><img src='img/load.svg'  alt='Loading..' class='loading-gif'></div></td></tr>";

    setTimeout(() => {
      document.getElementById("head").innerHTML= course+ "  Level " + level; 
      if (sem == 1 || sem == "1" ) {
        document.getElementById("semester").textContent = "first " + "semester";
      } else {
        document.getElementById("semester").textContent = "Second " + "semester";
      }
      
      document.getElementById("message").innerHTML = this.responseText;
    }, 750);
        
    
}
    
  }
  xhttp.open("POST", "generate-table.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("course=" + course + "&level=" + level +"&sem="+ sem);
});

document.getElementById("excel").addEventListener("click",()=>{
  let level = document.getElementById("level").value;
  let course = document.getElementById("course").value;
  const filename = course + "" + level;
   

    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("table"),filename);
});


