<?php

App::uses('AppNoAuthController', 'Controller');

class LocateProviderController extends AppNoAuthController {
	
	public $uses = array('Providers','locations');
	
	
	
	
	public function getProviderDetails($searchTerm){
		
		$this->autoRender = false; // no view to render
		
		
		
		if(!empty($searchTerm)){
			{
				if(!empty($this->request->query['term'])){
					$searchTerm = $this->request->query['term'];
				}
			}
			if(empty($searchTerm)|| $searchTerm==null){
				$searchTerm = 'Something';
			}

				
			$options = array('conditions' => array(
					'Providers.provider_name LIKE' => '%'.$searchTerm.'%')
			);
				
			$results= $this->Providers->find('all',$options);
			
			if(empty($results)){
				echo 'results emptry';
			}
			
			$this->response->type('json');
			$json = json_encode(array('message'=>$results[0]));
			$this->response->body($json);
		}
	}
	
	public function getProviderDetailsList($searchTerm){
	
		$this->autoRender = false; // no view to render
	
	
	
		if(!empty($searchTerm)){
			{
				if(!empty($this->request->query['term'])){
					$searchTerm = $this->request->query['term'];
				}
			}
			if(empty($searchTerm)|| $searchTerm==null){
				$searchTerm = 'Something';
			}
	
	
			$options = array('conditions' => array(
					'Providers.provider_name LIKE' => '%'.$searchTerm.'%')
			);
	
			$results= $this->Providers->find('all',$options);
				
			if(empty($results)){
				echo 'results emptry';
			}
				
			$this->response->type('json');
			$json = json_encode(array('message'=>$results));
			$this->response->body($json);
		}
	}
	
	public function getProviderDetailsCount($searchTerm){
	
		$this->autoRender = false; // no view to render
	
	
	
		if(!empty($searchTerm)){
			{
				if(!empty($this->request->query['term'])){
					$searchTerm = $this->request->query['term'];
				}
			}
			if(empty($searchTerm)|| $searchTerm==null){
				$searchTerm = 'Something';
			}

	
			$options = array('conditions' => array(
					'Providers.provider_name LIKE' => '%'.$searchTerm.'%')
			);
	
			$results= $this->Providers->find('all',$options);
				
			if(empty($results)){
				echo 'results emptry';
			}
				
			$this->response->type('json');
			$json = json_encode(array('count'=>count($results)));
			$this->response->body($json);
		}
	}
	
	public function getProviderNearArea($AreaCode){
	
		$this->autoRender = false; // no view to render
	
	
	
		if(!empty($AreaCode)){
			{
				if(!empty($this->request->query['term'])){
					$AreaCode = $this->request->query['term'];
				}
			}
			if(empty($AreaCode)|| $AreaCode==null){
				$AreaCode = 'Something';
			}
	
	
			$options = array('fields'=>'Providers.provider_name,Providers.address,Providers.id','conditions' => array(
					'Providers.area LIKE' => '%'.$AreaCode.'%')
			);
	
			$results= $this->Providers->find('all',$options);
	
			if(empty($results)){
				//echo 'results emptry';
				
			}
	
			$this->response->type('json');
			$json = json_encode($results);
			$this->response->body($json);
		}
	}
	
	public function getAreaName($AreaCode){
	
		$this->autoRender = false; // no view to render
	
	
	
			if(!empty($AreaCode)){
			{
				if(!empty($this->request->query['term'])){
					$AreaCode = $this->request->query['term'];
				}
			}
			if(empty($AreaCode)|| $AreaCode==null){
				$AreaCode = 'Something';
			}
	
	
			$options = array('fields'=>'DISTINCT locations.tags ,locations.locationid','conditions' => array(
					'locations.tags LIKE '=> '%'.$AreaCode.'%')
			);
	
			$results= $this->locations->find('all',$options);
	
			if(empty($results)){
				echo 'results emptry';
			}
	
			$this->response->type('json');
			
			$data = array ();
			$lenght = count($results);
			if ($lenght >5) {
				$lenght =5;
			}
			for($i=0 ; $i<$lenght;$i++)
			{
			$data [$i] = array("label"=>$results[$i]['locations']['tags'],"locationID"=>$results[$i]['locations']['locationid']);
			}
			
			$json = json_encode($data);
			$this->response->body($json);
		}
	}
	
	
	
	public function setPreferredLocation($area,$locationID){
		if(!empty($area)){
			$this->Cookie->write('location-data',json_encode(array('area'=>$area,'locationID'=>$locationID)));
			$this->autoRender=false;
			$this->response->type('json');
			$json = json_encode(array('message'=>json_encode(array('area'=>$area,'locationID'=>$locationID))));
			$this->response->body($json);
		}
	}
	
	public function getPreferredLocation(){

			$location_data = $this->Cookie->read('location-data');
			$this->autoRender=false;
			$this->response->type('json');
			$json = json_encode(array('message'=>json_encode($location_data['area'])));
			$this->response->body($json);

	}
	
	public function removePreferredLocationCookie(){
		$this->autoRender=false;
		$this->Cookie->delete('location-data');
		$this->response->type('json');
		$json = json_encode("SUCCESS");
		$this->response->body($json);
	}
	
	public function getPreferredLocationID(){
	
		$location_data = $this->Cookie->read('location-data');
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode(array('message'=>json_encode($location_data['locationID'])));
		$this->response->body($json);
	
	}
}