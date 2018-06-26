<script	type="text/javascript">
function menuCommunityProfile(id){
 var arry_Id=["communityProfile_statistics","communityProfile_comOwners"];
 var arry_Id_content=["communityProfile_statistics_content","communityProfile_comOwners_content"];
 for(var index=0;index<arry_Id.length;index++){
   if(id===arry_Id[index]){
     $('#'+arry_Id[index]).css('color',CURRENT_DARK_COLOR);
     $('#'+arry_Id[index]).css('border-bottom','2px solid '+CURRENT_DARK_COLOR);
	 if($('#'+arry_Id_content[index]).hasClass('hide-block')) { 
	    $('#'+arry_Id_content[index]).removeClass('hide-block'); 
	 }
   } else {
     $('#'+arry_Id[index]).css('color','#000');
     $('#'+arry_Id[index]).css('border-bottom','0px');
	 if(!$('#'+arry_Id_content[index]).hasClass('hide-block')) { 
	    $('#'+arry_Id_content[index]).addClass('hide-block'); 
	 }
   }
 }
}
</script>
<div class="container-fluid mtop15p">
	<div class="" style="margin-bottom:15px;text-transform:uppercase;">
		<span class="label custom-bg">IT and Software</span>&nbsp;<b>/</b>&nbsp;<span class="label custom-bg">Social Network</span>
	</div>
	<div id="communityProfilePicDiv" class="col-xs-3">
		<img src="https://res.cloudinary.com/dbcyhclaw/image/upload/x_856,y_436,w_208,h_208,z_0.4315,c_crop/v1529503339/Screenshot_20180619-135815_osobbt.png" style="margin-top:15px;width:70px;height:70px;border-radius:50%;background-color:#efefef;">
	</div>
	<div align="center" class="col-xs-9 pad0">
		<div class="col-xs-12 pad0">
			<h5 style="line-height:28px;"><b>Telangana Owners and Drivers Association</b></h5>
		</div>
	    <div class="col-xs-12 pad0">Kukatpally, Hyderabad,<br/> Telangana, INDIA</div>
	</div>

	<div class="col-xs-12 pad0 mtop15p">
		<div class="btn-group pull-right">
			<button class="btn btn-default"><b>Edit Profile</b></button>
			<button class="btn btn-default"><b>Write NewsFeed</b></button>
			<button class="btn btn-default"><i class="fa fa-cog"></i></button>
		</div>
	</div>

	<div class="col-xs-12 pad0 mtop15p">
		<div class="btn-group pull-right">
			<button class="btn btn-default pull-right" onclick="javascript:invoke_requestBranchModal();"><b>Request Local Branch</b></button>
			<button class="btn btn-default" onclick="javascript:invoke_joinAsMemberModal();"><b>Join As Member</b></button>
		</div>
	</div>
</div>
<div class="container-fluid mtop15p pad0">
	<div class="col-xs-12 pad0">
		<div class="list-group">
			<div class="list-group-item" style="border-bottom:3px solid #000;"><h5><b>About Community</b></h5></div>
			<div class="list-group-item">
				Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. 
				Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh.
				Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. 
				Vestibulum a velit eu ante scelerisque vulputate.
			</div>
			<div class="list-group-item">
				<div class="container-fluid pad0">
					<div class="col-xs-12 pad0">
					   <button class="btn btn-default pull-right"><span class="fs14"><b>Subscribe to Community</b></span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 pad0">
		<div class="list-group">	
			<div class="list-group-item" style="box-shadow:1px 1px 1px 1px #dedcdc;">
				<div align="center" class="container-fluid">
					<div class="col-xs-4">
						<span id="communityProfile_statistics" class="padbot10" onclick="javascript:menuCommunityProfile(this.id);"><b>Statistics</b></span>
					</div>
					<div class="col-xs-8">
						<span id="communityProfile_comOwners" class="padbot10" onclick="javascript:menuCommunityProfile(this.id);"><b>Community Owners</b></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="communityProfile_statistics_content" class="col-xs-12 hide-block">
		<div class="list-group">
			<div class="list-group-item">
				<div class="container-fluid">
			      <div class="col-xs-12">
				    <span class="pull-right">
				    <span class="fs18"><b>10000</b></span>&nbsp;&nbsp;<span class="fs14 uppercase"><b>Branches</b></span>
					</span>
				  </div>
				</div>
			</div>
		</div>
			  
		<div class="list-group">
			<div class="list-group-item">
				<div class="container-fluid">
				    <div class="col-xs-12">
					   <span class="pull-left">
			             <span class="fs18"><b>10000</b></span>&nbsp;&nbsp;<span class="fs14 uppercase"><b>Members</b></span>
					   </span>
				    </div>
				</div>
			</div>
		</div>
			  
		<div class="list-group">
			<div class="list-group-item">
				<div class="container-fluid">
				    <div class="col-xs-12">
					   <span class="pull-right">
			               <span class="fs18"><b>10000</b></span>&nbsp;&nbsp;<span class="fs14 uppercase"><b>Subscriptions</b></span>
					   </span>
					</div>
				</div>  
			</div>
		</div>
			   
		<div class="list-group">
			<div class="list-group-item">
				<div class="container-fluid">
				    <div class="col-xs-12">
					   <span class="pull-left">
			               <span class="fs18"><b>10000</b></span>&nbsp;&nbsp;<span class="fs14 uppercase"><b>Movement</b></span>
					   </span>
					</div>
				</div>  
			</div>
		</div>

	</div>

	<div id="communityProfile_comOwners_content" class="col-xs-12 hide-block">
	    <div class="list-group">
			<div class="list-group-item">
			    <div class="container-fluid pad0">
					   <div class="col-xs-12 pad0"><span class="label custom-bg uppercase">Community Creator</span></div>
					   <div class="col-xs-3">
					     <img src="https://res.cloudinary.com/dbcyhclaw/image/upload/x_856,y_436,w_208,h_208,z_0.4315,c_crop/v1529503339/Screenshot_20180619-135815_osobbt.png" style="margin-top:15px;width:70px;height:70px;border-radius:50%;background-color:#efefef;">
					   </div>
					   <div align="center" class="col-xs-9">
					      <div><h4><b>SurName Name</b></h4></div>
						  <div><span class="label custom-bg uppercase">Role in the Community</span></div>
						  <div class="mtop15p  ">Minlocation, Location,<br/> State, Country</div>
					   </div>
				</div>
			</div>
		</div>
	</div>
</div>
		
		