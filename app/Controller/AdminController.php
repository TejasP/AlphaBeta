<?php

App::uses('AppNoAuthController', 'Controller');

class AdminController extends AppNoAuthController {

	public function index (){
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		
		$this->log('admin index.....' . $role);
		
		if (($user=== 'NULL') || ($user== '')) {
			$this->set('isUserLoggedIn',"false");
		}else
		{
			$this->set('isUserLoggedIn',"true");
			$user = Authsome::get('username');
			$role = Authsome::get('role');	
		}

		$this->layout = "foundation_admin_home";

	}
}