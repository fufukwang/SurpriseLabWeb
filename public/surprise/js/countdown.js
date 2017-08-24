// declare weddingdate and data variables
var weddingDate = new Date("2016-05-28"),
    years, months, days, minutes, seconds,
    //declare Dom position
    countdown = document.getElementsByClassName("integer");
console.log(countdown);

// Set padding zero's to 1 number integers
function padZero(number){
  return String("0" + number).slice(-2);
}
/*
setInterval(function() {
  var now = Date.now();
  var trackTime = (weddingDate - now)/1000;
  
  //convert miliseconds to readable date
//  years = padZero(parseInt(trackTime / 31556926));
//  trackTime = trackTime % 31556926;
//  months = padZero(parseInt(trackTime / 2629743.83));
//  trackTime = trackTime % 2629743.83;
  days = padZero(parseInt(trackTime / 86400));
  trackTime = trackTime % 86400;
  hours = padZero(parseInt(trackTime / 3600));
  trackTime = trackTime % 3600;
  minutes = padZero(parseInt(trackTime / 60));
  trackTime = trackTime % 60;
  seconds = padZero(parseInt(trackTime));
  //write date
//  countdown[0].innerHTML = years;
//  countdown[1].innerHTML = months;
  countdown[2].innerHTML = days;
  countdown[3].innerHTML = hours;
  countdown[4].innerHTML = minutes;
  countdown[5].innerHTML = seconds;
  countdown[8].innerHTML = days;
  countdown[9].innerHTML = hours;
  countdown[10].innerHTML = minutes;
  countdown[11].innerHTML = seconds;
}, 1000)
*/