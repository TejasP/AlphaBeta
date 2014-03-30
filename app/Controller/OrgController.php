<?php

App::uses('AppNoAuthController', 'Controller');

class OrgController extends AppNoAuthController {
	public $uses = array('quotes','quotes_details','carts', 'cart_detail', 'notifications', 'users');

	public function index (){
		$user = Authsome::get('username');
		$role = Authsome::get('role');
	
		$this->log('org index.....' . $role);
	
		if (($user=== 'NULL') || ($user== '')) {
			$this->set('isUserLoggedIn',"false");
		}else
		{
			$this->set('isUserLoggedIn',"true");
			$user = Authsome::get('username');
			$role = Authsome::get('role');	
		}
	
		$this->layout = "foundation_org_home";
	}

	public function recentQuotes (){
		$this->layout = "foundation_org_home";

		$provider_id = 1;
		$this->Common = $this->Components->load('Common');
		
		$qoptions = array('conditions' => array(
			'quotes.provider_id' => $provider_id),
			'limit' => 10
			);

		$quotes_data = $this->quotes->find('all',$qoptions);
		$qlength = count($quotes_data);
		for($j=0; $j<$qlength; $j++)
		{
			$cart_id = $quotes_data[$j]['quotes']['cart_id'];
			$quote_id = $quotes_data[$j]['quotes']['id'];
			$user_id = $quotes_data[$j]['quotes']['user_id'];
			$submitted = $quotes_data[$j]['quotes']['submitted'];

			// calling component for getting user name..
			$user_name = $this->Common->getDescription("users", "username", $user_id);

			$myQuotes[$j] = array("quote_id"=> $quote_id, "provider_id"=> $provider_id, "cart_id"=> $cart_id, "user_id"=> $user_id, "user_name"=> $user_name, "submitted"=>$submitted);
		}

		$this->autoRender = false;
		return json_encode($myQuotes);
	}

	public function quoteDetail (){
		// $this->layout = "foundation_org_home";
		$this->autoRender = false;

		$this->Common = $this->Components->load('Common');
		
		$query_quoteid = $this->request->query['quoteid'];

		$qoptions = array('conditions' => array('quotes.id' => $query_quoteid));

		$quotes_data = $this->quotes->find('all',$qoptions);
		$qlength = count($quotes_data);
		
		for($j=0; $j<$qlength; $j++)
		{
			$cart_id = $quotes_data[$j]['quotes']['cart_id'];
			$quote_id = $quotes_data[$j]['quotes']['id'];
			$user_id = $quotes_data[$j]['quotes']['user_id'];
			$submitted = $quotes_data[$j]['quotes']['submitted'];
			$provider_id = $quotes_data[$j]['quotes']['provider_id'];
	
			// calling component for getting user name..
			$user_name = $this->Common->getDescription("users", "username", $user_id);
				
			// quote detail
			$coptions = array('conditions' => array(
				'cart_id' => $cart_id)
				);
	
			$cart_detail = $this->cart_detail->find('all',$coptions);
			$clength = count($cart_detail);
			for($y=0; $y<$clength; $y++)
			{
				$product_id = $cart_detail[$y]['cart_detail']['productid'];
				$product_type = $cart_detail[$y]['cart_detail']['producttype'];
				$qty = $cart_detail[$y]['cart_detail']['qty'];
				
				if($product_type == "1")
					$productdetails = $this->Common->getProductDetails("medicine", $product_id);
				else
					$productdetails = $this->Common->getProductDetails("nonmedicine", $product_id);
			
				$products[$y] = array("prod_id"=> $product_id, "prod_name"=> $productdetails['desc'], "qty"=> $qty, "price"=> $productdetails['price']);
			}
	
			// notifications
			$coptions = array('conditions' => array(
				'quote_id' => $quote_id)
				);
			
			$notifications = $this->notifications->find('all',$coptions);
			$nlength = count($notifications);
			for($z=0; $z<$nlength; $z++)
			{
				$notification_id = $notifications[$z]['notifications']['id'];
				$initiated_by = $notifications[$z]['notifications']['initiated_by'];
				$initiated_time = $notifications[$z]['notifications']['initiated_time'];
				$notification_for = $notifications[$z]['notifications']['notification_for'];
				$comments = $notifications[$z]['notifications']['comments'];
				
				$notification[$z] = array("id"=> $notification_id, "initiated_by"=> $initiated_by, "initiated_time"=>$initiated_time, "notification_for"=>$notification_for, "comments"=>$comments);
			}
	
			$quote[0] = array("quote_id"=> $quote_id, "provider_id"=> $provider_id, "cart_id"=> $cart_id, "user_id"=> $user_id, "user_name"=> $user_name, "submitted"=>$submitted, "products"=>$products, "notifications"=>$notification);
		}
	
		return json_encode($quote);
	}
	
	public function saveNotification($quoteId, $cartId, $notificationfor){
		
		$this->autoRender = false; // no view to render
		
		$userID  = Authsome::get('id');
		
		$comment = $this->request->query['Comment'];

		$this->log('$comment.....' . $comment);
		
		$date = date('Y-m-d H:i:s');
		$results;
		
		if($userID != null){
			$data = array(
					'notifications' => array(
							'quote_id' => $quoteId,
							'initiated_by' => $userID,
							'initiated_time'=>$date,
							'notification_for'=>$notificationfor,
							'comments'=>$comment
					)
			);
			$this->notifications->create();
			if($this->notifications->save($data))
			{
				$results = "SUCCESS";
			}
		}
		else{
			$results = "NOTAUTHENTICATED";
		}
		
		$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
	}
}
