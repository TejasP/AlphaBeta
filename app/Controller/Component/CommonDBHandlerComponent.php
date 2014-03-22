<?php

App::uses('AppNoAuthController', 'Controller');

class CommonDBHandlerComponent extends Object {
	public $uses = array('users');
	
	public function getDescription($type, $name, $value)
	{
		$retVal = "";
		if($type == "users")
		{
			$doptions = array('conditions' => array(
					'users.user_id' => $value)
			);
			
			$userdata = $this->users->find('all',$doptions);
			$ulength = count($userdata);
			for($j=0; $j<$ulength; $j++)
			{
				$retVal = $userdata[$j]['users'][$name];
			}
		}
		
		return $retVal;
	}
}