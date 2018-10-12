<div class="row">
 <div class="custom-bg col-xs-12">
  <div align="center" class="mtop15p padbot15"><b>Choose Community Profile Picture</b></div>
  <div id="community-content-media" align="center" class="mbot35p"></div>
 </div>
</div>

<div class="row">
<div class="col-xs-12 mtop15p">
<div class="form-group">
 <h5><b>General Information</b><hr/></h5>
</div>
<div class="form-group">
 <label>Community Name&nbsp;<span class="font-red">*</span></label>
 <input type="text" class="form-control" id="add_english_unionName" placeholder="Enter your Community Name">
</div>
		   
<div class="form-group">
 <label>Choose a Category&nbsp;<span class="font-red">*</span></label>
 <select class="form-control" id="add_english_category" 
   onchange="javascript:build_subcategoryOption('add_english_category','add_english_subcategory');">
  <option value="">Select your Category</option>
 </select>
</div>
		   
<div class="form-group">
  <label>Choose a Sub-Category&nbsp;<span class="font-red">*</span></label>
  <select class="form-control" id="add_english_subcategory">
	<option value="">Select your Sub-Category</option>
  </select>
</div>
		   
<div class="form-group">
  <label>About Community&nbsp;<span class="font-red">*</span></label>
  <textarea class="form-control" id="add_english_aboutUnion" placeholder="Mention description about Community"
			    style="height:250px;"></textarea>
</div>

</div>
</div>
<div class="row">
<div class="col-xs-12 mtop15p">

<div class="form-group">
 <h5><b>Administrator Details</b><hr/></h5>
</div>

 
<div align="center" id="add_english_administratorprofilepic" class="form-group">
 
</div>
<div class="form-group">
 <label>Name</label>
 <div class="list-group">
 <div id="add_english_administratorName" class="list-group-item">
 
 </div>
 </div>
</div>

<div class="form-group">
 <label>My Designation in the Community&nbsp;<span class="font-red">*</span></label>
 <input type="text" class="form-control" id="add_english_mydesignation" placeholder="Enter your Designation Title">
</div>

</div>
</div>
<div class="row">
<div class="col-xs-12 mtop15p">

<div class="form-group">
 <h5><b>Community Objectives</b><hr/></h5>
</div>	
	   
<div class="form-group">
 <div class="col-xs-1 padtop5"><b>1&nbsp;<span class="font-red">*</span></b></div>
 <div class="col-xs-11">
   <input type="text" id="add_english_issue01" class="form-control mbot15p" placeholder="Enter Objective"/>
 </div>
</div>   

<div class="form-group">
 <div class="col-xs-1 padtop5"><b>2&nbsp;<span class="font-red">*</span></b></div>
 <div class="col-xs-11">
   <input type="text" id="add_english_issue02" class="form-control mbot15p" placeholder="Enter Objective"/>
 </div>
</div>  

<div class="form-group">
 <div class="col-xs-1 padtop5"><b>3&nbsp;<span class="font-red">*</span></b></div>
 <div class="col-xs-11">
   <input type="text" id="add_english_issue03" class="form-control mbot15p" placeholder="Enter Objective"/>
 </div>
</div> 

<div class="form-group">
 <div class="col-xs-1 padtop5"><b>4&nbsp;</b></div>
 <div class="col-xs-11">
   <input type="text" id="add_english_issue04" class="form-control mbot15p" placeholder="Enter Objective"/>
 </div>
</div> 

<div class="form-group">
 <div class="col-xs-1 padtop5"><b>5&nbsp;</b></div>
 <div class="col-xs-11">
   <input type="text" id="add_english_issue05" class="form-control mbot15p" placeholder="Enter Objective"/>
 </div>
</div> 

<div class="form-group">
 <div class="col-xs-1 padtop5"><b>6&nbsp;</b></div>
 <div class="col-xs-11">
   <input type="text" id="add_english_issue06" class="form-control mbot15p" placeholder="Enter Objective"/>
 </div>
</div> 

<div class="form-group">
 <div class="col-xs-1 padtop5"><b>7&nbsp;</b></div>
 <div class="col-xs-11">
   <input type="text" id="add_english_issue07" class="form-control mbot15p" placeholder="Enter Objective"/>
 </div>
</div> 

<div class="form-group">
 <div class="col-xs-1 padtop5"><b>8&nbsp;</b></div>
 <div class="col-xs-11">
   <input type="text" id="add_english_issue08" class="form-control mbot15p" placeholder="Enter Objective"/>
 </div>
</div> 

<div class="form-group">
 <div class="col-xs-1 padtop5"><b>9&nbsp;</b></div>
 <div class="col-xs-11">
   <input type="text" id="add_english_issue09" class="form-control mbot15p" placeholder="Enter Objective"/>
 </div>
</div> 

<div class="form-group">
 <div class="col-xs-1 padtop5"><b>10&nbsp;</b></div>
 <div class="col-xs-11">
   <input type="text" id="add_english_issue10" class="form-control mbot15p" placeholder="Enter Objective"/>
 </div>
</div> 

<div class="form-group">
  <button class="btn custom-bg form-control" onclick="javascript:set_data_communityProfile();">
  <span class="f14"><b>Next</b></span></button>
</div>
		   
</div>
</div>