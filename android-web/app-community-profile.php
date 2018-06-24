<?php session_start();
  if(isset($_SESSION["AUTH_USER_ID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Create Community</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/jquery-ui.css"> 
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/core-skeleton.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery-ui.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <?php include_once 'templates/api/api_js.php'; ?>
 <?php include_once 'templates/api/api_params.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-create-bg-styles.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 <style>
 body { background-color:#f5f5f5; }
.pad0 { padding:0px; }
.mtop5p { margin-top: 5px; }
.mtop10p { margin-top:10px; }
.mtop15p { margin-top:15px; }
.mbot5p { margin-bottom:5px; }
.mbot10p { margin-bottom:10px; }
.mbot15p { margin-bottom:15px; }
</style>
<script type="text/javascript">
function hzTabSelection(id){
 var arryHzTab=["searchPeopleHzTab","searchNewsFeedHzTab","searchCommunityHzTab","searchMovementHzTab"];
 var arryTabDataViewer=["searchPeopleDisplayDivision","searchNewsFeedDisplayDivision","searchCommunityDisplayDivision","searchMovementDisplayDivision"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer);
}
$(document).ready(function(){
sideWrapperToggle();
bgstyle();
mainMenuSelection("dn_"+USR_LANG+"_mycommunity");
hzTabSelection('searchPeopleHzTab');
$(".lang_"+USR_LANG).css('display','block');
var union_Id='<?php if(isset($_GET["1"])){ echo $_GET["1"]; }?>';
loadCommunityData(union_Id);
});
function loadCommunityData(union_Id){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.php',
{ action:'GETDATA_PROFESSIONAL_COMMUNITY', union_Id:union_Id },function(response){
  console.log(response);
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
  document.getElementById("communityProfilePicDiv").innerHTML='<img src="'+profile_pic+'" style="width:70px;height:70px;border-radius:50%;background-color:#efefef;"/>';
});
}

function invoke_requestBranchModal(){
$('#requestBranchModal').modal();
}
function invoke_joinAsMemberModal(){
$('#joinAsMemberModal').modal();
}
</script>
</head>
<body>
<!-- Join As a Member Modal -->
<div id="joinAsMemberModal" class="modal fade" role="dialog">
<div class="modal-dialog"><!-- Modal content-->
<div class="modal-content">
<div class="modal-body">
<div class="container-fluid mbot15p pad0">
<div class="col-xs-12">
 <button type="button" class="close" data-dismiss="modal">&times;</button>
 <h5 style="text-transform:uppercase;"><b>Request to Join As a Member</b></h5><hr/>
</div>
<div class="col-xs-12">
  <div class="form-group">
    <label>Country</label>
    <select class="form-control">
      <option value="">Select your Country</option>
    </select>
  </div>
</div>
<div class="col-xs-12">
  <div class="form-group">
    <label>State</label>
    <select class="form-control">
        <option value="">Select your State</option>
    </select>
  </div>
</div>

<div class="col-xs-12">
<div class="form-group">
<label>Location</label>
<select class="form-control">
<option value="">Select your Location</option>
</select>
</div>
</div>

<div class="col-xs-12">
<div class="form-group">
<label>Locality</label>
<select class="form-control">
<option value="">Select your Locality</option>
</select>
</div>
</div>

<div class="col-xs-12 mtop15p mbot15p">
<div class="col-xs-9 pad0">
<label>
Share your details to Owner of the Community to contact you
</label>
</div>

<div class="col-xs-2">
<input type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No">
</div>

</div>

<div class="col-xs-12">
<button class="btn btn-primary form-control"><b>Request Local Branch</b></button>
</div>

</div>

</div>
</div>
</div>
</div>

<div id="requestBranchModal" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-body">

<div class="container-fluid mbot15p pad0">

<div class="col-xs-12">
 <button type="button" class="close" data-dismiss="modal">&times;</button>
<h5 style="text-transform:uppercase;"><b>Request a Local Branch</b></h5><hr/>
</div>

<div class="col-xs-12">
<div class="form-group">
<label>Country</label>
<select class="form-control">
<option value="">Select your Country</option>
</select>
</div>
</div>

<div class="col-xs-12">
<div class="form-group">
<label>State</label>
<select class="form-control">
<option value="">Select your State</option>
</select>
</div>
</div>

<div class="col-xs-12">
<div class="form-group">
<label>Location</label>
<select class="form-control">
<option value="">Select your Location</option>
</select>
</div>
</div>

<div class="col-xs-12">
<div class="form-group">
<label>Locality</label>
<select class="form-control">
<option value="">Select your Locality</option>
</select>
</div>
</div>

<div class="col-xs-12 mtop15p mbot15p">
<div class="col-xs-9 pad0">
<label>
Share your details to Owner of the Community to contact you
</label>
</div>

<div class="col-xs-2">
<input type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No">
</div>

</div>

<div class="col-xs-12">
<button class="btn btn-primary form-control"><b>Request Local Branch</b></button>
</div>

</div>

</div>
</div>
</div>
</div>

 <?php include_once 'templates/api/api_loading.php'; ?>
 <div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	<div id="sidebar-wrapper">
	  <?php include_once 'templates/api/api_sidewrapper.php'; ?>
	</div>
    <div id="page-content-wrapper">
	  <?php include_once 'templates/api/api_header_other.php'; ?>
	  <div id="app-page-content">
	  
	    <div class="container-fluid">
		   <div class="scroller-divison row">
		    <div class="scroller scroller-left col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-left"></i>
			</div>

			<div class="scrollTabwrapper col-xs-10">
				<ul class="nav scrollTablist" id="myTab" style="border-bottom:0px;">
					<li><a id="searchPeopleHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>People</b></a></li>
					<li><a id="searchNewsFeedHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>NewsFeed</b></a></li>
					<li><a id="searchCommunityHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Community</b></a></li>
					<li><a id="searchMovementHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Movements</b></a></li>
				</ul>
			</div>
			<div class="scroller scroller-right col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-right"></i>
			</div>
		  </div>
		</div>
		
		<!-- app-page-content :: Start -->
		<div class="container-fluid mtop15p">
			<div id="communityProfilePicDiv" class="col-xs-3">
				<div ></div>
			</div>
<div align="center" class="col-xs-9">
<h5 style="line-height:18px;">Telangana Owners and Drivers Association</h5>
 <div>Kukatpally, Hyderabad,<br/> Telangana, INDIA</div>
</div>

<div class="col-xs-12 mtop15p">
<div class="btn-group pull-right">
<button class="btn btn-default"><b>Edit Profile</b></button>
<button class="btn btn-default"><b>Write NewsFeed</b></button>
<button class="btn btn-default"><i class="fa fa-cog"></i></button>
</div>
</div>

<div class="col-xs-12 mtop15p">
<div class="btn-group pull-right">
<button class="btn btn-default" onclick="javascript:invoke_joinAsMemberModal();"><b>Join As Member</b></button>
<button class="btn btn-default"><b>Add My Support</b></button>
</div>
</div>

<div class="col-xs-12 mtop15p">
 <button class="btn btn-default pull-right" onclick="javascript:invoke_requestBranchModal();"><b>Request Local Branch</b></button>
</div>

<div class="col-xs-12"><hr/></div>

<div class="col-xs-12">

<div align="center" class="col-xs-4" style="border-right:1px solid #ccc;">
<span style="font-size:12px;"><b>FRIENDS<br/>CIRCLE</b></span>
<span>10000</span>
</div>

<div align="center" class="col-xs-4" style="border-right:1px solid #ccc;">
<span style="font-size:12px;"><b>COMMUNITY<br/>JOINED</b></span>
<span>10000</span>
</div>

<div align="center" class="col-xs-4">
<span style="font-size:12px;"><b>MOVEMENT<br/>JOINED</b></span>
<span>10000</span>
</div>

</div>

<div class="col-xs-12"><hr/></div>

<div class="col-xs-12">
<div class="list-group">

<div class="list-group-item pad0">

<div class="container-fluid pad0">
<div class="col-xs-12" style="border-bottom:2px solid #000;">
<h5><b>List of Branches</b></h5>
</div>
</div>

</div>

<div class="list-group-item pad0">
<div class="container-fluid pad0">
<div class="col-xs-7">
<div class="mtop5p">
<span class="label label-primary">MAIN BRANCH</span>
</div>
<div class="mtop5p">
Kukatpally, Hyderabad, Telangana, INDIA
</div>
</div>
<div align="center" class="col-xs-5">
<h5><b>MEMBERS</b></h5>
<h3><b>1000000</b></h3>
</div>
</div>
</div>

</div>
</div>


</body>

		<!-- app-page-content :: End -->
	  </div>
	</div>
 </div>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php }?>