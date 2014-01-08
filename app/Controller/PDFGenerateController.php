<?php

App::uses('AppController', 'Controller');

class PDFGenerateController extends AppController {
	var $uses = false;
	public $helpers = array('Html', 'Form', 'Session');
	
	function index()
	{
		$this->layout = 'pdf';
		$this->render();
	}
	
}