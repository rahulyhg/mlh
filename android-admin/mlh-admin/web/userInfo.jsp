<%-- 
    Document   : userInfo
    Created on : Sep 6, 2018, 10:38:38 PM
    Author     : Kishore_Nellutla
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/api/core-skeleton.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/pages/userInfo.js"></script>
<title>Administrator Dashboard</title>
<%@include file="templates/api_js.jsp" %>
<script type="text/javascript">
 var AUTH_USER_ID;
$(document).ready(function(){
 AUTH_USER_ID=document.getElementById("request_authUserId").value;
 getUserInformatioById();
});
</script>
</head>
<body>
 <!-- HIDDEN PARAMETERS -->
 <input id="request_authUserId" type="hidden" value="<% out.println(request.getParameter("AUTH_USER_ID")); %>"/>

   <div class="container-fluid mtop15p">
     <div class="row">
       <div id="userInformationDiv" class="col-xs-8">
        
       </div>
     </div>
   </div>
     
 
 <!-- -->
 
</body>
</html>
