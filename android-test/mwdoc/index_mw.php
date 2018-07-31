<%-- 
    Document   : index
    Created on : Jul 31, 2018, 5:36:52 PM
    Author     : N.L.N.Rao
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<title>MyLocalHook Doc</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.curpoint { cursor:pointer; }
body{ font-size:12px; }
.mtop5p { margin-top:5px; }
.mbot5p { margin-bottom:5px; }
.mtop10p { margin-top:10px; }
.mbot10p { margin-bottom:10px; }
.mtop15p { margin-top:15px; }
.mbot15p { margin-bottom:15px; }
.mtop20p { margin-top:20px; }
.mbot20p { margin-bottom:20px; }
.pad0 { padding:0px; }
a { color:#000; }
.nav-pills>li.active>a, .nav-pills>li.active>a:focus, 
.nav-pills>li.active>a:hover,.green-bg { font-weight:bold;color: #fff;background-color: #4caf50; }
</style>
</head>
<body>
 <div class="container-fluid">
   <div class="col-sm-2">
     <div align="center" class="mtop5p mbot5p"><h5><b>List of Modules</b></h5></div>
     <div>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#">Android Service</a></li>
        <li><a href="#">Menu 1</a></li>
        <li><a href="#">Menu 2</a></li>
        <li><a href="#">Menu 3</a></li>
      </ul>
     </div>
   </div>
   <div class="col-sm-10" style="border-left:1px solid #ccc;">
      <div align="center" class="mtop5p mbot5p"><h4><b>Module: Android Service</b></h4></div>
      <div class="col-sm-7 panel panel-primary">
        <div class="panel-body" style="line-height:26px;">
          <b>MODULE URL: </b>http://localhost/mlh-backend/backend/php/dac/controller.module.app.android.service.php<br/>
          <b>METHOD TYPE: </b>POST
        </div>
      </div>
      <div class="col-sm-12 pad0">
        <div class="col-sm-3 pad0">
            <div align="center"><h5><b>List of Services</b></h5></div>
           <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#">SERVICE_USRDUMPFRNDS</a></li>
            <li><a href="#">SERVICE_GOOGLEADS</a></li>
            <li><a href="#">SERVICE_INTERVALHOUR</a></li>
            <li><a href="#">SERVICE_INTERVALDAY</a></li>
            <li><a href="#">SERVICE_INTERVALMINUTE</a></li>
           </ul>
        </div>
        <div class="col-sm-9">
          <div class="panel">
            <div class="panel-heading green-bg"><b>SERVICE_USRDUMPFRNDS</b></div>
            <div class="panel-body" style="border:1px solid #4caf50;">
                <div class="container-fluid pad0">
                    <div class="col-xs-6">
                        <div style="line-height:22px;">
                         <b>BACKGROUND: </b>This Service is used in the Android Web Screen Activity 
                         when it is created.
 
<div id="SQLiteContactsTblModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content pad0">
      <div class="modal-body pad0">
         
          <div class="container-fluid mtop20p">
              <div class="col-sm-12">
                  <img src="images/sQLiteContactsTbls.png"/>
              </div>
              <!--div class="col-sm-4">
                  <div class="list-group">
                    <div class="list-group-item green-bg">
                        <div align="center"><h5><b>userFrndsContacts</b></h5></div>
                    </div> 
                    <div class="list-group-item">contact_Id (INTEGER)</div>
                    <div class="list-group-item"><code>frnd_Id (INTEGER)</code></div>
                    <div class="list-group-item">phoneNumber (TEXT)</div>
                    <div class="list-group-item"><code>user_Id (TEXT)</code></div>
                  </div>
              </div>
              <div class="col-sm-4">
                  <div class="list-group">
                    <div class="list-group-item green-bg">
                       <div align="center"><h5><b>userFrndsInfo</b></h5></div>
                    </div> 
                    <div class="list-group-item"><code>frnd_Id (INTEGER)</code></div>
                    <div class="list-group-item">youCall (TEXT)</div>
                  </div>
              </div>
              <div class="col-sm-4">
                  <div class="list-group">
                    <div class="list-group-item green-bg">
                      <div align="center"><h5><b>userFrndsProfile</b></h5></div>
                    </div> 
                    <div class="list-group-item"><code>user_Id (TEXT)</code></div>
                    <div class="list-group-item">username (TEXT)</div>
                    <div class="list-group-item">surName (TEXT)</div>
                    <div class="list-group-item">name (TEXT)</div>
                    <div class="list-group-item">relationship (TEXT)</div>
                    <div class="list-group-item">country (TEXT)</div>
                    <div class="list-group-item">state (TEXT)</div>
                    <div class="list-group-item">location (TEXT)</div>
                    <div class="list-group-item">minlocation (TEXT)</div>
                    <div class="list-group-item">isContacts (TEXT)</div>
                    <div class="list-group-item">isFriend (TEXT)</div>
                    <div class="list-group-item">createdOn (TEXT)</div>
                  </div>
              </div-->
          </div>
          
      </div>
    </div>
  </div>
</div>
<script>
function display_SQLiteContactsTbls(){
  $('#SQLiteContactsTblModal').modal(); 
}
</script>                          
                         <ol>
                             <li>Android SQLite Database contains three Tables: 
                                 <code class="curpoint" onclick="javascript:display_SQLiteContactsTbls();">userFrndsContacts</code>,
                                 <code class="curpoint" onclick="javascript:display_SQLiteContactsTbls();">userFrndsInfo</code>, 
                                 <code class="curpoint" onclick="javascript:display_SQLiteContactsTbls();">userFrndsProfile</code>.</li>
                             <li></li>
                         </ol>
                        </div>
                        <div class="mtop10p">
                         <b>DESCRIPTION: </b>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div align="center"><b>INPUT PARAMETERS</b></div>
                        <div class="table-responsive">
                          <table class="table">
                             <thead>
                                 <tr align="center" class="green-bg">
                                 <td><b>Name</b></td>
                                 <td><b>Description</b></td>
                               </tr>
                             </thead>
                             <tbody>
                               <tr>
                                 <td>Name</td>
                                 <td>Description</td>
                               </tr>
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
 </div>
</body>
</html>
