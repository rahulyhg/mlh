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
 if(navigator.geolocation) {
 navigator.geolocation.getCurrentPosition(function(position) {
 var pos = { lat: position.coords.latitude, lng: position.coords.longitude };
 GLOBAL_MAP.setCenter(pos);
 var marker = new google.maps.Marker({ position: pos, map: GLOBAL_MAP });
 });
 } 
}
function zoomIn() {
 if(GLOBAL_ZOOMLEVEL<18) { GLOBAL_ZOOMLEVEL=GLOBAL_ZOOMLEVEL+1; GLOBAL_MAP.setZoom(GLOBAL_ZOOMLEVEL); }
}
function zoomOut() {
 if(GLOBAL_ZOOMLEVEL>=4) { GLOBAL_ZOOMLEVEL=GLOBAL_ZOOMLEVEL-1;GLOBAL_MAP.setZoom(GLOBAL_ZOOMLEVEL); }
}
</script>
User profile
<div class="list-group">
  <div align="center" class="list-group-item"><b>User Current Geolocation</b></div>
  <div class="list-group-item pad0">
    <div id="userActualGeoLocationMap" style="width:100%;height:400px;background-color:#eee;"></div>
  </div>
  <div class="list-group-item pad0">
   <div class="container-fluid pad0">
    <button class="btn btn-default col-xs-6"><b><i class="fa fa-search-plus" aria-hidden="true"></i>&nbsp;Zoom-In</b></button>
    <button class="btn btn-default col-xs-6"><b><i class="fa fa-search-minus" aria-hidden="true"></i>&nbsp;Zoom-Out</b></button>
   </div>
  </div>
</div>