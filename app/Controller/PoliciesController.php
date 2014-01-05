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
		if ($this->request->is('post')) {
			$this->Policy->create();
			if ($this->Policy->save($this->request->data)) {
				$this->Session->setFlash(__('The policy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policy could not be saved. Please, try again.'));
			}
		}
		$policies = $this->Policy->Policy->find('list');
		$people = $this->Policy->Person->find('list');
		$tpas = $this->Policy->Tpa->find('list');
		$this->set(compact('policies', 'people', 'tpas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Policy->exists($id)) {
			throw new NotFoundException(__('Invalid policy'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Policy->save($this->request->data)) {
				$this->Session->setFlash(__('The policy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policy could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Policy.' . $this->Policy->primaryKey => $id));
			$this->request->data = $this->Policy->find('first', $options);
		}
		$policies = $this->Policy->Policy->find('list');
		$people = $this->Policy->Person->find('list');
		$tpas = $this->Policy->Tpa->find('list');
		$this->set(compact('policies', 'people', 'tpas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Policy->id = $id;
		if (!$this->Policy->exists()) {
			throw new NotFoundException(__('Invalid policy'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Policy->delete()) {
			$this->Session->setFlash(__('The policy has been deleted.'));
		} else {
			$this->Session->setFlash(__('The policy could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
