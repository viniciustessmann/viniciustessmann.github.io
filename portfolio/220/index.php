<!DOCTYPE html>
<html>
	<head>
		<title>220 Bike entregas</title>

		<link rel="stylesheet" href="resources/css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

	</head>
	<body>
		<?php
			include __DIR__ . '/vendor/autoload.php';
			new Tessmann\Core\Kernel();
		?>

		<header>
			<div class="suport-menu">
				<img src="resources/img/logo.jpg" />
				<ul>
					<li><a href="#">Quem somos</a></li>
					<li><a href="#">Equipe</a></li>
					<li><a href="#">Contato</a></li>
				</ul>
			</div>
		</header>

		
		<form class="main-form">
			<span>Bem vindo a 220 bike entregas!</span>
			<input type="text" class="address" placeholder="Digite o endereço para entrega ..." />
			<input type="submit" value="Enviar" />
			<span class="error-message">Mensagem de erro</span>
		</form>
		

		<div id="map">
		</div>
	</body>
</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$('.main-form').submit(function(e){

			var address = $('.address').val();
			var destLocation = null;
			var myLocation = [];

			if (address == ''){
				$('.error-message').text('Digite um endereço!');
				$('.error-message').show();
				setTimeout(function(){ $('.error-message').hide(); }, 3000);
				return false;
			}


			$('.main-form').hide();

			if (window.navigator && window.navigator.geolocation) {
			   var geolocation = window.navigator.geolocation;
			   geolocation.getCurrentPosition(sucesso, erro);
		  	} else {
		    	alert('Geolocalização não suportada em seu navegador.')
		  	}
		  	function erro(error){
		    	console.log(error)
		  	}
		  	function sucesso(posicao){

		   		myLocation.lat =  posicao.coords.latitude;
		    	myLocation.log = posicao.coords.longitude;

			}

			var url = 'http://localhost/bike_corrier/functions.php';
			var coords = null;
			$.get( url, { action: "get_location", address: "2pm" } )
			  .done(function( data ) {
			    destLocation = data;
			});

			console.log(destLocation);

			e.preventDefault();
		});


	});


	var map;
      	function initMap() {
        	map = new google.maps.Map(document.getElementById('map'), {
          	center: {lat: -31.7747258, lng: -52.4140721},
          	zoom: 10
        });
      }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFX4qcEShWOAxoBECP4OEtcgfhYfGKHMI&callback=initMap"></script>
