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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-search-bg-styles.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
<style>
.unselectHzTab { color:#fff; }
.unselectHzTab:hover { color:#000; }
.img-min-profilepic { margin-top:4%;margin-bottom:4%;width:70px;height:70px;border-radius: 50%; }
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
 for(var index=0;index<arryHzTab.length;index++){
 if(arryHzTab[index]===id){
   if(!$("#"+arryHzTab[index]).hasClass('custom-lgt-bg')){ $("#"+arryHzTab[index]).addClass('custom-lgt-bg'); }
   if($("#"+arryHzTab[index]).hasClass('unselectHzTab')){ $("#"+arryHzTab[index]).removeClass('unselectHzTab'); }
   if($("#"+arryTabDataViewer[index]).hasClass('hide-block')){ $("#"+arryTabDataViewer[index]).removeClass('hide-block'); }
   $("#"+arryHzTab[index]).css('border-radius','0px');
   $("#"+arryHzTab[index]).css('background-color',CURRENT_LIGHT_COLOR);
   $("#"+arryHzTab[index]).css('color','#000');
   
  } else {
   if($("#"+arryHzTab[index]).hasClass('custom-lgt-bg')){ $("#"+arryHzTab[index]).removeClass('custom-lgt-bg'); }
   if(!$("#"+arryHzTab[index]).hasClass('unselectHzTab')){ $("#"+arryHzTab[index]).addClass('unselectHzTab'); }
   if(!$("#"+arryTabDataViewer[index]).hasClass('hide-block')){ $("#"+arryTabDataViewer[index]).addClass('hide-block'); }
   $("#"+arryHzTab[index]).css('border-radius','0px');
   $("#"+arryHzTab[index]).css('background-color',CURRENT_DARK_COLOR);
   $("#"+arryHzTab[index]).css('color','#fff');
   
  }
 }
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
	  
	  content+='<div class="col-xs-12">';
	  content+='<div class="list-group">';
	  content+='<div class="list-group-item">';
	  content+='<div class="container-fluid pad0">';
	  content+='<div class="row">';
	  content+='<div class="col-xs-4">';
	  content+='<img src="'+profile_pic+'" class="img-min-profilepic"/>';
	  content+='</div>';
	  content+='<div class="col-xs-8">';
	  content+='<div align="center" class="col-xs-12">';
	  content+='<h5><b>'+surName+' '+name+'</b></h5>';
	  content+='</div>';
	  content+='<div align="center" class="col-xs-12" style="color:#999;">';
	  content+=minlocation+', '+location+', '+state+', '+country;
	  content+='</div>';
	  content+='</div>';
	  content+='</div>';
	  content+='</div>';
	  content+='</div>';
	  content+='</div>';
	  content+='</div>';  
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
  { action:'SEARCH_DATA_NEWSFEED', searchKeyword:SEARCH_KEYWORD,limit_start:limit_start,limit_end:limit_end },
  function(response){
	response=JSON.parse(response);
	var content='';
	for(var index=0;index<response.length;index++){
	   var info_Id=response[index].info_Id;
	   var union_Id=response[index].union_Id;
	   var artTitle=decodeURI(response[index].artTitle);
	   var artShrtDesc=decodeURI(response[index].artShrtDesc);
	   var artDesc=decodeURI(response[index].artDesc);
	   var createdOn=response[index].createdOn;
	   var images=response[index].images;
	   var status=response[index].status;
	   
	   content+='<div class="col-xs-12">';
	   
	   content+='<div class="list-group">';
	   content+='<div class="list-group-item">';
	   
	   content+='<div class="container-fluid pad0">';
	   
	   content+='<div align="center">';
	   content+='<h5><b>'+artTitle+'</b></h5>';
	   content+='</div>';
	   
	   content+='<div align="center">';
	   content+='<span style="color:#999;">'+artShrtDesc+'</span>';
	   content+='</div>';
	   
	   content+='<div class="mtop15p">';
	   content+='<button class="btn custom-bg pull-right" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;"';
	   content+='onclick="javascript:urlTransfer(\''+PROJECT_URL+'newsfeed/news/union/'+info_Id+'\');">';
	   content+='<i class="fa fa-14px fa-newspaper-o" aria-hidden="true"></i>&nbsp;<b>Read Full Story</b></button>';
	   content+='</div>';
	   
	   content+='</div>';
	   
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
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
   }
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
   }
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
	  
	    <div class="container-fluid pad0">
		    <div class="scroller scroller-left col-xs-1 custom-bg" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-left"></i>
			</div>

			<div class="scrollTabwrapper custom-bg col-xs-10">
				<ul class="nav nav-tabs scrollTablist" id="myTab" style="border-bottom:0px;">
					<li><a id="searchPeopleHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>People</b></a></li>
					<li><a id="searchNewsFeedHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>NewsFeed</b></a></li>
					<li><a id="searchCommunityHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Community</b></a></li>
					<li><a id="searchMovementHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Movements</b></a></li>
				</ul>
			</div>
			<div class="scroller scroller-right col-xs-1 custom-bg" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-right"></i>
			</div>
		</div>

		<div class="container-fluid pad0">
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