<?php

App::uses('AppNoAuthController', 'Controller');

class SearchController extends AppNoAuthController {

	public $uses = array('Search','Medicine','Providers');
	
	public $helpers = array('Html');
	
	public $component = array('JsHelper','RequestHandler');
	
	public function index (){
		/* Cache::write('cloud', array('testing','now','testing2','now now'));
		$cache = Cache::read('cloud'); */

		if(!empty($this->request->query['showResults'])){
			$showResults= $this->request->query['showResults'];
			$term= $this->request->query['term'];
			
			
			if(!empty($showResults)){
				if($showResults==1){
					$this->set('showTable','true');
					if(!empty($term)){
						$this->getSearchDescriptionListBasedonTerm($term);
					}
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
		
		echo '$searchTerm';
		
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
	
	public function searchAutoCompleteList(){
		$this->autoRender = false; // no view to render
	
		if(empty($searchTerm)|| $searchTerm==null){
			//		$searchTerm = 'Something';
			$searchTerm = $this->request->query['term'];
		}
		
		if(!empty($searchTerm)){
				
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
			$json = json_encode(array('message'=>$results));
			$this->response->body($json);
		}
	}
	
	public function getSearchDescriptionListBasedonID($searchId){
		$this->layout = "foundation_search_home";
		$this->set('dashboard','/alphabeta/search');
		
		
			$this->set('showTable','true');
			if(!empty($searchId)){
			/* {
				if(!empty($this->request->query['term'])){
					$searchId = $this->request->query['term'];
				}
			} */
			if(empty($searchId)|| $searchId==null){
				$searchId = 0;
			}

			$options = array('conditions' => array(
					'Search.SearchId = ' => $searchId)
			);
	
			$results= $this->Search->find('first',$options);

			
			$generic = $results['Search']['SearchTags'];
			
			
			$moptions = array('conditions' => array(
					'Medicine.generic = ' => $generic)
			);
			
			$mresults= $this->Medicine->find('all',$moptions);
			

	//		$this->response->type('json');
			$json = json_encode($mresults);
		//	$this->response->body($json); 
			$this->set('results',$mresults);
			$this->render('index');
			}
	}
	
	
	public function getSearchDescriptionListBasedonTerm($searchTerm){
		$this->layout = "foundation_search_home";
		$this->set('dashboard','/alphabeta/search');
		
		$this->set('showTable','true');
		if(!empty($searchTerm)){
		
		
				
			$moptions = array('conditions' => array(
					'Medicine.generic = ' => $searchTerm)
			);
				
			$mresults= $this->Medicine->find('all',$moptions);
				
		
			//		$this->response->type('json');
			$json = json_encode($mresults);
			//	$this->response->body($json);
			$this->set('results',$mresults);
			$this->render('index');
		}
	}
}