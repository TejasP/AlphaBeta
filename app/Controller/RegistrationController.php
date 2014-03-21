<?php

App::uses('AppNoAuthController', 'Controller');

class RegistrationController extends AppNoAuthController {
	
	public $uses = array('User','login_token');
	
	public $helpers = array('Html', 'Form', 'Session');

	public function index() {
		$this->layout = "foundation_without_topbar";
	}
	
	public function register() {
		$this->layout = "foundation_with_topbar";
		

		 
		$isBucketFilled =  $this->Cookie->read('basket-data');
		 
		$type= gettype($isBucketFilled);
		 
		if($type==='string'||$type==='NULL')
		{
			$this->set('isBucketFilled',"false");
		}else{
			$this->set('isBucketFilled',"true");
		}
		
		$this->set('isUserLoggedIn','false');
	}
	
	public function addOrganization() {
		$this->layout = "foundation_without_topbar";
		$this->set('isUserLoggedIn','false');
	}
	
	public function  resetRender(){
		$this->layout = 'foundation_with_topbar';
		$this->render('reset');
	}
	
	public function  resetPassword($userName){
		$this->autoRender = false; // no view to render
	
		//First generate token add to DB and send link
		$date = date('Y-m-d H:i:s', strtotime('+1 hours'));
		$duration = '+1 hours';
		$token = md5(uniqid(mt_rand(), true));
		 
		$token_data = array(
				'login_token' => array(
						'user_name' => $userName,
						'token' => $token,
						'duration' => $duration,
						'expires' => $date
				)
		);
		 $return ; 
		 
		if($this->login_token->save($token_data)){
			// send eMail.
			if($this->sendResetRequestEmail($userName,$token)==='done'){
				$return = "Successful";
			}
			else{
				// there was error sending Mail.
				$return = "Fail";
			}
		}

		$this->response->type('json');
		$json = json_encode($return);
		$this->response->body($json);
		 
	}
	
	private function sendResetRequestEmail($sendTo,$token){

		$this->Email->smtpOptions = array(
				'port'=>'587',
				'timeout'=>'30',
				'host' => 'mail.emediplus.com',
				'username'=>'support@emediplus.com',
				'password'=>'eMedi123',
		);
		$this->Email->delivery = 'smtp';
	
		$this->Email->from    = 'eMediplus Support<support@emediplus.com>';
		$this->Email->to      = $sendTo;
		$this->Email->subject = 'Request for Reset Password.';
		// TODO put ww setting from configuration.
		if ($this->Email->send('Request for reset is submitted, Please click on the link'.Router::url(array('controller'=>'Registration', 'action'=>'validateToken')).'/'.$token)) {
			$response = "done";
		} else {
			$response =  $this->Email->smtpError;
		}
	
		$error =  $this->Email->smtpError;
		return $response;
	
	}
	

	public function validateToken($tokenID){
		// get Token and check against the DB and ask user to update password.
	   
	}
}