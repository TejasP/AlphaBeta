<?php
App::uses('AppController', 'Controller');
/**
 * Policies Controller
 *
 * @property Policy $Policy
 * @property PaginatorComponent $Paginator
 */
class PoliciesController extends AppController {

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
		$this->Policy->recursive = 0;
		$this->set('policies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Policy->exists($id)) {
			throw new NotFoundException(__('Invalid policy'));
		}
		$options = array('conditions' => array('Policy.' . $this->Policy->primaryKey => $id));
		$this->set('policy', $this->Policy->find('first', $options));
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
		
		if ($this->request->is('post')) {
			$this->Policies->create();
			if ($this->Policies->save($this->request->data)) {
				$this->Session->setFlash(__('The policy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policy could not be saved. Please, try again.'));
			}
		}
		/* $policies = $this->Policies->Policy->find('list');
		$people = $this->Policies->Person->find('list');
		$tpas = $this->Policies->Tpa->find('list');
		$this->set(compact('policies', 'people', 'tpas'));  */
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
		
		/* if (!$this->Policies->exists($id)) {
			throw new NotFoundException(__('Invalid policy'));
		} */
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Policies->save($this->request->data)) {
				$this->Session->setFlash(__('The policy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policy could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Policy.' . $this->Policy->primaryKey => $id));
			$this->request->data = $this->Policy->find('first', $options);
		}
		/* $policies = $this->Policy->Policy->find('list');
		$people = $this->Policy->Person->find('list');
		$tpas = $this->Policy->Tpa->find('list');
		$this->set(compact('policies', 'people', 'tpas')); */
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Policies->id = $id;
		/* if (!$this->Policies->exists()) {
			throw new NotFoundException(__('Invalid policy'));
		} */
		$this->request->onlyAllow('post', 'delete');
		if ($this->Policies->delete()) {
			$this->Session->setFlash(__('The policy has been deleted.'));
		} else {
			$this->Session->setFlash(__('The policy could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
