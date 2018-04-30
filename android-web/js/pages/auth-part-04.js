var USR_LANG;

$(document).ready(function(){
bgstyle();
$(".lang_"+USR_LANG).css('display','block');
getListOfCategories();
});

function getListOfCategories(){
show_toggleMLHLoader('body');
js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/domains/domain_list.json',{}, function(result){
 var content='';
 for(var index=0;index<result.domains.length;index++){
     var domain_Id=result.domains[index].domain_Id;
	 var domainName=result.domains[index].domainName;
	 var source=result.domains[index].source;
	content+='<div id="subscribe-category-info" class="col-md-2 col-sm-4 col-xs-6 pad10">';
    content+='<div align="center" class="card custom-lgt-bg pad10" ';
	content+='style="background-color:'+CURRENT_LIGHT_COLOR+';">';
    content+='<img class="card-img-top" src="'+source+'"/>';
	content+='<div class="card-block">';
	content+='<h5 align="center" class="card-title" ';
	content+='style="margin-top:20px;height:40px;margin-bottom:20px;line-height:25px;"><b>'+domainName+'</b></h5>';
	content+='<button id="select-'+domain_Id+'" class="btn btn-default form-control" ';
	content+='onclick="javascript:selected(\''+domain_Id+'\');"><b>Subscribe</b></button>';
	content+='</div>';
    content+='</div>';
	content+='</div>';
 }
  document.getElementById("categories-list").innerHTML=content;
  subscriptionList();
});
}

function subscriptionList(){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.auth.part04.php',
 {action:'USER_DOMAIN_SUBSCRIBE',user_Id:AUTH_USER_ID},function(response){
 response=JSON.parse(response);
 for(var index=0;index<response.length;index++){  
   console.log(response[index].domain_Id);
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

var CATEGORY_SELECT=[];
var SUBCATEGORY_SELECT=[];

function selected(domain_Id){
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
   CATEGORY_SELECT[CATEGORY_SELECT.length]=domain_Id;
   if($("#select-"+domain_Id).hasClass('btn-default')) {
      $("#select-"+domain_Id).removeClass('btn-default');
      $("#select-"+domain_Id).addClass('btn-success');
   }
 }

}

function subscribe(){
/* Get List of SubCategories using Categories */
  show_toggleMLHLoader('body');
  var response='';
   if(CATEGORY_SELECT.length>0)  {
    js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.auth.part04.php',
      {action:'USER_SUBSCRIPTION',categories:CATEGORY_SELECT, user_Id:AUTH_USER_ID},
      function(response){  hide_toggleMLHLoader('body');
	    global_setSubscriptionList();
    }); 
  } else { global_setSubscriptionList(); }
}

function global_setSubscriptionList(){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.auth.part04.php',
      {action:'VIEW_USER_SUBSCRIPTION',user_Id:AUTH_USER_ID},
      function(response){
	  if(AndroidSession!==undefined){ AndroidSession.setAndroidSession("AUTH_USER_ID", AUTH_USER_ID); }
	  if(AndroidNotify!==undefined){ AndroidNotify.startNotification_latestNotifyService(); }
	  window.location.href=PROJECT_URL+'newsfeed/latest-news'; 
	  });
}

