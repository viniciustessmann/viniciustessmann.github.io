$(document).ready(function(){

	$( "#tabs" ).draggable();
	$( "#tabs" ).tabs();

	/* set hour on menu */
	setInterval(function(){ 
		now = new Date
		$('.date').text(now);
	}, 300);

	$('.suportPower').click(function(){
		$(this).hide();
		$('.suportLoad').show();
		power();
	});

	$('.btnStart').click(function(){
		$('#menuStart').show();
		$(this).hide();
	});

	$('.openTerminal').click(function(){
		$('.btnStart').show();
		$('#menuStart').hide();
		$('#tabs').show();
	});

	$('.close').click(function(){
		$('#tabs').hide();
	});


	$('.btnOK').click(function(){
		$('#error').hide();
	});
});	

/* Fake load start */
function power()
{
	var load = 1;	
	var timerload = setInterval(function(){ 
		$('.internal').css('width', load + '%');
		load = load + 1;
		if (load >= 100) {
			clearInterval(timerload);
			$('#contentLoad').hide();
			start();
		}
	}, 30);
}
	
function crash()
{
	var timeError = Math.floor(Math.random() * (5000 - 1000 + 1)) + 1000;
	setTimeout(function(){ 
		$('#error').show();
		$(".my_audio_error").trigger('play');
	}, timeError);

}

function start()
{
	$(".my_audio").trigger('play');
	crash();
}