<?php

App::uses('AuthController', 'Controller');
App::uses('AppController', 'Controller');


class DashboardController extends AppController {
	var $uses = false;
	public $helpers = array('Html', 'Form', 'Session');
	
	public function index() {
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		parent::polulateLeftNav($user,$role);
		$this->layout = 'foundation_with_topbar';
	}
}