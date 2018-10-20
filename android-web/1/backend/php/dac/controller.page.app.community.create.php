<?php session_start();

require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../api/app.util.php';
require_once '../dal/data.module.user.friends.php';
require_once '../dal/data.module.app.community.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.page.app.community.create.php");
if(isset($_GET["action"])){
   if($_GET["action"]=='INFO_INVITE_FRNDS'){
      if(isset($_GET["user_Id"]) && isset($_GET["term"]) && isset($_GET["avoid"])) {
		    $term=$_GET["term"];
			$avoid=explode(",",$_GET["avoid"]);
			$user_Id=$_GET["user_Id"];
			$dbObj=new Database();
			$conObj=new user_friends();
			$selectQuery=$conObj->query_invite_frnds($user_Id,$term,$avoid);
			$logger->info("query_invite_frnds: ".$selectQuery);
			$jsonData=$dbObj->getJSONData($selectQuery);
			echo $jsonData;
		  } else {
		      $content='Missing ';
			  if(!isset($_GET["user_Id"])){ $content.='user_Id, '; }
			  if(!isset($_GET["term"])){ $content.='term, '; }
			  if(!isset($_GET["avoid"])){ $content.='avoid, '; }
			  $content=chop($content,", ");
		      echo $content;
		  }
   } 
   else if($_GET["action"]=='COMMUNITY_CREATE_INITIAL'){
     if(isset($_GET["unionName"]) && isset($_GET["user_Id"]) &&  isset($_GET["designation"]) && isset($_GET["unionPic"])
	 && isset($_GET["category"]) && isset($_GET["subcategory"]) && isset($_GET["unionCountry"]) && isset($_GET["unionState"])
	 && isset($_GET["unionLocation"]) && isset($_GET["unionLocality"]) && isset($_GET["unionlangEng"]) 
	 && isset($_GET["unionlangTel"]) && isset($_GET["unionMem"]) && isset($_GET["newsTitle"]) && isset($_GET["newsPic"]) 
	 && isset($_GET["newsShortTitle"]) && isset($_GET["newsDesc"])){
		$idObj=new identity();
		$comObj=new app_community();
		$dbObj=new Database();
		
		$union_Id=$idObj->union_account_id();
		$unionURLName=$union_Id;
		$unionName=$_GET["unionName"];
	    $user_Id=$_GET["user_Id"];
	    $designation=$_GET["designation"];
        $unionPic=$_GET["unionPic"];
	    $domain_Id=$_GET["category"];
	    $subdomain_Id=$_GET["subcategory"];
	    $unionCountry=$_GET["unionCountry"];
	    $unionState=$_GET["unionState"];
	    $unionLocation=$_GET["unionLocation"];
	    $unionLocality=$_GET["unionLocality"];
	    $unionlangEng=$_GET["unionlangEng"];
	    $unionlangTel=$_GET["unionlangTel"];
		
		$request_Id=$idObj->union_mem_id();
	    $unionMem= explode(',', $_GET["unionMem"]);
		
		$info_Id=$idObj->dash_info_union_id();
	    $artTitle=$_GET["newsTitle"];
	    $newsPic=$_GET["newsPic"];
	    $artShrtDesc=$_GET["newsShortTitle"];
	    $artDesc=$_GET["newsDesc"];
	    $status='ACTIVE';
		
		
		/* Create Community */
		$query1=$comObj->query_createUnionAccount($union_Id, $domain_Id, $subdomain_Id, $unionName, $unionURLName, $unionPic,
					$unionLocality, $unionLocation, $unionState, $unionCountry, $user_Id);
		$dbObj->addupdateData($query1);
		
		/* Add Languages to Community */
		$query2=query_addLangToCommunity($union_Id, $unionlangEng, $unionlangTel);
		$dbObj->addupdateData($query2);
		
		/* Add Members to the Community */
		$query3=query_addMemberRequest($request_Id, $union_Id, $user_Id, $unionMem);
		$dbObj->addupdateData($query3);
		
		/* Add First NewsFeed with Community */
		$query4=query_addNewsFeed($info_Id, $union_Id, $artTitle, $artShrtDesc, $artDesc, $newsPic, $status);
		$dbObj->addupdateData($query4);
		
	 } else {
	    $content='Missing ';
		if(!isset($_GET["unionName"])) { $content.='unionName, '; }
		if(!isset($_GET["user_Id"])) {  $content.='user_Id, '; }
		if(!isset($_GET["designation"])) { $content.='designation, '; }
		if(!isset($_GET["unionPic"])) { $content.='unionPic, '; }
		if(!isset($_GET["category"])) { $content.='category, '; }
		if(!isset($_GET["subcategory"])) { $content.='subcategory, '; }
		if(!isset($_GET["unionCountry"])) { $content.='unionCountry, '; }
		if(!isset($_GET["unionState"])) { $content.='unionState, '; }
		if(!isset($_GET["unionLocation"])) { $content.='unionLocation, '; }
		if(!isset($_GET["unionLocality"])) { $content.='unionLocality, '; }
		if(!isset($_GET["unionlangEng"])) { $content.='unionlangEng, '; }
		if(!isset($_GET["unionlangTel"])) { $content.='unionlangTel, ';  }
		if(!isset($_GET["unionMem"])) { $content.='unionMem, '; }
		if(!isset($_GET["newsTitle"])) {  $content.='newsTitle, '; }
		if(!isset($_GET["newsPic"])) { $content.='newsPic, '; }
		if(!isset($_GET["newsShortTitle"])) { $content.='newsShortTitle, '; }
		if(!isset($_GET["newsDesc"])) { $content.='newsDesc, '; }
		$content=chop($content,", ");
		echo $content;
	 }
   }
   else { echo 'INVALID_ACTION_INPUT'; }
} else { echo 'MISSING_ACTION_INPUT'; }

?>