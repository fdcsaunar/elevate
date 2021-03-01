// jQuery(document).ready(() => routes.loadEvents());

// var countDownDate = new Date('Apr 12, 2021 0:0:0').getTime(); // Update the count down every 1 second

// var x = setInterval(function () {
//   // Get today's date and time
//   var now = new Date().getTime(); // Find the distance between now and the count down date

//   var distance = countDownDate - now; // Output the result in an element with id="demo"
//   // Time calculations for days, hours, minutes and seconds


//   if (distance < 0) {
//     clearInterval(x);
//     document.getElementById('timer').innerHTML = 'Elevate 2021 has started!';
//   }
// }, 1000);


// Set the date we're counting down to
var countDownDate = new Date("April 16, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  if( document.getElementById('day') != null ) document.getElementById('day').innerHTML = days;
  var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
  if( document.getElementById('hour') != null ) document.getElementById('hour').innerHTML = hours;
  var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
  if( document.getElementById('min') != null ) document.getElementById('min').innerHTML = minutes;
  var seconds = Math.floor(distance % (1000 * 60) / 1000);
  if( document.getElementById('sec') != null ) document.getElementById('sec').innerHTML = seconds; // If the count down is over, write some text 

    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "EXPIRED";
  }
}, 1000);

