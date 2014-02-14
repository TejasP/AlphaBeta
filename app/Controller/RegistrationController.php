<?php

App::uses('AppNoAuthController', 'Controller');

class RegistrationController extends AppNoAuthController {
	
	public $helpers = array('Html', 'Form', 'Session');

	public function index() {
		$this->layout = "foundation_without_topbar";
	}
	
	public function register() {
		$this->layout = "foundation_without_topbar";
		$this->set('isUserLoggedIn','false');
	}
	
	public function addOrganization() {
		$this->layout = "foundation_without_topbar";
		$this->set('isUserLoggedIn','false');
	}
	
}