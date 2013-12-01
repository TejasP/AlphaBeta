<?php

App::uses('AppController', 'Controller');

class AuthController extends AppController {
	
	public $helpers = array('Html', 'Form', 'Session');

	public function index() {
	}
	
	public $components = array(
			'Session',
			'Auth' => array(
					'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
					'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
			)
	);
	
	public function beforeFilter() {
		$this->Auth->loginAction = array('controller' => 'auth', 'action' => 'login');
		$this->Auth->allowedActions = array('controller' => 'auth', 'action' => 'index');
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
			$this->redirect($this->Auth->redirect());
		}
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	
	
}

