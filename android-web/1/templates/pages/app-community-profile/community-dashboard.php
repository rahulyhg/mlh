<script type="text/javascript">
function communityDashBoardMenu(id){  // "communityDash_MemberRequest", "communityDashMemberRequestDivision",
 var arry_Id=["communityDash_Settings"];
 var arry_Id_content=["communityDashSettingsDivison"];
 for(var index=0;index<arry_Id.length;index++){
   if(arry_Id[index]===id){ 
     if($('#'+arry_Id_content[index]).hasClass('hide-block')){ $('#'+arry_Id_content[index]).removeClass('hide-block'); } 
	 $('#'+arry_Id[index]).css('color',CURRENT_DARK_COLOR);
	 $('#'+arry_Id[index]).css('border-bottom','3px solid '+CURRENT_DARK_COLOR);
   }
   else {
     if(!$('#'+arry_Id_content[index]).hasClass('hide-block')){ $('#'+arry_Id_content[index]).addClass('hide-block'); } 
	 $('#'+arry_Id[index]).css('color','#000');
	 $('#'+arry_Id[index]).css('border-bottom','0px');
   }
 }
}
</script>

<div class="container-fluid mtop15p"> 
  <div class="list-group">
	 <div class="list-group-item">
		<div class="container-fluid pad0">
			<div class="col-xs-3">
			  <img src="https://res.cloudinary.com/dbcyhclaw/image/upload/x_856,y_436,w_208,h_208,z_0.4315,c_crop/v1529503339/Screenshot_20180619-135815_osobbt.png" style="margin-top:15px;width:70px;height:70px;border-radius:50%;background-color:#efefef;">
			</div>
			<div align="center" class="col-xs-9">
			  <div><h5><b>SurName Name</b></h5></div>
			  <div><span class="label custom-bg uppercase">Role in the Community</span></div>
			  <div class="mtop15p">Minlocation, Location,<br/> State, Country</div>
			</div>
		</div>
	  </div>
	  <div class="list-group-item">
		 <div class="container-fluid">
		    <div class="col-xs-4"><b>Branch Details</b></div>
			<div class="col-xs-8">Minlocation, Location,<br/> State, Country</div>
		 </div>
	  </div>
     </div>
</div>

<!--div class="container-fluid pad0"> 
   <div class="list-group">
	  <div class="list-group-item">
	     <div class="container-fluid pad0">
			<div align="center" class="col-xs-6">
			   <span id="communityDash_MemberRequest" style="padding-bottom:10px;font-size:12px;" onclick="javascript:communityDashBoardMenu(this.id);">
				 <b><i class="fa fa-user" style="font-size:18px;"></i> Member Requests</b>
			   </span>
			</div>
			<div align="center" class="col-xs-6">
			   <span id="communityDash_Settings" style="padding-bottom:10px;font-size:12px;" onclick="javascript:communityDashBoardMenu(this.id);">
				  <b><i class="fa fa-cog" style="font-size:18px;"></i> My Permissions</b>
			   </span>
			</div>
		 </div>
	  </div>
   </div>
</div-->
			
<!--div id="communityDashMemberRequestDivision" class="container-fluid hide-block">
  <div class="list-group">
	 <div class="list-group-item">
		<div class="container-fluid pad0">
			<div class="col-xs-3">
			    <img src="https://res.cloudinary.com/dbcyhclaw/image/upload/x_856,y_436,w_208,h_208,z_0.4315,c_crop/v1529503339/Screenshot_20180619-135815_osobbt.png" style="margin-top:15px;width:70px;height:70px;border-radius:50%;background-color:#efefef;">
			</div>
			<div align="center" class="col-xs-9">
			    <div><h5><b>SurName Name</b></h5></div>
				<div><span class="label custom-bg uppercase">Role in the Community</span></div>
				<div class="mtop15p  ">Minlocation, Location,<br/> State, Country</div>
			</div>
		</div>
	  </div>
	  <div class="list-group-item">
		 <div class="container-fluid">
			<div class="col-xs-4"><b>Branch Details</b></div>
				<div class="col-xs-8">Minlocation, Location,<br/> State, Country</div>
			</div>
		 </div>
		 <div class="list-group-item">
			<div class="container-fluid pad0">
			    <div class="col-xs-12 pad0  "><button class="btn custom-bg pull-right"><b>Accept Request</b></button></div>
			</div>
		 </div>
	  </div>
</div-->
			
<div id="communityDashSettingsDivison" class="container-fluid mbot15p pad0">
   <div class="list-group">
      <div class="list-group-item" style="border-bottom:3px solid #000;">
	    <h5><b>About My Permissions</b></h5>
	  </div>
      <div class="list-group-item custom-bg pad5">
	    <div class="container-fluid pad0">
		   <div align="center" class="col-xs-12 pad0"><h5><b>Commmunity Branch</b></h5></div>
		</div>
	  </div>
	  <div class="list-group-item">
		 <div class="container-fluid pad0">
		    <div align="left" class="col-xs-10 pad0"><b>Create Branch</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
			<div align="left" class="col-xs-10 pad0"><b>Update Branch Information</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
			<div align="left" class="col-xs-10 pad0"><b>Delete Branch</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
			<div align="left" class="col-xs-10 pad0"><b>Shift Main Branch</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
		 </div>
      </div>
	  <div class="list-group-item custom-bg pad5">
	    <div class="container-fluid pad0">
		   <div align="center" class="col-xs-12 pad0"><h5><b>Member Roles</b></h5></div>
		</div>
	  </div>
	  <div class="list-group-item">
		 <div class="container-fluid pad0">
		    <div align="left" class="col-xs-10 pad0"><b>Create Role</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
			<div align="left" class="col-xs-10 pad0"><b>Update Role</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
			<div align="left" class="col-xs-10 pad0"><b>Delete Delete</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
		 </div>
      </div>
	  <div class="list-group-item custom-bg pad5">
	    <div class="container-fluid pad0">
		   <div align="center" class="col-xs-12 pad0"><h5><b>Joining Members</b></h5></div>
		</div>
	  </div>
	  <div class="list-group-item">
		 <div class="container-fluid pad0">
		    <div align="left" class="col-xs-10 pad0"><b>Send Requests to New Users</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
			<div align="left" class="col-xs-10 pad0"><b>Approve Recieved Requests</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
		</div>
      </div>
	  <div class="list-group-item custom-bg pad5">
	    <div class="container-fluid pad0">
		   <div align="center" class="col-xs-12 pad0"><h5><b>NewsFeed</b></h5></div>
		</div>
	  </div>
	  <div class="list-group-item">
		 <div class="container-fluid pad0">
		    <div align="center" class="col-xs-12 custom-font pad0"><h5><b>Branch Level</b></h5></div>
		    <div align="left" class="col-xs-10 pad0"><b>Create News</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
			<div align="left" class="col-xs-10 pad0"><b>Approve to publish Created News</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
		    <div align="center" class="col-xs-12 mtop10p custom-font pad0"><h5><b>Union Level</b></h5></div>
		    <div align="left" class="col-xs-10 pad0"><b>Create News</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
			<div align="left" class="col-xs-10 pad0"><b>Approve to publish Created News</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
		</div>
      </div>
	  <div class="list-group-item custom-bg pad5">
	    <div class="container-fluid pad0">
		   <div align="center" class="col-xs-12 pad0"><h5><b>Movement</b></h5></div>
		</div>
	  </div>
	  <div class="list-group-item">
		 <div class="container-fluid pad0">
		    <div align="center" class="col-xs-12 custom-font pad0"><h5><b>Branch Level</b></h5></div>
		    <div align="left" class="col-xs-10 pad0"><b>Create Movement</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
			<div align="left" class="col-xs-10 pad0"><b>Approve to launch Created Movement</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
		    <div align="center" class="col-xs-12 mtop10p custom-font pad0"><h5><b>Union Level</b></h5></div>
		    <div align="left" class="col-xs-10 pad0"><b>Create Movement</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
			<div align="left" class="col-xs-10 pad0"><b>Approve to launch Created Movement</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
		    <div align="center" class="col-xs-12 mtop10p custom-font pad0"><h5><b>Sub-Category Level</b></h5></div>
		    <div align="left" class="col-xs-10 pad0"><b>Create Movement</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
			<div align="left" class="col-xs-10 pad0"><b>Approve to launch Created Movement</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
		    <div align="center" class="col-xs-12 mtop10p custom-font pad0"><h5><b>Category Level</b></h5></div>
		    <div align="left" class="col-xs-10 pad0"><b>Create Movement</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
			<div align="left" class="col-xs-10 pad0"><b>Approve to launch Created Movement</b></div><div align="right" class="col-xs-2"><b>YES</b></div>
		</div>
      </div>
   </div>
</div>
			   
		
		