<?php
// require_once '../dal/data.area_stat.php';
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.statistics.register.php';
/* Util related Data Access Layer */
require_once '../lal/lal.appIdentity.php';

class module_area {

  /* TABLE : area_history
   * DESCRIPTION : This table contains list of total users, total unions, total business,
   *			   open movements, closed movements, total movements related to particluar area on
   *			   a particluar date
   */
  function update_areahistory_t_usr($minlocation,$location,$state,$country) {
   /* FUNCTION DESCRIPTION : 1. Check area on a today date exists or not 
    *							IF EXISTS, update t_users with increment
	*							ELSE, add New row with area, today date and t_users=0
    */
	$statRegObj=new statistics_register();
	$dbObj=new Database();
	$idObj=new identity();
	$sql='';
	/* MiniLocation : */
		$checkminilocationExistsql=$statRegObj->query_todaystat_areaExists($minlocation);
		$minilocationJSON=$dbObj->getJSONData($checkminilocationExistsql);
		$minilocationdeJSON=json_decode($minilocationJSON);
		if(count($minilocationdeJSON)>0) { // Update
			$sql.=$statRegObj->query_todaystat_updateAnuserToArea($minlocation);
			// $minilocationupdatesql=$statRegObj->query_todaystat_updateAnuserToArea($minlocation);
			// $dbObj->addupdateData($minilocationupdatesql);
		} else { // Insert
			$area_Id=$idObj->area_stat_id();
			$sql.=$statRegObj->query_todaystat_addAuserToArea($area_Id,$minlocation);
			// $minilocationinsertsql=$statRegObj->query_todaystat_addAuserToArea($area_Id,$minlocation);
			// $dbObj->addupdateData($minilocationinsertsql);
		}
	/* Location */
		$checklocationExistsql=$statRegObj->query_todaystat_areaExists($location);
		$locationJSON=$dbObj->getJSONData($checklocationExistsql);
		$locationdeJSON=json_decode($locationJSON);
		if(count($locationdeJSON)>0) { // Update
			$sql.=$statRegObj->query_todaystat_updateAnuserToArea($location);
			// $locationupdatesql=$statRegObj->query_todaystat_updateAnuserToArea($location);
			// $dbObj->addupdateData($locationupdatesql);
		} else { // Insert
			$area_Id=$idObj->area_stat_id();
			$sql.=$statRegObj->query_todaystat_addAuserToArea($area_Id,$location);
			// $locationinsertsql=$statRegObj->query_todaystat_addAuserToArea($area_Id,$location);
			// $dbObj->addupdateData($locationinsertsql);
		}
	 /* State */
		$checkstateExistsql=$statRegObj->query_todaystat_areaExists($state);
		$stateJSON=$dbObj->getJSONData($checkstateExistsql);
		$statedeJSON=json_decode($stateJSON);
		if(count($statedeJSON)>0) { // Update
			$sql.=$statRegObj->query_todaystat_updateAnuserToArea($state);
			// $stateupdatesql=$statRegObj->query_todaystat_updateAnuserToArea($state);
			// $dbObj->addupdateData($stateupdatesql);
		} else { // Insert
			$area_Id=$idObj->area_stat_id();
			$sql.=$statRegObj->query_todaystat_addAuserToArea($area_Id,$state);
			// $stateinsertsql=$statRegObj->query_todaystat_addAuserToArea($area_Id,$state);
			// $dbObj->addupdateData($stateinsertsql);
		}
	 /* Country */
		$checkcountryExistsql=$statRegObj->query_todaystat_areaExists($country);
		$countryJSON=$dbObj->getJSONData($checkcountryExistsql);
		$countrydeJSON=json_decode($countryJSON);
		if(count($countrydeJSON)>0) { // Update
			$sql.=$statRegObj->query_todaystat_updateAnuserToArea($country);
			// $countryupdatesql=$statRegObj->query_todaystat_updateAnuserToArea($country);
			// $dbObj->addupdateData($countryupdatesql);
		} else { // Insert
			$area_Id=$idObj->area_stat_id();
			$sql.=$statRegObj->query_todaystat_addAuserToArea($area_Id,$country);
			// $countryinsertsql=$statRegObj->query_todaystat_addAuserToArea($area_Id,$country);
			// $dbObj->addupdateData($countryinsertsql);
		}
	 $result=$dbObj->addupdateData($sql);
	return $result;
  }
  
  function update_areahistory_t_union($area) {
   /* FUNCTION DESCRIPTION : 1. Check area on a today date exists or not 
    *							IF EXISTS, update t_users with increment
	*							ELSE, add New row with area, today date and t_users=0
    */
    $hisObj=new area_history();
    $inputArray=array();
	$inputArray["area"]=$area;
	$inputArray["areadate"]=date("Y-m-d");
	$outputArray='*';
	$extraString='';
	
	$jsonData=$hisObj->getarea_historyData($inputArray, $outputArray, $extraString);
	$dejsonData=json_decode($jsonData);
	if(count($dejsonData)>0) { /* Exists in Database ::: update */
		$setArray=array();
		$setArray["t_unions"]=strval(intval($dejsonData[0]->{'t_unions'})+1);
		$conditionArray=array();
		$conditionArray["area"]=$area;
		$conditionArray["areadate"]=date("Y-m-d");
		$r_status1=$hisObj->updatearea_historyData($setArray, $conditionArray);
	}
	else { /* Doesn't exist in Database ::: insert */
		$idObj=new identity();
		$area_Id=$idObj->area_stat_id();   // area_history_id
		$areadate=date("Y-m-d");
		$t_users=0;
		$t_unions=1;
		$t_biz=0;
		$o_move=0;
		$c_move=0;
		$t_move=0;
		$r_status2=$hisObj->addarea_historyData($area_Id,$areadate,$area,$t_users,$t_unions,$t_biz,$o_move,$c_move,$t_move);
	}
  } 
 
  /* TABLE : area_stat 
   * DESCRIPTION : This table contains list of total users, total unions, total business,
   *			   open movements, closed movements, total movements related to particluar area
   */
  function update_areastat_t_usr($minlocation,$location,$state,$country) {
  /* FUNCTION DESCRIPTION : 1. Check area exists or not 
   *							IF EXISTS, update t_users with increment
   *							ELSE, add New row with area and t_users=0
   */
    $statRegObj=new statistics_register();
	$dbObj=new Database();
	$idObj=new identity();
	$sql='';
    /* Minlocation : */
		$checkminilocationExistsql=$statRegObj->query_totalstat_areaExists($minlocation);
		$minilocationJSON=$dbObj->getJSONData($checkminilocationExistsql);
		$minilocationdeJSON=json_decode($minilocationJSON);
		if(count($minilocationdeJSON)>0) { // Update
			$sql.=$statRegObj->query_total_updateAnuserToArea($minlocation);
			// $minilocationupdatesql=$statRegObj->query_total_updateAnuserToArea($minlocation);
			// $dbObj->addupdateData($minilocationupdatesql);
		} else { // Insert
			$area_Id=$idObj->area_stat_id();
			$sql.=$statRegObj->query_total_addAuserToArea($area_Id,$minlocation);
			// $minilocationinsertsql=$statRegObj->query_total_addAuserToArea($area_Id,$minlocation);
			// $dbObj->addupdateData($minilocationinsertsql);
		}
	/* location : */
		$checklocationExistsql=$statRegObj->query_totalstat_areaExists($location);
		$locationJSON=$dbObj->getJSONData($checklocationExistsql);
		$locationdeJSON=json_decode($locationJSON);
		if(count($locationdeJSON)>0) { // Update
			$sql.=$statRegObj->query_total_updateAnuserToArea($location);
			// $locationupdatesql=$statRegObj->query_total_updateAnuserToArea($location);
			//$dbObj->addupdateData($locationupdatesql);
		} else { // Insert
			$area_Id=$idObj->area_stat_id();
			$sql.=$statRegObj->query_total_addAuserToArea($area_Id,$location);
			// $locationinsertsql=$statRegObj->query_total_addAuserToArea($area_Id,$location);
			// $dbObj->addupdateData($locationinsertsql);
		}
	/* State : */
		$checkstateExistsql=$statRegObj->query_totalstat_areaExists($state);
		$stateJSON=$dbObj->getJSONData($checkstateExistsql);
		$statedeJSON=json_decode($stateJSON);
		if(count($statedeJSON)>0) { // Update
			$sql.=$statRegObj->query_total_updateAnuserToArea($state);
			// $stateupdatesql=$statRegObj->query_total_updateAnuserToArea($state);
			// $dbObj->addupdateData($stateupdatesql);
		} else { // Insert
			$area_Id=$idObj->area_stat_id();
			$sql.=$statRegObj->query_total_addAuserToArea($area_Id,$state);
			// $stateinsertsql=$statRegObj->query_total_addAuserToArea($area_Id,$state);
			// $dbObj->addupdateData($stateinsertsql);
		}
	/* Country : */
		$checkcountryExistsql=$statRegObj->query_totalstat_areaExists($country);
		$countryJSON=$dbObj->getJSONData($checkcountryExistsql);
		$countrydeJSON=json_decode($countryJSON);
		if(count($countrydeJSON)>0) { // Update
			$sql.=$statRegObj->query_total_updateAnuserToArea($country);
			// $countryupdatesql=$statRegObj->query_total_updateAnuserToArea($country);
			// $dbObj->addupdateData($countryupdatesql);
		} else { // Insert
			$area_Id=$idObj->area_stat_id();
			$sql.=$statRegObj->query_total_addAuserToArea($area_Id,$country);
			//$countryinsertsql=$statRegObj->query_total_addAuserToArea($area_Id,$country);
			// $dbObj->addupdateData($countryinsertsql);
		}
	$result=$dbObj->addupdateData($sql);
	return $result;
  }
  
  function update_areastat_t_union($area) {
  /* FUNCTION DESCRIPTION : 1. Check area exists or not 
   *							IF EXISTS, update t_users with increment
   *							ELSE, add New row with area and t_users=0
   */
    $inputArray=array();
	$inputArray["area"]=$area;
	$outputArray='*';
	$extraString='';
	$statObj=new area_stat();
	$jsonData=$statObj->getarea_statData($inputArray, $outputArray, $extraString);
	$dejsonData=json_decode($jsonData);
	if(count($dejsonData)>0) { /* Exists in Database ::: update */
		$setArray=array();
		$setArray["t_unions"]=strval(intval($dejsonData[0]->{'t_unions'})+1);
		$conditionArray=array();
		$conditionArray["area"]=$area;
		$r_status1=$statObj->updatearea_statData($setArray, $conditionArray);
	}
	else { /* Doesn't exist in Database ::: insert */
		$idObj=new identity();
		$area_Id=$idObj->area_stat_id();   // area_history_id
		$t_users=0;
		$t_unions=1;
		$t_biz=0;
		$o_move=0;
		$c_move=0;
		$t_move=0;
		$r_status2=$statObj->addarea_statData($area_Id,$area,$t_users,$t_unions,$t_biz,$o_move,$c_move,$t_move);
	}
  }
  
  

 
}

?>