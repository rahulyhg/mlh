<!DOCTYPE html>
<html lang="en">
<head>
  <title>Specifications:::MyLocalHook</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
document.getElementById("os-system").innerHTML=navigator.userAgent;
document.getElementById("screen-width").innerHTML =screen.width+'px';
document.getElementById("screen-height").innerHTML =screen.height+'px';
document.getElementById("screen-availWidth").innerHTML =screen.availWidth+'px';
document.getElementById("screen-availHeight").innerHTML =screen.availHeight+'px';
document.getElementById("window-innerWidth").innerHTML =window.innerWidth+'px';
document.getElementById("window-innerHeight").innerHTML =window.innerHeight+'px';
});
</script>
<!-- xs-divison < 768px
     sm-divison >= 768px
     md-divison >= 992px
     lg-divison >= 1200px
-->
<style>
@media screen and (max-width: 768px) and (orientation: portrait) {

} 
@media screen and (max-width: 768px) and (orientation: landscape) {

} 
@media screen and (min-width: 768px) and (max-width: 992px) and (orientation: portrait) {

}
@media screen and (min-width: 768px) and (max-width: 992px) and (orientation: landscape) {

}
@media screen and (min-width: 992px) and (max-width: 1200px) and (orientation: portrait) {

}
@media screen and (min-width: 992px) and (max-width: 1200px) and (orientation: landscape) {

}
@media screen and (min-width: 1200px) and (orientation: portrait) {

}
@media screen and (min-width: 1200px) and (orientation: landscape) {

}
</style>
</head>
<body>

<div id="xs-divison" class="container-fluid">
<div class="row">
<div class="col-md-4 col-sm-4 col-xs-12"><b>XS-DIVISION</b></div>
<div class="col-md-4 col-sm-4 col-xs-12">
<div id="os-system"></div>	
<div id="screen-width"></div>	
<div id="screen-height"></div>	
<div id="screen-availWidth"></div>	
<div id="screen-availHeight"></div>	
<div id="window-innerWidth"></div>	
<div id="window-innerHeight"></div>	
</div>
</div>
</div>

<div id="sm-divison" class="container-fluid">
<div class="row">
<div class="col-md-4 col-sm-4 col-xs-12"><b>SM-DIVISION</b></div>
<div class="col-md-4 col-sm-4 col-xs-12">
<div id="os-system"></div>	
<div id="screen-width"></div>	
<div id="screen-height"></div>	
<div id="screen-availWidth"></div>	
<div id="screen-availHeight"></div>	
<div id="window-innerWidth"></div>	
<div id="window-innerHeight"></div>	
</div>
</div>
</div>

<div id="md-divison" class="container-fluid">
<div class="row">
<div class="col-md-4 col-sm-4 col-xs-12"><b>MD-DIVISION</b></div>
<div class="col-md-4 col-sm-4 col-xs-12">
<div id="os-system"></div>	
<div id="screen-width"></div>	
<div id="screen-height"></div>	
<div id="screen-availWidth"></div>	
<div id="screen-availHeight"></div>	
<div id="window-innerWidth"></div>	
<div id="window-innerHeight"></div>	
</div>
</div>
</div>

<div id="lg-divison" class="container-fluid">
<div class="row">
<div class="col-md-4 col-sm-4 col-xs-12"><b>LG-DIVISION</b></div>
<div class="col-md-4 col-sm-4 col-xs-12">
<div id="os-system"></div>	
<div id="screen-width"></div>	
<div id="screen-height"></div>	
<div id="screen-availWidth"></div>	
<div id="screen-availHeight"></div>	
<div id="window-innerWidth"></div>	
<div id="window-innerHeight"></div>	
</div>
</div>
</div>

</body>
</html>
