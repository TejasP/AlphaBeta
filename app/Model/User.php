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
	 		'email' => array(
	 				'rule' => array('email'),
	 				'message' => 'Enter valid mail address'
	 		),
	 		
			'password' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'A password is required'
					),
					'valid' => array(
							'rule'    => array('minLength', 8),
							'message' => 'Minimum length of 8 characters'
					)
			),
			'role' => array(
					'valid' => array(
							'rule' => array('inList', array('admin', 'org','user')),
							'message' => 'Please enter a valid role',
							'allowEmpty' => false
					)
			),
	 		'phone' => array(
	 				'valid-1' => array(
		 				'rule'    => 'numeric',
		 				'message' => 'Only numbers allowed'
	 					),
	 				'valid-2' => array(
	 						'rule'    => array('minLength', 10),
	 						'message' => 'Please enter valid Phone number'
	 				)
	 				
	 		)				
	);
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
					$this->data[$this->alias]['password']
			);
		}
		return true;
	} 
	
	public function authsomeLogin($type, $credentials = array()) {
		switch ($type) {
			case 'guest':
				// You can return any non-null value here, if you don't
				// have a guest account, just return an empty array
				return array('it' => 'works');
			case 'credentials':
				$password = Authsome::hash($credentials['password']);
				
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