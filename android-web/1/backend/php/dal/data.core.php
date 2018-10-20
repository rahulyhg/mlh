<?php
class core {

   function query_getPathId($name) {
   /* FUNCTION DESCRIPTION : Used in controller.core.php ( action = GETPATHID ) */
	 $selectQuery="SELECT * FROM app_ftp_path WHERE name='".$name."';"; 
	 return $selectQuery;
   }

}
?>