<?php session_start();
 if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>NewsFeed</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/jquery-ui.css"> 
 <link href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/summernote.css" rel="stylesheet"/>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery-ui.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <?php include_once 'templates/api/api_js.php'; ?>
 <?php include_once 'templates/api/api_params.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-create-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-create.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/summernote.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
<style>
input[type="file"] { visibility:hidden; }
.communityForm-uploadpic { width:100%;height:auto; }
#communityForm_pic_done { display:none; }
</style>
<style>
.writeNewsfeedForm-uploadpic { width:100%;height:auto; }
#writeNewsfeedForm_pic_done { display:none; }
</style>
<style>
.ui-menu { font-size:11px; }
.inviteFrndAsMember-notice { color:#aaa;font-size:11px;margin-bottom:5px; }
.inviteFrndAsMember-item { background-color:#fff;color:#000; }
.inviteFrndAsMember-item:hover { background-color:#436d6c;color:#fff; }
#inviteMemListBtn { display:none; }
</style>
<script type="text/javascript">
var UNION_NAME;
var UNION_ADMINDESIGNATION;
var UNION_PICTURE;
var UNION_INDUSTRY;
var UNION_SUBINDUSTRY;
var UNION_COUNTRY;
var UNION_STATE;
var UNION_LOCATION;
var UNION_LOCALITY;
var UNION_LANG_ENG;
var UNION_LANG_TEL;
var UNION_MEMBERS=[];
var UNION_FIRSTNEWS_TITLE;
var UNION_FIRSTNEWS_PICTURE;
var UNION_FIRSTNEWS_SHORTSUMMARY;
var UNION_FIRSTNEWS_DESC;
</script>
</head>
<body>
<!-- Modal -->
<div id="communityModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body pad0">
        <div class="alert alert-warning alert-dismissible" style="margin-bottom:0px;">
		  <a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
			<span class="lang_english">
		     <div align="center" id="createcomAlert_english_MissingUnionName" class="hide-block">
				<strong>Warning!</strong> Missing Community Name
			 </div>
			 <div align="center" id="createcomAlert_english_MissingDesignation" class="hide-block">
				<strong>Warning!</strong> Missing Your Designation in Community
			 </div>
			 <div align="center" id="createcomAlert_english_MissingProfilePic"  class="hide-block">
				<strong>Warning!</strong> Missing Community Profile Picture
			 </div>
			 <div align="center" id="createcomAlert_english_MissingUnionCategory" class="hide-block">
				<strong>Warning!</strong> Please Choose to which Category, your Community belongs.
			 </div>
			 <div align="center" id="createcomAlert_english_MissingUnionSubCategory" class="hide-block">
				<strong>Warning!</strong> Please Choose to which SubCategory, your Community belongs.
			 </div>
			 <div align="center" id="createcomAlert_english_MissingUnionCountry" class="hide-block">
				<strong>Warning!</strong> Please Choose in which Country, your Community belongs.
			 </div>
			 <div align="center" id="createcomAlert_english_MissingUnionState" class="hide-block">
				<strong>Warning!</strong> Please Choose in which State, your Community belongs.
			 </div>
			 <div align="center" id="createcomAlert_english_MissingUnionLocation" class="hide-block">
				<strong>Warning!</strong> Please Choose in which Location, your Community belongs.
			 </div>
			 <div align="center" id="createcomAlert_english_MissingUnionLocality" class="hide-block">
				<strong>Warning!</strong> Please Choose in which Locality, your Community belongs.
			 </div>
			 <div align="center" id="createcomAlert_english_MissingNewsFeedTitle" class="hide-block">
				<strong>Warning!</strong> Missing NewsFeed Title
			 </div>
			 <div align="center" id="createcomAlert_english_MissingNewsFeedPicture" class="hide-block">
				<strong>Warning!</strong> Missing NewsFeed Picture
			 </div>
			 <div align="center" id="createcomAlert_english_MissingNewsFeedShrtSummary" class="hide-block">
				<strong>Warning!</strong> Missing NewsFeed Short Summary
			 </div>
			 <div align="center" id="createcomAlert_english_MissingNewsFeedDesc" class="hide-block">
				<strong>Warning!</strong> Missing NewsFeed Description
			 </div>
			</span>
		</div>
      </div>
    </div>
  </div>
</div>

 <?php include_once 'templates/api/api_loading.php'; ?>
 <div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	<div id="sidebar-wrapper">
	  <?php include_once 'templates/api/api_sidewrapper.php'; ?>
	</div>
    <div id="page-content-wrapper">
	  <?php include_once 'templates/api/api_header.php'; ?>
	  <div id="app-page-content">
	    <div id="app-page-title" class="list-group pad0">
			<div align="center" class="list-group-item custom-lgt-bg">
		       <span class="lang_english">
				  <i class="fa fa-hands" aria-hidden="true"></i>&nbsp; <b>CREATE A COMMUNITY</b>
			   </span>
			</div>
		</div>
		<div class="container-fluid">
		  <div class="row mbot15p">
		      <div class="col-md-12">
			    <a href="<?php echo $_SESSION["PROJECT_URL"]?>app/mycommunity">
			      <button class="btn custom-bg pull-right"><b>Back</b></button>
				</a>
			  </div>
		  </div>
		  <div class="row">
		    <div class="col-md-12">
			  <!-- Create Community Form ::: Start -->
			  <div class="list-group"> 
				<div id="createCommunity-f1" class="list-group-item" onclick="javascript:createcommunity_form1();">
				   <b>1. Create Community</b>
				</div>
				<div id="createcommunity-form1" class="collapse"><!-- in -->
					<div class="list-group-item">
						<div class="container-fluid">
						<div class="row">
						<span class="lang_english">
						    <div align="center" class="custom-lgt-bg col-md-12 col-xs-12 mtop15p">
							   <h5><b>GENERAL INFORMATION</b></h5>
							</div>
							<!-- Community Name -->
							<div class="col-md-12 col-xs-12 mtop15p">
								<label>Community Name</label>
								<input id="regcom_english_unionName" text="text" class="form-control" 
								placeholder="Enter your Community Name"/>
							</div>

							<!-- Community Designation -->
							<div class="col-md-12 col-xs-12 mtop15p">
							  <label>Your Designation in the Community</label>
							  <input id="regcom_english_unionDesignation" text="text" class="form-control" 
							  placeholder="Enter your Designation"/>
							</div>
							<!-- Community Profile Picture -->
							<div id="community-content-media" class="col-md-12 col-xs-12 mtop15p">
				
							</div>
			
							<div align="center" class="custom-lgt-bg col-md-12 col-xs-12 mtop15p">
							   <h5><b>COMMUNITY CATEGORIES</b></h5>
							</div>
							
							<!-- Choose your Industry -->
							<div class="col-md-12 col-xs-12 mtop15p">
							  <label>Select Industry of Community:</label>
							  <select id="regcom_english_industry" class="form-control" onchange="javascript:build_subcategoryOption();">
								 <option value="">Select Industry</option>
							  </select>
							</div>
							<!-- Choose your SubIndustry -->
							<div class="col-md-12 col-xs-12 mtop15p">
							  <label>Select Sub-Industry of Community:</label>
							  <select id="regcom_english_subindustry" class="form-control" onchange="">
								 <option value="">Select Sub-Industry</option>
							  </select>
							</div>
							<div align="center" class="custom-lgt-bg col-md-12 col-xs-12 mtop15p">
							   <h5><b>COMMUNITY HEADQUARTERS</b></h5>
							</div>
							<!-- Selct your Country -->
							<div class="col-md-12 col-xs-12 mtop15p">
							  <label>Community in which Country:</label>
							  <select id="regcom_english_country" class="form-control" onchange="javascript:build_stateOption();">
								 <option value="">Select your Country</option>
							  </select>
							</div>
        
							<!-- Select your State -->
							<div class="col-md-12 col-xs-12 mtop15p">
							  <label>Community in which State:</label>
							  <select id="regcom_english_state" class="form-control" onchange="javascript:build_locationOption();">
								 <option value="">Select your State</option>
							  </select>
							</div>
				
							<!-- Select your Location -->
							<div class="col-md-12 col-xs-12 mtop15p">
							  <label>Community in which location:</label>
							  <select id="regcom_english_location" class="form-control" onchange="javascript:build_minlocationOption();">
								 <option value="">Select your location</option>
							  </select>
							</div>
							
							<!-- Select your Locality -->
							<div class="col-md-12 col-xs-12 mtop15p">
							  <label>Community in which locality:</label>
							  <select id="regcom_english_locality" class="form-control"> 
								  <option value="">Select your locality</option>
							  </select>
							</div>
							
							<div align="center" class="custom-lgt-bg col-md-12 col-xs-12 mtop15p">
							   <h5><b>COMMUNITY OFFICIAL LANGUAGES</b></h5>
							</div>
							
							<!-- Community Official Languages -->
							<div class="col-md-12 col-xs-12 mtop15p">
							  <!--label>Community Official Languages</label-->
							  <div class="col-md-12 col-xs-12 m1">
								<input type="checkbox" id="regcom_english_offlang_eng" value="eng"/>  <!-- Database - value -->
								<span class="curpoint" onclick="javascript:sel_offlang_eng();"> &nbsp; English </span>
							  </div>
							  <div class="col-md-12 col-xs-12 m1">
								<input type="checkbox" id="regcom_english_offlang_tel" value="tel"/> 
								<span class="curpoint" onclick="javascript:sel_offlang_tel();">&nbsp; Telugu </span><!-- Database - value -->
							  </div>
							</div>
							<!-- Create Community Button -->
							<div class="col-md-12 col-xs-12 mtop15p">
							  <button align="center" class="form-control btn custom-bg white-font mtb" 
							   onclick="javascript:create_community();">
								 <b>Create Community</b>
							  </button>
							</div>
						</span>
						</div>
						</div>
					</div>
				</div>
				<div id="createCommunity-f2" class="list-group-item" onclick="javascript:createcommunity_form2();">
				   <b>2. Add Members</b>
				</div>
				<div id="createcommunity-form2" class="collapse">
					<div class="list-group-item">
					   <div align="center">
					     Invite your Friends to join your Community.
					   </div>
					   <div>
						 <div class="inviteFrndAsMember-notice">Type Alphabet and Select your Member</div>
						 <input type="text" id="inviteFrndAsMember" class="form-control" placeholder="(+) Add Member"/>
					     <div id="inviteMemList" class="list-group mtop15p"></div>
					     <div>
						   <button id="inviteMemListBtn" class="btn custom-bg white-font form-control" 
						    onclick="javascript:inviteFrndAsMember_doneListing();"><b>Inviting People Done</b></button>
					     </div>
					   </div>
					</div>
				</div>
				<div id="createCommunity-f3" class="list-group-item" onclick="javascript:createcommunity_form3();">
				   <b>3. Write your First NewsFeed</b>
				</div>
				<div id="createcommunity-form3" class="collapse">
					<div class="list-group-item">
						<!-- NewsFeed Title -->
						<div class="mtop15p">
						  <label>NewsFeed Title</label>
						  <input type="text" id="firstNewsFeed_artTitle" class="form-control" placeholder="Enter NewsFeed Title"/>
						</div>
						
						<!-- NewsFeed Image -->
						<div id="newsFeedForm-content-media" class="mtop15p"></div>
						<!-- NewsFeed Short Summary -->
						<div class="mtop15p">
						  <label>NewsFeed Short Summary</label>
						  <textarea id="firstNewsFeed_artShortSummary" class="form-control" placeholder="Say Short Summary"></textarea>
						</div>
						
						<!-- NewsFeed Description -->
						<div class="mtop15p">
						  <label>Describe News</label>
						  <div id="firstNewsFeed_articleDesc" class="summernote"></div>
						</div>
						
						<div class="mtop15p">
						  <button class="btn form-control custom-bg" onclick="javascript:create_firstNewsFeed();"><b>Post NewsFeed</b></button>
						</div>
					</div>
				</div>
				<div id="createCommunity-f4" class="list-group-item" onclick="javascript:createcommunity_form4();">
				   <b>4. Finish</b>
				</div>
				<div id="createcommunity-form4" class="collapse">
					<div class="list-group-item">
					 
					</div>
				</div>
			  </div>
			  <!-- Create Community Form ::: End -->
			</div>
		  </div>
		</div>
	   </div>
	 </div>
 </div>
</body>
</html>
<?php }?>