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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-socialhub-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <!--link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script-->
<script type="text/javascript">
$(document).ready(function(){
 sideWrapperToggle();
 mainMenuSelection("dn_"+USR_LANG+"_socialHub");
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
});
</script>
<style>

.classmatepoint_div,.fansclub_div,.publicparliament_div { margin-top:5px;padding-top:2px;
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
 <?php include_once 'templates/api/api_header_other.php'; ?>
 <div id="app-page-content">
 <!-- START -->
 <div class="list-group">
 <div class="list-group-item" style="background-color:#e7e7e7;border-radius:0px;">
 <!-- background-color:#e7e7e7; -->
 <div style="color:#222425;"><span style="font-size:16px;"><b>Social Hub</b></span> is a platform to connect and interact 
 with people and participate in Activities.</div>
 </div>
 </div>
 <div class="container-fluid">
 <div class="row">
 <div class="col-xs-12">
 <a class="a-custom" href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/socialHub/classmatepoint/home">
 <div class="list-group">
 <div class="list-group-item pad0">
 <div class="container-fluid">
 <div class="row">
 <div align="center" class="col-xs-12">
 <div class="classmatepoint_div mtop15p mbot15p">
 <span class="classmatepoint_font01">Classmate</span><span class="classmatepoint_font02">point</span>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </a>
 </div> 
 
 <div align="center" class="col-xs-12">
 <a class="a-custom" href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/socialHub/classmatepoint/home">
 <div class="list-group">
 <div class="list-group-item pad0">
 <div class="container-fluid">
 <div class="row">
 <div align="center" class="col-xs-12">
 <div class="fansclub_div mtop15p mbot15p">
 <span class="fansclub_font01">fans</span><span class="fansclub_font02"><i>club</i></span>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </a>
 </div>
 
 <div class="col-xs-12">
 <a class="a-custom" href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/socialHub/publicparliament/home">
 <div class="list-group">
 <div class="list-group-item pad0">
 <div class="container-fluid">
 <div class="row">
 <div align="center" class="col-xs-12">
 <div class="publicparliament_div publicparliament_font mtop15p mbot15p">
 <span class="publicparliament_color01">Public</span><span class="publicparliament_color02">Parliament</span>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </a>
 </div> 
 
 <div align="center" class="col-xs-12">
 <a class="a-custom" href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/socialHub/classmatepoint/home">
 <div class="list-group">
 <div class="list-group-item pad0">
 <div class="container-fluid">
 <div class="row">
 <div align="center" class="col-xs-12">
 <div class="fansclub_div mtop15p mbot15p">
 <span class="fansclub_font01">Startup</span><span class="fansclub_font02"><i>Streets</i></span>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </a>
 </div>
 
 </div>
 
 </div>
 <!-- END -->
 </div>
 </div>
 </div>
 
 <!--div class="list-group-item grey-font">
 It is a point where you can find your classmates, stay connected and share the Activities. 
 </div-->
 <!--div class="list-group-item grey-font">
 It is a platform where public can interact and participate in Political Activities.
 </div-->
 <!--div class="list-group-item grey-font">
 It is a club where you can club with co-fans and participate in Activities.
 </div-->
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>