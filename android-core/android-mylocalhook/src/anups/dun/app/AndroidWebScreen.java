package anups.dun.app;

import android.os.Bundle;
import android.os.Environment;
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
import android.database.sqlite.SQLiteDatabase;
import android.net.Uri;
import android.os.Build;
import android.view.KeyEvent;
import android.view.View;
import android.view.Window;
import android.webkit.ValueCallback;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.widget.ProgressBar;
import android.widget.Toast;
import anups.dun.alarm.AlarmIntervalDay;
import anups.dun.alarm.AlarmIntervalHour;
import anups.dun.app.R;
import anups.dun.constants.BusinessConstants;
import anups.dun.db.Database;
import anups.dun.db.js.AppSQLiteUsrFrndsContactsInfo;
import anups.dun.db.tbl.UserFrndsContacts;
import anups.dun.db.tbl.UserFrndsProfile;
import anups.dun.js.AppManagement;
import anups.dun.js.AppNotifyManagement;
import anups.dun.js.AppSQLiteManagement;
import anups.dun.js.AppSessionManagement;
import anups.dun.media.AndroidWebScreenVideo;
import anups.dun.notify.ws.WSUserFrndsContacts;
import anups.dun.notify.ws.util.Notifications;
import anups.dun.notify.ws.WSGoogleAds;
import anups.dun.util.AndroidLogger;
import anups.dun.util.GPSTracker;
import anups.dun.util.NetworkUtility;
import anups.dun.web.templates.URLGenerator;
import java.io.File;

@SuppressLint({ "NewApi", "ShowToast" })
public  class AndroidWebScreen extends Activity  {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(AndroidWebScreen.class);
	public static final long LOGGER_FILESIZE=2097152; // 1 MB  (1048576)  2MB (2097152)
	public static final Handler googleAdMobInterstitialHandler = new Handler();
	public static Runnable googleAdMobRunnable;
	public static final int INPUT_FILE_REQUEST_CODE = 1;
    public static final String TAG = AndroidWebScreen.class.getSimpleName();
    public WebView webView;
    public WebSettings webSettings;
    public ProgressBar progressBar;
    public ValueCallback<Uri[]> mFilePathCallback;
    public ValueCallback<Uri> mUploadMessage;
    public Uri mCapturedImageURI = null;
    public String mCameraPhotoPath = null;
    public long size = 0;
    NetworkUtility ntwrkAvail;
    public String FILE_CHOOSER_VERSION;
    Intent captureIntent;
    /* GPS Location Tracing : Start */

    /* GPS Location Tracing : End */
    public void regulateLoggerFile(){
        String filePath=BusinessConstants.EXTERNALMEMORYPATH+"/mylocalhook/logs/log.txt";
 	    if(BusinessConstants.EXTERNALMEMORYPATH==null){
 		  filePath=BusinessConstants.INTERNALMEMORYPATH+"/mylocalhook/logs/log.txt";
 	    }
 	   File file = new File(filePath);
 	   long fileSize = Integer.parseInt(String.valueOf(file.length()));
 	   logger.info("Logger File Size: "+fileSize);
 	   if(fileSize>LOGGER_FILESIZE){ /* Delete File */
 		  boolean deleted = file.delete();
 		  if(deleted) { logger.info("Deleted Logger"); }
 		  else { logger.info("Not Deleted Logger"); } 
 	   } 
    }
    
   
    
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

public void createProjectPath(AppSessionManagement appSessionManagement){
  String filePath=BusinessConstants.EXTERNALMEMORYPATH+"/"+"mylocalhook";
  if(BusinessConstants.EXTERNALMEMORYPATH==null){
      filePath=BusinessConstants.INTERNALMEMORYPATH+"/"+"mylocalhook";
  }
  File externalDir = new File(filePath);
  if(!externalDir.exists()) { externalDir.mkdir();  }
  
  appSessionManagement.setAndroidSession(BusinessConstants.ANDROID_PROJECTPATH, filePath);
  
   /* String filePath=Environment.getExternalStorageDirectory().toString()+"/"+"mylocalhook";
    logger.info("State: "+Environment.getExternalStorageState()+"  filePath: " +filePath);
    File externalDir = new File(filePath);
    if(!externalDir.exists()){
    	try{
    	if(externalDir.mkdir()) { logger.info("Made a Directory: "); }
    	else {  logger.info("Not Made a Directory: "); }
    	; 
    	}
    	catch(Exception e){ logger.error("Made a Directory Exception: "+e); }
    }
    else {
    	Toast.makeText(getBaseContext(), "Not Made a Directory: ", Toast.LENGTH_LONG).show();
    } */
}

final private int REQUEST_CODE_ASK_PERMISSIONS = 123;

public boolean doesPermissionExist(String permission){ 
 boolean status=false;
 if(AndroidWebScreen.this.checkSelfPermission(permission) == PackageManager.PERMISSION_GRANTED){ 
	status=true; 
 }
 return status;
}

public void makeAPermission(String permission){
  requestPermissions(new String[] {permission},REQUEST_CODE_ASK_PERMISSIONS);  // 
}

@Override
public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] grantResults) {
	for(int index=0;index<permissions.length;index++){
	  switch (requestCode) {
        case REQUEST_CODE_ASK_PERMISSIONS:
            if (grantResults[0] == PackageManager.PERMISSION_GRANTED) { // Permission Granted
            	
            } else { // Permission Denied
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
                        		intent.putExtra("VIDEO_URL", URLGenerator.PROJECT_URL + "videos/AppPermissionGrants.mp4");
                        		intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                        		startActivity(intent);
                        }  
                    });  
            		AlertDialog alertDialog = builder.create();
            		alertDialog.show();
            	}
            	else {
            		
            	}
            }
         break;
        default:
            super.onRequestPermissionsResult(requestCode, permissions, grantResults);
     }
  }
}

public static AppSessionManagement appSessionManagement;

@SuppressLint("SetJavaScriptEnabled")
@Override
protected void onCreate(Bundle savedInstanceState) {
 logger.info("MyLocalHook Activity Container Created...");
 super.onCreate(savedInstanceState);
 requestWindowFeature(Window.FEATURE_NO_TITLE);
 // getWindow().requestFeature(Window.FEATURE_PROGRESS);
 setContentView(R.layout.activity_androidwebscreen);
 
 URLGenerator urlGenerator = new URLGenerator();
 
 AppManagement appManagement = new AppManagement(this);
 AppNotifyManagement appNotifyManagement = new AppNotifyManagement(this);
  appSessionManagement = new AppSessionManagement(this);
 AppSQLiteManagement appSQLiteManagement = new AppSQLiteManagement(this);
 
 AppSQLiteUsrFrndsContactsInfo appSQLiteUsrFrndsInfo = new AppSQLiteUsrFrndsContactsInfo(this);
 
 /* Set Project Path */
 if(appSessionManagement.getAndroidSession(BusinessConstants.ANDROID_PROJECTPATH)==null){
   createProjectPath(appSessionManagement);
 }
 
 /* Regulates the Logger File Size upto 2 MB */
 regulateLoggerFile();
 
 
 
  try {
	  
    /* Creating Database Schema If it is not created */
    Database database =Database.getInstance(this);
    SQLiteDatabase sqLiteDatabase = database.connectDatabase();
    		database.onCreate(sqLiteDatabase);
    		database.getListOfTablesInDatabase(sqLiteDatabase);
    sqLiteDatabase.close();
    database.close();
    
   /* Contacts */
   // new WSUserFrndsContacts(this).execute("");
 
 }
 catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
 
 
 
 /* Alarm Services: */
 // AlarmIntervalDay.getInstance(this);
 // AlarmIntervalHour.getInstance(this);
 
 
 
 progressBar = (ProgressBar) findViewById(R.id.progressBar);
 progressBar.setVisibility(View.VISIBLE);
 
 /* Alarm Trigger for every Hour */
 // AlarmManager manager = (AlarmManager)this.getSystemService(Context.ALARM_SERVICE);
 // Intent alarmIntent = new Intent(this, OnBootCompleted.class);
 // logger.info("Alarm triggered");
 // PendingIntent pendingIntent = PendingIntent.getBroadcast(this, 0, alarmIntent, PendingIntent.FLAG_UPDATE_CURRENT);
 // manager.setRepeating(AlarmManager.RTC_WAKEUP, System.currentTimeMillis()+AlarmManager.INTERVAL_FIFTEEN_MINUTES, AlarmManager.INTERVAL_FIFTEEN_MINUTES, pendingIntent);

 
 
 /* Initially, Setting Service Execution to null */
 appSessionManagement.setAndroidSession(BusinessConstants.BGSERVICE_EXECUTION_STATUS,null); 
 
 /* Get UserID from SESSION */
 String USER_ID=appSessionManagement.getAndroidSession(BusinessConstants.AUTH_USER_ID);
 if(USER_ID==null){ /* Show SignIn/Register Popup Notification */
	 new Notifications(this).notify_show_signInRegister();
 } else { /* Hide SignIn/Register Popup Notification */
	 new Notifications(this).notify_hide_signInRegister();
 }
 logger.info("USER_ID: "+USER_ID);
 
 /* Triggering Broadcast Receiver from Activity */
// Intent triggerWS = new Intent();
// triggerWS.setAction("anups.dun.services.OnBootCompleted");
// sendBroadcast(triggerWS);
 

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
        
        ntwrkAvail=new NetworkUtility(this);
        if(ntwrkAvail.checkInternetConnection()) {
        	Intent intent = getIntent();
        	// Bundle extras = intent.getExtras();
        	Uri data = intent.getData();
        	String directURL="file:///android_asset/www/app-default.html";
        	// String directURL="file:///android_asset/www/app-default.html";
        	/* if(extras != null) {
        		directURL = extras.getString("DIRECT_URL");
        	} 
        	else */ if(data!=null){
        		directURL = data.toString();
        	}
        	 logger.info("intent: "+intent);
        	// logger.info("extras: "+extras);
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

/*
   @Override
   public void onBackPressed() {
	 logger.info("Activity OnBack Pressed ");
    return;
   }  */ 

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