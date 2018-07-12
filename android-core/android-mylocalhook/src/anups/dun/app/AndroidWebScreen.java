package anups.dun.app;

import android.os.Bundle;
import android.os.Environment;
import android.os.Handler;
import android.provider.Settings;
import android.support.v4.content.ContextCompat;
import android.text.Html;
import android.text.SpannableString;
import android.text.method.LinkMovementMethod;
import android.text.util.Linkify;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.Manifest;
import android.annotation.SuppressLint;
import android.annotation.TargetApi;
import android.app.Activity;
import android.app.AlarmManager;
import android.app.AlertDialog;
import android.app.PendingIntent;
import android.content.BroadcastReceiver;
import android.content.ClipData;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.IntentFilter;
import android.content.pm.PackageManager;
import android.database.sqlite.SQLiteDatabase;
import android.graphics.Color;
import android.net.Uri;
import android.os.Build;
import android.view.KeyEvent;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.webkit.ValueCallback;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;
import anups.dun.ads.GoogleAdmob;
import anups.dun.ads.GoogleAdmobInterstitial;
import anups.dun.app.R;
import anups.dun.constants.BusinessConstants;
import anups.dun.db.Database;
import anups.dun.js.AppManagement;
import anups.dun.js.AppNotifyManagement;
import anups.dun.js.AppPermissions;
import anups.dun.js.AppSessionManagement;
import anups.dun.media.AndroidWebScreenVideo;
import anups.dun.services.BGService;
import anups.dun.services.OnBootCompleted;
import anups.dun.util.AndroidLogger;
import anups.dun.util.NetworkAvailability;
import anups.dun.web.templates.URLGenerator;

import java.io.File;
import java.util.ArrayList;

@SuppressLint({ "NewApi", "ShowToast" })
public  class AndroidWebScreen extends Activity  {

	org.apache.log4j.Logger logger = AndroidLogger.getLogger(AndroidWebScreen.class);
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
    NetworkAvailability ntwrkAvail;
    public String FILE_CHOOSER_VERSION;
    Intent captureIntent;
    Database mydb;
    /* GPS Location Tracing : Start */

    /* GPS Location Tracing : End */
    
    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
    // Toast.makeText(getBaseContext(), "I am at Activity Result", Toast.LENGTH_LONG).show();
    // Toast.makeText(getBaseContext(), "requestCode:"+requestCode+" resultCode: "+resultCode+" data:"+data, Toast.LENGTH_LONG).show();  
     //  ANDROID_LOLLIPOP  ANDROID_5.0  ANDROID_3.0 ANDROID<3.0
    if(FILE_CHOOSER_VERSION.equalsIgnoreCase("ANDROID_3.0")){
    	if(this.mUploadMessage!=null){
    		// Toast.makeText(getApplicationContext(), "mUploadMessage :"+mUploadMessage, Toast.LENGTH_LONG).show();
	            Uri result=null;
	             
	            try{
	                 if (resultCode != RESULT_OK) {
	                      
	                     result = null;
	                      
	                 } else {
	                      
	                     // retrieve from the private variable if the intent is null
	                     result = data == null ? mCapturedImageURI : data.getData(); 
	                 } 
	             }
	             catch(Exception e)
	             {
	                 Toast.makeText(getApplicationContext(), "activity :"+e, Toast.LENGTH_LONG).show();
	             }
	              
	             mUploadMessage.onReceiveValue(result);
	             mUploadMessage = null;
	        	
	        }
    	
    } else {
    	// Toast.makeText(getBaseContext(), "mFilePathCallback: "+mFilePathCallback, Toast.LENGTH_LONG).show(); 
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
  	           // Toast.makeText(getBaseContext(), "mCameraPhotoPath:"+mCameraPhotoPath+" fileSize: "+size, Toast.LENGTH_LONG).show();
  	        }catch (Exception e){
  	        	 Toast.makeText(getBaseContext(), "Error while opening image file" + e.getLocalizedMessage(), Toast.LENGTH_LONG).show();
  	        }
  	
  	        if (data != null || mCameraPhotoPath != null) {
  	            Integer count = 1;
  	            ClipData images = null;
  	            try {
  	                images = data.getClipData();
  	               // Toast.makeText(getBaseContext(), "ClipDataImages:"+images, Toast.LENGTH_LONG).show();
  	            }catch (Exception e) {
  	            	Toast.makeText(getBaseContext(), "Error while opening image file" + e.getLocalizedMessage(), Toast.LENGTH_LONG).show();
  	            }
  	
  	            if (images == null && data != null && data.getDataString() != null) {
  	                    count = data.getDataString().length();
  	            } else if (images != null) {
  	                    count = images.getItemCount();
  	            }
  	            Uri[] results = new Uri[count];
  	            
  	            // Toast.makeText(getBaseContext(), "count:"+count+" resultCode: "+resultCode, Toast.LENGTH_LONG).show();
  	            // Check that the response is a good one
  	            if (resultCode == Activity.RESULT_OK) {
  	                if (size != 0) {
  	                    // If there is not data, then we may have taken a photo
  	                    if (mCameraPhotoPath != null) {
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

public void createProjectPath(){
	 String filePath=Environment.getExternalStorageDirectory().toString()+"/"+"mylocalhook";
   /* if(BusinessConstants.EXTERNALMEMORYPATH==null){
	   filePath=BusinessConstants.INTERNALMEMORYPATH+"/"+"mylocalhook";
    } */
    Toast.makeText(getBaseContext(), "State: "+Environment.getExternalStorageState()+"  filePath: " +filePath, Toast.LENGTH_LONG).show();
    File externalDir = new File(filePath);
    if(!externalDir.exists()){
    	try{
    	if(externalDir.mkdir()) {
    		Toast.makeText(getBaseContext(), "Made a Directory: ", Toast.LENGTH_LONG).show();	
    	}
    	else {
    		Toast.makeText(getBaseContext(), "Not Made a Directory: ", Toast.LENGTH_LONG).show();
    	}
    	; 
    	}
    	catch(Exception e){ Toast.makeText(getBaseContext(), "Made a Directory Exception: "+e, Toast.LENGTH_LONG).show(); }
    }
    else {
    	Toast.makeText(getBaseContext(), "Not Made a Directory: ", Toast.LENGTH_LONG).show();
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


@SuppressLint("SetJavaScriptEnabled")
@Override
protected void onCreate(Bundle savedInstanceState) {
 logger.info("MyLocalHook Activity Container Created...");
 super.onCreate(savedInstanceState);
 requestWindowFeature(Window.FEATURE_NO_TITLE);
 // getWindow().requestFeature(Window.FEATURE_PROGRESS);
 setContentView(R.layout.activity_androidwebscreen);
 
 /* Permissions List: */
 
 
 /* Google AdMob Ads */
 logger.info("MyLocalHook is invoking GoogleAdmobInterstitial Service...");
 GoogleAdmobInterstitial.loadInterstitial(this);
 
 progressBar = (ProgressBar) findViewById(R.id.progressBar);
 progressBar.setVisibility(View.VISIBLE);
 
 /* Alarm Trigger for every Hour */
 // AlarmManager manager = (AlarmManager)this.getSystemService(Context.ALARM_SERVICE);
 // Intent alarmIntent = new Intent(this, OnBootCompleted.class);
 // logger.info("Alarm triggered");
 // PendingIntent pendingIntent = PendingIntent.getBroadcast(this, 0, alarmIntent, PendingIntent.FLAG_UPDATE_CURRENT);
 // manager.setRepeating(AlarmManager.RTC_WAKEUP, System.currentTimeMillis()+AlarmManager.INTERVAL_FIFTEEN_MINUTES, AlarmManager.INTERVAL_FIFTEEN_MINUTES, pendingIntent);

 AppManagement appManagement = new AppManagement(this);
 AppNotifyManagement appNotifyManagement = new AppNotifyManagement(this);
 AppSessionManagement appSessionManagement = new AppSessionManagement(this);
 
 /* Initially, Setting Service Execution to null */
 appSessionManagement.setAndroidSession(BusinessConstants.BGSERVICE_EXECUTION_STATUS,null); 
 
/* DATABASE */
 try {
	mydb = Database.getInstance(this);
  logger.info("Rows: "+mydb.numberOfRows());
 } catch(Exception e) { logger.error("Exception: "+e.getMessage()); }
 /* Get UserID from SESSION */
 String USER_ID=appSessionManagement.getAndroidSession(BusinessConstants.AUTH_USER_ID);
 logger.info("USER_ID: "+USER_ID);
 
 /* Triggering Broadcast Receiver from Activity */
 Intent triggerWS = new Intent();
 triggerWS.setAction("anups.dun.services.OnBootCompleted");
 sendBroadcast(triggerWS);
 

 
 
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
        webView.setWebViewClient(new AndroidWebViewClient(this));
        webView.setWebChromeClient(new AndroidWebChromeClient(this));
        
        if (Build.VERSION.SDK_INT >= 19) { webView.setLayerType(View.LAYER_TYPE_HARDWARE, null); }
        else if (Build.VERSION.SDK_INT >= 11 && Build.VERSION.SDK_INT < 19) {
            webView.setLayerType(View.LAYER_TYPE_SOFTWARE, null);
        }
        
        ntwrkAvail=new NetworkAvailability(this);
        if(ntwrkAvail.checkInternetConnection()) {
        	Bundle extras = getIntent().getExtras();
        	logger.info("Recieve Intent Status: "+extras);
        	if (extras != null) {
        		String directURL = extras.getString("DIRECT_URL");
        		if(directURL==null){
        			// webView.loadUrl("http://192.168.1.4/m-android/app-default.html");
        		    webView.loadUrl("file:///android_asset/www/app-default.html");
        			
        		} else {
        		   logger.info("directURL: "+directURL);
        		   webView.loadUrl(directURL);
        		}
        	} else {
        		//webView.loadUrl("http://192.168.1.4/m-android/app-default.html");
        	   webView.loadUrl("file:///android_asset/www/app-default.html");
        	}
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
    //  logger.info("Activity Destroyed ");
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