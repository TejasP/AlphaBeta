<?php

App::uses('AppNoAuthController', 'Controller');

class RegistrationController extends AppNoAuthController {
	
	public $helpers = array('Html', 'Form', 'Session');

	public function index() {
		$this->layout = "foundation_without_topbar";
	}
	
	public function register() {
		$this->layout = "foundation_search_home";
		

		 
		$isBucketFilled =  $this->Cookie->read('basket-data');
		 
		$type= gettype($isBucketFilled);
		 
		if($type==='string'||$type==='NULL')
		{
			$this->set('isBucketFilled',"false");
		}else{
			$this->set('isBucketFilled',"true");
		}
		
		$this->set('isUserLoggedIn','false');
	}
	
	public function addOrganization() {
		$this->layout = "foundation_without_topbar";
		$this->set('isUserLoggedIn','false');
	}
	
}