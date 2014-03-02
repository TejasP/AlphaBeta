<?php

App::uses('AppNoAuthController', 'Controller');

class BrowseCatalogHandlerComponent extends Object {
	public function buildQuery($querystr) 
	{
		$cntr = 0;
		$retValue = "";
		$bcflt = "";
		$pg = "";
		
		//bcflt="view:g,ppr_min:200,ppr_max:600";
		if (isset($querystr['bcflt']))
		{
			$bcflt = $querystr['bcflt'];
			$bcfltkeys_tmp = explode(',', $bcflt);
			
			for($i=0; $i<count($bcfltkeys_tmp); $i++) {
				$keysvalues = explode(":", $bcfltkeys_tmp[$i]);
		//		echo " " . $i . " key...." . $keysvalues[0] . "... value...." . $keysvalues[1];
				$filters[$cntr] = array("key" => $keysvalues[0], "value" => $keysvalues[1]);
				$cntr++;
			}
		}
		
		//pg="cp:1,spoint:1";
		if (isset($querystr['pg']))
		{
			$pg = $querystr['pg'];
			$pgkeys_tmp = explode(',', $pg);
			
			for($i=0; $i<count($pgkeys_tmp); $i++) {
				$keysvalues = explode(":", $pgkeys_tmp[$i]);
			//	echo " " . $i . " key...." . $keysvalues[0] . "... value...." . $keysvalues[1];
				$filters[$cntr] = array("key" => $keysvalues[0], "value" => $keysvalues[1]);
				$cntr++;
			}
		}

		if (isset($querystr['q']))
		{
			$pg = $querystr['q'];
			
			$filters[$cntr] = array("key" => "q", "value" => $pg);
			$cntr++;
		}
		
		echo " displaying filters...... ";
		
		for($i=0; $i<count($filters); $i++) {
			echo "<pre>"; echo print_r($filters[$i]); echo "</pre> ";
		}
		
		//echo " this is from buildQuery..." . $bcflt . " " . $pg . " \nbcfltkeys_tmp..." . implode(",", $bcfltkeys_tmp) . " pgkeys...." . implode(",", $pgkeys_tmp);
		
		//$retValue = "this is from buildQuery..." . $bcflt . " " . $pg . " bcfltkeys..." . implode(",", $bcfltkeys) . " pgkeys...." . implode(",", $pgkeys); 
		
		return $retValue;
	}
	
	
	public function getParameterValue($paramcode, $querystr)
	{
		$paramvalue = "";
		for($i=0; $i<count($querystr); $i++)
		{
			if($querystr[i][0] == $paramcode)
			{
				$paramvalue = $querystr[i][0];
			}
		}
		
	}
}