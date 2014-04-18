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
	    		$results= array ("NOTDONE");
				$data = array(
		   			 'Quotes' => array(
   		   			 	 'status'=>'N',
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
		
		$myQuotes = null;
		$quotes_data;
		if($userID != null)
		{
			$this->log('$userID.....' . $userID);
			
			$this->Common = $this->Components->load('Common');
			
			$moptions = array('fields'=> array('quotes.id', 'quotes.cart_id', 'quotes.status','quotes.user_id', 'quotes.provider_id', 'quotes.submitted'),'limit' => 5,'conditions' => array(
					'quotes.user_id = ' => $userID),'order'=>'quotes.submitted DESC'
			);
			
			$quotes_data = $this->Quotes->find('all',$moptions);
			
			$qlength = count($quotes_data);
			for($j=0; $j<$qlength; $j++)
			{
				$cart_id = $quotes_data[$j]['Quotes']['cart_id'];
				$quote_id = $quotes_data[$j]['Quotes']['id'];
				$quote_status = $quotes_data[$j]['Quotes']['status'];
				$user_id = $quotes_data[$j]['Quotes']['user_id'];
				$submitted = $quotes_data[$j]['Quotes']['submitted'];
				$provider_id = $quotes_data[$j]['Quotes']['provider_id'];
			
				// calling component for getting quote status description..
				$quote_statusdesc = $this->Common->getQuoteStatusDesc($quote_status);
										
				$myQuotes[$j] = array("quote_id"=> $quote_id, "quote_status"=> $quote_status, "quote_statusdesc"=>$quote_statusdesc, "provider_id"=> $provider_id, "cart_id"=> $cart_id, "user_id"=> $user_id, "submitted"=>$submitted);
			}
		}
		else{
			$myQuotes = "NOUSERID";
		}
		
		/* 	    $log = $this->Quotes->getDataSource()->getLog(false, false);
		 debug($log); */
		 
		$this->response->type('json');
		$json = json_encode($myQuotes);
		$this->response->body($json);
	}
	
	public function  submitCartFromCookieJSON(){
		$this->autoRender = false; // no view to render
		
		$cartID = $this->submitCartFromCookie();
		$this->response->type('json');
		$json = json_encode($cartID);
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
				if(isset($keyOut['qty'])){
					$qty =$keyOut['qty'];
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
	
		return ($cartID);
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
	

	
	public function submitQuoteBasedOnCookieJSON($cartID){
		$this->autoRender = false; // no view to render
		
		$result = submitQuoteBasedOnCookie($cartID);
		
		$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
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
								'status'=>'N',
								'cart_id' => $cartID,
								'provider_id' => $providerID,
								'user_id'=>$userID,
								'submitted'=>$date
						)
				);
				$this->Quotes->create();
				if($this->Quotes->save($data))
				{
					$results = "SUCCESS";
				}
			}
			else{
				$results = "NOTAUTHENTICATED";
			}
		}
		return ($results);
	}
	
	public function callCartAndQuoteSubmit(){
		$response='';
		$cartID_return = $this->submitCartFromCookie();
		 if($cartID_return!=null){
			$response = $this->submitQuoteBasedOnCookie($cartID_return);
		}else{
			$response = "NOSUCCESS"; 
		}
		$this->response->type('json');
		$json = json_encode($response);
		$this->response->body($json);
	}
	
	public function getPreferredProvider() {
	
	}
	
	public function acceptOrder($quoteid){
		$this->autoRender = false;
	
		$userID  = Authsome::get('id');
	
		$productData = $this->request->query['product'];
		//$productData =json_decode($productData,true);

/*		echo 'totalproducts...' . count($productData);
		for($i=0; $i<count($productData); $i++)
		{
			echo 'prodprice..' . $productData[$i]["prodprice"] . ' prodid..' . $productData[$i]["prodid"] ;
		}
*/
		if($userID != null)
		{
			// Update quotes table with status = "A"
			$qoptions = array('conditions' => array(
					'id' => $quoteid)
			);
			$quotedata = $this->Quotes->find('all', $qoptions);
			
			$data = array(
					'Quotes' => array(
							'status' => 'A'
					)
			);
			$this->Quotes->id = $quotedata[0]["Quotes"]["id"];
			$this->Quotes->save($data);
	
			// Insert into quotes_details table
			// Update quotes table with status = "A"
			$cartid = $quotedata[0]["Quotes"]["cart_id"];
			$coptions = array('conditions' => array(
					'cart_id' => $cartid)
			);
			$cart_detail = $this->Cart_detail->find('all',$coptions);
			$clength = count($cart_detail);
			for($y=0; $y<$clength; $y++)
			{
				$product_id = $cart_detail[$y]['Cart_detail']['productid'];
				$product_type = $cart_detail[$y]['Cart_detail']['producttype'];
				$qty = $cart_detail[$y]['Cart_detail']['qty'];
	
				$data = array(
						'Quotes_detail' => array(
								'quote_id' => $quoteid,
								'product_type' => $product_type,
								'product_id' => $product_id,
								'qty'=>$qty,
								'price'=>$productData[$y]["prodprice"]  // getting this value from json request.
						)
				);
	
				$this->Quotes_detail->create();
				if($this->Quotes_detail->save($data,array('validate'=>false, 'callbacks'=>false)))
				{
					$results []= "ID:".$this->Quotes_detail->id;
				}
			}
		}
		else{
			if($user_id == null){
				$results = "NOTAUTHENTICATED";
			}
		}
	
		$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
	}
	
	public function confirmOrder($quoteid){
		$this->autoRender = false;
	
		$userID  = Authsome::get('id');
	
		if($userID != null)
		{
			// Update quotes table with status = "C"
			$qoptions = array('conditions' => array(
					'id' => $quoteid)
			);
			$quotedata = $this->Quotes->find('all', $qoptions);
				
			$data = array(
					'Quotes' => array(
							'status' => 'C'
					)
			);
			$this->Quotes->id = $quotedata[0]["Quotes"]["id"];
			$this->Quotes->save($data);
			
			$results = "success";
		}
		else{
			if($user_id == null){
				$results = "NOTAUTHENTICATED";
			}
		}
	
		$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
	}
}