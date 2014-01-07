<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	 public $validate = array(
			'username' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'A username is required'
					)
			),
	 		'email' => array(
	 				'required' => array(
	 						'rule' => array('notEmpty'),
	 						'message' => 'A email is required'
	 				)
	 		),
			'password' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'A password is required'
					)
			),
			'role' => array(
					'valid' => array(
							'rule' => array('inList', array('admin', 'author')),
							'message' => 'Please enter a valid role',
							'allowEmpty' => false
					)
			)
	);
	
	/*public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
					$this->data[$this->alias]['password']
			);
		}
		return true;
	} */
	
	public function authsomeLogin($type, $credentials = array()) {
		switch ($type) {
			case 'guest':
				// You can return any non-null value here, if you don't
				// have a guest account, just return an empty array
				return array('it' => 'works');
			case 'credentials':
				//$password = Authsome::hash($credentials['password']);
				$password = $credentials['password'];
				
				// This is the logic for validating the login
				$conditions = array(
						'User.email' => $credentials['email'],
						'User.password' => $password,
				);
				break;
			default:
				return null;
		}
	
		return $this->find('first', compact('conditions'));
	}
		
}