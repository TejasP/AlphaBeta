<?php
App::uses('AppController', 'Controller');
/**
 * PreAuths Controller
 *
 * @property PreAuth $PreAuth
 * @property PaginatorComponent $Paginator
 */
class PreAuthsController extends AppController {

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
		$this->PreAuth->recursive = 0;
		$this->set('preAuths', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PreAuth->exists($id)) {
			throw new NotFoundException(__('Invalid pre auth'));
		}
		$options = array('conditions' => array('PreAuth.' . $this->PreAuth->primaryKey => $id));
		$this->set('preAuth', $this->PreAuth->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PreAuth->create();
			if ($this->PreAuth->save($this->request->data)) {
				$this->Session->setFlash(__('The pre auth has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pre auth could not be saved. Please, try again.'));
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
		if (!$this->PreAuth->exists($id)) {
			throw new NotFoundException(__('Invalid pre auth'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PreAuth->save($this->request->data)) {
				$this->Session->setFlash(__('The pre auth has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pre auth could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PreAuth.' . $this->PreAuth->primaryKey => $id));
			$this->request->data = $this->PreAuth->find('first', $options);
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
		$this->PreAuth->id = $id;
		if (!$this->PreAuth->exists()) {
			throw new NotFoundException(__('Invalid pre auth'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PreAuth->delete()) {
			$this->Session->setFlash(__('The pre auth has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pre auth could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
