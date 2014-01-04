<?php
App::uses('AppController', 'Controller');
/**
 * Reimbursements Controller
 *
 * @property Reimbursement $Reimbursement
 * @property PaginatorComponent $Paginator
 */
class ReimbursementsController extends AppController {

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
		$this->Reimbursement->recursive = 0;
		$this->set('reimbursements', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Reimbursement->exists($id)) {
			throw new NotFoundException(__('Invalid reimbursement'));
		}
		$options = array('conditions' => array('Reimbursement.' . $this->Reimbursement->primaryKey => $id));
		$this->set('reimbursement', $this->Reimbursement->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reimbursement->create();
			if ($this->Reimbursement->save($this->request->data)) {
				$this->Session->setFlash(__('The reimbursement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reimbursement could not be saved. Please, try again.'));
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
		if (!$this->Reimbursement->exists($id)) {
			throw new NotFoundException(__('Invalid reimbursement'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Reimbursement->save($this->request->data)) {
				$this->Session->setFlash(__('The reimbursement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reimbursement could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reimbursement.' . $this->Reimbursement->primaryKey => $id));
			$this->request->data = $this->Reimbursement->find('first', $options);
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
		$this->Reimbursement->id = $id;
		if (!$this->Reimbursement->exists()) {
			throw new NotFoundException(__('Invalid reimbursement'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Reimbursement->delete()) {
			$this->Session->setFlash(__('The reimbursement has been deleted.'));
		} else {
			$this->Session->setFlash(__('The reimbursement could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
