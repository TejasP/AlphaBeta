<?php

App::uses('AppNoAuthController', 'Controller');

class SearchController extends AppNoAuthController {

	public $uses = array('Search','medicines_header','Providers','medicines_detail','medicines_detail_searches');
	
	public $helpers = array('Html');
	
	public $component= array('JsHelper','RequestHandler');
	

	
	public function index (){
		/* Cache::write('cloud', array('testing','now','testing2','now now'));
		$cache = Cache::read('cloud'); */
		
		
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		
		$this->Session->write('Redirect.Controller', 'Search');
		$this->Session->write('Redirect.Action', 'index');
		
		if (($user=== 'NULL') || ($user== '')) {
			$this->set('isUserLoggedIn',"false");
		}else
		{
			$this->set('isUserLoggedIn',"true");
			$user = Authsome::get('username');
			$role = Authsome::get('role');	
		}
		$isBucketFilled =  $this->Cookie->read('basket-data');
		
		$type= gettype($isBucketFilled);
		if($type==='string'||$type==='NULL')
		{
			$this->set('isBucketFilled',"false");
		}else{
			$this->set('isBucketFilled',"true");
		}
		
		if(!empty($this->request->query['showResults'])){
			$showResults= $this->request->query['showResults'];
			$term= $this->request->query['term'];
			$searchID= $this->request->query['searchID'];
			
		
			if(!empty($showResults)){
				if($showResults==1){
					$this->set('showTable','true');
					if(!empty($term)){
						$this->getSearchDescriptionListBasedonTerm($term,$searchID);
						$this->set('term',$term);
					}
				}else{
						$this->set('showTable','false');
						$this->set('term','');
				}	
			}
		}
		$this->layout = "foundation_search_home";
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
					'Search.search_tags LIKE' => '%'.$searchTerm.'%')
			);
			
			$results= $this->Search->find('all',$options);
			
			//var_dump($results[0]['Search']['SearchId']);
		//	echo $results[0]['Search']['SearchId'];
		//	echo 'Total Count :'.count($results);
		//$results = array($searchTerm,'new','second');	
		$this->autoRender = false; // no view to render
		$this->response->type('json');
		$data = array ();
		$lenght = count($results);
		if ($lenght >5) {
			$lenght =5;
		}
		for($i=0 ; $i<$lenght;$i++)
		{
			$data [$i] = array("label"=>$results[$i]['Search']['search_tags'],"searchID"=>$results[$i]['Search']['search_id']);
		}
		//$json = json_encode($results);
		$this->response->body(json_encode($data));
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
					'Search.search_tags LIKE' => '%'.$searchTerm.'%')
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
	
	
	public function getSearchDescriptionListBasedonTerm($searchTerm,$searchID){
		$this->layout = "foundation_search_home";

		$this->set('term',$searchTerm);
		if(!empty($searchTerm)){
		
		
				
			$moptions = array('limit' => 10,'conditions' => array(
					'medicines_detail_searches.search_id = ' => $searchID)
			);
				
			$medicines_detail_searches = $this->medicines_detail_searches->find('all',$moptions);
			
			$length = count($medicines_detail_searches);
			
			$mresults = array();
			
			for($i=0;$i<$length;$i++){
				$medID= $medicines_detail_searches[$i]['medicines_detail_searches']['medicine_id'];
				
				$moptions = array('fields' => array('medicines_header.medicine_name','medicines_header.mfg_name','medicines_header.medicine_id'),'conditions' => array(
						'medicines_header.medicine_id = ' => $medID)
				);
					
				$mresults[$i]= $this->medicines_header->find('all',$moptions);
			}
			
			
				
			if($mresults==null || count($mresults)==0 )
			{
				$this->set('resultsText','No Results found for '.$searchTerm);
				$this->set('showTable','false');
			}
			if($mresults!=null || count($mresults)>0 )
			{
				$this->set('resultsText','Showing Results for '.$searchTerm);
				$this->set('showTable','true');
			}
			
			
			//		$this->response->type('json');
			$json = json_encode($mresults);
			//	$this->response->body($json);
			$this->set('results',$mresults);
			$this->render('index');
		}
	}
	
	public function showBucket(){
		$this->layout = "foundation_search_home";
		
		return $this->redirect(
				array('controller' => 'Booking', 'action' => 'index')
		);
	}
	
	public function logoutUser(){
		$this->layout = "foundation_search_home";
		$this->Cookie->delete('basket-data');
		return $this->redirect(
				array('controller' => 'Search', 'action' => 'index')
		);
	}
}