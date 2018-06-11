var USR_LANG;
var SUBSCRIPTION_JSONDATA_BUILDER={};
    SUBSCRIPTION_JSONDATA_BUILDER.subscriptionList=[];
$(document).ready(function(){
 bgstyle();
 $(".lang_"+USR_LANG).css('display','block');
 getListOfCategories();
 console.log(SUBSCRIPTION_JSONDATA_BUILDER);
});

var SUBSCRIBE_DOMAIN_ID=[]; /* Total Domain List */
var SUBSCRIBE_DOMAIN_NAME=[]; /* Total Domain Name */
var SUBSCRIBE_SOURCE=[]; /* Total Source */
function getListOfCategories(){
show_toggleMLHLoader('body');
 js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/domains/domain_list.json',{}, function(result){
  var content='';
  for(var index=0;index<result.domains.length;index++){
     var domain_Id=result.domains[index].domain_Id;
	 var domainName=result.domains[index].domainName;
	 var source=result.domains[index].source;
	 SUBSCRIBE_DOMAIN_ID[SUBSCRIBE_DOMAIN_ID.length]=domain_Id;
	 SUBSCRIBE_DOMAIN_NAME[SUBSCRIBE_DOMAIN_NAME.length]=domainName;
	 SUBSCRIBE_SOURCE[SUBSCRIBE_SOURCE.length]=source;
	content+='<div id="subscribe-category-info" class="col-md-2 col-sm-4 col-xs-6 pad10">';
    content+='<div align="center" class="card custom-lgt-bg pad10" ';
	content+='style="background-color:'+CURRENT_LIGHT_COLOR+';">';
    content+='<img class="card-img-top" src="'+source+'"/>';
	content+='<div class="card-block">';
	content+='<h5 align="center" class="card-title" ';
	content+='style="margin-top:20px;height:40px;margin-bottom:20px;line-height:25px;"><b>'+domainName+'</b></h5>';
	content+='<button id="select-'+domain_Id+'" class="btn btn-default form-control" ';
	content+='onclick="javascript:selected(\''+domain_Id+'\',\''+domainName+'\',\''+source+'\');"><b>Subscribe</b></button>';
	content+='</div>';
    content+='</div>';
	content+='</div>';
  }
  document.getElementById("categories-list").innerHTML=content;
  subscriptionList();
 });
}

function subscriptionList(){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.auth.part06.php',
 {action:'USER_DOMAIN_SUBSCRIBE',user_Id:AUTH_USER_ID},function(response){
 response=JSON.parse(response);
 for(var index=0;index<response.length;index++){
   for(var ind=0;ind<SUBSCRIBE_DOMAIN_ID.length;ind++){
     if(SUBSCRIBE_DOMAIN_ID[ind]===response[index].domain_Id){
	    var selData={"domain_Id":SUBSCRIBE_DOMAIN_ID[ind], "domainName":SUBSCRIBE_DOMAIN_NAME[ind], "source":SUBSCRIBE_SOURCE[ind]};
		SUBSCRIPTION_JSONDATA_BUILDER.subscriptionList.push(selData);
	 }
   }
   
   if($('#select-'+response[index].domain_Id).hasClass('btn-default')){ 
    $('#select-'+response[index].domain_Id).removeClass('btn-default');
   }
   if(!$('#select-'+response[index].domain_Id).hasClass('btn-success')){
	$('#select-'+response[index].domain_Id).addClass('btn-success');
   }
  }
  hide_toggleMLHLoader('body');
 });
}

function selected(domain_Id,domainName,source){
 var existence=false;
 for(var index=0;index<SUBSCRIPTION_JSONDATA_BUILDER.subscriptionList.length;index++){
	if(SUBSCRIPTION_JSONDATA_BUILDER.subscriptionList[index].domain_Id==domain_Id){ existence=true; break; }
 }
 if(existence) { 
	if($("#select-"+domain_Id).hasClass('btn-success')) { $("#select-"+domain_Id).removeClass('btn-success'); }
	SUBSCRIPTION_JSONDATA_BUILDER.subscriptionList.splice(index,1);
 } else {
	if(!$("#select-"+domain_Id).hasClass('btn-success')) { $("#select-"+domain_Id).addClass('btn-success'); }
	var selData={"domain_Id":domain_Id, "domainName":domainName, "source":source};
    SUBSCRIPTION_JSONDATA_BUILDER.subscriptionList.push(selData);
 }
}

function subscribe(){
console.log(SUBSCRIPTION_JSONDATA_BUILDER);
show_toggleMLHLoader('body');
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.auth.part06.php',
      {action:'SET_USER_SUBSCRIPTION',user_Id:AUTH_USER_ID, subscription: SUBSCRIPTION_JSONDATA_BUILDER},
      function(response){ console.log(response);if(AndroidSession!==undefined){ AndroidSession.setAndroidSession("AUTH_USER_ID", AUTH_USER_ID); }
	//  if(AndroidNotify!==undefined){ AndroidNotify.startNotification_latestNotifyService(); }
	  window.location.href=PROJECT_URL+'newsfeed/latest-news';  
	  hide_toggleMLHLoader('body');
});
}