<?php
/* CORE : This Core Classes works as a Junction between Android Java Part and Web part */
class core_android {

 function getAppVersionInPlayStore(){
   $url = 'https://play.google.com/store/apps/details?id=anups.dun.app&hl=en';
   $content = file_get_contents($url);
   $first_step = explode( '<div class="content" itemprop="softwareVersion">' , $content );
   $second_step = explode("</div>" , $first_step[1] );
  return $second_step[0];
 }
 
}
?>