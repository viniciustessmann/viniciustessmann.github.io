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
			$(".my_audio").trigger('play');
		}
	}, 30);
}

function start()
{

}