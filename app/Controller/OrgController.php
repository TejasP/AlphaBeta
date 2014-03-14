<?php

App::uses('AppNoAuthController', 'Controller');

class OrgController extends AppNoAuthController {

	public function index (){
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		
		$this->log('org index.....' . $role);
		
		if (($user=== 'NULL') || ($user== '')) {
			$this->set('isUserLoggedIn',"false");
		}else
		{
			$this->set('isUserLoggedIn',"true");
			$user = Authsome::get('username');
			$role = Authsome::get('role');	
		}

		$this->layout = "foundation_org_home";

	}
}