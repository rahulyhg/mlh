$(document).ready(function(){
 bgstyle(3);
 build_countryOption('communityNewBranch_branchInfo_country');
 $(".lang_"+USR_LANG).css('display','block');
 generateTabList();
 hzTabSelection('branchInformationHzTab');
});

function generateTabList(){ 
 var content='<ul class="nav scrollTablist" id="communityProfileTab" style="border-bottom:0px;">';
	 content+='<li><a id="branchInformationHzTab" href="#"><b>1. Branch Information</b></a></li>';
	 content+='<li><a id="createRolesHzTab" href="#"><b>2. Create Roles</b></a></li>';
	 content+='<li><a id="addMembersHzTab" href="#"><b>3. Add Members</b></a></li>';
	 content+='</ul>'; 
  document.getElementById("communityProfileScrollableTab").innerHTML=content;
}

function hzTabSelection(id){
 var arryHzTab=["branchInformationHzTab","createRolesHzTab","addMembersHzTab"];
 var arryTabDataViewer=["branchInformationDisplayDivision","createRolesDisplayDivision","addMembersDisplayDivision"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer);
}
/*****************************************************************************************************************************/
/**************************************************** BRANCH INFORMATION *****************************************************/
/*****************************************************************************************************************************/
var BRANCH_COUNTRY;
var BRANCH_STATE;
var BRANCH_LOCATION;
var BRANCH_MINLOCATION;

function form_add_branchInformation(){
 BRANCH_COUNTRY = document.getElementById("communityNewBranch_branchInfo_country").value;
 BRANCH_STATE = document.getElementById("communityNewBranch_branchInfo_state").value;
 BRANCH_LOCATION = document.getElementById("communityNewBranch_branchInfo_location").value; 
 BRANCH_MINLOCATION = document.getElementById("communityNewBranch_branchInfo_locality").value;
 if(BRANCH_COUNTRY.length>0){
 if(BRANCH_STATE.length>0){
 if(BRANCH_LOCATION.length>0){
 if(BRANCH_MINLOCATION.length>0){
   /* Check BranchNames already Exists for MinLocation, Location, State, Country */
   js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.branch.php',
   { action :'CHECK_BRANCHUNIQUEORNOT', union_Id:UNION_ID, country: BRANCH_COUNTRY,
   state:BRANCH_STATE, location: BRANCH_LOCATION, minlocation: BRANCH_MINLOCATION }, function(total_data){ 
     total_data = parseInt(total_data);
	 if(total_data>0){ div_display_warning('alert_form_createBranchInformation','W039'); } 
	 else { load_form_createRole(); }
   });
   
 } else { div_display_warning('alert_form_createBranchInformation','W010'); }
 } else { div_display_warning('alert_form_createBranchInformation','W009'); }
 } else { div_display_warning('alert_form_createBranchInformation','W008'); }
 } else { div_display_warning('alert_form_createBranchInformation','W007'); }
}

/*****************************************************************************************************************************/
/**************************************************** CREATE ROLES ***********************************************************/
/*****************************************************************************************************************************/
/* ROLE_INFO FORMAT:
{"UPRO321161265696954492835":{"roleName":"QWERT","createABranch":"Y","updateBranchInfo":"Y","deleteBranch":"Y",
"shiftMainBranch":"Y","createRole":"Y","viewRoles":"Y","updateRole":"Y","deleteRole":"Y","requestUsersToBeMembers":"Y",
"approveUsersToBeMembers":"Y","createNewsFeedBranchLevel":"Y","approveNewsFeedBranchLevel":"Y","createNewsFeedUnionLevel":"Y",
"approveNewsFeedUnionLevel":"Y","createMovementBranchLevel":"Y","approveMovementBranchLevel":"Y","createMovementUnionLevel":"Y",
"approveMovementUnionLevel":"Y","createMovementSubDomainLevel":"Y","approveMovementSubDomainLevel":"Y",
"createMovementDomainLevel":"Y","approveMovementDomainLevel":"Y"}}
*/
var ROLE_INFO={};
function load_form_createRole(){
 hzTabSelection('createRolesHzTab');
 load_createRole_list();
}
function form_add_createRole(){
 var roleName = document.getElementById("communityNewBranch_createRoles_roleName").value;
 document.getElementById("communityNewBranch_createRoles_roleName").value='';
 if(roleName.length>0){
 show_toggleMLHLoader('body');
 
 var role_Id = unionprof_mem_roles_Id();
 ROLE_INFO[role_Id] = { "roleName":roleName };
 load_createRole_list();
 hide_toggleMLHLoader('body');
 } else { div_display_warning('alert_form_createRoles','W035'); }
}
function load_createRole_list(){
 var content=''; 
 var roles_count = 0;	 
 for(var role_Id in ROLE_INFO){
  var roleInfoObject = ROLE_INFO[role_Id];
  var roleName = sentenceCase(roleInfoObject["roleName"]);
  content+='<div class="list-group">'; 
  content+='<div class="list-group-item custom-lgt-bg" style="background-color:'+CURRENT_LIGHT_COLOR+';"';
  content+='data-toggle="collapse" data-target="#roleId-collapse-'+role_Id+'">';
  content+='<i style="font-size:20px;" ';
  content+='class="fa fa-angle-down" aria-hidden="true"></i>&nbsp;&nbsp;';
  content+='<b>'+roleName+'</b>';
  content+='<i id="roleId-'+role_Id+'" onclick="javascript:form_remove_roleName(\''+role_Id+'\');" ';
  content+='class="fa fa-close pull-right"></i>';
  content+='</div>';
  content+='<div id="roleId-collapse-'+role_Id+'" class="collapse">';
  content+='<div align="center" class="list-group-item">';
  content+='<b>Set Permissions to Role</b>';
  content+='</div>';
  content+='<div class="list-group-item" data-toggle="collapse" data-target="#perm_branchInfo_'+role_Id+'">';
  content+='<b>Branch Information <i class="fa fa-angle-down pull-right" aria-hidden="true"></i></b>';
  content+='</div>';
  content+='<div id="perm_branchInfo_'+role_Id+'" class="collapse">';
  content+='<div class="list-group-item">';
  content+='<div class="container-fluid">';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Create a New Branch</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_createABranch_'+role_Id+'" type="checkbox" ';
  content+='data-toggle="toggle" data-on="Yes" data-off="No" ';
  content+='onchange="javascript:setPerm_branchInfo_create(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Update Branch Information</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_updateBranchInfo_'+role_Id+'" type="checkbox" ';
  content+='data-toggle="toggle" data-on="Yes" data-off="No" ';
  content+='onchange="javascript:setPerm_branchInfo_update(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>'; 
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Able to Delete Branch</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_deleteBranch_'+role_Id+'" type="checkbox" ';
  content+='data-toggle="toggle" data-on="Yes" data-off="No" ';
  content+='onchange="javascript:setPerm_branchInfo_delete(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Able to Shift Main Branch</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_shiftMainBranch_'+role_Id+'" type="checkbox" ';
  content+='data-toggle="toggle" data-on="Yes" data-off="No" ';
  content+='onchange="javascript:setPerm_branchInfo_shiftBranch(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='<div class="list-group-item" data-toggle="collapse" data-target="#perm_roles_'+role_Id+'">';
  content+='<b>Member Roles <i class="fa fa-angle-down pull-right" aria-hidden="true"></i></b>';
  content+='</div>';
  content+='<div id="perm_roles_'+role_Id+'" class="collapse">';
  content+='<div class="list-group-item">';
  content+='<div class="container-fluid">';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Create Roles</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_createRole_'+role_Id+'" type="checkbox" data-toggle="toggle" ';
  content+='data-on="Yes" data-off="No" onchange="javascript:setPerm_roles_create(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">View Roles</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_viewRoles_'+role_Id+'" type="checkbox" data-toggle="toggle" ';
  content+='data-on="Yes" data-off="No" onchange="javascript:setPerm_roles_view(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Update Role Titles</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_updateRole_'+role_Id+'" type="checkbox" data-toggle="toggle" ';
  content+='data-on="Yes" data-off="No" onchange="javascript:setPerm_roles_update(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Delete Roles</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_deleteRole_'+role_Id+'" type="checkbox" data-toggle="toggle" ';
  content+='data-on="Yes" data-off="No" onchange="javascript:setPerm_roles_delete(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='<div class="list-group-item" data-toggle="collapse" data-target="#perm_members_'+role_Id+'">';
  content+='<b>Members <i class="fa fa-angle-down pull-right" aria-hidden="true"></i></b>';
  content+='</div>';
  content+='<div id="perm_members_'+role_Id+'" class="collapse">';
  content+='<div class="list-group-item">';
  content+='<div class="container-fluid">';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Send Requests to User to join as A Member</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_requestUsersToBeMembers_'+role_Id+'" type="checkbox" data-toggle="toggle" ';
  content+='data-on="Yes" data-off="No" onchange="javascript:setPerm_members_sendRequests(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';  
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Approve Member Request</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_approveUsersToBeMembers_'+role_Id+'" type="checkbox" data-toggle="toggle" data-on="Yes" ';
  content+='data-off="No" onchange="javascript:setPerm_members_approveRequests(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';   
  content+='<div class="list-group-item" data-toggle="collapse" data-target="#perm_newsfeed_'+role_Id+'">';
  content+='<b>NewsFeed <i class="fa fa-angle-down pull-right" aria-hidden="true"></i></b>';
  content+='</div>';
  content+='<div id="perm_newsfeed_'+role_Id+'" class="collapse">';
  content+='<div class="list-group-item">';
  content+='<div class="container-fluid">';
  content+='<div class="row mtop15p">';
  content+='<div align="center" class="col-xs-12 pad0"><div class="pad5"><h5><b>Branch Level</b></h5></div></div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Create NewsFeed and Post within Branch</div></div> ';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_createNewsFeedBranchLevel_'+role_Id+'" type="checkbox" data-toggle="toggle" data-on="Yes" ';
  content+='data-off="No" onchange="javascript:setPerm_newsfeed_branch_createAndPostNewsFeed(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Approve NewsFeed created by others to post within ';
  content+='Branch</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_approveNewsFeedBranchLevel_'+role_Id+'" type="checkbox" data-toggle="toggle" data-on="Yes" ';
  content+='data-off="No" onchange="javascript:setPerm_newsfeed_branch_approveNewsFeed(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>'; 
  content+='<div class="row mtop15p">';
  content+='<div align="center" class="col-xs-12 pad0"><div class="pad5"><h5><b>Community Level</b></h5></div></div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Create NewsFeed and Post within Community</div></div> ';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_createNewsFeedUnionLevel_'+role_Id+'" type="checkbox" data-toggle="toggle" data-on="Yes" ';
  content+='data-off="No" onchange="javascript:setPerm_newsfeed_union_createAndPostNewsFeed(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Approve NewsFeed created by others to post ';
  content+='within Community</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_approveNewsFeedUnionLevel_'+role_Id+'" type="checkbox" data-toggle="toggle" data-on="Yes" ';
  content+='data-off="No" onchange="javascript:setPerm_newsfeed_union_approveNewsFeed(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';   
  content+='<div class="list-group-item" data-toggle="collapse" data-target="#perm_movement_'+role_Id+'">';
  content+='<b>Movement <i class="fa fa-angle-down pull-right" aria-hidden="true"></i></b>';
  content+='</div>';
  content+='<div id="perm_movement_'+role_Id+'" class="collapse">';
  content+='<div class="list-group-item">';
  content+='<div class="container-fluid">';
  content+='<div class="row mtop15p">';
  content+='<div align="center" class="col-xs-12 pad0"><div class="pad5"><h5><b>Branch Level</b></h5></div></div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Create Movement and Post within Branch</div></div> ';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_createMovementBranchLevel_'+role_Id+'" type="checkbox" data-toggle="toggle" data-on="Yes" ';
  content+='data-off="No" onchange="javascript:setPerm_movement_branch_createAndPostMovement(\''+role_Id+'\');">'; 
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Approve Movement created by others to post ';
  content+='within Branch</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_approveMovementBranchLevel_'+role_Id+'" type="checkbox" data-toggle="toggle" data-on="Yes" ';
  content+='data-off="No" onchange="javascript:setPerm_movement_branch_approveMovement(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div align="center" class="col-xs-12 pad0"><div class="pad5"><h5><b>Community Level</b></h5></div></div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Create Movement and Post within Community</div></div> ';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_createMovementUnionLevel_'+role_Id+'" type="checkbox" data-toggle="toggle" data-on="Yes" ';
  content+='data-off="No" onchange="javascript:setPerm_movement_union_createAndPostMovement(\''+role_Id+'\');">'; 
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Approve Movement created by others to post within ';
  content+='Community</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_approveMovementUnionLevel_'+role_Id+'" type="checkbox" data-toggle="toggle" data-on="Yes" ';
  content+='data-off="No" onchange="javascript:setPerm_movement_union_approveMovement(\''+role_Id+'\');" >';
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div align="center" class="col-xs-12 pad0"><div class="pad5"><h5><b>Sub-Category Level</b></h5></div></div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Create Movement and Post within Sub-Category</div></div> ';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_createMovementSubDomainLevel_'+role_Id+'" type="checkbox" data-toggle="toggle" data-on="Yes" ';
  content+='data-off="No" onchange="javascript:setPerm_movement_subdomain_createAndPostMovement(\''+role_Id+'\');">';   
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Approve Movement created by others to post ';
  content+='within Sub-Category</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_approveMovementSubDomainLevel_'+role_Id+'" type="checkbox" data-toggle="toggle" data-on="Yes" ';
  content+='data-off="No" onchange="javascript:setPerm_movement_subdomain_approveMovement(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div align="center" class="col-xs-12 pad0"><div class="pad5"><h5><b>Category Level</b></h5></div></div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Create Movement and Post within Category</div></div> ';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_createMovementDomainLevel_'+role_Id+'" type="checkbox" data-toggle="toggle" data-on="Yes" ';
  content+='data-off="No" onchange="javascript:setPerm_movement_domain_createAndPostMovement(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='<div class="row mtop15p">';
  content+='<div class="col-xs-8 pad0"><div class="pad5">Approve Movement created by others to post ';
  content+='within Category</div></div>';
  content+='<div class="col-xs-3 pull-right">';
  content+='<input id="input_approveMovementDomainLevel_'+role_Id+'" type="checkbox" data-toggle="toggle" data-on="Yes" ';
  content+='data-off="No" onchange="javascript:setPerm_movement_domain_approveMovement(\''+role_Id+'\');">';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  content+='</div>';
  roles_count++;
 }
 content+='<div>';
 document.getElementById("communityNewBranch_createRoles_rolesList").innerHTML=content;
 $('input[type=checkbox]').bootstrapToggle();
 if(roles_count>0){
   if($('#communityNewBranch_createRoles_done').hasClass('hide-block')){ 
      $('#communityNewBranch_createRoles_done').removeClass('hide-block'); 
   }
 } else {
    content='<div align="center" style="color:#ccc;">No Roles are created</div>';
	document.getElementById("communityNewBranch_createRoles_rolesList").innerHTML=content;
    if(!$('#communityNewBranch_createRoles_done').hasClass('hide-block')){ 
      $('#communityNewBranch_createRoles_done').addClass('hide-block'); 
   }
 }
 console.log("ROLE_INFO: "+JSON.stringify(ROLE_INFO));
}
function form_remove_roleName(role_Id){
 delete ROLE_INFO[role_Id];
 load_createRole_list();
}
/* Permissions Add to Roles */
/* Branch Information */
function setPerm_branchInfo_create(role_Id){
 var status = $('#input_createABranch_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].createABranch=status;
 console.log(JSON.stringify(ROLE_INFO));
}
function setPerm_branchInfo_update(role_Id){
 var status = $('#input_updateBranchInfo_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].updateBranchInfo=status;
 console.log(JSON.stringify(ROLE_INFO));
}
function setPerm_branchInfo_delete(role_Id){
 var status = $('#input_deleteBranch_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].deleteBranch=status;
 console.log(JSON.stringify(ROLE_INFO));
}
function setPerm_branchInfo_shiftBranch(role_Id){
 var status = $('#input_shiftMainBranch_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].shiftMainBranch=status;
 console.log(JSON.stringify(ROLE_INFO));
}
/* Roles */
function setPerm_roles_create(role_Id){
 var status = $('#input_createRole_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].createRole=status;
 console.log(JSON.stringify(ROLE_INFO));
}
function setPerm_roles_view(role_Id){ 
 var status = $('#input_viewRoles_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].viewRoles=status;
 console.log(JSON.stringify(ROLE_INFO));
}
function setPerm_roles_update(role_Id){ 
 var status = $('#input_updateRole_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].updateRole=status;
 console.log(JSON.stringify(ROLE_INFO));
}
function setPerm_roles_delete(role_Id){
 var status = $('#input_deleteRole_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].deleteRole=status;
 console.log(JSON.stringify(ROLE_INFO));
}
/* Members */
function setPerm_members_sendRequests(role_Id){
 var status = $('#input_requestUsersToBeMembers_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].requestUsersToBeMembers=status;
 console.log(JSON.stringify(ROLE_INFO));
}
function setPerm_members_approveRequests(role_Id){
 var status = $('#input_approveUsersToBeMembers_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].approveUsersToBeMembers=status;
 console.log(JSON.stringify(ROLE_INFO));
}
/* NewsFeed ::: Branch Level */
function setPerm_newsfeed_branch_createAndPostNewsFeed(role_Id){
 var status = $('#input_createNewsFeedBranchLevel_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].createNewsFeedBranchLevel=status;
 console.log(JSON.stringify(ROLE_INFO));
}

function setPerm_newsfeed_branch_approveNewsFeed(role_Id){
 var status = $('#input_approveNewsFeedBranchLevel_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].approveNewsFeedBranchLevel=status;
 console.log(JSON.stringify(ROLE_INFO));
}
/* NewsFeed ::: Union Level */
function setPerm_newsfeed_union_createAndPostNewsFeed(role_Id){
 var status = $('#input_createNewsFeedUnionLevel_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].createNewsFeedUnionLevel=status;
 console.log(JSON.stringify(ROLE_INFO));
}
function setPerm_newsfeed_union_approveNewsFeed(role_Id){
 var status = $('#input_approveNewsFeedUnionLevel_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].approveNewsFeedUnionLevel=status;
 console.log(JSON.stringify(ROLE_INFO));
}
/* Movement ::: Branch Level */
function setPerm_movement_branch_createAndPostMovement(role_Id){
 var status = $('#input_createMovementBranchLevel_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].createMovementBranchLevel=status;
 console.log(JSON.stringify(ROLE_INFO));
}
function setPerm_movement_branch_approveMovement(role_Id){
 var status = $('#input_approveMovementBranchLevel_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].approveMovementBranchLevel=status;
 console.log(JSON.stringify(ROLE_INFO));
}
/* Movement ::: Union Level */
function setPerm_movement_union_createAndPostMovement(role_Id){
 var status = $('#input_createMovementUnionLevel_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].createMovementUnionLevel=status;
 console.log(JSON.stringify(ROLE_INFO));
}
function setPerm_movement_union_approveMovement(role_Id){
 var status = $('#input_approveMovementUnionLevel_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].approveMovementUnionLevel=status;
 console.log(JSON.stringify(ROLE_INFO));
}
/* Movement ::: SubDomain Level */
function setPerm_movement_subdomain_createAndPostMovement(role_Id){
 var status = $('#input_createMovementSubDomainLevel_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].createMovementSubDomainLevel=status;
 console.log(JSON.stringify(ROLE_INFO));
}
function setPerm_movement_subdomain_approveMovement(role_Id){
 var status = $('#input_approveMovementSubDomainLevel_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].approveMovementSubDomainLevel=status;
 console.log(JSON.stringify(ROLE_INFO));
}
/* Movement ::: Domain Level */ 
function setPerm_movement_domain_createAndPostMovement(role_Id){
 var status = $('#input_createMovementDomainLevel_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].createMovementDomainLevel=status;
 console.log(JSON.stringify(ROLE_INFO));
}
function setPerm_movement_domain_approveMovement(role_Id){
 var status = $('#input_approveMovementDomainLevel_'+role_Id).prop('checked');
 if(status){ status='Y'; }
 else { status='N'; }
 ROLE_INFO[role_Id].approveMovementDomainLevel=status;
 console.log(JSON.stringify(ROLE_INFO));
}

/*****************************************************************************************************************************/
/**************************************************** ADD MEMBERS ************************************************************/
/*****************************************************************************************************************************/
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
  show_toggleMLHLoader('body');
  var branch_Id = unionprof_branch_Id();
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.branch.php',
   { action:'CREATE_PROFESSIONAL_BRANCH', union_Id: UNION_ID, branch_Id: branch_Id, country: BRANCH_COUNTRY, 
	 state:BRANCH_STATE, location: BRANCH_LOCATION, minlocation: BRANCH_MINLOCATION, roleInfo: ROLE_INFO, 
	 members: MEMBERS_LIST, admin_Id: AUTH_USER_ID },function(response){
	hide_toggleMLHLoader('body');
	alert_display_success('S005',PROJECT_URL+'app/community/general/viewprofile/'+UNION_ID);
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