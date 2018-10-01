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
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/easy-autocomplete.min.css"/>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/core-skeleton.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery-ui.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/db.identity.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <?php include_once 'templates/api/api_js.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-socialhub-classmatepoint-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.easy-autocomplete.min.js"></script>
 <!--link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script-->
<script type="text/javascript">
var TAB_POINT='<?php if(isset($_GET["1"])){ echo $_GET["1"]; } ?>';
var INSTITUTION_ID='<?php if(isset($_GET["2"])){ echo $_GET["2"]; } ?>';
var INSTITUTION_BOARD;
$(document).ready(function(){
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
 startAppProgressLoader('info');
 generateTabList();
 tabPointDisplayer();
});
function tabPointDisplayer(){
      if(TAB_POINT==='viewProfile'){  hzTabSelection('cpointUniversityProfileHzTab',''); }
 else if(TAB_POINT==='newsfeed'){ hzTabSelection('cpointNewsFeedHzTab',''); }
 else if(TAB_POINT==='listOfColleges'){ hzTabSelection('cpointCollegesHzTab','-80'); }
 else if(TAB_POINT==='courses'){ hzTabSelection('cpointCoursesHzTab','-200'); }
 else if(TAB_POINT==='movements'){ hzTabSelection('cpointMovementsHzTab','-240'); } 
}
function generateTabList(){ 
 var content='<ul class="nav scrollTablist" id="socialhubclassmatepointTab" style="border-bottom:0px;">';
     content+='<li><a id="cpointNewsFeedHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>NewsFeed</b></a></li>';
	 content+='<li><a id="cpointUniversityProfileHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Institution Profile</b></a></li>';
	 content+='<li><a id="cpointCollegesHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>List of Colleges</b></a></li>';
	 content+='<li><a id="cpointCoursesHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Courses</b></a></li>';
	 content+='<li><a id="cpointMovementsHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Movements</b></a></li>';
	 content+='<li><a id="cpointElectionsHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Elections</b></a></li>';
	 content+='</ul>'; 
  document.getElementById("socialHubClassmatePointScrollableTab").innerHTML=content;
}
function hzTabSelection(id,orientation){ 
 var arryHzTab=["cpointNewsFeedHzTab","cpointUniversityProfileHzTab","cpointCollegesHzTab","cpointCoursesHzTab",
				"cpointMovementsHzTab","cpointElectionsHzTab"];
 var arryTabDataViewer=["cpointNewsFeedProfileDisplayDivision","cpointUniversityProfileDisplayDivision",
 "cpointCollegesDisplayDivision","cpointCoursesDisplayDivision","cpointMovementsDisplayDivision",
 "cpointElectionsDisplayDivision"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer);
 if(orientation.length>0){
   $('#socialhubclassmatepointTab').css('left',orientation+'px');
 }
      if(id==='cpointNewsFeedHzTab'){  }
 else if(id==='cpointUniversityProfileHzTab'){ load_data_institutionProfile(); }
 else if(id==='cpointCollegesHzTab'){ instituteDataInitializer(); }
 else if(id==='cpointCoursesHzTab'){ 
    if(INSTITUTION_BOARD==undefined){ load_data_institutionBoard(); } 
	coursesDataInitializer(); 
 } 
 else if(id==='cpointMovementsHzTab'){  }
 else if(id==='cpointElectionsHzTab'){  }
}

function load_data_institutionProfile(){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
 { action:'GET_DATA_INSTITUTIONBYID', institutionId:INSTITUTION_ID },function(response){
   stopAppProgressLoader();
   if($('#app-profile-body').hasClass('hide-block')){ $('#app-profile-body').removeClass('hide-block'); }
   console.log(response);
   response=JSON.parse(response);
   var cmp_u_Id = response[0].cmp_u_Id;
   var institutionName = response[0].institutionName;
   var institutionType = response[0].institutionType;
   var institutionBoard = response[0].institutionBoard;
       INSTITUTION_BOARD=institutionBoard;
   var aboutinstitution = response[0].aboutinstitution;
   var institutionpic = response[0].profile_pic;
   var establishedOn = response[0].establishedOn;
   var foundedBy1 = response[0].foundedBy1;
   var foundedBy2 = response[0].foundedBy2;
   var foundedBy3 = response[0].foundedBy3;
   var foundedBy4 = response[0].foundedBy4;
   var foundedBy5 = response[0].foundedBy5;
   var web_url = response[0].web_url;
   var createdBy = response[0].createdBy;
   var createdByJSONData = JSON.parse(createdBy);
   var user_Id = createdByJSONData.user_Id;
   var surName = createdByJSONData.surName;
   var name = createdByJSONData.name;
   var profile_pic = createdByJSONData.profile_pic;
   var minlocation = createdByJSONData.minlocation;
   var location = createdByJSONData.location;
   var state = createdByJSONData.state;
   var country = createdByJSONData.country;
   var students = response[0].students;
   var professors = response[0].professors;
   var colleges = response[0].colleges;
   var courses = response[0].courses;
  
   var content='<div class="container-fluid" style="background-color:#f5f5f5;">';
       content+='<div class="row">';
       content+='<div id="instprofile_institutionImg" align="center" class="col-xs-12">';
       content+='<img src="'+institutionpic+'" class="mtop15p profile_pic_img"/>';
       content+='</div>';
       content+='<div align="center" class="col-xs-12 mtop15p">';
       content+='<h5 id="instprofile_institutionName">';
	   content+='<span><b>'+institutionName+'</b></span>';
	   content+='</h5>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="list-group">';
       content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid">';
       content+='<div class="row">';
       content+='<div class="col-xs-5" style="border-right:1px solid #e7e7e7;">';
       content+='<div align="center"><h5><b>Established in</b></h5></div>';
	   content+='<div align="center"><h5 id="instprofile_institutionEstb" class="grey-lgt-font">'+establishedOn+'</h5></div>';
       content+='</div>';
       content+='<div class="col-xs-7">';
       content+='<div align="center"><h5><b>College Type</b></h5></div>';
	   content+='<div align="center"><h5 id="instprofile_institutionType" class="grey-lgt-font">'+institutionType+'</h5></div>';
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
       content+='<div class="col-xs-12"><div><h5><b>About Us</b></h5></div></div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="list-group-item grey-font">'+aboutinstitution+'</div>';
	   if(web_url.length>0){
	   content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid">';
       content+='<div class="col-xs-12"><div><h5><b>Website</b></h5></div></div>';
       content+='</div>';
       content+='</div>';
	   content+='<div class="list-group-item grey-font">'+web_url+'</div>';
	   }
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="list-group">';
       content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid">';
       content+='<div class="row">';
       content+='<div align="center" class="col-xs-6" style="border-right:1px solid #ccc;">';
       content+='<div><h5><b>Students</b></h5></div>';
       content+='<div><h5 class="grey-lgt-font">'+students+'</h5></div>';
       content+='</div>';
       content+='<div align="center" class="col-xs-6">';
       content+='<div><h5><b>Professors</b></h5></div>';
       content+='<div><h5 class="grey-lgt-font">'+professors+'</h5></div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid">';
       content+='<div class="row">';
       content+='<div align="center" class="col-xs-6" style="border-right:1px solid #ccc;">';
       content+='<div><h5><b>Colleges</b></h5></div>';
       content+='<div><h5 class="grey-lgt-font">'+colleges+'</h5></div>';
       content+='</div>';
       content+='<div align="center" class="col-xs-6">';
       content+='<div><h5><b>Courses</b></h5></div>';
       content+='<div><h5 class="grey-lgt-font">'+courses+'</h5></div>';
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
       content+='<div class="col-xs-12"><div><h5><b>Profile created by</b></h5></div></div>';
       content+='</div>';
       content+='</div>';
       content+='<div class="list-group-item pad0">';
	   content+='<div class="container-fluid mtop15p mbot15p">';
	   content+='<div class="row">';
	   content+='<div align="center" class="col-xs-5">';
	   content+='<img src="'+profile_pic+'" class="profile_pic_img3"/>';
	   content+='</div>';
	   content+='<div class="col-xs-7 pad0">';
	   content+='<div><b>'+surName+' '+name+'</b></div>';
	   content+='<div class="grey-lgt-font mtop10p">'+minlocation+', '+location+', '+state+', '+country+'</div>';
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
	   content+='<div class="col-xs-12">';
	   content+='<h5 class="grey-lgt-font"><b>'+foundedBy1+'</b></h5>';
	   content+='</div>';
	   if(foundedBy2.length>0){
	   content+='<div class="col-xs-12">';
	   content+='<h5 class="grey-lgt-font"><b>'+foundedBy2+'</b></h5>';
	   content+='</div>';
	   }
	   if(foundedBy3.length>0){
	   content+='<div class="col-xs-12">';
	   content+='<h5 class="grey-lgt-font"><b>'+foundedBy3+'</b></h5>';
	   content+='</div>';
	   }
	   if(foundedBy4.length>0){
	   content+='<div class="col-xs-12">';
	   content+='<h5 class="grey-lgt-font"><b>'+foundedBy4+'</b></h5>';
	   content+='</div>';
	   }
	   if(foundedBy5.length>0){
	   content+='<div class="col-xs-12">';
	   content+='<h5 class="grey-lgt-font"><b>'+foundedBy5+'</b></h5>';
	   content+='</div>';
	   }
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';     
	document.getElementById("cpointUniversityProfileDisplayDivision").innerHTML=content;
  });
}
function instituteDataInitializer(){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
 { action:'GET_COUNT_INSTITUTES', institutionId:INSTITUTION_ID },function(total_data){
   total_data=parseInt(total_data);
   stopAppProgressLoader();
   if($('#app-profile-body').hasClass('hide-block')){ $('#app-profile-body').removeClass('hide-block'); }
   if(total_data>0){
   var content='<div class="row">';
       content+='<div class="col-xs-8">';
       content+='<div align="left" class="mtop10p" style="font-size:12px;">';
	   content+='<span style="color:#808080;"><b>Your Search Results:</b></span>';
	   content+='<span class="custom-font" style="color:'+CURRENT_DARK_COLOR+'"><b>';
	   if(total_data==1){ content+=total_data+' College Found'; }
	   else { content+=total_data+' Colleges Found'; }
	   content+='</span>';
	   content+='</div>';
       content+='</div>';
       content+='</div>';
   document.getElementById("cpointCollegesResults").innerHTML=content; 
   scroll_loadInitializer('cpointCollegesResultsData',10,instituteContentData,total_data);
   
 } else {
    var content='<div align="center" style="color:#ccc;">No College found</div>';
    document.getElementById("cpointCollegesResultsData0").innerHTML=content;
  }
 });
}
function instituteContentData(div_view, appendContent,limit_start,limit_end){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
 { action:'GET_DATA_INSTITUTES', institutionId:INSTITUTION_ID, limit_start:limit_start, limit_end:limit_end },
 function(response){
   console.log("instituteContentData: "+response);
   response=JSON.parse(response);
   var content='<div class="row">';
   for(var index=0;index<response.length;index++){
    var cmp_sch_Id=response[index].cmp_sch_Id;
	var instituteName=response[index].instituteName;
	var profile_pic=response[index].profile_pic;
	var students=response[index].students;
	var professors=response[index].professors;
	   content+='<div class="col-xs-12">';
	   content+='<a class="a-custom" href="'+PROJECT_URL+'app/socialHub/classmatepoint/institute/home/'+cmp_sch_Id+'">';
	   content+='<div class="list-group">';
	   content+='<div class="list-group-item pad0">';
	   content+='<div class="container-fluid mtop15p mbot15p">';
	   content+='<div class="row">';
	   content+='<div align="center" class="col-xs-12">';
	   content+='<div><img src="'+profile_pic+'" class="profile_pic_img"/></div>';
	   content+='<div class="mtop15p"><b>'+instituteName+'</b></div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='<div class="list-group-item pad0">';
	   content+='<div class="container-fluid">';
	   content+='<div class="row">';
	   content+='<div align="center" class="col-xs-6" style="border-right:1px solid #ccc;">';
	   content+='<div class="mtop15p"><h5><b>Students</b></h5></div>';
	   content+='<div class="grey-lgt-font mbot15p"><b>'+students+'</b></div>';
	   content+='</div>';
	   content+='<div align="center" class="col-xs-6" style="border-right:1px solid #ccc;">';
	   content+='<div class="mtop15p"><h5><b>Professors</b></h5></div>';
	   content+='<div class="grey-lgt-font mbot15p"><b>'+professors+'</b></div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</a>';
       content+='</div>';
   }
	
   
       
	   
       content+='</div>';
	   content+=appendContent;
   document.getElementById(div_view).innerHTML=content;
 });
}
function coursesDataInitializer(){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
 { action:'GET_COUNT_COURSES', institution_Id:INSTITUTION_ID },function(total_data){ 
    console.log("total_data: "+total_data);
    total_data=parseInt(total_data);
   stopAppProgressLoader();
   if($('#app-profile-body').hasClass('hide-block')){ $('#app-profile-body').removeClass('hide-block'); }
   if(total_data>0){
   var content='<div class="row">';
       content+='<div class="col-xs-8">';
       content+='<div align="left" class="mtop10p" style="font-size:12px;">';
	   content+='<span style="color:#808080;"><b>Your Search Results:</b></span>';
	   content+='<span class="custom-font" style="color:'+CURRENT_DARK_COLOR+'"><b>';
	   if(total_data==1){ content+=total_data+' Course Found'; }
	   else { content+=total_data+' Courses Found'; }
	   content+='</span>';
	   content+='</div>';
       content+='</div>';
       content+='</div>';
   document.getElementById("cpointCoursesResults").innerHTML=content; 
   scroll_loadInitializer('cpointCoursesResultsData',10,coursesContentData,total_data);
   //   
 } else {
    var content='<div align="center" style="color:#ccc;">No College found</div>';
    document.getElementById("cpointCoursesResultsData0").innerHTML=content;
  }
 });
}
function coursesContentData(div_view,appendContent,limit_start,limit_end){
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
 { action:'GET_DATA_COURSES', institution_Id:INSTITUTION_ID, limit_start: limit_start, limit_end:limit_end },
 function(response){ 
   console.log("Courses: "+response);
   response = JSON.parse(response);
   var content='';
   for(var index=0;index<response.length;index++){
    var cmp_course_Id = response[index].cmp_course_Id;
    var courseName = response[index].courseName;
    var duration = response[index].duration;
    var begMonth = response[index].begMonth;
    var endMonth = response[index].endMonth;
	var students = response[index].students;
    var professors = response[index].professors;
	
	   content+='<div class="container-fluid mtop15p ">';
	   content+='<div class="row">';
	   content+='<div class="col-xs-12">';
	   content+='<div class="list-group">';
	   content+='<div class="list-group-item pad0" style="background-color:#f9f9f9;">';
	   content+='<div class="container-fluid mtop15p mbot15p">';
	   content+='<div class="row">';
	   content+='<div align="center" class="col-xs-12">';
	   content+='<div><h5><b>'+courseName+'</b></h5></div>';
	   content+='</div>';
	   content+='</div>';
	   content+='<div class="row mtop15p fs12">';
	   content+='<div align="left" class="col-xs-6">';
	   content+='<div>Duration of course</div>';
	   if(duration==='1'){
	   content+='<div style="color:#aaa;"><i>'+duration+' year</i></div>';
	   } else {
	   content+='<div style="color:#aaa;"><i>'+duration+' years</i></div>';
	   }
	   content+='</div>';
	   content+='<div align="right" class="col-xs-6">';
	   content+='<div>Starts in <span style="color:#aaa;"><i>'+begMonth+'</i></span></div>';
	   content+='<div>Ends in <span style="color:#aaa;"><i>'+endMonth+'</i></span></div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='<div class="list-group-item pad0">';
	   content+='<div class="container-fluid">';
	   content+='<div class="row">';
	   content+=' <div align="center" class="col-xs-6" style="border-right:1px solid #ccc;">';
	   content+='<div class="mtop15p"><h5><b>Students</b></h5></div>';
	   content+='<div class="mbot15p" style="color:#aaa;">'+students+'</div>';
	   content+='</div>';
	   content+='<div align="center" class="col-xs-6">';
	   content+='<div class="mtop15p"><h5><b>Professors</b></h5></div>';
	   content+='<div class="mbot15p"  style="color:#aaa;">'+professors+'</div>';
	   content+='</div>';
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
 
 <!--script type="text/javascript">
 $(document).ready(function(){
  // load_breadcrumb();
 });
 function load_breadcrumb(){
   var content='<a href="'+PROJECT_URL+'app/socialHub/home" style="color:'+CURRENT_DARK_COLOR+';">Social Hub</a> / ';
       content+='<a href="'+PROJECT_URL+'app/socialHub/classmatepoint/home" style="color:'+CURRENT_DARK_COLOR+';">Classmate Point</a> / ';
       content+='<a href="#" class="active" style="color:#797777;">Osmania University</a> ';
   document.getElementById("load_page_breadcrumb").innerHTML=content;
   if($('#load_page_breadcrumb').hasClass('hide-block')){ $('#load_page_breadcrumb').removeClass('hide-block'); }
 }
 </script-->
 <?php include_once 'templates/api/api_header_simple.php'; ?>
 <div id="load_page_breadcrumb" class="custom-breadcrumb hide-block"></div>

 <?php include_once 'templates/api/api_progressbar.php'; ?>
 <div id="app-profile-body" class="hide-block">
 <!-- START -->  
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
 <div id="cpointNewsFeedProfileDisplayDivision" class="hide-block"></div>  
 <div id="cpointUniversityProfileDisplayDivision" class="hide-block"></div>  
 <div id="cpointCollegesDisplayDivision" class="hide-block">
     <div align="right" id="cpointAddColleges" class="container-fluid mtop15p">
	  <div class="col-xs-12">
	   <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/socialHub/classmatepoint/institute/create/<?php if(isset($_GET["2"])){ echo $_GET["2"]; } ?>">
	   <button class="btn btn-default"><b>Add Institute</b></button>
	   </a>
	  </div>
	 </div>
	 <div id="cpointCollegesResults" class="container-fluid mtop15p"></div>
     <div id="cpointCollegesResultsData0" class="container-fluid mtop15p "></div>
 </div>
 <div id="cpointCoursesDisplayDivision" class="hide-block">
   <?php include_once 'templates/pages/app-socialhub/classmatepoint/institution/addCourse.php';  ?>
   
   <div id="cpointAddCourses" class="container-fluid mtop15p">
    <div align="right" class="col-xs-12">
	   <button class="btn btn-default" onclick="javascript:viewAddCourseModal();"><b>Add Course</b></button>
	</div>
   </div> 
   <div id="cpointCoursesResults" class="container-fluid mtop15p"></div>
   <div id="cpointCoursesResultsData0" class="container-fluid mtop15p "></div>
     <?php include_once 'templates/pages/app-socialhub/classmatepoint/institution/listOfCourses-view.php';  ?>
 </div>
 <div id="cpointMovementsDisplayDivision" class="hide-block">
 
 </div>
 <div align="center" id="cpointElectionsDisplayDivision" class="hide-block" style="margin-top:15%;">
   <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/other/cpoint_elections_logo.png" style="width:90%;height:auto;"/>
 </div> 
 </div>
 <!-- END -->
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>