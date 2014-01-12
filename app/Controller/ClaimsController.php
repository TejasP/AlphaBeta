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
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		parent::polulateLeftNav($user,$role);
		$this->layout = 'foundation_with_topbar';
		$this->Claim->recursive = 0;
		$this->set('claims', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
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

/**
 * add method
 *
 * @return void
 */
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

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
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

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
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
	}}
