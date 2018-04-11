<?php

require_once '../lal/lal.appIdentity.php';
require_once '../dal/data.union.php';

class module_union_supporters {

	
	function user_support_union($union_Id, $user_Id) {
	 /* FUNCTION DESCRIPTION : A User support a Union 
	  *                        1) Increment Supporters in union_account table 
	  *                        2) Add a Row in union_sup_stat
	  */
		$inputArray_1=array();
		$inputArray_1["union_Id"]=$union_Id;
			
		$outputArray_1='*';
			
		$extraString_1='';
		    
		$accountObj=new union_account();
		$jsonData_1=$accountObj->getunion_accountData($inputArray_1, $outputArray_1, $extraString_1);
		$dejsonData_1=json_decode($jsonData_1);
			
		$setArray_1=array();
		$setArray_1["supporters"]=strval(intval($dejsonData_1[0]->{'supporters'})+1);
			
		$conditionArray_1=array();
		$conditionArray_1["union_Id"]=$union_Id;
			
		$result_1=$accountObj->updateunion_accountData($setArray_1, $conditionArray_1);
		echo $result_1;
			
		/* Add Supporter to Union Supporters List */
		$idObj=new identity();
		
		$support_Id=$idObj->union_sup_id();
		$supportOn=date("Y-m-d H:i:s");
		$supObj=new union_sup();
		$supObj->addunion_supData($support_Id,$union_Id,$user_Id,$supportOn);
		
		/* Supporters Statistics Day-by-Day */
			/* Check Date exists or not */
				$inputArray_2=array();
				$inputArray_2["sup_date"]=date("Y-m-d");
				$outputArray_2='*';
				$extraString_2='';
				$unionStatObj=new union_sup_stat();
				$jsonData_2=$unionStatObj->getunion_sup_statData($inputArray_2, $outputArray_2, $extraString_2);
				$dejsonData_2=json_decode($jsonData_2);
				if(count($dejsonData_2)>0) { /* Exists in Database :: update */
					$setArray_2=array();
					$setArray_2["supporters"]=strval(intval($dejsonData_2[0]->{'supporters'})+1);
					$conditionArray_2=array();
					$conditionArray_2["sup_date"]=date("Y-m-d");
					$result_2=$unionStatObj->updateunion_sup_statData($setArray_2, $conditionArray_2);
				}
				else {
					$supstat_Id=$idObj->union_supstat_id();
					$sup_date=date("Y-m-d");
					$supporters=1;
					$result_3=$unionStatObj->addunion_sup_statData($supstat_Id,$union_Id,$sup_date,$supporters);
				}
			
	}
	
	function user_unsupport_union($union_Id, $user_Id) {
	/* FUNCTION DESCRIPTION : A User unsupport a Union
	 *						  1) Decrement Supporters in union_account table
	 *						  2) Delete a Row in union_sup_stat
	 */
		$inputArray_1=array();
		$inputArray_1["union_Id"]=$union_Id;
			
		$outputArray_1='*';
			
		$extraString_1='';
		    
		$accountObj=new union_account();
		$jsonData_1=$accountObj->getunion_accountData($inputArray_1, $outputArray_1, $extraString_1);
		$dejsonData_1=json_decode($jsonData_1);
			
		if(intval($dejsonData_1[0]->{'supporters'})>0) {
			$setArray_1=array();
			$setArray_1["supporters"]=strval(intval($dejsonData_1[0]->{'supporters'})-1);
			$conditionArray_1=array();
			$conditionArray_1["union_Id"]=$union_Id;	
			$result_1=$accountObj->updateunion_accountData($setArray_1, $conditionArray_1);
			echo $result_1;
		}
		
		/* union_sup() */
		/* Delete Supporter to Union Supporters List */
		$inputArray_2=array();
		$inputArray_2["union_Id"]=$union_Id;
		$inputArray_2["user_Id"]=$user_Id;
		$supObj=new union_sup();
		$result_2=$supObj->deleteunion_supData($inputArray_2);
		echo $result_2;
		
		/* Supporters Statistics Day-by-Day */
			/* Check Date exists or not */
				$inputArray_2=array();
				$inputArray_2["sup_date"]=date("Y-m-d");
				$outputArray_2='*';
				$extraString_2='';
				$unionStatObj=new union_sup_stat();
				$jsonData_2=$unionStatObj->getunion_sup_statData($inputArray_2, $outputArray_2, $extraString_2);
				$dejsonData_2=json_decode($jsonData_2);
				if(count($dejsonData_2)>0 && intval($dejsonData_2[0]->{'supporters'})>0) { /* Exists in Database :: update */
					$setArray_2=array();
					$setArray_2["supporters"]=strval(intval($dejsonData_2[0]->{'supporters'})-1);
					$conditionArray_2=array();
					$conditionArray_2["sup_date"]=date("Y-m-d");
					$result_3=$unionStatObj->updateunion_sup_statData($setArray_2, $conditionArray_2);
					echo $result_3;
				}
		
	}

}

?>