<?php

App::uses('AppNoAuthController', 'Controller');

class OrgController extends AppNoAuthController {

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
		
		$myQuotes[0] = array("quote_id"=> 1234567890, "provider_id"=> 1);
		$myQuotes[1] = array("quote_id"=> 1234567891, "provider_id"=> 1);
		$myQuotes[2] = array("quote_id"=> 1234567892, "provider_id"=> 1);
		$myQuotes[3] = array("quote_id"=> 1234567893, "provider_id"=> 1);
		$myQuotes[4] = array("quote_id"=> 1234567894, "provider_id"=> 1);
		$myQuotes[5] = array("quote_id"=> 1234567895, "provider_id"=> 1);
		$myQuotes[6] = array("quote_id"=> 1234567896, "provider_id"=> 1);
		$myQuotes[7] = array("quote_id"=> 1234567897, "provider_id"=> 1);
		$myQuotes[8] = array("quote_id"=> 1234567898, "provider_id"=> 1);
		$myQuotes[9] = array("quote_id"=> 1234567899, "provider_id"=> 1);
		
		$this->autoRender = false;
		return json_encode($myQuotes);
	}

	public function quoteDetail (){
		$this->layout = "foundation_org_home";
	
		$query_quoteid = $this->request->query['quoteid'];
		
		$products[0] = array("prod_id"=>1, "prod_name"=>"product 1", "qty"=>1, "price"=>"10.00");
		$products[1] = array("prod_id"=>2, "prod_name"=>"product 2", "qty"=>2, "price"=>"20.00");
		$products[2] = array("prod_id"=>3, "prod_name"=>"product 3", "qty"=>3, "price"=>"30.00");
		$products[3] = array("prod_id"=>4, "prod_name"=>"product 4", "qty"=>4, "price"=>"40.00");

		$notification[0] = array("id"=>1, "initiated_by"=>"user 1", "time"=>"1st March 2014 10:00:00", "comments"=>"comment1");
		$notification[1] = array("id"=>2, "initiated_by"=>"user 2", "time"=>"2nd March 2014 09:00:00", "comments"=>"comment2");
		$notification[2] = array("id"=>3, "initiated_by"=>"user 1", "time"=>"2nd March 2014 12:00:00", "comments"=>"comment3");
		$notification[3] = array("id"=>4, "initiated_by"=>"user 2", "time"=>"3rd March 2014 00:00:00", "comments"=>"comment4");
		
		$quote[0] = array("quote_id"=>$query_quoteid, "provider_id"=>1, "products"=>$products, "notifications"=>$notification);
	
		$this->autoRender = false;
		return json_encode($quote);
	}
}