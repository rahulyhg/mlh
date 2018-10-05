<!-- Request Local Community Branch ::: START -->
<div class="panel panel-success">
  <div class="panel-heading pad2-8">
    <h5><b>Request Local Community Branch</b></h5>
  </div>
  <div class="panel-body">
    <div class="alert alert-success">
      <strong>Note!</strong> Anyone can request for a Local Branch. Here, you are the 
      Member of Community who has permisison to Accept Local Branch.
    </div>
    <div class="form-group">
      <label>Community Name</label>  
      <select id="notifyTesting_reqLocalBranch_communityId" class="form-control">
         <option value="">Select Community Name</option>
      </select>
    </div> 
    <div class="form-group">
      <label>From User Id</label>  
      <select id="notifyTesting_reqLocalBranch_userId" class="form-control">
         <option value="">Select User Id</option>
      </select>
    </div>
    <div class="form-group">
      <label>Country</label>  
      <select id="notifyTesting_reqLocalBranch_country" class="form-control"
        onchange="javascript:selopt_build_state('notifyTesting_reqLocalBranch_country',
                    'notifyTesting_reqLocalBranch_state');">
          <option value="">Select Country</option>
      </select>
    </div>
    <div class="form-group">
      <label>State</label>  
      <select id="notifyTesting_reqLocalBranch_state" class="form-control"
        onchange="javascript:selopt_build_locationOption('notifyTesting_reqLocalBranch_country',
            'notifyTesting_reqLocalBranch_state','notifyTesting_reqLocalBranch_location');">
          <option value="">Select State</option>
      </select>
    </div>
    <div class="form-group">
      <label>Location</label>  
      <select id="notifyTesting_reqLocalBranch_location" class="form-control"
        onchange="javascript:selopt_build_minlocationOption('notifyTesting_reqLocalBranch_country',
            'notifyTesting_reqLocalBranch_state','notifyTesting_reqLocalBranch_location',
            'notifyTesting_reqLocalBranch_locality');">
          <option value="">Select Location</option>
      </select>
   </div>
   <div class="form-group">
     <label>Locality</label>  
     <select id="notifyTesting_reqLocalBranch_locality" class="form-control">
        <option value="">Select Locality</option>
     </select>
   </div>
   <div class="form-group-">
     <button class="btn btn-success pull-right"><b>Send Notification</b></button>
   </div>
 </div>
</div>
<!-- Request Local Community Branch ::: END -->