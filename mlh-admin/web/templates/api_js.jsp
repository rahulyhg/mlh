<%@page import="anups.dun.uils.Utility"%>
<% StringBuffer url = request.getRequestURL();
String uri = request.getRequestURI();
String ctx = request.getContextPath();
String baseURL = url.substring(0, url.length() - uri.length() + ctx.length()) + "/";%>
<script type="text/javascript">
var PROJECT_URL='<%=baseURL%>';
function js_ajax(method,url,data,fn_output){
 $.ajax({type: method, url: url,data:data, success: function(response) { fn_output(response); } }); 
}
console.log(PROJECT_URL);
</script>
