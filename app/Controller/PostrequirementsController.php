<?php
App::uses('AppNoAuthController', 'Controller');

/**
 * Postrequirements Controller
 *
 * @property Postrequirement $Postrequirement
 * @property PaginatorComponent $Paginator
 */
class PostrequirementsController extends AppNoAuthController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Session','Cookie','Authsome.Authsome' => array(
					'model' => 'User',
					'configureKey'=>null,
					'sessionKey'=>null,
					'cookieKey'=>null
			));

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout ="foundation_with_topbar";
		
		$this->Postrequirement->recursive = 0;
		$this->set('postrequirements', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout ="foundation_without_topbar";
		
		if (!$this->Postrequirement->exists($id)) {
			throw new NotFoundException(__('Invalid postrequirement'));
		}
		$options = array('conditions' => array('Postrequirement.' . $this->Postrequirement->primaryKey => $id));
		$this->set('postrequirement', $this->Postrequirement->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout ="foundation_search_home";
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
		
		if (($user=== NULL) || ($user== '')) {
			$this->Session->setFlash(__("Please Login to Post requirement"));
			$this->Session->write('Redirect.Controller', 'PostRequirements');
			$this->Session->write('Redirect.Action', 'add');
			return $this->redirect(array('controller'=>'users','action' => 'login'));
		}
		
		if ($this->request->is('post')) {
			$this->Postrequirement->create();
			if ($this->Postrequirement->save($this->request->data)) {
				$this->Session->setFlash(__('The postrequirement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postrequirement could not be saved. Please, try again.'));
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
		$this->layout ="foundation_with_topbar";
		
		if (!$this->Postrequirement->exists($id)) {
			throw new NotFoundException(__('Invalid postrequirement'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Postrequirement->save($this->request->data)) {
				$this->Session->setFlash(__('The postrequirement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postrequirement could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Postrequirement.' . $this->Postrequirement->primaryKey => $id));
			$this->request->data = $this->Postrequirement->find('first', $options);
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
		$this->layout ="foundation_with_topbar";
		
		$this->Postrequirement->id = $id;
		if (!$this->Postrequirement->exists()) {
			throw new NotFoundException(__('Invalid postrequirement'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Postrequirement->delete()) {
			$this->Session->setFlash(__('The postrequirement has been deleted.'));
		} else {
			$this->Session->setFlash(__('The postrequirement could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
