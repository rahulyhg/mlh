<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>NewsFeed</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/jquery-ui.css"> 
 <link href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/summernote.css" rel="stylesheet"/>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery-ui.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <?php include_once 'templates/api/api_js.php'; ?>
 <?php include_once 'templates/api/api_params.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed-write-bg-styles.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/summernote.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <style>
 body { background-color:#f7f7f7; }
 </style>
 <script type="text/javascript">
   function getListOfAvailableCommunitiesToWriteNewsFeed(){
   js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
   { action : 'GETLIST_COUNT_WRITENEWSFEEDAVAILABLECOMMUNITIES', user_Id:AUTH_USER_ID+1 },function(totalData){
     if(totalData=='0'){
	    var content='<div align="center" class="mtop15p">';
			content+='<b>You don\'t have Permissions to write in any of the Community.</b>';
			content+='</div>';
			content+='<div class="col-xs-2"></div>';
			content+='<div class="col-xs-7">';
			content+='<div class="mtop20p mbot20p">';
			content+='<ol>';
			content+='<li>Create a Community</li>';
			content+='<li>Join Members</li>';
			content+='<li>Start Writing NewsFeed</li>';
			content+='</ol>';
			content+='</div>';
			content+='</div>';
			content+='<div class="col-xs-3"></div>';
			content+='<div align="center" class="mtop20p f18">';
			content+='<a href="'+PROJECT_URL+'app/create-community">';
			content+='<button class="btn custom-bg" style="color:#fff;background-color:'+CURRENT_DARK_COLOR+';">';
			content+='<b>Start a Community</b>';
			content+='</button>';
			content+='</a>';
			content+='</div>';
	    document.getElementById("loadAvailableCommunityList0").innerHTML=content;
	 } else {
       scroll_loadInitializer('loadAvailableCommunityList',10,displayListOfAvailableCommunitiesToWriteNewsFeed,totalData); 
	 }
   });
   }
$(document).ready(function(){
 sideWrapperToggle();
 bgstyle();
 $(".lang_"+USR_LANG).css('display','block');
 getListOfAvailableCommunitiesToWriteNewsFeed();
});

function displayListOfAvailableCommunitiesToWriteNewsFeed(div_view, appendContent,limit_start,limit_end){
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
   { action : 'GETLIST_DATA_WRITENEWSFEEDAVAILABLECOMMUNITIES', user_Id:AUTH_USER_ID, 
     limit_start:limit_start, limit_end:limit_end },function(response){
    console.log(response);
   });
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
	  <?php include_once 'templates/api/api_header.php'; ?>
	  <div id="app-page-content">
	    <div id="app-page-title" class="list-group pad0">
			<div align="center" class="list-group-item custom-lgt-bg">
		       <span class="lang_english">
				  <i class="fa fa-hands" aria-hidden="true"></i>&nbsp; <b>WRITE NEWSFEED</b>
			   </span>
			</div>
		</div>
		<div class="container-fluid">
			<div id="loadAvailableCommunityList0">
			  <div align="center">
			    <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" class="profile_pic_img1"/>
			  </div>
			</div>
		</div>
	  </div>
	</div>
  </div>	
</body>
</html>