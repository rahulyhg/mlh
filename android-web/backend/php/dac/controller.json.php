<?php
/*
if(isset($_GET["action"])){
if($_GET["action"]=='Add'){

}
} else { echo 'MISSING_ACTION'; }
*/
$string="{\"param1\":\"abc\",\"param2\":\"def\",\"param3\":\"ghi\"}";
$addString="\"param4\":\"jkl\"";
json_decode($string);
?>