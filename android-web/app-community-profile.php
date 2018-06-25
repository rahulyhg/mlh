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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
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
 var arryHzTab=["communityProfileHzTab","communityBranchHzTab","communityNewsFeedHzTab","communityMovementsHzTab",
				"communityMembersHzTab","communitySupportersHzTab"];
 var arryTabDataViewer=["communityProfileDisplayDivision","communityBranchDisplayDivision","communityNewsFeedDisplayDivision",
						"communityMovementsDisplayDivision","communityMembersDisplayDivision","communitySupportersDisplayDivision"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer);
}
$(document).ready(function(){
sideWrapperToggle();
bgstyle();
mainMenuSelection("dn_"+USR_LANG+"_mycommunity");
$(".lang_"+USR_LANG).css('display','block');
var union_Id='<?php if(isset($_GET["1"])){ echo $_GET["1"]; }?>';
generateTabList();
hzTabSelection('communityProfileHzTab');
loadCommunity_profile(union_Id);
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
  document.getElementById("communityProfilePicDiv").innerHTML='<img src="'+profile_pic+'" style="margin-top:15px;width:70px;height:70px;border-radius:50%;background-color:#efefef;"/>';
});
}

function invoke_requestBranchModal(){
$('#requestBranchModal').modal();
}
function invoke_joinAsMemberModal(){
$('#joinAsMemberModal').modal();
}

function generateTabList(){
 
var	 content='<ul class="nav scrollTablist" id="myTab" style="border-bottom:0px;">';
	 content+='<li><a id="communityProfileHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Profile</b></a></li>';
	 content+='<li><a id="communityBranchHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Branches</b></a></li>';
	 content+='<li><a id="communityNewsFeedHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>NewsFeed</b></a></li>';
	 content+='<li><a id="communityMovementsHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Movements</b></a></li>';
	 content+='<li><a id="communityMembersHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Members</b></a></li>';
	 content+='<li><a id="communitySupportersHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Subscribers</b></a></li>';
	 content+='</ul>';
	 
  document.getElementById("communityProfileScrollableTab").innerHTML=content;
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
				 <label>Share your details to Owner of the Community to contact you</label>
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
<label>Share your details to Owner of the Community to contact you</label>
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
			 <div id="communityProfileScrollableTab" class="scrollTabwrapper col-xs-10">
			 </div>
			 <div class="scroller scroller-right col-xs-1" style="height:41px;">
				<i class="glyphicon glyphicon-chevron-right"></i>
			 </div>
		   </div>
		</div>

		<!-- app-page-content :: Start -->
		<div id="communityProfileDisplayDivision">
		<div class="container-fluid mtop15p">
		    <div class="" style="margin-bottom:15px;text-transform:uppercase;">
				<span class="label custom-bg">IT and Software</span>&nbsp;<b>/</b>&nbsp;<span class="label custom-bg">Social Network</span>
			</div>
			<div id="communityProfilePicDiv" class="col-xs-3">
			   <img src="https://res.cloudinary.com/dbcyhclaw/image/upload/x_856,y_436,w_208,h_208,z_0.4315,c_crop/v1529503339/Screenshot_20180619-135815_osobbt.png" style="margin-top:15px;width:70px;height:70px;border-radius:50%;background-color:#efefef;">
			</div>
			<div align="center" class="col-xs-9 pad0">
			  <div class="col-xs-12 pad0">
				<h4 style="line-height:28px;"><b>Telangana Owners and Drivers Association</b></h4>
			  </div>
			  <div class="col-xs-12 pad0" style="font-size:16px;">Kukatpally, Hyderabad,<br/> Telangana, INDIA</div>
			</div>

			<div class="col-xs-12 pad0 mtop15p">
			<div class="btn-group pull-right">
			<button class="btn btn-default"><b>Edit Profile</b></button>
			<button class="btn btn-default"><b>Write NewsFeed</b></button>
			<button class="btn btn-default"><i class="fa fa-cog"></i></button>
			</div>
			</div>

			<div class="col-xs-12 pad0 mtop15p">
			<div class="btn-group pull-right">
			<button class="btn btn-default pull-right" onclick="javascript:invoke_requestBranchModal();"><b>Request Local Branch</b></button>
			<button class="btn btn-default" onclick="javascript:invoke_joinAsMemberModal();"><b>Join As Member</b></button>
			</div>
			</div>
		</div>
		<div class="container-fluid mtop15p pad0">
			<div class="col-xs-12 pad0">
				<div class="list-group">
					<div class="list-group-item" style="border-bottom:3px solid #000;"><h5><b>About Community</b></h5></div>
					<div class="list-group-item">
					  <div class="fs16">
					  Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. 
					  Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh.
					  Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. 
					  Vestibulum a velit eu ante scelerisque vulputate.
					  </div>
					</div>
					<div class="list-group-item">
					  <div class="container-fluid pad0">
						<div class="col-xs-12 pad0">
					       <button class="btn btn-default pull-right"><span class="fs14"><b>Subscribe to Community</b></span></button>
						</div>
					  </div>
					</div>
				</div>
			</div>
<script	type="text/javascript">
$(document).ready(function(){
 menuCommunityProfile("communityProfile_statistics");
});
function menuCommunityProfile(id){
 var arry_Id=["communityProfile_statistics","communityProfile_comOwners"];
 var arry_Id_content=["communityProfile_statistics_content","communityProfile_comOwners_content"];
 for(var index=0;index<arry_Id.length;index++){
   if(id===arry_Id[index]){
     $('#'+arry_Id[index]).css('color',CURRENT_DARK_COLOR);
     $('#'+arry_Id[index]).css('border-bottom','2px solid '+CURRENT_DARK_COLOR);
	 if($('#'+arry_Id_content[index]).hasClass('hide-block')) { 
	    $('#'+arry_Id_content[index]).removeClass('hide-block'); 
	 }
   } else {
     $('#'+arry_Id[index]).css('color','#000');
     $('#'+arry_Id[index]).css('border-bottom','0px');
	 if(!$('#'+arry_Id_content[index]).hasClass('hide-block')) { 
	    $('#'+arry_Id_content[index]).addClass('hide-block'); 
	 }
   }
 }
}
</script>	 <div class="col-xs-12 pad0">
				<div class="list-group">	
					<div class="list-group-item" style="box-shadow:1px 1px 1px 1px #dedcdc;">
					   <div align="center" class="container-fluid">
					      <div class="col-xs-4 fs16">
						    <span id="communityProfile_statistics" class="padbot10" onclick="javascript:menuCommunityProfile(this.id);"><b>Statistics</b></span>
						  </div>
						  <div class="col-xs-8 fs16">
							<span id="communityProfile_comOwners" class="padbot10" onclick="javascript:menuCommunityProfile(this.id);"><b>Community Owners</b></span>
						  </div>
					   </div>
					</div>
				</div>
			</div>

			<div id="communityProfile_statistics_content" class="col-xs-12 hide-block">
			  <div class="list-group">
				<div class="list-group-item pad0">
				  <div class="container-fluid pad0">
			      <div class="col-xs-12">
				    <span class="pull-right">
				    <span class="fs36"><b>10000</b></span>&nbsp;&nbsp;<span class="fs24 uppercase"><b>Branches</b></span>
					</span>
				  </div>
				  </div>
				</div>
			  </div>
			  
			  <div class="list-group">
				<div class="list-group-item pad0">
				  <div class="container-fluid pad0">
				    <div class="col-xs-12">
					   <span class="pull-left">
			             <span class="fs36"><b>10000</b></span>&nbsp;&nbsp;<span class="fs24 uppercase"><b>Members</b></span>
					   </span>
				    </div>
				  </div>
				</div>
			  </div>
			  
			  <div class="list-group">
				<div class="list-group-item pad0">
				  <div class="container-fluid pad0">
				    <div class="col-xs-12">
					   <span class="pull-right">
			               <span class="fs36"><b>10000</b></span>&nbsp;&nbsp;<span class="fs24 uppercase"><b>Subscriptions</b></span>
					   </span>
					</div>
				  </div>  
				</div>
			   </div>
			   
			   <div class="list-group">
				<div class="list-group-item pad0">
				  <div class="container-fluid pad0">
				    <div class="col-xs-12">
					   <span class="pull-left">
			               <span class="fs36"><b>10000</b></span>&nbsp;&nbsp;<span class="fs24 uppercase"><b>Movement</b></span>
					   </span>
					</div>
				  </div>  
				</div>
			   </div>

			</div>

			<div id="communityProfile_comOwners_content" class="col-xs-12 hide-block">
			   <div class="list-group">
				  <div class="list-group-item">
			        <div class="container-fluid pad0">
					   <div class="col-xs-12 pad0"><span class="label custom-bg uppercase">Community Creator</span></div>
					   <div class="col-xs-3">
					     <img src="https://res.cloudinary.com/dbcyhclaw/image/upload/x_856,y_436,w_208,h_208,z_0.4315,c_crop/v1529503339/Screenshot_20180619-135815_osobbt.png" style="margin-top:15px;width:70px;height:70px;border-radius:50%;background-color:#efefef;">
					   </div>
					   <div align="center" class="col-xs-9">
					      <div><h4><b>SurName Name</b></h4></div>
						  <div><span class="label custom-bg uppercase">Role in the Community</span></div>
						  <div class="mtop15p fs16">Minlocation, Location,<br/> State, Country</div>
					   </div>
					</div>
			      </div>
			   </div>
			</div>
			
		</div>
		</div>
		
		<div id="communityBranchDisplayDivision" class="container-fluid mtop15p">
		  <div class="col-xs-12">
			<div class="list-group">
			<div class="list-group-item pad0">
			<div class="container-fluid mtop15p pad0">
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
					      <div><h4><b>SurName Name</b></h4></div>
						  <div><span class="label custom-bg uppercase">Role in the Community</span></div>
						  <div class="mtop15p fs16">Minlocation, Location,<br/> State, Country</div>
					   </div>
					</div>
			      </div>
				  <div class="list-group-item">
				    <div class="container-fluid">
					  <div class="col-xs-4 fs16">
					    <b>Branch Details</b>
					  </div>
					  <div class="col-xs-8 fs16">
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
					      <div><h4><b>SurName Name</b></h4></div>
						  <div><span class="label custom-bg uppercase">Role in the Community</span></div>
						  <div class="mtop15p fs16">Minlocation, Location,<br/> State, Country</div>
					   </div>
					</div>
			      </div>
				  <div class="list-group-item">
				    <div class="container-fluid">
					  <div class="col-xs-4 fs16">
					    <b>Branch Details</b>
					  </div>
					  <div class="col-xs-8 fs16">
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
					      <div><h4><b>SurName Name</b></h4></div>
						  <div class="mtop15p fs16">Minlocation, Location,<br/> State, Country</div>
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
					      <div><h4><b>SurName Name</b></h4></div>
						  <div class="mtop15p fs16">Minlocation, Location,<br/> State, Country</div>
					   </div>
					</div>
			      </div>
			</div>
		
		</div>
		<!-- app-page-content :: End -->
	  </div>
	</div>
 </div>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php }?>