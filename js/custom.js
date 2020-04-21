

// Update the count down every 1 second
var x = setInterval(function() {
	var today = new Date();
	var target = new Date("March 9, 2020 08:00:00");
	var currentTime = today.getTime();
	var targetTime = target.getTime();
 
	var time = targetTime - currentTime;
 
	var sec = Math.floor(time/1000);
	var min = Math.floor(sec/60);
	var hrs = Math.floor(min/60);
	var days = Math.floor(hrs/24);
 
	hrs = hrs % 24;
	min = min % 60;
	sec = sec % 60;
 
 
	hrs = (hrs<10) ? "0"+hrs : hrs;
	min = (min<10) ? "0"+min : min;
	sec = (sec<10) ? "0"+sec : sec;
 
	document.getElementById('day').innerHTML = days;
	document.getElementById('hour').innerHTML = hrs;
	document.getElementById('minute').innerHTML = min;
	document.getElementById('second').innerHTML = sec;

}, 1000);