<%-- 
    Document   : domains
    Created on : Oct 4, 2018, 1:13:28 PM
    Author     : Kishore_Nellutla
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>JSP Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--script src="https://code.jquery.com/jquery-3.3.1.js"></script-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="styles/api/core-skeleton.css">
<%@include file="templates/api_js.jsp" %>
<script type="text/javascript">
$(document).ready(function() {
 $('#tbl_category').DataTable();
 $('#tbl_subcategory').DataTable();
});
function addNewCategory(){
 var addNewCategory_categoryId = document.getElementById("addNewCategory_categoryId").value;
 var addNewCategory_categoryName = document.getElementById("addNewCategory_categoryName").value;

 if(addNewCategory_categoryId.length>0){
 if(addNewCategory_categoryName.length>0){
 document.getElementById("addNewCategory_categoryId").value.disabled=true;
 document.getElementById("addNewCategory_categoryName").value.disabled=true;
 /* Check IsDuplicate or not */
 js_ajax('GET',PROJECT_URL+'domainModule',{ action:'ADD_NEW_CATEGORY', category_Id:addNewCategory_categoryId, 
     categoryName:addNewCategory_categoryName},function(response){
     console.log(response);
     if(response.trim()==='DUPLICATE'){
        div_display_warning('alert_addNewCategory','W003');
     } else if(response.trim()==='ERROR') {
        div_display_warning('alert_addNewCategory','W004');
     } else {
         document.getElementById("addNewCategory_categoryId").value = '';
         document.getElementById("addNewCategory_categoryName").value = '';
         document.getElementById("addNewCategory_categoryId").value.disabled=false;
         document.getElementById("addNewCategory_categoryName").value.disabled=false;
         $('#addNewCategoryModal').modal("hide");
         alert_display_success('S001','#');
     }
     
     
    
 });
 } else { div_display_warning('alert_addNewCategory','W002'); }
 } else { div_display_warning('alert_addNewCategory','W001'); }
}
function generate_categories_JSONFile(){
 var generateJSON_dbURL = document.getElementById("generateJSON_dbURL").value;
 var generateJSON_username = document.getElementById("generateJSON_username").value;
 var generateJSON_password = document.getElementById("generateJSON_password").value;
 if(generateJSON_dbURL.length>0){
 if(generateJSON_username.length>0){
     if(generateJSON_password.length==0){ generateJSON_password = '-'; }
  document.getElementById("generateJSON_dbURL").disabled=true;
  document.getElementById("generateJSON_username").disabled=true;
  document.getElementById("generateJSON_password").disabled=true;
  js_ajax('GET',PROJECT_URL+'domainModule',{ action:'GENERATE_CATEGORIES_JSONFILE', db_url: generateJSON_dbURL,
  username:generateJSON_username, password:generateJSON_password },
  function(response){ console.log(response); });
 } else { div_display_warning('div_alert_generateJSONFile','W006'); } 
 } else { div_display_warning('div_alert_generateJSONFile','W005'); }
}
function reset_form_generateJSONFile(){
 document.getElementById("generateJSON_dbURL").disabled=false;
 document.getElementById("generateJSON_username").disabled=false;
 document.getElementById("generateJSON_password").disabled=false; 
}
</script>
</head>
<body>
<!-- Modal ::: Start -->
<div id="addNewCategoryModal" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">&times;</button>
 <h5 class="modal-title"><b>Add New Category</b></h5>
</div>
<div class="modal-body">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div id="alert_addNewCategory" class="form-group"></div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label>Category Id</label>
<input type="text" id="addNewCategory_categoryId" class="form-control" placeholder="Enter Category Id"/>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label>Category Name</label>
<input type="text" id="addNewCategory_categoryName" class="form-control" placeholder="Enter Category Name"/>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<button class="btn btn-primary form-control" onclick="javascript:addNewCategory();"><b>Add New Category</b></button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Modal ::: End -->
<div class="container-fluid">
<div class="row">
    
<div class="col-sm-6">
<div class="panel panel-warning">
<div class="panel-heading"><b>Generate Categories JSON File</b></div>
<div class="panel-body">
<div class="container-fluid">
 
<div class="row">
<div class="col-sm-12">
<div id="div_alert_generateJSONFile" class="form-group">

</div>
</div>
</div>
    
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label>JDBC URL</label>
<select id="generateJSON_dbURL" class="form-control">
<option value="">Select JDBC URL</option>
<option value="jdbc:mysql://192.168.1.4:3306/mlh_basic">jdbc:mysql://192.168.1.4:3306/mlh_basic</option>
</select>
</div>
</div>
</div>
    
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label>Username</label>
<input id="generateJSON_username" type="text" class="form-control" placeholder="Enter your Username" value="root"/>
</div>
</div>
</div>
    
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label>Password</label>
<input id="generateJSON_password" type="password" class="form-control" placeholder="Enter your Password" value=""/>
</div>
</div>
</div>
    
<div class="row">
<div align="right" class="col-sm-12">

<div class="btn-group">
<button class="btn btn-success" onclick="javascript:generate_categories_JSONFile();"><b>Generate JSON File</b></button>
<button class="btn btn-primary"><b>Place File into Server</b></button>
<button class="btn btn-danger" onclick="javascript:reset_form_generateJSONFile();"><b>Reset</b></button>
</div>

</div>
</div>
    
</div>
</div>
</div>
</div>
    
</div>
<div class="row">
    
<div class="col-sm-6">
<div class="panel panel-warning">
    <div class="panel-heading"><b>Categories</b></div>
<div class="panel-body">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
 <button class="btn btn-default pull-right" data-toggle="modal" data-target="#addNewCategoryModal">
   <b>(+) Add New Category</b>
 </button>
</div>
</div>
    
<div class="row">
<div class="col-sm-12"><h5><b>View Categories</b></h5><hr></div>
</div>

<div class="row">
<div class="col-sm-12">
<table id="tbl_category" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr><th>Id</th><th>Categories</th></tr>
</thead>
<tbody>
<tr><td>Tiger Nixon</td><td>System Architect</td></tr>
</tbody>
</table>    
</div>
</div>
</div>
</div>
</div>
</div>
    
<div class="col-sm-6">
<div class="panel panel-warning">
    <div class="panel-heading"><b>Sub-Categories</b></div>
<div class="panel-body">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12"><h5><b>View Sub-Categories</b></h5><hr></div>
</div>
<div class="row">
<div class="col-sm-12">
<table id="tbl_subcategory" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr><th>Id</th><th>Sub Categories</th></tr>
</thead>
<tbody>
<tr><td>Tiger Nixon</td><td>System Architect</td></tr>
</tbody>
</table>    
</div>
</div>
</div>
</div>
</div>
</div>
    
</div>
</div>       
</body>
</html>
