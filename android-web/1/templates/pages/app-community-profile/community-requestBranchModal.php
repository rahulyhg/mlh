<script type="text/javascript">
function invoke_requestBranchModal(){
$('#requestBranchModal').modal();
build_countryOption('requestBranchModal_'+USR_LANG+'_country');
}
function reset_requestBranchModalForm(){
  document.getElementById("requestBranchModal_"+USR_LANG+"_country").innerHTML='<option value="">Select your Country</option>';
  document.getElementById("requestBranchModal_"+USR_LANG+"_state").innerHTML='<option value="">Select your State</option>';
  document.getElementById("requestBranchModal_"+USR_LANG+"_location").innerHTML='<option value="">Select your Location</option>';
  document.getElementById("requestBranchModal_"+USR_LANG+"_locality").innerHTML='<option value="">Select your Locality</option>';
}
function load_requestBranchModalForm_state(){
 build_stateOption('requestBranchModal_'+USR_LANG+'_country','requestBranchModal_'+USR_LANG+'_state');
}
function load_requestBranchModalForm_location(){
 build_locationOption('requestBranchModal_'+USR_LANG+'_country','requestBranchModal_'+USR_LANG+'_state',
					  'requestBranchModal_'+USR_LANG+'_location');
}
function load_requestBranchModalForm_locality(){
 build_minlocationOption('requestBranchModal_'+USR_LANG+'_country','requestBranchModal_'+USR_LANG+'_state',
						 'requestBranchModal_'+USR_LANG+'_location','requestBranchModal_'+USR_LANG+'_locality');
}
function submit_requestBranchModalForm(){
var country = document.getElementById("requestBranchModal_"+USR_LANG+"_country").value;
var state =  document.getElementById("requestBranchModal_"+USR_LANG+"_state").value;
var location = document.getElementById("requestBranchModal_"+USR_LANG+"_location").value;
var locality = document.getElementById("requestBranchModal_"+USR_LANG+"_locality").value;
var message = document.getElementById("requestBranchModal_"+USR_LANG+"_message").value;
var shareDetails = document.getElementById("requestBranchModal_"+USR_LANG+"_shareDetails").checked;
if(country.length>0){
if(state.length>0){
if(location.length>0){
if(locality.length>0){
 if(shareDetails) {
   $('#requestBranchModal').modal('hide');
   alert_display_success('S006','#');
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.branch.php',
  { action:'CREATE_DATA_REQUESTLOCALBRANCH', union_Id:UNION_ID, minlocation: locality, location: location,
  state: state, country: country, reqMessage: message, user_Id: AUTH_USER_ID },function(response){
    console.log(response);
	reset_requestBranchModalForm();
  });
 } else {
    div_display_warning('alert_requestBranchForm','W040');
 }
} else { div_display_warning('alert_requestBranchForm','W010'); }  // locality
} else { div_display_warning('alert_requestBranchForm','W009'); } // location
} else { div_display_warning('alert_requestBranchForm','W008'); }  // state
} else { div_display_warning('alert_requestBranchForm','W007'); }  // country
}
</script>

<div id="requestBranchModal" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-body">

<div class="container-fluid mbot15p pad0">

<div class="col-xs-12">
 <button type="button" class="close" data-dismiss="modal">&times;</button>
<h5 style="text-transform:uppercase;"><b>Request a Local Branch</b></h5><hr/>
</div>

<div class="col-xs-12">
<div id="alert_requestBranchForm" class="form-group">
</div>
</div>

<div class="col-xs-12">
<div class="form-group">
<label>Country&nbsp;<span class="font-red">*</span></label>
<select id="requestBranchModal_english_country" class="form-control" 
onchange="javascript:load_requestBranchModalForm_state();">
<option value="">Select your Country</option>
</select>
</div>
</div>

<div class="col-xs-12">
<div class="form-group">
<label>State&nbsp;<span class="font-red">*</span></label>
<select id="requestBranchModal_english_state" class="form-control" 
onchange="javascript:load_requestBranchModalForm_location();">
<option value="">Select your State</option>
</select>
</div>
</div>

<div class="col-xs-12">
<div class="form-group">
<label>Location&nbsp;<span class="font-red">*</span></label>
<select id="requestBranchModal_english_location" class="form-control"
onchange="javascript:load_requestBranchModalForm_locality();">
<option value="">Select your Location</option>
</select>
</div>
</div>

<div class="col-xs-12">
<div class="form-group">
<label>Locality&nbsp;<span class="font-red">*</span></label>
<select id="requestBranchModal_english_locality" class="form-control">
<option value="">Select your Locality</option>
</select>
</div>
</div>
 
<div class="col-xs-12">
<div class="form-group">
<label>Message</label>
<textarea id="requestBranchModal_english_message" class="form-control" placeholder="Enter your Message"></textarea>
</div>
</div>

<div class="col-xs-12 mtop15p mbot15p">
<div class="col-xs-9 pad0">
<label>Share your details to Owner of the Community to contact you</label>
</div>

<div class="col-xs-2">
<input id="requestBranchModal_english_shareDetails" type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No">
</div>

</div>

<div class="col-xs-12">
<button class="btn btn-primary form-control" onclick="javascript:submit_requestBranchModalForm();"><b>Request Local Branch</b></button>
</div>

</div>

</div>
</div>
</div>
</div>
