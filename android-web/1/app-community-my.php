<?php session_start();
if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>My Community</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <?php include_once 'templates/api/api_js.php'; ?>
 <?php include_once 'templates/api/api_params.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-my-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-my.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
<script type="text/javascript">
$(document).ready(function(){ hzTabSelection('communityMemReqHzTab'); });
function hzTabSelection(id){     
 var arryHzTab=["communityMemReqHzTab","browseHzTab","createHzTab","youcreatedHzTab","beMemberHzTab","beSupportHzTab"];
 var arryTabDataViewer=["community_memReq_content0","community_browse_content0","community_create_content0","community_youcreated_content0","community_beMember_content0","community_beSupport_content0"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer); 
} 
</script> 
<script type="text/javascript">
function urlRedirect_createCommunity(){ window.location.href=PROJECT_URL+'app/create-community'; }
function urlRedirect_browseCommunity(){ window.location.href=PROJECT_URL+'app/findcommunity'; }
$(document).ready(function(){
communitylist_youCreated();
communitylist_beMember(); 
communitylist_beSupport();
});
function sel_viewCommunityType(id){ 
 var arr_list=["seltype_youcreated","seltype_beMember","seltype_beSupport"];
 var arr_list_content=["community_youcreated_content0","community_beMember_content0","community_beSupport_content0"];
 for(var index=0;index<arr_list.length;index++){
   if(arr_list[index]===id){ 
     if(!$('#'+arr_list[index]).hasClass('setTypeActive')) { $('#'+arr_list[index]).addClass('setTypeActive'); } 
	 if($('#'+arr_list[index]).hasClass('setTypeInActive')) { $('#'+arr_list[index]).removeClass('setTypeInActive'); } 
	 document.getElementById(arr_list_content[index]).style.display='block';
   }
   else { 
     if($('#'+arr_list[index]).hasClass('setTypeActive')) { $('#'+arr_list[index]).removeClass('setTypeActive'); } 
	 if(!$('#'+arr_list[index]).hasClass('setTypeInActive')) { $('#'+arr_list[index]).addClass('setTypeInActive'); } 
	 document.getElementById(arr_list_content[index]).style.display='none';
   }
 }
}
function communitylist_youCreated_contentData(div_view, appendContent,limit_start,limit_end){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.community.my.php',
{ action:'USERCREATED_COMMUNITYLIST', user_Id:AUTH_USER_ID, limit_start:limit_start, limit_end:limit_end},function(response){ 
console.log("communitylist_youCreated_contentData: "+response);
response=JSON.parse(response);
var content='';
  for(var index=0;index<response.communityListCreated.length;index++){
    var union_Id=response.communityListCreated[index].union_Id;
	var domain_Id=response.communityListCreated[index].domain_Id;
	var domainName=response.communityListCreated[index].domainName;
	var subdomain_Id=response.communityListCreated[index].subdomain_Id;
	var subdomainName=response.communityListCreated[index].subdomainName;
	var unionName=response.communityListCreated[index].unionName;
	var unionURLName=response.communityListCreated[index].unionURLName;
	var profile_pic=response.communityListCreated[index].profile_pic;
	var minlocation=response.communityListCreated[index].minlocation;
	var location=response.communityListCreated[index].location;
	var state=response.communityListCreated[index].state;
	var country=response.communityListCreated[index].country;
	var created_On=get_stdDateTimeFormat01(response.communityListCreated[index].created_On);
	var admin_Id=response.communityListCreated[index].admin_Id;
    var members_count=response.communityListCreated[index].members_count;
	var supporters_count=response.communityListCreated[index].supporters_count;
   content+='<div class="list-group pad10" style="margin-bottom:10px;">';
   content+='<div class="list-group-item">';
   content+='<div class="container-fluid pad0">';
   content+='<div class="col-md-12 col-xs-12 pad0">'; 
   content+='<span class="label label-newsfeed custom-bg" style="background-color:#0ba0da;">';
   content+='<b>'+domainName.toUpperCase()+' / '+subdomainName.toUpperCase()+'</b></span>';
   content+='</div>';
   content+='<div class="col-md-12 pad0">';
   content+='<div class="col-md-4 col-xs-4 mtop15p">'; 
   content+='<img class="img-min-profilepic" src="'+profile_pic+'">';
   content+='</div>';
   content+='<div align="left" class="col-md-8 col-xs-8 frnshipreqdiv">';
   content+='<h5><b>'+unionName+'</b></h5>';
   content+='<div style="color:#87898a;">created on '+created_On+'</div>';
   content+='<div class="frnshipreqaddr mtop15p" style="color:#000;">'+minlocation+', '+location+', '+state+', '+country+'</div>';
   content+='</div>';
   content+='</div>';
   content+='</div>';
   content+='</div>';
   content+='<div class="list-group-item">';
   content+='<div class="container-fluid pad0">';
   content+='<div align="center" class="col-md-6 col-xs-6" style="border-right:1px solid #ccc;">';
   content+='<h4 style="color:#87898a;"><b>'+members_count+'</b></h4>';
   content+='<b>MEMBERS</b>';
   content+='</div>';
   content+='<div align="center" class="col-md-6 col-xs-6">';
   content+='<h4 style="color:#87898a;"><b>'+supporters_count+'</b></h4>';
   content+='<b>SUPPORTERS</b>';
   content+='</div>';
   content+='</div>';
   content+='</div>';
   content+='</div>';
  }

 content+=appendContent;
 document.getElementById(div_view).innerHTML=content;
});
}
function communitylist_youCreated(){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.community.my.php',
{ action:'USERCREATED_COMMUNITYLIST_COUNT', user_Id:AUTH_USER_ID },function(total_data){ 
console.log('communitylist_youCreated: '+total_data);
 if(total_data==='0'){
  var content='<div align="center" style="color:#87898a;">You didn\'t created any Community</div>';
  document.getElementById("community_youcreated_content0").innerHTML=content;
 } else {
  scroll_loadInitializer('community_youcreated_content',10,communitylist_youCreated_contentData,total_data);
 }
});
}
function communitylist_beMember(){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.community.my.php',
{ action:'USERBEINGMEMBER_COMMUNITYLIST_COUNT', user_Id:AUTH_USER_ID },function(total_data){
console.log('communitylist_beMember: '+total_data);
 if(total_data==='0'){
  var content='<div align="center" style="color:#87898a;">You are not the Member of any Community</div>';
  document.getElementById("community_beMember_content0").innerHTML=content;
 } else {
  scroll_loadInitializer('community_beMember_content',10,communitylist_beMember_contentData,total_data);
 }
});
}
function communitylist_beMember_contentData(div_view, appendContent,limit_start,limit_end){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.community.my.php',
{ action:'USERBEINGMEMBER_COMMUNITYLIST', user_Id:AUTH_USER_ID, limit_start:limit_start, limit_end:limit_end},
function(response){ 
console.log("communitylist_beMember_contentData: "+response+" div_view: "+div_view);
response=JSON.parse(response);
var content='';
  for(var index=0;index<response.beingMemberCommunityList.length;index++){
    var union_Id=response.beingMemberCommunityList[index].union_Id;
	var domain_Id=response.beingMemberCommunityList[index].domain_Id;
	var domainName=response.beingMemberCommunityList[index].domainName;
	var subdomain_Id=response.beingMemberCommunityList[index].subdomain_Id;
	var subdomainName=response.beingMemberCommunityList[index].subdomainName;
	var unionName=response.beingMemberCommunityList[index].unionName;
	var unionURLName=response.beingMemberCommunityList[index].unionURLName;
	var profile_pic=response.beingMemberCommunityList[index].profile_pic;
	var minlocation=response.beingMemberCommunityList[index].minlocation;
	var location=response.beingMemberCommunityList[index].location;
	var state=response.beingMemberCommunityList[index].state;
	var country=response.beingMemberCommunityList[index].country;
	var created_On=get_stdDateTimeFormat01(response.beingMemberCommunityList[index].created_On);
	var admin_Id=response.beingMemberCommunityList[index].admin_Id;
    var members_count=response.beingMemberCommunityList[index].members_count;
	var supporters_count=response.beingMemberCommunityList[index].supporters_count;
	var roleName=response.beingMemberCommunityList[index].roleName;
	var isAdmin=response.beingMemberCommunityList[index].isAdmin;
	var addedOn=response.beingMemberCommunityList[index].addedOn;
	var status=response.beingMemberCommunityList[index].status;

   content+='<div class="list-group pad10" style="margin-bottom:10px;">';
   content+='<div class="list-group-item">';
   content+='<div class="container-fluid pad0">';
   content+='<div class="col-md-12 col-xs-12 pad0">'; 
   content+='<span class="label label-newsfeed custom-bg" style="background-color:#0ba0da;">';
   content+='<b>'+domainName.toUpperCase()+' / '+subdomainName.toUpperCase()+'</b></span>';
   content+='</div>';
   content+='<div class="col-md-12 pad0">';
   content+='<div class="col-md-4 col-xs-4 mtop15p">'; 
   content+='<img class="img-min-profilepic" src="'+profile_pic+'">';
   content+='</div>';
   content+='<div align="left" class="col-md-8 col-xs-8 frnshipreqdiv">';
   content+='<h5><b>'+unionName+'</b></h5>';
   content+='<div style="color:#87898a;">created on '+created_On+'</div>';
   content+='<div class="frnshipreqaddr mtop15p" style="color:#000;">'+minlocation+', '+location+', '+state+', '+country+'</div>';
   content+='</div>';
   content+='</div>';
   content+='</div>';
   content+='</div>';
   content+='<div class="list-group-item">';
   content+='<div class="container-fluid pad0">';
   content+='<div align="center" class="col-md-6 col-xs-6" style="border-right:1px solid #ccc;">';
   content+='<h4 style="color:#87898a;"><b>'+members_count+'</b></h4>';
   content+='<b>MEMBERS</b>';
   content+='</div>';
   content+='<div align="center" class="col-md-6 col-xs-6">';
   content+='<h4 style="color:#87898a;"><b>'+supporters_count+'</b></h4>';
   content+='<b>SUPPORTERS</b>';
   content+='</div>';
   content+='</div>';
   content+='</div>';
   content+='</div>';
  }

 content+=appendContent;
 document.getElementById(div_view).innerHTML=content;
});
}  
function communitylist_beSupport(){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.community.my.php',
{ action:'USERBEINGSUPPORT_COMMUNITYLIST_COUNT', user_Id:AUTH_USER_ID },function(total_data){
console.log('communitylist_beSupport: '+total_data);
 if(total_data==='0'){
  var content='<div align="center" style="color:#87898a;">You are not Supporting any Community</div>';
   document.getElementById("community_beSupport_content0").innerHTML=content;
 } else {
  scroll_loadInitializer('community_beSupport_content',10,communitylist_beSupport_contentData,total_data);
 }
});
}
function communitylist_beSupport_contentData(div_view, appendContent,limit_start,limit_end){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.community.my.php',
{ action:'USERBEINGSUPPORT_COMMUNITYLIST', user_Id:AUTH_USER_ID,
 limit_start:limit_start, limit_end:limit_end },
function(response){ 
console.log("communitylist_beSupport_contentData: "+response);
response=JSON.parse(response);
var content='';
  for(var index=0;index<response.beingSupportingCommunityList.length;index++){
    var union_Id=response.beingSupportingCommunityList[index].union_Id;
	var domain_Id=response.beingSupportingCommunityList[index].domain_Id;
	var domainName=response.beingSupportingCommunityList[index].domainName;
	var subdomain_Id=response.beingSupportingCommunityList[index].subdomain_Id;
	var subdomainName=response.beingSupportingCommunityList[index].subdomainName;
	var unionName=response.beingSupportingCommunityList[index].unionName;
	var unionURLName=response.beingSupportingCommunityList[index].unionURLName;
	var profile_pic=response.beingSupportingCommunityList[index].profile_pic;
	var minlocation=response.beingSupportingCommunityList[index].minlocation;
	var location=response.beingSupportingCommunityList[index].location;
	var state=response.beingSupportingCommunityList[index].state;
	var country=response.beingSupportingCommunityList[index].country;
	var created_On=get_stdDateTimeFormat01(response.beingSupportingCommunityList[index].created_On);
	var admin_Id=response.beingSupportingCommunityList[index].admin_Id;
	var members_count=response.beingSupportingCommunityList[index].members_count;
	var supporters_count=response.beingSupportingCommunityList[index].supporters_count;
    var supportOn=response.beingSupportingCommunityList[index].supportOn;
	

   content+='<div class="list-group pad10" style="margin-bottom:10px;">';
   content+='<div class="list-group-item">';
   content+='<div class="container-fluid pad0">';
   content+='<div class="col-md-12 col-xs-12 pad0">'; 
   content+='<span class="label label-newsfeed custom-bg" style="background-color:#0ba0da;">';
   content+='<b>'+domainName.toUpperCase()+' / '+subdomainName.toUpperCase()+'</b></span>';
   content+='</div>';
   content+='<div class="col-md-12 pad0">';
   content+='<div class="col-md-4 col-xs-4 mtop15p">'; 
   content+='<img class="img-min-profilepic" src="'+profile_pic+'">';
   content+='</div>';
   content+='<div align="left" class="col-md-8 col-xs-8 frnshipreqdiv">';
   content+='<h5><b>'+unionName+'</b></h5>';
   content+='<div style="color:#87898a;">created on '+created_On+'</div>';
   content+='<div class="frnshipreqaddr mtop15p" style="color:#000;">'+minlocation+', '+location+', '+state+', '+country+'</div>';
   content+='</div>';
   content+='</div>';
   content+='</div>';
   content+='</div>';
   content+='<div class="list-group-item">';
   content+='<div class="container-fluid pad0">';
   content+='<div align="center" class="col-md-6 col-xs-6" style="border-right:1px solid #ccc;">';
   content+='<h4 style="color:#87898a;"><b>'+members_count+'</b></h4>';
   content+='<b>MEMBERS</b>';
   content+='</div>';
   content+='<div align="center" class="col-md-6 col-xs-6">';
   content+='<h4 style="color:#87898a;"><b>'+supporters_count+'</b></h4>';
   content+='<b>SUPPORTERS</b>';
   content+='</div>';
   content+='</div>';
   content+='</div>';
   content+='</div>';
  }
 content+=appendContent;
 document.getElementById(div_view).innerHTML=content;
});
}
</script>
<style>
.setTypeActive { border:2px solid #0ba0da;padding:5px;color:#0ba0da;cursor:pointer; }
.setTypeInActive { padding:5px;cursor:pointer; }
</style>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	<div id="sidebar-wrapper">
	  <?php include_once 'templates/api/api_sidewrapper.php'; ?>
	</div>
    <div id="page-content-wrapper">
	  <?php include_once 'templates/api/api_header.php'; ?>
	  <div id="app-page-content">
	  
	    <!--div id="app-page-title" class="list-group pad0" style="margin-bottom:0px;">
			<div align="center" class="list-group-item custom-lgt-bg" style="border-bottom:0px;border-radius:0px;">
		       <span class="lang_english">
				  <i class="fa fa-hands" aria-hidden="true"></i>&nbsp; <b>MY COMMUNITY</b>
			   </span>
			</div>
		</div-->

		<div class="container-fluid">
		   
			<div class="scroller-divison row">
			  <div class="scroller scroller-left col-xs-1" style="height:41px;">
			     <i class="glyphicon glyphicon-chevron-left"></i>
			  </div>
			
			  <div class="scrollTabwrapper col-xs-10">
				<ul class="nav nav-tabs scrollTablist"  id="myTab"  style="border-bottom:0px;">
				    <li><a id="communityMemReqHzTab" onclick="javascript:hzTabSelection(this.id);"><b>1. Community Member Request</b></a></li>
					<li><a id="browseHzTab" onclick="javascript:hzTabSelection(this.id);"><b>2. Browse Community</b></a></li>
					<li><a id="createHzTab" onclick="javascript:hzTabSelection(this.id);"><b>3. Create Community</b></a></li>
					<li><a id="youcreatedHzTab" onclick="javascript:hzTabSelection(this.id);"><b>4. View Communities you Created</b></a></li>
					<li><a id="beMemberHzTab" onclick="javascript:hzTabSelection(this.id);"><b>5. View Communities you are a Member</b></a></li>
					<li><a id="beSupportHzTab" onclick="javascript:hzTabSelection(this.id);"><b>6. View Communities You are Supporting</b></a></li>
				</ul>
			  </div>
			  
			  <div class="scroller scroller-right col-xs-1" style="height:41px;">
			     <i class="glyphicon glyphicon-chevron-right"></i>
			  </div>
			
			</div>
			
			<div class="row">  

			<div id="community_memReq_content0" class="col-md-12">
			    <div align="center" class="mtop15p">
				  <img src="images/load.gif" style="width:150px;height:150px;"/>
				</div>
			</div>
			 
			<div id="community_browse_content0" class="col-md-12">
			    <div class="mtop15p">
				   <div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
							   <div class="panel-heading custom-lgt-bg"><b>Search Community</b></div>
								  <div class="panel-body">
								    <!-- Category -->
									<div class="form-group">
									  <label>Category</label>
									  <select id="search_english_ByCategory" class="form-control" onchange="javascript:build_subCategories();">
										<option value="">Select Category</option>
									  </select>
									</div>
									<!-- Sub-Category -->
									<div id="search_english_BySubCategoryDiv" class="form-group hide-block">
									  <label>Sub-Category</label>
									  <select id="search_english_BySubCategory" class="form-control">
										<option value="">Select Sub-Category</option>
									  </select>
									</div>
									<!-- Country -->
									<div class="form-group">
									  <label>Country</label>
									  <select id="search_english_ByCountry" class="form-control" onchange="javascript:build_stateOption();">
										<option value="">Select Country</option>
									  </select>
									</div>
									<!-- State -->
									<div id="search_english_ByStateDiv" class="form-group hide-block">
									  <label>State</label>
									  <select id="search_english_ByState" class="form-control" onchange="javascript:build_locationOption();">
										<option value="">Select State</option>
									  </select>
								    </div>
									<!-- Location -->
									<div id="search_english_ByLocationDiv" class="form-group hide-block">
									  <label>Location</label>
									  <select id="search_english_ByLocation" class="form-control" onchange="javascript:build_minlocationOption();">
										<option value="">Select Location</option>
									   </select>
									</div>
									<!-- Locality -->
								    <div id="search_english_ByLocalityDiv" class="form-group hide-block">
									   <label>Locality</label>
									   <select id="search_english_ByLocality" class="form-control">
									     <option value="">Select Locality</option>
									   </select>
								    </div>
									<div class="form-group">
									   <button class="form-control custom-bg" onclick="javascript:searchCommunity();"><b>Search</b></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
					  <div class="col-md-12">
						<div id="browseCommunityData0" style="margin-bottom:20px;">
							<div class="list-group mtop10p mbot10p">
								<div align="center" class="list-group-item">
									<b>Search <i class="fa fa-hl-circle fa-user" aria-hidden="true"></i> and Stay Connected</b>   
								</div>
							</div>
						</div>
					  </div>
					</div>
					
				   </div>
				</div>
			</div>
			 
			 <div id="community_create_content0" class="col-md-12">
			    <div align="center" class="mtop15p">
				  <img src="images/load.gif" style="width:150px;height:150px;"/>
				</div>
			 </div>
			 
			 
			 
			 <div id="community_youcreated_content0" class="col-md-12">
			    <div align="center" class="mtop15p">
				  <img src="images/load.gif" style="width:150px;height:150px;"/>
				</div>
			 </div>
			
			  <div id="community_beMember_content0" class="col-md-12">
			    <div align="center" class="mtop15p">
				  <img src="images/load.gif" style="width:150px;height:150px;"/>
				</div>
			  </div>
			  
			  <div id="community_beSupport_content0" class="col-md-12">
			    <div align="center" class="mtop15p">
				  <img src="images/load.gif" style="width:150px;height:150px;"/>
				</div>
			  </div>
			  
			</div>
			
		</div>
		
	   </div>
	</div>
	
 </div>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } ?>