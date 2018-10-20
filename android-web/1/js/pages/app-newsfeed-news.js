$(document).ready(function(){
sideWrapperToggle();
mainMenuSelection("dn_"+USR_LANG+"_newsfeed");
bgstyle();
$(".lang_"+USR_LANG).css('display','block');
addToUserViewed();
});

function addToUserViewed(){
/* This Function notes the details as User Viewed this News */
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.newsfeed.news.php',
{ action:'ADD_NEWSFEED_TO_USRVIEWED', newsType:INPUT_PARAM01.toUpperCase(), info_Id:INPUT_PARAM02, user_Id:AUTH_USER_ID },
function(resp){ getNewsFeed(); }); 
}
function getNewsFeed(){
/* This Function loads the Data */
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.newsfeed.news.php',
{ action:'VIEW_ARTICLE',newsType:INPUT_PARAM01.toUpperCase(), info_Id:INPUT_PARAM02 },function(resp){
console.log(resp);
resp=JSON.parse(resp);
	for(var index=0;index<resp.length;index++){
	var info_Id=resp[index].info_Id;
	var union_Id=resp[index].union_Id;
	var artTitle=decodeURI(resp[index].artTitle);
	var artShrtDesc=decodeURI(resp[index].artShrtDesc);
	var artDesc=decodeURI(resp[index].artShrtDesc);
	var createdOn=resp[index].createdOn;
	var path_Id=resp[index].path_Id;
	var images=resp[index].images;
	var votes_up=resp[index].votes_up;
	var votes_down=resp[index].votes_down;
	var status=resp[index].status;
	var viewedPeople=resp[index].viewedPeople; 
    var viewedImpressions=resp[index].viewedImpressions;
	var domain_Id=resp[index].domain_Id;
	var subdomain_Id=resp[index].subdomain_Id;
	var unionName=resp[index].unionName;
	var unionURLName=resp[index].unionURLName;
	var cover_pic=resp[index].cover_pic;
	var profile_pic=resp[index].profile_pic;
	var minlocation=resp[index].minlocation;
	var location=resp[index].location;
	var state=resp[index].state;
	var country=resp[index].country;
	var created_On=resp[index].created_On;
	var admin_Id=resp[index].admin_Id;
	var members=resp[index].members;
	var supporters=resp[index].supporters; //   
	
	var content='<div class="col-md-12 col-xs-12">';
	    content+='<div align="center">';
		content+='<h4 id="newsfeed-title" style="line-height:25px;"><b>'+artTitle.toUpperCase()+'</b></h4><hr/>';
		content+='</div>';
		content+='</div>';
		
		content+='<div align="left" class="col-md-12 col-xs-12">';
		content+='<h5 align="right" style="line-height:25px;">';
		content+='Posted by<span id="newsfeed-PostedBy" style="color:#888;">'+'<i>'+unionName+'</i>'+'</span><br/>';
		content+='On '+get_stdDateTimeFormat01(created_On)+'<br/>';
		// content+='viewed By '+viewed+' people';
		content+='</h5><hr/>';
		content+='</div>';
		
		
		content+='<div class="col-md-12 col-xs-12" style="font-size:16px;color:#888;line-height:25px;">';
		content+='<br/><b>Short Summary:</b> <span id="newsfeed-shrtSummary">'+artShrtDesc+'</span>';
		content+='</div>';
		
		
		content+='</div>';
		
	    content+='<div id="newsfeed-coverpic" class="col-md-12 col-xs-12">';
		content+='<br/><img src="'+images+'" style="width:100%;height:auto;"/>';
		content+='</div>';
		
		
		
		content+='<div id="newsfeed-artDesc" class="col-md-12 col-xs-12 mtop15p" style="font-size:16px;line-height:25px;">';
		content+=artDesc;
		content+='</div>';
		
		content+='<div align="right" class="col-md-12 col-xs-12 mtop15p">';
		content+='<hr/>Read by ';
		content+='<span class="viewReadPeopleAndImpressionsList custom-font" style="color:'+CURRENT_DARK_COLOR+';" onclick="javascript:viewReadPeopleAndImpressionsList();">';
		content+='<i class="fa fa-user" aria-hidden="true"></i> '+viewedPeople+' People ';
		content+='</span>';
		content+='with <i class="fa fa-eye" aria-hidden="true"></i> '+viewedImpressions+' Views<hr/>';
		content+='</div>';

		content+='<div class="col-md-12 col-xs-12 mtop15p">';
		content+='<div align="center" class="col-md-2 col-xs-4 mbot15p">';
		content+='<i class="fa fa-2x fa-anchor curpoint custom-lgt-font" data-toggle="tooltip" title="Hook it to Friends" aria-hidden="true"></i>';
		content+='</div>';
		
		content+='<div align="center" class="col-md-2 col-xs-4 mbot15p">';
		content+='<i class="fa fa-2x fa-thumbs-up curpoint custom-lgt-font" data-toggle="tooltip" title="Likes" aria-hidden="true"></i>';
		content+='</div>';
		
		content+='<div align="center" class="col-md-2 col-xs-4 mbot15p">';
		content+='<i class="fa fa-2x fa-thumbs-down curpoint custom-lgt-font" data-toggle="tooltip" title="Unlikes" aria-hidden="true"></i>';
		content+='</div>';
						  
		content+='<div align="center" class="col-md-2 col-xs-4 mbot15p">';
		content+='<i class="fa fa-2x fa-star curpoint custom-lgt-font" data-toggle="tooltip" title="Add To Favourites" aria-hidden="true"></i>';
		content+='</div>';
		
		content+='<div align="center" class="col-md-2 col-xs-4 mbot15p">';
		content+='<a href="'+PROJECT_URL+'app/news/'+info_Id+'/statistics/fhfttgh" style="text-decoration:none;">';
		content+='<i class="fa fa-2x fa-area-chart curpoint custom-lgt-font" data-toggle="tooltip" title="Statistics" aria-hidden="true"></i>';
		content+='</a>';
		content+='</div>';
		
	document.getElementById("div-newsFeed-news").innerHTML=content;			
  }
});

}

function viewReadPeopleAndImpressionsList(){
var content='<div class="modal-dialog">';  // div1 - start
    content+='<div class="modal-content">'; // div2 - start
	content+='<div class="modal-header">'; // div3 - start
    content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
    content+='<h5 class="modal-title"><b>READ BY</b></h5>';
    content+='</div>'; // div3 - end
	content+='<div class="modal-body">'; // div4 - start
	
	content+='<div class="container-fluid" style="padding:0px;">';// div5 - start
    content+='<div class="row">';  // div6 - start 
	content+='<div class="col-md-12 col-xs-12">'; // div7 - start
	content+='<div id="div_viewReadPeopleAndImpressions" class="list-group">';  // div8 - start
	content+='<div align="center">';
	content+='<img src="images/load.gif" style="width:150px;height:150px;"/>';
	content+='</div>';
	content+='</div>'; // div8 - end
	content+='</div>'; // div7 - end
	content+='</div>'; // div6 - end
	content+='</div>'; // div5 - end
	
	content+='</div>'; // div4 - end
	
	content+='</div>'; // div2 - end
	content+='</div>'; // div1 - end
	
document.getElementById("appNewsFeedNewsModal").innerHTML=content;
$('#appNewsFeedNewsModal').modal();
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.newsfeed.news.php',
{ action : 'NEWSFEED_READ_PEOPLEVIEWSINFOCOUNT',info_Id : INPUT_PARAM02 },function(total_data){
 scroll_loadInitializer('div_viewReadPeopleAndImpressions',10,contentData_readPeopleAndImpressions,total_data);
});
  
}

function contentData_readPeopleAndImpressions(div_view, appendContent,limit_start,limit_end){
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.newsfeed.news.php',
  { action : 'NEWSFEED_READ_PEOPLEVIEWSINFO',info_Id : INPUT_PARAM02, limit_start: limit_start, limit_end :limit_end },
  function(response){
    response=JSON.parse(response);
	var content='';
	   
	for(var index=0;index<response.length;index++){
	 var profile_pic=response[index].profile_pic;
	 var surName=response[index].surName;
	 var name=response[index].name;
	 var viewedImpressions=response[index].viewedImpressions;
	
	content+='<div class="list-group-item">'; // div5 - start
	content+='<div class="container-fluid">';  // div6 - start
	content+='<div class="row">';  // div7 - start
	content+='<div class="col-md-4 col-xs-4">'; // div8 - start
	content+='<img src="'+profile_pic+'" class="viewReadPeople-profilepic"/>';
	content+='</div>';  // div8 - end
	content+='<div class="col-md-8 col-xs-8">'; // div9 -start
	content+='<div class="col-md-12 col-xs-12">';  // div10 - start
	content+='<h5 style="line-height:25px;"><b>'+surName+' '+name+'</b></h5>';
	content+='</div>';  // div10 -end
	content+='<div class="col-md-12 col-xs-12">';  // div11 - start
	content+='<span style="line-height:25px;">Viewed '+viewedImpressions+' Times</span>';
	content+='</div>';  // div11 - end
	content+='</div>'; // div9 - end
	content+='</div>';  // div7 - end
	content+='</div>'; // div6 - end
	content+='</div>'; // div5 - end
	}
	
	content+=appendContent;
	document.getElementById("div_viewReadPeopleAndImpressions").innerHTML=content;
    console.log(response);
  });
}