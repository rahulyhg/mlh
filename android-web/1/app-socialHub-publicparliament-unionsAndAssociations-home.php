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
$(document).ready(function(){
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
 getCommunitiesByCategories();
});
function getCommunitiesByCategories(){
js_ajax("GET",PROJECT_URL+"backend/php/dac/controller.module.app.user.subscriptions.php",
{ action:'GET_SESSION_DOMAINSUBSCRIPTION',user_Id:AUTH_USER_ID },function(response){
 console.log(response);
 response=JSON.parse(response);
 var content='<div class="container-fluid mtop15p">';
     content+='<div class="row">';
	 content+='<div class="col-xs-12">';
	 content+='<div class="list-group">';
 for(var i1=0;i1<response.domains.length;i1++){
  var domain_Id=response.domains[i1].domain_Id;
  var domainName=response.domains[i1].domainName;
  var totalCommunities=0;
  var content2='';
  for(var i2=0;i2<response.domains[i1].subdomains.length;i2++){
   var subdomain_Id=response.domains[i1].subdomains[i2].subdomain_Id;
   var subdomainName=response.domains[i1].subdomains[i2].subdomainName;
   var subscribed=response.domains[i1].subdomains[i2].subscribed;
   var communities=response.domains[i1].subdomains[i2].communities;
       totalCommunities+=parseInt(communities);
    content2+='<div class="list-group-item">';
	content2+='<a class="a-custom" href="'+PROJECT_URL+'app/socialHub/publicparliament/unionsAndAssociations/list/'+domain_Id+'/'+subdomain_Id+'">';
    content2+='<b>'+subdomainName+' ('+communities+')</b>';
	content2+='</a>';
    content2+='</div>';
  }
  var content1='<div class="list-group-item custom-font" data-toggle="collapse" style="color:'+CURRENT_DARK_COLOR+';" ';
      content1+='data-target="#'+domain_Id+'" style="border-bottom:2px solid #000;">';
      content1+='<b>'+domainName+' ('+totalCommunities+')</b>';
	  content1+='<span class="glyphicon glyphicon-chevron-down custom-font pull-right"></span>';
      content1+='</div>';
      content1+='<div id="'+domain_Id+'" class="collapse">';
	  content1+=content2;
      content1+='</div>';
	  content+=content1
 }
 content+='</div>';
 content+='</div>';
 content+='</div>';
 content+='</div>';
 document.getElementById("div_unionsAndAssociations").innerHTML=content;
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
 
 <div class="list-group">
 <div align="center" class="list-group-item" style="background-color:#f8f8f8;">
   <h5><b>Categories and SubCategories</b></h5>
 </div>
 </div>

 <div id="div_unionsAndAssociations">
   <div align="center" class="col-xs-12">
     <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
   </div>
 </div>
 
</body>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>