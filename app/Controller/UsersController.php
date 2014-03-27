<?php


App::uses('AppNoAuthController', 'Controller');

class UsersController extends AppController {
	
	public $uses = array('User','login_token');

	
   /*  public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    } */

    public function index() {
    	$username = Authsome::get('username');
		$role = Authsome::get('role');
		
		if (($username=== 'NULL') || ($username== '')) {
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
		
    //	parent::polulateLeftNav($user,$role);
    	$this->layout = 'foundation_with_topbar';
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
    	$username = Authsome::get('username');
    	$role = Authsome::get('role');
    	parent::polulateLeftNav($username,$role);
    	$this->layout = 'foundation_with_topbar';
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
    	$username = Authsome::get('username');
    	$role = Authsome::get('role');
    	
    //	parent::polulateLeftNav($username,$role);
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
    	$username = Authsome::get('username');
    	$role = Authsome::get('role');
    	parent::polulateLeftNav($username,$role);
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
    	
    	$this->layout = "foundation_with_topbar";
    	
    	$username = Authsome::get('username');
    	$role = Authsome::get('role');
    	
    	if (($username=== 'NULL') || ($username== '')) {
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
    	
    	$loggedrole = $user['User']['role'];

    	$this->log($user);
    	$this->log("user login..." . $loggedrole);

// Need to revisit, not able redirecting properly.
/*    	if(isset($controller)) {
    		$this->log("found redirect..... " . $controller);
    		return  $this->redirect(array('controller' => $controller,'action' => $action));
    	}
    	else{
*/	  		if($loggedrole == "admin") {
				$this->log("inside..... admin condition");
    			return  $this->redirect(array('controller' => 'admin','action' => 'index'));
    		} else if ($loggedrole == "org") {
    			$this->log("inside..... org condition");
    			return  $this->redirect(array('controller' => 'org','action' => 'index'));
    		} else {
    			$this->log("inside..... else condition");
   				return  $this->redirect(array('controller' => 'search','action' => 'index'));
  			}
	//  	} 
    	
    }
    
    public function logout() {
    	$user = Authsome::logout();
    	return  $this->redirect(array('controller' => 'search','action' => 'logoutUser'));
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