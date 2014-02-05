<?php


App::uses('AppNoAuthController', 'Controller');

class QuoteManagementAPIController extends AppNoAuthController {
	
	public $uses = array('Quotes');
	
	public function getQuoteForOrderId($order=null){
		
	}
	
}