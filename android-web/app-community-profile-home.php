<?php session_start();
include_once 'templates/api/api_params.php';
if(isset($_SESSION["AUTH_USER_ID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>View Community</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/jquery-ui.css"> 
 <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/easy-autocomplete.min.css"/>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/core-skeleton.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery-ui.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.easy-autocomplete.min.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <?php include_once 'templates/api/api_js.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-profile-home-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 <style>
.pad0 { padding:0px; }
.mtop5p { margin-top: 5px; }
.mtop10p { margin-top:10px; }
.mtop15p { margin-top:15px; }
.mbot5p { margin-bottom:5px; }
.mbot10p { margin-bottom:10px; }
.mbot15p { margin-bottom:15px; }
</style>
<script type="text/javascript">
var PAGE_LOAD='<?php if(isset($_GET["1"])){ echo $_GET["1"]; }?>';
var UNION_ID='<?php if(isset($_GET["2"])){ echo $_GET["2"]; }?>';
$(document).ready(function(){
bgstyle(3);
$(".lang_"+USR_LANG).css('display','block');
generateTabList();
if(PAGE_LOAD==='viewprofile'){ hzTabSelection('communityProfileHzTab','-80'); }
autocomplete_load_branches();
// loadCommunity_profile(union_Id);
loadCommunity_newsFeed();
loadCommunity_movement();
});
function loadCommunity_newsFeed(){
var param_domainName="IT AND SOFTWARE";
var param_subdomainName="Social Network";
var param_images="https://res.cloudinary.com/dbcyhclaw/image/upload/x_856,y_436,w_208,h_208,z_0.4315,c_crop/v1529503339/Screenshot_20180619-135815_osobbt.png";
var param_artTitle="SampleNews";
var param_artShrtDesc="Sample";
var param_infoId="UAI1234566777";
var param_newsType="UNION";
var param_createdOn="22 November 2018, Thursday";
var content=uiTemplate_simpleNewsFeedDisplay(param_domainName, param_subdomainName, param_images, param_artTitle, 
  param_artShrtDesc, param_infoId, param_newsType, param_createdOn);
 document.getElementById("communityNewsFeedDisplayDivision").innerHTML=content;
}
function loadCommunity_movement(){
 var content=uiTemplate_simpleMovementDisplay();
 document.getElementById("communityMovementsDisplayDivision").innerHTML=content;
}
function loadCommunity_profile(union_Id){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.php',
{ action:'GETDATA_PROFESSIONAL_COMMUNITY', union_Id:union_Id },function(response){
  console.log("response: "+response);
  response=JSON.parse(response);
  var domain_Id=response[0].domain_Id;
  var domainName=response[0].domainName;
  var subdomain_Id=response[0].subdomain_Id;
  var subdomainName=response[0].subdomainName;
  var union_Id=response[0].union_Id;
  var main_branch_Id=response[0].main_branch_Id;
  var unionName=response[0].unionName;
  var unionURLName=response[0].unionURLName;
  var profile_pic=response[0].profile_pic;
  var created_On=response[0].created_On;
  var admin_Id=response[0].admin_Id;
  var minlocation=response[0].minlocation;
  var location=response[0].location;
  var state=response[0].state;
  var country=response[0].country;
  var admin_username=response[0].admin_username;
  var admin_surName=response[0].admin_surName;
  var admin_name=response[0].admin_name;
  var admin_profilepic=response[0].admin_profilepic;
  var admin_minlocation=response[0].admin_minlocation;
  var admin_location=response[0].admin_location;
  var admin_state=response[0].admin_state;
  var admin_country=response[0].admin_country;
  var noOfBranches=response[0].noOfBranches;
  var noOfMembers=response[0].noOfMembers;
  var noOfSupporters=response[0].noOfSupporters;
  document.getElementById("communityProfilePicDiv").innerHTML='<img src="'+profile_pic+'" style="margin-top:15px;width:70px;height:70px;border-radius:50%;background-color:#efefef;"/>';
});
}

function generateTabList(){ 
 var content='<ul class="nav scrollTablist" id="communityProfileTab" style="border-bottom:0px;">';
	 content+='<li><a id="communityDashboardHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Member Dashboard</b></a></li>';
	 content+='<li><a id="communityProfileHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Community Profile</b></a></li>';
	 content+='<li><a id="communityBranchHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Branches</b></a></li>';
	 content+='<li><a id="communityNewsFeedHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>NewsFeed</b></a></li>';
	 content+='<li><a id="communityMovementsHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Movements</b></a></li>';
	 content+='<li><a id="communityMembersHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Members</b></a></li>';
	 content+='<li><a id="communitySupportersHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Subscribers</b></a></li>';
	 content+='<li><a id="communityPermissionsHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Permissions</b></a></li>';
	 content+='</ul>'; 
  document.getElementById("communityProfileScrollableTab").innerHTML=content;
}
function hzTabSelection(id,orientation){
 var arryHzTab=["communityMemRequestsHzTab","communityDashboardHzTab","communityProfileHzTab","communityBranchHzTab",
                "communityMemRolesHzTab","communityNewsFeedHzTab","communityMovementsHzTab","communityMembersHzTab",
				"communitySupportersHzTab","communityPermissionsHzTab"];
 var arryTabDataViewer=["communityMemRequestsDisplayDivision","communityDashboardDisplayDivision",
						"communityProfileDisplayDivision","communityBranchDisplayDivision","communityMemRolesDisplayDivision",
						"communityNewsFeedDisplayDivision","communityMovementsDisplayDivision",
						"communityMembersDisplayDivision","communitySupportersDisplayDivision",
						"communityPermissionsDisplayDivision"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer);
 if(orientation.length>0){
   $('#communityProfileTab').css('left',orientation+'px');
 }
 if(id==="communityProfileHzTab"){ menuCommunityProfile("communityProfile_statistics"); } 
}
</script>
</head>
<body>
<!-- Join As a Member Modal -->
<?php include_once 'templates/pages/app-community-profile/community-joinAsMemberModal.php'; ?>
<!-- Request Branch Modal -->
<?php include_once 'templates/pages/app-community-profile/community-requestBranchModal.php'; ?>
<?php include_once 'templates/api/api_loading.php'; ?>
<?php include_once 'templates/api/api_header_simple.php'; ?>
	  <div id="app-page-content">
	  
	    <div class="container-fluid">
		   <div class="scroller-divison row">
	         <div class="scroller scroller-left col-xs-1" style="height:41px;">
				<i class="glyphicon glyphicon-chevron-left"></i>
             </div>
			 <div id="communityProfileScrollableTab" class="scrollTabwrapper col-xs-10">
			 </div>
			 <div class="scroller scroller-right col-xs-1" style="height:41px;">
				<i class="glyphicon glyphicon-chevron-right"></i>
			 </div>
		   </div>
		</div>

		<!-- app-page-content :: Start -->
		<div id="communityMemRequestsDisplayDivision">
		  <?php include_once 'templates/pages/app-community-profile/community-membership-requests.php'; ?>
		</div>
		<div id="communityDashboardDisplayDivision">
		  <?php include_once 'templates/pages/app-community-profile/community-dashboard.php'; ?>
		</div>
		
		<div id="communityProfileDisplayDivision">
		  <?php include_once 'templates/pages/app-community-profile/community-profile.php'; ?>
		</div>
		
		<div id="communityBranchDisplayDivision">
		  <?php include_once 'templates/pages/app-community-profile/community-branches.php'; ?>
		</div>
		
		<div id="communityMemRolesDisplayDivision">
		  <?php include_once 'templates/pages/app-community-profile/community-member-roles.php'; ?>
		</div>
		
		
		<div id="communityNewsFeedDisplayDivision" class="container-fluid mtop15p">NewsFeed</div>
		
		<div id="communityMovementsDisplayDivision" class="container-fluid mtop15p">Movement</div>
		
		<div id="communityMembersDisplayDivision" class="container-fluid mtop15p">
		    
			<div class="list-group">
				  <div class="list-group-item">
			        <div class="container-fluid pad0">
					   <div class="col-xs-3">
					     <img src="https://res.cloudinary.com/dbcyhclaw/image/upload/x_856,y_436,w_208,h_208,z_0.4315,c_crop/v1529503339/Screenshot_20180619-135815_osobbt.png" style="margin-top:15px;width:70px;height:70px;border-radius:50%;background-color:#efefef;">
					   </div>
					   <div align="center" class="col-xs-9">
					      <div><h5><b>SurName Name</b></h5></div>
						  <div><span class="label custom-bg uppercase">Role in the Community</span></div>
						  <div class="mtop15p  ">Minlocation, Location,<br/> State, Country</div>
					   </div>
					</div>
			      </div>
				  <div class="list-group-item">
				    <div class="container-fluid">
					  <div class="col-xs-4  ">
					    <b>Branch Details</b>
					  </div>
					  <div class="col-xs-8  ">
					    Minlocation, Location,<br/> State, Country
					  </div>
					</div>
				  </div>
				  
			   </div>
		
			<div class="list-group mtop15p">
				  <div class="list-group-item">
			        <div class="container-fluid pad0">
					   <div class="col-xs-3">
					     <img src="https://res.cloudinary.com/dbcyhclaw/image/upload/x_856,y_436,w_208,h_208,z_0.4315,c_crop/v1529503339/Screenshot_20180619-135815_osobbt.png" style="margin-top:15px;width:70px;height:70px;border-radius:50%;background-color:#efefef;">
					   </div>
					   <div align="center" class="col-xs-9">
					      <div><h5><b>SurName Name</b></h5></div>
						  <div><span class="label custom-bg uppercase">Role in the Community</span></div>
						  <div class="mtop15p  ">Minlocation, Location,<br/> State, Country</div>
					   </div>
					</div>
			      </div>
				  <div class="list-group-item">
				    <div class="container-fluid">
					  <div class="col-xs-4  ">
					    <b>Branch Details</b>
					  </div>
					  <div class="col-xs-8  ">
					    Minlocation, Location,<br/> State, Country
					  </div>
					</div>
				  </div>
				  
			</div>
		
		</div>
		
		<div id="communitySupportersDisplayDivision" class="container-fluid mtop15p">
		    
			<div class="list-group">
				  <div class="list-group-item">
			        <div class="container-fluid pad0">
					   <div class="col-xs-3">
					     <img src="https://res.cloudinary.com/dbcyhclaw/image/upload/x_856,y_436,w_208,h_208,z_0.4315,c_crop/v1529503339/Screenshot_20180619-135815_osobbt.png" style="margin-top:15px;width:70px;height:70px;border-radius:50%;background-color:#efefef;">
					   </div>
					   <div align="center" class="col-xs-9">
					      <div><h5><b>SurName Name</b></h5></div>
						  <div class="mtop15p  ">Minlocation, Location,<br/> State, Country</div>
					   </div>
					</div>
			      </div>
			   </div>
		
			<div class="list-group mtop15p">
				  <div class="list-group-item">
			        <div class="container-fluid pad0">
					   <div class="col-xs-3">
					     <img src="https://res.cloudinary.com/dbcyhclaw/image/upload/x_856,y_436,w_208,h_208,z_0.4315,c_crop/v1529503339/Screenshot_20180619-135815_osobbt.png" style="margin-top:15px;width:70px;height:70px;border-radius:50%;background-color:#efefef;">
					   </div>
					   <div align="center" class="col-xs-9">
					      <div><h5><b>SurName Name</b></h5></div>
						  <div class="mtop15p  ">Minlocation, Location,<br/> State, Country</div>
					   </div>
					</div>
			      </div>
			</div>
		
		</div>
		<!-- app-page-content :: End -->
	 
	    <div id="communityPermissionsDisplayDivision" class="container-fluid mtop15p"></div>
	 </div>

 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>