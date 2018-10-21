$(document).ready(function(){
console.log("Search Keyword: "+SEARCH_KEYWORD);
 sideWrapperToggle();
 mainMenuSelection("dn_"+USR_LANG+"_search");
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
 hzTabSelection('searchPeopleHzTab');
 searchpeopleInitializer();
 searchNewsFeedInitializer();
 searchCommunityInitializer();
 searchMovementInitializer();
});
function hzTabSelection(id){
 var arryHzTab=["searchPeopleHzTab","searchNewsFeedHzTab","searchCommunityHzTab","searchMovementHzTab"];
 var arryTabDataViewer=["searchPeopleDisplayDivision","searchNewsFeedDisplayDivision",
						"searchCommunityDisplayDivision","searchMovementDisplayDivision"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer);
}
/*****************************************************************************************************************************/
/************************************************* Search People load On Scroll **********************************************/
/*****************************************************************************************************************************/
function searchpeopleInitializer(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.search.php',
 { action:'SEARCH_COUNT_USERS', searchKeyword:SEARCH_KEYWORD, user_Id:AUTH_USER_ID },function(totalData){
   console.log("searchpeopleInitializer: "+totalData);
   if(parseInt(totalData)>0){
      var content='<div align="left" class="mbot15p" style="font-size:12px;">';
		  content+='<span style="color:#808080;">';
		  content+='<b>Your Search Results:</b> ';
		  content+='</span>';
		  content+='<span style="color:'+CURRENT_DARK_COLOR+'"><b>';
		  if(totalData=='1'){ content+=totalData+' Person Found'; }
		  else { content+=totalData+' People Found'; }
		  content+='</b></span>';
		  content+='</div>';
	  document.getElementById("searchPeopleDataResults").innerHTML=content; 
	scroll_loadInitializer('searchPeopleDataload',10,searchpeoplecontentData,totalData);
    } else {
	 var content='<div align="center" style="color:#ccc;">No People found</div>';
     document.getElementById("searchPeopleDataload0").innerHTML=content; 
   }
 });
}
function searchpeoplecontentData(div_view, appendContent,limit_start,limit_end){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.search.php',
  { action:'SEARCH_DATA_USERS', searchKeyword:SEARCH_KEYWORD, user_Id:AUTH_USER_ID, limit_start:limit_start,limit_end:limit_end },
  function(response){
    var content='';
	response=JSON.parse(response);
	for(var index=0;index<response.length;index++){
	  var param_userId=response[index].user_Id;
	  var param_surName=response[index].surName;
	  var param_name=response[index].name;
	  var param_profilepic=response[index].profile_pic;
      var param_minlocation=response[index].minlocation;
	  var param_location=response[index].location;
	  var param_state=response[index].state;
	  var param_country=response[index].country;
	  var param_isFriend=response[index].isFriend;
	  var param_youRecFrndRequest=response[index].youRecFrndRequest;
	  var param_youSentfrndRequest=response[index].youSentfrndRequest; 
	  
	   content+=ui_displayPeopleData(param_userId, param_profilepic, param_surName, param_name,
								param_minlocation,param_location,param_state,param_country,param_isFriend,
								param_youRecFrndRequest,param_youSentfrndRequest);

	}
	content+=appendContent;
	document.getElementById(div_view).innerHTML=content;
  });
}

function ui_displayPeopleData(param_userId, param_profilepic, param_surName, param_name, param_minlocation, param_location,
						   param_state,param_country,param_isFriend,param_youRecFrndRequest,param_youSentfrndRequest){
 var content='<div id="searchpeople_'+param_userId+'" class="list-group-item" style="padding:5px 0px;">';
	 content+='<div class="container-fluid pad0" onclick="javascript:transfer_userProfile(\''+param_userId+'\');">';
	 content+='<div class="col-md-2 col-xs-5">';
	 content+='<img class="img-min-profilepic" src="'+param_profilepic+'"/>';
	 content+='</div>';
	 content+='<div align="left" class="col-md-6 col-xs-7 frnshipreqdiv pad5">';
	 content+='<h5><b>'+param_surName+' '+param_name+'</b></h5>';
	 content+='<span class="frnshipreqaddr">'+param_minlocation+', '+param_location+', '+param_state+', '+param_country+'</span>';
	 content+='</div>';
	 content+='</div>';
	 content+='<div class="container-fluid pad0">';
	 content+='<div id="searchpeople_btnsView_'+param_userId+'" align="center" class="col-md-4 col-xs-12 mtop15p mbot15p">';
 if(AUTH_USER_ID===param_userId){
	 content+=ui_viewMeButton();
 }
 else if(AUTH_USER_ID!==param_userId && param_isFriend==='NO') {
	 if(param_youRecFrndRequest==='YES'){
	    content+=ui_acceptRelationship(param_userId);
     } else if(param_youSentfrndRequest==='YES'){
	    content+=ui_reqSentDelRequest(param_userId);
	 } else {
		content+=ui_sendReqHidePeople(param_userId);
	 }
 } else if(AUTH_USER_ID!==param_userId && param_isFriend==='YES') {
    content+=ui_frndUnFrnd(param_userId);
 }
 content+='</div>';
 content+='</div>';
 content+='</div>';
 return content;
}

function ui_viewMeButton(){
  var content='<button class="btn btn-default custom-font m1 pull-right" ';
	  content+='style="color:'+CURRENT_DARK_COLOR+';font-size:11px;">';
	  content+='<b><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Me</b></button>';
  return content;
}
function ui_acceptRelationship(param_userId){
  var content='<button class="btn custom-bg custom-font m1 pull-right" onclick="javascript:acceptReqToMe(\''+param_userId+'\')"';
	  content+='style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;font-size:11px;">';
	  content+='<i class="fa fa-user" aria-hidden="true"></i>&nbsp;<b>Accept Friendship</b></button>';
  return content;
}
function ui_reqSentDelRequest(param_del_userId){
  var content='<div class="btn-group pull-right">';
	  content+='<button class="btn btn-default custom-font" style="color:'+CURRENT_DARK_COLOR+';font-size:11px;">';
	  content+='<b><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Request Sent</b></button>';
	  content+='<button class="btn custom-bg white-font" style="background-color:'+CURRENT_DARK_COLOR+';';
	  content+='color:#fff;font-size:11px;" onclick="javascript:delete_relationship_request(\''+param_del_userId+'\')"><b>Delete Request</b>&nbsp;';
      content+='<i class="fa fa-close" aria-hidden="true"></i></button>';
	  content+='</div>';
  return content;
}
function ui_sendReqHidePeople(param_userId){
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
function ui_frndUnFrnd(param_userId){
 var content='<div class="btn-group pull-right">';
	 content+='<button class="btn btn-default custom-font" style="color:'+CURRENT_DARK_COLOR+';font-size:11px;"><b>';
	 content+='<i class="fa fa-check" aria-hidden="true"></i>&nbsp;Your Friend</b></button>';
	 content+='<button class="btn custom-bg custom-font white-font" style="background-color:'+CURRENT_DARK_COLOR+';';
	 content+='color:#fff;font-size:11px;" onclick="javascript:unfriendAperson(\''+param_userId+'\');">';
	 content+='<b>UnFriend</b>&nbsp;<i class="fa fa-close" aria-hidden="true"></i></button>';
	 content+='</div>';
 return content;
}
function transfer_userProfile(param_userId){
 window.location.href=PROJECT_URL+'app/user/'+param_userId;
}
/* One User Sending Request to Other User */
function send_relationship_request(user_Id){
 document.getElementById("searchpeople_btnsView_"+user_Id).innerHTML=ui_reqSentDelRequest(user_Id);
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
 {action:'SEND_USERFRND_REQUESTS', projectURL: PROJECT_URL, from_user_Id:AUTH_USER_ID, to_user_Id:user_Id },function(resp){
  console.log(resp);
 });
}
/* Delete a Request that previously Sent */
function delete_relationship_request(user_Id){
document.getElementById("searchpeople_btnsView_"+user_Id).innerHTML=ui_sendReqHidePeople(user_Id);
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
{action:'DELETE_A_REQUEST_SENT',from_userId:AUTH_USER_ID, to_userId:user_Id },function(resp){
   console.log(resp);
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

function search_hide_currentPerson(id){ $('#'+id).hide(1000); }

/*****************************************************************************************************************************/
/*********************************************** Search NewsFeed load On Scroll **********************************************/ 
/*****************************************************************************************************************************/
function searchNewsFeedInitializer(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.search.php',
 { action:'SEARCH_COUNT_NEWSFEED', searchKeyword:SEARCH_KEYWORD,user_Id: AUTH_USER_ID,  },function(totalData){
   console.log("searchNewsFeedInitializer: "+totalData);
   if(totalData=='0'){
     document.getElementById("searchNewsFeedDataload0").innerHTML='<div align="center" style="color:#ccc;">No NewsFeed found</div>';
   } else {
    var content='<div align="left" class="mbot15p" style="font-size:12px;">';
		content+='<span style="color:#808080;">';
		content+='<b>Your Search Results:</b> ';
		content+='</span>';
		content+='<span style="color:'+CURRENT_DARK_COLOR+'"><b>'+totalData+' News Found</b></span>';
		content+='</div>';
	document.getElementById("searchNewsFeedDataResults").innerHTML=content; 
    scroll_loadInitializer('searchNewsFeedDataload',10,searchNewsFeedcontentData,totalData);
   }
 });
}
function searchNewsFeedcontentData(div_view, appendContent,limit_start,limit_end){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.search.php',
  { action:'SEARCH_DATA_NEWSFEED', projectURL:PROJECT_URL, user_Id: AUTH_USER_ID, 
  searchKeyword:SEARCH_KEYWORD, limit_start:limit_start, limit_end:limit_end },
  function(response){
    console.log("response: "+response);
	response=JSON.parse(response);
	var content='';
	for(var index=0;index<response.length;index++){
	   var param_unionId=response[index].union_Id;
	   var param_domainName=response[index].domainName;
	   var param_subdomainName=response[index].subdomainName;
	   var param_unionName=response[index].unionName;
	   var param_infoId=response[index].info_Id;
	   var param_artTitle=decodeURI(response[index].artTitle);
	   var param_artShrtDesc=decodeURI(response[index].artShrtDesc);
	   var param_artDesc=decodeURI(response[index].artDesc);
	   var param_createdOn=get_stdDateTimeFormat01(response[index].createdOn);
	   var param_images=response[index].images;
	   var param_status=response[index].status;
	   var param_newsType=response[index].newsType;
	   
	   content+=ui_newsFeedDisplay(param_domainName, param_subdomainName, param_images, param_artTitle, 
					param_artShrtDesc, param_infoId, param_newsType, param_createdOn);
	}
	content+=appendContent;
	document.getElementById(div_view).innerHTML=content;
  });
}
function ui_newsFeedDisplay(param_domainName, param_subdomainName, param_images, param_artTitle, 
  param_artShrtDesc, param_infoId, param_newsType, param_createdOn){
 var content='<div class="list-group pad0">';
	 content+='<div class="list-group-item">';
	 content+='<div align="left" class="mbot15p">';
	 content+='<label class="label label-newsfeed custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;">';
	 content+='<span style="text-transform:uppercase;"><b>'+param_domainName+' / '+param_subdomainName+'</b></span>';
	 content+='</label>';
	 content+='</div>';
	 content+='<div>';
	 content+='<img src="'+param_images+'" style="width:100%;height:200px;"/>';
	 content+='</div>';
	 content+='<div><h5 align="center" style="text-transform:uppercase;line-height:22px;"><b>'+param_artTitle+'</b></h5></div>';
	 content+='<div style="font-size:12px;color:#000;">'+param_artShrtDesc+'</div>';
	 content+='<div align="right" style="line-height:22px;color:#87898a;font-size:12px;">posted on <br/>'+param_createdOn+' IST</div>';
	 content+='<div align="right" class="mtop15p">';
	 if(param_newsType==='UNION'){
	   content+='<a href="'+PROJECT_URL+'newsfeed/news/union/'+param_infoId+'">';
	 } else {
	   content+='<a href="'+PROJECT_URL+'newsfeed/news/business/'+param_infoId+'">';
	 }
	 content+='<button class="btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;">';
	 content+='<i class="fa fa-14px fa-newspaper-o"></i> &nbsp;<span style="font-size:12px;"><b>Read Full Story</b></span>';
	 content+='</button>';
	 content+='</a>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
  return content;
}

/*****************************************************************************************************************************/
/*********************************************** Search Community load On Scroll *********************************************/
/*****************************************************************************************************************************/
function searchCommunityInitializer(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.search.php',
 { action:'SEARCH_COUNT_COMMUNITY', searchKeyword:SEARCH_KEYWORD },function(totalData){
   console.log("searchCommunityInitializer: "+totalData);
   if(totalData=='0'){
     document.getElementById("searchCommunityDataload0").innerHTML='<div align="center" style="color:#ccc;">No Community found</div>';
   } else {
   console.log("searchCommunityInitializer: "+totalData);
      var content='<div align="left" class="mbot15p" style="font-size:12px;">';
		  content+='<span style="color:#808080;">';
		  content+='<b>Your Search Results:</b> ';
		  content+='</span>';
		  content+='<span style="color:'+CURRENT_DARK_COLOR+'"><b>';
		  if(totalData=='1'){ content+=totalData+' Community Found'; }
		  else { content+=totalData+' Communities Found'; }
		  content+='</b></span>';
		  content+='</div>';
	  document.getElementById("searchCommunityDataResults").innerHTML=content; 
      scroll_loadInitializer('searchCommunityDataload',10,searchCommunitycontentData,totalData);
   }
 });
}
function searchCommunitycontentData(div_view, appendContent,limit_start,limit_end){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.search.php',
 { action:'SEARCH_DATA_COMMUNITY', projectURL: PROJECT_URL, lang: USR_LANG, user_Id: AUTH_USER_ID, 
 searchKeyword:SEARCH_KEYWORD, limit_start:limit_start, limit_end:limit_end },
 function(response){
 console.log(response);
 response=JSON.parse(response);
 var content='';
 for(var index=0;index<response.length;index++){
   var param_unionId=response[index].union_Id;
   var param_domainName=response[index].domainName;
   var param_subdomainName=response[index].subdomainName;
   var param_unionName=response[index].unionName;
   var param_unionURLName=response[index].unionURLName;
   var param_profilepic=response[index].profile_pic;
   var param_minlocation=response[index].minlocation;
   var param_location=response[index].location;
   var param_state=response[index].state;	
   var param_country=response[index].country;
   var param_createdOn=response[index].created_On;
   
   content+=ui_communityDisplay(param_unionId, param_unionURLName, param_domainName,param_subdomainName,
        param_profilepic,param_unionName, param_createdOn,param_minlocation,param_location,param_state,param_country);
 }
  content+=appendContent;
  document.getElementById(div_view).innerHTML=content;
 });
}
function ui_communityDisplay(param_unionId,param_unionURLName,param_domainName,param_subdomainName,
    param_profilepic,param_unionName,param_createdOn,param_minlocation,param_location,param_state,param_country){
 var content='<div class="list-group pad10" style="margin-bottom:10px;">';
    content+='<div class="list-group-item">';
    content+='<div class="container-fluid pad0">';
    content+='<div align="left" class="col-md-12 col-xs-12 pad0">'; 
    content+='<span class="label label-newsfeed custom-bg" style="background-color:#0ba0da;">';
    content+='<b>'+param_domainName.toUpperCase()+' / '+param_subdomainName.toUpperCase()+'</b></span>';
    content+='</div>';
    content+='<div class="pad0">';
    content+='<div class="">'; 
    content+='<img class="img-min-profilepic mtop15p" src="'+param_profilepic+'">';
    content+='</div>';
    content+='<div class="frnshipreqdiv">';
    content+='<h5 style="line-height:22px;"><b>'+param_unionName+'</b></h5>';
	content+='<div align="center" style="line-height:22px;color:#87898a;font-size:12px;">joined on '+param_createdOn+' IST</div>';
	content+='</div>';
	
    content+='<div class="frnshipreqaddr mtop15p" style="color:#6f6f6f;font-weight:bold;font-size:12px;">'+param_minlocation+', '+param_location+', '+param_state+', '+param_country+'</div>';
    
	content+='<div align="right" class="col-xs-12 mtop15p">';
	content+='<a href="'+PROJECT_URL+'app/community/'+param_unionId+'">';
	content+='<button class="btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;">';
    content+='<i class="fa fa-14px fa-user"></i> &nbsp;<span style="font-size:11px;"><b>View Community</b></span>';
	content+='</button>';
    content+='</a>';
	content+='</div>';
	
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
  return content;
}

/*****************************************************************************************************************************/
/************************************************ Search Movement load On Scroll *********************************************/ 
/*****************************************************************************************************************************/
function searchMovementInitializer(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.search.php',
 { action:'SEARCH_COUNT_MOVEMENT', user_Id: AUTH_USER_ID, searchKeyword:SEARCH_KEYWORD },function(totalData){
   console.log("searchMovementInitializer: "+totalData);
   if(totalData=='0'){
     document.getElementById("searchMovementDataload0").innerHTML='<div align="center" style="color:#ccc;">No Movement found</div>';
   } else {
   console.log("searchMovementInitializer: "+totalData);
    var content='<div align="left" class="mbot15p" style="font-size:12px;">';
		  content+='<span style="color:#808080;">';
		  content+='<b>Your Search Results:</b> ';
		  content+='</span>';
		  content+='<span style="color:'+CURRENT_DARK_COLOR+'"><b>';
		  if(totalData=='1'){ content+=totalData+' Movement Found'; }
		  else { content+=totalData+' Movements Found'; }
		  content+='</b></span>';
		  content+='</div>';
   document.getElementById("searchMovementDataResults").innerHTML=content;  
   scroll_loadInitializer('searchMovementDataload',10,searchMovementcontentData,totalData);
   }
 });
}
function searchMovementcontentData(div_view, appendContent,limit_start,limit_end){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.search.php',
 { action:'SEARCH_DATA_MOVEMENT', user_Id: AUTH_USER_ID, searchKeyword:SEARCH_KEYWORD, 
   limit_start:limit_start, limit_end:limit_end },
 function(response){
   var content=ui_movementDisplay();
       content+=appendContent;
   document.getElementById(div_view).innerHTML=content;
 });
}

function ui_movementDisplay(){
 var param_moveId='ABCDE';
 var param_domainName='Transportation';
 var param_subdomainName='Auto';
 var param_profilepic='https://avaazimages.avaaz.org/27583_27583_eco46_48_original_1_460x230.jpg';
 var param_petitionTitle='Strike of Fee ReImbursement By Student Federation of India';
 var param_createdOn='2018-04-12 10:11:00';
 var param_minlocation='L.B.Nagar';
 var param_location='Hyderabad';
 var param_state='Telangana';
 var param_country='India';
 var content='<div class="list-group pad10" style="margin-bottom:10px;">';
    content+='<div class="list-group-item">';
    content+='<div class="container-fluid pad0">';
    content+='<div align="left" class="col-md-12 col-xs-12 pad0">'; 
    content+='<span class="label label-newsfeed custom-bg" style="background-color:#0ba0da;">';
    content+='<b>'+param_domainName.toUpperCase()+' / '+param_subdomainName.toUpperCase()+'</b></span>';
    content+='</div>';
    content+='<div class="row pad0">';
    content+='<img class="col-md-12 col-xs-12 mtop15p" style="height:auto;" src="'+param_profilepic+'">';
    content+='<div align="left" class="col-md-12 col-xs-12 frnshipreqdiv">';
    content+='<h5 style="line-height:22px;"><b>'+param_petitionTitle+'</b></h5>';
    content+='<div align="right" style="color:#87898a;font-size:12px;">Movement started on <br/>'+param_createdOn+' IST</div>';
    content+='<div align="center" class="frnshipreqaddr mtop15p" style="color:#6f6f6f;font-weight:bold;font-size:12px;">'+param_minlocation+', '+param_location+', '+param_state+', '+param_country+'</div>';
    content+='</div>';
	
	content+='<div align="right" class="col-xs-12 mtop15p">';
	content+='<a href="'+PROJECT_URL+'app/movement/'+param_moveId+'">';
	content+='<button class="btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;">';
    content+='<i class="fa fa-14px fa-newspaper-o"></i> &nbsp;<span style="font-size:11px;"><b>Watch Movement</b></span>';
	content+='</button>';
    content+='</a>';
	content+='</div>';
	
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
  return content;
}