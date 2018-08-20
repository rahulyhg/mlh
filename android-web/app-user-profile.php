<?php session_start();
 if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once 'templates/api/api_js.php'; ?>
 <title>User Profile</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-profile-bg-styles.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBLYTwBBtnRDyew0qLZTjCJp0mgR5koP5A"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
<style>
body { background-color:#eee; }
</style>
<script type="text/javascript">
var APP_USERPROFILE_ID='<?php  if(isset($_GET["user_Id"])) { echo $_GET["user_Id"]; } ?>';
$(document).ready(function(){ 
bgstyle();
$(".lang_"+USR_LANG).css('display','block');
  startAppProgressLoader();
  hzTabSelection("usrProfileHzTab");
});
function loadDataofUser(){
 // if(PROFILE_USER_ID==AUTH_USER_ID){  }
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.myprofile.php',
	{ action:'USER_PROFILE_GETBYID', profile_user_Id:PROFILE_USER_ID, user_Id:AUTH_USER_ID, 
	  projectURL:PROJECT_URL, lang:USR_LANG },function(response){
	   stopAppProgressLoader();
       console.log("response:"+response);
	   response=JSON.parse(response);
	   for(var i1=0;i1<response.userProfile.length;i1++){
		var user_Id=response.userProfile[i1].user_Id;
		var username=response.userProfile[i1].username;
		var surName=response.userProfile[i1].surName;
		var name=response.userProfile[i1].name;
		var mcountrycode=response.userProfile[i1].mcountrycode;
		var mobile=response.userProfile[i1].mobile;
		var mob_val=response.userProfile[i1].mob_val;
		var dob=response.userProfile[i1].dob;
		var gender=response.userProfile[i1].gender;
		var profile_pic=response.userProfile[i1].profile_pic;
		var minlocation=response.userProfile[i1].minlocation;
		var location=response.userProfile[i1].location;
		var state=response.userProfile[i1].state;
		var country=response.userProfile[i1].country;
		var created_On=response.userProfile[i1].created_On;
		var isAdmin=response.userProfile[i1].isAdmin;
		var user_tz=response.userProfile[i1].user_tz;
		var acc_active=response.userProfile[i1].acc_active;
		
		var profilepicContent='<img src="'+profile_pic+'" style="width:70px;height:70px;border-radius:50%;background-color:#efefef;"/>';
	    var profileNameContent='<b>'+surName+' '+name+'</b>';
		var profileAreaContent=minlocation+', '+location+',<br/>'+state+', <span style="text-transform:uppercase;">'+country+'</span>';
		document.getElementById("app-user-profilepic").innerHTML=profilepicContent;
		document.getElementById("app-user-title").innerHTML=profileNameContent;
		document.getElementById("app-user-area").innerHTML=profileAreaContent;
	  }
	  var profileType=response.profileType;
	  if(profileType==='OWN'){ $('#app-profile-my').removeClass('hide-block'); }
	  else if(profileType==='FRIEND'){ $('#app-profile-frnd').removeClass('hide-block'); }
	  else if(profileType==='OTHER'){ $('#app-profile-unknown').removeClass('hide-block'); }
	  var userSubscription=response.userSubscription;
	  // var content='<div class="col-xs-12 pad0">';
		 var content='<div class="list-group mbot15p">';
      for(var i1=0;i1<userSubscription.length;i1++){
	     var domain_Id=userSubscription[i1].domain_Id;
		 var domainName=userSubscription[i1].domainName;
		 var subdomainList=userSubscription[i1].subdomainList;
		 content+='<div class="list-group-item pad0">';
		 content+='<div class="container-fluid pad0" style="border-bottom:2px solid #000;">';
		 
		 
		 content+='<div align="center" class="col-xs-1" style="padding:10px;">';
		 content+='<div class="dropdown">';
		 content+='<i class="fa fa-cog dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>';
		 content+='<ul class="dropdown-menu">';
		 content+='<li><a href="#">UnSubscribe</a></li>';
		 content+='</ul>';
		 content+='</div>';
		 content+='</div>';
		 
		 content+='<div class="col-xs-10" style="padding:10px;">';
		 content+='<b>'+domainName+'</b>';
		 content+='</div>';

		 content+='</div>';
		 content+='</div>';
		 for(var i2=0;i2<subdomainList.length;i2++){
			var subdomain_Id=subdomainList[i2].subdomain_Id;
			var subdomainName=subdomainList[i2].subdomainName;
			content+='<div class="list-group-item pad0">';
			content+='<div class="container-fluid pad0">';
			
			content+='<div align="center" class="col-xs-1" style="padding:10px;">';
			content+='<div class="dropdown">';
			content+='<i class="fa fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>';
			content+='<ul class="dropdown-menu">';
			content+='<li><a href="#">UnSubscribe</a></li>';
			content+='</ul>';
			content+='</div>';
			content+='</div>';
			
			content+='<div class="col-xs-10" style="padding:10px;">';
			content+='<b>'+subdomainName+'</b>';
			content+='</div>';
			content+='<div class="col-xs-12" style="padding:10px;">';
			content+='<div class="pull-right" style="color:#008000;">';
			content+='<i class="fa fa-check" aria-hidden="true"></i>&nbsp;<b>Subscribed</b>';
			content+='</div>';
			content+='</div>';
			content+='</div>';
			content+='</div>';
		 }
		 content+='</div>';
       //  content+='</div>';
		document.getElementById("usrSubscriptionPeopleDisplayDivision").innerHTML=content;
	  }
	   
    });
}
function hzTabSelection(id){     
 var arryHzTab=["usrProfileHzTab","usrSubscriptionHzTab","usrFriendsHzTab","usrCommunityHzTab","usrMovementHzTab"];
 var arryTabDataViewer=["usrProfileDisplayDivision","usrSubscriptionDisplayDivision","usrFriendsDisplayDivision","usrCommunityDisplayDivision","usrMovementDisplayDivision"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer);
}
</script>
</head>
<body>
  <?php include_once 'templates/api/api_loading.php'; ?>
  <?php include_once 'templates/api/api_header_simple.php'; ?>
	  <div id="app-page-content pad0">
	   <!-- AppBody Content -->
	   <?php include_once 'templates/api/api_progressbar.php'; ?>
	   
	   <div id="app-actual-content" class="hide-block">
		<div class="container-fluid">
		   <div class="scroller-divison row white-bg">
		    <div class="scroller scroller-left col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-left"></i>
			</div>
			<div class="scrollTabwrapper col-xs-10">
				<ul class="nav nav-tabs scrollTablist" id="myTab" style="border-bottom:0px;">
				  <li><a id="usrProfileHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>User Profile</b></a></li>
				  <li><a id="usrSubscriptionHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>User Subscriptions</b></a></li>
				  <li><a id="usrFriendsHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>User Friends</b></a></li>
				  <li><a id="usrCommunityHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Community</b></a></li>
				  <li><a id="usrMovementHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Movements</b></a></li>
				</ul>
			</div>
			<div class="scroller scroller-right col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-right"></i>
			</div>
		   </div>
		</div>
		
		<div id="usrProfileDisplayDivision" class="container-fluid mtop15p mbot15p hide-block">
		  <?php include_once 'templates/pages/app-user-profile/user-profile.php'; ?>
		</div>
		<div id="usrSubscriptionDisplayDivision" class="container-fluid mtop15p mbot15p hide-block">
		User Subscription
		</div>
		<div id="usrFriendsDisplayDivision" class="container-fluid mtop15p mbot15p hide-block">
		User Friends
		</div>
		<div id="usrCommunityDisplayDivision" class="container-fluid mtop15p hide-block">
		User Community
		</div>
		<div id="usrMovementDisplayDivision" class="container-fluid mtop15p hide-block">
		User Movement
		</div>
		
	   </div>
	</div>
 
		
  <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>