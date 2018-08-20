

/*****************************************************************************************************************************
 ************************************************** NOTIFICATIONS : START **************************************************
 *****************************************************************************************************************************
 */ 
 function uiTemplate_requestList_people(param_surName,param_name,param_watched,param_notifyURL,param_profilepic,
    param_notifyts,param_fromId,param_notifyId){
   var content='';
   if(param_watched==='Y'){ 
	content+='<div class="list-group-item curpoint">';
	} else {
	content+='<div class="list-group-item curpoint">';
	}
	content+='<div class="container-fluid pad0" onclick="urlTransfer(\''+param_notifyURL+'\');">';
	content+='<div class="col-md-2 col-xs-3">';
	content+='<img class="img-min-profilepic" src="'+param_profilepic+'"/>';
	content+='</div>';
	content+='<div class="col-md-10 col-xs-9 pad0">';
	content+='<div align="center" class="notification-title mbot15p">'+param_surName+' '+param_name+' sent you <br/> Friendship Request</div>';
	content+='<div align="right" class="notification-silver mbot15p">'+param_notifyts+'</div>';
	content+='</div>';
	content+='</div>';
	content+='<div class="container-fluid pad0">';
	content+='<div class="col-md-12  col-xs-12 pad0">';
	if(param_watched==='Y'){
	content+='<span class="notification-silver">';
	content+='<i class="fa fa-check" aria-hidden="true"></i>&nbsp;Watched';
	content+='</span>';
	}
	content+='<div id="searchpeople_btnsView_'+param_fromId+'" class="btn-group pull-right">';
	content+='<button class="btn custom-bg f12" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;"';
	content+='onclick="javascript:acceptReqOfRelationship(\''+param_notifyId+'\',\''+param_fromId+'\');">';
	content+='<b><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Accept Friendship</b>';
	content+='</button>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
	return content;
 }
/*****************************************************************************************************************************
 ************************************************** NOTIFICATIONS : END **************************************************
 *****************************************************************************************************************************
 */ 
/* NewsFeed Display Function */
function uiTemplate_simpleNewsFeedDisplay(param_domainName, param_subdomainName, param_images, param_artTitle, 
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

function uiTemplate_unionNewsFeedDisplay(param_unionId, param_domainName, param_subdomainName, param_unionName, param_infoId, 
param_artTitle, param_artShrtDesc, param_artDesc, param_createdOn, param_images, param_votesup, param_votesdown, param_status, 
param_viewed, param_favourites, param_likes, param_usrvoteup, param_usrvotedown, param_usrfavourite, param_usrliked, 
param_newsType){
var content='<div id="newsfeed-'+param_infoId+'" class="col-xs-12 col-sm-6 col-md-4">';
    content+='<div class="list-group">';
    content+='<div class="list-group-item newsfeedlistgroup">';
    content+='<div class="container-fluid pad0">';
    content+='<div class="col-xs-12 col-sm-12 col-md-12 mbot15p">';
    content+='<span class="label label-newsfeed custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';">';
    content+=param_domainName.toUpperCase()+' / '+param_subdomainName.toUpperCase();
    content+='</span>';
    content+='<div class="dropdown pull-right">';
    content+='<i class="fa fa-18px fa-ellipsis-v curpoint dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>';
    content+='<ul class="dropdown-menu" style="margin:0px;min-width:200px;">';
    content+='<li><a id="newsfeed-'+param_infoId+'-addRemoveMyFavourites" href="#newsfeed-'+param_infoId+'" ';
    content+='onclick="javascript:uiTemplate_newsFeedDisplay_selFavourite(\''+param_newsType+'\',\''+param_unionId+'\',\''+param_infoId+'\','+param_favourites+');">';
if(param_usrfavourite==='Y'){
    content+='Remove from <i class="fa fa-14px fa-heart"aria-hidden="true"></i> My Favourites';
} else {
    content+='Add to <i class="fa fa-14px fa-heart"aria-hidden="true"></i> My Favourites';
}
    content+='</a></li>';
 // content+='<li><a id="newsfeed-'+info_Id+'-statistics" href="#newsfeed-'+info_Id+'" >';
 // content+='View <i class="fa fa-pie-chart" aria-hidden="true"></i>&nbsp;Statistics';
 // content+='</a></li>';
    content+='</ul>';
    content+='</div>';
    content+='</div>';
    content+='<img align="center" class="col-xs-12 col-sm-12 col-md-12 mbot10p h200p"';
    content+='src="'+param_images+'"/>';
    content+='<div align="center" class="col-xs-12 col-sm-12 col-md-12 title">';
    content+='<h5><b>'+param_artTitle.toUpperCase()+'</b></h5>';
    content+='</div>';
    content+='<div align="center" class="col-xs-12 col-sm-12 col-md-12" style="width:100%;height:80px;color:#6c7881;">';
    content+=param_artShrtDesc;
    content+='</div>';
    content+='<div align="center" class="col-xs-12 col-sm-12 col-md-12">';
    content+='<a href="'+PROJECT_URL+'newsfeed/news/'+param_newsType.toLowerCase()+'/'+param_infoId+'" class="newsfeed-content">';
    content+='<button class="custom-bg btn pull-right" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;">';
    content+='<span style="font-size:11px;">';
    content+='<i class="fa fa-14px fa-newspaper-o" aria-hidden="true"></i>&nbsp;<b>Read Full Story</b>';
    content+='</span>';
    content+='</button>';
    content+='</a>';
    content+='</div>';
content+='<div align="left" class="col-xs-12 col-sm-12 col-md-12" style="font-size:12px;">';
content+='Viewed by <span class="txtunderline" style="color:#6c7881;"><b>'+param_viewed;
content+=' <i class="fa fa-user" data-toggle="tooltip" title="People Viewed" aria-hidden="true"></i> people</b></span>';
content+='</div>';

/* Favourite */
if(param_usrfavourite==='Y'){
content+='<div id="'+param_infoId+'-favourite" style="color:'+CURRENT_DARK_COLOR+';height:40px;margin-top:10px;" ';
content+='class="custom-font col-md-12 col-xs-12 mbot15px">';
content+='<span id="'+param_infoId+'-num-favourites" class="fs12">';
if(parseInt(param_favourites)===1){
content+='<b>You are the first to add it to </b>';
content+='<i class="fa fa-heart" data-toggle="tooltip" title="Favourite" aria-hidden="true"></i>';
content+=' <b>My Favourites</b>';
} else {
content+='<b>You added to </b>';
content+='<i class="fa fa-heart" data-toggle="tooltip" title="Favourite" aria-hidden="true"></i>';
content+=' <b>My Favourites with '+param_favourites+' people </b>';
}
content+='</span>';
content+='</div>';
} else {
content+='<div id="'+param_infoId+'-favourite" class="col-md-12 col-xs-12 mbot15px" style="height:40px;margin-top:10px;color:#6c7881;">';
content+='<span id="'+param_infoId+'-num-favourites" class="fs12">';
content+='<b>'+param_favourites+' people added to </b>';
content+='<i class="fa fa-heart" data-toggle="tooltip" title="Favourite" aria-hidden="true"></i>';
content+='<b> My Favourites</b>';
content+='</span>';
content+='</div>';
}


content+='<div align="right" class="col-xs-12 col-sm-12 col-md-12" style="font-size:11px;">';
content+='By <span style="color:#6c7881;"><b>'+param_unionName.toUpperCase()+'</b></span>';
content+='</div>';

content+='<div align="right" class="col-xs-12 col-sm-12 col-md-12" style="margin-top:10px;font-size:11px;">';
content+='On <span style="color:#6c7881;"><b>'+get_stdDateTimeFormat01(param_createdOn)+'</b></span>';
content+='</div>';


content+='</div>';
content+='</div>';
content+='<div class="list-group-item newsfeedlistgroup" style="background-color:#fff;">';
content+='<div class="container-fluid pad0" style="color:#6c7881;">';

/* Number of Likes */
content+='<div align="left" ';
content+='class="col-md-4 col-xs-4" >';
if(param_usrliked==='Y') {
content+='<span id="'+param_infoId+'-likes" class="curpoint socio-btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';"';
content+='onclick="javascript:uiTemplate_newsFeedDisplay_selLikes(\''+param_newsType+'\',\''+param_unionId+'\',\''+param_infoId+'\','+param_likes+');">';
content+='<i class="fa fa-thumbs-up"></i>&nbsp;<b>Liked</b>';
content+='</span>';

} else {
content+='<span id="'+param_infoId+'-likes" class="curpoint socio-btn custom-silver"';
content+='onclick="javascript:uiTemplate_newsFeedDisplay_selLikes(\''+param_newsType+'\',\''+param_unionId+'\',\''+param_infoId+'\','+param_likes+');">';
content+='<i class="fa fa-thumbs-up"></i>&nbsp;<b>Like</b>';
content+='</span>';
}
content+='</div>';
/* Vote Up */
content+='<div align="right" class="custom-font curpoint col-md-8 col-xs-8">';
if(param_usrvoteup==='Y' || param_usrvotedown==='Y'){ content+='<b>Voted:</b>&nbsp;'; }
else { content+='<b>Vote:</b>&nbsp;'; }
if(param_usrvoteup==='Y'){
content+='<span id="'+param_infoId+'-voteup" style="background-color:'+CURRENT_DARK_COLOR+';" ';
content+='align="center" class="custom-bg curpoint socio-btn" ';
content+='onclick="javascript:uiTemplate_newsFeedDisplay_selVote(\''+param_newsType+'\',\''+param_unionId+'\',\''+param_infoId+'\',\'voteup\');">';
content+='<i class="fa fa-arrow-up"></i>&nbsp;<b>up</b>&nbsp;<i class="fa fa-check"></i>';
content+='</span>';
} else {
content+='<span id="'+param_infoId+'-voteup" align="center" class="curpoint socio-btn custom-silver" ';
content+='onclick="javascript:uiTemplate_newsFeedDisplay_selVote(\''+param_newsType+'\',\''+param_unionId+'\',\''+param_infoId+'\',\'voteup\');">';
content+='<i class="fa fa-arrow-up"></i>&nbsp;<b>up</b>';
content+='</span>';
} 
if(param_usrvotedown==='Y'){ 
content+='<span id="'+param_infoId+'-votedown" align="center" style="background-color:'+CURRENT_DARK_COLOR+';" ';
content+='class="custom-bg curpoint socio-btn" ';
content+='onclick="javascript:uiTemplate_newsFeedDisplay_selVote(\''+param_newsType+'\',\''+param_unionId+'\',\''+param_infoId+'\',\'votedown\');">';
content+='&nbsp;<i class="fa fa-arrow-down"></i>&nbsp;<b>down</b>&nbsp;<i class="fa fa-check"></i>';
content+='</span>';
} else {
content+='<span id="'+param_infoId+'-votedown" ';
content+='align="center" class="curpoint socio-btn custom-silver" ';
content+='onclick="javascript:uiTemplate_newsFeedDisplay_selVote(\''+param_newsType+'\',\''+param_unionId+'\',\''+param_infoId+'\',\'votedown\');">';
content+='&nbsp;<i class="fa fa-arrow-down"></i>&nbsp;<b>down</b>';
content+='</span>';
}
content+='</div>';
content+='</div>';
content+='</div>';
content+='<div class="list-group-item pad0">';
content+='<div class="container-fluid pad0" style="color:#6c7881;">';

/* Hook Promote Button : Start */
// content+='<div align="center" class="col-md-12 col-xs-12 pad0">';
// content+='<button class="btn form-control custom-bg" style="border-radius:0px;font-size:11px;background-color:'+CURRENT_DARK_COLOR+';color:#fff;">';
// content+='<b>PROMOTE WITH&nbsp;<i class="fa fa-anchor" aria-hidden="true"></i>&nbsp;<b>HOOK</b>&nbsp;</b>';
// content+='</button>';
// content+='</div>';
/* Hook Promote Button : End */			  
			  
content+='</div>';
content+='</div>';
content+='</div>';
content+='</div>';
return content;
}

function uiTemplate_newsFeedDisplay_selFavourite(newsType,union_Id,info_Id,favText){
if(!$("#"+info_Id+"-favourite").hasClass('custom-font')){ 
  $("#"+info_Id+"-favourite").addClass('custom-font');
  $("#"+info_Id+"-favourite").css('color',CURRENT_DARK_COLOR);
  /* Add Favourite */
  var af_content='';
  if(parseInt(favText)<=1){
    af_content+='<b>You are the first to add it to </b>';
    af_content+='<i class="fa fa-heart" data-toggle="tooltip" title="Favourite" aria-hidden="true"></i>';
    af_content+=' <b>My Favourites</b></span>';
  } else {
    af_content+='<b>You added to </b>';
    af_content+='<i class="fa fa-heart" data-toggle="tooltip" title="Favourite" aria-hidden="true"></i>';
    af_content+=' <b>My Favourites with '+favText+' people </b></span>';
  }
  document.getElementById(info_Id+"-num-favourites").innerHTML=af_content;
  
  var arfcontent='Remove from <i class="fa fa-14px fa-heart"aria-hidden="true"></i> My Favourites';
  document.getElementById('newsfeed-'+info_Id+'-addRemoveMyFavourites').innerHTML=arfcontent;

  /* Ajax::: Add */
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.newsfeed.php',
{ action : 'ADD_NEWSFEED_TO_USRFAV',info_Id :info_Id, user_Id :AUTH_USER_ID,newsType:newsType },function(response){
console.log("UsrFavResponse(Add):"+response);
});
} else {
  $("#"+info_Id+"-favourite").removeClass('custom-font');
  $("#"+info_Id+"-favourite").css('color','#6c7881');
  var rf_content=(favText-1)+' people added to ';
  rf_content+='<i class="fa fa-heart" data-toggle="tooltip" title="Favourite" aria-hidden="true"></i>';
  rf_content+='<b> My Favourites</b>';
  document.getElementById(info_Id+"-num-favourites").innerHTML=rf_content;
  var rarfcontent='Add to <i class="fa fa-14px fa-heart"aria-hidden="true"></i> My Favourites';
  document.getElementById('newsfeed-'+info_Id+'-addRemoveMyFavourites').innerHTML=rarfcontent;
  
  /* Ajax ::: */ // 
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.newsfeed.php',
{ action : 'ADD_NEWSFEED_TO_REMOVEUSRFAV',info_Id :info_Id, user_Id :AUTH_USER_ID,newsType:newsType },function(response){
console.log("UsrFavResponse(Remove):"+response);
});
}
}
function uiTemplate_newsFeedDisplay_selLikes(newsType,union_Id,info_Id,likesText){
var like_status;
if(!$("#"+info_Id+"-likes").hasClass('custom-bg')){ /* Adding a Like */
  $("#"+info_Id+"-likes").addClass('custom-bg');
  $("#"+info_Id+"-likes").css('background-color',CURRENT_DARK_COLOR);
  like_status='Add';
  var content='<i class="fa fa-thumbs-up"></i>&nbsp;<b>Liked</b>';
  document.getElementById(info_Id+"-likes").innerHTML=content;
  if($("#"+info_Id+"-likes").hasClass('custom-silver')){ 
    $("#"+info_Id+"-likes").removeClass('custom-silver');
  }
} else { /* Removing a Like */
  if(!$("#"+info_Id+"-likes").hasClass('custom-silver')){ 
    $("#"+info_Id+"-likes").addClass('custom-silver');
	$("#"+info_Id+"-likes").css('background-color','#6c7881');
	like_status='Remove';
	var content='<i class="fa fa-thumbs-up"></i>&nbsp;<b>Like</b>';
	document.getElementById(info_Id+"-likes").innerHTML=content;
  }
  if($("#"+info_Id+"-likes").hasClass('custom-bg')){ 
    $("#"+info_Id+"-likes").removeClass('custom-bg');
  }
}
if(like_status==='Add') {
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.newsfeed.php',
         { action : 'ADD_NEWSFEED_TO_USRLIKES',info_Id :info_Id, user_Id :AUTH_USER_ID,newsType:newsType },
		 function(response){ console.log("UsrLikesResponse(Add):"+response); });
}

if(like_status==='Remove') {
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.newsfeed.php',
          { action : 'ADD_NEWSFEED_TO_REMOVEUSRLIKES',info_Id :info_Id, user_Id :AUTH_USER_ID,newsType:newsType },
		  function(response){ console.log("UsrLikesResponse(Remove):"+response); });
}

}
function uiTemplate_newsFeedDisplay_selVote(newsType,union_Id,info_Id, vote_status){
if(vote_status==='voteup'){
  var ajaxvoteup=false;
  if(!$("#"+info_Id+"-voteup").hasClass('custom-bg')){ 
    $("#"+info_Id+"-voteup").addClass('custom-bg');
	$("#"+info_Id+"-voteup").css('background-color',CURRENT_DARK_COLOR);
    if($("#"+info_Id+"-voteup").hasClass('custom-silver')){ $("#"+info_Id+"-voteup").removeClass('custom-silver'); }
    ajaxvoteup=true;
	var content='&nbsp;<i class="fa fa-arrow-up"></i>&nbsp;<b>up</b>&nbsp;<i class="fa fa-check"></i>';
	document.getElementById(info_Id+"-voteup").innerHTML=content;
  }
  if($("#"+info_Id+"-votedown").hasClass('custom-bg')) {
    $("#"+info_Id+"-votedown").removeClass('custom-bg');
    $("#"+info_Id+"-votedown").css('background-color','#6c7881');
	if(!$("#"+info_Id+"-votedown").hasClass('custom-silver')){ $("#"+info_Id+"-votedown").addClass('custom-silver'); }
	var content='&nbsp;<i class="fa fa-arrow-down"></i>&nbsp;<b>down</b>';
	document.getElementById(info_Id+"-votedown").innerHTML=content;
  }
  /* AddLogic-VoteUp on UI: */
   if(ajaxvoteup){
     js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.newsfeed.php',
       { action :'ADD_NEWSFEED_TO_USRVOTE',info_Id :info_Id, user_Id :AUTH_USER_ID, newsType:newsType, vote:'UP' },
	 function(response){ console.log("VoteUpResponse:"+response); });
   }
} else { 
  var ajaxvotedown=false;
  if(!$("#"+info_Id+"-votedown").hasClass('custom-bg')){ 
    $("#"+info_Id+"-votedown").addClass('custom-bg'); 
    $("#"+info_Id+"-votedown").css('background-color',CURRENT_DARK_COLOR);
	if($("#"+info_Id+"-votedown").hasClass('custom-silver')){ $("#"+info_Id+"-votedown").removeClass('custom-silver'); }
    ajaxvotedown=true;
	var content='&nbsp;<i class="fa fa-arrow-down"></i>&nbsp;<b>down</b>&nbsp;<i class="fa fa-check"></i>';
	document.getElementById(info_Id+"-votedown").innerHTML=content;
  } 
  if($("#"+info_Id+"-voteup").hasClass('custom-bg')){ 
    $("#"+info_Id+"-voteup").removeClass('custom-bg');
    $("#"+info_Id+"-voteup").css('background-color','#6c7881');
	if(!$("#"+info_Id+"-voteup").hasClass('custom-silver')){ $("#"+info_Id+"-voteup").addClass('custom-silver'); }
	var content='&nbsp;<i class="fa fa-arrow-up"></i>&nbsp;<b>up</b>';
	document.getElementById(info_Id+"-voteup").innerHTML=content;
  }
  /* AddLogic-VoteDown: */
  if(ajaxvotedown){
    js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.newsfeed.php',
      { action : 'ADD_NEWSFEED_TO_USRVOTE',info_Id :info_Id, user_Id :AUTH_USER_ID,newsType:newsType,vote:'DOWN' },
	  function(response){
         console.log("VoteDownResponse:"+response);
      });
  }
} 

}

/* Community Display Function */
function uiTemplate_simpleCommunityDisplay(param_unionId,param_unionURLName,param_domainName,param_subdomainName,
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
function uiTemplate_communityDisplay(param_unionName,param_domainName,param_subdomainName,param_profilepic,param_createdOn,
            param_minlocation, param_location, param_state, param_country, param_membersCount, param_supportersCount){
var content='<div class="list-group pad10" style="margin-bottom:10px;">';
    content+='<div class="list-group-item">';
    content+='<div class="container-fluid pad0">';
    content+='<div class="col-md-12 col-xs-12 pad0">'; 
    content+='<span class="label label-newsfeed custom-bg" style="background-color:#0ba0da;">';
    content+='<b>'+param_domainName.toUpperCase()+' / '+param_subdomainName.toUpperCase()+'</b></span>';
    content+='</div>';
    content+='<div class="col-md-12 pad0">';
    content+='<div class="col-md-4 col-xs-4 mtop15p">'; 
    content+='<img class="img-min-profilepic" src="'+param_profilepic+'">';
    content+='</div>';
    content+='<div align="left" class="col-md-8 col-xs-8 frnshipreqdiv">';
    content+='<h5><b>'+param_unionName+'</b></h5>';
    content+='<div style="color:#87898a;">created on '+param_createdOn+'</div>';
    content+='<div class="frnshipreqaddr mtop15p" style="color:#000;">'+param_minlocation+', '+param_location+', '+param_state+', '+param_country+'</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='<div class="list-group-item">';
    content+='<div class="container-fluid pad0">';
    content+='<div align="center" class="col-md-6 col-xs-6" style="border-right:1px solid #ccc;">';
    content+='<h4 style="color:#87898a;"><b>'+param_membersCount+'</b></h4>';
    content+='<b>MEMBERS</b>';
    content+='</div>';
    content+='<div align="center" class="col-md-6 col-xs-6">';
    content+='<h4 style="color:#87898a;"><b>'+param_supportersCount+'</b></h4>';
    content+='<b>SUPPORTERS</b>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
  return content;
}

/* Movement Display Function */
function uiTemplate_simpleMovementDisplay(){
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

