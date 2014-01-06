<?php

App::uses('AuthController', 'Controller');


class DashboardController extends AuthController {
	var $uses = false;
	public $helpers = array('Html', 'Form', 'Session');
	
	public function index() {
		$this->layout = 'foundation';
	}
}