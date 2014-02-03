<?php

App::uses('AppNoAuthController', 'Controller');

class LocationAPIController extends AppNoAuthController {
	public $uses = array('Providers');
	
	function index (){
		$this->layout ="";
		$options = array('fields'=>array('DISTINCT area'));
		$results= $this->Providers->find('all',$options);
		
		for($i=0 ; $i<count($results);$i++)
		{
		$provider = $results[$i]['Providers'];	
		$area =$provider['area'];
		$this->set('results', $area);
		echo $area.':';
		$URL = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$area.'&sensor=false';
				
		$content = file_get_contents($URL);
		$geocodeDetails = json_decode($content);
		echo  ($geocodeDetails->results{0}->geometry->location->lat).'</br>';
		echo  ($geocodeDetails->results{0}->geometry->location->lng).'</br>';
		}
	}
}