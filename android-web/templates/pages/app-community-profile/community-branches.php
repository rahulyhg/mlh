<div class="container-fluid mtop15p">
    <div align="right" class="col-xs-12 mbot15p">
	  <button class="btn btn-default">
	    <a class="a-custom" href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/community/createNewBranch/<?php if(isset($_SESSION["AUTH_USER_ID"])){ echo $_SESSION["AUTH_USER_ID"]; }?>/<?php if(isset($_GET["2"])){ echo $_GET["2"]; }?>"><b>Create New Branch</b></a>
	  </button>
	  <button class="btn btn-default" onclick="javascript:invoke_requestBranchModal();"><b>Request Local Branch</b></button>
	</div>
</div>

<div class="list-group">
<div class="list-group-item" style="box-shadow:1px 1px 1px 1px #dedcdc;">
<div class="container-fluid">
<div class="row">
<div class="col-xs-6"><span id="communityBranch_branchRequests" class="padbot10" onclick="javascript:communityBranch_subMenuTabs(this.id);"><b>Branch Requests</b></span></div>
<div class="col-xs-6"><span id="communityBranch_branchLists" class="padbot10" onclick="javascript:communityBranch_subMenuTabs(this.id);"><b>List of Branches</b></span></div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
 communityBranch_subMenuTabs('communityBranch_branchRequests');
});
function communityBranch_subMenuTabs(id){
 var arry_Id=["communityBranch_branchRequests","communityBranch_branchLists"];
 var arry_Id_content=["communityBranch_branchRequests_content","communityBranch_branchLists_content"];
 for(var index=0;index<arry_Id.length;index++){
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
}
</script>	

<!-- Modal ::: Start -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
	  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title"><b>SurName Name</b></h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
		  <div class="row">
		    <div class="col-xs-12"><h5><b>Choose the Phone Number:</b></h5></div>
			<!--div class="col-xs-12"><h5><b>Choose one of the PhoneNumber:</b></h5></div-->
		  </div>
		  <div class="row">
		    <div class="list-group">
			 <div class="list-group-item">
			   <a class="a-custom" href="tel:+91-9160869337">
			   <h5><b>+91-9160869337</b></h5>
			   </a>
			 </div>
			 <div class="list-group-item">
			   <a class="a-custom" href="tel:+919160869337">
			   <h5><b>+91-6300193369</b></h5>
			   </a>
			 </div>
			</div>
		  </div>
		</div>
      </div>
    </div>
  </div>
</div>
<!-- Modal ::: End -->

<div id="communityBranch_branchRequests_content">
<div class="list-group">
<div class="list-group-item pad0">
 <div class="container-fluid mtop15p mbot15p">
  <div class="row">
    <div class="col-xs-12">
      SurName Name is requesting for a Local Branch (Locality, Location, State, Country) in the Community.
    </div>
  </div>
 </div>
</div>
<div class="list-group-item pad0">
 <div class="container-fluid mtop15p mbot15p">
  <div class="row">
    <div class="col-xs-3">
	   <button class="btn btn-default custom-font pull-left" data-toggle="modal" data-target="#myModal">
	     <i class="fa fa-phone"></i><b>&nbsp;Call</b>
	   </button>
	</div>
	<div align="right" class="col-xs-9">
	  <div class="btn-group">
        <button class="btn custom-bg"><i class="fa fa-check"></i>&nbsp;<b>Approve</b></button>
		<button class="btn btn-default custom-font"><i class="fa fa-close"></i>&nbsp;<b>Decline</b></button>
	  </div>
	</div>
  </div>
 </div>
</div>
</div>
</div>
<div id="communityBranch_branchLists_content" class="container-fluid mtop15p">
	<div class="col-xs-12">
		<div class="list-group">
			<div class="list-group-item pad0">
			   <div class="container-fluid mtop15p mbot15p">
			      <div class="row">
				    <div class="col-xs-12">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
				  </div>
				  <div class="row">
				    <div class="col-xs-7">
					  <span class="label custom-bg">MAIN BRANCH</span>
			          <div class="mtop15p lh22">
			           Kukatpally, Hyderabad, Telangana, INDIA
			          </div>
			        </div>
			        <div align="center" class="col-xs-5">
			         <h5><b>Members</b></h5>
			         <h4>1000000</h4>
			        </div>
					
				  </div>
			    </div>
			</div>
			<div class="list-group-item pad0">
			  <div class="container-fluid mtop15p mbot15p">
			   <div class="row">
			   <div align="right" class="col-xs-12">
			      <div class="btn-group">
				    <button class="btn btn-default"><span class="fs14"><b>Make it as Main Branch</b></span></button>
			        <button class="btn btn-default"><span class="fs14"><b>Update Branch</b></span></button>
				  </div>
			    </div>
				</div>
			  </div>
			</div>
		</div>
	</div>

</div>

