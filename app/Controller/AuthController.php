<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

class AuthController extends AppController {
	
	
	public $helpers = array('Html', 'Form', 'Session');

	public function index() {
	}
	

	/* public function login() {
		  if ($this->request->is('post')) {

		  	
			 if ($this->Auth->login()) {
				//$this->Session->setFlash(__('Username or password successful'));
				$this->Session->setFlash(__('UserName Password',array($this->request->data['User']['username'])));
				
				//return $this->redirect($this->Auth->redirect());
			 	return $this->redirect(array('controller' => 'demo','action' => 'index'));
			}
				$this->Session->setFlash(__('Invalid username or password, try again'));
				//return $this->redirect(array('controller' => 'dashboard','action' => 'index'));
				return $this->redirect($this->Auth->redirect());
		}
		

	} */
	
	public function login() {
		
		if (empty($this->data)) {
			return;
		}
		 
		$user = Authsome::login($this->data['User']);
		if (!$user) {
			$this->Session->setFlash(__('Unknown user or wrong password'));
			return;
		}
	
		$user = Authsome::get();
		debug($user);
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	
	
}

