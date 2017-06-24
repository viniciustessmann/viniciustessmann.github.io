$(document).ready(function(){
	$( "#tabs" ).draggable();
	$( "#tabs" ).tabs();


	setInterval(function(){ 
		now = new Date
		$('.date').text(now);
	}, 300);
});	