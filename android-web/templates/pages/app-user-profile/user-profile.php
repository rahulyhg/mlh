<style>
a[href^="http://maps.google.com/maps"]{display:none !important}
a[href^="https://maps.google.com/maps"]{display:none !important}

.gmnoprint a, .gmnoprint span, .gm-style-cc {
    display:none;
}
body { overflow-y: hidden; }
</style>
<script type="text/javascript">
var GLOBAL_MAP;
var GLOBAL_ZOOMLEVEL;
$(document).ready(function(){ 
 initMap();
 loadUserDataByUserId(); 
});
function ui_btn_MeEditProfile(){
var content='<div class="container-fluid mbot15p">';
	content+='<div class="row">';
	content+='<div class="col-xs-12">';
	content+='<div class="btn-group pull-right">';
	content+='<button class="btn btn-default custom-font" style="color:'+CURRENT_DARK_COLOR+';">';
	content+='<b><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Me</b>';
	content+='</button>';
	content+='<button class="btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;">';
	content+='<b><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Edit Profile</b>';
	content+='</button>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
 return content;
}
function ui_btn_friends(){
var content='<div class="container-fluid mbot15p">';
    content+='<div class="row">';
	content+='<div class="col-xs-12">';
	content+='<div class="btn-group pull-right">';
	content+='<button class="btn btn-default custom-font" style="color:'+CURRENT_DARK_COLOR+';">';
	content+='<b><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Friends</b>';
    content+='</button>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
 return content;
}
function ui_btn_sendFriendRequest(){
var content='<div class="container-fluid mbot15p">';
	content+='<div class="row">';
    content+='<div class="col-xs-12">';
	content+='<div class="btn-group pull-right">';
	content+='<button class="btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;">';
	content+='<b><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Send Friend Request</b>';
	content+='</button>';
	content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
 return content;
}
function ui_btn_requestSentDeleteRequest(){
var content='<div class="container-fluid mbot15p">';
	content+='<div class="row">';
	content+='<div class="col-xs-12">';
	content+='<div class="btn-group pull-right">';
    content+='<button class="btn btn-default custom-font" style="color:'+CURRENT_DARK_COLOR+';">';
	content+='<b><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Request Sent</b>';
	content+='</button>';
	content+='<button class="btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;">';
	content+='<b>Delete Request&nbsp;<i class="fa fa-close" aria-hidden="true"></i>&nbsp;</b>';
	content+='</button>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
  return content;
}
function ui_display_Profile(user_Id,username,surName,name,dob,gender,profile_pic,about_me,minlocation,location,
			state,country,created_On,isAdmin,user_tz,acc_active,isFriend,frndRequest){
var content='<div class="container-fluid mbot15p">';
	content+='<div class="col-xs-4">';
	content+='<img src="'+profile_pic+'" style="width:80px;height:80px;background-color:#eee;border-radius:50%;"/>';
	content+='</div>';
	content+='<div class="col-xs-8">';
	content+='<div><h5><b>'+surName+' '+name+'</b></h5></div>';
	content+='<div style="line-height:22px;">'+minlocation+', '+location+', '+state+', '+country+'</div>';
	content+='</div>';
	content+='</div>';
      if(APP_USERPROFILE_ID===AUTH_USER_ID){ content+=ui_btn_MeEditProfile(); } 
 else {      if(isFriend==='YES' && frndRequest=='NO'){ content+=ui_btn_friends(); } 
		else if(isFriend==='NO' && frndRequest=='NO'){ content+=ui_btn_sendFriendRequest(); } 
		else if(isFriend==='NO' && frndRequest=='YES'){ content+=ui_btn_requestSentDeleteRequest(); }
      }
	content+='<div class="list-group mbot15p">';
	content+='<div class="list-group-item"><h5><b>About SurName Name</b></h5></div>';
	content+='<div class="list-group-item">';
	content+='<div align="center" style="color:#ccc;">No more Description</div>';
	content+='</div>';
	content+='</div>';
  return content;
}
function loadUserDataByUserId(){
 console.log("user_Id: "+APP_USERPROFILE_ID); // APP_USERPROFILE_ID from app-user-profile.php
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.authentication.php',
	{ action:'GET_USERACCOUNT_PROFILE', profile_user_Id:APP_USERPROFILE_ID, user_Id:AUTH_USER_ID },
	function(response){ 
	console.log(response);
	response=JSON.parse(response);
	var user_Id=response[0].user_Id;
	var username=response[0].username;
	var surName=response[0].surName;
	var name=response[0].name;
	var dob=response[0].dob;
	var gender=response[0].gender;
	var profile_pic=response[0].profile_pic;
	var about_me=response[0].about_me;
	var minlocation=response[0].minlocation;
	var location=response[0].location;
	var state=response[0].state;
	var country=response[0].country;
	var created_On=response[0].created_On;
	var isAdmin=response[0].isAdmin;
	var user_tz=response[0].user_tz;
	var acc_active=response[0].user_tz;
	var isFriend=response[0].isFriend;
	var frndRequest=response[0].frndRequest; 
	document.getElementById("user-profile-general-content").innerHTML=ui_display_Profile(user_Id,username,surName,
	name,dob,gender,profile_pic,about_me,minlocation,location,state,country,created_On,isAdmin,user_tz,acc_active,
	isFriend,frndRequest);
	stopAppProgressLoader(); });
}
function initMap() {
 GLOBAL_ZOOMLEVEL=18;
 GLOBAL_MAP = new google.maps.Map(document.getElementById('userActualGeoLocationMap'), 
					{ scrollwheel: false, zoomControl: false, zoom: GLOBAL_ZOOMLEVEL });
 var pos1 = { lat: 17.2983179, lng: 78.4298406 };
 var pos2 = { lat: 17.2993189, lng: 78.4298416 };
 GLOBAL_MAP.setCenter(pos2);
 
 /* Marker Icons : http://maps.google.com/mapfiles/ms/icons/green-dot.png
  *				   http://maps.google.com/mapfiles/ms/icons/blue-dot.png
  *				   http://maps.google.com/mapfiles/ms/icons/red-dot.png
  */
 var marker1 = new google.maps.Marker({ icon:'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
 position: pos1,animation: google.maps.Animation.BOUNCE, map: GLOBAL_MAP });
 marker1.setMap(GLOBAL_MAP);
 var marker2 = new google.maps.Marker({ icon:'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
 position: pos2,animation: google.maps.Animation.BOUNCE, map: GLOBAL_MAP });
 marker2.setMap(GLOBAL_MAP);
}
function zoomIn() {
 if(GLOBAL_ZOOMLEVEL<18) { GLOBAL_ZOOMLEVEL=GLOBAL_ZOOMLEVEL+1; GLOBAL_MAP.setZoom(GLOBAL_ZOOMLEVEL); }
}
function zoomOut() {
 if(GLOBAL_ZOOMLEVEL>=4) { GLOBAL_ZOOMLEVEL=GLOBAL_ZOOMLEVEL-1;GLOBAL_MAP.setZoom(GLOBAL_ZOOMLEVEL); }
}
</script>
<!--a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/user/USR255798352927">User profile</a-->
<div id="user-profile-general-content">

</div>

<div class="list-group mbot15p">
  <div class="list-group-item">
    <b>User Current Geolocation&nbsp;<i class="fa fa-angle-double-down pull-right" aria-hidden="true"></i></b>
  </div>
  <div class="list-group-item pad0">
    <div id="userActualGeoLocationMap" style="width:100%;height:400px;background-color:#eee;"></div>
  </div>
  <div class="list-group-item pad0">
  <div class="container-fluid pad0">
    <button class="btn btn-default col-xs-6" onclick="javascript:zoomOut();">
	  <b><i class="fa fa-search-minus" aria-hidden="true"></i>&nbsp;Zoom-Out</b>
	</button>
    <button class="btn btn-default col-xs-6" onclick="javascript:zoomIn();">
	  <b><i class="fa fa-search-plus" aria-hidden="true"></i>&nbsp;Zoom-In</b>
	</button>
   </div>
  </div>
  <div class="list-group-item pad0">
    <div class="container-fluid">
	  <div class="col-xs-6">
		       <div align="right" class="mtop15p"><img src="http://maps.google.com/mapfiles/ms/icons/blue-dot.png"/></div>
			   <div align="right" class="mtop15p" style="line-height:22px;">
				  <b>Your Location</b>&nbsp;last updated on 15 August 1991, 10:12:10 PM
			   </div>
	  </div>
	  <div class="col-xs-6" style="border-left:1px solid #eee;">
		       <div align="left" class="mtop15p"><img src="http://maps.google.com/mapfiles/ms/icons/green-dot.png"/></div>
			   <div align="left" class="mtop15p"><b>SurName Name's Location</b>&nbsp;last updated on 15 August 1991, 10:12:10 PM</div>
	  </div>
	</div>
  </div>
</div>