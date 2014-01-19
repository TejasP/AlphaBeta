<?php

App::uses('AppNoAuthController', 'Controller');

class SearchController extends AppNoAuthController {

	public $uses = array();
	
	public $helpers = array('Html');
	
	public $component = array('JsHelper','RequestHandler');
	
	public function index (){
		if(!empty($this->request->query['showResults'])){
			$showResults= $this->request->query['showResults'];
			if(!empty($showResults)){
				if($showResults==1){
					$this->set('showTable','true');
				}else{
					$this->set('showTable','false');
				}	
			}
		}
		$this->layout = "foundation_search_home";
		$this->set('dashboard','/alphabeta/search');
		
	}
	
	
	public function search($searchTerm){
		if(empty($searchTerm)|| $searchTerm==null){
			$searchTerm = 'Nothing entered...';
		}
		$this->autoRender = false; // no view to render
		$this->response->type('json');
		$json = json_encode(array('message'=>$searchTerm));
		$this->response->body($json);
	}
	
	public function searchAutoComplete($searchTerm){
		if(empty($searchTerm)|| $searchTerm==null){
			$searchTerm = 'Something';
		}
		$this->autoRender = false; // no view to render
		$this->response->type('json');
		$json = json_encode(array('message'=>$searchTerm));
		$this->response->body($json);
	}
	
}