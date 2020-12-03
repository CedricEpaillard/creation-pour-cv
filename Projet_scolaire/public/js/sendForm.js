
var temps = 0;
var chrono = setInterval(function(){
    if (temps < 5){
  document.getElementById("temps").innerHTML = 4 - temps;
  temps += 1;}
 else  if(temps == 5){
    window.location = "index.php?page=contact";}

}, 1000);

