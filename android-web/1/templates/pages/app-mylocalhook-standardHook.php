<style>
#stndHook-content-general,#stndHook-content-media,
#stndHook-content-polls,#stndHook-content-people,#stndHook-content-finish { display:none; }
input[type="file"] { visibility:hidden; }
#standardHookForm_pic_done { display:none; }
</style>
<script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-hook-standard.js"></script>

<div id="standardHook">  
<div class="list-group">
<div class="list-group-item hook-panel">
		   
<div class="container-fluid pad-left0"> <!-- container-fluid :: Start -->

  <div class="col-md-12 hook-inputField">
   <ul class="nav nav-pills">
	 <li><a data-toggle="tooltip" title="General" id="hookpillTabs-general" href="#" onclick="javascript:enabled_standardHookForm_tabs_general(this.id);" 
	   class="pill-sp-active"><i class="fa fa-1x fa-list-alt"></i><span class="hookpillTabsTxt">&nbsp;&nbsp;General</span></a>
	 </li>
	 <li><a data-toggle="tooltip" title="Media" id="hookpillTabs-media" href="#" onclick="javascript:enabled_standardHookForm_tabs_media(this.id);" 
	   class="pill-sp"><i class="fa fa-1x fa-file-image-o"></i><span class="hookpillTabsTxt">&nbsp;&nbsp;Media</span></a>
	 </li>
	 <li><a data-toggle="tooltip" title="Polls" id="hookpillTabs-polls" href="#" onclick="javascript:enabled_standardHookForm_tabs_polls(this.id);" 
	   class="pill-sp"><i class="fa fa-1x fa-bar-chart"></i><span class="hookpillTabsTxt">&nbsp;&nbsp;Polls</span></a>
	 </li>
	 <li><a data-toggle="tooltip" title="People" id="hookpillTabs-people" href="#" onclick="javascript:enabled_standardHookForm_tabs_people(this.id);" 
	   class="pill-sp"><i class="fa fa-1x fa-user"></i><span class="hookpillTabsTxt">&nbsp;&nbsp;People</span></a>
	 </li>
	 <li><a data-toggle="tooltip" title="Finish" id="hookpillTabs-finish" href="#" onclick="javascript:enabled_standardHookForm_tabs_finish(this.id);" 
	   class="pill-sp"><i class="fa fa-1x fa-thumbs-up"></i><span class="hookpillTabsTxt">&nbsp;&nbsp;Finish</span></a>
	 </li>
   </ul>
  </div>
  
  <!-- STANDARDHOOKFORM - GENERAL -->
  <div id="stndHook-content-general"> 
  <!-- Start -->
  <!-- GENERAL -ALERTS -->  
    <div id="stndHook-alert-general" class="col-md-12 hook-inputField hide-block">
	  <div class="alert custom-lgt-bg alert-dismissable" style="margin-bottom:0px;">
		<a href="#" class="close" aria-label="close" onclick="set_StandardHookForm_alert('stndHook-alert-general', 'hide');">&times;</a>
			<span class="lang_english">
			  <div id="stndHook-english-alert-hookTitle" class="hide-block">
			    <strong>Warning!</strong> Please Enter Hook Title.
			  </div>
			  <div id="stndHook-english-alert-hookDesc" class="hide-block">
			    <strong>Warning!</strong> Please Enter Hook Description.
			  </div>
			</span>
	  </div>
	</div>

    <!-- Title Hook -->
    <div class="col-md-12 hook-inputField">
	   <input id="standardHookForm_titleHook" type="text" class="form-control" placeholder="Enter Hook Title"/>
    </div>
	<!-- Hook Description -->			 
    <div class="col-md-12 hook-inputField">
	  <textarea id="standardHookForm_hookdesc" class="form-control" placeholder="Enter Hook Description"></textarea>
    </div>
	
	<div align="center" class="col-md-12 hook-inputField">
	   <div class="btn-group">
	    <button class="btn custom-bg" onclick="javascript:store_StandardHookForm_general();"><b>Next</b></button>
		<button class="btn custom-lgt-bg" onclick="javascript:store_StandardHookForm_reset();"><b>Reset</b></button>
	   </div>
    </div>
  <!-- End -->
  </div>
  
  <!-- STANDARDHOOKFORM - MEDIA -->
  <div id="stndHook-content-media">
  <!-- Start -->
    <!-- Upload Picture -->
    <div align="center" class="col-md-12 hook-inputField">
	   <input type="file" id="standardHookForm_fileElem" accept="image/*" onchange="handleFiles(this.id,'standardHookForm_div_cropping','standardHookForm-img-crop',this.files,'standardHookForm_fileSelect','standardHookForm_pic_done',150,50,175,75,'square')">
	   <img id="standardHookForm_fileSelect" class="hook-uploadpic" 
	   src="<?php if(isset($_SESSION["PROJECT_URL"])) { echo $_SESSION["PROJECT_URL"]; } ?>images/textures/upload900x300.png" onclick="javascript:imgClick('standardHookForm_fileElem');"/>
       <div id="standardHookForm-img-crop" class="mtop15px"></div>
	   <div id="standardHookForm_div_cropping" align="center"></div>
	   <div align="center" class="btn-group mtop15px">
		 <button id="standardHookForm_pic_done" align="center" class="btn custom-bg" onclick="javascript:store_StandardHookForm_media();"><b>Next</b></button>
		 <button align="center" class="btn custom-lgt-bg" onclick="javascript:store_StandardHookForm_mediaSkip();"><b>Skip</b></button>
	   </div>
	</div>
  <!-- End -->
  </div>
  <!-- STANDARDHOOKFORM - POLLS -->
  <div id="stndHook-content-polls">
  <!-- Start -->
    <!-- Ask Question -->
    <div class="col-md-8 hook-inputField">
	   <textarea id="standardHookForm_askQuestion" class="form-control" placeholder="Ask a Question"></textarea>
    </div>
	<!-- PollType -->
    <div class="col-md-4 hook-inputField">
	     <label>User to Choose</label>
	    <input id="standardHookForm_polltype" type="checkbox" class="form-control" data-width="160px" 
	     data-toggle="toggle"  data-onstyle="custom-lgt-bg" data-offstyle="custom-lgt-bg"
	     data-on="Only One" data-off="Many" checked onchange="javascript:set_stndHookForm_polltype();"/>
    </div>
    <!-- Options -->
	<div class="col-md-12 hook-inputField">
	<!-- Start -->
	  <div class="row">
	     <!-- Dynamic Option Generate -->
	     <div class="col-md-8">
			<ul id="stndHook-div-polloptions" style="list-style-type:none;padding:0px;">
			  <li><input type="text" class="form-control" placeholder="option-1"/></li>
			  <li><input type="text" class="form-control" placeholder="option-2"/></li>
			</ul>
		 </div>
	     <!-- Dynamic Option Generate Button --> 
		 <div class="col-md-4">
		    <button class="btn custom-bg form-control f12" onclick="javascript:set_stndHookForm_pollOptExtension();"><b>Add Option</b></button>
		 </div>
	 </div>
	<!-- End -->
	</div>
	
	<div align="center" class="col-md-12 hook-inputField">
	  <div class="btn-group">
	    <button class="btn custom-bg" onclick="javascript:store_StandardHookForm_pollnext();"><b>Next</b></button>
		<button class="btn custom-lgt-bg" onclick="javascript:store_StandardHookForm_pollskip();"><b>Skip</b></button>
	  </div>
	</div>
  <!-- End -->
  </div>
  
  <div id="stndHook-content-people">
  <!-- Start -->
     <div class="col-md-12 hook-inputField">
        <input id="standardHookForm-frndsInfo" type="checkbox" class="form-control" data-width="150px" 
	     data-toggle="toggle"  data-onstyle="custom-lgt-bg" data-offstyle="custom-lgt-bg"
	     data-on="All Friends" data-off="Selected Friends" checked onchange="javascript:set_stndHookForm_frndTagInfo();"/>
     </div>

     <div id="stndHook-FrndtagDivision" class="hide-block col-md-12 hook-inputField">
	   <input type="text" class="form-control" placeholder="(+) Tag Friends" onkeypress="javascript:"/>
     </div>
					 
     <div align="center" class="col-md-12 hook-inputField">
	   <div class="btn-group">
         <button class="btn custom-bg" onclick="javascript:store_StandardHookForm_peopleNext();"><b>Next</b></button>
		 <button class="btn custom-lgt-bg" onclick="javascript:store_StandardHookForm_peopleReset();"><b>Reset</b></button>
	   </div>
     </div>
  <!-- End -->   
  </div>
  
  <div id="stndHook-content-finish">
     <button class="btn custom-bg" onclick="javascript:store_StandardHookForm();"><b>Finish</b></button>
  </div>
					 
  
		 
 
					 
</div> <!-- container-fluid :: End -->
</div>
</div>
</div>
			