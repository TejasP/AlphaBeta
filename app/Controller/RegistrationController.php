<?php

App::uses('AppNoAuthController', 'Controller');

class RegistrationController extends AppNoAuthController {
	
	public $uses = array('User','login_token','Provider');
	
	public $helpers = array('Html', 'Form', 'Session');

	public function index() {
		$this->layout = "foundation_without_topbar";
	}
	
	public function validateAndRegister($email=null,$password=null,$confirmPassword=null,$phone=null){
		$this->autoRender=false;

		$response;
		
		if($email != null){
			$response = $this->validateEmail($email);
			if($response['status']==="FAIL"){
				return json_encode($response);
			}
		}
		else{
			return json_encode(array("status"=>"FAIL","message"=>"NULLEMAIL"));
		}
		
		if($password != null){
			$response = $this->validatePassword($password);
			if($response['status']==="FAIL"){
				return json_encode($response);
				}
		}
		else{
			return json_encode(array("status"=>"FAIL","message"=> "NULLPASSWORD"));
		}
		
		if($confirmPassword != null){
			$response = $this->validateConfirmPassword($confirmPassword);
			if($response['status']==="FAIL"){
				return json_encode($response);
				}
		}
		else{
			  return json_encode(array("status"=>"FAIL","message"=>"NULLCPASSWORD"));
		}
		// Phone number checking 
		if($phone != null){
			$response = $this->validatePhone($phone);
			if($response['status']==="FAIL"){
				return json_encode($response);
			}
		}
		else{
			 return json_encode(array("status"=>"FAIL","message"=>"NULLPHONE"));
		}
		
		$response =  $this->RegisterUser($email,$password,$phone);
	
		return json_encode($response);
	}
	
	
	public function validateAndRegisterPharmacy($email=null,$password=null,$confirmPassword=null,$phone=null,$providerid=null){
		$this->autoRender=false;
	
		$response;
	
		if($email != null){
			$response = $this->validateEmail($email);
			if($response['status']==="FAIL"){
				return json_encode($response);
			}
		}
		else{
			return json_encode(array("status"=>"FAIL","message"=>"NULLEMAIL"));
		}
	
		if($password != null){
			$response = $this->validatePassword($password);
			if($response['status']==="FAIL"){
				return json_encode($response);
			}
		}
		else{
			return json_encode(array("status"=>"FAIL","message"=> "NULLPASSWORD"));
		}
	
		if($confirmPassword != null){
			$response = $this->validateConfirmPassword($confirmPassword);
			if($response['status']==="FAIL"){
				return json_encode($response);
			}
		}
		else{
			return json_encode(array("status"=>"FAIL","message"=>"NULLCPASSWORD"));
		}
		// Phone number checking
		if($phone != null){
			$response = $this->validatePhone($phone);
			if($response['status']==="FAIL"){
				return json_encode($response);
			}
		}
		else{
			return json_encode(array("status"=>"FAIL","message"=>"NULLPHONE"));
		}
	
		$response =  $this->RegisterPharmacy($email,$password,$phone,$providerid);
	
		return json_encode($response);
	}
	
	private function validateEmail($email){
		return array("status"=>"PASS","message"=>"VALIDEMAIL");
	}
	
	private function validatePassword($pass){
		return array("status"=>"PASS","message"=>"VALIDPASS");
	}
	
	private function validateConfirmPassword($cPass){
		return array("status"=>"PASS","message"=>"VALIDCPASS");
	}
	
	private function validatePhone($phone){
		return array("status"=>"PASS","message"=>"VALIDPHONE");
	}
	
	private function RegisterUser($email,$password,$phone){
		$return= array("status"=>"FAIL","message"=>"USERADDFAIL");
		// Submit user if successful 

	    if ($this->request->is('post')) {
            $this->User->create();
            $date = date('Y-m-d H:i:s');
            $data = array(
            		'User' => array(
            				"username" => $email,
            				"password" => $password,
            				"email"=> $email,
            				"role"=>'user',
            				"created"=>	$date,
            				"modified"=> $date,
            				"phone"=>$phone,
            				"status"=>'Requested'
            		)
            );

            $this->User->set($data);
            if($this->User->validates()){
            	if ($this->User->save($data)) {
            		$this->addTokenAndSendEmail($email);
            		return 	$return = array("status"=>"PASS","message"=>"USERADDED");
            	}
            }
            else{
            	return array("status"=>"FAIL","message"=>$this->User->validationErrors);
            }
       } 
		
		return $return;
	}
	
	
	private function RegisterPharmacy($email,$password,$phone,$providerid){
		$return= array("status"=>"FAIL","message"=>"USERADDFAIL");
		// Submit user if successful
	
		if ($this->request->is('post')) {
			$this->User->create();
			$date = date('Y-m-d H:i:s');
			$data = array(
					'User' => array(
							"username" => $email,
							"password" => $password,
							"email"=> $email,
							"role"=>'org',
							"created"=>	$date,
							"modified"=> $date,
							"phone"=>$phone,
							"status"=>'Requested',
							"provider_id"=>$providerid
					)
			);
	
			$this->User->set($data);
			if($this->User->validates()){
				if ($this->User->save($data)) {
					$this->addTokenAndSendEmail($email);
					return 	$return = array("status"=>"PASS","message"=>"USERADDED");
				}
			}
			else{
				return array("status"=>"FAIL","message"=>$this->User->validationErrors);
			}
		}
	
		return $return;
	}
	
	public function addTokenAndSendEmail($email){
		$response = false;
		$this->autoRender = false; // no view to render
		
		//First Generate token
		$token = $this->generateToken();
		$date = date('Y-m-d H:i:s', strtotime('+1 hours'));
		$duration = '+1 hours';
		//generate Data array
		$token_data = array(
				'login_token' => array(
						'user_name' => $email,
						'token' => $token,
						'duration' => $duration,
						'expires' => $date
				)
		);
		
		//Add it to DB
		if($this->login_token->save($token_data)){
			// send mail
			$response = $this->sendWelcomEmail($email,$token);
		}
		
		return $response;
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
	private function generateToken(){
		$token = md5(uniqid(mt_rand(), true));
		return $token;
	}
	public function  resetPassword($userName){
		$this->autoRender = false; // no view to render
	
		//First generate token add to DB and send link
		$token = $this->generateToken();
		$date = date('Y-m-d H:i:s', strtotime('+1 hours'));
		$duration = '+1 hours';
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
		$this->autoRender = false; // no view to render
		
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
	
	
	private function sendWelcomEmail($sendTo,$token){
		$this->autoRender = false; // no view to render
		
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
		$this->Email->subject = 'Welcom  to eMediplus.';
		// TODO put ww setting from configuration.
		if ($this->Email->send('Welcom to eMediplus , Please click on the link below to confirm your e-mail.'.Router::url(array('controller'=>'Registration', 'action'=>'confirmEmail')).'/'.$token)) {
			$response = "done";
		} else {
			$response =  $this->Email->smtpError;
		}
	
		$error =  $this->Email->smtpError;
		return $response;
	}
	
	
	public function confirmEmail($token){
		$this->layout = "foundation_with_topbar";
		//first get the token and check if it is being used.
		
		$options = array('conditions' => array('login_token.token = ' => $token));
		
		$token_result = $this->login_token->find('all',$options);
		
		// if not used validate for time
		
		$date = date('Y-m-d H:i:s');
		
		$expires = $token_result[0]['login_token']['expires'];
		$used = $token_result[0]['login_token']['used'];
		echo 'date'.$date;
		echo 'expires'.$expires;
		if($used == 0){
			if(strtotime($date) < strtotime($expires)){
			// update the token table as token used and user table with active flag
				
			}else{
			// if time expired render view to send token again.
				echo 'token expired';
			}
		}else{
			// if used send response invalid
			$this->set('response',"Invalid token");
		}	
		$this->render('index');		
	}

	public function validateToken($tokenID){
		// get Token and check against the DB and ask user to update password.
	   
	}
	
	
	public function pharmacyAutoComplete(){
		$this->autoRender=false;
		
			if(empty($searchTerm)){
			{
				if(!empty($this->request->query['term'])){
					$searchTerm = $this->request->query['term'];
				}
			}
			if(empty($searchTerm)|| $searchTerm==null){
				$searchTerm = 'Something';
			}
				
				
			$options = array('conditions' => array(
					'Provider.provider_name LIKE' => '%'.$searchTerm.'%')
			);
				
			$results= $this->Provider->find('all',$options);
				
			
			$data = array ();
			$lenght = count($results);
			if ($lenght >5) {
				$lenght =5;
			}
			for($i=0 ; $i<$lenght;$i++)
			{
			$data [$i] = array("label"=>$results[$i]['Provider']['provider_name'],"providerID"=>$results[$i]['Provider']['id']);
			}
			$return =$data;
		}
		

		
		$this->response->type('json');
		$json = json_encode($return);
		$this->response->body($json);
		
	}
}