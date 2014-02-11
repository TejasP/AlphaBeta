<?php


App::uses('AppNoAuthController', 'Controller');

class QuoteManagementAPIController extends AppNoAuthController {
	
	public $uses = array('Quotes');
	
	public function submitQuote(){
		$this->autoRender = false; // no view to render
		
	    $userID = $this->request->query['userID'];
	    $cartID = $this->request->query['cartID'];
	    $providerID = $this->request->query['providerID'];
	    
		$results= array ("userID"=>0 ,"cartID"=>0,"providerID"=>0);
		$data = array(
   			 'Quotes' => array(
       			 'cart_id' => $cartID,
       			 'provider_id' => $providerID,
   			 	 'user_id'=>$userID
    			)
		);
	    if($this->Quotes->save($data))
	    {
	    	$results = array ("userID"=>$userID ,"cartID"=>$cartID,"providerID"=>$providerID);
	    }
	    $this->response->type('json');
	    $json = json_encode($results);
	    $this->response->body($json);
		
	}
	
}