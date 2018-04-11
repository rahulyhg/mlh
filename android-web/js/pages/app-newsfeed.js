
$(document).ready(function(){
sideWrapperToggle();
mainMenuSelection("dn_"+USR_LANG+"_newsfeed");
bgstyle();
$(".lang_"+USR_LANG).css('display','block');
/* Set Session */
var sessionJSON='{"session_set" : [ { "key" : "AUTHENTICATION_STATUS" , "value" : "COMPLETED" }],';
	sessionJSON+='"session_get" : [ "AUTHENTICATION_STATUS" ] }';
js_session(sessionJSON,function(resp){ });

/* Get Total News Feed Here */
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.newsfeed.php',
{action:'TOTAL_PUBLIC_NEWSFEED',user_Id:AUTH_USER_ID},function(totalCount){ 
if(totalCount===0){
document.getElementById("publicNewsFeedlist").innerHTML='<div align="center"><span style="color:#aaa;">You don\'t have any more Newsfeed.</span></div>';
}
scroll_loadInitializer('publicNewsFeedlist',10,getPublicNewsFeedBySource_data,totalCount);

});

});

function getPublicNewsFeedBySource_data(div_view, appendContent,limit_start,limit_end) {  
setTimeout(function(){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.newsfeed.php',
{action:'PUBLIC_NEWSFEED', user_Id: AUTH_USER_ID, limit_start:limit_start, limit_end:limit_end },
function(resp){ console.log(resp); resp=JSON.parse(resp);
console.log("unionNewsFeed: "+resp.unionNewsFeed.length+" bizNewsFeed: "+resp.bizNewsFeed.length);
if(resp.unionNewsFeed.length>0 || resp.bizNewsFeed.length>0){
var content='';
for(var index=0;index<resp.unionNewsFeed.length;index++){
var union_Id=resp.unionNewsFeed[index].union_Id; //  union_Id
var domainName=resp.unionNewsFeed[index].domainName; //  domainName
var subdomainName=resp.unionNewsFeed[index].subdomainName; //  subdomainName
var unionName=resp.unionNewsFeed[index].unionName; //  unionName
var info_Id=resp.unionNewsFeed[index].info_Id; // info_Id
var artTitle=decodeURI(resp.unionNewsFeed[index].artTitle); // artTitle
var artShrtDesc=decodeURI(resp.unionNewsFeed[index].artShrtDesc); // artShrtDesc
var artDesc=decodeURI(resp.unionNewsFeed[index].artDesc); // artDesc
var createdOn=resp.unionNewsFeed[index].createdOn; // createdOn
var path_Id=resp.unionNewsFeed[index].path_Id; // path_Id
var images=resp.unionNewsFeed[index].images; // images
var votes_up=resp.unionNewsFeed[index].votes_up; // votes_up
    if(parseInt(votes_up)>1000000) { votes_up='100000+';}
var votes_down=resp.unionNewsFeed[index].votes_down; // votes_down
    if(parseInt(votes_down)>1000000) { votes_down='100000+';}
var status=resp.unionNewsFeed[index].status; // status
var viewed=resp.unionNewsFeed[index].viewed; // viewed
    if(parseInt(viewed)>1000000) { viewed='100000+';}
var favourites=resp.unionNewsFeed[index].favourites;
var likes=resp.unionNewsFeed[index].likes;
var usr_vote_up=resp.unionNewsFeed[index].usr_vote_up;
var usr_vote_down=resp.unionNewsFeed[index].usr_vote_down;
var usr_favourite=resp.unionNewsFeed[index].usr_favourite;
var usr_liked=resp.unionNewsFeed[index].usr_liked;
var newsType='UNION';

content+='<div id="newsfeed-'+info_Id+'" class="col-xs-12 col-sm-6 col-md-4">';
content+='<div class="list-group">';
content+='<div class="list-group-item newsfeedlistgroup">';
content+='<div class="container-fluid pad0">';

content+='<div class="col-xs-12 col-sm-12 col-md-12 mbot15p">';

content+='<span class="label label-newsfeed custom-bg" ';
content+='style="background-color:'+CURRENT_DARK_COLOR+';">';
content+=domainName.toUpperCase()+' / '+subdomainName.toUpperCase();
content+='</span>';

content+='<div class="dropdown pull-right">';
content+='<i class="fa fa-18px fa-ellipsis-v curpoint dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>';
content+='<ul class="dropdown-menu" style="margin:0px;min-width:200px;">';

content+='<li><a id="newsfeed-'+info_Id+'-addRemoveMyFavourites" href="#newsfeed-'+info_Id+'" ';
content+='onclick="javascript:sel_favourite(\''+newsType+'\',\''+union_Id+'\',\''+info_Id+'\','+favourites+');">';
if(usr_favourite==='Y'){
content+='Remove from <i class="fa fa-14px fa-heart"aria-hidden="true"></i> My Favourites';
} else {
content+='Add to <i class="fa fa-14px fa-heart"aria-hidden="true"></i> My Favourites';
}
content+='</a></li>';
content+='<li><a id="newsfeed-'+info_Id+'-statistics" href="#newsfeed-'+info_Id+'" >';
content+='View <i class="fa fa-pie-chart" aria-hidden="true"></i>&nbsp;Statistics';
content+='</a></li>';
content+='</ul>';
content+='</div>';

content+='</div>';

content+='<img align="center" class="col-xs-12 col-sm-12 col-md-12 mbot10p h200p"';
content+='src="'+images+'"/>';

content+='<div align="center" class="col-xs-12 col-sm-12 col-md-12 title">';
content+='<h5><b>'+artTitle.toUpperCase()+'</b></h5>';
content+='</div>';

content+='<div align="center" class="col-xs-12 col-sm-12 col-md-12" style="width:100%;height:80px;color:#6c7881;">';
content+=artShrtDesc;
content+='</div>';



content+='<div align="center" class="col-xs-12 col-sm-12 col-md-12">';
content+='<a href="'+PROJECT_URL+'newsfeed/news/'+newsType.toLowerCase()+'/'+info_Id+'" class="newsfeed-content">';
content+='<button class="custom-bg btn pull-right" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;">';
content+='<span style="font-size:11px;">';
content+='<i class="fa fa-14px fa-newspaper-o" aria-hidden="true"></i>&nbsp;<b>Read Full Story</b>';
content+='</span>';
content+='</button>';
content+='</a>';
content+='</div>';



content+='<div align="left" class="col-xs-12 col-sm-12 col-md-12" style="font-size:12px;">';
content+='Viewed by <span class="txtunderline" style="color:#6c7881;"><b>'+viewed;
content+=' <i class="fa fa-user" data-toggle="tooltip" title="People Viewed" aria-hidden="true"></i> people</b></span>';
content+='</div>';

/* Favourite */
if(usr_favourite==='Y'){
content+='<div id="'+info_Id+'-favourite" style="color:'+CURRENT_DARK_COLOR+';height:40px;margin-top:10px;" ';
content+='class="custom-font col-md-12 col-xs-12 mbot15px">';
content+='<span id="'+info_Id+'-num-favourites" class="fs12">';
if(parseInt(favourites)===1){
content+='<b>You are the first to add it to </b>';
content+='<i class="fa fa-heart" data-toggle="tooltip" title="Favourite" aria-hidden="true"></i>';
content+=' <b>My Favourites</b>';
} else {
content+='<b>You added to </b>';
content+='<i class="fa fa-heart" data-toggle="tooltip" title="Favourite" aria-hidden="true"></i>';
content+=' <b>My Favourites with '+favourites+' people </b>';
}
content+='</span>';
content+='</div>';
} else {
content+='<div id="'+info_Id+'-favourite" class="col-md-12 col-xs-12 mbot15px" style="height:40px;margin-top:10px;color:#6c7881;">';
content+='<span id="'+info_Id+'-num-favourites" class="fs12">';
content+='<b>'+favourites+' people added to </b>';
content+='<i class="fa fa-heart" data-toggle="tooltip" title="Favourite" aria-hidden="true"></i>';
content+='<b> My Favourites</b>';
content+='</span>';
content+='</div>';
}


content+='<div align="right" class="col-xs-12 col-sm-12 col-md-12" style="font-size:11px;">';
content+='By <span style="color:#6c7881;"><b>'+unionName.toUpperCase()+'</b></span>';
content+='</div>';

content+='<div align="right" class="col-xs-12 col-sm-12 col-md-12" style="margin-top:10px;font-size:11px;">';
content+='On <span style="color:#6c7881;"><b>'+get_stdDateTimeFormat01(createdOn)+'</b></span>';
content+='</div>';


content+='</div>';
content+='</div>';
content+='<div class="list-group-item newsfeedlistgroup" style="background-color:#fff;">';
content+='<div class="container-fluid pad0" style="color:#6c7881;">';

/* Number of Likes */
content+='<div align="left" ';
content+='class="col-md-4 col-xs-4" >';
if(usr_liked==='Y') {
content+='<span id="'+info_Id+'-likes" class="curpoint socio-btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';"';
content+='onclick="javascript:sel_likes(\''+newsType+'\',\''+union_Id+'\',\''+info_Id+'\','+likes+');">';
content+='<i class="fa fa-thumbs-up"></i>&nbsp;<b>Liked</b>&nbsp;<i class="fa fa-check"></i>';
content+='</span>';

} else {
content+='<span id="'+info_Id+'-likes" class="curpoint socio-btn custom-silver"';
content+='onclick="javascript:sel_likes(\''+newsType+'\',\''+union_Id+'\',\''+info_Id+'\','+likes+');">';
content+='<i class="fa fa-thumbs-up"></i>&nbsp;<b>Like</b>';
content+='</span>';
}
content+='</div>';

/* Vote Up */
content+='<div align="right" class="custom-font curpoint col-md-8 col-xs-8">';
if(usr_vote_up==='Y' || usr_vote_down==='Y'){ content+='<b>Voted:</b>&nbsp;'; }
else { content+='<b>Vote:</b>&nbsp;'; }
if(usr_vote_up==='Y'){
content+='<span id="'+info_Id+'-voteup" style="background-color:'+CURRENT_DARK_COLOR+';" ';
content+='align="center" class="custom-bg curpoint socio-btn" ';
content+='onclick="javascript:sel_vote(\''+newsType+'\',\''+union_Id+'\',\''+info_Id+'\',\'voteup\');">';
content+='<i class="fa fa-arrow-up"></i>&nbsp;<b>up</b>&nbsp;<i class="fa fa-check"></i>';
content+='</span>';
} else {
content+='<span id="'+info_Id+'-voteup" align="center" class="curpoint socio-btn custom-silver" ';
content+='onclick="javascript:sel_vote(\''+newsType+'\',\''+union_Id+'\',\''+info_Id+'\',\'voteup\');">';
content+='<i class="fa fa-arrow-up"></i>&nbsp;<b>up</b>';
content+='</span>';
}
if(usr_vote_down==='Y'){ 
content+='<span id="'+info_Id+'-votedown" align="center" style="background-color:'+CURRENT_DARK_COLOR+';" ';
content+='class="custom-bg curpoint socio-btn" ';
content+='onclick="javascript:sel_vote(\''+newsType+'\',\''+union_Id+'\',\''+info_Id+'\',\'votedown\');">';
content+='&nbsp;<i class="fa fa-arrow-down"></i>&nbsp;<b>down</b>&nbsp;<i class="fa fa-check"></i>';
content+='</span>';
} else {
content+='<span id="'+info_Id+'-votedown" ';
content+='align="center" class="curpoint socio-btn custom-silver" ';
content+='onclick="javascript:sel_vote(\''+newsType+'\',\''+union_Id+'\',\''+info_Id+'\',\'votedown\');">';
content+='&nbsp;<i class="fa fa-arrow-down"></i>&nbsp;<b>down</b>';
content+='</span>';
}
content+='</div>';

content+='</div>';
content+='</div>';
content+='<div class="list-group-item pad0">';
content+='<div class="container-fluid pad0" style="color:#6c7881;">';

/* Anchor */
content+='<div align="center" class="col-md-12 col-xs-12 pad0">';
content+='<button class="btn form-control custom-bg" style="border-radius:0px;font-size:11px;background-color:'+CURRENT_DARK_COLOR+';color:#fff;">';
// content+='<span class="socio-btn custom-bg" >';
content+='<b>PROMOTE WITH&nbsp;<i class="fa fa-anchor" aria-hidden="true"></i>&nbsp;<b>HOOK</b>&nbsp;</b>';
// content+='</span>';
content+='</button>';
content+='</div>';
			  
			  
content+='</div>';
content+='</div>';
content+='</div>';
content+='</div>';
}
for(var index=0;index<resp.bizNewsFeed.length;index++){
var bizname=resp.bizNewsFeed[index].bizname; // bizname
var info_Id=resp.bizNewsFeed[index].info_Id; // info_Id
var domain_Id=resp.bizNewsFeed[index].domain_Id;  // domain_Id
var subdomain_Id=resp.bizNewsFeed[index].subdomain_Id;  // subdomain_Id
var biz_Id=resp.bizNewsFeed[index].biz_Id; //  biz_Id
var artTitle=decodeURI(resp.bizNewsFeed[index].artTitle); // artTitle
var artShrtDesc=decodeURI(resp.bizNewsFeed[index].artShrtDesc); // artShrtDesc
var artDesc=decodeURI(resp.bizNewsFeed[index].artDesc); // artDesc
var createdOn=resp.bizNewsFeed[index].createdOn; // createdOn
var path_Id=resp.bizNewsFeed[index].path_Id; // path_Id
var images=resp.bizNewsFeed[index].images; // images
var votes_up=resp.bizNewsFeed[index].votes_up; // votes_up
var votes_down=resp.bizNewsFeed[index].votes_down; // votes_down
var status=resp.bizNewsFeed[index].status; // status
var viewed=resp.bizNewsFeed[index].viewed; // viewed
var minlocation=resp.bizNewsFeed[index].minlocation; // minlocation
var location=resp.bizNewsFeed[index].location; // location
var state=resp.bizNewsFeed[index].state; // state
var country=resp.bizNewsFeed[index].country; // country
				  
content+='<a href="'+PROJECT_URL+'app/newsfeed/'+info_Id+'" class="newsfeed-content">';
content+='<div class="col-xs-12 col-sm-6 col-md-4">';
content+='<div class="news">';
content+='<div class="news-container container-fluid padtop15px">';
content+='<div class="col-xs-12 border1black mbot15p">';
content+='<span class="label label-newsfeed custom-bg" ';
content+='style="background-color:'+CURRENT_DARK_COLOR+';">'+bizname.toUpperCase()+'</span>';
content+='</div>';
content+='<img align="center" class="col-xs-12 mbot10p h200p"';
content+='src="'+images+'"/>';

content+='<div class="col-xs-12 title">';
content+='<h5><b>'+artTitle.toUpperCase()+'</b></h5>';
content+='</div>';

content+='<div class="col-xs-12">';
content+='<span class="postedBy">By '+bizname.toUpperCase()+'</span>';
content+='</div>';

content+='<div align="right" class="col-xs-12">';
content+='<span class="postedBy">On '+get_stdDateTimeFormat01(createdOn)+'</span>';
content+='</div>';

content+='</div>';
content+='</div>';
content+='</div>';
content+='</a>';
}
content+=appendContent;
document.getElementById(div_view).innerHTML=content; 
}
});
  
},1);
}

function sel_vote(newsType,union_Id,info_Id, vote_status){ 
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
     js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.newsfeed.php',
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
    js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.newsfeed.php',
      { action : 'ADD_NEWSFEED_TO_USRVOTE',info_Id :info_Id, user_Id :AUTH_USER_ID,newsType:newsType,vote:'DOWN' },
	  function(response){
         console.log("VoteDownResponse:"+response);
      });
  }
} 

}


function sel_favourite(newsType,union_Id,info_Id,favText){
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
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.newsfeed.php',
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
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.newsfeed.php',
{ action : 'ADD_NEWSFEED_TO_REMOVEUSRFAV',info_Id :info_Id, user_Id :AUTH_USER_ID,newsType:newsType },function(response){
console.log("UsrFavResponse(Remove):"+response);
});
}
}

function sel_likes(newsType,union_Id,info_Id,likesText){
var like_status;
if(!$("#"+info_Id+"-likes").hasClass('custom-bg')){ /* Adding a Like */
  $("#"+info_Id+"-likes").addClass('custom-bg');
  $("#"+info_Id+"-likes").css('background-color',CURRENT_DARK_COLOR);
  like_status='Add';
  var content='<i class="fa fa-check-circle"></i>&nbsp;<b>Liked</b>&nbsp;<i class="fa fa-check-circle"></i>';
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
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.newsfeed.php',
         { action : 'ADD_NEWSFEED_TO_USRLIKES',info_Id :info_Id, user_Id :AUTH_USER_ID,newsType:newsType },
		 function(response){ console.log("UsrLikesResponse(Add):"+response); });
}

if(like_status==='Remove') {
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.newsfeed.php',
          { action : 'ADD_NEWSFEED_TO_REMOVEUSRLIKES',info_Id :info_Id, user_Id :AUTH_USER_ID,newsType:newsType },
		  function(response){ console.log("UsrLikesResponse(Remove):"+response); });
}

}