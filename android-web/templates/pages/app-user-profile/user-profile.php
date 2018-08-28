<style>
a[href^="http://maps.google.com/maps"]{display:none !important}
a[href^="https://maps.google.com/maps"]{display:none !important}
.gmnoprint a, .gmnoprint span, .gm-style-cc { display:none; }
body { overflow-y: hidden; }
</style>
<script type="text/javascript" src="js/pages/app-user-profile-tab-user-profile.js"></script>
<script type="text/javascript">
var GLOBAL_MAP;
var GLOBAL_ZOOMLEVEL;
var GLOBAL_MARKER;
var GLOBAL_MARKER1;
var GLOBAL_MARKER2;
var GLOBAL_POSITION;
var GLOBAL_POSITION1;
var GLOBAL_POSITION2;
 setInterval(function(){ latestGPSPositions(); },1000);
function currentUserMobileGPS(){
 var userMobileDevice=JSON.parse(Android.getUserMobileGPSPosition());
 var currentPosition={lat:parseFloat(userMobileDevice.latitude),lng:parseFloat(userMobileDevice.longitude)};
 return currentPosition;
}

function latestGPSPositions_Own(){
  GLOBAL_POSITION=currentUserMobileGPS();
  GLOBAL_MARKER.setPosition( GLOBAL_POSITION );
  GLOBAL_MAP.setCenter(GLOBAL_POSITION);
}

function latestGPSPositions_Other(){
 js_ajax("GET",PROJECT_URL+"backend/php/dac/controller.module.app.user.authentication.php",
 { action:'GET_USER_GEOLOCATION', user_Id:APP_USERPROFILE_ID },function(response){
   response=JSON.parse(response);
   if(response.length>0){
    var user_Id=response[0].user_Id;
    var cur_lat=response[0].cur_lat;
    var cur_long=response[0].cur_long;
    var geoUpdatedOn=response[0].geoUpdatedOn;
    GLOBAL_POSITION1=currentUserMobileGPS();
    GLOBAL_POSITION2={ lat: parseFloat(cur_lat), lng: parseFloat(cur_long) };
    GLOBAL_MARKER1.setPosition( GLOBAL_POSITION1 );
    GLOBAL_MARKER2.setPosition( GLOBAL_POSITION2 );
    GLOBAL_MAP.setCenter(GLOBAL_POSITION2);
   }
 });
}

function latestGPSPositions(){
 if(Android!==undefined){
    if(APP_USERPROFILE_ID === AUTH_USER_ID){ /* User is viewing his own profile */
	  latestGPSPositions_Own();
	}
	else { /* User is viewing other's profile */
	  latestGPSPositions_Other();
	}
 }
}
function initMap() {
/* Check APP_USERPROFILE_ID == AUTH_USER_ID */
if(Android!==undefined){
 if($('#user-profile-map-div').hasClass('hide-block')){ $('#user-profile-map-div').removeClass('hide-block'); }
 if(APP_USERPROFILE_ID === AUTH_USER_ID){ /* User is viewing his own profile */
   initOwnMap();
 }
 else { /* User is viewing other's profile */
   initOthersMap();
 }
}
}
function initOwnMap(){
 GLOBAL_POSITION=currentUserMobileGPS();
 GLOBAL_ZOOMLEVEL=18;
 GLOBAL_MAP = new google.maps.Map(document.getElementById('userActualGeoLocationMap'),{ zoom: GLOBAL_ZOOMLEVEL });
 GLOBAL_MARKER = new google.maps.Marker({ icon: {
            path: google.maps.SymbolPath.CIRCLE, scale: 4, fillOpacity: 1, 
			strokeWeight:4, fillColor:"#0ba0da", strokeColor:"#0ba0da" },
            position: GLOBAL_POSITION, map: GLOBAL_MAP });
 var circle = new google.maps.Circle({ map: GLOBAL_MAP, radius: 50, /* 50 meters */
						strokeColor: '#0ba0da',strokeWeight:1,strokeOpacity: 0.5, fillColor: '#0ba0da', fillOpacity: 0.35 });
     circle.bindTo('center', GLOBAL_MARKER, 'position');
 GLOBAL_MAP.setCenter(GLOBAL_POSITION);
 GLOBAL_MARKER.setMap(GLOBAL_MAP);
}

function initOthersMap(){
  js_ajax("GET",PROJECT_URL+"backend/php/dac/controller.module.app.user.authentication.php",
          { action:'GET_USER_GEOLOCATION', user_Id:APP_USERPROFILE_ID },
		  function(response){
		      try {
			    Android.showToast(response);
				response=JSON.parse(response);
				if(response.length>0){
					var user_Id=response[0].user_Id;
					var cur_lat=response[0].cur_lat;
					var cur_long=response[0].cur_long;
					var geoUpdatedOn=response[0].geoUpdatedOn;
					GLOBAL_POSITION1=currentUserMobileGPS();
					
					GLOBAL_POSITION2={ lat: parseFloat(cur_lat), lng: parseFloat(cur_long) };
					Android.showToast(JSON.stringify(GLOBAL_POSITION1));
					Android.showToast("GLOBAL_POSITION2: "+JSON.stringify(GLOBAL_POSITION2)+" cur_lat: "+parseFloat(cur_lat)+" cur_long: "+parseFloat(cur_long));
					GLOBAL_ZOOMLEVEL=18;
					GLOBAL_MAP = new google.maps.Map(document.getElementById('userActualGeoLocationMap'), 
									{ zoom: GLOBAL_ZOOMLEVEL });

					GLOBAL_MARKER1 = new google.maps.Marker({ icon: { path: google.maps.SymbolPath.CIRCLE, scale: 4, 
																	  fillOpacity: 1, strokeWeight:4, fillColor:"#0ba0da", 
																	  strokeColor:"#0ba0da" },
															  position: GLOBAL_POSITION1, map: GLOBAL_MAP });
					var circle = new google.maps.Circle({ map: GLOBAL_MAP, radius: 50, strokeColor: '#0ba0da', 
														  strokeWeight:1,strokeOpacity: 0.5, fillColor: '#0ba0da', 
														  fillOpacity: 0.35 });
						circle.bindTo('center', GLOBAL_MARKER1, 'position');

					GLOBAL_MARKER1.setMap(GLOBAL_MAP);
					GLOBAL_MARKER2 = new google.maps.Marker({ icon:'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
															  position: GLOBAL_POSITION2, map: GLOBAL_MAP });
					GLOBAL_MAP.setCenter(GLOBAL_POSITION2);
					GLOBAL_MARKER2.setMap(GLOBAL_MAP);
				}
		} catch(err){ Android.showToast(err); }
	});
}
</script>
<div id="user-profile-general-content"></div>

<div id="user-profile-map-div" class="list-group mbot15p hide-block">
  <div class="list-group-item custom-font">
    <b>User's Current Geolocation&nbsp;<i class="fa fa-angle-double-down pull-right" aria-hidden="true"></i></b>
  </div>
  <div class="list-group-item pad0">
    <div id="userActualGeoLocationMap" style="width:100%;height:400px;background-color:#eee;"></div>
  </div>
</div>