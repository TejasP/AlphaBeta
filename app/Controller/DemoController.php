<?php
App::uses('AppController', 'Controller');
App::import('Vendor','PHPExcel',array('file' => 'excel/PHPExcel.php'));
App::import('Vendor','PHPExcelWriter',array('file' => 'excel/PHPExcel/Writer/Excel5.php'));

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
*/
 

class DemoController extends AppController {
	var $uses = false;
	public $helpers = array('Html', 'Form', 'Session','Excel');
	
		
	
	public function index() {
		$this->layout = 'Demo';
	}

	
	public function Users() {
		$this->layout = 'Demo';
	}

	public function ClaimManager() {
		$this->layout = 'Demo';
	}	
}