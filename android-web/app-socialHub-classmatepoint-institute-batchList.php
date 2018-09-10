<?php session_start();
include_once 'templates/api/api_params.php';
if(isset($_SESSION["AUTH_USER_ID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Social Hub - Home</title>
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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-socialhub-classmatepoint-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <!--link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script-->
<script type="text/javascript">
$(document).ready(function(){
 sideWrapperToggle();
 mainMenuSelection("dn_"+USR_LANG+"_socialHub");
 bgstyle(2);
 $(".lang_"+USR_LANG).css('display','block');
 generateTabList();
 hzTabSelection('cpointUniversityHzTab','');
});
function generateTabList(){ 
 var content='<ul class="nav scrollTablist" id="socialhubclassmatepointTab" style="border-bottom:0px;">';
	 content+='<li><a id="cpointUniversityHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>University</b></a></li>';
	 content+='<li><a id="cpointCollegesHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Undergraduate Colleges</b></a></li>';
	 content+='<li><a id="cpointSchoolsHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Schools</b></a></li>';
	 content+='</ul>'; 
  document.getElementById("socialHubClassmatePointScrollableTab").innerHTML=content;
}
function hzTabSelection(id,orientation){
 var arryHzTab=["cpointUniversityHzTab","cpointCollegesHzTab","cpointSchoolsHzTab"];
 var arryTabDataViewer=["cpointUniversityDisplayDivision","cpointCollegesDisplayDivision","cpointSchoolsDisplayDivision"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer);
 if(orientation.length>0){
   $('#communityProfileTab').css('left',orientation+'px');
 }
// if(id==="communityProfileHzTab"){ menuCommunityProfile("communityProfile_statistics"); } 
}
</script>
<style>
.classmatepoint_div,.fansclub_div,.publicparliament_div { margin-top:5px;background-color:#fff;padding-top:2px;
 padding-bottom:2px;padding-right:10px;padding-left:10px;border-radius:6px; }
.classmatepoint_font01 { color:#E91E63;font-family:'mlhfont002';font-size:26px;letter-spacing:1px; }
.classmatepoint_font02 { color:#009688;font-family:'mlhfont001';font-size:24px;letter-spacing:1px; }
.fansclub_font02 { color:#9C27B0;font-family:'mlhfont003';font-weight:bold;font-size:26px;letter-spacing:1px; }
.fansclub_font01 { color:#118aea;font-family:'mlhfont004';font-size:30px;letter-spacing:2px; }
.publicparliament_font { font-family:'mlhfont006';font-size:26px;letter-spacing:2px; }
.publicparliament_color01 { color:#ec3427; }
.publicparliament_color02 { color:#04bd0c; }
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
 <?php include_once 'templates/api/api_header_simple.php'; ?>
 <div id="app-page-content">
 <!-- START -->
 <style>

 </style>
 <script type="text/javascript">
 $(document).ready(function(){
   load_breadcrumb();
 });
 function load_breadcrumb(){
   var content='<a href="'+PROJECT_URL+'app/socialHub/home" style="color:'+CURRENT_DARK_COLOR+';">Social Hub</a> / ';
       content+='<a href="'+PROJECT_URL+'app/socialHub/classmatepoint/home" style="color:'+CURRENT_DARK_COLOR+';">Classmate Point</a> / ';
       content+='<a href="'+PROJECT_URL+'app/socialHub/classmatepoint/institution/home/12345" style="color:'+CURRENT_DARK_COLOR+';">Osmania University</a> / ';
       content+='<a href="'+PROJECT_URL+'app/socialHub/classmatepoint/institute/home/12345" style="color:'+CURRENT_DARK_COLOR+';">Sri Indu Institute of Engineering and Technology</a> / ';
       content+='<a href="#" class="active" style="color:#797777;"><b>Batches</b></a>'; 
  document.getElementById("load_page_breadcrumb").innerHTML=content;
 }
 </script>
 
 <div id="load_page_breadcrumb" class="custom-breadcrumb"></div>
 
 <div class="list-group" style="margin-bottom:0px;">
 <div align="center" class="list-group-item pad0" style="border-radius:0px;background-color:#e7e7e7;">
 <div class="mtop5p mbot5p" style="line-height:22px;"><b>B.Tech in Electrical and Electronics Engineering</b></div>
 </div>
 </div>
  
 <!--div class="container-fluid mtop15p mbot15p">
 <div class="row">
 <div class="col-xs-12"><button class="btn custom-lgt-bg pull-right"><b>(+)&nbsp;Create a Batch</b></button></div>
 </div>
 </div-->
 
 <div class="container-fluid mtop15p ">
   <div class="row">
 <div class="col-xs-12">
    <!-- -->
	<div class="list-group">
	<div class="list-group-item pad0">
	  <div class="container-fluid mtop15p mbot15p">
	  <div class="row">
	  <div align="center" class="col-xs-12">
	    <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/logo-blue.jpg" class="profile_pic_img"/>
	  </div>
	  </div>
	  <div class="row">
	  <div align="center" class="col-xs-12">
	    <div class="mtop15p"><b>2008 to 2012 Batch</b></div>
	  </div>
	  </div>
	  </div>
	</div>
	<div class="list-group-item pad0">
	  <div class="container-fluid">
	  <div class="row">
	  <div align="center" class="col-xs-6" style="border-right:1px solid #ccc;">
	    <div class="mtop15p"><h5><b>STUDENTS</b></h5></div>
		<div class="mbot15p"><b>12345</b></div>
	  </div>
	  <div align="center" class="col-xs-6" style="border-right:1px solid #ccc;">
	    <div class="mtop15p"><h5><b>PROFESSORS</b></h5></div>
		<div class="mbot15p"><b>12345</b></div>
	  </div>
	  </div>
	  </div>
	</div>
	</div>
	</div>
	
	<!-- -->
 </div> 
 </div>
 
 <!-- END -->
 </div>
 </div>
 </div>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>