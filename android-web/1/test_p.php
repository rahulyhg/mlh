<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
var perm={"Access-Control-Allow-Origin": "*","Access-Control-Allow-Headers": "Content-Type",
		  "Access-Control-Allow-Methods": "GET, PUT, POST, DELETE, OPTIONS"};
$(document).ready(function(){
$.ajax({ type: "DELETE", contentType: 'application/json',
 url:'https://api.cloudinary.com/v1_1/dbcyhclaw/image/upload',  
              cache :false,
			  headers: { 'Authorization': 'Bearer '+perm },
              //  headers: {'Authorization': 'Bearer '+data},
            //  dataType: 'json',
			  data :{ public_id:'acratica-libertarian-font-ffp_v094lw.png' },
              success: function (data) {
                  console.log(data);
              },
              error : function(jqXHR, textStatus, errorThrown) {
                  console.log('Error: '+jqXHR.status);
                  console.log('textStatus: '+textStatus)
                 } 
           });
  /*  $("button").click(function(){
        loginsf(function(data) { 
           $.ajax({
              type: "GET",
              contentType: 'application/json',
              url:'https://sfdc-cors.herokuapp.com/services/apexrest/prefix_if_exsists_for your_org_else_dont_add/RestAPI/',  
              cache :false,
                headers: {'Authorization': 'Bearer '+data},
              dataType: 'json',
              success: function (data) {
                  
              },
              error : function(jqXHR, textStatus, errorThrown) {
                  console.log('Error: '+jqXHR.status);
                  console.log('textStatus: '+textStatus)
                 } 
           });
        });    
    }); */
});

/*
function loginsf(fn){
     $.ajax({
            type: 'POST',
            crossOrigin: true,
            url: 'https://sfdc-cors.herokuapp.com/services/oauth2/token',
            dataType: 'json',
            cache :false,
            data : {"grant_type":"password","client_id":"add_your_client_id", "client_secret":"your_client_secret","username":"Your_username","password":"your_password_and secritytoken"},
            success : function (data) {
             fn(data.access_token);
            },
            error : function (data, errorThrown,status) {

            }
    });
  }
  */  
</script>
</head>
<body>

<div id="div1"><h2>jQuery AJAX test</h2></div>

<button>Get External Content</button>

</body>
</html>