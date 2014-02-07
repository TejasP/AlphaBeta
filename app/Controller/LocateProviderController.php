<?php

App::uses('AppNoAuthController', 'Controller');

class LocateProviderController extends AppNoAuthController {
	
	public $uses = array('Providers');
	
	
	
	
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
	
	
			$options = array('conditions' => array(
					'Providers.area LIKE' => '%'.$AreaCode.'%')
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
	
	
			$options = array('fields'=>'DISTINCT Providers.area','conditions' => array(
					'Providers.area LIKE '=> '%'.$AreaCode.'%')
			);
	
			$results= $this->Providers->find('all',$options);
	
			if(empty($results)){
				echo 'results emptry';
			}
	
			$this->response->type('json');
			$json = json_encode(array('message'=>$results[0]['Providers']['area']));
			$this->response->body($json);
		}
	}
}