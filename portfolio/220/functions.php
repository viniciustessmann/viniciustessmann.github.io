<?php

if (isset($_GET['action']) || $_GET['action'] == 'get_location') {
		
	$address = $_GET['address'];

	$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');

	$output= json_decode($geocode);

	$location['lat'] = $output->results[0]->geometry->location->lat;
	$location['long'] = $output->results[0]->geometry->location->lng;

	header('Content-Type: application/json');
	echo '{"status":"success","lat":"' . $location['lat'] . '", "long": "' . $location['long'] . '"}';
	die;   
}
