<?php


App::uses('AppNoAuthController', 'Controller');

class QuoteManagementAPIController extends AppNoAuthController {
	
	public $uses = array('Quotes','Carts','Quotes_detail');
	
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
	    
	    $data_quotes_details = array(
	    		'Quotes_detail' => array(
	    				'quote_id' => 001,
	    				'product_id' => $providerID,
	    				'qty'=>10
	    		)
	    );
	    
	    if($this->Quotes_detail->save($data_quotes_details))
	    {
	    	$results_quotes_details = array ("quote_id"=>'bb' ,"product_id"=>$providerID,"qty"=>'10');
	    }

	    

/* 	    $log = $this->Quotes->getDataSource()->getLog(false, false);
	    debug($log); */
	    
	    $this->response->type('json');
	    $json = json_encode($results_quotes_details);
	    $this->response->body($json);
		
	}
	
	
	public function sendQuoteRequestEmail($sendTo){
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
		$this->Email->subject = 'Request for Quote';
		;
		
		if ($this->Email->send('Request for quote is submitted, we will get back to you shortly.')) {
			echo "done";
		} else {
			echo $this->Email->smtpError;
		}

		$error =  $this->Email->smtpError;
		$this->response->type('json');
		$json = json_encode($error);
		$this->response->body($json);
		
	}

	
}