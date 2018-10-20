<?php
if(isset($_GET["action"])){
if($_GET["action"]=='DisplayNotifications'){
if(isset($_GET["subscriptionList"])){
echo $_GET["subscriptionList"];
$subscriptionList=json_decode($_GET["subscriptionList"]);
/* Get list of NewsFeed */

$content='[';
$content.='{';
$content.='"standard_hook":[],';
$content.='"premium_hook":[],';
$content.='"biz_newsfeed":[],';
$content.='"union_newsfeed":[],';
$content.='"movement":[],';
$content.='"community_msg":[],';
$content.='"personal_msg":[],';
$content.='"frndRequest":[],';
$content.='}';
$content.=']';
} else { echo 'MISSING_SUBSCRIPTION_LIST'; }
} else { echo 'ACTION_REQUIRED'; }
} else { echo 'MISSING_ACTION'; }
?>