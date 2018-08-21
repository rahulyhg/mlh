<script type="text/javascript">
$(document).ready(function(){
document.getElementById("user-movement-content").innerHTML=ui_movementContent();
});
function ui_movementContent(){
 var param_moveId='ABCDE';
 var param_domainName='Transportation';
 var param_subdomainName='Auto';
 var param_profilepic='https://avaazimages.avaaz.org/27583_27583_eco46_48_original_1_460x230.jpg';
 var param_petitionTitle='Strike of Fee ReImbursement By Student Federation of India';
 var param_createdOn='2018-04-12 10:11:00';
 var param_minlocation='L.B.Nagar';
 var param_location='Hyderabad';
 var param_state='Telangana';
 var param_country='India';
 var content='<div class="list-group-item">';
     content+='<div class="container-fluid pad0">';
     content+='<div align="left" class="col-md-12 col-xs-12 pad0">'; 
     content+='<span class="label label-newsfeed custom-bg" style="background-color:#0ba0da;">';
     content+='<b>'+param_domainName.toUpperCase()+' / '+param_subdomainName.toUpperCase()+'</b></span>';
     content+='</div>';
     content+='<div class="row pad0">';
     content+='<img class="col-md-12 col-xs-12 mtop15p" style="height:auto;" src="'+param_profilepic+'">';
     content+='<div align="left" class="col-md-12 col-xs-12 frnshipreqdiv">';
     content+='<h5 style="line-height:22px;"><b>'+param_petitionTitle+'</b></h5>';
     content+='<div align="right" style="color:#87898a;font-size:12px;">Movement started on <br/>'+param_createdOn+' IST</div>';
     content+='<div align="center" class="frnshipreqaddr mtop15p" style="color:#6f6f6f;font-weight:bold;font-size:12px;">'+param_minlocation+', '+param_location+', '+param_state+', '+param_country+'</div>';
     content+='</div>';
	
	 content+='<div align="right" class="col-xs-12 mtop15p">';
     content+='<a href="'+PROJECT_URL+'app/movement/'+param_moveId+'">';
	 content+='<button class="btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;">';
     content+='<i class="fa fa-14px fa-newspaper-o"></i> &nbsp;<span style="font-size:11px;"><b>Watch Movement</b></span>';
	 content+='</button>';
     content+='</a>';
	 content+='</div>';
	
     content+='</div>';
     content+='</div>';
     content+='</div>';
  return content;
}
</script>
<div>
<div class="row">
 <div class="col-xs-12">
    <div class="list-group">
     <div class="list-group-item" style="border-bottom:2px solid #000;">
       <h5><b>Movements Participated</b></h5>
     </div>
    </div>
 </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div id="user-movement-content" class="list-group">
     <div align="center">
       <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
     </div>
    </div>
  </div>
</div>
</div>