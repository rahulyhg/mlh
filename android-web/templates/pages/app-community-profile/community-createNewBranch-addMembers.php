<div class="row">
<div class="col-xs-12">
<!-- Name -->
<script type="text/javascript">
var MEMBER_ID;
var MEMBER_DISPLAYCONTENT;
var MEMBERS_LIST={};
function addRoleToMemberOfBranch(member_Id){
 var role_Id = unionprof_mem_roles_Id();
 var roleName = document.getElementById("roles_select_"+member_Id).value;
 MEMBERS_LIST[MEMBER_ID].role_Id = role_Id;
 MEMBERS_LIST[MEMBER_ID].roleName = roleName;
 console.log(MEMBERS_LIST);
}
function select_display_roles(div_Id,member_Id){
 if(ROLE_INFO!==undefined){
 var content='<div id="rolesOpt_display_'+member_Id+'">';
     content+='<div class="input-group">';
	 content+='<select id="roles_select_'+member_Id+'" class="form-control" style="z-index:0;" ';
	 content+='onchange="javascript:addRoleToMemberOfBranch(\''+member_Id+'\');">';
     content+='<option value="">Select Role</option>';
 for(var role_Id in ROLE_INFO){
  roleName= ROLE_INFO[role_Id].roleName;
  content+='<option value="'+role_Id+'">'+roleName+'</option>';
 }
 content+='</select>';
 content+='<span class="input-group-addon curpoint" ';
 content+='onclick="javascript:setRoleToMember(\''+member_Id+'\');"><b>Done</b></span>';
 content+='</div>';
 content+='</div>';
 content+='<div id="roles_display_'+member_Id+'" class="hide-block">';
 content+='<span id="roles_choosen_'+member_Id+'"></span>';
 content+='<span class="pull-right"><a href="#" onclick="javascript:editRoleToMember(\''+member_Id+'\');"><u>Edit</u></a></span>';
 content+='</div>';
 document.getElementById(div_Id).innerHTML=content;
 }
}
function setRoleToMember(member_Id){
 var sel_RoleName = $("#roles_select_"+member_Id+" option:selected").text();
 var sel_RoleId = document.getElementById("roles_select_"+member_Id).value;
 document.getElementById("roles_choosen_"+member_Id).innerHTML=sel_RoleName;
 console.log(JSON.stringify(MEMBERS_LIST));
 hide_roles_seloption(member_Id);
}
function editRoleToMember(member_Id){
 show_roles_seloption(member_Id);
}
function show_roles_seloption(member_Id){
 if($('#rolesOpt_display_'+member_Id).hasClass('hide-block')){
   $('#rolesOpt_display_'+member_Id).removeClass('hide-block');
 }
 if(!$('#roles_display_'+member_Id).hasClass('hide-block')){
   $('#roles_display_'+member_Id).addClass('hide-block');
 }
}
function hide_roles_seloption(member_Id){
 if(!$('#rolesOpt_display_'+member_Id).hasClass('hide-block')){
   $('#rolesOpt_display_'+member_Id).addClass('hide-block');
 }
 if($('#roles_display_'+member_Id).hasClass('hide-block')){
   $('#roles_display_'+member_Id).removeClass('hide-block');
 }
}
function load_form_addMembers(){
 hzTabSelection('addMembersHzTab');
 autocomplete_load_members();
}
var size=0;
function autocomplete_load_members(){
var options = { url: function(phrase) {
    var urlContent=PROJECT_URL+"backend/php/dac/controller.module.app.user.authentication.php";
	    urlContent+="?action=GET_AUTOCOMPLETE_USERS&searchTerm="+phrase;
        return urlContent;	
}, getValue: "name",
    list: { match: { enabled: true },maxNumberOfElements: 10,
           onSelectItemEvent: function() { 
		     MEMBER_ID = $("#communityNewBranch_members_name").getSelectedItemData().user_Id;
			 var profile_pic = $("#communityNewBranch_members_name").getSelectedItemData().profile_pic;
			 var name = $("#communityNewBranch_members_name").getSelectedItemData().name;
			 var minlocation = $("#communityNewBranch_members_name").getSelectedItemData().minlocation;
			 var location = $("#communityNewBranch_members_name").getSelectedItemData().location;
			 var state = $("#communityNewBranch_members_name").getSelectedItemData().state;
			 var country = $("#communityNewBranch_members_name").getSelectedItemData().country;
			 displayTemplate_membersContent(MEMBER_ID,profile_pic, name, minlocation, location, state, country);
		   },
		   onHideListEvent: function() { console.log(MEMBER_ID); }
	},
    template: { type: "custom",
				method: function(value, item) {
				console.log("item: "+JSON.stringify(item)+" value: "+value);
				 var content='<div class="container-fluid mtop15p">';
				     content+='<div class="row">';
					 content+='<div class="col-xs-4">';
					 content+='<img src="' + (item.profile_pic)+ '" class="profile_pic_img3"/>';
					 content+='</div>';
					 content+='<div class="col-xs-8">';
					 content+='<span>'+value+'<span><br/>';
					 content+='<span style="color:#929090;">'+item.minlocation+', '+item.location+', ';
					 content+=item.state+', '+item.country+'</span>';
					 content+='</div>';
					 content+='</div>';
					 content+='</div>';
				return content;
			    } } };
$("#communityNewBranch_members_name").easyAutocomplete(options);
$(".easy-autocomplete").css('width','100%');
$(".easy-autocomplete-container").css('margin-top','30px');
}
function displayTemplate_membersContent(member_Id, profile_pic, name, minlocation, location, state, country){
    MEMBER_DISPLAYCONTENT='<div id="div_members_'+member_Id+'" class="list-group">';
	MEMBER_DISPLAYCONTENT+='<div class="list-group-item pad0">';
	MEMBER_DISPLAYCONTENT+='<div class="container-fluid mtop15p mbot15p">';
	MEMBER_DISPLAYCONTENT+='<div class="row">';
	MEMBER_DISPLAYCONTENT+='<div class="col-xs-12">';
	MEMBER_DISPLAYCONTENT+='<button type="button" class="close" ';
	MEMBER_DISPLAYCONTENT+='onclick="javascript:deleteFromArray_member(\''+member_Id+'\');">&times;</button>';
	MEMBER_DISPLAYCONTENT+='</div>';
    MEMBER_DISPLAYCONTENT+='</div>'
	MEMBER_DISPLAYCONTENT+='<div class="row">';
	MEMBER_DISPLAYCONTENT+='<div class="col-xs-4">';
	MEMBER_DISPLAYCONTENT+='<img src="' +profile_pic+ '" class="profile_pic_img3"/>';
	MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='<div class="col-xs-8">';
	MEMBER_DISPLAYCONTENT+='<div>'+name+'<div>';
	MEMBER_DISPLAYCONTENT+='<div id="roles_div_'+member_Id+'" class="mtop5p">';
	MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='<div class="mtop5p" style="color:#929090;">'+minlocation+', '+location+', ';
	MEMBER_DISPLAYCONTENT+=state+', '+country+'</div>';
	MEMBER_DISPLAYCONTENT+='</div>';
    MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='</div>';
}
function autocomplete_roles(){
var options = {
    url: function(phrase) { return TEMP_ROLE_INFO; },
	getValue: "roleName",
 list: { match: { enabled: true },maxNumberOfElements: 10,
           onSelectItemEvent: function() { 
		    
		   },
		   onHideListEvent: function() {  }
	},
    template: { type: "custom",
				method: function(value, item) {
				return item.roleName;
			    } } };

$("#roleName_"+MEMBER_ID).easyAutocomplete(options);
}

function addToArray_members(){
 document.getElementById("communityNewBranch_members_name").value="";
 console.log(MEMBER_DISPLAYCONTENT);
 var duplicateRecognizer=false;
 if(MEMBERS_LIST[MEMBER_ID]===undefined){
   MEMBERS_LIST[MEMBER_ID]={ "member_Id":MEMBER_ID };
   MEMBER_DISPLAYCONTENT+='<div id="div_communityNewBranch_selectedMembers'+(size+1)+'"></div>';
   document.getElementById("div_communityNewBranch_selectedMembers"+size).innerHTML=MEMBER_DISPLAYCONTENT;
   select_display_roles('roles_div_'+MEMBER_ID,MEMBER_ID);  // Setting Select Options
   size++;
 }
 console.log("MEMBERS_LIST: "+JSON.stringify(MEMBERS_LIST));
 enable_finishButton();
}
function deleteFromArray_member(member_Id){
 delete MEMBERS_LIST[member_Id];
 $('#div_members_'+member_Id).hide(1000);
 enable_finishButton();
}
function finish_AddMembersToBranch(){
 var finished = true;
 for(var member_Id in MEMBERS_LIST){
   var memberResponse = MEMBERS_LIST[member_Id];
   if(memberResponse.role_Id === undefined || memberResponse.role_Id.length===0){
    finished = false;
   }
 }
 if(!finished){
   alert_display_warning('W036');
 } else {
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.branch.php',
   { action:'CREATE_PROFESSIONAL_BRANCH', country: BRANCH_COUNTRY, state:BRANCH_STATE, location: BRANCH_LOCATION,
   minlocation: BRANCH_MINLOCATION, roleInfo: ROLE_INFO, members: MEMBERS_LIST },function(response){
    console.log(response);
  });
  console.log(JSON.stringify(MEMBERS_LIST));
  console.log(JSON.stringify(ROLE_INFO));
 }
}
function enable_finishButton(){
 if(Object.keys(MEMBERS_LIST).length>0){
   if($('#btn_communityNewBranch_formFinsh').hasClass('hide-block')){
     $('#btn_communityNewBranch_formFinsh').removeClass('hide-block');
   }
 } else {
   if(!$('#btn_communityNewBranch_formFinsh').hasClass('hide-block')){
     $('#btn_communityNewBranch_formFinsh').addClass('hide-block');
   }
 }
}
</script>
 <div class="form-group">
  <label>Name</label>
  <div class="input-group">
    <input type="text" id="communityNewBranch_members_name" class="form-control" placeholder="Enter Member Name"/>
	<span class="input-group-addon custom-bg" onclick="javascript:addToArray_members();">Add</span>
  </div>
 </div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<div id="div_communityNewBranch_selectedMembers0"></div>
</div>
</div>
<div class="row">
<div align="center" class="col-xs-12">
<button id="btn_communityNewBranch_formFinsh" class="btn btn-default hide-block" onclick="javascript:finish_AddMembersToBranch();"><b>Finish</b></button>
</div>
</div>