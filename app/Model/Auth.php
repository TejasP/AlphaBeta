<?php

App::uses('Model', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Auth extends AppModel {
	public $validate = array(
			'username' => array(
					'required' => array(
							'rule' => 'notEmpty',
							'message' => 'A username is required'
					)
			),
			'password' => array(
					'required' => array(
							'rule' => 'notEmpty',
							'message' => 'A password is required'
					)
			)
	);
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}
	

	
}