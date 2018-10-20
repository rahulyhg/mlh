<script type="text/javascript">
function community_subMenuHgl(id){
 var arry=["community_subMenu_userCreated","community_subMenu_userBeingMember","community_subMenu_userSubscription"];
 var arry_content=["community_userBeingOwner_content0","community_userBeingMember_content0",
				   "community_userSubscription_content0"];
 for(var index=0;index<arry.length;index++){
   if(arry[index]===id) {
      if(!$('#'+arry[index]).hasClass('custom-bg-solid2pxfullborder')) {
	    $('#'+arry[index]).addClass('custom-bg-solid2pxfullborder');
		$('#'+arry[index]).css('border','2px solid '+CURRENT_DARK_COLOR);
		$('#'+arry[index]).css('color',CURRENT_DARK_COLOR);
		if($('#'+arry_content[index]).hasClass('hide-block')){ $('#'+arry_content[index]).removeClass('hide-block'); }
	  }
   } else {
      if($('#'+arry[index]).hasClass('custom-bg-solid2pxfullborder')) {
	    $('#'+arry[index]).removeClass('custom-bg-solid2pxfullborder');
		$('#'+arry[index]).css('border','1px solid #ccc');
		$('#'+arry[index]).css('color','#000');
		if(!$('#'+arry_content[index]).hasClass('hide-block')){ $('#'+arry_content[index]).addClass('hide-block'); }
	  }
   }
 }
      if(id==='community_subMenu_userCreated'){ community_count_userBeingOwner(); }
 else if(id==='community_subMenu_userBeingMember'){ community_count_userBeingMember(); }
 else if(id==='community_subMenu_userSubscription'){ community_count_userSubscription(); }
}
/* Community Where UserBeingOwner */
function community_count_userBeingOwner(){
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.php',
  { action:'GETCOUNT_PROFESSIONALCOMMUNITY_USERBEINGOWNER',user_Id:APP_USERPROFILE_ID},function(total_data){
  console.log("community_count_userBeingMember(total_data): "+total_data);
   if(total_data==='0'){
     var content='<div align="center">';
		 content+='<span style="color:#ccc;">No community is created by the user.</span>';
		 content+='</div>';
	 document.getElementById("community_userBeingOwner_content0").innerHTML=content; 
   } else {
    scroll_loadInitializer('community_userBeingOwner_content',10,community_data_userBeingOwner,total_data);
   }
 });
}
function community_data_userBeingOwner(div_view, appendContent,limit_start,limit_end){
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.php',
  { action:'GETDATA_PROFESSIONALCOMMUNITY_USERBEINGOWNER',user_Id:APP_USERPROFILE_ID,
  limit_start:limit_start, limit_end:limit_end },function(response){
    console.log(response);
	response=JSON.parse(response);
	var content='';  
		for(var index=0;index<response.length;index++){
		  var union_Id=response[index].union_Id;
		  var domain_Id=response[index].domain_Id;
		  var domainName=response[index].domainName;
		  var subdomain_Id=response[index].subdomain_Id;
		  var subdomainName=response[index].subdomainName;
		  var unionName=response[index].unionName;
		  var profile_pic=response[index].profile_pic;
		  var created_On=response[index].created_On;
		  var mainbranch=response[index].mainbranch;
		  var members=response[index].members;
		  var subscribers=response[index].subscribers;
		 content+=ui_communitiesList(union_Id, domain_Id, domainName, subdomain_Id, subdomainName, unionName,
						profile_pic, created_On, mainbranch, members, subscribers);
		}
    	content+=appendContent; 
		document.getElementById(div_view).innerHTML=content; 
  });
} // 

/* Community Where UserBeingMember */
function community_count_userBeingMember(){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.php',
  { action:'GETCOUNT_PROFESSIONALCOMMUNITY_USERBEINGMEMBER',user_Id:APP_USERPROFILE_ID},function(total_data){
  console.log("community_count_userBeingMember(total_data): "+total_data);
   if(total_data==='0'){
     var content='<div align="center">';
		 content+='<span style="color:#ccc;">User is not a Member of any community.</span>';
		 content+='</div>';
	 document.getElementById("community_userBeingMember_content0").innerHTML=content; 
   } else {
    scroll_loadInitializer('community_userBeingMember_content',10,community_data_userBeingMember,total_data);
	}
 });
}
function community_data_userBeingMember(div_view, appendContent,limit_start,limit_end){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.php',
  { action:'GETDATA_PROFESSIONALCOMMUNITY_USERBEINGMEMBER',user_Id:APP_USERPROFILE_ID,
  limit_start:limit_start, limit_end:limit_end },function(response){
    console.log(response);
	response=JSON.parse(response);
	var content='';  
		for(var index=0;index<response.length;index++){
		  var union_Id=response[index].union_Id;
		  var domain_Id=response[index].domain_Id;
		  var domainName=response[index].domainName;
		  var subdomain_Id=response[index].subdomain_Id;
		  var subdomainName=response[index].subdomainName;
		  var unionName=response[index].unionName;
		  var profile_pic=response[index].profile_pic;
		  var created_On=response[index].created_On;
		  var mainbranch=response[index].mainbranch;
		  var members=response[index].members;
		  var subscribers=response[index].subscribers;
		 content+=ui_communitiesList(union_Id, domain_Id, domainName, subdomain_Id, subdomainName, unionName,
						profile_pic, created_On, mainbranch, members, subscribers);
		}
    	content+=appendContent; 
		document.getElementById(div_view).innerHTML=content; 
  });
}

/* Community Where UserSubscribed */ 
function community_count_userSubscription(){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.php',
  { action:'GETCOUNT_PROFESSIONALCOMMUNITY_USERSUBSCRIPTION',user_Id:APP_USERPROFILE_ID},function(total_data){
    if(total_data==='0'){
     var content='<div align="center">';
		 content+='<span style="color:#ccc;">User didn\'t subscribed any community.</span>';
		 content+='</div>';
	 document.getElementById("community_userSubscription_content0").innerHTML=content; 
   } else {
    scroll_loadInitializer('community_userSubscription_content',10,community_data_userSubscription,total_data);
	}
 }); 
}
function community_data_userSubscription(div_view, appendContent,limit_start,limit_end){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.php',
  { action:'GETDATA_PROFESSIONALCOMMUNITY_USERSUBSCRIPTION',user_Id:APP_USERPROFILE_ID,
  limit_start:limit_start, limit_end:limit_end },function(response){ 
    console.log(response);
	response=JSON.parse(response);
	var content='';  
		for(var index=0;index<response.length;index++){
		  var union_Id=response[index].union_Id;
		  var domain_Id=response[index].domain_Id;
		  var domainName=response[index].domainName;
		  var subdomain_Id=response[index].subdomain_Id;
		  var subdomainName=response[index].subdomainName;
		  var unionName=response[index].unionName;
		  var profile_pic=response[index].profile_pic;
		  var created_On=response[index].created_On;
		  var mainbranch=response[index].mainbranch;
		  var members=response[index].members;
		  var subscribers=response[index].subscribers;
		 content+=ui_communitiesList(union_Id, domain_Id, domainName, subdomain_Id, subdomainName, unionName,
						profile_pic, created_On, mainbranch, members, subscribers);
		}
    	content+=appendContent; 
		document.getElementById(div_view).innerHTML=content; 
  });
}

function ui_communitiesList(union_Id, domain_Id, domainName, subdomain_Id, subdomainName, unionName,
						profile_pic, created_On, mainbranch, members, subscribers){
 var content='<div class="list-group">';
     content+='<div class="list-group-item pad0">';
	 content+='<div class="container-fluid pad0 mtop15p mbot15p">';
	 content+='<div class="col-xs-12 mbot15p">';
	 content+='<span class="label fs12 custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';"><b>'+domainName.toUpperCase();
	 content+='&nbsp;/&nbsp;'+subdomainName.toUpperCase()+'</b></span>';
	 content+='</div>';

	 content+='<div class="col-xs-4">';
	 content+='<img src="'+profile_pic+'" style="width:80px;height:80px;border-radius:50%;"/>';
	 content+='</div>';
	 content+='<div class="col-xs-8">';
	 content+='<div><h5><b>'+unionName+'</b></h5></div>';
	 if(mainbranch!==null){
	 content+='<div>'+mainbranch+'</div>';
	 }
	 content+='<div class="pull-right mbot5p" style="color:#a9a6a6;">created on </div>';
	 content+='<div class="pull-right" style="color:#a9a6a6;">'+get_stdDateTimeFormat01(created_On)+'</div>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
	 content+='<div class="list-group-item pad0">';
	 content+='<div class="container-fluid mtop15p mbot15p">';
	 content+='<div class="col-xs-6" style="border-right:1px solid #ccc;">';
	 content+='<div align="center"><h5><b>MEMBERS</b></h5></div>';
	 content+='<div align="center"><h3><b>'+members+'</b></h3></div>';
	 content+='</div>';
	 content+='<div class="col-xs-6">';
	 content+='<div align="center"><h5><b>SUBSCRIBERS</b></h5></div>';
	 content+='<div align="center"><h3><b>'+subscribers+'</b></h3></div>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
return content;
}
</script>
<style>

</style>
<div class="row">
 <div id="community_subMenu_userCreated" align="center" class="col-xs-4" 
 style="border:1px solid #ccc;height:54px;padding-top:5px;color:#000;"
 onclick="javascript:community_subMenuHgl(this.id);">
  <b>User Being Owner</b>
 </div>
 <div id="community_subMenu_userBeingMember" align="center" class="col-xs-4" 
 style="border:1px solid #ccc;height:54px;padding-top:5px;color:#000;"
 onclick="javascript:community_subMenuHgl(this.id);">
  <b>User Being Member</b>
 </div>
 <div id="community_subMenu_userSubscription" align="center" class="col-xs-4" 
 style="border:1px solid #ccc;height:54px;padding-top:5px;color:#000;"
 onclick="javascript:community_subMenuHgl(this.id);">
  <b>User Subscription</b>
 </div>
</div>
<div class="row">
 <div id="community_userBeingOwner_content0" class="col-xs-12 mtop15p hide-block">
    <div align="center">
      <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
    </div>
 </div>
 <div id="community_userBeingMember_content0" class="col-xs-12 mtop15p hide-block">
    <div align="center">
      <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
    </div>
 </div>
 <div id="community_userSubscription_content0" class="col-xs-12 mtop15p hide-block">
    <div align="center">
      <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
    </div>
 </div>
</div>