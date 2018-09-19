<?php
if(isset($_GET["action"])){
if($_GET["action"]=='MEMBERS'){
$content='[{"id":"1","name": "Afghanistan", "image": "http://192.168.1.4/mlh/android-web/images/logo-blue.jpg"},';
$content.='{"id":"2","name": "Albania", "image": "http://192.168.1.4/mlh/android-web/images/logo-orange.jpg"}, ';
$content.='{"id":"3","name": "Algeria", "image": "http://192.168.1.4/mlh/android-web/images/logo-yellow.jpg"}, ';
$content.='{"id":"4","name": "American Samoa", "image": "http://192.168.1.4/mlh/android-web/images/logo-blue.jpg"}, ';
$content.='{"id":"5","name": "AndorrA", "image": "http://192.168.1.4/mlh/android-web/images/logo-orange.jpg"}, ';
$content.='{"id":"6","name": "Angola", "image": "http://192.168.1.4/mlh/android-web/images/logo-yellow.jpg"}, ';
$content.='{"id":"7","name": "Anguilla", "image": "http://192.168.1.4/mlh/android-web/images/logo-blue.jpg"}, ';
$content.='{"id":"8","name": "Antarctica", "image": "http://192.168.1.4/mlh/android-web/images/logo-orange.jpg"}, ';
$content.='{"id":"9","name": "Antigua and Barbuda", "image": "http://192.168.1.4/mlh/android-web/images/logo-yellow.jpg"}, ';
$content.='{"id":"10","name": "Argentina", "image": "http://192.168.1.4/mlh/android-web/images/logo-blue.jpg"}, ';
$content.='{"id":"11","name": "Armenia", "image": "http://192.168.1.4/mlh/android-web/images/logo-orange.jpg"}, ';
$content.='{"id":"12","name": "Aruba", "image": "http://192.168.1.4/mlh/android-web/images/logo-yellow.jpg"}, ';
$content.='{"id":"13","name": "Australia", "image": "http://192.168.1.4/mlh/android-web/images/logo-blue.jpg"},';
$content.='{"id":"14","name": "Austria", "image": "http://192.168.1.4/mlh/android-web/images/logo-orange.jpg"}, ';
$content.='{"id":"15","name": "Azerbaijan", "image": "http://192.168.1.4/mlh/android-web/images/logo-yellow.jpg"},'; 
$content.='{"id":"16","name": "Bahamas", "image": "http://192.168.1.4/mlh/android-web/images/logo-blue.jpg"}, ';
$content.='{"id":"17","name": "Bahrain", "image": "http://192.168.1.4/mlh/android-web/images/logo-orange.jpg"}]';
echo $content;
} }
?>