<?php

class ClaimsController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');

	public function index() {
		$this->set('Claims', $this->Claim->find('all'));
	}
	
	public function view($id) {
		if (!$id) {
			throw new NotFoundException('Invalid claim');
		}
	
		$claim = $this->Claim->findById($id);
		if (!$claim) {
			throw new NotFoundException('Invalid claim');
		}
		$this->set('claim', $claim);
	}
	
	public function add() {
		if ($this->request->is('claim')) {
			$this->Claim->create();
			if ($this->Claim->save($this->request->data)) {
				$this->Session->setFlash('Your claim has been saved.');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('Unable to add your claim.');
		}
	}
}