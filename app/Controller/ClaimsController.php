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
		if ($this->request->is('post')) {
			$this->Claim->create();
			if ($this->Claim->save($this->request->data)) {
				$this->Session->setFlash(__('The claim has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The claim could not be saved. Please, try again.'));
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
