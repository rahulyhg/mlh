$(document).ready(function(){ 
 initMap();
 loadUserDataByUserId(); 
});
/*****************************************************************************************************************************/
/********************************************* USER-INTERFACE CONTENT ********************************************************/
/*****************************************************************************************************************************/
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
	if(document.getElementById("user-profile-general-content")!=null){
	  document.getElementById("user-profile-general-content").innerHTML=ui_display_Profile(user_Id,username,surName,
	    name,dob,gender,profile_pic,about_me,minlocation,location,state,country,created_On,isAdmin,user_tz,acc_active,
	    isFriend,frndRequest);
	}
	stopAppProgressLoader(); });
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
	content+='<div id="UserProfileButtons">';
      if(APP_USERPROFILE_ID===AUTH_USER_ID){ content+=ui_btn_MeEditProfile(); } 
 else {      if(isFriend==='YES' && frndRequest=='NO'){ content+=ui_btn_friends(); } 
		else if(isFriend==='NO' && frndRequest=='NO'){ content+=ui_btn_sendFriendRequest(user_Id); } 
		else if(isFriend==='NO' && frndRequest=='YES'){ content+=ui_btn_requestSentDeleteRequest(user_Id); }
      }
	content+='</div>';
	content+='<div class="list-group mbot15p">';
	content+='<div class="list-group-item custom-font" style="color:'+CURRENT_DARK_COLOR+';"><h5><b>About '+surName+' '+name+'</b></h5></div>';
	content+='<div class="list-group-item">';
	content+='<div align="center" style="color:#ccc;">';
	     if(about_me.length===0){ content+='No more Description'; } 
	else { content+=about_me; }
	content+='</div>';
	content+='</div>';
	content+='</div>';
  return content;
}

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

function ui_btn_sendFriendRequest(user_Id){
var content='<div class="container-fluid mbot15p">';
	content+='<div class="row">';
    content+='<div class="col-xs-12">';
	content+='<div class="btn-group pull-right">';
	content+='<button class="btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;"';
	content+=' onclick="javascript:send_relationship_request(\''+user_Id+'\');">';
	content+='<b><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Send Friend Request</b>';
	content+='</button>';
	content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
 return content;
}

function ui_btn_requestSentDeleteRequest(user_Id){
var content='<div class="container-fluid mbot15p">';
	content+='<div class="row">';
	content+='<div class="col-xs-12">';
	content+='<div class="btn-group pull-right">';
    content+='<button class="btn btn-default custom-font" style="color:'+CURRENT_DARK_COLOR+';">';
	content+='<b><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Request Sent</b>';
	content+='</button>';
	content+='<button class="btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;"';
	content+=' onclick="javascript:delete_relationship_request(\''+user_Id+'\');">';
	content+='<b>Delete Request&nbsp;<i class="fa fa-close" aria-hidden="true"></i>&nbsp;</b>';
	content+='</button>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
  return content;
}

/* One User Sending Request to Other User */
function send_relationship_request(user_Id){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
 {action:'SEND_USERFRND_REQUESTS', projectURL: PROJECT_URL, from_user_Id:AUTH_USER_ID, to_user_Id:user_Id },function(resp){
  console.log(resp);
  document.getElementById("UserProfileButtons").innerHTML=ui_btn_requestSentDeleteRequest(user_Id);
 });
}
/* Delete a Request that previously Sent */
function delete_relationship_request(user_Id){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
{action:'DELETE_A_REQUEST_SENT',from_userId:AUTH_USER_ID, to_userId:user_Id },function(resp){
   console.log(resp);
   document.getElementById("UserProfileButtons").innerHTML=ui_btn_sendFriendRequest(user_Id);
});
}

/*****************************************************************************************************************************/
/************************************************* USER MAP ******************************************************************/
/*****************************************************************************************************************************/

