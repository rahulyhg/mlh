
<div class="row">
<div class="col-xs-12">
<!-- Country -->
 <div id="alert_form_createBranchInformation" class="form-group">
 </div>
 <!-- Country -->
 <div class="form-group">
  <label>Country</label> 
  <select id="communityNewBranch_branchInfo_country" class="form-control" 
  onchange="javascript:build_stateOption('communityNewBranch_branchInfo_country','communityNewBranch_branchInfo_state');">
    <option value="">Select Country</option>
  </select>
 </div>
 <!-- State -->
 <div class="form-group">
  <label>State</label>
  <select id="communityNewBranch_branchInfo_state" class="form-control" 
  onchange="javascript:build_locationOption('communityNewBranch_branchInfo_country','communityNewBranch_branchInfo_state',
 'communityNewBranch_branchInfo_location');">
    <option value="">Select State</option>
  </select>
 </div>
 <!-- Location -->
 <div class="form-group">
  <label>Location</label>
  <select id="communityNewBranch_branchInfo_location" class="form-control" 
  onchange="javascript:build_minlocationOption('communityNewBranch_branchInfo_country','communityNewBranch_branchInfo_state',
 'communityNewBranch_branchInfo_location','communityNewBranch_branchInfo_locality');">
    <option value="">Select Location</option>
  </select>
 </div>
 <!-- Locality -->
 <div class="form-group">
  <label>Locality</label>
  <select id="communityNewBranch_branchInfo_locality" class="form-control">
    <option value="">Select Locality</option>
  </select>
 </div>
 <!-- Button -->
 <div class="form-group">
  <button class="btn custom-bg form-control" onclick="javascript:form_add_branchInformation();"><b>Next</b></button>
 </div>
</div>
</div>
