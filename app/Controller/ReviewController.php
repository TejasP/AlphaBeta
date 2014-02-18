<?php

App::uses('AuthController', 'Controller');
App::uses('AppController', 'Controller');

 class ReviewController extends AppController {
 	
 	public function index() {
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		
		if (($user=== 'NULL') || ($user== '')) {
			$this->set('isUserLoggedIn',"false");
		}else
		{
			$this->set('isUserLoggedIn',"true");
			$user = Authsome::get('username');
			$role = Authsome::get('role');
		}
		
		parent::polulateLeftNav($user,$role);
		$this->layout = 'foundation_with_topbar';
 	} 
 	
 	public function addReviewsbasedOnBookings($bookingsID){
 		$this->autoRender = false;
 		
 		return "BookingID".$bookingsID;
 		
 	}
 	
 	public function addReviewbasedontoken($tokenID)
 	{
 		
 	}
	
}