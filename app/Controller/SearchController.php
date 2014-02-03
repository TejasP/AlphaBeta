<?php

App::uses('AppNoAuthController', 'Controller');

class SearchController extends AppNoAuthController {

	public $uses = array('Search');
	
	public $helpers = array('Html');
	
	public $component = array('JsHelper','RequestHandler');
	
	public function index (){
		/* Cache::write('cloud', array('testing','now','testing2','now now'));
		$cache = Cache::read('cloud'); */

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
		
		
		$options = array('conditions' => array('Search.' . $this->Search->SearchTags == 1));
		
		$results= $this->Search->find('all',$options);
		
		$this->autoRender = false; // no view to render
		$this->response->type('json');

		$json = json_encode(array('message'=>$results['Search']['SearchId']));
		$this->response->body($json);
	}
	
	public function searchAutoComplete($searchTerm = null){
		if(empty($searchTerm)){
			{
			if(!empty($this->request->query['term'])){
				$searchTerm = $this->request->query['term'];
				}
			}
		if(empty($searchTerm)|| $searchTerm==null){
			$searchTerm = 'Something';
			}
			
			
			$options = array('conditions' => array(
					'Search.SearchTags LIKE' => '%'.$searchTerm.'%')
			);
			
			$results= $this->Search->find('all',$options);
			
			//var_dump($results[0]['Search']['SearchId']);
		//	echo $results[0]['Search']['SearchId'];
		//	echo 'Total Count :'.count($results);
		//$results = array($searchTerm,'new','second');	
		$this->autoRender = false; // no view to render
		$this->response->type('json');
		$json = json_encode(array('message'=>$results[0]['Search']['SearchTags']));
		$this->response->body($json);
		}
	}
}