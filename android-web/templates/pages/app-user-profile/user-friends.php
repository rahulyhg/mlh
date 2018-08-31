<script type="text/javascript">
/****************************************************************************************************************************/
/********************************************* My Friends Menu **************************************************************/
/****************************************************************************************************************************/
function user_count_myFriends(){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_COUNT_MYFRIENDSLIST', user_Id: AUTH_USER_ID },function(total_data){
    total_data=parseInt(total_data);
    if(total_data===0){
	   var content='<div align="center">';
	       content+='<span style="color:#ccc;">You have no Friends</span>';
	       content+='</div>';
	   document.getElementById('loadUserFriends0').innerHTML=content;
	} else {
	   var content='<div align="center">';
	       content+='<span style="color:#808080;"><b>You have ';
		   content+='<span style="color:'+CURRENT_DARK_COLOR+';">'+total_data+'</span>';
		   if(total_data===1){ content+=' Friend.</b></span>'; }
		   else { content+=' Friends.</b></span>'; }
	       content+='</div>';
	   document.getElementById('loadUserFriendsCount').innerHTML=content;
      scroll_loadInitializer('loadUserFriends',10,user_data_myFriends,total_data);
	}
  });
}
function user_data_myFriends(div_view, appendContent,limit_start,limit_end){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_DATA_MYFRIENDSLIST', user_Id: AUTH_USER_ID, limit_start:limit_start, 
    limit_end:limit_end },function(response){
     console.log(response);
	 response=JSON.parse(response);
	 var content='';
	 if(response.length>0){
	 for(var index=0;index<response.length;index++){
	 var user_Id=response[index].user_Id;
	 var username=response[index].username;
	 var surName=response[index].surName;
	 var name=response[index].name;
	 var profile_pic=response[index].profile_pic;
	 var about_me=response[index].about_me;
	 var minlocation=response[index].minlocation;
	 var location=response[index].location;
	 var state=response[index].state;
	 var country=response[index].country;
	 var created_On=response[index].created_On;
	   content+='<div id="userFrndsInfoDetails-'+user_Id+'" class="col-xs-12">';
       content+='<div class="list-group">';
	   content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid mtop15p mbot15p">';
	   content+='<div class="row">';
	   content+='<div class="col-xs-12">';
	   content+='<i onclick="javascript:unfriendAperson(\''+user_Id+'\',\'userFrndsInfoDetails-'+user_Id+'\');" ';
	   content+='class="fa fa-close pull-right"></i>';
	   content+='</div>';
	   content+='</div>';
	   content+='<div class="row">';
	   content+='<div class="col-xs-5">';
	   content+='<img src="'+profile_pic+'" class="profile_pic_img"/>';
	   content+='</div>';
	   content+='<div class="col-xs-7">';
	   content+='<h5 style="line-height:22px;"><b>'+surName+' '+name+'</b></h5>';
	   content+='<div>'+minlocation+', '+location+', '+state+', '+country+'</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
	 }
	 }
	 content+=appendContent;
	 document.getElementById(div_view).innerHTML=content;
  });
}

/* AcceptRequestRecievedByMe */
function acceptReqToMe(user_Id,accept_Id){
$('#'+accept_Id).hide(1000);
document.getElementById("searchpeople_btnsView_"+user_Id).innerHTML=ui_frndUnFrnd(user_Id);
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
{action:'ACCEPT_FRNDREQUEST_TO_ME',requestFrom:user_Id, user_Id:AUTH_USER_ID },function(resp){ 
 console.log(resp);
});
}
function dismissWithdrawRequest(user_Id,decline_Id){
$('#'+decline_Id).hide(1000);
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
{action:'DELETE_A_REQUEST_SENT',from_userId:user_Id, to_userId:AUTH_USER_ID },function(resp){ 
 console.log(resp);
});
}
/* UnFriend a Person */
function unfriendAperson(user_Id, unFrnd_Id){   // 
 $('#'+unFrnd_Id).hide(1000);
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  {action:'UNFRIEND_A_PERSON',frnd1:user_Id, frnd2:AUTH_USER_ID },function(resp){ console.log(resp); });
}

function subMenu_userFriends(id){
 var arry=["usrFrndSubMenu_Requests","usrFrndSubMenu_myFriends"];
 for(var index=0;index<arry.length;index++){
   if(arry[index]===id){ 
     if(!$('#'+arry[index]).hasClass('custom-font custom-bg-solid2pxfullborder')){
	   $('#'+arry[index]).addClass('custom-font custom-bg-solid2pxfullborder');
	   $('#'+arry[index]).css('color',CURRENT_DARK_COLOR);
	   $('#'+arry[index]).css('border-bottom','2px solid '+CURRENT_DARK_COLOR);
	   if($('#'+arry[index]+'_content').hasClass('hide-block')){ $('#'+arry[index]+'_content').removeClass('hide-block'); }
	 } 
   } else {
      if($('#'+arry[index]).hasClass('custom-font custom-bg-solid2pxfullborder')){
	   $('#'+arry[index]).removeClass('custom-font custom-bg-solid2pxfullborder');
	   $('#'+arry[index]).css('color','#000');
	   $('#'+arry[index]).css('border-bottom','0px');
	   if(!$('#'+arry[index]+'_content').hasClass('hide-block')){ $('#'+arry[index]+'_content').addClass('hide-block'); }
	  } 
   }
 }
      if(id==='usrFrndSubMenu_Requests'){ subMenu_userFriendRequests('usrFrndSubMenu_recievedRequests'); }
 else if(id==='usrFrndSubMenu_myFriends'){ user_count_myFriends(); }
}

function subMenu_userFriendRequests(id){
  var arry=["usrFrndSubMenu_recievedRequests","usrFrndSubMenu_sentRequests"];
  for(var index=0;index<arry.length;index++){
   if(arry[index]===id){ 
     if(!$('#'+arry[index]).hasClass('custom-font custom-bg-solid2pxfullborder')){
	   $('#'+arry[index]).addClass('custom-font custom-bg-solid2pxfullborder');
	   $('#'+arry[index]).css('color',CURRENT_DARK_COLOR);
	   $('#'+arry[index]).css('border-bottom','2px solid '+CURRENT_DARK_COLOR);
	   if($('#'+arry[index]+'_content').hasClass('hide-block')){ $('#'+arry[index]+'_content').removeClass('hide-block'); }
	 } 
   } else {
      if($('#'+arry[index]).hasClass('custom-font custom-bg-solid2pxfullborder')){
	   $('#'+arry[index]).removeClass('custom-font custom-bg-solid2pxfullborder');
	   $('#'+arry[index]).css('color','#000');
	   $('#'+arry[index]).css('border-bottom','0px');
	   if(!$('#'+arry[index]+'_content').hasClass('hide-block')){ $('#'+arry[index]+'_content').addClass('hide-block'); }
	  } 
   }
 }
      if(id==='usrFrndSubMenu_recievedRequests'){  user_count_recievedFrndRequests(); }
 else if(id==='usrFrndSubMenu_sentRequests'){ user_count_sentFrndRequests(); }
}

/****************************************************************************************************************************/
/********************************** My Friends Requests Menu : Recieved Requests ********************************************/
/****************************************************************************************************************************/
function user_count_recievedFrndRequests(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_COUNT_RECEIVEDFRIENDREQUESTS', to_userId: AUTH_USER_ID },function(total_data){
    total_data=parseInt(total_data);
    if(total_data===0){
	   var content='<div align="center" class="mtop15p">';
	       content+='<span style="color:#ccc;">You haven\'t Received any Friend Requests</span>';
	       content+='</div>';
	   document.getElementById("loadUserRecievedRequests0").innerHTML=content;
	}
   else {
        var content='<div>';
	        content+='<span style="color:#808080;"><b>Your have recieved ';
			content+='<span style="color:'+CURRENT_DARK_COLOR+';">'+total_data+'</span> ';
			if(total_data===1){ content+='Friend Request.</b></span>&nbsp;'; }
			else { content+='Friend Requests.</b></span>&nbsp;'; }
	        content+='</div>';
	   document.getElementById('loadUserRecievedRequestsCount').innerHTML=content;
	    scroll_loadInitializer('loadUserRecievedRequests',10,user_data_recievedFrndRequests,total_data);
	 }
    
  });
}
function user_data_recievedFrndRequests(div_view, appendContent,limit_start,limit_end){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_DATA_RECEIVEDFRIENDREQUESTS', to_userId: AUTH_USER_ID, limit_start:limit_start, limit_end:limit_end},
  function(response){
    console.log(response);
	 response=JSON.parse(response);
	 var content='';
	 if(response.length>0){
	 for(var index=0;index<response.length;index++){
	 var user_Id=response[index].user_Id;
	 var username=response[index].username;
	 var surName=response[index].surName;
	 var name=response[index].name;
	 var profile_pic=response[index].profile_pic;
	 var about_me=response[index].about_me;
	 var minlocation=response[index].minlocation;
	 var location=response[index].location;
	 var state=response[index].state;
	 var country=response[index].country;
	 var created_On=response[index].created_On;
	   content+='<div id="userRecFrndsReqDetails-'+user_Id+'" class="col-xs-12">';
       content+='<div class="list-group">';
	   content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid mtop15p mbot15p">';
	   content+='<div class="row">';
	   content+='<div class="col-xs-5">';
	   content+='<img src="'+profile_pic+'" class="profile_pic_img"/>';
	   content+='</div>';
	   content+='<div class="col-xs-7">';
	   content+='<h5 style="line-height:22px;"><b>'+surName+' '+name+'</b></h5>';
	   content+='<div>'+minlocation+', '+location+', '+state+', '+country+'</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='<div class="row">';
	   content+='<div class="btn-group pull-right">';
	   content+='<button class="btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;" ';
	   content+='onclick="javascript:acceptReqToMe(\''+user_Id+'\',\'userRecFrndsReqDetails-'+user_Id+'\');">';
	   content+='<b>Accept</b></button>';
	   content+='<button class="btn btn-default custom-font" style="color:'+CURRENT_DARK_COLOR+';" ';
	   content+='onclick="javascript:dismissWithdrawRequest(\''+user_Id+'\',\'userRecFrndsReqDetails-'+user_Id+'\');">';
	   content+='<b>Dismiss</b></button>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
	 }
	 }
	 content+=appendContent;
	 document.getElementById(div_view).innerHTML=content;
  });
}
/****************************************************************************************************************************/
/*********************************** My Friends Requests Menu : Sent Requests ***********************************************/
/****************************************************************************************************************************/
function user_count_sentFrndRequests(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_COUNT_SENTFRIENDREQUESTS', from_userId: AUTH_USER_ID },function(total_data){
  total_data=parseInt(total_data);
  if(total_data===0){
     var content='<div align="center" class="mtop15p">';
	     content+='<span style="color:#ccc;">You didn\'t sent any Friend Requests</span>';
	     content+='</div>';
	 document.getElementById("loadUserSentRequests0").innerHTML=content;
  } else {
     var content='<div align="center">';
	     content+='<span style="color:#808080;"><b>Your have sent ';
		 content+='<span style="color:'+CURRENT_DARK_COLOR+';"><b>'+total_data+'</b></span> ';
		 if(total_data===1){ content+='Friend Request.</b></span>&nbsp;'; }
		 else { content+='Friend Requests.</b></span>&nbsp;'; }
	     content+='</div>';
	 document.getElementById("loadUserSentRequestsCount").innerHTML=content;
      scroll_loadInitializer('loadUserSentRequests',10,user_data_sentFrndRequests,total_data);
	}
  });
}
function user_data_sentFrndRequests(div_view, appendContent,limit_start,limit_end){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_DATA_SENTFRIENDREQUESTS', from_userId: AUTH_USER_ID, limit_start:limit_start, limit_end:limit_end },
  function(response){
    console.log(response);
	 response=JSON.parse(response);
	 var content='';
	 if(response.length>0){
	 for(var index=0;index<response.length;index++){
	 var user_Id=response[index].user_Id;
	 var username=response[index].username;
	 var surName=response[index].surName;
	 var name=response[index].name;
	 var profile_pic=response[index].profile_pic;
	 var about_me=response[index].about_me;
	 var minlocation=response[index].minlocation;
	 var location=response[index].location;
	 var state=response[index].state;
	 var country=response[index].country;
	 var created_On=response[index].created_On;
	   content+='<div id="userSentFrndsReqDetails-'+user_Id+'" class="col-xs-12">';
       content+='<div class="list-group">';
	   content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid mtop15p mbot15p">';
	    content+='<div class="row">';
	   content+='<div class="col-xs-12">';
	   content+='<i onclick="javascript:dismissWithdrawRequest(\''+user_Id+'\',\'userSentFrndsReqDetails-'+user_Id+'\');" ';
	   content+='class="fa fa-close pull-right"></i>';
	   content+='</div>';
	   content+='</div>';
	   content+='<div class="row">';
	   content+='<div class="col-xs-5">';
	   content+='<img src="'+profile_pic+'" class="profile_pic_img"/>';
	   content+='</div>';
	   content+='<div class="col-xs-7">';
	   content+='<h5 style="line-height:22px;"><b>'+surName+' '+name+'</b></h5>';
	   content+='<div>'+minlocation+', '+location+', '+state+', '+country+'</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
	 }
	 }
	 content+=appendContent;
	 document.getElementById(div_view).innerHTML=content;
	 
   });
}
</script>
<div class="row">
<div class="col-xs-12">
<div class="list-group" style="margin-bottom:0px;">
<div class="list-group-item pad0">
  <div class="container-fluid pad0">
    <div id="usrFrndSubMenu_Requests" align="center" class="col-xs-6" style="margin-top:10px;" onclick="javascript:subMenu_userFriends(this.id);">
	  <div style="padding-bottom:10px;"><b>My Friend Requests</b></div>
	</div>
	<div id="usrFrndSubMenu_myFriends" align="center" class="col-xs-6" style="margin-top:10px;" onclick="javascript:subMenu_userFriends(this.id);">
	  <div style="padding-bottom:10px;"><b>My Friends</b></div>
	</div>
  </div>
</div>
</div>
</div>
</div>
<div id="usrFrndSubMenu_Requests_content" class="hide-block">
<div class="list-group" style="margin-bottom:0px;">
<div class="list-group-item pad0">
  <div class="container-fluid pad0">
    <div id="usrFrndSubMenu_recievedRequests" align="center" class="col-xs-6" style="margin-top:10px;" onclick="javascript:subMenu_userFriendRequests(this.id);">
	  <div style="margin-bottom:10px;"><b>Recieved Requests</b></div>
	</div>
	<div id="usrFrndSubMenu_sentRequests" align="center" class="col-xs-6" style="margin-top:10px;" onclick="javascript:subMenu_userFriendRequests(this.id);">
	  <div style="margin-bottom:10px;"><b>Sent Requests</b></div>
	</div>
  </div>
</div>
</div>
<div id="usrFrndSubMenu_recievedRequests_content" class="hide-block">
<div class="alert alert-warning">
  <strong>Note!</strong> Once you Decline / Delete the Recieved Request, the Request will be deleted 
  and not shown to the User Sent under "Sent Request Tab".</a>.
</div>
<div id="loadUserRecievedRequestsCount" class="mbot10p"></div>
<div id="loadUserRecievedRequests0">
 <div align="center" class="mtop15p">
  <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
 </div>
</div>
</div>
<div id="usrFrndSubMenu_sentRequests_content" class="hide-block">
<div class="alert alert-warning">
  <strong>Note!</strong> Once the Request Reciever deletes the Request you sent / You withdraw your Request, 
  then it is permanently deleted and will not be available to you.</a>.
</div>
<div id="loadUserSentRequestsCount" class="mbot10p"></div>
<div id="loadUserSentRequests0">
 <div align="center" class="mtop15p">
  <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
 </div>
</div>
</div>
</div>
<div id="usrFrndSubMenu_myFriends_content" class="container-fluid mtop15p mbot15p hide-block">
<div id="loadUserFriendsCount" class="mbot10p"></div>
<div id="loadUserFriends0">
 <div align="center" class="mtop15p">
  <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
 </div>
</div>
</div>