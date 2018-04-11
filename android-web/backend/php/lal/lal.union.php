<?php

require_once '../api/app.database.php';
require_once '../dal/data.union.php';
require_once '../lal/lal.appIdentity.php';

class module_union {
	/* TABLE : union_profile_stat
	 * DESCRIPTION : This table contains union_date, union (No.of unions joined on that date)
	 */
	function checkuniqueUnionName($unionName) { /* Unique Name and they can spread Branches */
		$result='UNION_NAME_ALLOWED';

		$unionObj=new union();
		$sql=$unionObj->query_unionaccount_checkunionUnique($unionName);
		$dbObj=new Database();
		$jsonData=$dbObj->getJSONData($sql);
		$dejsonData=json_decode($jsonData);
		if(count($dejsonData)>0) { /* Exists in Database*/
			$result='UNION_NAME_EXISTS';
		} 
	  return $result;
	}
	
	function update_unionprofilestat_union() {
	/* FUNCTION DESCRIPTION : Check today date exists or not 
	 * 							IF EXISTS, update union 
	 *							IF NOT EXISTS, add New row with date and union
	 */
	 $inputArray=array();
	 $inputArray["union_date"]=date("Y-m-d");
	 $outputArray='*';
	 $extraString='';
	 $unionprofStatObj=new union_profile_stat();
	 $jsonData=$unionprofStatObj->getunion_profile_statData($inputArray, $outputArray, $extraString);
	 $dejsonData=json_decode($jsonData);
		 if(count($dejsonData)>0) { /* Exist in database ::: update */
			$setArray=array();
			$setArray["union"]=strval(intval($dejsonData[0]->{'union'})+1);
			$conditionArray=array();
			$conditionArray["union_date"]=date("Y-m-d");
			$unionprofStatObj->updateunion_profile_statData($setArray, $conditionArray);
		 }
		 else { /* Doesn't exist in database ::: add */
			 $idObj=new identity();
			 $ustat_Id=$idObj->union_profilestat_id();
			 $union_date=date("Y-m-d");
			 $union='1';
			$unionprofStatObj->addunion_profile_statData($ustat_Id,$union_date,$union);
		 }
	}
}

?>