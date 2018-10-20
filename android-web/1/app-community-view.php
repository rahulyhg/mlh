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
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-view-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-view.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <?php include_once 'templates/api/api_params.php'; ?>
 <style>
 .img-min-profilepic { margin-top:4%;margin-bottom:4%;width:70px;height:70px;border-radius: 50%; }
 </style>
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
		<div class="container-fluid" style="padding:5px;">	
			
			
		</div>
<style>
.unselectHzTab { color:#fff; }
.unselectHzTab:hover { color:#000; }
</style>	
<script type="text/javascript">
$(document).ready(function(){ hzTabSelection('newsfeedHzTab'); });
function hzTabSelection(id){     
 var arryHzTab=["newsfeedHzTab","membersHzTab","supportersHzTab","movementsHzTab"];
 var arryTabDataViewer=["newsfeedDisplayDivision","membersDisplayDivision","supportersDisplayDivision","movementsDisplayDivision"];
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
</script>
	<div>
		<div class="scroller scroller-left col-xs-1 custom-bg" style="height:41px;">
			<i class="glyphicon glyphicon-chevron-left"></i>
		</div>
		
		<div class="scrollTabwrapper custom-bg col-xs-10">
			<ul class="nav nav-tabs scrollTablist" style="border-bottom:0px;">
				<li><a id="newsfeedHzTab" onclick="javascript:hzTabSelection(this.id);"><b>NewsFeed</b></a></li>
				<li><a id="membersHzTab" onclick="javascript:hzTabSelection(this.id);"><b>Members</b></a></li>
				<li><a id="supportersHzTab" onclick="javascript:hzTabSelection(this.id);"><b>Supporters</b></a></li>
				<li><a id="movementsHzTab" onclick="javascript:hzTabSelection(this.id);"><b>Movements</b></a></li>
			</ul>
		</div>
		
		<div class="scroller scroller-right col-xs-1 custom-bg" style="height:41px;">
			<i class="glyphicon glyphicon-chevron-right"></i>
		</div>
	</div>	
	
	<div id="newsfeedDisplayDivision" class="col-xs-12 hide-block mtop15p">
				
	</div>
			
	<div id="membersDisplayDivision" class="col-xs-12 hide-block mtop15p">
				
	</div>
	
	<div id="supportersDisplayDivision" class="col-xs-12 hide-block mtop15p">
				
	</div>
			
	<div id="movementsDisplayDivision" class="col-xs-12 hide-block mtop15p">
				
	</div>

		</div>
	  </div>
  </div>
  <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
 </body>
</html>
<?php } else { header("Location:".$_SESSION["PROJECT_URL"]);  } ?>