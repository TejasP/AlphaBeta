<?php

App::uses('AppNoAuthController', 'Controller');

class LocationAPIController extends AppNoAuthController {
	public $uses = array('Providers_datas','locations');
	
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
	
	
	
	function getDistance() {
		
		$this->autoRender = false;
		
		$lat1 = $this->request->query['lat1']; 
		$lon1= $this->request->query['lon1']; 
		$lat2= $this->request->query['lat2']; 
		$lon2= $this->request->query['lon2']; 
		$unit=$this->request->query['unit'];
		
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);
		
		if ($unit == "K") {
			$miles = $miles * 1.609344;
		} else if ($unit == "N") {
			$miles = $miles * 0.8684;
		} else {
			$miles = $miles;
		}


		$this->response->type('json');
		$json = json_encode($miles);
		$this->response->body($json);
	}
	
	
	function getDistanceBtwoLocation($lat1,$lon1,$lat2,$lon2,$unit) {
	
		$this->autoRender = false;
	
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);
	
		if ($unit == "K") {
			$miles = $miles * 1.609344;
		} else if ($unit == "N") {
			$miles = $miles * 0.8684;
		} else {
			$miles = $miles;
		}
	
	
		$this->response->type('json');
		$json = json_encode($miles);
		$this->response->body($json);
	}
	
	
	function getDistanceBLocationProvider($lat1,$lon1,$providerID,$unit) {
	
		$this->autoRender = false;
		
		$moptions = array('fields' => array('providers_datas.provider_name','providers_datas.provider_type','providers_datas.latitude','providers_datas.longitude',),'conditions' => array(
				'providers_datas.id = ' => $providerID)
		);
		$mresults = $this->Providers_datas->find('all',$moptions);
		
		$lat2 = ($mresults[0]['Providers_datas']['latitude']);
		$lon2  = ($mresults[0]['Providers_datas']['longitude']);
		
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);
	
		if ($unit == "K") {
			$miles = $miles * 1.609344;
		} else if ($unit == "N") {
			$miles = $miles * 0.8684;
		} else {
			$miles = $miles;
		}
	
	
		$this->response->type('json');
		$json = json_encode($miles);
		$this->response->body($json);
	}
	
	function getNearestProviders($lat1,$lon1,$distance) {
	
		$this->autoRender = false;
		//First get the name of the location based on co-ordinates assuming it is pune for now.
		$city = "Pune";
		// Get all the providers for that location.
	
		$moptions = array('fields' => array('providers_datas.id','providers_datas.provider_name','providers_datas.address','providers_datas.provider_type','providers_datas.latitude','providers_datas.longitude',),'conditions' => array(
				'providers_datas.city = ' => $city)
		);
		$mresults = $this->Providers_datas->find('all',$moptions);
		
		$resultArray = array();
		
		for($i = 0;$i<count($mresults);$i++ ){
				$providerID= ($mresults[$i]['Providers_datas']['id']);
				$providerName = ($mresults[$i]['Providers_datas']['provider_name']);
				$address = ($mresults[$i]['Providers_datas']['address']);
				$lat2 = ($mresults[$i]['Providers_datas']['latitude']);
				$lon2  = ($mresults[$i]['Providers_datas']['longitude']);

				$theta = $lon1 - $lon2;
				$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
				$dist = acos($dist);
				$dist = rad2deg($dist);
				$miles = $dist * 60 * 1.1515;
				
				if($miles <=$distance){
					$resultArray[] = array($providerID,$providerName,$address);
				}
		}
		
		$this->response->type('json');
		$json = json_encode($resultArray);
		$this->response->body($json);
	}
	
	
	function getCityAreaBasedoncordinates($lat1,$lon1){
		$this->autoRender = false;
		// first get the list which is between southwest and northeast region.
		$moptions = array('fields' => array('locations.locationid','locations.tags','locations.city','locations.bounds_southwest_lat','locations.bounds_southwest_lng','locations.bounds_northeast_lat','locations.bounds_northeast_lng','locations.location_lat','locations.location_lng'),'conditions' => array('locations.bounds_northeast_lat >'=>$lat1 ,'locations.bounds_southwest_lat <'=> $lat1,'locations.bounds_northeast_lng >'=>$lon1,'locations.bounds_southwest_lng <'=>$lon1));
		
		$mresults = $this->locations->find('all',$moptions);
		$positionid;
		$lastSelectedID ;
		$lastselectedDistance;

		$count = count($mresults);
		// first do it with southwest 
			for($i=0;$i<$count;$i++){
				$locationID =$mresults[$i]['locations']['locationid'];
				$bounds_southwest_lat = $mresults[$i]['locations']['bounds_southwest_lat'];
				$bounds_southwest_lng = $mresults[$i]['locations']['bounds_southwest_lng'];
				
				$distance = $this->getDistanceLocal($lat1,$lon1,$bounds_southwest_lat,$bounds_southwest_lng,"K");
				
				if($i==0){
						$positionid = $i;
						$lastselectedDistance = $distance;
						$lastSelectedID = $locationID;
				}else{
					if($lastselectedDistance >$distance ){
						$positionid = $i;
						$lastselectedDistance  = $distance;
						$lastSelectedID = $locationID;
					}
				}
				
			}
			
			// now  do it with northeast
			for($i=0;$i<$count;$i++){
				$locationID =$mresults[$i]['locations']['locationid'];
				$bounds_northeast_lat = $mresults[$i]['locations']['bounds_northeast_lat'];
				$bounds_northeast_lng = $mresults[$i]['locations']['bounds_northeast_lng'];
			
				$distance = $this->getDistanceLocal($lat1,$lon1,$bounds_northeast_lat,$bounds_northeast_lng,"K");
				
					if($lastselectedDistance >$distance ){
						$positionid = $i;
						$lastselectedDistance  = $distance;
						$lastSelectedID = $locationID;
					}
			
			}

			
		$this->response->type('json');
		$json = json_encode($mresults[$positionid]);
		$this->response->body($json);
	}
	
	// method to only support controller functions.
	private function getDistanceLocal($lat1,$lon1,$lat2,$lon2,$unit) {
		
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);
	
		if ($unit == "K") {
			$miles = $miles * 1.609344;
		} else if ($unit == "N") {
			$miles = $miles * 0.8684;
		} else {
			$miles = $miles;
		}
	
		return $miles;
		
	}
	
	
}