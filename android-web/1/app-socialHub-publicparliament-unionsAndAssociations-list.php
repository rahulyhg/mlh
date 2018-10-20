<?php session_start();
include_once 'templates/api/api_params.php';
if(isset($_SESSION["AUTH_USER_ID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Social Hub - Home</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"/> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/jquery-ui.css"/> 
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/core-skeleton.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery-ui.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <?php include_once 'templates/api/api_js.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-socialhub-publicparliament-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <!--link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script-->
<script type="text/javascript">
var DOMAIN_ID='<?php if(isset($_GET["1"])){ echo $_GET["1"]; } ?>';
var SUBDOMAIN_ID='<?php if(isset($_GET["2"])){ echo $_GET["2"]; } ?>';
$(document).ready(function(){
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
 get_count_CommunitiesByCategories();
});
function get_count_CommunitiesByCategories(){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.php',
  { action:'GET_COUNT_PROFESSIONALCOMMUNITYBYCATEGORIES', domain_Id:DOMAIN_ID, subdomain_Id:SUBDOMAIN_ID }, 
  function(response){
   response=JSON.parse(response);
   var domainName=response[0].domainName;
   var subdomainName=response[0].subdomainName;
   var total_data=parseInt(response[0].total_data);
   console.log(domainName+" "+subdomainName+" "+total_data);
   var content='<div class="list-group" style="margin-bottom:0px;">';
       content+='<div class="list-group-item" style="background-color:#f8f8f8;">';
       content+='<h5><b>'+domainName+' - '+subdomainName+'</b></h5>';
       content+='</div>';
       content+='</div>';
   document.getElementById("div_unionsAndAssociationsTitle").innerHTML=content;
  if(total_data>0){
    var datacontent='<div align="left" class="mbot15p" style="font-size:12px;">';
        datacontent+='<span style="color:#808080;"><b>Your Search Results:</b></span>';
	    datacontent+='<span style="color:#e72e10"><b>1 Community Found</b></span>';
        datacontent+='</div>';
    document.getElementById("div_count_unionsAndAssociations").innerHTML=datacontent;
    scroll_loadInitializer('div_data_unionsAndAssociations',10,getListOfCommunitiesByCategoriesContentData,total_data);
  } else {
    var datacontent='<div align="center">';
	    datacontent+='<span style="color:#ccc;">No Community is found</span>';
	    datacontent+='</div>';
     document.getElementById("div_data_unionsAndAssociations0").innerHTML=datacontent;
  }
  });
}
function getListOfCommunitiesByCategoriesContentData(div_view, appendContent,limit_start,limit_end){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.community.professional.php',
{ action:'GET_DATA_PROFESSIONALCOMMUNITYBYCATEGORIES', domain_Id:DOMAIN_ID, subdomain_Id:SUBDOMAIN_ID, 
limit_start:limit_start, limit_end:limit_end}, function(response){
console.log(response);
response=JSON.parse(response);
var content='';
for(var index=0;index<response.length;index++){
 var unionName=response[index].unionName;
 var profile_pic=response[index].profile_pic;
 var branches=response[index].branches;
 var members=response[index].members;
 var subscribers=response[index].subscribers;
 content+='<div class="container-fluid">';
 content+='<div class="row">';
 content+='<div class="col-xs-12 mtop15p">';
 content+='<div class="list-group">';
 content+='<div class="list-group-item pad0">';
 content+='<div align="center" class="container-fluid">';
 content+='<div class="row">';
 content+='<div class="col-xs-6">';
 content+='<img src="'+profile_pic+'" class="profile_pic_img3 mtop15p"/>';
 content+='<h5 class="mtop15p"><b>'+unionName+'</b></h5>';
 content+='</div>';
 content+='<div class="col-xs-6 pad0" style="border-left:1px solid #ccc;">';
 content+='<div class="col-xs-12" style="border-bottom:1px solid #ccc;">';
 content+='<h5><b>Branches</b></h5>';
 content+='<h5>'+branches+'</h5>';
 content+='</div>';
 content+='<div class="col-xs-12" style="border-bottom:1px solid #ccc;">';
 content+='<h5><b>Members</b></h5>';
 content+='<h5>'+members+'</h5>';
 content+='</div>';
 content+='<div class="col-xs-12">';
 content+='<h5><b>Subscribers</b></h5>';
 content+='<h5>'+subscribers+'</h5>';
 content+='</div>';
 content+='</div>';
 content+='</div>';
 content+='</div>';
 content+='</div>';
 content+='<div class="list-group-item pad0">';
 content+='<div align="center" class="container-fluid">';
 content+='<div class="row">';
 content+='</div>';
 content+='</div>';
 content+='</div>';				    
 content+='</div>';	
 content+='</div>';					  
 content+='</div>';	
 content+='</div>';	  
}
 content+=appendContent;
 document.getElementById(div_view).innerHTML=content;
});

}
</script>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <?php include_once 'templates/api/api_header_simple.php'; ?>
 
 <div class="list-group" style="margin-bottom:0px;">
 <div class="list-group-item pad0" style="background-color:#e7e7e7;border-radius:0px;">
   <div class="container-fluid">
   <div class="row">
    <div class="col-xs-12 mtop15p">
      Find Unions and Associations around you in various categories and sub-categories.
    </div>
	<div class="col-xs-12 mtop15p">
	  <button class="btn btn-default mbot15p pull-right"><b>Create Union / Association</b></button>
	</div>
   </div>
  </div>
 </div>
 </div>

 <div align="center" id="div_unionsAndAssociationsTitle"></div>
 
 <div class="container-fluid">
 <div class="row">
 <div id="div_count_unionsAndAssociations" class="col-xs-12 mtop15p"></div>
 </div>
 </div>
 
 <div id="div_data_unionsAndAssociations0">
   <div align="center" class="col-xs-12">
     <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
   </div>
 </div>
 
</body>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>