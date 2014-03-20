<?php

App::uses('AppNoAuthController', 'Controller');

class SearchController extends AppNoAuthController {

	public $uses = array('Search','medicines_header','Providers','medicines_detail','medicines_detail_searches','search_audit','product_header');
	
	public $helpers = array('Html');
	
	public $component= array('JsHelper','RequestHandler');
	

	
	public function index (){
		/* Cache::write('cloud', array('testing','now','testing2','now now'));
		$cache = Cache::read('cloud'); */
		

		$user = Authsome::get('username');
		$role = Authsome::get('role');
		

		$this->log("inside search/index...." . $role);
		
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
		
		$isLocationSet =  $this->Cookie->read('location-data');
		
		$type= gettype($isBucketFilled);

		if($type==='string'||$type==='NULL')
		{
			$this->set('isBucketFilled',"false");
		}else{
			$this->set('isBucketFilled',"true");
		}
		
		$location_type= gettype($isLocationSet);
		
		if($location_type==='NULL')
		{
			$this->set('isLocationSet',"false");
		}else{
			$this->set('isLocationSet',"true");
			$this->set('locationText',$isLocationSet);
		}

		
			$selectedCount =0;
			$selectedCount= $this->getItemsCount();
			
			$this->set('selectedCount',$selectedCount);
		
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
				
				$moptions = array('fields' => array('medicines_header.medicine_name','medicines_header.mfg_name','medicines_header.medicine_id','medicines_header.price',),'conditions' => array(
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
	
	public function auditSearch($tag){
	
		$this->autoRender = false;
				
		$date = date('Y-m-d H:i:s', strtotime('now'));
		
		$audit_data = array(
				'search_audit' => array(
						'search_tags' => $tag,
						'search_date' => $date
				)
		);
		
		
		$return = 'false';
		$var = $this->search_audit->save($audit_data);
		if($var){
			$return = 'true';
		}
	
		$this->response->type('json');
		$json = json_encode($return);
		$this->response->body($json); 
		
	}
	
	
	public function getItemsCount(){
		$chosenId =$this->Cookie->read('basket-data');
		$count = 0;
		if(!empty($chosenId)){
			foreach(array_keys($chosenId) as $keyOut){
					$count++;
			}
		}
		return $count;
	}
	
	public function getSelectedItemsCount(){
		$chosenId =$this->Cookie->read('basket-data');
		$count = 0;
		if(!empty($chosenId)){
			foreach(array_keys($chosenId) as $keyOut){
					$count++;
			}
		}
		
		$length = $count;
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode(array('count'=>json_encode($length)));
		$this->response->body($json);
	}
	
	public function getItemDetailsBasedonID($medID){
		
		$moptions = array('fields' => array('medicines_header.quantity','medicines_header.unit_measurement','medicines_header.packaging_type','medicines_header.composition','medicines_header.generic'),'conditions' => array(
				'medicines_header.medicine_id = ' => $medID)
		);
		
		$descriptionArray= $this->medicines_header->find('all',$moptions);
		
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode($descriptionArray);
		$this->response->body($json);
	}
	
	
	public function getItemDetailsBasedonIDCategory($medID,$catID){
	
		if($catID==1){
				$moptions = array('fields' => array('medicines_header.quantity','medicines_header.unit_measurement','medicines_header.packaging_type','medicines_header.composition','medicines_header.generic'),'conditions' => array('medicines_header.medicine_id = ' => $medID));
				$descriptionArray= $this->medicines_header->find('all',$moptions);
		}
		if($catID==2){
				$moptions = array('fields' => array('product_header.prod_desc','product_header.prod_company','product_header.prod_price'),'conditions' => array('product_header.prod_id = ' => $medID));
				$descriptionArray= $this->product_header->find('all',$moptions);
		}
		
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode($descriptionArray);
		$this->response->body($json);
	}
	
	
	public function getAllGenericsBasedonGeneric($generic){
	
		$moptions = array('fields' => array('medicines_header.quantity','medicines_header.unit_measurement','medicines_header.packaging_type','medicines_header.composition','medicines_header.generic'),'conditions' => array(
				'medicines_header.generic = ' => $generic)
		);
	
		$descriptionArray= $this->medicines_header->find('all',$moptions);
	
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode($descriptionArray);
		$this->response->body($json);
	}
	
	public function getAllGenericsBasedonID($medID){
		
		$moptions = array('fields' => array('medicines_header.composition','medicines_header.generic'),'conditions' => array(
				'medicines_header.medicine_id = ' => $medID)
		);
		
		$descriptionArray= $this->medicines_header->find('all',$moptions);
				
		$generic = $descriptionArray[0]['medicines_header']['generic'];
	
		$moptions = array('fields' => array('medicines_header.quantity','medicines_header.unit_measurement','medicines_header.packaging_type','medicines_header.composition','medicines_header.generic'),'conditions' => array(
				'medicines_header.generic = ' => $generic)
		);
	
		$descriptionArray= $this->medicines_header->find('all',$moptions);
	
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode($descriptionArray);
		$this->response->body($json);
	}
}