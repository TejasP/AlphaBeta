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
		} else if ($type == "medicine_headers")	 
		{
			$doptions = array('conditions' => array(
					'medicine_id' => $value)
			);
			
			$model = ClassRegistry::init('MedicinesHeader');
				
			$medicinedata = $model->find('all',$doptions);
			$mlength = count($medicinedata);
			for($j=0; $j<$mlength; $j++)
			{
				$retVal = $medicinedata[$j]["MedicinesHeader"][$name];
			}
		} else if ($type == "product_headers")	 
		{
			$doptions = array('conditions' => array(
					'prod_id' => $value)
			);
			
			$model = ClassRegistry::init('ProductHeader');
				
			$nonmedidata = $model->find('all',$doptions);
			$ulength = count($nonmedidata);
			for($j=0; $j<$ulength; $j++)
			{
				$retVal = $nonmedidata[$j]["ProductHeader"][$name];
			}
		}
		return $retVal;
	}
	
	public function getProductDetails($type, $value)
	{
		if ($type == "medicine")
		{
			$doptions = array('conditions' => array(
					'medicine_id' => $value)
			);
				
			$model = ClassRegistry::init('MedicinesHeader');
	
			$medicinedata = $model->find('all',$doptions);
			$mlength = count($medicinedata);
			for($j=0; $j<$mlength; $j++)
			{
				$retVal['desc'] = $medicinedata[$j]["MedicinesHeader"]['medicine_name'];
				$retVal['price'] = $medicinedata[$j]["MedicinesHeader"]['price'];
			}
		} else if ($type == "nonmedicine")
		{
			$doptions = array('conditions' => array(
				'prod_id' => $value)
			);
							
			$model = ClassRegistry::init('ProductHeader');
	
			$nonmedidata = $model->find('all',$doptions);
			$ulength = count($nonmedidata);
			for($j=0; $j<$ulength; $j++)
			{
				$retVal['desc'] = $nonmedidata[$j]["ProductHeader"]['prod_desc'];
				$retVal['price'] = $nonmedidata[$j]["ProductHeader"]['prod_price'];
			}
		}
		return $retVal;
	}
	
	public function getQuoteStatusDesc($type)
	{
		$retValue = "";
		if($type == "N")
			$retValue = "Quote initiated";
		else if($type == "A")
			$retValue = "Quote accepted";
		else if($type == "C")
			$retValue = "Quote confirmed";
		else
			$retValue = "description not found for type(" + $type +")"; 
		
		
		return $retValue;
	}

	public function getProviderDetail($providerid)
	{
		$doptions = array('conditions' => array(
				'id' => $providerid)
		);
		
		$model = ClassRegistry::init('Provider');
		
		$providerdata = $model->find('all',$doptions);
		$mlength = count($providerdata);
		for($j=0; $j<$mlength; $j++)
		{
			$retVal['name'] = $providerdata[$j]["Provider"]['provider_name'];
			$retVal['address'] = $providerdata[$j]["Provider"]['area'];
		}
		
		return $retVal;
	}
	
}