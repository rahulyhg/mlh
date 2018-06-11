$(document).ready(function(){
 bgstyle();
 $(".lang_"+USR_LANG).css('display','block');
 getListOfCategories();
// 
});
var SUBSCRIPTION_JSONDATA_BUILDER;
function subdomainSubscription(domainIndex,subdomainIndex,subdomain_Id){
if($('#subdomain-subscribe-'+subdomain_Id).hasClass('fa-star') &&
    !$('#subdomain-subscribe-'+subdomain_Id).hasClass('fa-star-o')) {
	$('#subdomain-subscribe-'+subdomain_Id).removeClass('fa-star');
    $('#subdomain-subscribe-'+subdomain_Id).addClass('fa-star-o'); 
	SUBSCRIPTION_JSONDATA_BUILDER.domains[domainIndex].subdomains[subdomainIndex].subscribed="NO";
 }
 else if(!$('#subdomain-subscribe-'+subdomain_Id).hasClass('fa-star') &&
	      $('#subdomain-subscribe-'+subdomain_Id).hasClass('fa-star-o')) {
	SUBSCRIPTION_JSONDATA_BUILDER.domains[domainIndex].subdomains[subdomainIndex].subscribed="YES";
	$('#subdomain-subscribe-'+subdomain_Id).removeClass('fa-star-o');
	$('#subdomain-subscribe-'+subdomain_Id).addClass('fa-star');
 }
}
/* SUBDOMAIN */
function domainSubscription(domainIndex,domain_Id,subdomainIdList){
 /* DOMAIN */
 var className;
 if($('#domain-subscribe-'+domain_Id).hasClass('fa-star') &&
    !$('#domain-subscribe-'+domain_Id).hasClass('fa-star-o')) {
	SUBSCRIPTION_JSONDATA_BUILDER.domains[domainIndex].subscribed="NO";
	$('#domain-subscribe-'+domain_Id).removeClass('fa-star');
    $('#domain-subscribe-'+domain_Id).addClass('fa-star-o'); 
	className='fa-star-o';
 }
 else if(!$('#domain-subscribe-'+domain_Id).hasClass('fa-star') &&
	      $('#domain-subscribe-'+domain_Id).hasClass('fa-star-o')) {
	SUBSCRIPTION_JSONDATA_BUILDER.domains[domainIndex].subscribed="YES";
	$('#domain-subscribe-'+domain_Id).removeClass('fa-star-o');
	$('#domain-subscribe-'+domain_Id).addClass('fa-star');
	className='fa-star';
 }
 console.log("subdomain: "+subdomainIdList);
 var subdomain=subdomainIdList.split(",")
 for(var subdomainIndex=0;subdomainIndex<subdomain.length;subdomainIndex++){
    console.log("subdomain: "+subdomain[subdomainIndex]);
	
    if(className==='fa-star-o') {
		SUBSCRIPTION_JSONDATA_BUILDER.domains[domainIndex].subdomains[subdomainIndex].subscribed="NO";
		$('#subdomain-subscribe-'+subdomain[subdomainIndex]).removeClass('fa-star');
		$('#subdomain-subscribe-'+subdomain[subdomainIndex]).addClass('fa-star-o'); 
	}
	else if(className==='fa-star') {
		SUBSCRIPTION_JSONDATA_BUILDER.domains[domainIndex].subdomains[subdomainIndex].subscribed="YES";
		$('#subdomain-subscribe-'+subdomain[subdomainIndex]).removeClass('fa-star-o');
		$('#subdomain-subscribe-'+subdomain[subdomainIndex]).addClass('fa-star');
	}
 }
 
 console.log("SUBSCRIPTION_JSONDATA_BUILDER: "+JSON.stringify(SUBSCRIPTION_JSONDATA_BUILDER));
}
function getListOfCategories(){
 js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/domains/domain_list.json',{}, function(result){
   SUBSCRIPTION_JSONDATA_BUILDER=result;
   console.log(JSON.stringify(result));
   var content1='<div class="list-group">';
   for(var i1=0;i1<result.domains.length;i1++){
    var content2='';
	var subdomainIdList=[];
	for(var i2=0;i2<result.domains[i1].subdomains.length;i2++){
	 var subdomain_Id=result.domains[i1].subdomains[i2].subdomain_Id;
	 var subdomainName=result.domains[i1].subdomains[i2].subdomainName;
	 SUBSCRIPTION_JSONDATA_BUILDER.domains[i1].subdomains[i2].subscribed="NO";
	 subdomainIdList[subdomainIdList.length]=subdomain_Id;
	 content2+='<div class="list-group-item pad0">';
     content2+='<div class="container-fluid pad0">';
	 content2+='<div class="col-xs-12 mtop10p mbot10p">';
	 content2+='<span><b>&nbsp;'+subdomainName+'</b></span>';
	 content2+='<i id="subdomain-subscribe-'+subdomain_Id+'" ';
	 content2+='class="fa fa-star-o mtop5p pull-right" ';
	 content2+='onclick="javascript:subdomainSubscription(\''+i1+'\',\''+i2+'\',\''+subdomain_Id+'\');" ';
	 content2+='aria-hidden="true"></i>';
	 content2+='</div>';
	 content2+='</div>';
	 content2+='</div>';
	}
	var domain_Id=result.domains[i1].domain_Id;
	var domainName=result.domains[i1].domainName;
	SUBSCRIPTION_JSONDATA_BUILDER.domains[i1].subscribed="NO";
	content1+='<div class="list-group-item pad0" style="border-bottom:2px solid #000;">';
	content1+='<div class="container-fluid pad0" data-toggle="collapse" data-target="#subdomainlist-'+domain_Id+'">';
	content1+='<div class="col-xs-12 mtop10p mbot10p">';
	content1+='<span class="custom-font" style="color:'+CURRENT_DARK_COLOR+';"><b>'+domainName+'</b></span>';
	content1+='<span class="pull-right">';
	content1+='<i id="domain-subscribe-'+domain_Id+'" class="fa fa-star-o mtop5p custom-font" ';
	content1+='style="color:'+CURRENT_DARK_COLOR+';" onclick="javascript:domainSubscription(\''+i1+'\',\''+domain_Id+'\',\''+subdomainIdList+'\');" aria-hidden="true"></i>&nbsp;&nbsp;';
	content1+='<span class="glyphicon glyphicon-chevron-down custom-font" style="color:'+CURRENT_DARK_COLOR+';"></span>';
	content1+='</span>';
	content1+='</div>';
	content1+='</div>';
	content1+='</div>';
	content1+='<div id="subdomainlist-'+domain_Id+'" class="collapse">';
	content1+=content2;
	content1+='</div>';
   }
   content1+='</div>';
   document.getElementById("categories-list").innerHTML=content1;
 });
}

function subscribe(){
 var sessionJSON='{"session_set":[{"key":"AUTH_USER_SUBSCRIPTIONS_LIST","value":"'+JSON.stringify(SUBSCRIPTION_JSONDATA_BUILDER)+'"}],';
	 sessionJSON+='"session_get":["AUTH_USER_SUBSCRIPTIONS_LIST"]}';
 js_session(sessionJSON,function(response){
    console.log("session:"+response);
	js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.auth.part06.php',
 {action:'SET_USER_SUBSCRIPTION',user_Id:AUTH_USER_ID },
 function(response){ console.log(response);});
 });
 
}