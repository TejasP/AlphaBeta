<?php

App::uses('AppController', 'Controller');

class RegistrationController extends AppController {
	
	public $helpers = array('Html', 'Form', 'Session');

	public function index() {
		$this->layout = "foundation_with_topbar";
		$this->set('dashboard','/alphabeta/search');
	}
	
	public function addPerson() {
		$this->layout = "foundation_with_topbar";
		$this->set('dashboard','/alphabeta/search');
	}
	
	public function addOrganization() {
		$this->layout = "foundation_with_topbar";
		$this->set('dashboard','/alphabeta/search');
	}
	
}