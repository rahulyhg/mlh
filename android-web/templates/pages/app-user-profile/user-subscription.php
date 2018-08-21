<script type="text/javascript">
function loadUserSubscriptions(){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.subscriptions.php',
 { action:'GET_SESSION_DOMAINSUBSCRIPTION', user_Id:APP_USERPROFILE_ID },function(response){
   ui_display_subscriptions(response);
 });
}
function ui_display_subscriptions(response){
 response=JSON.parse(response);
 var content='<div align="center">';
     content+='<h5><b>The following are the Categories that user is interested:</b></h5>';
	 content+='</div>';
 for(var i1=0;i1<response.domains.length;i1++){
    var domain_Id = response.domains[i1].domain_Id;
    var domainName = response.domains[i1].domainName;
	    content+='<div class="list-group" style="margin-bottom:0px;">';
	var content2='';
    var globalSubcriptionRecgn=true;
    for(var i2=0;i2<response.domains[i1].subdomains.length;i2++){
       var subdomain_Id = response.domains[i1].subdomains[i2].subdomain_Id;
       var subdomainName = response.domains[i1].subdomains[i2].subdomainName;
       var subscribed = response.domains[i1].subdomains[i2].subscribed;
       content2+='<div class="list-group-item" style="border-radius:0px;">';
	   content2+='<div class="container-fluid pad0">';
	   content2+='<div class="col-xs-12 pad0">';
	   content2+='<span><b>&nbsp;'+subdomainName+'</b></span>';
	   content2+='<span class="pull-right">';
	   if(subscribed==='YES'){
	     content2+='<i class="fa fa-star" aria-hidden="true"></i>&nbsp;';
	   } else {
	     globalSubcriptionRecgn=false;
	     content2+='<i class="fa fa-star-o" aria-hidden="true"></i>&nbsp;';
	   }
	   content2+='</span>';
       content2+='</div>';
	   content2+='</div>';
	   content2+='</div>';
    }  
    var content1='<div class="list-group-item" data-toggle="collapse" data-target="#domain-content-'+domain_Id+'" ';
		content1+='style="border-radius:0px;border-bottom:2px solid #000;" onclick="javascript:collapseDomain(\'domain-content-'+domain_Id+'\');">';
		content1+='<div class="container-fluid pad0">';
		content1+='<div class="col-xs-12 pad0 custom-font" style="color:'+CURRENT_DARK_COLOR+';">';
		content1+='<span><b>&nbsp;'+domainName+'</b></span>';
		content1+='<span class="pull-right">';
	if(globalSubcriptionRecgn){
		content1+='<i class="fa fa-star custom-font" aria-hidden="true" style="color:'+CURRENT_DARK_COLOR+';"></i>&nbsp;';
	} else {
		content1+='<i class="fa fa-star-o custom-font" aria-hidden="true" style="color:'+CURRENT_DARK_COLOR+';"></i>&nbsp;';
	}
	content1+='<span class="glyphicon glyphicon-chevron-down custom-font" style="color:'+CURRENT_DARK_COLOR+';"></span>';
	content1+='</span>';
	content1+='</div>';
	content1+='</div>';
	content1+='</div>';
	content+=content1;
	content+='<div id="domain-content-'+domain_Id+'" class="collapse">';
	content+=content2;
	content+='</div>';
	content+='</div>';
  }
  if(document.getElementById("app-user-subscription-content")!=null){
    document.getElementById("app-user-subscription-content").innerHTML=content;
  }
}

function collapseDomain(Id){ $('#'+Id).collapse("toggle"); }
</script>
<div id="app-user-subscription-content">
 <div align="center">
  <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
 </div>
</div>