<?php
class LoginToken extends AppModel{
	
	//public $hasMany = array('LoginToken');
	
	public function authsomePersist($user, $duration,$date) {
		$token = md5(uniqid(mt_rand(), true));
		$userId = $user;
	
		
		return "${token}:${userId}";
	}
}

