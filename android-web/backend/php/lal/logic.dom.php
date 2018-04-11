<?php
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../lal/logic.appIdentity.php';
require_once '../dal/data.platform.php';

class module_dom {

/* Get Domain Name by Id */
function getDomainNameByDomId($projectURL,$lang,$domain_Id){
  $domainName='';
  // $projectURL=$_SESSION["PROJECT_URL"];
  // $lang=$_SESSION["DRI_LANG"];
  $domainFileURL=$projectURL."backend/config/".$lang."/domains/domain_list.json";
  $jsonData=file_get_contents($domainFileURL);
  $dejsonData=json_decode($jsonData);
  if(count($dejsonData)>0){
    for($index=0;$index<count($dejsonData->domains);$index++){
	  if($dejsonData->domains[$index]->{'domain_Id'}==$domain_Id){
	    $domainName=$dejsonData->domains[$index]->{'domainName'};
		break;
	  }
	} 
  }
  return $domainName;
}

/* Get SubDomainName by SubDomainId and DomainId */
function getSubDomainNameByDomSubDomId($projectURL,$lang,$domain_Id,$subDomain_Id){
  $subdomainName='';
 //  $projectURL=$_SESSION["PROJECT_URL"];
 // $lang=$_SESSION["DRI_LANG"];
  $domainFileURL=$projectURL."backend/config/".$lang."/domains/".$domain_Id."/subdomain_list.json";
  $jsonData=file_get_contents($domainFileURL);
  $dejsonData=json_decode($jsonData);
  if(count($dejsonData)>0){
    for($index=0;$index<count($dejsonData->subdomains);$index++){
	  if($dejsonData->subdomains[$index]->{'subdomain_Id'}==$subDomain_Id){
	    $subdomainName=$dejsonData->subdomains[$index]->{'subdomainName'};
		break;
	  }
	} 
  }
  return $subdomainName;
}

/* GetDomainId By Appoximate DomainName */
function getDomIdByAppxDomainName($projectURL,$lang,$searchString){
  $dom_Id_List=array();$dom_Id_List_count=0;
  // $projectURL=$_SESSION["PROJECT_URL"];
  // $lang=$_SESSION["DRI_LANG"];
  $domainFileURL=$projectURL."admin/config/".$lang."/domains/domain_list.json";
  $subdomainFileURL=array(); // $subdomainFileURL[$index]
  $subdomainFileURL_count=0;
  $domain_listData=file_get_contents($domainFileURL);
  $domain_listdeData=json_decode($domain_listData);
  if(count($domain_listdeData->domains)>0){
   for($index=0;$index<count($domain_listdeData->domains);$index++){
	$domain_Id=$domain_listdeData->domains[$index]->{'domain_Id'};
	$domainName=$domain_listdeData->domains[$index]->{'domainName'};
    $subdomainFileURL[$subdomainFileURL_count]=$projectURL."admin/config/".$lang."/domains/".$domain_Id."/subdomain_list.json";
	$subdomainFileURL_count++;	
		if(preg_match("/".$searchString."/", $domainName)) { 
		     $dom_Id_List[$dom_Id_List_count]=$domain_Id;$dom_Id_List_count++; 
		}
	} 
  } 
  for($url=0;$url<count($subdomainFileURL);$url++){
	  $subdomain_listData=file_get_contents($subdomainFileURL[$url]);
	  $subdomain_listdeData=json_decode($subdomain_listData);
	  if(count($subdomain_listdeData->subdomains)>0){
		for($index=0;$index<count($subdomain_listdeData->subdomains);$index++){
		   $subdomain_Id=$subdomain_listdeData->subdomains[$index]->{'subdomain_Id'};
		   $subdomainName=$subdomain_listdeData->subdomains[$index]->{'subdomainName'};
		   if(preg_match("/".$searchString."/", $subdomainName)) { 
				 $dom_Id_List[$dom_Id_List_count]=$subdomain_Id;$dom_Id_List_count++; 
			}
		}
	  }
  }
  return $dom_Id_List;
}

/* TABLE : dom_info */
 function update_dominfo_create($domain_Id) {
 /* FUNCTION DESCRIPTION: This function is used to update total user information in dom_info table */
 /* LOGIC: 1. Check domain_Id/subdomain_Id exists in domain_Id column at dom_info table or not .
  *				a) IF NOT EXIST, Add a Row with domain_Id/subdomain_Id with 
  *					t_users=0, t_move=0, o_move=0, c_move=0, t_signers=0
  */
    $platformObj=new tbl_platform();
	$dbObj=new Database();
	
	$selectQuery=$platformObj->query_getdom_infoData($domain_Id);
    $jsonData=$dbObj->getJSONData($selectQuery);
	$dejsonData=json_decode($jsonData);
	if(count($dejsonData)==0) { /* exists in database */
	      /* doesn't exists */
	  $insertQuery=$platformObj->query_adddom_infoData($domain_Id,0,0,0,0,0,0);
	  $status=$dbObj->addupdateData($insertQuery);
    }
 }
 
 /* TABLE : dom_info */
 function update_dominfo_t_usr($domain_Id) {
 /* FUNCTION DESCRIPTION: This function is used to update total user information in dom_info table */
 /* LOGIC: 1. Check domain_Id/subdomain_Id exists in domain_Id column at dom_info table or not 
  *				a) IF EXISTS, Get "t_users" data and increment plus one to it.
  *				b) IF NOT EXIST, Add a Row with domin_Id/subdomain_Id with 
  *					t_users=1, t_move=0, o_move=0, c_move=0, t_signers=0
  */
	$domInfoObj=new dom_info();
	$inputArray=array();
	$inputArray["domain_Id"]=$domain_Id;
	$outputArray='*';
    $extraString='';
	$jsonData=$domInfoObj->getdom_infoData($inputArray, $outputArray, $extraString);
	$dejsonData=json_decode($jsonData);
	if(count($dejsonData)>0) { /* exists in database */
	  /* read it convert to Number and +1 and then update it */
		 $setArray=array();
		 $setArray["t_users"]=strval(intval($dejsonData[0]->{'t_users'})+1);
		 $conditionArray=array();
		 $conditionArray["domain_Id"]=$domain_Id;
		 $r_status1=$domInfoObj->updatedom_infoData($setArray, $conditionArray);
	  } else { /* doesn't exists */
		  $r_status2=$domInfoObj->adddom_infoData($domain_Id,1,0,0,0,0,0);
					// t_users, t_move, o_move, c_move, t_signers
	  }
 }
 
 /* TABLE : dom_stat */
 function update_domstat_t_usr($domain_Id,$area) {
 /* FUNCTION DESCRIPTION : This function is used to update total user information in dom_stat table */	
 /* LOGIC: 1. Check domain_Id/subdomain_Id exists in domain_Id column and dom_date is equal to today's date
  *           at dom_stat table or not  
  *				a) IF EXISTS, update t_users
  *				b) IF NOT EXIST, add New row with domain_id, t_users=0, t_move=0, o_move=0, c_move=0, t_signers=0
  */ 
	  $domStatObj=new dom_stat();
	  /* DOMAIN: */
	  $inputArray=array();
	  $inputArray["dom_date"]=date("Y-m-d");
	  $inputArray["domain_Id"]=$domain_Id;
	  $inputArray["area"]=$area;
	  $outputArray='*';
	  $extraString='';
	  $jsonData=$domStatObj->getdom_statData($inputArray, $outputArray, $extraString);
	  $dejsonData=json_decode($jsonData);
	  if(count($dejsonData)>0) { /* Exists in database */
		/* update in t_users */
		 $setArray=array();
		 $setArray["t_users"]=strval(intval($dejsonData[0]->{'t_users'})+1);
		 $conditionArray=array();
		 $conditionArray["dom_date"]=date("Y-m-d");
		 $conditionArray["domain_Id"]=$domain_Id;
		 $conditionArray["area"]=$area;
		 $r_status1=$domStatObj->updatedom_statData($setArray, $conditionArray);
	  }
	  else { /* doesn't exist in database */
	    $idObj=new identity();
	    $dstat_Id=$idObj->dom_stat_id();
		$r_status2=$domStatObj->adddom_statData($dstat_Id,date("Y-m-d"),$area,$domain_Id,1,0,0,0,0);
	  }
 }
 
 /* TABLE : dom_info */
 function update_dominfo_t_unions($domain_Id) {
 /* FUNCTION DESCRIPTION: This function is used to update total user information in dom_info table */
 /* LOGIC: 1. Check domain_Id/subdomain_Id exists in domain_Id column at dom_info table or not 
  *				a) IF EXISTS, Get "t_users" data and increment plus one to it.
  *				b) IF NOT EXIST, Add a Row with domin_Id/subdomain_Id with 
  *					t_users=1, t_move=0, o_move=0, c_move=0, t_signers=0
  */
	$domInfoObj=new dom_info();
	$inputArray=array();
	$inputArray["domain_Id"]=$domain_Id;
	$outputArray='*';
    $extraString='';
	$jsonData=$domInfoObj->getdom_infoData($inputArray, $outputArray, $extraString);
	$dejsonData=json_decode($jsonData);
	if(count($dejsonData)>0) { /* exists in database */
	  /* read it convert to Number and +1 and then update it */
		 $setArray=array();
		 $setArray["t_unions"]=strval(intval($dejsonData[0]->{'t_unions'})+1);
		 $conditionArray=array();
		 $conditionArray["domain_Id"]=$domain_Id;
		 $r_status1=$domInfoObj->updatedom_infoData($setArray, $conditionArray);
	  } else { /* doesn't exists */
		  $r_status2=$domInfoObj->adddom_infoData($domain_Id,0,1,0,0,0,0);
					// t_users, t_move, o_move, c_move, t_signers
	  }
 }
 
 /* TABLE : dom_stat */
 function update_domstat_t_unions($domain_Id,$area) {
 /* FUNCTION DESCRIPTION : This function is used to update total user information in dom_stat table */	
 /* LOGIC: 1. Check domain_Id/subdomain_Id exists in domain_Id column and dom_date is equal to today's date
  *           at dom_stat table or not  
  *				a) IF EXISTS, update t_users
  *				b) IF NOT EXIST, add New row with domain_id, t_users=0, t_move=0, o_move=0, c_move=0, t_signers=0
  */ 
	  $domStatObj=new dom_stat();
	  /* DOMAIN: */
	  $inputArray=array();
	  $inputArray["dom_date"]=date("Y-m-d");
	  $inputArray["domain_Id"]=$domain_Id;
	  $inputArray["area"]=$area;
	  $outputArray='*';
	  $extraString='';
	  $jsonData=$domStatObj->getdom_statData($inputArray, $outputArray, $extraString);
	  $dejsonData=json_decode($jsonData);
	  if(count($dejsonData)>0) { /* Exists in database */
		/* update in t_users */
		 $setArray=array();
		 $setArray["t_unions"]=strval(intval($dejsonData[0]->{'t_unions'})+1);
		 $conditionArray=array();
		 $conditionArray["dom_date"]=date("Y-m-d");
		 $conditionArray["domain_Id"]=$domain_Id;
		 $conditionArray["area"]=$area;
		 $r_status1=$domStatObj->updatedom_statData($setArray, $conditionArray);
	  }
	  else { /* doesn't exist in database */
	    $idObj=new identity();
	    $dstat_Id=$idObj->dom_stat_id();
		$r_status2=$domStatObj->adddom_statData($dstat_Id,date("Y-m-d"),$area,$domain_Id,0,1,0,0,0);
	  }
 }
 
 /* TABLE : dom_role_info */
 function update_domroleInfo_t_users($role_Id) {
 /* FUNCTION DESCRIPTION : This function is used to update total user information in dom_role_info table */
 /* LOGIC : 1. Check role_Id exists in role_Id column in dom_role_info table or not
  * 			a) IF EXISTS, update t_users
  *				b) IF NOT EXISTS, add New row with role_Id and t_users  
  */
  $inputArray=array();
  $inputArray["role_Id"]=$role_Id;
  $outputArray='*';
  $extraString='';
  $roleInfoObj=new dom_role_info();
  $jsonData=$roleInfoObj->getdom_role_infoData($inputArray, $outputArray, $extraString);
  $dejsonData=json_decode($jsonData);
  if(count($dejsonData)>0) { /* Exists in Database */
	$setArray=array();
	$setArray["t_users"]=strval(intval($dejsonData[0]->{'t_users'})+1);
	$conditionArray=array();
	$conditionArray["role_Id"]=$role_Id;
	$r_status1=$roleInfoObj->updatedom_role_infoData($setArray, $conditionArray);
  } else { /* Not Exists in Database */
		$roleInfoObj->adddom_role_infoData($role_Id,1);
  }
 }
 
 /* TABLE : dom_role_stat */
 function update_domrolestat_t_users($role_Id,$area) {
 /* FUNCTION DESCRIPTION : This function is used to update total user information on every date in dom_role_stat table */
 /* LOGIC : 1. Check role_Id exists in role_id column and today date in role_date column in dom_role_stat table or not 
  *				a) IF EXISTS, update t_users
  *				b) IF NOT EXISTS, add New Row 
  */
  $inputArray=array();
  $inputArray["role_date"]=date("Y-m-d");
  $inputArray["role_Id"]=$role_Id;
  $inputArray["area"]=$area;
  $outputArray='*';
  $extraString='';
  $roleStatObj=new dom_role_stat();
  $jsonData=$roleStatObj->getdom_role_statData($inputArray, $outputArray, $extraString);
  $dejsonData=json_decode($jsonData);
  if(count($dejsonData)>0) { /* Exist in Database */
    $setArray=array();
	$setArray["t_users"]=strval(intval($dejsonData[0]->{'t_users'})+1);
	$conditionArray=array();
	$conditionArray["role_Id"]=$role_Id;
	$conditionArray["role_date"]=date("Y-m-d");
	$conditionArray["area"]=$area;
    $r_status1=$roleStatObj->updatedom_role_statData($setArray, $conditionArray);
  } else { /* Not exists in Database */
    $idObj=new identity();
    $rstat_Id=$idObj->role_stat_id();
	$r_status2=$roleStatObj->adddom_role_statData($rstat_Id,$role_Id,$area,date("Y-m-d"),1);
  }
 }
 
 /* TABLE : dom_role_history */
 function update_domrolehistory_join($from_role_Id,$to_role_Id, $user_Id,$joined,$updated) {
 /* FUNCTION DESCRIPTION : This function is used to 
  *                                a) update new joins of a particular role, 
  *							       b) update a user to change his role from one to other
  */
   $idObj=new identity();
   $hisObj=new dom_role_history();
   $hisObj->adddom_role_historyData($idObj->role_history_id(),date("Y-m-d H:i:s"),
                                    $from_role_Id,$to_role_Id,$joined,$updated,$user_Id);
 }
 
}

?>