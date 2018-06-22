<?php session_start();
if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once 'templates/api/api_js.php'; ?>
 <title>NewsFeed</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-notifications-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-notifications.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <?php include_once 'templates/api/api_params.php'; ?>
<style>
body{ background-color:#f1eded; }
.custom-lgt-bg2 { background-color:#d9edf7;color:#000; }
.mtop15p { margin-top:15px; }
.mbot15p { margin-bottom:15px; }
.pad0 { padding:0px; }
.pad5 { padding:5px; }
.f12 { font-size:12px; }
.f24 { font-size:24px; }
.fa-icon-circle1 { border:3px solid #fff;padding:10px;border-radius:50%; }
.fa-icon-circle2 { border:2px solid #000;border-radius:50%;padding-right:12px;padding-left:12px;padding-top:7px;padding-bottom:7px; }
.fa-icon-circle3 { border:2px solid #000;border-radius:50%;padding:10px;padding-left:10px; }
.fa-icon-circle4 { border:2px solid #000;border-radius:50%;padding:7px; }
.fa-icon-circle5 { border:2px solid #000;border-radius:50%;padding-right:12px;padding-left:12px;padding-top:10px;padding-bottom:10px; }
.fa-notification-icon { font-size:18px;border:1px solid #2196F3;border-radius:50%;padding:5px;background-color:#2196F3;color:#fff; }
.notification-title { color:#2196F3;font-weight:bold; }
.notification-silver { color:#73879C; }
.list-group { margin-bottom:0px; }
.img-min-profilepic { margin-top:4%;margin-bottom:4%;width:70px;height:70px;border-radius:50%;border:px solid #fff; }
</style>
<script type="text/javascript">
$(document).ready(function(){ 
notifyPageLoader();
load_notify_overview();
load_notify_peopleRequests();
load_notify_communityRequests();
 });
function notifyPageLoader(){
 var notifyAction='<?php if(isset($_GET["notifyAction"])){ echo $_GET["notifyAction"]; } ?>';
 if(notifyAction==='NOTIFY_REQUEST_PEOPLE'){
    hzTabSelection('notifyRequestsHzTab');
	sel_notify_reqMenu('notify-reqMenu-People');
 } else if(notifyAction==='NOTIFY_REQUEST_COMMUNITY'){
    hzTabSelection('notifyRequestsHzTab');
	sel_notify_reqMenu('notify-reqMenu-Community');
 } else if(notifyAction==='NOTIFY_NEWSFEED'){
    hzTabSelection('notifyNewsHzTab');
 } else if(notifyAction==='NOTIFY_MOVEMENT'){
    hzTabSelection('notifyMovementsHzTab');
 } else {  hzTabSelection('notifyOverviewHzTab'); }
}
function hzTabSelection(id){
 var arryHzTab=["notifyOverviewHzTab","notifyRequestsHzTab","notifyNewsHzTab","notifyMovementsHzTab"];
 var arryTabDataViewer=["notifyOverviewDisplayDivision","notifyRequestsDisplayDivision","notifyNewsDisplayDivision","notifyMovementsDisplayDivision"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer);
 if(id==='notifyOverviewHzTab'){ 
    document.getElementById("notify-menu-title").innerHTML='Overview';
 } else if(id==='notifyRequestsHzTab'){ 
    document.getElementById("notify-menu-title").innerHTML='Requests'; 
	sel_notify_reqMenu("notify-reqMenu-People");
 } else if(id==='notifyNewsHzTab'){ 
    document.getElementById("notify-menu-title").innerHTML='News'; 
 } else if(id==='notifyMovementsHzTab'){
    document.getElementById("notify-menu-title").innerHTML='Movement'; 
 }
}
function sel_notify_reqMenu(id){
 var arr_Id=["notify-reqMenu-People","notify-reqMenu-Community"];
 var arr_Id_div=["notifyPeopleRequestsDisplayDivision","notifyCommunityRequestsDisplayDivision"];
 for(var index=0;index<arr_Id.length;index++){
   if(arr_Id[index]==id){ 
     if($('#'+arr_Id[index]).hasClass('custom-lgt-bg')){ $('#'+arr_Id[index]).removeClass('custom-lgt-bg'); } 
	 if(!$('#'+arr_Id[index]).hasClass('custom-bg')){ $('#'+arr_Id[index]).addClass('custom-bg'); } 
	 $('#'+arr_Id[index]).css('background-color',CURRENT_DARK_COLOR);
	 $('#'+arr_Id[index]).css('color','#fff');
	 if($('#'+arr_Id_div[index]).hasClass('hide-block')){ $('#'+arr_Id_div[index]).removeClass('hide-block'); } 
   } else {
      if($('#'+arr_Id[index]).hasClass('custom-bg')){ $('#'+arr_Id[index]).removeClass('custom-bg'); } 
	  if(!$('#'+arr_Id[index]).hasClass('custom-lgt-bg')){ $('#'+arr_Id[index]).addClass('custom-lgt-bg'); }
	  $('#'+arr_Id[index]).css('background-color',CURRENT_LIGHT_COLOR);
	  $('#'+arr_Id[index]).css('color','#000');
	  if(!$('#'+arr_Id_div[index]).hasClass('hide-block')){ $('#'+arr_Id_div[index]).addClass('hide-block'); } 
   }
 }
}
function load_notify_overview(){
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.notifications.php',
  { action:'NOTIFICATION_OVERVIEW', user_Id: AUTH_USER_ID },function(response){ 
   console.log(response);
   response=JSON.parse(response);
   document.getElementById("notify_relationShipRequests").innerHTML='<b>'+response[0].relationShipRequests+'</b>';
   document.getElementById("notify_communityMembershipRequests").innerHTML='<b>'+response[0].communityMembershipRequests+'</b>';  
   document.getElementById("notify_newsFeedWatched").innerHTML='<b>'+response[0].newsFeedWatched+'</b>';
   document.getElementById("notify_newsFeedUnWatched").innerHTML='<b>'+response[0].newsFeedUnWatched+'</b>';
   document.getElementById("notify_movementParticipated").innerHTML='<b>'+response[0].movementParticipated+'</b>';
   document.getElementById("notify_movementUnParticipated").innerHTML='<b>'+response[0].movementUnParticipated+'</b>';   
 });    
}

function load_notify_peopleRequests(){
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.notifications.php',
  { action:'NOTIFICATION_COUNT_PEOPLEREQUEST', user_Id: AUTH_USER_ID },function(totalData){
    console.log("load_notify_peopleRequests: "+totalData);
    if(totalData==='0'){
	   var content='<div align="center" class="mtop15p" style="color:#808080;font-size:12px;">';
	       content+='<b>No Notification Request Found.</b>';
		   content+='</div>';
	   document.getElementById("notifyPeopleRequestsLoad0").innerHTML=content;
	} else {
      scroll_loadInitializer('notifyPeopleRequestsLoad',10,load_notify_peopleRequestsData,totalData); 
	}
  });
  
}
function load_notify_peopleRequestsData(div_view, appendContent,limit_start,limit_end){
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.notifications.php',
  { action:'NOTIFICATION_DATA_PEOPLEREQUEST', user_Id: AUTH_USER_ID, limit_start:limit_start, 
    limit_end:limit_end },function(response){ 
   console.log(response); 
   response=JSON.parse(response);
   var content='';
   for(var index=0;index<response.length;index++){
     var param_notifyId=response[index].notify_Id;
     var param_fromId=response[index].from_Id;
     var param_notifyURL=response[index].notifyURL;
	 var param_notifyts=get_stdDateTimeFormat01(response[index].notify_ts);
	 var param_watched=response[index].watched;
	 var param_surName=response[index].surName;
	 var param_name=response[index].name;
	 var param_profilepic=response[index].profile_pic;
	 content+=uiTemplate_requestList_people(param_surName,param_name,param_watched,param_notifyURL,param_profilepic,
				param_notifyts,param_fromId,param_notifyId);
   }
   content+=appendContent;
   document.getElementById(div_view).innerHTML=content;
 });
}
function acceptReqOfRelationship(param_notifyId,param_userId){
 /* Accept Request */
 acceptReqToMe(param_userId);
}

function load_notify_communityRequests(){
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.notifications.php',
  { action:'NOTIFICATION_COUNT_COMMUNITYREQUEST', user_Id: AUTH_USER_ID },function(totalData){
    console.log("load_notify_communityRequests: "+totalData);
	if(totalData==='0'){
	   var content='<div align="center" class="mtop15p" style="color:#808080;font-size:12px;">';
	       content+='<b>No Notification Request Found.</b>';
		   content+='</div>';
	   document.getElementById("notifyCommunityRequestsLoad0").innerHTML=content;
	} else {
      scroll_loadInitializer('notifyCommunityRequestsLoad',10,load_notify_communityRequestsData,totalData); 
	}
	});
}

function load_notify_communityRequestsData(div_view, appendContent,limit_start,limit_end){

}
</script>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	<div id="sidebar-wrapper">
	  <?php include_once 'templates/api/api_sidewrapper.php'; ?>
	</div>
	<div id="page-content-wrapper">
	  <?php include_once 'templates/api/api_header_simple.php'; ?>
	  <div id="app-page-content pad0">
		<div class="container-fluid custom-bg">
			<div align="center" class="col-xs-12">
			   <i class="fa fa-3x fa-bell fa-icon-circle1" aria-hidden="true"></i><br/>
			   <div class="mtop15p mbot15p"><b>NOTIFICATIONS: <span id="notify-menu-title"></span></b></div>
			</div>
		</div>
		<div class="container-fluid">
		   <div class="scroller-divison row">
		    <div class="scroller scroller-left col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-left"></i>
			</div>

			<div class="scrollTabwrapper col-xs-10">
				<ul class="nav scrollTablist" id="myTab" style="border-bottom:0px;">
					<li><a id="notifyOverviewHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Overview</b></a></li>
					<li><a id="notifyRequestsHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Requests</b></a></li>
					<li><a id="notifyNewsHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>News</b></a></li>
					<li><a id="notifyMovementsHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Movements</b></a></li>
				</ul>
			</div>
			
			<div class="scroller scroller-right col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-right"></i>
			</div>
			
		  </div>
		</div>
		
		<div id="notifyOverviewDisplayDivision" class="container-fluid hide-block">
			<div class="col-xs-12 mtop15p">
				<div class="list-group">
					<div class="list-group-item pad0">
						<div class="container-fluid custom-bg pad0">
							<div align="center" class="f12 col-xs-12 pad5">
								<i class="fa fa-rotate-270 fa-paper-plane" aria-hidden="true"></i>&nbsp;
								<b>PENDING REQUESTS</b>
							</div>
						</div>
					</div>
					<div class="list-group-item custom-lgt-bg2 pad0">
						<div class="container-fluid pad0">
							<div align="center" class="col-xs-6 pad5">
								<div class="mtop15p">
									<i class="fa fa-2x fa-user fa-icon-circle2" aria-hidden="true"></i>
								</div>
								<div class="mtop15p">
									<div class="f12">You have</div>
									<div id="notify_relationShipRequests" class="f24 custom-font"></div>
									<div class="f12">Relationship Requests</div>
								</div>
							</div>
							<div align="center" class="col-xs-6 pad5" style="border-left:1px solid #ccc;">
								<div class="mtop15p">
									<i class="fa fa-2x fa-bank fa-icon-circle3" aria-hidden="true"></i>
								</div>
								<div class="mtop15p mbot15p">
									<div class="f12">You have</div>
									<div id="notify_communityMembershipRequests" class="f24 custom-font"></div>
									<div class="f12">Community<br/> Membership Requests</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 mtop15p">
				<div class="list-group">
					<div class="list-group-item pad0">
						<div class="container-fluid custom-bg pad0">
							<div align="center" class="col-xs-12 f12 pad5">
								<i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;<b>NEWSFEED</b>
							</div>
						</div>
					</div>
					<div class="list-group-item pad0">
						<div class="container-fluid custom-lgt-bg2 pad0">
							<div align="center" class="col-xs-6 pad5">
								<div class="mtop15p">
									<i class="fa fa-2x fa-check fa-icon-circle4" aria-hidden="true"></i>
								</div>
								<div class="mtop15p">
									<div class="f12">You have watched</div>
									<div id="notify_newsFeedWatched" class="f24 custom-font"></div>
									<div class="f12">News till Today</div>
								</div>
							</div>
							<div align="center" class="col-xs-6 pad5" style="border-left:1px solid #ccc;">
								<div class="mtop15p">
									<i class="fa fa-2x fa-crosshairs fa-icon-circle5" aria-hidden="true"></i>
								</div>
								<div class="mtop15p mbot15p">
									<div class="f12">You have</div>
									<div id="notify_newsFeedUnWatched" class="f24 custom-font"></div>
									<div class="f12">News to Watch</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 mtop15p">
				<div class="list-group">
					<div class="list-group-item pad0">
						<div class="container-fluid custom-bg pad0">
							<div align="center" class="col-xs-12 f12 pad5">
								<i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;<b>MOVEMENT</b>
							</div>
						</div>
					</div>
					<div class="list-group-item pad0">
						<div class="container-fluid custom-lgt-bg2 pad0">
							<div align="center" class="col-xs-6 pad5">
								<div class="mtop15p">
									<i class="fa fa-2x fa-check fa-icon-circle4" aria-hidden="true"></i>
								</div>
								<div class="mtop15p">
									<div class="f12">You have supported</div>
									<div id="notify_movementParticipated" class="f24 custom-font"></div>
									<div class="f12">Movements till Today</div>
								</div>
							</div>
							<div align="center" class="col-xs-6 pad5" style="border-left:1px solid #ccc;">
								<div class="mtop15p">
									<i class="fa fa-2x fa-crosshairs fa-icon-circle5" aria-hidden="true"></i>
								</div>
								<div class="mtop15p mbot15p">
									<div class="f12">You have</div>
								    <div id="notify_movementUnParticipated" class="f24 custom-font"></div>
									<div class="f12">Movements waiting for your participation</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="notifyRequestsDisplayDivision" class="container-fluid pad0 hide-block">
			<div class="col-xs-6 pad0">
			    <div align="center" class="list-group">
					<div id="notify-reqMenu-People" onclick="javascript:sel_notify_reqMenu(this.id);" class="list-group-item custom-bg curpoint" style="border:0px;border-radius:0px;">People</div>
				</div>
			</div>
			<div class="col-xs-6 pad0">
			    <div align="center" class="list-group">
					<div id="notify-reqMenu-Community" onclick="javascript:sel_notify_reqMenu(this.id);" class="list-group-item custom-lgt-bg curpoint" style="border:0px;border-radius:0px;">Community</div>
				</div>
		    </div>
			<div id="notifyPeopleRequestsDisplayDivision" class="col-xs-12 pad0 hide-block">
				<div id="notifyPeopleRequestsLoad0" class="list-group">
				  <div align="center">
				   <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" style="margin-top:15px;width:110px;height:110px;"/>
				  </div>
				</div>
			</div>
			<div id="notifyCommunityRequestsDisplayDivision" class="col-xs-12 pad0 hide-block">
				<div id="notifyCommunityRequestsLoad0" class="list-group">
				  <div align="center">
				   <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" style="margin-top:15px;width:75px;height:75px;"/>
				  </div>
				</div>
			</div>
		</div>
		
		<div id="notifyNewsDisplayDivision" class="container-fluid mtop15p hide-block">
		
		</div>
		
		<div id="notifyMovementsDisplayDivision" class="container-fluid mtop15p hide-block">
		
		</div>
		
	  </div>
	</div>
 </div>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>
