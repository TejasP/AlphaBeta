<?php

App::uses('AppNoAuthController', 'Controller');

class PreferenceController extends AppNoAuthController {
	public $uses = array('provider','locations', 'preference');
	
	public function  setLocationPreference($userIDInput,$locationID){
		$this->autoRender = false;
		$userID  = Authsome::get('id');
				
		$results;
		if($userID != null){
			echo "ID:".$userIDInput.":".$locationID;
			$data = array(
					'preference' => array(
							'user_id'=>$userIDInput,
							'preference_type' => "LOCATION",
							'related_id' => $locationID,
					)
			);
			if($this->preference->save($data))
			{
				$results = "SUCCESSFUL";
			}
			else{
				$results = "FAILED";
			}
		}else{
			$results = "NOTAUTENTICATED";
		}
		
		$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
	}
	
	public function setPreferedProvider($userIDInput,$providerID){
		$this->autoRender = false;
		$userID  = Authsome::get('id');
		$results;
		if($userID != null){
			if($userIDInput ="null"){
				$userIDInput = $userID;
			}
			$data = array(
					'preference' => array(
							'user_id'=>$userIDInput,
							'preference_type' => "PROVIDER",
							'related_id' => $providerID,
					)
			);
			if($this->preference->save($data))
			{
				$results = "SUCCESSFUL";
			}
			else{
				$results = "FAILED";
			}
		}else{
			$results = "NOTAUTENTICATED";
		}
		
		$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
	}
	
	public function getPreferedProvider($userIDInput){
		$this->autoRender = false;
		$userID  = Authsome::get('id');
		$results;
		if($userID != null){
			$moptions = array('conditions' => array('preference.user_id = ' => $userIDInput,"preference.preference_type='PROVIDER'") );
			$quotes_data = $this->preference->find('all',$moptions);
			$results = $quotes_data;
		}else{
			$results = "NOTAUTENTICATED";
		}
		
		$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
	}
	
	public function getPreferedLocation($userIDInput){
		$this->autoRender = false;
		$userID  = Authsome::get('id');
		$results;
		if($userID != null){
			$moptions = array('conditions' => array('preference.user_id = ' => $userIDInput,"preference.preference_type='LOCATION'") );
			$quotes_data = $this->preference->find('all',$moptions);
			$results = $quotes_data;
		}else{
			$results = "NOTAUTENTICATED";
		}
		
		$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
	}
	
	public function updatePreferredProvider($userIDInput,$providerID){
		$this->autoRender = false;
		$userID  = Authsome::get('id');
		$results;
		if($userID != null){
			if($this->preference->updateAll(array('preference.related_id'=> $providerID),array( 'preference.user_id' =>$userIDInput,'preference.preference_type' =>'PROVIDER')))
			{
				$results = "SUCCESSFUL";
			}
			else{
				$results = "FAILED";
			}
		}else{
			$results = "NOTAUTENTICATED";
		}
		$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
	}
	
	public function updatePreferedLocation($userIDInput,$locationID){
		$this->autoRender = false;
		$userID  = Authsome::get('id');
		$results;
		if($userID != null){
		if($this->preference->updateAll(array('preference.related_id'=> $locationID),array( 'preference.user_id' =>$userIDInput,'preference.preference_type' =>'LOCATION')))
			{
				$results = "SUCCESSFUL";
			}
			else{
				$results = "FAILED";
			}
		}else{
			$results = "NOTAUTENTICATED";
		}
		$this->response->type('json');
		$json = json_encode($results);
		$this->response->body($json);
	}
}