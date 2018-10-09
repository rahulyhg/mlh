<?php 
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.community.professional.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.community.professional.branch.php");

if(isset($_GET["action"])){
 if($_GET["action"]==='CREATE_PROFESSIONAL_BRANCH'){
   if(isset($_GET["country"]) && isset($_GET["state"]) && isset($_GET["location"]) && isset($_GET["minlocation"])
    && isset($_GET["roleInfo"]) && isset($_GET["members"])){
    $country = $_GET["country"];
	$state = $_GET["state"];
	$location = $_GET["location"];
	$minlocation = $_GET["minlocation"];
	$roleInfo = $_GET["roleInfo"];
	$members = $_GET["members"];
	/*
	Array (
    [UPRO133488394171279327628] => Array
        (
            [roleName] => President
            [createABranch] => Y
            [updateBranchInfo] => Y
            [deleteBranch] => Y
            [shiftMainBranch] => Y
        )

)
	*/
	print_r($roleInfo);
	/*
	Array
(
    [USR473525687856] => Array
        (
            [member_Id] => USR473525687856
            [role_Id] => UPRO485745899532176921994
            [roleName] => UPRO133488394171279327628
        )

    [USR255798352927] => Array
        (
            [member_Id] => USR255798352927
            [role_Id] => UPRO326933717371825816216
            [roleName] => UPRO133488394171279327628
        )

)
	*/
	print_r($members);
   } 
   else { 
    $content='Missing';
    if(!isset($_GET["country"])){ $content.=' country,'; }
	if(!isset($_GET["state"])){ $content.=' state,'; }
	if(!isset($_GET["location"])){ $content.=' location,'; }
	if(!isset($_GET["minlocation"])){ $content.=' minlocation,'; }
    if(!isset($_GET["roleInfo"])){ $content.=' roleInfo,'; }
	if(!isset($_GET["members"])){ $content.=' members,'; }
	$content=chop($content,',');
	echo $content;
   }
 }
 else { echo 'NO_ACTION'; }
}
else { echo 'MISSING_ACTION'; }
?>