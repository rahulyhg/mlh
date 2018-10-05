<!-- Accepted User Request ::: START -->
<div class="panel panel-success">
  <div class="panel-heading pad2-8">
    <h5><b>Accepted User Request</b></h5>
  </div>
  <div class="panel-body">
    <div class="alert alert-success">
      <strong>Note!</strong> If User accepts your request or you accepts somebody requests, 
      Notification is popup to both of you as You are being Friends.
    </div>
    <div class="form-group">
       <label>From User Id</label>  
       <select id="notifyTesting_acceptFrndRequest_userId" class="form-control">
          <option value="">Select User Id</option>
       </select>
    </div>
    <div class="form-group-">
      <button class="btn btn-success pull-right" 
        onclick="javascript:notify_acceptFrndRequest_sendNotification();"><b>Send Notification</b></button>
    </div>
  </div>
</div>
<!-- Accepted User Request ::: END -->