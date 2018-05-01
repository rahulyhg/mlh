<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.page.app.search.php';
$logger=Logger::getLogger("controller.page.app.search.php");
if(isset($_GET["action"])){
if($_GET["action"]=='GETINFOBYSEARCH'){
 if(isset($_GET["searchKeyword"])){
   $searchKeyword=$_GET["searchKeyword"];
   
 } else { echo 'MISSING_SEARCH_KEYWORD'; }
} else { echo 'NO_ACTION_INPUT'; }
} else { echo 'MISSING_ACTION'; }
?>