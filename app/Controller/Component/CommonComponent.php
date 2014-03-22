<?php
App::uses('Component', 'Controller');

class CommonComponent extends Component {
	
	public function getDescription($type, $name, $value)
	{
		$retVal = "";
		if($type == "users")
		{
			$doptions = array('conditions' => array(
					'id' => $value)
			);
				
			$model = ClassRegistry::init('User');
			
			$userdata = $model->find('all',$doptions);
			$ulength = count($userdata);
			for($j=0; $j<$ulength; $j++)
			{
				$retVal = $userdata[$j]["User"][$name];
			}
		}
	
		return $retVal;
	}
	
	public function generateString()
	{
		return "testing";
	}
	
}