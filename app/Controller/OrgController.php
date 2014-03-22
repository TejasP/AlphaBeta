<?php

App::uses('AppNoAuthController', 'Controller');
App::uses('CommonDBHandlerComponent', 'Controller/Component');

class OrgController extends AppNoAuthController {

	public $uses = array('quotes','quotes_details','carts', 'quotes_notifications', 'users');
	
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
			
/*			// calling handler component for generating query..
			$dbhandler = new CommonDBHandlerComponent();
			$user_name = $dbhandler->getDescription("users", "username", $user_id);
			// ------------------------------------------------
*/		
			$uoptions = array('conditions' => array(
					'users.id' => $user_id)
			);
				
			$userdata = $this->users->find('all',$uoptions);
			$ulength = count($userdata);
			for($k=0; $k<$ulength; $k++)
			{
				 $user_name = $userdata[$k]['users']['username'];
			}
			
			$myQuotes[$j] = array("quote_id"=> $quote_id, "provider_id"=> 1, "cart_id"=> $cart_id, "user_id"=> $user_id, "user_name"=> $user_name, "submitted"=>$submitted);
		}
				
		$this->autoRender = false;
		return json_encode($myQuotes);
	}

	public function quoteDetail (){
		$this->layout = "foundation_org_home";
	
		$query_quoteid = $this->request->query['quoteid'];
		

		$qoptions = array('conditions' => array(
				'quotes.id' => $query_quoteid)
		);
		
		$quotes_data = $this->quotes->find('all',$qoptions);
		$qlength = count($quotes_data);
		for($j=0; $j<$qlength; $j++)
		{
			$cart_id = $quotes_data[$j]['quotes']['cart_id'];
			$quote_id = $quotes_data[$j]['quotes']['id'];
			$user_id = $quotes_data[$j]['quotes']['user_id'];
			$submitted = $quotes_data[$j]['quotes']['submitted'];
			
			$uoptions = array('conditions' => array(
					'users.id' => $user_id)
			);
			
			$userdata = $this->users->find('all',$uoptions);
			$ulength = count($userdata);
			for($k=0; $k<$ulength; $k++)
			{
				$user_name = $userdata[$k]['users']['username'];
			}

			// quote detail
			$coptions = array('conditions' => array(
					'carts.id' => $cart_id)
			);
			
			$cart_detail = $this->carts->find('all',$coptions);
			$clength = count($cart_detail);
			for($y=0; $y<$clength; $y++)
			{
				$product_id = $cart_detail[$y]['carts']['productid'];
				$product_type = $cart_detail[$y]['carts']['producttype'];
				$qty = $cart_detail[$y]['carts']['qty'];
				$price = "10.00";
										
				if($product_type == "1")
					$product_name = "medicine product name here";
				else 
					$product_name = "non-medicine product name here";
				
				$products[$y] = array("prod_id"=> $product_id, "prod_name"=> $product_name, "qty"=> $qty, "price"=> $price);
			}
			
/*			
			// quote notifications
			$coptions = array('conditions' => array(
					'quotes_notifications.quote_id' => $cart_id)
			);
				
			$notifications = $this->quotes_notifications->find('all',$coptions);
			$nlength = count($notifications);
			for($z=0; $z<$nlength; $z++)
			{
				$notification_id = $notifications[$z]['quotes_notifications']['id'];
				$initiated_by = $notifications[$z]['quotes_notifications']['initiated_by'];
				$initiated_time = $notifications[$z]['quotes_notifications']['initiated_time'];
				$initiated_for = $notifications[$z]['quotes_notifications']['initiated_for'];
				$comments = $notifications[$z]['quotes_notifications']['comments'];
			
				$notification[$z] = array("id"=> $notification_id, "initiated_by"=> $initiated_by, "initiated_time"=>$initiated_time, "initiated_for"=>$initiated_for, "comments"=>$comments);
			}
*/

			$quote[0] = array("quote_id"=> $quote_id, "provider_id"=> 1, "cart_id"=> $cart_id, "user_id"=> $user_id, "user_name"=> $user_name, "submitted"=>$submitted, "products"=>$products, "notifications"=>$notification);
		}
		
		
	
		$this->autoRender = false;
		return json_encode($quote);
	}
}