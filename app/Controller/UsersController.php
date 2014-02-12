<?php

App::uses('AuthComponent', 'Controller/Component');

class UsersController extends AppController {

	var $components = array('Session','RequestHandler');
	
   /*  public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    } */

    public function index() {
    	$user = Authsome::get('username');
    	$role = Authsome::get('role');
    	parent::polulateLeftNav($user,$role);
    	$this->layout = 'foundation_with_topbar';
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
    	$user = Authsome::get('username');
    	$role = Authsome::get('role');
    	parent::polulateLeftNav($user,$role);
    	$this->layout = 'foundation_with_topbar';
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
    	$user = Authsome::get('username');
    	$role = Authsome::get('role');
    	parent::polulateLeftNav($user,$role);
    	$this->layout = 'foundation_with_topbar';
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
    	$user = Authsome::get('username');
    	$role = Authsome::get('role');
    	parent::polulateLeftNav($user,$role);
    	$this->layout = 'foundation_with_topbar';
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    

    
    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
    
    public function login() {
    	if (empty($this->data)) {
    		return;
    	}
    	
    	$user = Authsome::login($this->data['User']);
    	if (!$user) {
    		$this->Session->setFlash(__('Unknown user or wrong password'));
    		return;
    	}
    	else{
    		return  $this->redirect(array('controller' => 'search','action' => 'index'));
    	}

    	$user = Authsome::get();
    	//debug($user); 
    }
    
    public function logout() {
    	$user = Authsome::logout();
    	return  $this->redirect(array('controller' => 'search','action' => 'logoutUser'));
    }


}