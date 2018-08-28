<script type="text/javascript">
function user_count_myFriends(){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_COUNT_MYFRIENDSLIST', user_Id: AUTH_USER_ID },function(total_data){
    scroll_loadInitializer('loadUserFriends',10,user_data_myFriends,total_data);
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
	   content+='<div class="col-xs-12">';
       content+='<div class="list-group">';
	   content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid mtop15p mbot15p">';
	   content+='<div class="row">';
	   content+='<div class="col-xs-12">';
	   content+='<i onclick="javascript:unfriendAperson(\''+user_Id+'\');" class="fa fa-close pull-right"></i>';
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
	 } else {
	   content+='<div align="center">';
	   content+='<span style="color:#ccc;">You have no Friends</span>';
	   content+='</div>';
	 }
	 content+=appendContent;
	 document.getElementById(div_view).innerHTML=content;
  });
}

/* AcceptRequestRecievedByMe */
function acceptReqToMe(user_Id){
document.getElementById("searchpeople_btnsView_"+user_Id).innerHTML=ui_frndUnFrnd(user_Id);
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
{action:'ACCEPT_FRNDREQUEST_TO_ME',requestFrom:user_Id, user_Id:AUTH_USER_ID },function(resp){ 
 console.log(resp);
});
}
/* UnFriend a Person */
function unfriendAperson(user_Id){  
document.getElementById("searchpeople_btnsView_"+user_Id).innerHTML=ui_sendReqHidePeople(user_Id);
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
      if(id==='usrFrndSubMenu_recievedRequests'){ }
 else if(id==='usrFrndSubMenu_sentRequests'){ }
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
<div id="loadUserRecievedRequests0">
 <div align="center" class="mtop15p">
  <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
 </div>
</div>
</div>
<div id="usrFrndSubMenu_sentRequests_content" class="hide-block">
<div id="loadUserSentRequests0" class="hide-block">
 <div align="center" class="mtop15p">
  <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
 </div>
</div>
</div>
</div>
<div id="usrFrndSubMenu_myFriends_content" class="container-fluid mtop15p mbot15p hide-block">
<div id="loadUserFriends0">
 <div align="center" class="mtop15p">
  <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
 </div>
</div>
</div>