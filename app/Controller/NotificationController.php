<?php

App::uses('AppNoAuthController', 'Controller');

class NotificationController extends AppNoAuthController {
	
	public $uses = array('Quotes','Quotes_details','Carts', 'cart_detail', 'Notifications', 'users');
	
	public function index(){
		$this->layout = "foundation_with_topbar";
		
		$user = Authsome::get('username');
		$role = Authsome::get('role');
		
		if (($user=== 'NULL') || ($user== '')) {
			$this->set('isAuthenticated',"false");
			$this->set('isUserLoggedIn',"false");
				
		}else
		{
			$this->set('isAuthenticated',"true");
			$this->set('isUserLoggedIn',"true");
			$user = Authsome::get('username');
			$role = Authsome::get('role');
		}
		
		$this->set('leftNav',$this->getCartsforUserArray());
		
		

	}
		
	public function getNotificationforUser($userName){
		

		$this->autoRender = false; // no view to render
		// first get user Id,		
		$userID  = Authsome::get('id');
		// get all the cart and quotes for user 
		
		$options = array('conditions' => array('Quotes.user_id'=>$userID));
		
		$results= $this->Quotes->find('all',$options);
		$count=  count($results);
		$return;
		for($i=0;$i<$count;$i++){
		$cartID = $results[$i]['Quotes']['cart_id'];
		$providerID = $results[$i]['Quotes']['provider_id'];
		$quoteID = $results[$i]['Quotes']['id'];
		// for each quote get the notification 
		$moptions = array('conditions' => array('Notifications.quote_id'=>$quoteID));
		$mresults= $this->Notifications->find('all',$moptions);
		
			$notificationCount = count($mresults);

			if($notificationCount>0){
				for($j=0;$j<$notificationCount;$j++){
					$return []= array("Quote_ID"=>$quoteID,"notification"=>$mresults[$j]);
				}
				
			}
				
		}
		$this->response->type('json');
		$json = json_encode($return);
		$this->response->body($json);
		
	}
	
	
	public function getNotificationForQuote($quoteID){
		
		$this->autoRender = false; // no view to render
		// first get user Id,
			 $userID  = Authsome::get('id');
			$user = Authsome::get('username');
			$role = Authsome::get('role'); 

			$return;
			 
			if ($user!= null) {

				$moptions = array('conditions' => array('Notifications.quote_id'=>$quoteID));
				$mresults= $this->Notifications->find('all',$moptions);
				$notificationCount = count($mresults);
		
				if($notificationCount>0){
					for($j=0;$j<$notificationCount;$j++){
						$return []= array("Quote_ID"=>$quoteID,"notification"=>$mresults[$j]);
					}
		
				}
			}else{
				$return = array("NOTAUTHENTICATED");
				
			}
			
		$this->response->type('json');
		$json = json_encode($return);
		$this->response->body($json);
	}
	
	public function getNotificationbasedOnType($type){
		
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
					'Notifications' => array(
							'quote_id' => $quoteId,
							'initiated_by' => $userID,
							'initiated_time'=>$date,
							'notification_for'=>$notificationfor,
							'comments'=>$comment
					)
			);
			$this->Notifications->create();
			if($this->Notifications->save($data))
			{
				$results[0] = array("result"=> "SUCCESS");
			}
		}
		else{
			$results[0] = array("result"=> "NOTAUTHENTICATED");
		}
	
		/*$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
		*/
		return json_encode($results);
		
	}
	
	public function getCartsforUser(){
		
		$this->autoRender = false; // no view to render

		return json_encode($this->getCartsforUserArray());
	}
	
	public function getCartsforUserArray(){
	
	
		$userID  = Authsome::get('id');
	
		if($userID != null){
			$options = array('conditions' => array('carts.user_id'=>$userID));
			$results= $this->Carts->find('all',$options);
		}
		else{
			$results[0] = array("result"=> "NOTAUTHENTICATED");
		}
		
		return $results;
	}
	
}