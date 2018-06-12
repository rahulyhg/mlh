<?php session_start(); ?>
<script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/api-session-preferences.js"></script>
<?php
class Android {
 
 function setSessionStorage($key,$value){
  $content='<script type="text/javascript">setCookie("'.$key.'", "'.$value.'");</script>';
  echo $content;
 }
 
 function getSessionStorage($key){
  $content='';
  $value='<script type="text/javascript">document.write(getCookie("'.$key.'"));</script>';
  return $value;
 }

}
// $nd=new Android();
// $nd->setSessionStorage("AUTH_USER_ID","Anup");
// $variable=$nd->getSessionStorage("AUTH_USER_ID");
// echo "Variable: ".$variable;
?>