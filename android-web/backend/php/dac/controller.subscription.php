<?php 
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../api/app.util.php';
require_once '../dal/data.subscription.php';
require_once '../dal/data.platform.php';

 if(isset($_GET["action"])) {
   if($_GET["action"]=='CHECK_USER_SUBSCRIPTION'){
      if(isset($_GET["user_Id"])){
	     $user_Id=$_GET["user_Id"];
	     $subObj=new tbl_usersubscription();
	     $selectQuery=$subObj->query_knowUserSubscribedDomain($user_Id);
		 $dbObj=new Database();
		 $jsonData=$dbObj->getJSONData($selectQuery);
		 $dejsonData=json_decode($jsonData);
		 if(count($dejsonData)>0){
		    echo 'USER_SUBSCRIBED';
		 } 
		 else {
		    echo 'USER_UNSUBSCRIBED';
		 }
	  } else {
	     echo 'MISSING_USER_ID';
	  }
      
   }
   else if($_GET["action"]=='LIST_PEOPLE_DOMAIN_SUBSCRIBE'){
     if(isset($_GET["jsonFileURL"])) {
		    $dbObj=new Database();
			$subObj=new tbl_platform();
		    $jsonfileURL=$_GET["jsonFileURL"];
		    $jsonFileData=file_get_contents($jsonfileURL);
		    $dejsonFileData=json_decode($jsonFileData, true);
			$content='{';
			$content.='"data":[';
			for($index=0;$index<count($dejsonFileData["domains"]);$index++){
			  $domain_Id=$dejsonFileData["domains"][$index]["domain_Id"];
			  $domainName=$dejsonFileData["domains"][$index]["domainName"];
			  $selectQuery=$subObj->query_peopleSubscribedDomain($domain_Id);
			  $jsonData=$dbObj->getJSONData($selectQuery);
			  $dejsonData=json_decode($jsonData);
			  $peopleSubscribed='0';
			  if(count($dejsonData)>0){
			    $peopleSubscribed=$dejsonData[0]->{'t_users'};
			  } else { /* Add to dom_info */
			     $pltfrmObj=new tbl_platform();
			     $insertQuery=$pltfrmObj->query_adddom_infoData($domain_Id,0,0,0,0,0,0);
				 $dbObj->addupdateData($insertQuery);
			  }
			  $content.='{';
			  $content.='"domain_Id":"'.$domain_Id.'",';
			  $content.='"domainName":"'.$domainName.'",';
			  $content.='"peopleSubscribed":"'.$peopleSubscribed.'"';
			  $content.='},';
			  
			}
			$content=chop($content,",");
			$content.=']}';
			echo $content;
	 } else {
	   echo 'MISSING_JSON_URL';
	 }
  } 
   else if($_GET["action"]=='GET_DOMAIN_DETAILS'){
       if(isset($_GET["jsonFileURL"])) {
	       if(isset($_GET["req_domain_Id"])){
		    $dbObj=new Database();
			$subObj=new tbl_platform();
		    $jsonfileURL=$_GET["jsonFileURL"];
		    $jsonFileData=file_get_contents($jsonfileURL);
		    $dejsonFileData=json_decode($jsonFileData, true);
			$content='{';
			$content.='"data":[';
			for($index=0;$index<count($dejsonFileData["domains"]);$index++){
			  $req_domain_Id=$_GET["req_domain_Id"];
			  $domain_Id=$dejsonFileData["domains"][$index]["domain_Id"];
			  $domainName=$dejsonFileData["domains"][$index]["domainName"];
			  if($req_domain_Id==$domain_Id) {
					  $selectQuery=$subObj->query_getdom_infoData($domain_Id);
					  $jsonData=$dbObj->getJSONData($selectQuery);
					  $dejsonData=json_decode($jsonData);
					  $t_users=$dejsonData[0]->{'t_users'};
					  $t_unions=$dejsonData[0]->{'t_unions'};
					  $t_move=$dejsonData[0]->{'t_move'};
					  $o_move=$dejsonData[0]->{'o_move'};
					  $c_move=$dejsonData[0]->{'c_move'};
					  $t_signers=$dejsonData[0]->{'t_signers'};
					  $content.='{';
					  $content.='"domain_Id":"'.$domain_Id.'",';
					  $content.='"domainName":"'.$domainName.'",';
					  $content.='"t_users":"'.$t_users.'",';
					  $content.='"t_unions":"'.$t_unions.'",';
					  $content.='"t_move":"'.$t_move.'",';
					  $content.='"o_move":"'.$o_move.'",';
					  $content.='"c_move":"'.$c_move.'",';
					  $content.='"t_signers":"'.$t_signers.'"';
					  $content.='},';
			  }
			  
			}
			$content=chop($content,",");
			$content.=']}';
			echo $content;
		 } else {  echo 'MISSING_REQ_DOMAIN_ID'; }
	 } else { echo 'MISSING_JSON_URL'; }
   }
   else if($_GET["action"]=='LIST_SUBDOMAINS_PEOPLESUBSCRIBED'){
     if(isset($_GET["jsonFileURL"])){
	    $dbObj=new Database();
		$subObj=new tbl_platform();
	    $jsonFileURL=$_GET["jsonFileURL"];
		$jsonFileData=file_get_contents($jsonFileURL);
		$dejsonFileData=json_decode($jsonFileData, true);
	    $content='{';
		$content.='"data":[';
		for($index=0;$index<count($dejsonFileData["subdomains"]);$index++){
			  $subdomain_Id=$dejsonFileData["subdomains"][$index]["subdomain_Id"];
			  $subdomainName=$dejsonFileData["subdomains"][$index]["subdomainName"];
			  $selectQuery=$subObj->query_getdom_infoData($subdomain_Id);
			  $jsonData=$dbObj->getJSONData($selectQuery);
			  $dejsonData=json_decode($jsonData);
			  $t_users=$dejsonData[0]->{'t_users'};
			  $content.='{';
			  $content.='"subdomain_Id":"'.$subdomain_Id.'",';
			  $content.='"subdomainName":"'.$subdomainName.'",';
			  $content.='"t_users":"'.$t_users.'"';
			  $content.='},';
		}
		$content=chop($content,",");
		$content.=']';
		$content.='}';
		echo $content;
	 } else {
	    echo 'MISSING_JSONFILEURL';
	 }
   }
   else {
	   echo 'INVALID_ACTION';
	}
 } else {
    echo 'MISSING_ACTION';
 }
 
?>