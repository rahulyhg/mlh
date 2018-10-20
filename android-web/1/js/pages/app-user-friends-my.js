$(document).ready(function(){
sideWrapperToggle();
mainMenuSelection("dn_"+USR_LANG+"_myfriends");
bgstyle();
$(".lang_"+USR_LANG).css('display','block');
loadFriendsListOfMe();
});

function loadFriendsListOfMe(){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.myfriends.php',
{ action:'FRNDS_LIST_COUNT', user_Id:AUTH_USER_ID },function(totalData){
document.getElementById("display_frnds_totalcount").innerHTML='('+totalData+')';
scroll_loadInitializer('myfriendList',15,loadFriendsListOfMe_data,totalData);
});
}

function loadFriendsListOfMe_data(div_view,appendContent,limit_start,limit_end){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.myfriends.php',
{action:'FRNDS_LIST', user_Id:AUTH_USER_ID, limit_start:limit_start, limit_end:limit_end },function(resp){
resp=JSON.parse(resp);
var content='';
if(resp.length>0){
for(var index=0;index<resp.length;index++){
var profilepic=resp[index].profile_pic;
var user_Id=resp[index].user_Id;
var surName=resp[index].surName;
var name=resp[index].name;
var minlocation=resp[index].minlocation;
var location=resp[index].location;
var state=resp[index].state;
var country=resp[index].country;
				  
content+='<div class="col-md-4 col-xs-12 curpoint" onclickk="javascript:goToProfilePage(\''+user_Id+'\');">';
content+='<div class="list-group pad10" style="margin-bottom:0px;">';
content+='<div class="list-group-item" style="height:145px;padding: 5px 8px;">';
content+='<i class="fa fa-times pull-right removefrndIcon" aria-hidden="true" ';
content+='onclick="javascript:removePersonFromFrndList(\''+user_Id+'\',\''+surName+' '+name+'\')"></i>';
content+='<div class="container-fluid pad0">';
content+='<div class="col-md-4 col-xs-5 mtop15p">';
content+='<img class="img-min-profilepic" src="'+profilepic+'"/>';
content+='</div>';
content+='<div align="left" class="col-md-8 col-xs-7 frnshipreqdiv">';
content+='<h5><b>'+surName+' '+name+'</b></h5>';
content+='<span class="frnshipreqaddr">'+minlocation+', '+location+', '+state+', '+country+'</span>';
content+='</div>';
content+='</div>';
content+='</div>';
content+='</div>';
content+='</div>';
}
} else {
content+='<div align="center" class="col-md-12 col-xs-12">';
content+='<div class="mention-nofrnds"><i>You have No Friends</i></div>';
content+='</div>';
}
content+=appendContent;
document.getElementById(div_view).innerHTML=content;
});
}

function removePersonFromFrndList(user_Id, name){
var content='<div class="modal-dialog">';
    content+='<div class="modal-content">';
    content+='<div class="modal-body" style="padding:0px;">';
	content+='<div class="alert alert-warning alert-dismissable" style="margin-bottom:0px;">';
    content+='<a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>';
	
	content+='<div align="center" class="col-md-12">';
    content+='<strong>Warning!</strong>&nbsp;<b>Do you want to UnFriend ';
	content+='<span class="custom-font" style="color:'+CURRENT_DARK_COLOR+'">"'+name+'</b></span>"? ';
	content+='</div>';
	
	content+='<div align="center" class="col-md-12"><br/>';
	content+='<div class="btn-group">';
	content+='<button class="btn custom-bg white-font" style="background-color:'+CURRENT_DARK_COLOR+'"';
	content+='onclick="javascript:deleteThisPerson(\''+user_Id+'\')"><b>YES</b></button>';
	content+='<button class="btn custom-lgt-bg" style="background-color:'+CURRENT_LIGHT_COLOR+'"';
	content+='onclick="javascript:unFriendModalclose();"><b>NO</b></button>';
	content+='</div>';
	content+='</div>';
	
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
document.getElementById("appMyFriendsModal").innerHTML=content;
$("#appMyFriendsModal").modal({backdrop: "static"});
}

function deleteThisPerson(user_Id){
var loadContent='<div align="center" class="list-item-group">';
	loadContent+='<img src="'+PROJECT_URL+'images/load.gif" style="width:150px;height:150px;"/>';
	loadContent+='</div>';
document.getElementById("myfriendList0").innerHTML=loadContent;
unFriendModalclose();
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.myfriends.php',
{action:'DELETE_FRND', frnd_Id:user_Id, user_Id:AUTH_USER_ID },function(resp){
	 loadFriendsListOfMe(); 
});
}

function unFriendModalclose(){  $("#appMyFriendsModal").modal('hide'); }