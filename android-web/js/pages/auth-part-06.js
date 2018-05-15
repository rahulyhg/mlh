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
	content+='onclick="javascript:selected(\''+domain_Id+'\',\''+domainName+'\');"><b>Subscribe</b></button>';
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
  console.log("SUBSCRIPTION_JSONDATA_BUILDER: "+JSON.stringify(SUBSCRIPTION_JSONDATA_BUILDER));
  hide_toggleMLHLoader('body');
 });
}

var CATEGORY_SELECT=[];
var SUBCATEGORY_SELECT=[];

function selected(domain_Id,domainName){
 var existence=false;
 for(var index=0;index<SUBSCRIPTION_JSONDATA_BUILDER.subscriptionList.length;index++){
	if(SUBSCRIPTION_JSONDATA_BUILDER.subscriptionList[index].domain_Id==domain_Id){ existence=true; break; }
 }
 if(existence) { 
	if($("#select-"+domain_Id).hasClass('btn-success')) { $("#select-"+domain_Id).removeClass('btn-success'); }
	SUBSCRIPTION_JSONDATA_BUILDER.subscriptionList.splice(index,1);
 } else {
	if(!$("#select-"+domain_Id).hasClass('btn-success')) { $("#select-"+domain_Id).addClass('btn-success'); }
	var selData={"domain_Id":domain_Id, "domainName":domainName, "source":SUBSCRIBE_SOURCE[ind]};
    SUBSCRIPTION_JSONDATA_BUILDER.subscriptionList.push(selData);
 }
}
/*
function selected(domain_Id,domainName){
 var cat_recognizer=false;
 for(var index=0;index<CATEGORY_SELECT.length;index++){
    console.log(CATEGORY_SELECT[index]);
   if(domain_Id===CATEGORY_SELECT[index]) {
      cat_recognizer=true;
      CATEGORY_SELECT.splice(index, 1);
	  if($("#select-"+domain_Id).hasClass('btn-success')) {
		  $("#select-"+domain_Id).removeClass('btn-success');
		  $("#select-"+domain_Id).addClass('btn-default');
	  }
	  break;
   } 
 }
 if(!cat_recognizer) {  
    var selData={"domain_Id":domain_Id, "domainName":domainName};
    SUBSCRIPTION_JSONDATA_BUILDER.subscriptionList.push(selData);
   CATEGORY_SELECT[CATEGORY_SELECT.length]=domain_Id;
   if($("#select-"+domain_Id).hasClass('btn-default')) {
      $("#select-"+domain_Id).removeClass('btn-default');
      $("#select-"+domain_Id).addClass('btn-success');
   }
   console.log("SUBSCRIPTION_JSONDATA_BUILDER: "+JSON.stringify(SUBSCRIPTION_JSONDATA_BUILDER));
 }
} */

function subscribe(){
console.log(SUBSCRIPTION_JSONDATA_BUILDER);
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.auth.part06.php',
      {action:'SET_USER_SUBSCRIPTION',user_Id:AUTH_USER_ID, subscription: SUBSCRIPTION_JSONDATA_BUILDER},
      function(response){ console.log(response); });
/* Get List of SubCategories using Categories */
 /* show_toggleMLHLoader('body');
  var response='';
   if(CATEGORY_SELECT.length>0)  {
    js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.auth.part04.php',
      {action:'USER_SUBSCRIPTION',categories:CATEGORY_SELECT, user_Id:AUTH_USER_ID},
      function(response){  hide_toggleMLHLoader('body');
	    global_setSubscriptionList();
    }); 
  } else { global_setSubscriptionList(); } */
}

function global_setSubscriptionList(){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.auth.part04.php',
      {action:'VIEW_USER_SUBSCRIPTION',user_Id:AUTH_USER_ID},
      function(response){
	  if(AndroidSession!==undefined){ AndroidSession.setAndroidSession("AUTH_USER_ID", AUTH_USER_ID); }
	//  if(AndroidNotify!==undefined){ AndroidNotify.startNotification_latestNotifyService(); }
	  window.location.href=PROJECT_URL+'newsfeed/latest-news'; 
	  });
}

