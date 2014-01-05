<?php

App::uses('AuthsomeComponent', 'Controller/Component');

class MobileController extends AppController{
	var $components = array('Session','RequestHandler');
	public $uses = array();
	
	/* Method to get personID based on the credential supplied ,if response null then user is not authenticated*/
	public function getAuthenticated (){
		$this->RequestHandler->setContent('json', 'application/json' );
		$username= $this->request['url']['username'];
		$password= $this->request['url']['password'];
		if(empty($username)){
			$this->set('Message', array('Please enter the username.'));
		}
		else {
			if(empty($password)){
				$this->set('Message', array('Please enter the password.'));
			}
			else{
				$this->set('Message', array('You are in !.'));
			}
		}
		$this->set('_serialize', 'Message');
	
	}
	
	/* Method to get Person and Policy Details based on the personID given*/
	public function getPersonDetails(){
		$this->RequestHandler->setContent('json', 'application/json' );
		$personID= $this->request['url']['personID'];
		
		if(empty($personID)){
			$this->set('Message', array('Please enter the personID.'));
		}
		else {
				$this->set('Message',array('PesonId'=>'P0001','Name'=>'Test'));
		}
		$this->set('_serialize', 'Message');
	}
	
	/* Method to get Claims data based on the Policy selected */
	public function getClaimsData(){
		
	}
	
	/* Method to get List of Hospital */
	public function getHospitalList(){
		
	}
	
	/* Based on disease selected getCost estimate */
	public function getCostEstimate(){
		
	}
	
	/*Based on the policy claim in process track cost */
	public function getCostTracker(){
		
	}
	
	/*Based on Policy details get entitlement and cost estimate */
	public function getPolicyEstimate()
	{
		
		
	}
}