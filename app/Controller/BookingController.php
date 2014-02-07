<?php

App::uses('AppNoAuthController', 'Controller');

class BookingController extends AppNoAuthController {
	
	public $uses = array('Search','Medicine','Providers');
	
	public function addToBucket($ItemId){
		// first check if cookie exists
		// IF yes add to existing else create cookie and add
		$this->Cookie->write('item',$ItemId);
		$this->autoRender=false;
		$this->response->type('json');
		$json = json_encode(array('message'=>$this->Cookie->read('item')));
		$this->response->body($json);
	}
	
	
	public function index(){
		$this->layout = "foundation_search_home";
		$this->set('dashboard','/alphabeta/search');
		
		$this->set('showCartTable','true');
		$this->set('showLocateTable','true');
		
		$chosenId =$this->Cookie->read('item');
		
		
		$moptions = array('conditions' => array(
				'Medicine.id = ' => $chosenId)
		);
		
		$mresults= $this->Medicine->find('all',$moptions);
			
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