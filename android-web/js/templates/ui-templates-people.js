/*****************************************************************************************************************************
 *************************************************** PEOPLE MANAGEMENT UI TEMPLATE ***********************************************
 *****************************************************************************************************************************
 */
function uiTemplate_displayPeople_WithFriendsNonFriendsDiff(param_userId, param_profilepic, param_surName, param_name,
 param_minlocation,param_location,param_state,param_country,param_isFriend,param_youRecFrndRequest,param_youSentfrndRequest){
 var content='<div id="searchpeople_'+param_userId+'" class="list-group-item" style="padding:5px 0px;">';
	 content+='<div class="container-fluid pad0">';
	 content+='<div class="col-md-2 col-xs-5">';
	 content+='<img class="img-min-profilepic" src="'+param_profilepic+'"/>';
	 content+='</div>';
	 content+='<div align="left" class="col-md-6 col-xs-7 frnshipreqdiv pad5">';
	 content+='<h5><b>'+param_surName+' '+param_name+'</b></h5>';
	 content+='<span class="frnshipreqaddr">'+param_minlocation+', '+param_location+', '+param_state+', '+param_country+'</span>';
	 content+='</div>';
	 content+='<div id="searchpeople_btnsView_'+param_userId+'" align="center" class="col-md-4 col-xs-12 mtop15p mbot15p">';
 if(AUTH_USER_ID===param_userId){
	 content+=uiTemplate_displayPeople_viewMeButton();
 }
 else if(AUTH_USER_ID!==param_userId && param_isFriend==='NO') {
	 if(param_youRecFrndRequest==='YES'){
	    content+=uiTemplate_displayPeople_acceptRelationship(param_userId);
     } else if(param_youSentfrndRequest==='YES'){
	    content+=uiTemplate_displayPeople_reqSentDelRequest(param_userId);
	 } else {
		content+=uiTemplate_displayPeople_sendReqHidePeople(param_userId);
	 }
 } else if(AUTH_USER_ID!==param_userId && param_isFriend==='YES') {
    content+=uiTemplate_displayPeople_frndUnFrnd(param_userId);
 }
 content+='</div>';
 content+='</div>';
 content+='</div>';
 return content;
}

function uiTemplate_displayPeople_viewMeButton(){
  var content='<button class="btn btn-default custom-font m1 pull-right" ';
	  content+='style="color:'+CURRENT_DARK_COLOR+';font-size:11px;">';
	  content+='<b><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Me</b></button>';
  return content;
}
function uiTemplate_displayPeople_acceptRelationship(param_userId){
  var content='<button class="btn custom-bg custom-font m1 pull-right" onclick="javascript:acceptReqToMe(\''+param_userId+'\')"';
	  content+='style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;font-size:11px;">';
	  content+='<i class="fa fa-user" aria-hidden="true"></i>&nbsp;<b>Accept Friendship</b></button>';
  return content;
}
function uiTemplate_displayPeople_reqSentDelRequest(param_del_userId){
  var content='<div class="btn-group pull-right">';
	  content+='<button class="btn btn-default custom-font" style="color:'+CURRENT_DARK_COLOR+';font-size:11px;">';
	  content+='<b><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Request Sent</b></button>';
	  content+='<button class="btn custom-bg white-font" style="background-color:'+CURRENT_DARK_COLOR+';';
	  content+='color:#fff;font-size:11px;" onclick="javascript:delete_relationship_request(\''+param_del_userId+'\')"><b>Delete Request</b>&nbsp;';
      content+='<i class="fa fa-close" aria-hidden="true"></i></button>';
	  content+='</div>';
  return content;
}
function uiTemplate_displayPeople_sendReqHidePeople(param_userId){
 var content='<div class="btn-group pull-right">';
	 content+='<button class="btn custom-bg white-font" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;font-size:11px;" ';
	 content+='onclick="javascript:send_relationship_request(\''+param_userId+'\')">';
	 content+='<i class="fa fa-user" aria-hidden="true"></i>&nbsp;<b>Send Friend Request</b></button>';
	 content+='<button class="btn custom-lgt-bg custom-font" style="background-color:'+CURRENT_LIGHT_COLOR+';font-size:11px;" ';
	 content+='onclick="javascript:search_hide_currentPerson(\'searchpeople_'+param_userId+'\');">';
	 content+='<b>Hide</b>&nbsp;<i class="fa fa-close" aria-hidden="true"></i></button>';
	 content+='</div>';
 return content;
}
function uiTemplate_displayPeople_frndUnFrnd(param_userId){
 var content='<div class="btn-group pull-right">';
	 content+='<button class="btn btn-default custom-font" style="color:'+CURRENT_DARK_COLOR+';font-size:11px;"><b>';
	 content+='<i class="fa fa-check" aria-hidden="true"></i>&nbsp;Your Friend</b></button>';
	 content+='<button class="btn custom-bg custom-font white-font" style="background-color:'+CURRENT_DARK_COLOR+';';
	 content+='color:#fff;font-size:11px;" onclick="javascript:unfriendAperson(\''+param_userId+'\');">';
	 content+='<b>UnFriend</b>&nbsp;<i class="fa fa-close" aria-hidden="true"></i></button>';
	 content+='</div>';
 return content;
}

/* One User Sending Request to Other User */
function send_relationship_request(user_Id){
 document.getElementById("searchpeople_btnsView_"+user_Id).innerHTML=uiTemplate_displayPeople_reqSentDelRequest(user_Id);
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
 {action:'SEND_USERFRND_REQUESTS', projectURL: PROJECT_URL, from_user_Id:AUTH_USER_ID, to_user_Id:user_Id },function(resp){
  console.log(resp);
 });
}
/* Delete a Request that previously Sent */
function delete_relationship_request(user_Id){
document.getElementById("searchpeople_btnsView_"+user_Id).innerHTML=uiTemplate_displayPeople_sendReqHidePeople(user_Id);
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
{action:'DELETE_A_REQUEST_SENT',from_userId:AUTH_USER_ID, to_userId:user_Id },function(resp){
   console.log(resp);
});
}
/* AcceptRequestRecievedByMe */
function acceptReqToMe(user_Id){
document.getElementById("searchpeople_btnsView_"+user_Id).innerHTML=uiTemplate_displayPeople_frndUnFrnd(user_Id);
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
{action:'ACCEPT_FRNDREQUEST_TO_ME',requestFrom:user_Id, user_Id:AUTH_USER_ID },function(resp){ 
 console.log(resp);
});
}
/* UnFriend a Person */
function unfriendAperson(user_Id){  
document.getElementById("searchpeople_btnsView_"+user_Id).innerHTML=uiTemplate_displayPeople_sendReqHidePeople(user_Id);
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
{action:'UNFRIEND_A_PERSON',frnd1:user_Id, frnd2:AUTH_USER_ID },function(resp){ console.log(resp); });
}

function search_hide_currentPerson(id){ $('#'+id).hide(1000); }

/* User without close button icon Function */
function uiTemplate_userDisplayWithoutCloseButton(param_surName, param_name, param_profilepic, param_minlocation, 
             param_location,param_state,param_country){
/* Utility Description: 1) Used in app-search.php at (1) People Tab 
 * 
 */
var content='<div class="list-group">';
	content+='<div class="list-group-item">';
	content+='<div class="container-fluid pad0">';
	content+='<div class="row">';
	content+='<div class="col-xs-4"><img src="'+param_profilepic+'" class="img-min-profilepic"></div>';
	content+='<div class="col-xs-8">';
	content+='<div align="center" class="col-xs-12">';
	content+='<h5><b>'+param_surName+' '+param_name+'</b></h5>';
	content+='</div>';
	content+='<div align="center" class="col-xs-12" style="color:#999;">';
	content+=param_minlocation+', '+param_location+', '+param_state+', '+param_country;
	content+='</div>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
 return content;
}

/*****************************************************************************************************************************
 ************************************************** PEOPLE MANAGEMENT : END **************************************************
 *****************************************************************************************************************************
 */