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
<script type="text/javascript">
 $(document).ready(function(){
   sideWrapperToggle();
   mainMenuSelection("dn_"+USR_LANG+"_search");
   bgstyle();
   $(".lang_"+USR_LANG).css('display','block');
 });
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
<style>
.unselectHzTab { color:#fff; }
.unselectHzTab:hover { color:#000; }
</style>
<script type="text/javascript">
function hzTabSelection(id){
 var arry=["searchPeopleHzTab","searchNewsFeedHzTab","searchCommunityHzTab","searchMovementHzTab"];
 for(var index=0;index<arry.length;index++){
 if(arry[index]===id){
   if(!$("#"+arry[index]).hasClass('custom-lgt-bg')){ $("#"+arry[index]).addClass('custom-lgt-bg'); }
   if($("#"+arry[index]).hasClass('unselectHzTab')){ $("#"+arry[index]).removeClass('unselectHzTab'); }
   $("#"+arry[index]).css('border-radius','0px');
   $("#"+arry[index]).css('background-color',CURRENT_LIGHT_COLOR);
   $("#"+arry[index]).css('color','#000');
  } else {
   if($("#"+arry[index]).hasClass('custom-lgt-bg')){ $("#"+arry[index]).removeClass('custom-lgt-bg'); }
   if(!$("#"+arry[index]).hasClass('unselectHzTab')){ $("#"+arry[index]).addClass('unselectHzTab'); }
   $("#"+arry[index]).css('border-radius','0px');
   $("#"+arry[index]).css('background-color',CURRENT_DARK_COLOR);
   $("#"+arry[index]).css('color','#fff');
  }
 }
}
$(document).ready(function(){
  hzTabSelection('searchPeopleHzTab');
});
</script>
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
			<div align="center">
			   <img src="images/load.gif" style="margin-top:15px;width:150px;height:150px;"/>
			</div>
		</div>
		 
		 
	  </div>
	</div>
 </div>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>