<?php 

 ini_set('max_execution_time',300);
 date_default_timezone_set("Asia/Kolkata");
 
 /* Logger Declaration in JSON */ 
	 include('../../../log4php/Logger.php'); 
	 Logger::configure('../../../backend/config/log-config.xml'); 
	
 /* Database Credentials */
$DB_MLHBASIC_SERVERNAME="localhost:3306";
$DB_MLHBASIC_NAME="mlh_basic";
$DB_MLHBASIC_USER="root";
$DB_MLHBASIC_PASSWORD="";
	 
	 
// DB: myloc6lh_mlh
// USER: myloc6lh_root
// PASSWORD : myloc6lh_root
// SERVER : localhost:3306
