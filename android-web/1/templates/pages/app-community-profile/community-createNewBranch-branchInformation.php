
<div class="row">
<div class="col-xs-12">
<!-- Country -->
 <div id="alert_form_createBranchInformation" class="form-group">
 </div>
 
 <div class="form-group">
   <h5><b>Branch Details</b><hr/></h5>
 </div>
 
 <!-- Country -->
 <div class="form-group">
  <label>Country&nbsp;<span class="font-red">*</span></label> 
  <select id="communityNewBranch_branchInfo_country" class="form-control" 
  onchange="javascript:build_stateOption('communityNewBranch_branchInfo_country','communityNewBranch_branchInfo_state');">
    <option value="">Select Country</option>
  </select>
 </div>
 <!-- State -->
 <div class="form-group">
  <label>State&nbsp;<span class="font-red">*</span></label>
  <select id="communityNewBranch_branchInfo_state" class="form-control" 
  onchange="javascript:build_locationOption('communityNewBranch_branchInfo_country','communityNewBranch_branchInfo_state',
 'communityNewBranch_branchInfo_location');">
    <option value="">Select State</option>
  </select>
 </div>
 <!-- Location -->
 <div class="form-group">
  <label>Location&nbsp;<span class="font-red">*</span></label>
  <select id="communityNewBranch_branchInfo_location" class="form-control" 
  onchange="javascript:build_minlocationOption('communityNewBranch_branchInfo_country','communityNewBranch_branchInfo_state',
 'communityNewBranch_branchInfo_location','communityNewBranch_branchInfo_locality');">
    <option value="">Select Location</option>
  </select>
 </div>
 <!-- Locality -->
 <div class="form-group">
  <label>Locality&nbsp;<span class="font-red">*</span></label>
  <select id="communityNewBranch_branchInfo_locality" class="form-control">
    <option value="">Select Locality</option>
  </select>
 </div>

</div>
</div>
<div class="row">
<div class="col-xs-12 mtop15p">
 
 <div class="form-group">
   <h5><b>Administrator Details</b><hr/></h5>
 </div>
 
 <div align="center" id="createNewBranch_profilepic" class="form-group">
  
 </div>
 
 <div class="form-group">
  <label>Name</label> 
  <div class="list-group">
  <div id="createNewBranch_firstMemberName" class="list-group-item">
  
  </div>
  </div>
 </div>
 
 <!--  -->
 <?php if(isset($_GET["1"]) && $_GET["1"]==$_SESSION["AUTH_USER_ID"]){?>
 <div class="form-group">
  <label>Your Designation in the Branch&nbsp;<span class="font-red">*</span></label> 
  <input id="communityNewBranch_branchInfo_mydesignation" type="text" class="form-control" 
  placeholder="Enter your Designation"/>
 </div>
 <?php } else { ?>
 <div class="form-group">
  <label>Designation of First Member in the Branch&nbsp;<span class="font-red">*</span></label> 
  <input id="communityNewBranch_branchInfo_mydesignation" type="text" class="form-control" 
  placeholder="Enter your Designation"/>
 </div>
 <?php } ?>
 
 
 <!-- Button -->
 <div class="form-group">
  <button class="btn custom-bg form-control" onclick="javascript:form_add_branchInformation();"><b>Next</b></button>
 </div>
</div>
</div>
