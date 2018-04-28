<?php
/* This is the Service called by Android Device. 
 * 
 */
if(isset($_GET["action"])){
  if($_GET["action"]=='LATEST_NOTIFICATION_SERVICE'){
   
  } else { echo 'NO_ACTION_INPUT'; }
} else { echo 'MISSING_ACTION_INPUT'; }
?>