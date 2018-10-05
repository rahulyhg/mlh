/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getUserInformatioById(){
js_ajax("GET",PROJECT_URL+"/userAuthenticationModule",{ action:'GETUSERINFORMATIONBYID', 
 user_Id:AUTH_USER_ID}, function(response){
  response=JSON.parse(response);
  var content='';
  if(response.length>0){
    for(var i1=0;i1<response.length;i1++){
     var user_Id=response[i1].user_Id;
     var username=response[i1].username;
     var surName=response[i1].surName;
     var name=response[i1].name;
     var dob=response[i1].dob;
     var gender=response[i1].gender;
     var profile_pic=response[i1].profile_pic;
     var about_me=response[i1].about_me;
     var minlocation=response[i1].minlocation;
     var location=response[i1].location;
     var state=response[i1].state;
     var country=response[i1].country;
     var created_On=response[i1].created_On;
     var isAdmin=response[i1].isAdmin;
     var user_tz=response[i1].user_tz;
     var acc_active=response[i1].acc_active;
     
     content+='<div class="panel panel-primary">';
     content+='<div class="panel-heading"><b>User Information</b></div>';
     content+='<div class="panel-body">';
     content+='<div class="container-fluid">';
     content+='<div class="row mbot15p">';
     content+='<div align="center" class="col-xs-4">';
     content+='<img src="'+profile_pic+'" class="profile_pic_img"/>';
     content+='</div>';
     content+='<div class="col-xs-8">';
     content+='<div class="form-group">';
     content+='<label>About Me</label>';
     content+='<div>';
     if(about_me.length>0){
     content+=about_me;
     } else { 
     content+='<span style="color:#aaa;">No Description</span>';
     }
     content+='</div>';
     content+='</div>';
     content+='</div>';
     content+='</div>';
     content+='<div class="row">';  
     content+='<div class="col-xs-3 col-sm-2"><label>User Id</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+user_Id+'</div>';
     content+='<div class="col-xs-3 col-sm-2"><label>Username</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+username+'</div>';
     content+='</div>';
     content+='<div class="row">';
     content+='<div class="col-xs-3 col-sm-2"><label>Surname</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+surName+'</div>';
     content+='<div class="col-xs-3 col-sm-2"><label>Name</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+name+'</div>';
     content+='</div>';
     content+='<div class="row">';
     content+='<div class="col-xs-3 col-sm-2"><label>Date of Birth</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+dob+'</div>';
     content+='<div class="col-xs-3 col-sm-2"><label>Gender</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+gender+'</div>';
     content+='</div>';
     content+='<div class="row">';
     content+='<div class="col-xs-3 col-sm-2"><label>Country</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+country+'</div>';
     content+='<div class="col-xs-3 col-sm-2"><label>State</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+state+'</div>';
     content+='</div>';
     content+='<div class="row">';
     content+='<div class="col-xs-3 col-sm-2"><label>Location</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+location+'</div>';
     content+='<div class="col-xs-3 col-sm-2"><label>Locality</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+minlocation+'</div>';
     content+='</div>';
     content+='<div class="row">';
     content+='<div class="col-xs-3 col-sm-2"><label>Created On</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+created_On+'</div>';
     content+='<div class="col-xs-3 col-sm-2"><label>Is-Administrator</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+isAdmin+'</div>';
     content+='</div>';
     content+='<div class="row">'; 
     content+='<div class="col-xs-3 col-sm-2"><label>Time-zone</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+user_tz+'</div>';
     content+='<div class="col-xs-3 col-sm-2"><label>Active</label></div>';
     content+='<div class="col-xs-3 col-sm-4">'+acc_active+'</div>';
     content+='</div>';
     content+='<div class="row">';
     content+='<div class="col-xs-3 col-sm-2"><label>Mobile Numbers</label></div>';
     content+='<div class="col-xs-9 col-sm-10">';
     var user_contacts=JSON.parse(response[i1].user_contacts);
     for(var i2=0;i2<user_contacts.length;i2++){
       var mcountrycode=user_contacts[i2].mcountrycode;
       var mobile=user_contacts[i2].mobile;
       content+=mcountrycode+'-'+mobile;
       if(i2!=(user_contacts.length-1)){ content+=', '; }
     }
     content+='</div>';
     content+='</div>';
     content+='</div>';
     content+='</div>';
     content+='</div>';     
     
    }
  } 
  document.getElementById("userInformationDiv").innerHTML=content;
});
}
