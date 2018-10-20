<script type="text/javascript">
var AUTOCOMPLETE_COURSE_ID;
var AUTOCOMPLETE_COURSE_NAME;
var AUTOCOMPLETE_COURSE_DURATION;
var AUTOCOMPLETE_COURSE_BEGMONTH;
var AUTOCOMPLETE_COURSE_ENDMONTH;
function load_data_institutionBoard(){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
 { action:'GET_DATA_INSTITUTIONBOARDBYID', institutionId:INSTITUTION_ID },function(institutionBoard){ 
    INSTITUTION_BOARD=institutionBoard;
	console.log(INSTITUTION_BOARD);
	stopAppProgressLoader();
    if($('#app-profile-body').hasClass('hide-block')){ $('#app-profile-body').removeClass('hide-block'); }
 });
}
function viewAddCourseModal(){
 $('#institutionCourseFormModal').modal();
 /* Autocomplete */
 var options = { url: function(phrase) {
    var url=PROJECT_URL+"backend/php/dac/controller.module.app.socialhub.classmateportal.php?";
     url+="action=GET_AUTOCOMPLETE_COURSES&searchQuery="+phrase;
    return url;
  }, getValue: "courseName",
    list: { 
	onSelectItemEvent: function() { 
	   AUTOCOMPLETE_COURSE_ID = $("#institution_addCourseName").getSelectedItemData().cmp_course_Id;
	   AUTOCOMPLETE_COURSE_NAME = $("#institution_addCourseName").getSelectedItemData().courseName;
	   AUTOCOMPLETE_COURSE_DURATION = $("#institution_addCourseName").getSelectedItemData().duration;
	   AUTOCOMPLETE_COURSE_BEGMONTH = $("#institution_addCourseName").getSelectedItemData().begMonth;
	   AUTOCOMPLETE_COURSE_ENDMONTH = $("#institution_addCourseName").getSelectedItemData().endMonth;
	   $('#institution_addCourseDuration').val(AUTOCOMPLETE_COURSE_DURATION);
	   $('#institution_addCourseStarts').val(AUTOCOMPLETE_COURSE_BEGMONTH);
	   $('#institution_addCourseEnds').val(AUTOCOMPLETE_COURSE_ENDMONTH);
	   disabled_courseForm();
	},
	match: { enabled: true },maxNumberOfElements: 10 },
    template: { type: "custom",
				method: function(value, item) { 
				var content='<div class="container-fluid">';
					content+='<div class="row">';
					content+='<div class="col-xs-8">';
					content+='<div>'+value+'</div>';
					content+='<div style="color:#aaa;"><i>'+item.begMonth+'-'+item.endMonth+'</i></div>';
					content+='</div>';
					content+='<div class="col-xs-4">';
					content+='<div  class="pull-right"><b>Duration</b></div>';
					if(item.duration.toString()==='1'){
					  content+='<div style="color:#aaa;" class="pull-right">1 year</div>';
					} else {
					  content+='<div style="color:#aaa;" class="pull-right">'+item.duration+' years</div>';
					}
					content+='</div>'; 
					content+='</div>';
					content+='</div>';
				return content; } } 
 };
$("#institution_addCourseName").easyAutocomplete(options);
$(".easy-autocomplete").css('width','100%');
}
function disabled_courseForm(){
 document.getElementById("institution_addCourseName").disabled=true;
 document.getElementById("institution_addCourseDuration").disabled=true;
 document.getElementById("institution_addCourseStarts").disabled=true;
 document.getElementById("institution_addCourseEnds").disabled=true;
}
function enabled_courseForm(){
 AUTOCOMPLETE_COURSE_ID = undefined;
 AUTOCOMPLETE_COURSE_NAME = undefined;
 AUTOCOMPLETE_COURSE_DURATION = undefined;
 AUTOCOMPLETE_COURSE_BEGMONTH = undefined;
 AUTOCOMPLETE_COURSE_ENDMONTH = undefined;
 $("#institution_addCourseName").val('');
 $("#institution_addCourseDuration").val('');
 $("#institution_addCourseStarts").val('');
 $("#institution_addCourseEnds").val('');
 document.getElementById("institution_addCourseName").disabled=false;
 document.getElementById("institution_addCourseDuration").disabled=false;
 document.getElementById("institution_addCourseStarts").disabled=false;
 document.getElementById("institution_addCourseEnds").disabled=false;
}
function addCourse(){
 console.log("courseId: "+AUTOCOMPLETE_COURSE_ID);
 var courseName = document.getElementById("institution_addCourseName").value;
 var courseDuration = document.getElementById("institution_addCourseDuration").value;
 var courseStarts = document.getElementById("institution_addCourseStarts").value;
 var courseEnds = document.getElementById("institution_addCourseEnds").value;

 if(AUTOCOMPLETE_COURSE_ID===undefined){ AUTOCOMPLETE_COURSE_ID=cmp_uni_courses_Id(); }
 
 if(courseName.length>0){
 if(courseDuration.length>0){
 if(courseStarts.length>0){
 if(courseEnds.length>0){
  $('#institutionCourseFormModal').modal('hide');
  alert_display_success('S004','#');
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
  { action:'CREATE_COURSE', course_Id: AUTOCOMPLETE_COURSE_ID, courseName:courseName, institution_Id:INSTITUTION_ID, 
    institutionType:'', duration:courseDuration, 
    begMonth:courseStarts, endMonth:courseEnds },function(response){
    console.log(response); 
   });
 } else  {  div_display_warning('errSuccessMessages','W034'); }
 } else  {  div_display_warning('errSuccessMessages','W033'); }
 } else  {  div_display_warning('errSuccessMessages','W032'); }
 } else  {  div_display_warning('errSuccessMessages','W031'); }
}

</script>
<div id="institutionCourseFormModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
	    <h4 class="modal-title"><b>Add Course</b></h4>
      </div>
      <div class="modal-body">
	    <div class="container-fluid">
		
		  <div class="row">
		    <div class="col-xs-12">
			  <div id="errSuccessMessages" class="form-group">
			  </div>
			</div>
		  </div>

		  <div class="row">
		    <div class="col-xs-12">
			  <div class="form-group">
				<label>Course Name</label>
				<input id="institution_addCourseName" type="text" class="form-control" 
				placeholder="Enter Course Name"/>
			  </div>
			</div>
		  </div>
		
		  <div class="row">
		    <div class="col-xs-12">
			  <div class="form-group">
				  <label>Course Duration</label>
				  <select id="institution_addCourseDuration" class="form-control">
					<option value="">Select Course Duration</option>
					<option value="1">1 year</option>
					<option value="2">2 years</option>
					<option value="3">3 years</option>
					<option value="4">4 years</option>
					<option value="5">5 years</option>
					<option value="6">6 years</option>
					<option value="7">7 years</option>
					<option value="8">8 years</option>
					<option value="9">9 years</option>
				  </select>
			  </div>
			</div>
		</div>
		
		<div class="row">
		    <div class="col-xs-6">
				<div class="form-group">
				  <div class="row"></div>
				  <label>Start in Month</label>
				  <select id="institution_addCourseStarts" class="form-control">
					<option value="">Select Month</option>
					<option value="January">January</option>
					<option value="Februrary">February</option>
					<option value="March">March</option>
					<option value="April">April</option>
					<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="December">December</option>
				  </select>
				</div>
		    </div>
			 <div class="col-xs-6">
				<div class="form-group">
				  <div class="row"></div>
				  <label>Ends in Month</label>
				  <select id="institution_addCourseEnds" class="form-control">
					<option value="">Select Month</option>
					<option value="January">January</option>
					<option value="Februrary">February</option>
					<option value="March">March</option>
					<option value="April">April</option>
					<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="December">December</option>
				  </select>
				</div>
		    </div>
		</div>
		
		<div class="row">
		    <div align="center" class="col-xs-12"> 
		      <div class="form-group">
			    <div class="btn-group">
			     <button class="btn custom-bg" onclick="addCourse();"><b>Add Course</b></button>
			     <button class="btn btn-default custom-font" onclick="enabled_courseForm();"><b>Reset</b></button>
				</div>
			 </div>
			</div>
		 </div>
		 
	    </div>
      </div>
    </div>
  </div>
 </div>
 