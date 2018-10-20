$(document).ready(function(){
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
 sel_createNewsFeedTab('createNewsFeedTab_writeNewsFeed');
 upload_picture_900X300('createNewsFeedForm_newsImage',PROJECT_URL+'images/textures/upload900x300.png');
 cloudservers_auth();
 $('.summernote').summernote();
});
function sel_createNewsFeedTab(id){
 var arry_id=["createNewsFeedTab_writeNewsFeed","createNewsFeedTab_Post"];
 var arry_content=["createNewsFeedContent_writeNewsFeed","createNewsFeedContent_Post"]; 
 for(var index=0;index<arry_id.length;index++){
  if(arry_id[index]===id){
    if($('#'+arry_content[index]).hasClass('hide-block')){ $('#'+arry_content[index]).removeClass('hide-block'); }
    if(!$('#'+arry_id[index]).hasClass('custom-font')){ $('#'+arry_id[index]).addClass('custom-font'); }
	if(!$('#'+arry_id[index]).hasClass('custom-bg-solid2pxbottomborder')){ $('#'+arry_id[index]).addClass('custom-bg-solid2pxbottomborder'); }
    $('#'+arry_id[index]).css("border-bottom","2px solid "+CURRENT_DARK_COLOR);
	$('#'+arry_id[index]).css("color",CURRENT_DARK_COLOR);
  } else {
    if(!$('#'+arry_content[index]).hasClass('hide-block')){ $('#'+arry_content[index]).addClass('hide-block'); }
    if($('#'+arry_id[index]).hasClass('custom-font')){ $('#'+arry_id[index]).removeClass('custom-font'); }
	if($('#'+arry_id[index]).hasClass('custom-bg-solid2pxbottomborder')){ $('#'+arry_id[index]).removeClass('custom-bg-solid2pxbottomborder'); }
    $('#'+arry_id[index]).css("border","0px");
	$('#'+arry_id[index]).css("color","#000");
  }
 } 
}

var ARTICLE_TITLE;
var ARTICLE_SHORTDESC;
var ARTICLE_DESCRIPTION;
var MEDIAURL01;
var MEDIAURL02;
var MEDIAURL03;
function finish_writeNewsFeedForm(){
  ARTICLE_TITLE = encodeURI(document.getElementById("createNewsFeedForm_artTitle").value);
  ARTICLE_SHORTDESC = encodeURI(document.getElementById("createNewsFeedForm_artShrtSummary").value);
  ARTICLE_DESCRIPTION = encodeURI($('#createNewsFeedForm_artDesc').summernote('code'));
  MEDIAURL01 = document.getElementById("createNewsFeedForm_mediaURL01").value;
  MEDIAURL02 = document.getElementById("createNewsFeedForm_mediaURL02").value;
  MEDIAURL03 = document.getElementById("createNewsFeedForm_mediaURL03").value;
  
  var mediaValidator =  true;
  if(MEDIAURL01.length>0 && get_youtube_videoId(MEDIAURL01)=='INVALID'){ mediaValidator =  false; }
  if(MEDIAURL02.length>0 && get_youtube_videoId(MEDIAURL02)=='INVALID'){ mediaValidator =  false; }
  if(MEDIAURL03.length>0 && get_youtube_videoId(MEDIAURL03)=='INVALID'){ mediaValidator =  false; }
  
  if(IMG_URL.length>0){
  if(ARTICLE_TITLE.length>0){
  if(ARTICLE_SHORTDESC.length>0){
  if(ARTICLE_DESCRIPTION.length>0){
    if(mediaValidator){
	  sel_createNewsFeedTab('createNewsFeedTab_Post');
      load_access_unionBranches();
	} else { alert_display_warning('W048');  }
  } else { alert_display_warning('W045');}
  } else { alert_display_warning('W044'); }
  } else { alert_display_warning('W043'); } 
  } else { alert_display_warning('W046'); } 
}

function load_access_unionBranches(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php', 
 { action:'GET_COUNT_LISTOFUNIONSCREATENEWSFEED', user_Id: AUTH_USER_ID },
 function(total_data){ console.log("total_data: "+total_data); 
   scroll_loadInitializer('loadAvailableCommunityList',10,load_unionBranches_contentData,total_data);
 });
}

function load_unionBranches_contentData(div_view, appendContent,limit_start,limit_end){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php', 
      { action:'GET_DATA_LISTOFUNIONSCREATENEWSFEED', user_Id: AUTH_USER_ID, limit_start:limit_start, 
	    limit_end:limit_end }, function(response){
	console.log(response);
 response = JSON.parse(response);
 var content='';
 for(var index=0;index<response.length;index++){
  var union_Id = response[index].union_Id;
  var unionName = response[index].unionName;
  var profile_pic = response[index].profile_pic;
  var domain_Id = response[index].domain_Id;
  var domainName = response[index].domainName;
  var subdomain_Id = response[index].subdomain_Id;
  var subdomainName = response[index].subdomainName;
  var createNewsFeedUnionLevel = response[index].createNewsFeedUnionLevel;
  var approveNewsFeedUnionLevel = response[index].approveNewsFeedUnionLevel;
  UNIONBRANCHES_POSTSHARE[union_Id]={ "branches":"ALL",
									  "branchesInfo":[],
									  "createNewsFeedUnionLevel":createNewsFeedUnionLevel, 
									  "approveNewsFeedUnionLevel":approveNewsFeedUnionLevel,
									  "viewMembers":"Y", "viewSubscribers": "Y"
									}; //   
									
  content+='<div id="div-communityList-'+union_Id+'" class="list-group">';
  content+='<div class="list-group-item">';
  content+='<div class="container-fluid">';
  content+='<div class="row">';
  content+='<div class="col-xs-4">';
  content+='<img src="'+profile_pic+'" style="width:50px;height:50px;border-radius:50%;background-color:#e7e7e7;"/>';
  content+='</div>';
  content+='<div class="col-xs-8">';
  content+='<h5><b>'+unionName+'</b></h5>';
  content+='<div style="font-size:10px;padding:5px;border:1px solid #ccc;">';
  content+='<span>'+domainName+' / '+subdomainName+'</span>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='<div class="list-group-item" style="background-color:#e7e7e7;"';
  content+='data-toggle="collapse" data-target="#share-details-'+union_Id+'">';
  content+='<b>Share Details ';
  content+='<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></b>';
  content+='</div>';
  content+='<div id="share-details-'+union_Id+'" class="collapse">';
  content+='<div class="list-group-item" >';
  content+='<div class="container-fluid">';
  content+='<div class="row">';
  content+='<div class="col-xs-12">';
  content+='<div class="form-group">';
  content+='<div><label>Share NewsFeed</label></div>';
  content+='<div align="left"><input id="share-toggle-'+union_Id+'" type="checkbox" checked data-toggle="toggle" ';
  content+='data-on="Within Community" data-off="Within Branches" data-width="200" ';
  content+='data-onstyle="success" data-offstyle="danger" ';
  content+='onchange="javascript:unionBranches_shareInfo(\''+union_Id+'\',\''+createNewsFeedUnionLevel+'\',\''+approveNewsFeedUnionLevel+'\');"/></div>';
  content+='<div id="settings-withinCommunity-'+union_Id+'">';
  content+='<div class="checkbox"><label>';
  content+='<input type="checkbox" id="settings-withinCommunity-members-'+union_Id+'" data-toggle="toggle" ';
  content+='data-on="Yes" data-off="No" data-width="75" ';
  content+='onchange="javascript:unionBranches_shareInfo(\''+union_Id+'\',\''+createNewsFeedUnionLevel+'\',\''+approveNewsFeedUnionLevel+'\');" checked/>';
  content+='&nbsp;Share with Members</label>';
  content+='</div>';
  content+='<div class="checkbox"><label>';
  content+='<input type="checkbox" id="settings-withinCommunity-subscribers-'+union_Id+'" data-toggle="toggle" ';
  content+='data-on="Yes" data-off="No" data-width="75" ';
  content+='onchange="javascript:unionBranches_shareInfo(\''+union_Id+'\',\''+createNewsFeedUnionLevel+'\',\''+approveNewsFeedUnionLevel+'\');" checked/>';
  content+='&nbsp;Share with Subscribers</label>';
  content+='</div>';
  content+='<div>';
  content+='';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='<div id="branches-list-'+union_Id+'-0">';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  console.log("UNIONBRANCHES_POSTSHARE: "+JSON.stringify(UNIONBRANCHES_POSTSHARE));
 }
 content+=appendContent;
 document.getElementById(div_view).innerHTML=content; 
  $('input[data-toggle="toggle"]').bootstrapToggle();
 });
}
function unionBranches_shareInfo(union_Id,createNewsFeedUnionLevel,approveNewsFeedUnionLevel){
 var shareToggle = document.getElementById("share-toggle-"+union_Id).checked;
 if(!shareToggle){
 if(!$('#settings-withinCommunity-'+union_Id).hasClass('hide-block')){ 
	   $('#settings-withinCommunity-'+union_Id).addClass('hide-block'); 
	}
 var content='<div align="center" class="list-group-item">';
	 content+='<img src="'+PROJECT_URL+'images/load.gif" class="profile_pic_img1"/>';
	 content+='</div>';
 document.getElementById("branches-list-"+union_Id+'-0').innerHTML=content;
 /* Set Branch for NOT_ALL */
 UNIONBRANCHES_POSTSHARE[union_Id]["branches"]="NOT_ALL";
 
 /* Remove viewMembers and viewSubscribers for Community */
 if(UNIONBRANCHES_POSTSHARE[union_Id]["viewMembers"]!==undefined){ delete UNIONBRANCHES_POSTSHARE[union_Id]["viewMembers"]; }
 if(UNIONBRANCHES_POSTSHARE[union_Id]["viewSubscribers"]!==undefined){ delete UNIONBRANCHES_POSTSHARE[union_Id]["viewSubscribers"]; }
 
 /* delete createNewsFeedUnionLevel and approveNewsFeedUnionLevel for Community */
 delete UNIONBRANCHES_POSTSHARE[union_Id]["createNewsFeedUnionLevel"];
 delete UNIONBRANCHES_POSTSHARE[union_Id]["approveNewsFeedUnionLevel"];
 
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
 { action:'GET_COUNT_LISTOFBRANCHESCREATENEWSFEED', user_Id: AUTH_USER_ID, union_Id:union_Id },function(total_data){
     scroll_loadInitializer('branches-list-'+union_Id+'-',10,load_branchesInCommunityForm_contentData,total_data); 	
 });
 
 } else {
    var viewMembers = document.getElementById("settings-withinCommunity-members-"+union_Id).checked;
	var viewSubscribers = document.getElementById("settings-withinCommunity-subscribers-"+union_Id).checked;
	/* Set ALL Branches */
    UNIONBRANCHES_POSTSHARE[union_Id]["branches"]="ALL";
	/* Make BranchesInfo Empty */
	UNIONBRANCHES_POSTSHARE[union_Id]["branchesInfo"].splice(0,UNIONBRANCHES_POSTSHARE[union_Id]["branchesInfo"].length-1);
	
	/* Set viewMembers and viewSubscribers for Community */
	if(viewMembers){ UNIONBRANCHES_POSTSHARE[union_Id]["viewMembers"] = 'Y'; }
	else { UNIONBRANCHES_POSTSHARE[union_Id]["viewMembers"] = 'N'; }
	if(viewSubscribers){ UNIONBRANCHES_POSTSHARE[union_Id]["viewSubscribers"] = 'Y'; }
	else { UNIONBRANCHES_POSTSHARE[union_Id]["viewSubscribers"] = 'N'; }
	
	/* add createNewsFeedUnionLevel and approveNewsFeedUnionLevel for Community */
	UNIONBRANCHES_POSTSHARE[union_Id]["createNewsFeedUnionLevel"] = createNewsFeedUnionLevel;
    UNIONBRANCHES_POSTSHARE[union_Id]["approveNewsFeedUnionLevel"] = approveNewsFeedUnionLevel;
 
    if($('#settings-withinCommunity-'+union_Id).hasClass('hide-block')){ 
	   $('#settings-withinCommunity-'+union_Id).removeClass('hide-block'); 
	}
	
	document.getElementById("branches-list-"+union_Id+'-0').innerHTML='';
 }
 console.log("UNIONBRANCHES_POSTSHARE: "+JSON.stringify(UNIONBRANCHES_POSTSHARE));
}
function load_branchesInCommunityForm_contentData(div_view, appendContent,limit_start,limit_end){
 var union_Id = div_view.split("-")[2];
 console.log("load_branchesInCommunityForm_contentData[union_Id]: "+union_Id);
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
 { action:'GET_DATA_LISTOFBRANCHESCREATENEWSFEED', user_Id: AUTH_USER_ID, union_Id:union_Id, limit_start:limit_start,
   limit_end:limit_end },function(response){
    console.log(response);
	response = JSON.parse(response);
	var content='';
	for(var index=0;index<response.length;index++){
	  var branch_Id = response[index].branch_Id;
	  var union_Id = response[index].union_Id;
	  var minlocation = response[index].minlocation;
	  var location = response[index].location;
	  var state = response[index].state;
	  var country = response[index].country;
	  var role_Id = response[index].role_Id;
	  var roleName = response[index].roleName;
	  var createNewsFeedBranchLevel = response[index].createNewsFeedBranchLevel;
	  var approveNewsFeedBranchLevel = response[index].approveNewsFeedBranchLevel;
	  content+='<div class="list-group-item">';
      content+='<div class="container-fluid">';
      content+='<div class="row">';
      content+='<div class="col-xs-2">';
      content+='<input id="check-unionBranchesList-'+union_Id+'-'+branch_Id+'" type="checkbox" style="width:25px;height:25px;" ';
	  content+='onclick="javascript:track_unionBranchesList(\''+union_Id+'\',\''+branch_Id+'\',\''+createNewsFeedBranchLevel+'\',\''+approveNewsFeedBranchLevel+'\');"/>';
      content+='</div>';
      content+='<div class="col-xs-10">';
      content+='<div>You are <span class="label label-primary">'+roleName+'</span> in</div>';
      content+='<div class="mtop5p" style="color:#aaa;">'+minlocation+', '+location+', '+state+', '+country+'</div>';
	  content+='<div id="settings-withinBranches-'+union_Id+'-'+branch_Id+'" class="hide-block">';
      
	  content+='<div class="checkbox"><label>';
      content+='<input type="checkbox" id="settings-withinBranches-members-'+union_Id+'-'+branch_Id+'" data-toggle="toggle" ';
      content+='data-on="Yes" data-off="No" data-width="75" ';
      content+='onchange="javascript:track_unionBranchesList(\''+union_Id+'\',\''+branch_Id+'\',\''+createNewsFeedBranchLevel+'\',\''+approveNewsFeedBranchLevel+'\');" checked/>';
      content+='&nbsp;Share with Members</label>';
      content+='</div>';
	  content+='<div class="checkbox"><label>';
      content+='<input type="checkbox" id="settings-withinBranches-subscribers-'+union_Id+'-'+branch_Id+'" data-toggle="toggle" ';
      content+='data-on="Yes" data-off="No" data-width="75" ';
      content+='onchange="javascript:track_unionBranchesList(\''+union_Id+'\',\''+branch_Id+'\',\''+createNewsFeedBranchLevel+'\',\''+approveNewsFeedBranchLevel+'\');" checked/>';
      content+='&nbsp;Share with Subscribers</label>';
      content+='</div>';
	  
      content+='</div>';
      content+='</div>';
      content+='</div>';
      content+='</div>';
      content+='</div>';
	}
	content+=appendContent;
	document.getElementById(div_view).innerHTML = content;
	$('input[data-toggle="toggle"]').bootstrapToggle();
 });
}
var UNIONBRANCHES_POSTSHARE={};
function track_unionBranchesList(union_Id, branch_Id,createNewsFeedBranchLevel, approveNewsFeedBranchLevel){
 var checked = document.getElementById("check-unionBranchesList-"+union_Id+"-"+branch_Id).checked;
 var branchInfoObject = UNIONBRANCHES_POSTSHARE[union_Id]["branchesInfo"];
 var viewSubscribers = document.getElementById("settings-withinBranches-subscribers-"+union_Id+"-"+branch_Id).checked;
 var viewMembers = document.getElementById("settings-withinBranches-members-"+union_Id+"-"+branch_Id).checked;
 console.log("viewSubscribers: "+viewSubscribers+" viewMembers: "+viewMembers);
 if(checked){ // Add to List
  var branchRecognizer = false;
   for(var index=0;index<branchInfoObject.length;index++){
    if(branchInfoObject[index]["branch_Id"]===branch_Id){ 
	  branchRecognizer = true;
	   if(viewMembers){ branchInfoObject[index]["viewMembers"] = 'Y'; }
	  else { branchInfoObject[index]["viewMembers"] = 'N'; }
  
      if(viewSubscribers){ branchInfoObject[index]["viewSubscribers"] = 'Y'; }
      else { branchInfoObject[index]["viewSubscribers"] = 'N'; }
	  break; 
	}
  }
  if(!branchRecognizer){
   branchInfoObject[branchInfoObject.length] = { "branch_Id":branch_Id, 
							"createNewsFeedBranchLevel":createNewsFeedBranchLevel,
							"approveNewsFeedBranchLevel":approveNewsFeedBranchLevel,
							"viewSubscribers":"Y", "viewMembers":"Y" };
  }
  /* View viewMembers and viewSubscribers Div */
  if($('#settings-withinBranches-'+union_Id+'-'+branch_Id).hasClass('hide-block')){
     $('#settings-withinBranches-'+union_Id+'-'+branch_Id).removeClass('hide-block');
  }
  
	 
	  
 } else { // Delete from List
   /* Hide viewMembers and viewSubscribers Div */
   if(!$('#settings-withinBranches-'+union_Id+'-'+branch_Id).hasClass('hide-block')){
     $('#settings-withinBranches-'+union_Id+'-'+branch_Id).addClass('hide-block');
   }
  
   for(var index=0;index<branchInfoObject.length;index++){
      if(branchInfoObject[index]["branch_Id"]===branch_Id){
	    branchInfoObject.splice(index,1);
	  }
   }
 }
console.log("UNIONBRANCHES_POSTSHARE: "+JSON.stringify(UNIONBRANCHES_POSTSHARE)); 
}
function newsFeedForm_saveAndPublish(){
 console.log("UNIONBRANCHES_POSTSHARE: "+JSON.stringify(UNIONBRANCHES_POSTSHARE));
 var formRecognizer = false;
 for(var union_Id in UNIONBRANCHES_POSTSHARE){
   var branches = UNIONBRANCHES_POSTSHARE[union_Id]["branches"];
   var branchesInfo = UNIONBRANCHES_POSTSHARE[union_Id]["branchesInfo"];
   console.log("branches: "+branches);
   if(branches==='ALL'){ 
    var viewMembers = UNIONBRANCHES_POSTSHARE[union_Id]["viewMembers"];
	var viewSubscribers = UNIONBRANCHES_POSTSHARE[union_Id]["viewSubscribers"];
	if(viewMembers==='Y' || viewSubscribers=='Y'){ formRecognizer = true;break; }
   }
   if(branches==='NOT_ALL'){
    if(branchesInfo.length>0){
	 for(var index=0;index<branchesInfo.length;index++){
	  var viewMembers = branchesInfo[index]["viewMembers"];
	  var viewSubscribers = branchesInfo[index]["viewSubscribers"];
	  if(viewMembers==='Y' || viewSubscribers=='Y'){ formRecognizer = true;break; }
	 }
	}
   }
 }
 console.log("formRecognizer: "+formRecognizer);
 if(formRecognizer){ 
  js_ajax('POST',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
  { action:'WRITE_NEWSFEED', artTitle:ARTICLE_TITLE, artShortDesc:ARTICLE_SHORTDESC, 
    artDesc:ARTICLE_DESCRIPTION, artImage:IMG_URL, unionBranchPostShare: UNIONBRANCHES_POSTSHARE, 
	user_Id: AUTH_USER_ID, mediaURL01: MEDIAURL01, mediaURL02: MEDIAURL02, mediaURL03: MEDIAURL03 }, 
  function(response){
    console.log(response);
	alert_display_success('S007',PROJECT_URL+'app/news/mylist');
  });
 } else { alert_display_warning('W047'); }
}