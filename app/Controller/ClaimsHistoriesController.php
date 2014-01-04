<?php
App::uses('AppController', 'Controller');
/**
 * ClaimsHistories Controller
 *
 * @property ClaimsHistory $ClaimsHistory
 * @property PaginatorComponent $Paginator
 */
class ClaimsHistoriesController extends AppController {

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
		$this->ClaimsHistory->recursive = 0;
		$this->set('claimsHistories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClaimsHistory->exists($id)) {
			throw new NotFoundException(__('Invalid claims history'));
		}
		$options = array('conditions' => array('ClaimsHistory.' . $this->ClaimsHistory->primaryKey => $id));
		$this->set('claimsHistory', $this->ClaimsHistory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClaimsHistory->create();
			if ($this->ClaimsHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The claims history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The claims history could not be saved. Please, try again.'));
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
		if (!$this->ClaimsHistory->exists($id)) {
			throw new NotFoundException(__('Invalid claims history'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ClaimsHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The claims history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The claims history could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ClaimsHistory.' . $this->ClaimsHistory->primaryKey => $id));
			$this->request->data = $this->ClaimsHistory->find('first', $options);
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
		$this->ClaimsHistory->id = $id;
		if (!$this->ClaimsHistory->exists()) {
			throw new NotFoundException(__('Invalid claims history'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ClaimsHistory->delete()) {
			$this->Session->setFlash(__('The claims history has been deleted.'));
		} else {
			$this->Session->setFlash(__('The claims history could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
