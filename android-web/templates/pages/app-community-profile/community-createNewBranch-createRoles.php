<script type="text/javascript">
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
 var content='<div class="list-group">'; 
 var roles_count = 0;	 
 for(var role_Id in ROLE_INFO){
  var roleInfoObject = ROLE_INFO[role_Id];
  var roleName = roleInfoObject["roleName"];
  content+='<div class="list-group-item">';
  content+=roleName+'<i id="roleId-'+role_Id+'" onclick="javascript:form_remove_roleName(\''+role_Id+'\');" ';
  content+='class="fa fa-close pull-right"></i>';
  content+='</div>';
  roles_count++;
 }
 content+='<div>';
 document.getElementById("communityNewBranch_createRoles_rolesList").innerHTML=content;
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
}
function form_remove_roleName(role_Id){
 delete ROLE_INFO[role_Id];
 load_createRole_list();
}
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
<div id="communityNewBranch_createRoles_rolesList" class="col-xs-12">

</div>
</div>
<div class="row">
<div id="communityNewBranch_createRoles_done" align="center" class="col-xs-12 mtop15p hide-block">
<button class="btn custom-bg" onclick="javascript:load_form_addMembers();"><b>I'm Done</b></button>
</div>
</div>