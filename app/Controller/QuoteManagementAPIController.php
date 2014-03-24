<?php


App::uses('AppNoAuthController', 'Controller');

class QuoteManagementAPIController extends AppNoAuthController {
	
	public $uses = array('Quotes','Carts','Quotes_detail','Cart_detail','locations');
	
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
	
	public function  submitCartFromCookie(){
		$this->autoRender = false; // no view to render
		
		
		$user_id = Authsome::get('id');
		$cookieData =$this->Cookie->read('basket-data');
		$locationData =$this->Cookie->read('location-data');
		
		$locationID = $locationData['locationID'];
		
		$date = date('Y-m-d H:i:s');
		$qty;
		
		if ($cookieData != null && $locationData != null && $user_id != null){
			$data = array(
					'Carts' => array(
							'user_id'=>$user_id,
							'location_id'=>$locationID,
							'submitted'=>$date
					)
			);
		

			$cartID;
			
			// First save it to Cart Table.
			$this->Carts->create();
			if($this->Carts->save($data,array('validate'=>false, 'callbacks'=>false)))
			{
				$cartID = $this->Carts->id;
			}
			
			// Now save it to Cart Details table. 
			// if default qty is null then set it to 1
			if(!isset($qty))
			{
				$qty = 1;
			}
			$results = array();
			
			foreach($cookieData as $keyOut){
				$productid = $keyOut['item'];
				$producttype = $keyOut['category'];
				if(isset($keyIn['qty'])){
					$qty =$keyIn['qty'];
				}

				$data = array(
						'Cart_detail' => array(
								'productid' => $productid,
								'producttype' => $producttype,
								'qty'=>$qty,
								'cart_id'=>$cartID
						)
				);
				
				$this->Cart_detail->create();
				if($this->Cart_detail->save($data,array('validate'=>false, 'callbacks'=>false)))
				{
					$results []= "ID:".$this->Cart_detail->id;
				}	
		  	}	
		}
		else{
			if($user_id == null){
				$results = "NOTAUTHENTICATED";
			}
			else if($cookieData == null){
				$results = "NOCARTDATA";
			}
			else if($locationData == null){
				$results = "NOLOCATIONDATA";
			}
		}
			
		$this->response->type('json');
		$json = json_encode($cartID);
		$this->response->body($json);
	}
	
	public function  checkCookie(){
		$this->autoRender = false; // no view to render
		
		$user_id = Authsome::get('id');
		
		echo "user_id".$user_id;
		
		$cookieData =$this->Cookie->read('basket-data');
		
		var_dump($cookieData);
		
		$locationData =$this->Cookie->read('location-data');
		
		var_dump($locationData);
		
	}
	
	public function getPreferredProvider() {
		
	}
	
	public function submitQuoteBasedOnCookie($cartID){
		$this->autoRender = false; // no view to render
	
		$userID  = Authsome::get('id');
		
		$locationData =$this->Cookie->read('location-data');
		
		$locationID= $locationData['locationID'];

		// First get Location Details based on locationID
		$moptions = array('fields' => array('locations.locationid','locations.tags','locations.city','locations.bounds_southwest_lat','locations.bounds_southwest_lng','locations.bounds_northeast_lat','locations.bounds_northeast_lng','locations.location_lat','locations.location_lng'),'conditions' => array('locations.locationid ='=>$locationID));
		$locationResult = $this->locations->find('all',$moptions);
		
		$locationLat = ($locationResult[0]['locations']['location_lat']);
		$locationLng = ($locationResult[0]['locations']['location_lng']);
		$locationCity= ($locationResult[0]['locations']['city']);
		
		// get Provider based on location.

		$providerIDJSON  =  $this->requestAction(array('controller' => 'LocationAPI', 'action' => 'getNearestProviders'),array($locationLat,$locationLng,2,$locationCity));
		$providerIDArray = json_decode($providerIDJSON);
		$count=  count($providerIDArray);
		$limit;
		if($count>5){
			$limit = 5;
		}
		for($i = 0;$i<$limit;$i++){
			$providerID = ($providerIDArray[$i][0]);
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
				$this->Quotes->create();
				if($this->Quotes->save($data))
				{
					$results = array ("userID"=>$userID ,"cartID"=>$cartID,"providerID"=>$providerID);
				}
			}
			else{
				$results = "NOTAUTHENTICATED";
			}
		} 
		$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
	}
}