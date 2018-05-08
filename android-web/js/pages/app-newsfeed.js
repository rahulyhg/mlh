
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
if(totalCount==='0'){
document.getElementById("publicNewsFeedlist").innerHTML='<div align="center" style="font-size:14px;color:#aaa;">You don\'t have any more Newsfeed.</div>';
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
content+=uiTemplate_newsFeedDisplay(union_Id, domainName, subdomainName, unionName, info_Id, artTitle, artShrtDesc, 
         artDesc, createdOn, images, votes_up, votes_down, status, viewed, favourites, likes, usr_vote_up, usr_vote_down, 
         usr_favourite, usr_liked, newsType);
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

