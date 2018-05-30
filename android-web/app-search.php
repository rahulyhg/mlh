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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery-ui.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-search-bg-styles.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
<style>
.img-min-profilepic { margin-top:4%;margin-bottom:4%;width:70px;height:70px;border-radius: 50%; }
.label-newsfeed { font-size: 10px;padding: 5px; }
</style>
<script type="text/javascript">
var SEARCH_KEYWORD='<?php if(isset($_GET["searchKeyword"])) { echo $_GET["searchKeyword"]; } ?>';
$(document).ready(function(){
console.log("Search Keyword: "+SEARCH_KEYWORD);
 sideWrapperToggle();
 mainMenuSelection("dn_"+USR_LANG+"_search");
 bgstyle();
 $(".lang_"+USR_LANG).css('display','block');
 hzTabSelection('searchPeopleHzTab');
 searchpeopleInitializer();
 searchNewsFeedInitializer();
 searchCommunityInitializer();
 searchMovementInitializer();
});
function hzTabSelection(id){
 var arryHzTab=["searchPeopleHzTab","searchNewsFeedHzTab","searchCommunityHzTab","searchMovementHzTab"];
 var arryTabDataViewer=["searchPeopleDisplayDivision","searchNewsFeedDisplayDivision","searchCommunityDisplayDivision","searchMovementDisplayDivision"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer);
}
/* Search People load On Scroll */
function searchpeopleInitializer(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.page.app.search.php',
 { action:'SEARCH_COUNT_USERS', searchKeyword:SEARCH_KEYWORD },function(totalData){
   console.log("searchpeopleInitializer: "+totalData);
   if(totalData=='0'){
     document.getElementById("searchPeopleDataload0").innerHTML='<div align="center" style="color:#ccc;">No People found</div>';
   } else {
   scroll_loadInitializer('searchPeopleDataload',10,searchpeoplecontentData,totalData);
   }
 });
}
function searchpeoplecontentData(div_view, appendContent,limit_start,limit_end){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.page.app.search.php',
  { action:'SEARCH_DATA_USERS', searchKeyword:SEARCH_KEYWORD,limit_start:limit_start,limit_end:limit_end },
  function(response){
    var content='';
	response=JSON.parse(response);
	for(var index=0;index<response.length;index++){
	  var user_Id=response[index].user_Id;
	  var username=response[index].username;
	  var surName=response[index].surName;
	  var name=response[index].name;
	  var mcountrycode=response[index].mcountrycode;
	  var mobile=response[index].mobile;
	  var mob_val=response[index].mob_val;
	  var dob=response[index].dob;
	  var gender=response[index].gender;
	  var profile_pic=response[index].profile_pic;
	  var minlocation=response[index].minlocation;
	  var location=response[index].location;
	  var state=response[index].state;
	  var country=response[index].country;
	  var created_On=response[index].created_On;
	  var isAdmin=response[index].isAdmin;
	  var user_tz=response[index].user_tz;
	  var acc_active=response[index].acc_active;
	  
	  content+=uiTemplate_userDisplayWithoutCloseButton(surName, name, profile_pic, minlocation, location,state,country);
	}
	content+=appendContent;
	document.getElementById(div_view).innerHTML=content;
  });
}
/* Search NewsFeed load On Scroll */ 
function searchNewsFeedInitializer(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.page.app.search.php',
 { action:'SEARCH_COUNT_NEWSFEED', searchKeyword:SEARCH_KEYWORD },function(totalData){
   console.log("searchNewsFeedInitializer: "+totalData);
   if(totalData=='0'){
     document.getElementById("searchNewsFeedDataload0").innerHTML='<div align="center" style="color:#ccc;">No NewsFeed found</div>';
   } else {
   scroll_loadInitializer('searchNewsFeedDataload',10,searchNewsFeedcontentData,totalData);
   }
 });
}
function searchNewsFeedcontentData(div_view, appendContent,limit_start,limit_end){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.page.app.search.php',
  { action:'SEARCH_DATA_NEWSFEED', projectURL:PROJECT_URL, lang: USR_LANG, user_Id: AUTH_USER_ID, 
  searchKeyword:SEARCH_KEYWORD, limit_start:limit_start, limit_end:limit_end },
  function(response){
    console.log("response: "+response);
	response=JSON.parse(response);
	var content='';
	for(var index=0;index<response.length;index++){
	   var param_unionId=response[index].union_Id;
	   var param_domainName=response[index].domainName;
	   var param_subdomainName=response[index].subdomainName;
	   var param_unionName=response[index].unionName;
	   var param_infoId=response[index].info_Id;
	   var param_artTitle=decodeURI(response[index].artTitle);
	   var param_artShrtDesc=decodeURI(response[index].artShrtDesc);
	   var param_artDesc=decodeURI(response[index].artDesc);
	   var param_createdOn=get_stdDateTimeFormat01(response[index].createdOn);
	   var param_images=response[index].images;
	   var param_status=response[index].status;
	   var param_newsType=response[index].newsType;
	   
	   content+=uiTemplate_simpleNewsFeedDisplay(param_domainName, param_subdomainName, param_images, param_artTitle, 
					param_artShrtDesc, param_infoId, param_newsType, param_createdOn);
	}
	content+=appendContent;
	document.getElementById(div_view).innerHTML=content;
  });
}
//  
/* Search Community load On Scroll */
function searchCommunityInitializer(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.page.app.search.php',
 { action:'SEARCH_COUNT_COMMUNITY', searchKeyword:SEARCH_KEYWORD },function(totalData){
   if(totalData=='0'){
     document.getElementById("searchCommunityDataload0").innerHTML='<div align="center" style="color:#ccc;">No Community found</div>';
   } else {
   console.log("searchCommunityInitializer: "+totalData);
   scroll_loadInitializer('searchCommunityDataload',10,searchCommunitycontentData,totalData);
   }
 });
}
function searchCommunitycontentData(div_view, appendContent,limit_start,limit_end){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.page.app.search.php',
 { action:'SEARCH_DATA_COMMUNITY', projectURL: PROJECT_URL, lang: USR_LANG, user_Id: AUTH_USER_ID, 
 searchKeyword:SEARCH_KEYWORD, limit_start:limit_start, limit_end:limit_end },
 function(response){
 console.log(response);
 response=JSON.parse(response);
 var content='';
 for(var index=0;index<response.length;index++){
   var param_unionId=response[index].union_Id;
   var param_domainName=response[index].domainName;
   var param_subdomainName=response[index].subdomainName;
   var param_unionName=response[index].unionName;
   var param_unionURLName=response[index].unionURLName;
   var param_profilepic=response[index].profile_pic;
   var param_minlocation=response[index].minlocation;
   var param_location=response[index].location;
   var param_state=response[index].state;	
   var param_country=response[index].country;
   var param_createdOn=response[index].created_On;
   
   content+=uiTemplate_simpleCommunityDisplay(param_unionId, param_unionURLName, param_domainName,param_subdomainName,
        param_profilepic,param_unionName, param_createdOn,param_minlocation,param_location,param_state,param_country);
 }
  content+=appendContent;
  document.getElementById(div_view).innerHTML=content;
 });
}
/* Search Movement load On Scroll */ 
function searchMovementInitializer(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.page.app.search.php',
 { action:'SEARCH_COUNT_MOVEMENT', searchKeyword:SEARCH_KEYWORD },function(totalData){
   if(totalData=='0'){
     document.getElementById("searchMovementDataload0").innerHTML='<div align="center" style="color:#ccc;">No Movement found</div>';
   } else {
   console.log("searchMovementInitializer: "+totalData);
   scroll_loadInitializer('searchMovementDataload',10,searchMovementcontentData,totalData);
   }
 });
}
function searchMovementcontentData(div_view, appendContent,limit_start,limit_end){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.page.app.search.php',
 { action:'SEARCH_DATA_MOVEMENT', searchKeyword:SEARCH_KEYWORD, limit_start:limit_start, limit_end:limit_end },
 function(response){
   var content=uiTemplate_simpleMovementDisplay();
       content+=appendContent;
   document.getElementById(div_view).innerHTML=content;
 });
}


</script>
 <?php include_once 'templates/api/api_params.php'; ?>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	<div id="sidebar-wrapper">
	  <?php include_once 'templates/api/api_sidewrapper.php'; ?>
	</div>
    <div id="page-content-wrapper">
	  <?php include_once 'templates/api/api_header.php'; ?>
	  <div id="app-page-content">
	  
	    <div class="container-fluid">
		   <div class="scroller-divison row">
		    <div class="scroller scroller-left col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-left"></i>
			</div>

			<div class="scrollTabwrapper col-xs-10">
				<ul class="nav nav-tabs scrollTablist" id="myTab" style="border-bottom:0px;">
					<li><a id="searchPeopleHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>1. People</b></a></li>
					<li><a id="searchNewsFeedHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>2. NewsFeed</b></a></li>
					<li><a id="searchCommunityHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>3. Community</b></a></li>
					<li><a id="searchMovementHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>4. Movements</b></a></li>
				</ul>
			</div>
			<div class="scroller scroller-right col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-right"></i>
			</div>
		  </div>
		</div>

		<div class="container-fluid">
			<div id="searchPeopleDisplayDivision" align="center" class="mtop15p hide-block">
			  <div id="searchPeopleDataload0">
			   <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" style="margin-top:15px;width:150px;height:150px;"/>
			  </div>
			</div>
			<div id="searchNewsFeedDisplayDivision" align="center" class="mtop15p hide-block">
			   <div id="searchNewsFeedDataload0">
			     <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" style="margin-top:15px;width:150px;height:150px;"/>
			   </div>
			</div>
			<div id="searchCommunityDisplayDivision" align="center" class="mtop15p hide-block">
			   <div id="searchCommunityDataload0">
			     <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" style="margin-top:15px;width:150px;height:150px;"/>
			   </div>
			</div>
			<div id="searchMovementDisplayDivision" align="center" class="mtop15p hide-block">
			   <div id="searchMovementDataload0">
			     <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" style="margin-top:15px;width:150px;height:150px;"/>
			   </div>
			</div>
		</div>
		 
		 
	  </div>
	</div>
 </div>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>