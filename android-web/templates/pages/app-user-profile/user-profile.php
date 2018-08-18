<style>
a[href^="http://maps.google.com/maps"]{display:none !important}
a[href^="https://maps.google.com/maps"]{display:none !important}

.gmnoprint a, .gmnoprint span, .gm-style-cc {
    display:none;
}
body { overflow-y: hidden; }
</style>
<script type="text/javascript">
var GLOBAL_MAP;
var GLOBAL_ZOOMLEVEL;
$(document).ready(function(){ initMap(); });
function initMap() {
 GLOBAL_ZOOMLEVEL=18;
 GLOBAL_MAP = new google.maps.Map(document.getElementById('userActualGeoLocationMap'), 
					{ scrollwheel: false, zoomControl: false, zoom: GLOBAL_ZOOMLEVEL });
 var pos1 = { lat: 17.2983179, lng: 78.4298406 };
 var pos2 = { lat: 17.2993189, lng: 78.4298416 };
 GLOBAL_MAP.setCenter(pos2);
 
 /* Marker Icons : http://maps.google.com/mapfiles/ms/icons/green-dot.png
  *				   http://maps.google.com/mapfiles/ms/icons/blue-dot.png
  *				   http://maps.google.com/mapfiles/ms/icons/red-dot.png
  */
 var marker1 = new google.maps.Marker({ icon:'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
 position: pos1,animation: google.maps.Animation.BOUNCE, map: GLOBAL_MAP });
 marker1.setMap(GLOBAL_MAP);
 var marker2 = new google.maps.Marker({ icon:'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
 position: pos2,animation: google.maps.Animation.BOUNCE, map: GLOBAL_MAP });
 marker2.setMap(GLOBAL_MAP);
}
function zoomIn() {
 if(GLOBAL_ZOOMLEVEL<18) { GLOBAL_ZOOMLEVEL=GLOBAL_ZOOMLEVEL+1; GLOBAL_MAP.setZoom(GLOBAL_ZOOMLEVEL); }
}
function zoomOut() {
 if(GLOBAL_ZOOMLEVEL>=4) { GLOBAL_ZOOMLEVEL=GLOBAL_ZOOMLEVEL-1;GLOBAL_MAP.setZoom(GLOBAL_ZOOMLEVEL); }
}
</script>
<!--a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/user/USR255798352927">User profile</a-->
<div class="list-group mbot15p">
  <div class="list-group-item">
    <b>User Current Geolocation&nbsp;<i class="fa fa-angle-double-down pull-right" aria-hidden="true"></i></b>
  </div>
  <div class="list-group-item pad0">
    <div id="userActualGeoLocationMap" style="width:100%;height:400px;background-color:#eee;"></div>
  </div>
  <div class="list-group-item pad0">
  <div class="container-fluid pad0">
    <button class="btn btn-default col-xs-6" onclick="javascript:zoomOut();">
	  <b><i class="fa fa-search-minus" aria-hidden="true"></i>&nbsp;Zoom-Out</b>
	</button>
    <button class="btn btn-default col-xs-6" onclick="javascript:zoomIn();">
	  <b><i class="fa fa-search-plus" aria-hidden="true"></i>&nbsp;Zoom-In</b>
	</button>
   </div>
  </div>
  <div class="list-group-item pad0">
    <div class="container-fluid">
	  <div class="col-xs-6">
		       <div align="right" class="mtop15p"><img src="http://maps.google.com/mapfiles/ms/icons/blue-dot.png"/></div>
			   <div align="right" class="mtop15p" style="line-height:22px;">
				  <b>Your Location</b>&nbsp;last updated on 15 August 1991, 10:12:10 PM
			   </div>
	  </div>
	  <div class="col-xs-6" style="border-left:1px solid #eee;">
		       <div align="left" class="mtop15p"><img src="http://maps.google.com/mapfiles/ms/icons/green-dot.png"/></div>
			   <div align="left" class="mtop15p"><b>SurName Name's Location</b>&nbsp;last updated on 15 August 1991, 10:12:10 PM</div>
	  </div>
	</div>
  </div>
</div>