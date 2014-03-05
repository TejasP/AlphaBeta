<?php

App::uses('AuthComponent', 'Controller/Component');

class UsersController extends AppController {
	
	public $uses = array('user','login_token');

	var $components = array('Session','RequestHandler','Cookie');
	
   /*  public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    } */

    public function index() {
    	$user = Authsome::get('username');
		$role = Authsome::get('role');
		
		if (($user=== 'NULL') || ($user== '')) {
			$this->set('isUserLoggedIn',"false");
		}else
		{
			$this->set('isUserLoggedIn',"true");
		}
		
		$isBucketFilled =  $this->Cookie->read('basket-data');
		
		$type= gettype($isBucketFilled);
		if($type==='string'||$type==='NULL')
		{
			$this->set('isBucketFilled',"false");
		}else{
			$this->set('isBucketFilled',"true");
		}
		
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
    	$this->layout = "foundation_search_home";
   	
    	$user = Authsome::get('username');
    	$role = Authsome::get('role');
    	
    	if (($user=== 'NULL') || ($user== '')) {
    		$this->set('isUserLoggedIn',"false");
    	}else
    	{
    		$this->set('isUserLoggedIn',"true");
    	}
    	
    	
    	$isBucketFilled =  $this->Cookie->read('basket-data');
    	
    	$type= gettype($isBucketFilled);
    	
    	if($type==='string'||$type==='NULL')
    	{
    		$this->set('isBucketFilled',"false");
    	}else{
    		$this->set('isBucketFilled',"true");
    	}
    	
    	if (empty($this->data)) {
    		return;
    	}
    	
    	$user = Authsome::login($this->data['User']);
    	if (!$user) {
    		$this->Session->setFlash(__('Unknown user or wrong password'));
    		return;
    	}
    	$controller = $this->Session->read('Redirect.Controller');
    	$action= $this->Session->read('Redirect.Action');
    	echo $controller;
    	
    	if($controller!=null || $controller != ''){
    		return  $this->redirect(array('controller' => $controller,'action' => $action));
    	}
    	else{
    		return  $this->redirect(array('controller' => 'search','action' => 'index'));
    	} 
    	
    }
    
    public function logout() {
    	$user = Authsome::logout();
    	return  $this->redirect(array('controller' => 'search','action' => 'logoutUser'));
    }
    
    public function  resetPassword($userID){
    	$this->autoRender = false; // no view to render

    	//First generate token add to DB and send link
    	$date = date('Y-m-d H:i:s', strtotime('+1 hours'));
    	$duration = '+1 hours';
    	$token = md5(uniqid(mt_rand(), true));
    	
    	$token_data = array(
    			'login_token' => array(
    					'user_id' => $userID,
    					'token' => $token,
    					'duration' => $duration,
    					'expires' => $date
    			)
    	);
    		
    	
	//	$return = $this->login_token->save($token_data);
		echo 'hi'.$return;
	
    /* 	$log = $this->login_token->getDataSource()->getLog(false, false);
    	echo $log; */
    	
    	$this->response->type('json');
    	$json = json_encode($return);
    	$this->response->body($json);
    	
    }

	public function validatePassword($tokenID){
    	// get Token and check against the DB and ask user to update password.
    	
	}
	
	public function firstPage() {
		$user = Authsome::get('username');
		$role = Authsome::get('role');
	
		if (($user=== 'NULL') || ($user== '')) {
			$this->set('isUserLoggedIn',"false");
		}else
		{
			$this->set('isUserLoggedIn',"true");
		}
	
		$isBucketFilled =  $this->Cookie->read('basket-data');
	
		$type= gettype($isBucketFilled);
		if($type==='string'||$type==='NULL')
		{
			$this->set('isBucketFilled',"false");
		}else{
			$this->set('isBucketFilled',"true");
		}
		
		parent::polulateLeftNav($user,$role);
		$this->layout = 'foundation_without_topbar';
		
		//$this->User->recursive = 0;
		$this->set('users', $this->paginate());
		$this->render('login');
	}
}