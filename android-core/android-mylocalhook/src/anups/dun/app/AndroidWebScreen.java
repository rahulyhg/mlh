package anups.dun.app;

import android.os.Bundle;
import android.os.Handler;
import android.provider.Settings;
import android.text.Html;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.ClipData;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.os.Build;
import android.view.KeyEvent;
import android.view.View;
import android.view.Window;
import android.webkit.ValueCallback;
import android.webkit.WebSettings;
import android.webkit.WebView;
import anups.dun.app.R;
import anups.dun.constants.BusinessConstants;
import anups.dun.db.js.AppSQLiteUsrFrndsContactsInfo;
import anups.dun.js.AppManagement;
import anups.dun.js.AppNotifyManagement;
import anups.dun.js.AppPermissions;
import anups.dun.js.AppSQLiteManagement;
import anups.dun.js.AppSessionManagement;
import anups.dun.media.AndroidWebScreenVideo;
import anups.dun.util.AndroidLogger;
import anups.dun.util.NetworkUtility;
import anups.dun.util.PropertyUtility;
import anups.dun.web.templates.URLGenerator;
import java.io.File;

@SuppressLint({ "NewApi", "ShowToast", "ResourceAsColor" })
public  class AndroidWebScreen extends Activity  {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(AndroidWebScreen.class);
	public static final Handler googleAdMobInterstitialHandler = new Handler();
	public static Runnable googleAdMobRunnable;
	public static final int INPUT_FILE_REQUEST_CODE = 1;
    public static final String TAG = AndroidWebScreen.class.getSimpleName();
    public WebView webView;
    public WebSettings webSettings;
    public ValueCallback<Uri[]> mFilePathCallback;
    public ValueCallback<Uri> mUploadMessage;
    public Uri mCapturedImageURI = null;
    public String mCameraPhotoPath = null;
    public long size = 0;
    public String FILE_CHOOSER_VERSION;
    Intent captureIntent;
    /* GPS Location Tracing : Start */

    /* GPS Location Tracing : End */
    
    
   
    
    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
    // Toast.makeText(getBaseContext(), "I am at Activity Result", Toast.LENGTH_LONG).show();
    // Toast.makeText(getBaseContext(), "requestCode:"+requestCode+" resultCode: "+resultCode+" data:"+data, Toast.LENGTH_LONG).show();  
     //  ANDROID_LOLLIPOP  ANDROID_5.0  ANDROID_3.0 ANDROID<3.0
    if(FILE_CHOOSER_VERSION.equalsIgnoreCase("ANDROID_3.0")){
    	if(this.mUploadMessage!=null){
	            Uri result=null;
	            try{
	                 if (resultCode != RESULT_OK) { result = null; } 
	                 else { // retrieve from the private variable if the intent is null
	                     result = data == null ? mCapturedImageURI : data.getData(); 
	                 } 
	             }
	             catch(Exception e) { logger.error("activity :"+e); }
	             mUploadMessage.onReceiveValue(result);
	             mUploadMessage = null;
	        }
    	
    } else {
      	if(resultCode==0) {
      	  Intent myintent=new Intent(AndroidWebScreen.this, AndroidWebScreen.class);
         	  this.startActivity(myintent);
      	} else {
  	        if (requestCode != INPUT_FILE_REQUEST_CODE || mFilePathCallback == null) {
  	            super.onActivityResult(requestCode, resultCode, data);
  	            return;
  	        }
  	        try {
  	            String file_path = mCameraPhotoPath.replace("file:","");
  	            File file = new File(file_path);
  	            size = file.length();
  	        } catch (Exception e){ logger.error("Error while opening image file" + e.getLocalizedMessage()); }
  	
  	        if (data != null || mCameraPhotoPath != null) {
  	            Integer count = 1;
  	            ClipData images = null;
  	            try { images = data.getClipData(); }
  	            catch (Exception e) { logger.error("Error while opening image file" + e.getLocalizedMessage()); }
  	
  	            if (images == null && data != null && data.getDataString() != null) {
  	                    count = data.getDataString().length();
  	            } else if (images != null) {
  	                    count = images.getItemCount();
  	            }
  	            Uri[] results = new Uri[count];
  	            
  	            // Check that the response is a good one
  	            if (resultCode == Activity.RESULT_OK) {
  	                if (size != 0) {
  	                   if (mCameraPhotoPath != null) {  // If there is not data, then we may have taken a photo
  	                        results = new Uri[]{Uri.parse(mCameraPhotoPath)};
  	                    }
  	                } else if (data.getClipData() == null) {
  	                    results = new Uri[]{Uri.parse(data.getDataString())};
  	                } else {
  	
  	                    for (int i = 0; i < images.getItemCount(); i++) {
  	                        results[i] = images.getItemAt(i).getUri();
  	                    }
  	                }
  	            }
  	
  	            mFilePathCallback.onReceiveValue(results);
  	            mFilePathCallback = null;
  	        }
        }
    }
      
    }





final private int REQUEST_CODE_ASK_PERMISSIONS = 123;

public boolean doesPermissionExist(String permission){ 
 boolean status=false;
 if(AndroidWebScreen.this.checkSelfPermission(permission) == PackageManager.PERMISSION_GRANTED){ 
	status=true; 
 }
 return status;
}

public void makeAPermission(String[] permissions){
	  requestPermissions(permissions,REQUEST_CODE_ASK_PERMISSIONS);  // 
}

@SuppressWarnings("deprecation")
@Override
public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] grantResults) {
	boolean permissionDenied = false;
	for(int index=0;index<permissions.length;index++){
	  switch (requestCode) {
        case REQUEST_CODE_ASK_PERMISSIONS:
        	if (grantResults[index] == PackageManager.PERMISSION_DENIED) { // Permission Granted
            	permissionDenied = true;
            }
         break;
        default:
            super.onRequestPermissionsResult(requestCode, permissions, grantResults);
     }
		if(permissionDenied){
			 // Permission Denied
	    	boolean showPermissionRationale=this.shouldShowRequestPermissionRationale(permissions[index]);
	    	if(!showPermissionRationale){
	    		AlertDialog.Builder builder  = new AlertDialog.Builder(this);
	    		StringBuilder msg=new StringBuilder();
	    		msg.append("<span style=\"font-size:12px;\">");
	    		msg.append("You need to provide access for this Permission from App Settings, ");
	    		msg.append("as you previously denied this Permission with \"Don't ask again\".");
	    		msg.append("<br/><br/>");
	    		msg.append("Click on \"App Permission Settings Video\" to view how to grant Permissions to the App.");
	    		msg.append("<br/>");
	    		msg.append("</span>");
	    		builder.setMessage(Html.fromHtml(msg.toString()));
	    		builder.setCancelable(false);
	    		builder.setPositiveButton("Go to App Permissions Settings", new DialogInterface.OnClickListener() {  
	                public void onClick(DialogInterface dialog, int id) {  
	                    finish();  
	                    Intent intent = new Intent(Settings.ACTION_APPLICATION_DETAILS_SETTINGS,  Uri.parse("package:" + getPackageName()));
	          			  intent.addCategory(Intent.CATEGORY_DEFAULT);
	          			  intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
	          			  startActivity(intent);
	                }  
	            }); 
	    		builder.setNegativeButton("App Permission Settings Video", new DialogInterface.OnClickListener() {  
	                public void onClick(DialogInterface dialog, int id) {  
	                		Intent intent = new Intent(AndroidWebScreen.this, AndroidWebScreenVideo.class);
	                		intent.putExtra("VIDEO_URL", new URLGenerator(AndroidWebScreen.this.getApplicationContext()).PROJECT_URL + "videos/AppPermissionGrants.mp4");
	                		intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
	                		startActivity(intent);
	                }  
	            });  
	    		AlertDialog alertDialog = builder.create();
	    		alertDialog.show();
	    	}
	    
		}
  }

}

// public static  appSessionManagement;
public boolean permissionsExist(){
	String[] permissions={"android.permission.WRITE_EXTERNAL_STORAGE","android.permission.READ_EXTERNAL_STORAGE",
      "android.permission.READ_CONTACTS","android.permission.WRITE_CONTACTS","android.permission.CAMERA",
      "android.permission.INTERNET","android.permission.ACCESS_NETWORK_STATE",
      "android.permission.ACCESS_WIFI_STATE","android.permission.ACCESS_COARSE_LOCATION",
      "android.permission.ACCESS_FINE_LOCATION"};
	boolean permissionRecognizer = true;
	for(int index=0;index<permissions.length;index++){
	  if(doesPermissionExist(permissions[index])==false){ permissionRecognizer=false;break; }
	}
  return permissionRecognizer;
}


@SuppressLint("SetJavaScriptEnabled")
@Override
protected void onCreate(Bundle savedInstanceState) {
 logger.info("MyLocalHook Activity Container Created...");
 super.onCreate(savedInstanceState);
 requestWindowFeature(Window.FEATURE_NO_TITLE);
 setContentView(R.layout.activity_androidwebscreen);

 AppManagement appManagement = new AppManagement(this);
 AppPermissions appPermissions = new AppPermissions(this);
 AppNotifyManagement appNotifyManagement = new AppNotifyManagement(this);
 AppSessionManagement appSessionManagement = new AppSessionManagement(this.getApplicationContext());
 AppSQLiteManagement appSQLiteManagement = new AppSQLiteManagement(this);
 
 AppSQLiteUsrFrndsContactsInfo appSQLiteUsrFrndsInfo = new AppSQLiteUsrFrndsContactsInfo(this.getApplicationContext());
  
 /* App Settings :: */
 /* Set Project Path And PropertyFiles */
 if(permissionsExist()){
   try {
    PropertyUtility propertyUtility = new PropertyUtility(this.getApplicationContext());
    String propertyFile = propertyUtility.initializePropertyFile(appSessionManagement);
    propertyUtility.readPropertyFile(appSessionManagement, propertyFile);
   } catch(Exception e){
	 logger.error("Exception: "+e);
   }
 }
  // try {
	  
    /* Creating Database Schema If it is not created */
  //  Database database =Database.getInstance(this);
 //   SQLiteDatabase sqLiteDatabase = database.connectDatabase();
  //  		database.onCreate(sqLiteDatabase);
  //  		database.getListOfTablesInDatabase(sqLiteDatabase);
  //  sqLiteDatabase.close();
  //  database.close();
    
   /* Contacts */
   // new WSUserFrndsContacts(this).execute("");
 
// }
// catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
 
 
 
 /* Alarm Services: */
 // AlarmIntervalDay.getInstance(this);
  
 
 /* Alarm Trigger for every Hour */
 // AlarmManager manager = (AlarmManager)this.getSystemService(Context.ALARM_SERVICE);
 // Intent alarmIntent = new Intent(this, StartupService.class);
 // logger.info("Alarm triggered");
 // PendingIntent pendingIntent = PendingIntent.getBroadcast(this, 0, alarmIntent, PendingIntent.FLAG_UPDATE_CURRENT);
 // manager.setRepeating(AlarmManager.RTC_WAKEUP, System.currentTimeMillis()+AlarmManager.INTERVAL_FIFTEEN_MINUTES, AlarmManager.INTERVAL_FIFTEEN_MINUTES, pendingIntent);


 
 /* Get UserID from SESSION */
 String USER_ID=appSessionManagement.getAndroidSession(BusinessConstants.AUTH_USER_ID);
 
 logger.info("USER_ID: "+USER_ID);
 
 /* Triggering Broadcast Receiver from Activity */
  Intent triggerWS = new Intent();
         triggerWS.setAction("anups.dun.services.StartupService");
         sendBroadcast(triggerWS);
 

 // NetworkUtility networkUtility = new NetworkUtility(this);
 // logger.info("IMEI: "+networkUtility.getDeviceIMEI());
 
 /* AUTHENTICATION REMINIDER : */  // awn.notify_authReminder();
 /* VERSION UPGRADE : */ // awn.notify_versionupgrade();
 /* NOTIFICATION : */ // awn.notify_appServices();
        
        webView = (WebView) findViewById(R.id.webView);
        webView.clearCache(true);
        webView.clearHistory();
        
        webSettings = webView.getSettings();
        webSettings.setJavaScriptEnabled(true);
        webSettings.setJavaScriptCanOpenWindowsAutomatically(true);
        webSettings.setDomStorageEnabled(true);
        
        webView.addJavascriptInterface(appManagement, "Android"); 
        webView.addJavascriptInterface(appPermissions,"AndroidPermissions");
        webView.addJavascriptInterface(appNotifyManagement, "AndroidNotify");
        webView.addJavascriptInterface(appSessionManagement, "AndroidSession"); 
        webView.addJavascriptInterface(appSQLiteManagement, "AndroidDatabase"); 
        webView.addJavascriptInterface(appSQLiteUsrFrndsInfo, "AndroidSQLiteUsrFrndsInfo"); 
        
        
        webView.setWebViewClient(new AndroidWebViewClient(this));
        webView.setWebChromeClient(new AndroidWebChromeClient(this));
        
        if (Build.VERSION.SDK_INT >= 19) { webView.setLayerType(View.LAYER_TYPE_HARDWARE, null); }
        else if (Build.VERSION.SDK_INT >= 11 && Build.VERSION.SDK_INT < 19) {
            webView.setLayerType(View.LAYER_TYPE_SOFTWARE, null);
        }
        
        NetworkUtility networkUtility=new NetworkUtility(this);
        if(networkUtility.checkInternetConnection()) {
        	Intent intent = getIntent();
            Bundle extras = intent.getExtras();
        	Uri data = intent.getData();
        	String directURL="file:///android_asset/www/app-default.html";
        	if(!permissionsExist()){
        		directURL="file:///android_asset/www/app-permissions.html";
        	} else {
        	if(data!=null){
        	  if("DEFAULT".equalsIgnoreCase(data.toString())) { 
        		directURL = appSessionManagement.getAndroidSession("PROPERTY_PROJECT_URL"); 
        	  } else { directURL = data.toString(); }
        	}
        	}
        	 logger.info("intent: "+intent);
        	 logger.info("extras: "+extras);
        	 logger.info("data: "+data);
        	 logger.info("directURL: "+directURL);
        	// logger.info("Recieve Intent Status: "+extras);
        	 	
        		/* Google AdMob Ads */
    			/*try {
    			  logger.info("MyLocalHook is invoking GoogleAdmobInterstitial Service...");
   			 	  String[] googleAdsParams = new String[1];
   			 	           googleAdsParams[0]=urlGenerator.ws_googleAds();
   			 	  WSGoogleAds wsGoogleAds = new WSGoogleAds(this);
   			 	              wsGoogleAds.execute(googleAdsParams);
    			}
    			catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
    			*/
        	    try {
        		 webView.loadUrl(directURL);
        	    }
        	    catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
        }
        else {
        	webView.loadUrl("file:///android_asset/www/network_state.html");
        }
       
    }


   @Override
   public void onBackPressed() {
	 logger.info("Activity OnBack Pressed ");
	 super.onBackPressed();
   } 

   @Override
   public void onDestroy() {
     logger.info("Activity Destroyed ");
     AppSessionManagement appSessionManagement = new AppSessionManagement(this);
     appSessionManagement.setAndroidSession(BusinessConstants.GOOGLE_ADMOBINTERSTITIAL_STATUS,null);
     AndroidWebScreen.googleAdMobInterstitialHandler.removeCallbacks(AndroidWebScreen.googleAdMobRunnable);
	 super.onDestroy();
   }

    public boolean onKeyDown(int keyCode, KeyEvent event) {
        // Check if the key event was the Back button and if there's history
        if ((keyCode == KeyEvent.KEYCODE_BACK) && webView.canGoBack()) {
            webView.goBack();
            return true;
        }
        // If it wasn't the Back key or there's no web page history, bubble up to the default
        // system behavior (probably exit the activity)

        return super.onKeyDown(keyCode, event);
    }


}