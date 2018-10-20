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
var INSTITUTE_ID = '<?php if(isset($_GET["1"])){ echo $_GET["1"]; } ?>';
$(document).ready(function(){
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
 generateTabList();
 hzTabSelection('cpointInstituteProfileHzTab','');
 console.log("INSTITUTE_ID: "+INSTITUTE_ID);
 load_data_instituteById();
});
function generateTabList(){ 
 var content='<ul class="nav scrollTablist" id="socialhubclassmatepointTab" style="border-bottom:0px;">';
	 content+='<li><a id="cpointInstituteProfileHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Institute Profile</b></a></li>';
	 content+='<li><a id="cpointClassroomsHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Classrooms</b></a></li>';
	 content+='</ul>'; 
  document.getElementById("socialHubClassmatePointScrollableTab").innerHTML=content;
}
function hzTabSelection(id,orientation){
 var arryHzTab=["cpointInstituteProfileHzTab","cpointClassroomsHzTab"];
 var arryTabDataViewer=["cpointInstituteProfileDisplayDivision","cpointClassroomsDisplayDivision"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer);
 if(orientation.length>0){
   $('#communityProfileTab').css('left',orientation+'px');
 }
// if(id==="communityProfileHzTab"){ menuCommunityProfile("communityProfile_statistics"); } 
}
function load_data_instituteById(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
 { action:'GET_DATA_INSTITUTEBYID',institute_Id:INSTITUTE_ID },function(response){
   console.log("response: "+response);
   response = JSON.parse(response);
   var cmp_sch_Id = response[0].cmp_sch_Id;
   var instituteName = response[0].instituteName;
   var instituteType = response[0].instituteType;
   var cmp_u_Id = response[0].cmp_u_Id;
   var profile_pic = response[0].profile_pic;
   var establishedOn = response[0].establishedOn;
   var aboutInstitute = response[0].aboutInstitute;
   var foundedBy1 = response[0].foundedBy1;
   var foundedBy2 = response[0].foundedBy2;
   var foundedBy3 = response[0].foundedBy3;
   var foundedBy4 = response[0].foundedBy4;
   var foundedBy5 = response[0].foundedBy5;
   var createdBy = response[0].createdBy;
   var approved = response[0].approved;

   var content='<div class="container-fluid" style="background-color:#f5f5f5;">';
	   content+='<div class="row">';
	   content+='<div align="center" class="col-xs-12">';
       content+='<img src="'+profile_pic+'" class="mtop15p profile_pic_img"/>';
       content+='</div>';
       content+='<div align="center" class="col-xs-12 mtop15p">';
       content+='<h5 style="line-height:22px;"><b>'+instituteName+'</b></h5>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="list-group">';
       content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid">';
       content+='<div class="row">';
       content+='<div class="col-xs-5" style="border-right:1px solid #e7e7e7;">';
       content+='<div align="center" class="mbot10p">';
       content+='<h5><b>Established in</b></h5>';
       content+='<div class="grey-lgt-font">'+establishedOn+'</div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="col-xs-7">';
       content+='<div align="center">';
       content+='<h5><b>College Type</b></h5>';
	   content+='<div class="grey-lgt-font">'+instituteType+'</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="container-fluid">';
       content+='<div class="row">';
       content+='<div class="col-xs-12">';
       content+='<div class="list-group">';
       content+='<div class="list-group-item pad0">';
	   content+='<div class="container-fluid">';
       content+='<div class="col-xs-12">';
       content+='<div><h5><b>About Institute</b></h5></div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="list-group-item" style="color:#aaa;">'+aboutInstitute+'</div>';
	   content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="list-group">';
       content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid">';
       content+='<div class="row">';
       content+='<div align="center" class="col-xs-6" style="border-right:1px solid #ccc;">';
       content+='<div class="mbot10p">';
       content+='<h5><b>Students</b></h5>';
       content+='<div class="grey-lgt-font">123456789</div>';
       content+='</div>';
       content+='</div>';
       content+='<div align="center" class="col-xs-6">';
       content+='<div class="mbot10p">';
       content+='<h5><b>Professors</b></h5>';
       content+='<div class="grey-lgt-font">123456789</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid">';
       content+='<div class="row">';
       content+='<div align="center" class="col-xs-6" style="border-right:1px solid #ccc;">';
       content+='<div class="mbot10p">';
       content+='<h5><b>Batches</b></h5>';
       content+='<div class="grey-lgt-font">123456789</div>';
       content+='</div>';
       content+='</div>';
       content+='<div align="center" class="col-xs-6">';
       content+='<div class="mbot10p">';
       content+='<h5><b>Courses</b></h5>';
       content+='<div class="grey-lgt-font">123456789</div>';
       content+='</div>';
       content+='</div>';
	   content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="container-fluid">';
       content+='<div class="row">';
       content+='<div class="col-xs-12">';
       content+='<div class="list-group">';
       content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid">';
       content+='<div class="col-xs-12">';
       content+='<div><h5><b>Profile created by</b></h5></div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid mtop15p mbot15p">';
       content+='<div class="row">';
       content+='<div align="center" class="col-xs-5">';
       content+='<img src="http://192.168.1.4/mlh/android-web/images/avatar/3.jpg" class="profile_pic_img3"/>';
       content+='</div>';
       content+='<div class="col-xs-7 pad0">';
       content+='<div><b>Nellutla Anup Chakravarthi</b></div>';
       content+='<div class="grey-lgt-font mtop10p">Kuttanad, Mavelikara, Kerala, India</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="container-fluid">';
       content+='<div class="row">';
       content+='<div class="col-xs-12">';
       content+='<div class="list-group">';
       content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid">';
       content+='<div class="col-xs-12"><div><h5><b>Founders</b></h5></div></div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid mtop15p mbot15p">';
       content+='<div class="row">';
       content+='<div class="col-xs-12"><h5 class="grey-lgt-font"><b>Qryvdgjj</b></h5></div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
	document.getElementById("cpointInstituteProfileDisplayDivision").innerHTML=content;
 });
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
 <!-- START -->  
 <!--script type="text/javascript">
 $(document).ready(function(){
 //  load_breadcrumb();
 });
 function load_breadcrumb(){
   var content='<a href="'+PROJECT_URL+'app/socialHub/home" style="color:'+CURRENT_DARK_COLOR+';">Social Hub</a> / ';
       content+='<a href="'+PROJECT_URL+'app/socialHub/classmatepoint/home" style="color:'+CURRENT_DARK_COLOR+';">Classmate Point</a> / ';
       content+='<a href="'+PROJECT_URL+'app/socialHub/classmatepoint/institution/home/12345" style="color:'+CURRENT_DARK_COLOR+';">Osmania University</a> / ';
       content+='<a href="#" class="active" style="color:#797777;">Sri Indu Institute of Engineering and Technology</a>';
   document.getElementById("load_page_breadcrumb").innerHTML=content;
   if($('#load_page_breadcrumb').hasClass('hide-block')){ $('#load_page_breadcrumb').removeClass('hide-block'); }
 }
 </script-->
 <?php include_once 'templates/api/api_header_simple.php'; ?>
 <div id="load_page_breadcrumb" class="custom-breadcrumb hide-block"></div>

 <div class="container-fluid">
 <div class="scroller-divison row">
  <div class="scroller scroller-left col-xs-1" style="height:41px;">
    <i class="glyphicon glyphicon-chevron-left"></i>
  </div>
  <div id="socialHubClassmatePointScrollableTab" class="scrollTabwrapper col-xs-10"></div>
  <div class="scroller scroller-right col-xs-1" style="height:41px;">
	<i class="glyphicon glyphicon-chevron-right"></i>
  </div>
 </div>
 </div>

 <div id="cpointInstituteProfileDisplayDivision" class="hide-block">
  <?php include_once 'templates/pages/app-socialhub/classmatepoint/institute/institute-profile-view.php'; ?>
 </div>  
 
 
 <div id="cpointClassroomsDisplayDivision" class="hide-block">
   <?php include_once 'templates/pages/app-socialhub/classmatepoint/institute/listOfClassrooms-view.php';  ?>
 </div>
 <!-- END -->
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>