<?php


App::uses('AppNoAuthController', 'Controller');

class QuoteManagementAPIController extends AppNoAuthController {
	
	public $uses = array('Quotes','Carts','Quotes_detail');
	
	public function  submitCart(){
		$this->autoRender = false; // no view to render		

		$productid = $this->request->query['productid'];
		$producttype = $this->request->query['producttype'];
		$qty = $this->request->query['qty'];
		
		$chosenId =$this->Cookie->read('basket-data');
		$length =  count($chosenId);
		$mresults = array();
		
		for($i=0;$i<$length;$i++){
			
		}
		
		$user_id = $role = Authsome::get('id');
		
		// if default qty is null then set it to 1
		if($qty ==null)
			{
			$qty = 1;
			}
		if($user_id != null){
			$data = array(
					'Carts' => array(
							'productid' => $productid,
							'producttype' => $producttype,
							'qty'=>$qty,
							'user_id'=>$user_id
					)
			);
			$results = array("No DATA");
			if($this->Carts->save($data))
			{
				$results = array ("CARTSAVED");
			}
		}
		else{
			$results = "NOTAUTHENTICATED";
		}
			
		$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
	}
	
	public function submitQuote(){
		$this->autoRender = false; // no view to render
		
		$userID  = Authsome::get('id');;
	    $cartID = $this->request->query['cartID'];
	    $providerID = $this->request->query['providerID'];
	    $date = date('Y-m-d H:i:s');
	    $results;
	    if($userID != null){
	    		$results= array ("user_ID"=>$userID ,"cart_ID"=>$cartID,"provider_ID"=>$providerID);
				$data = array(
		   			 'Quotes' => array(
		       			 'cart_id' => $cartID,
		       			 'provider_id' => $providerID,
		   			 	 'user_id'=>$userID,
		   			 	 'submitted'=>$date
		    			)
				);
			    if($this->Quotes->save($data))
			    {
			    	$results = array ("userID"=>$userID ,"cartID"=>$cartID,"providerID"=>$providerID);
			    }
	    }
	    else{
	    	$results = "NOTAUTHENTICATED";
	    }

/* 	    $log = $this->Quotes->getDataSource()->getLog(false, false);
	    debug($log); */
	    
	    $this->response->type('json');
	    $json = json_encode($results);
	    $this->response->body($json);
		
	}
	
	public function showQuoteByProvider(){
		
	}
	public function submitQuoteByProvider(){
		
		/* $data_quotes_details = array(
		 'Quotes_detail' => array(
		 		'quote_id' => 001,
		 		'product_id' => $providerID,
		 		'qty'=>10
		 )
		);
		 
		if($this->Quotes_detail->save($data_quotes_details))
		{
		$results_quotes_details = array ("quote_id"=>'bb' ,"product_id"=>$providerID,"qty"=>'10');
		} */
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

	public function retrieveLastQuotes($userID=null){
		$this->autoRender = false; // no view to render
		
		if($userID==null){
			$userID = Authsome::get('id');
		}
		$results;
		if($userID != null){
			
			$moptions = array('limit' => 5,'conditions' => array(
					'quotes.user_id = ' => $userID),'order'=>'quotes.submitted DESC'
			);
			
			$results = $this->Quotes->find('all',$moptions);
		}
		else{
			$results = "NOUSERID";
		}
		
		/* 	    $log = $this->Quotes->getDataSource()->getLog(false, false);
		 debug($log); */
		 
		$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
		
		
	}
}