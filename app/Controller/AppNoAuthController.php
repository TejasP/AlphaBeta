<?php
App::uses('Controller', 'Controller');


class AppNoAuthController extends Controller {
	public $components = array(
			'Session','Cookie','Authsome.Authsome' => array(
					'model' => 'User',
					'configureKey'=>null,
					'sessionKey'=>null,
					'cookieKey'=>null
			),'Email'
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
	
		$this->Cookie->name = 'eMedi_id';
		$this->Cookie->time = 3600;  // or '1 hour'
		$this->Cookie->path = '/';
		$this->Cookie->secure = false;  // i.e. only sent if using secure HTTPS
		$this->Cookie->key = 'qSI232qs*&!adre@34SAv!@*(XSL#$%)asGb$@11~_+!@#HKis~#^';
		$this->Cookie->httpOnly = true;
		
	}
	

}