<?php 

 ini_set('max_execution_time',300);
 date_default_timezone_set("Asia/Kolkata");
 
 /* Logger Declaration in JSON */ 
	 include('../../../log4php/Logger.php'); 
	 Logger::configure('../../../backend/config/log-config.xml'); 
	
 /* Database Credentials */ 
	 define("SERVER_NAME","localhost:3306", true); 
	 define("DB_NAME","mlh", true); 
	 define("DB_USER","root", true); 
	 define("DB_PASSWORD","", true); 
	 
// DB: myloc6lh_mlh
// USER: myloc6lh_root
// PASSWORD : myloc6lh_root
// SERVER : localhost:3306
