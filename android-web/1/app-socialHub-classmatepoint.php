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
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
 generateTabList();
 hzTabSelection('cpointUniversityHzTab','');
});
function generateTabList(){ 
 var content='<ul class="nav scrollTablist" id="socialhubclassmatepointTab" style="border-bottom:0px;">';
	 content+='<li><a id="cpointUniversityHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>University</b></a></li>';
	 content+='<li><a id="cpointCollegesHzTab" href="#" onclick="javascript:hzTabSelection(this.id,\'\');"><b>Intermediate</b></a></li>';
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
 
 <!-- START -->
 <script type="text/javascript">
 $(document).ready(function(){
  // load_breadcrumb();
 });
 function load_breadcrumb(){
   var content='<a href="'+PROJECT_URL+'app/socialHub/home" style="color:'+CURRENT_DARK_COLOR+';">Social Hub</a> / ';
       content+='<a href="#" class="active" style="color:#797777;">Classmate Point</a>';
   document.getElementById("load_page_breadcrumb").innerHTML=content;
   if($('#load_page_breadcrumb').hasClass('hide-block')){ $('#load_page_breadcrumb').removeClass('hide-block'); }
 }
 </script>
 <?php include_once 'templates/api/api_header_simple.php'; ?>
 <div id="load_page_breadcrumb" class="custom-breadcrumb hide-block"></div>
 
 <div class="list-group" style="margin-bottom:0px;">
 <div class="list-group-item" style="background-color:#e7e7e7;border-radius:0px;">
   <div class="container-fluid">
   <div class="row">
    <div class="col-xs-12"><span style="font-size:16px;">
      <b>Classmate Point</b></span>&nbsp; is a point where you can find your classmates, 
      stay connected and share the Activities.
	  <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/socialHub/classmatepoint/institution/create" class="a-custom">
       <button class="btn btn-default mtop10p pull-right"><b>Create Institution</b></button></a>
    </div>
   </div>
  </div>
 </div>
 </div>
	 
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
<script type="text/javascript">
$(document).ready(function(){
universityDataInitializer();
collegeDataInitializer();
schoolDataInitializer();
});
function universityDataInitializer(){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
{ action:'GET_COUNT_INSTITUTIONS', institutionBoard:'UNIVERSITY_BOARD' },function(total_data){
  total_data=parseInt(total_data);
  if(total_data>0){
    var content='<div align="left" class="mbot15p" style="font-size:12px;">';
		  content+='<span style="color:#808080;">';
		  content+='<b>Your Search Results:</b> ';
		  content+='</span>';
		  content+='<span style="color:'+CURRENT_DARK_COLOR+'"><b>';
		  if(total_data==1){ content+=total_data+' University Found'; }
		  else { content+=total_data+' Universities Found'; }
		  content+='</b></span>';
		  content+='</div>';
	document.getElementById("universityDataResults").innerHTML=content; 
    scroll_loadInitializer('classmatepoint_university',10,universityContentData,total_data);
  } else {
    var content='<div align="center" style="color:#ccc;">No University found</div>';
    document.getElementById("classmatepoint_university0").innerHTML=content;
  }
});
}
function universityContentData(div_view, appendContent,limit_start,limit_end){ 
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
 { action:'GET_DATA_INSTITUTIONS', institutionBoard:'UNIVERSITY_BOARD', limit_start:limit_start, limit_end:limit_end },
 function(response){
   var content=institutionResponseBuilder(response);
	   content+=appendContent;
   document.getElementById(div_view).innerHTML=content;
   
 });
}
function collegeDataInitializer(){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
{ action:'GET_COUNT_INSTITUTIONS', institutionBoard:'COLLEGE_BOARD' },function(total_data){
 total_data=parseInt(total_data);
 if(total_data>0){
   var content='<div align="left" class="mbot15p" style="font-size:12px;">';
		  content+='<span style="color:#808080;">';
		  content+='<b>Your Search Results:</b> ';
		  content+='</span>';
		  content+='<span style="color:'+CURRENT_DARK_COLOR+'"><b>';
		  if(total_data==1){ content+=total_data+' College Found'; }
		  else { content+=total_data+' Colleges Found'; }
		  content+='</b></span>';
		  content+='</div>';
	document.getElementById("collegeDataResults").innerHTML=content; 
    scroll_loadInitializer('classmatepoint_colleges',10,collegeContentData,total_data);
 } else {
    var content='<div align="center" style="color:#ccc;">No College found</div>';
    document.getElementById("classmatepoint_colleges0").innerHTML=content;
  }
});
}
function collegeContentData(div_view, appendContent,limit_start,limit_end){ 
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
 { action:'GET_DATA_INSTITUTIONS', institutionBoard:'COLLEGE_BOARD', limit_start:limit_start, limit_end:limit_end },
 function(response){
   var content=institutionResponseBuilder(response);
	   content+=appendContent;
   document.getElementById(div_view).innerHTML=content;
 });
}
function schoolDataInitializer(){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
{ action:'GET_COUNT_INSTITUTIONS', institutionBoard:'SSC_BOARD' },function(total_data){
 total_data=parseInt(total_data);
 if(total_data>0){
   var content='<div align="left" class="mbot15p" style="font-size:12px;">';
		  content+='<span style="color:#808080;">';
		  content+='<b>Your Search Results:</b> ';
		  content+='</span>';
		  content+='<span style="color:'+CURRENT_DARK_COLOR+'"><b>';
		  if(total_data==1){ content+=total_data+' School Found'; }
		  else { content+=total_data+' Schools Found'; }
		  content+='</b></span>';
		  content+='</div>';
   document.getElementById("schoolDataResults").innerHTML=content; 
   scroll_loadInitializer('classmatepoint_schools',10,schoolContentData,total_data);
   
 } else {
    var content='<div align="center" style="color:#ccc;">No School found</div>';
    document.getElementById("classmatepoint_schools0").innerHTML=content;
  }
});
}
function schoolContentData(div_view, appendContent,limit_start,limit_end){ 
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
 { action:'GET_DATA_INSTITUTIONS', institutionBoard:'SSC_BOARD', limit_start:limit_start, limit_end:limit_end },
 function(response){
   var content=institutionResponseBuilder(response);
	   content+=appendContent;
   document.getElementById(div_view).innerHTML=content;
 });
}
function institutionResponseBuilder(response){
response=JSON.parse(response);
var content='<div class="col-xs-12">';
for(var index=0;index<response.length;index++){
 var cmp_u_Id=response[index].cmp_u_Id;
 var institutionName=response[index].institutionName;
 var profile_pic=response[index].profile_pic;
 var students=response[index].students;
 var professors=response[index].professors;
 content+='<a href="'+PROJECT_URL+'app/socialHub/classmatepoint/institution/home/viewProfile/'+cmp_u_Id+'" class="a-custom">';
 content+='<div class="list-group">';
 content+='<div class="list-group-item pad0" style="background-color:#f5f5f5;">';
 content+='<div class="container-fluid mtop15p mbot15p">';
 content+='<div class="row">';
 content+='<div align="center" class="col-xs-12">';
 content+='<div><img src="'+profile_pic+'" class="profile_pic_img3"/></div>';
 content+='<div class="mtop15p"><b>'+institutionName+'</b></div>';
 content+='</div>';
 content+='</div>';
 content+='</div>';
 content+='</div>';
 content+='<div class="list-group-item pad0">';
 content+='<div class="container-fluid">';
 content+='<div class="row">';
 content+='<div align="center" class="col-xs-6" style="border-right:1px solid #ccc;">';
 content+='<div class="mtop15p"><h5><b>Students</b></h5></div>';
 content+='<div class="mbot15p grey-lgt-font"><b>'+students+'</b></div>';
 content+='</div>';
 content+='<div align="center" class="col-xs-6">';
 content+='<div class="mtop15p"><h5><b>Professors</b></h5></div>';
 content+='<div class="mbot15p grey-lgt-font"><b>'+professors+'</b></div>';
 content+='</div>';
 content+='</div>';
 content+='</div>';
 content+='</div>';
 content+='</div>';
 content+='</a>';
}
content+='</div>';
return content;
}
</script>
 <div id="cpointUniversityDisplayDivision" class="container-fluid mtop15p hide-block">
   <?php include_once 'templates/pages/app-socialhub/classmatepoint/university.php'; ?>
 </div>
 
 <div id="cpointCollegesDisplayDivision" class="container-fluid mtop15p hide-block">
   <?php include_once 'templates/pages/app-socialhub/classmatepoint/colleges.php'; ?>
 </div>
 
 <div id="cpointSchoolsDisplayDivision" class="container-fluid mtop15p hide-block">
   <?php include_once 'templates/pages/app-socialhub/classmatepoint/schools.php'; ?>
 </div>
 <!-- END -->
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>