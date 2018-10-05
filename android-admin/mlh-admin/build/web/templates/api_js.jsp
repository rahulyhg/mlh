<%@page import="anups.dun.utils.GeneralUtility"%>
<% StringBuffer url = request.getRequestURL();
String uri = request.getRequestURI();
String ctx = request.getContextPath();
String baseURL = url.substring(0, url.length() - uri.length() + ctx.length()) + "/";%>
<script type="text/javascript">
var PROJECT_WS_URL = 'http://localhost/mlh/android-web/';
var PROJECT_URL = '<%=baseURL%>';
var USR_LANG = 'english';
console.log(PROJECT_URL);
function js_ajax(method,url,data,fn_output){
 $.ajax({type: method, url: url,data:data, success: function(response) { fn_output(response); } }); 
}
function div_display_warning(div_Id,warning_Id){
js_ajax("GET",PROJECT_URL+'config/warning_messages.json',{},function(response){
var content='<div class="alert alert-warning alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    content+='<strong>Warning!</strong> '+response[warning_Id][USR_LANG];
    content+='</div>';
 document.getElementById(div_Id).innerHTML=content;
});
}
function alert_display_warning(warning_Id){
js_ajax("GET",PROJECT_URL+'config/warning_messages.json',{},function(response){
var content='<div class="modal-dialog">';
	content+='<div class="modal-content">';
    content+='<div class="modal-body" style="padding:0px;">';
    content+='<div class="alert alert-warning alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>';
    content+='<strong>Warning!</strong> '+response[warning_Id][USR_LANG];
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
var modalDivision = document.createElement("div"); 
    modalDivision.setAttribute("id", "alertWarningModal");
	modalDivision.setAttribute("class", "modal fade");
	modalDivision.setAttribute("role", "dialog");
 document.body.appendChild(modalDivision);  
 document.getElementById("alertWarningModal").innerHTML=content;
 $('#alertWarningModal').modal();
});
}

function div_display_success(div_Id,success_Id){
js_ajax("GET",PROJECT_URL+'config/success_messages.json',{},function(response){
var content='<div class="alert alert-success alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    content+='<strong>Success!</strong> '+response[success_Id][USR_LANG];
    content+='</div>';
 document.getElementById(div_Id).innerHTML=content;
});
}

function alert_display_success(success_Id,success_url){
js_ajax("GET",PROJECT_URL+'config/success_messages.json',{},function(response){
var content='<div class="modal-dialog">';
	content+='<div class="modal-content">';
    content+='<div class="modal-body" style="padding:0px;">';
    content+='<div class="alert alert-success alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" onclick="javascript:urlTransfer(\''+success_url+'\');" class="close" data-dismiss="modal" ';
	content+='aria-label="close">&times;</a>';
    content+='<strong>Success!</strong> '+response[success_Id][USR_LANG];
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
var modalDivision = document.createElement("div"); 
    modalDivision.setAttribute("id", "alertSuccessModal");
	modalDivision.setAttribute("class", "modal fade");
	modalDivision.setAttribute("role", "dialog");
 document.body.appendChild(modalDivision);  
 document.getElementById("alertSuccessModal").innerHTML=content;
 $('#alertSuccessModal').modal({backdrop: "static"});
});
}
</script>
