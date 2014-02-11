<?php

App::uses('AppNoAuthController', 'Controller');

class BookingController extends AppNoAuthController {
	
	public $uses = array('Search','medicines_header','Providers');
	
	public function addToBucket($ItemId){
		// first check if cookie exists
		// IF yes add to existing else create cookie and add
		$cookieData = $this->Cookie->read('basket-data');
		$type= gettype($cookieData);
		if($type==='string')
		{
		$cookieData =json_decode($cookieData,true);
		}

		$basketData = array();
		$basketData =$cookieData;
		$basketData []= $ItemId;
		
		
		$this->Cookie->write('basket-data',json_encode($basketData));
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode(array('message'=>json_encode($basketData)));
		$this->response->body($json); 
	}
	
	public function removeFromBucket($ItemId){
		// remove item from cookie
		$cookieData = $this->Cookie->read('basket-data');
		$type= gettype($cookieData);

		
		 foreach (array_keys($cookieData, $ItemId) as $key) {
		 	unset($cookieData[$key]);
		}
		
		$new_cookieData = array_values($cookieData);
	
		$this->Cookie->write('basket-data',json_encode($new_cookieData));
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode(array('message'=>json_encode($new_cookieData)));
		$this->response->body($json);
	}
	
	
	public function index(){
		$this->layout = "foundation_search_home";
		$this->set('dashboard','/alphabeta/search');
		
		$isBucketFilled =  $this->Cookie->read('basket-data');
		
		$type= gettype($isBucketFilled);
		if($type==='string')
		{
			$this->set('isBucketFilled',"false");
			$this->set('showCartTable','false');
		}else{
			$this->set('isBucketFilled',"true");
			$this->set('showCartTable','true');
		}
		
		
		$this->set('showLocateTable','true');
		
		$chosenId =$this->Cookie->read('basket-data');
		$length =  count($chosenId);
		$mresults = array();
		
		for($i=0;$i<$length;$i++){

			$moptions = array('conditions' => array(
					'medicines_header.medicine_id = ' => $chosenId[$i])
			);
			
			$mresults[]= $this->medicines_header->find('all',$moptions);
		}

		
		if($mresults==null || count($mresults)==0 )
		{
			$this->set('showTable','false');
		}
		if($mresults!=null || count($mresults)>0 )
		{
			$this->set('showTable','true');
		}
	
		$this->set('results',$mresults);
	}
}