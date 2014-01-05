<?php
App::uses('AppController', 'Controller');
/**
 * InsuranceHistories Controller
 *
 * @property InsuranceHistory $InsuranceHistory
 * @property PaginatorComponent $Paginator
 */
class InsuranceHistoriesController extends AppController {

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
		$this->InsuranceHistory->recursive = 0;
		$this->set('insuranceHistories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InsuranceHistory->exists($id)) {
			throw new NotFoundException(__('Invalid insurance history'));
		}
		$options = array('conditions' => array('InsuranceHistory.' . $this->InsuranceHistory->primaryKey => $id));
		$this->set('insuranceHistory', $this->InsuranceHistory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InsuranceHistory->create();
			if ($this->InsuranceHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The insurance history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The insurance history could not be saved. Please, try again.'));
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
		if (!$this->InsuranceHistory->exists($id)) {
			throw new NotFoundException(__('Invalid insurance history'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->InsuranceHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The insurance history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The insurance history could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InsuranceHistory.' . $this->InsuranceHistory->primaryKey => $id));
			$this->request->data = $this->InsuranceHistory->find('first', $options);
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
		$this->InsuranceHistory->id = $id;
		if (!$this->InsuranceHistory->exists()) {
			throw new NotFoundException(__('Invalid insurance history'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->InsuranceHistory->delete()) {
			$this->Session->setFlash(__('The insurance history has been deleted.'));
		} else {
			$this->Session->setFlash(__('The insurance history could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
