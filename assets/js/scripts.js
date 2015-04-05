$(document).ready(function() {
	var d = new Date();

	var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday",];
	var month = ["January" , "February" , " March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]

	var day = weekday[d.getDay()]; 
	var month = month[d.getMonth()];
	var dayOfMonth = d.getDate(); 
	var year = d.getFullYear();

	var today = day + ", " + month + " " + dayOfMonth + ", " + year;

	$("#dateToday").text(today);	
});