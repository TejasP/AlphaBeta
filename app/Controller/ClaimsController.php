<?php
App::uses('AppController', 'Controller');
/**
 * Claims Controller
 *
 * @property Claim $Claim
 * @property PaginatorComponent $Paginator
 */
class ClaimsController extends AppController {

	
	/**
	 * use beforeRender to send session parameters to the layout view
	 */
	public function beforeRender() {
		parent::beforeRender();
		$params = $this->Session->read('form.params');
		$this->set('params', $params);
	}
	
	/**
	 * delete session values when going back to index
	 * you may want to keep the session alive instead
	 */
	public function c_index() {
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		parent::polulateLeftNav($user,$role);
		$this->layout = 'foundation_with_topbar';
		
		$this->Session->delete('form');
	}
	
	/**
	 * this method is executed before starting the form and retrieves one important parameter:
	 * the form steps number
	 * you can hardcode it, but in this example we are getting it by counting the number of files that start with c_step
	 */
	public function c_setup() {
		App::uses('Folder', 'Utility');
		$claimsViewFolder = new Folder(APP.'View'.DS.'Claims');
		$steps = count($claimsViewFolder->find('c_step.*\.ctp'));
		$this->Session->write('form.params.steps', $steps);
		$this->Session->write('form.params.maxProgress', 0);
		$this->redirect(array('action' => 'c_step', 1));
	}
	
	/**
	 * this is the core step handling method
	 * it gets passed the desired step number, performs some checks to prevent smart users skipping steps
	 * checks fields validation, and when succeding, it saves the array in a session, merging with previous results
	 * if we are at last step, data is saved
	 * when no form data is submitted (not a POST request) it sets this->request->data to the values stored in session
	 */
	public function c_step($stepNumber) {
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		parent::polulateLeftNav($user,$role);
		$this->layout = 'foundation_with_topbar';
		
		$this->loadModel('Policy'); //if it's not already loaded
		$options = $this->Policy->find('list', array('conditions' => array('Policy.person_id' => 2), 'fields'=>array('policy_id', 'policy_desc'))); //or whatever conditions you want
		$this->set('policylist',$options);
		
		/**
		 * check if a view file for this step exists, otherwise redirect to index
		 */
		if (!file_exists(APP.'View'.DS.'Claims'.DS.'c_step'.$stepNumber.'.ctp')) {
			$this->redirect('/claims/c_index');
		}
	
		/**
		 * determines the max allowed step (the last completed + 1)
		 * if choosen step is not allowed (URL manually changed) the user gets redirected
		 * otherwise we store the current step value in the session
		 */
		$maxAllowed = $this->Session->read('form.params.maxProgress') + 1;
		if ($stepNumber > $maxAllowed) {
			$this->redirect('/claims/c_step/'.$maxAllowed);
		} else {
			$this->Session->write('form.params.currentStep', $stepNumber);
		}
	
		/**
		 * check if some data has been submitted via POST
		 * if not, sets the current data to the session data, to automatically populate previously saved fields
		 */
		if ($this->request->is('post')) {
	
			/**
			 * set passed data to the model, so we can validate against it without saving
			 */
			$this->Claim->set($this->request->data);
	
			/**
			 * if data validates we merge previous session data with submitted data, using CakePHP powerful Hash class (previously called Set)
			*/
			if ($this->Claim->validates()) {
				$prevSessionData = $this->Session->read('form.data');
				$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
	
				/**
				 * if this is not the last step we replace session data with the new merged array
				 * update the max progress value and redirect to the next step
				*/
				if ($stepNumber < $this->Session->read('form.params.steps')) {
					$this->Session->write('form.data', $currentSessionData);
					$this->Session->write('form.params.maxProgress', $stepNumber);
					$this->redirect(array('action' => 'c_step', $stepNumber+1));
				} else {
					/**
					 * otherwise, this is the final step, so we have to save the data to the database
					 */
					$this->Claim->saveAll($currentSessionData);
					$this->Session->setFlash('The claim has been saved.');
					$this->redirect('/claims/c_index');
				}
			}
		} else {
			$this->request->data = $this->Session->read('form.data');
		}
	
		/**
		 * here we load the proper view file, depending on the stepNumber variable passed via GET
		 */
		$this->render('c_step'.$stepNumber);
	}

	public function add() {
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		parent::polulateLeftNav($user,$role);
		$this->layout = 'foundation_with_topbar';
		
		$this->loadModel('Policy'); //if it's not already loaded
		$options = $this->Policy->find('list', array('conditions' => array('Policy.person_id' => 2), 'fields'=>array('policy_id', 'policy_desc'))); //or whatever conditions you want
		//debug($options);
		$this->set('policylist',$options);

		if ($this->request->is('post')) {
			$this->Claim->create();
		
			if (!$this->Policy->exists($this->request->data('Claim.policy_id'))) {
				$this->Session->setFlash(__('Policy ID entered is not valid'));
			}
			else
			{
				if ($this->Claim->saveAll($this->request->data)) {
					$this->Session->setFlash(__('The claim has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
				//show validationErrors
					debug($this->request->data);
					$this->Session->setFlash(__('The claim could not be saved. Please, try again.......*****'));
				}
			}
		}
	}
}

/**
 * Components
 *
 * @var array
 */
//	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
/*	public function index() {
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		parent::polulateLeftNav($user,$role);
		$this->layout = 'foundation_with_topbar';
		$this->Claim->recursive = 0;
		$this->set('claims', $this->Paginator->paginate());
	}
*/
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function view($id = null) {
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		parent::polulateLeftNav($user,$role);
		$this->layout = 'foundation_with_topbar';
		if (!$this->Claim->exists($id)) {
			throw new NotFoundException(__('Invalid claim'));
		}
		$options = array('conditions' => array('Claim.' . $this->Claim->primaryKey => $id));
		$this->set('claim', $this->Claim->find('first', $options));
	}
*/
/**
 * add method
 *
 * @return void
 */
/*	public function add() {
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		parent::polulateLeftNav($user,$role);
		$this->layout = 'foundation_with_topbar';
		
		$this->loadModel('Policy'); //if it's not already loaded
		$options = $this->Policy->find('list', array('conditions' => array('Policy.person_id' => 2), 'fields'=>array('policy_id', 'policy_desc'))); //or whatever conditions you want
		//debug($options);
		$this->set('policylist',$options);
		
		if ($this->request->is('post')) {
			$this->Claim->create();

			// Validate if the Policy id is present in policy table
//			$this->loadModel('Policy');
//			debug($this->request->data('Claim.policy_id'));
			
//			debug($this->Policy->exists($this->request->data('Claim.policy_id')));
			
			if (!$this->Policy->exists($this->request->data('Claim.policy_id'))) {
				$this->Session->setFlash(__('Policy ID entered is not valid'));
			}
			else
			{
				//if ($this->Claim->save($this->request->data)) {
				if ($this->Claim->saveAll($this->request->data)) {
					$this->Session->setFlash(__('The claim has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					//show validationErrors
					debug($this->request->data);	
					//show last sql query
					//debug($this->Model->getDataSource()->getLog(false, false));
				
					$this->Session->setFlash(__('The claim could not be saved. Please, try again.......*****'));
				}
			}
		}
	}
*/
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function edit($id = null) {
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		parent::polulateLeftNav($user,$role);
		$this->layout = 'foundation_with_topbar';
		if (!$this->Claim->exists($id)) {
			throw new NotFoundException(__('Invalid claim'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Claim->save($this->request->data)) {
				$this->Session->setFlash(__('The claim has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The claim could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Claim.' . $this->Claim->primaryKey => $id));
			$this->request->data = $this->Claim->find('first', $options);
		}
	}
*/
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function delete($id = null) {
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		parent::polulateLeftNav($user,$role);
		$this->layout = 'foundation_with_topbar';
		$this->Claim->id = $id;
		if (!$this->Claim->exists()) {
			throw new NotFoundException(__('Invalid claim'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Claim->delete()) {
			$this->Session->setFlash(__('The claim has been deleted.'));
		} else {
			$this->Session->setFlash(__('The claim could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
*/
