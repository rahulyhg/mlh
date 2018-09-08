<!-- Settings ::: START -->
<div class="panel panel-danger">
  <div class="panel-heading pad2-8">
    <h5><b>Settings</b></h5>
  </div>
  <div class="panel-body"> 
    <div class="alert alert-danger">
       <strong>Note!</strong> Now I am this User.
    </div>
    <div class="form-group">
       <label>User Id</label>  
       <select id="notifyTesting_my_userId" class="form-control">
          <option value="">Select User Id</option>
       </select>
    </div>
    <div id="settings_userInfoBtn" class="form-group hide-block">
       <button class="btn btn-default form-control" onclick="javascript:redirectURL_userInformation();"><b>User Information</b></button>
     </div>
    <div class="form-group mtop15p">
      <div class="btn-group pull-right">
         <button class="btn btn-success" onclick="javascript:notify_myUserId_fix();"><b>Fix</b></button>
         <button class="btn btn-danger" onclick="javascript:notify_myUserId_release();"><b>Release</b></button>
      </div>
    </div>
     
    </div>
  </div>
<!-- Settings ::: END -->