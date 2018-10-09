<script type="text/javascript">
/*
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
// 
// 

</script>
<div class="row">
<div id="alert_form_createRoles" class="col-xs-12">

</div>
</div>
<div class="row">
<div class="col-xs-12 mtop15p">
<div class="input-group">
<input id="communityNewBranch_createRoles_roleName" type="text" class="form-control" placeholder="Enter Role Name">
<span class="input-group-addon custom-bg curpoint" onclick="javascript:form_add_createRole();">Add Role</span>
</div>
</div>
</div>
<div class="row">
<div align="center" class="col-xs-12 mtop15p">
<h5><b>List of Roles</b><hr/></h5>
</div>
<div id="communityNewBranch_createRoles_rolesList" class="col-xs-12"></div>
</div>
<div class="row">
<div id="communityNewBranch_createRoles_done" align="center" class="col-xs-12 mtop15p hide-block">
<button class="btn custom-bg" onclick="javascript:load_form_addMembers();"><b>I'm Done</b></button>
</div>
</div>

