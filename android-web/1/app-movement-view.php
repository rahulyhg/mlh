<?php session_start();
if(isset($_SESSION["AUTH_USER_ID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once 'templates/api/api_js.php'; ?>
 <title>NewsFeed</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-movement-view-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-movement-view.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <?php include_once 'templates/api/api_params.php'; ?>
 <style>
 .img-min-profilepic { margin-top:4%;margin-bottom:4%;width:70px;height:70px;border-radius: 50%; }
 </style>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	<div id="sidebar-wrapper">
	  <?php include_once 'templates/api/api_sidewrapper.php'; ?>
	</div>
    <div id="page-content-wrapper">
	  <?php include_once 'templates/api/api_header.php'; ?>
	  <div id="app-page-content">
		 <div class="container-fluid" style="padding:5px;">	
			<div class="col-md-12">
				<span class="label custom-bg"><b>TRANSPORTATION / AUTO</b></span>
			</div>

			<div align="center" class="col-xs-12">
				<h4 style="line-height:30px;"><b>Write your Petition Title to raise a Movement</b></h4>
			</div>

			<div class="col-xs-12"><hr/></div>
			
			<div align="right" class="col-xs-12" style="color:#000;">
				By <span class="custom-font"><b>community</b></span> <br/>on 12 December 2018, 08:20 PM IST
			</div>
			
			<div class="col-xs-12"><hr/></div>
			
			<div>
				<img class="col-xs-12" src="https://avaazimages.avaaz.org/27583_27583_eco46_48_original_1_460x230.jpg"/>
			</div>

			<div class="col-xs-12"><hr/></div>
			
			<div align="center" class="col-xs-12">
				<span class="custom-font" style="font-size:20px;"><b>1,23,45,456</b></span>&nbsp;
				<span style="font-size:22px;">PEOPLE</span><br/>
				STANDS BACK IN
				<span class="custom-font" style="font-size:18px;font-weight:bold;">1</span> DAY
			</div>

			<div align="right" class="col-xs-12 mtop15p mbot15p">
				<button class="btn custom-bg"><b>Stand Back</b></button>
			</div>
			
		</div>
<style>
.unselectHzTab { color:#fff; }
.unselectHzTab:hover { color:#000; }
</style>	
<script type="text/javascript">
$(document).ready(function(){ hzTabSelection('movementDescHzTab'); });
function hzTabSelection(id){ 
 var arryHzTab=["movementDescHzTab","movementSupportHzTab"];
 var arryTabDataViewer=["movementDescDisplayDivision","movementSupportDisplayDivision"];
 for(var index=0;index<arryHzTab.length;index++){
 if(arryHzTab[index]===id){
   if(!$("#"+arryHzTab[index]).hasClass('custom-lgt-bg')){ $("#"+arryHzTab[index]).addClass('custom-lgt-bg'); }
   if($("#"+arryHzTab[index]).hasClass('unselectHzTab')){ $("#"+arryHzTab[index]).removeClass('unselectHzTab'); }
   if($("#"+arryTabDataViewer[index]).hasClass('hide-block')){ $("#"+arryTabDataViewer[index]).removeClass('hide-block'); }
   $("#"+arryHzTab[index]).css('border-radius','0px');
   $("#"+arryHzTab[index]).css('background-color',CURRENT_LIGHT_COLOR);
   $("#"+arryHzTab[index]).css('color','#000');
   
  } else {
   if($("#"+arryHzTab[index]).hasClass('custom-lgt-bg')){ $("#"+arryHzTab[index]).removeClass('custom-lgt-bg'); }
   if(!$("#"+arryHzTab[index]).hasClass('unselectHzTab')){ $("#"+arryHzTab[index]).addClass('unselectHzTab'); }
   if(!$("#"+arryTabDataViewer[index]).hasClass('hide-block')){ $("#"+arryTabDataViewer[index]).addClass('hide-block'); }
   $("#"+arryHzTab[index]).css('border-radius','0px');
   $("#"+arryHzTab[index]).css('background-color',CURRENT_DARK_COLOR);
   $("#"+arryHzTab[index]).css('color','#fff');
   
  }
 }
}
</script>
	<div>
		<!--div class="scroller scroller-left col-xs-1 custom-bg" style="height:41px;">
			<i class="glyphicon glyphicon-chevron-left"></i>
		</div-->
			  
		<div class="scrollTabwrapper custom-bg col-xs-12">
			<ul class="nav nav-tabs scrollTablist" style="border-bottom:0px;">
				<li><a id="movementDescHzTab" onclick="javascript:hzTabSelection(this.id);"><b>Description</b></a></li>
				<li><a id="movementSupportHzTab" onclick="javascript:hzTabSelection(this.id);"><b>Supporters</b></a></li>
			</ul>
		</div>
		
		<!--div class="scroller scroller-right col-xs-1 custom-bg" style="height:41px;">
			<i class="glyphicon glyphicon-chevron-right"></i>
		</div-->
	</div>	
			  <div id="movementDescDisplayDivision" class="col-xs-12 hide-block mtop15p">
				<div class="col-xs-12"><b>To<br/>Person Name<br/>Designation</b></div>

				<div align="justify" class="col-xs-12"><br/><i>We've just been hit with a 168-page court subpoena from Monsanto.
					We have only days to respond, and it "commands" us to hand over every private email, note, or record we
					have regarding Monsanto, including the names and email addresses of Avaazers who have signed Monsanto 
					campaigns!! This is big. They're a $50 billion mega-corporation, infamous for legal strong-arm tactics like 
					this. They have unlimited resources. If they get their hands on all our private information, there's 
					no telling what they'll use it for. </i><br/>
				</div>

				<div align="justify" class="col-xs-12"><br/><i>We've just been hit with a 168-page court subpoena from Monsanto.
					We have only days to respond, and it "commands" us to hand over every private email, note, or record we
					have regarding Monsanto, including the names and email addresses of Avaazers who have signed Monsanto 
					campaigns!! This is big. They're a $50 billion mega-corporation, infamous for legal strong-arm tactics like 
					this. They have unlimited resources. If they get their hands on all our private information, there's 
					no telling what they'll use it for. </i><br/>
				</div>

				<div align="center" class="col-xs-12"><br/><b>EXPECTING SOLUTION</b><br/></div>

				<div align="justify" class="col-xs-12"><br/><i>We've just been hit with a 168-page court subpoena from Monsanto.
					We have only days to respond, and it "commands" us to hand over every private email, note, or record we
					have regarding Monsanto, including the names and email addresses of Avaazers who have signed Monsanto 
					campaigns!! This is big. They're a $50 billion mega-corporation, infamous for legal strong-arm tactics like 
					this. They have unlimited resources. If they get their hands on all our private information, there's 
					no telling what they'll use it for. </i><br/>
				</div>

				<div align="right" class="col-xs-12 mtop15p mbot15p">
					<button class="btn custom-bg"><b>Stand Back to Support</b></button>
				</div>
			  </div>
			
			  <div id="movementSupportDisplayDivision" class="col-xs-12 hide-block mtop15p">
				<div class="list-group">
					<div class="list-group-item">
					  <div class="container-fluid pad0">
						<div class="col-xs-5">
							<img class="img-min-profilepic" src="http://192.168.1.4/mlh/android-web/images/avatar/1.jpg"/>
						</div>
						<div class="col-xs-7">QWERT ABCDE ZXCVBNMVHJ</div>
					  </div>
					</div>
				</div>
				  
				<div class="list-group">
					<div class="list-group-item">
					  <div class="container-fluid pad0">
						<div class="col-xs-5">
							<img class="img-min-profilepic" src="http://192.168.1.4/mlh/android-web/images/avatar/1.jpg"/>
						</div>
						<div class="col-xs-7">QWERT ABCDE ZXCVBNMVHJ</div>
					  </div>
					</div>
				</div>
				
			  </div>

		</div>
	  </div>
  </div>
  <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
 </body>
</html>
<?php } else { header("Location:".$_SESSION["PROJECT_URL"]);  } ?>