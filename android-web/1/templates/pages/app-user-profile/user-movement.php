<script type="text/javascript">
function movement_count_userParticipated(){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.community.movement.php',
	{ action:'GETCOUNT_USERPARTICIPATEDMOVEMENTS', user_Id:APP_USERPROFILE_ID },
	function(total_data){ 
	  try {
	  console.log("Movement Total Data: "+total_data);
	  if(total_data==='0'){
        var content='<div align="center">';
            content+='<span style="color:#aba8a8;">User didn\'t participated in any of the Movement.</span>';
		    content+='</div>';
		if(document.getElementById("user-movement-content0")!=null){
	     document.getElementById("user-movement-content0").innerHTML=content; 
		}
      } else {
       scroll_loadInitializer('user-movement-content',10,movement_data_userParticipated,total_data);
      }
	 } catch(err){ console.log(err); }
	});
}
function movement_data_userParticipated(div_view, appendContent,limit_start,limit_end){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.community.movement.php',
	{ action:'GETDATA_USERPARTICIPATEDMOVEMENTS', user_Id:APP_USERPROFILE_ID,limit_start:limit_start, 
	limit_end:limit_end },
	function(response){ 
	 console.log("Movement Response: "+response);
	 response=JSON.parse(response);
	 var content='';
	 for(var index=0;index<response.length;index++){
	  var move_Id=response[index].move_Id;
	  var domain_Id=response[index].domain_Id;
	  var domainName=response[index].domainName;
	  var subdomain_Id=response[index].subdomain_Id;
	  var subdomainName=response[index].subdomainName;
	  var union_Id=response[index].union_Id;
	  var unionName=response[index].unionName;
	  var minlocation=response[index].minlocation;
	  var location=response[index].location;
	  var state=response[index].state;
	  var country=response[index].country;
	  var branch_Id=response[index].branch_Id;
	  var createdOn=response[index].createdOn;
	  var petitionTitle=response[index].petitionTitle;
	  var issue_desc=response[index].issue_desc;
	  var move_img=response[index].move_img;
	  var move_status=response[index].move_status;
	  var openOn=response[index].openOn;
	  var displayLevel=response[index].displayLevel;
	 

	   content+=ui_movementContent(move_Id,domain_Id,domainName,subdomain_Id,subdomainName,union_Id,unionName,
							minlocation,location,state,country,branch_Id,createdOn,petitionTitle,issue_desc,
							move_img,move_status,openOn,displayLevel);
	 }
	 content+=appendContent;
	 if(document.getElementById(div_view)!=null){
	   document.getElementById(div_view).innerHTML=content;
	 }
	});

}

function ui_movementContent(move_Id,domain_Id,domainName,subdomain_Id,subdomainName,union_Id,unionName,
					minlocation,location,state,country,branch_Id,createdOn,petitionTitle,issue_desc,
					move_img,move_status,openOn,displayLevel){
 /* var param_moveId='ABCDE';
 var param_domainName='Transportation';
 var param_subdomainName='Auto';
 var param_profilepic='https://avaazimages.avaaz.org/27583_27583_eco46_48_original_1_460x230.jpg';
 var param_petitionTitle='Strike of Fee ReImbursement By Student Federation of India';
 var param_createdOn='2018-04-12 10:11:00';
 var param_minlocation='L.B.Nagar';
 var param_location='Hyderabad';
 var param_state='Telangana';
 var param_country='India'; */
 var content='<div class="list-group-item">';
     content+='<a href="'+PROJECT_URL+'app/movement/'+move_Id+'">';
     content+='<div class="container-fluid pad0">';
     content+='<div align="left" class="col-md-12 col-xs-12 pad0">'; 
     content+='<span class="label label-newsfeed custom-bg" style="background-color:#0ba0da;">';
     content+='<b>'+domainName.toUpperCase()+' / '+subdomainName.toUpperCase()+'</b></span>';
     content+='</div>';
     content+='<div class="row pad0">';
     content+='<img class="col-md-12 col-xs-12 mtop15p" style="height:auto;" src="'+move_img+'">';
     content+='<div align="left" class="col-md-12 col-xs-12 frnshipreqdiv">';
     content+='<h5 style="line-height:22px;"><b>'+petitionTitle+'</b></h5>';
     content+='<div align="right" style="color:#87898a;font-size:12px;">Movement started on <br/>'+openOn+' IST</div>';
     content+='<div align="center" class="frnshipreqaddr mtop15p" style="color:#6f6f6f;font-weight:bold;';
	 content+='font-size:12px;">'+minlocation+', '+location+', '+state+', '+country+'</div>';
     content+='</div>';	
     content+='</div>';
     content+='</div>';
	 content+='</a>';
     content+='</div>';
  return content;
}
</script>
<div>
<div class="row">
 <div class="col-xs-12 pad0">
    <div class="list-group">
     <div class="list-group-item" style="border-bottom:2px solid #000;">
       <h5><b>Movements Participated</b></h5>
     </div>
    </div>
 </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div id="user-movement-content0" class="list-group">
     <div align="center">
       <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
     </div>
    </div>
  </div>
</div>
</div>