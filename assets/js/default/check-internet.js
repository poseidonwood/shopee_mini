var ifConnected = window.navigator.onLine;
if (ifConnected) {
  $('#connectionmodal').modal('hide')
} else {
  $('#connectionmodal').modal('show')
}
setInterval(function(){ 
var ifConnected = window.navigator.onLine;
if (ifConnected) {
  // document.getElementById("checkOnline").innerHTML = "Online";
  // document.getElementById("checkOnline").style.color = "green";
  $('#connectionmodal').modal('hide')
} else {
  // document.getElementById("checkOnline").innerHTML = "Offline";
  // document.getElementById("checkOnline").style.color = "red";
  $('#connectionmodal').modal('show')
}
}, 3000);