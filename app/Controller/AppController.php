<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
		public $components = array(
			'Session','Cookie','Authsome.Authsome' => array(
					'model' => 'User',
					'configureKey'=>null,
					'sessionKey'=>null,
					'cookieKey'=>null
			),'Email'
	);
	

	
	public function beforeFilter() {
		$user = Authsome::get('username');
		$role = Authsome::get('role');
			if(empty($user)){
				if($this->action!='login'){
				//$this->redirect('/users/');
				$this->redirect(array('controller' => 'users','action' => 'login'));
				}
			}
		$this->set('dashboard','/alphabeta/dashboard');
	}
	
	public function polulateLeftNav($username,$role){
		$data = file_get_contents('../Config/leftNav/left_nav.json');
		$json = json_decode($data, true);
		$rolejson;
		foreach ($json as $key => $value)
		{
			if($role== $key)
			{	
			if (gettype($value) == "array") {
				$this->set('json',$value);
				break;
				}
			}
		}
		
		//$this->set('json',$rolejson);

		$this->set('role',$role);
		$this->set('username',$username);
	}


}
