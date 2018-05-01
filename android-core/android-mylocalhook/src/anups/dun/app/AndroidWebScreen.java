package anups.dun.app;

import android.support.v7.app.ActionBarActivity;
import android.telephony.SubscriptionInfo;
import android.telephony.SubscriptionManager;
import android.telephony.TelephonyManager;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.AlarmManager;
import android.app.PendingIntent;
import android.app.ProgressDialog;
import android.content.ClipData;
import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.os.Environment;
import android.os.Handler;
import android.provider.MediaStore;
import android.util.Log;
import android.view.KeyEvent;
import android.view.View;
import android.view.Window;
import android.webkit.ValueCallback;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.ProgressBar;
import android.widget.Toast;
import anups.dun.app.R;
import anups.dun.constants.Sessions;
import anups.dun.js.AppManagement;
import anups.dun.js.AppNotifyManagement;
import anups.dun.js.AppSessionManagement;
import anups.dun.mobile.util.TelephonicService;
import anups.dun.notify.AuthenticationAlarm;
import anups.dun.notify.LatestNotificationServiceWebService;
import anups.dun.notify.VersionUpgradeAlarm;
import anups.dun.util.AndroidLogger;
import anups.dun.util.NetworkAvailability;
import anups.dun.util.PropertiesFile;

import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.nio.channels.FileChannel;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.ClipData;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.os.Environment;
import android.provider.MediaStore;
import android.util.Log;
import android.view.KeyEvent;
import android.view.View;
import android.webkit.ValueCallback;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.nio.channels.FileChannel;
import java.text.SimpleDateFormat;
import java.util.Date;


@SuppressLint({ "NewApi", "ShowToast" })
public  class AndroidWebScreen extends Activity {

	org.apache.log4j.Logger logger = AndroidLogger.getLogger(AndroidWebScreen.class);
	
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

@SuppressLint("SetJavaScriptEnabled")
@Override
protected void onCreate(Bundle savedInstanceState) {
	logger.info("MyLocalHook Activity Begins...");
 super.onCreate(savedInstanceState);
 requestWindowFeature(Window.FEATURE_NO_TITLE);
 getWindow().requestFeature(Window.FEATURE_PROGRESS);
 setContentView(R.layout.activity_androidwebscreen);
 
 progressBar = (ProgressBar) findViewById(R.id.progressBar);
 progressBar.setVisibility(View.VISIBLE);
 
 /* Micromax - Version : 17 , Samsung Galaxy on PRO - Version : 23 */
 AndroidWebNotifications awn=new AndroidWebNotifications(this);
 AppManagement appManager = new AppManagement(this);
 AppNotifyManagement anm = new AppNotifyManagement(this);
 AppSessionManagement appSessionManager = new AppSessionManagement(this);
 
 /* GET DATA FROM PROPERTIES FILE */
 String PROJECT_WEB_URL=new PropertiesFile().getProperty("PROJECT_WEB_URL", this);
 logger.info("PROJECT_WEB_URL: "+PROJECT_WEB_URL);
 
 /* Get UserID from SESSION */
 String USER_ID=appSessionManager.getAndroidSession("AUTH_USER_ID");
 logger.info("USER_ID: "+USER_ID);
 /* VERSION UPGRADE : */
    awn.notify_versionupgrade();
 /* AUTHENTICATION REMINIDER : */
    awn.notify_authReminder();
 /* NewsFeedImmediateReminder */
    if(USER_ID!=null){ awn.notify_latestNotificationService(); }
        
        webView = (WebView) findViewById(R.id.webView);
        webView.clearCache(true);
        webView.clearHistory();
        
        webSettings = webView.getSettings();
        webSettings.setJavaScriptEnabled(true);
        webSettings.setJavaScriptCanOpenWindowsAutomatically(true);
        webSettings.setDomStorageEnabled(true);
        
        webView.addJavascriptInterface(appManager, "Android"); 
        webView.addJavascriptInterface(anm, "AndroidNotify");
        webView.addJavascriptInterface(appSessionManager, "AndroidSession");
        
        webView.setWebViewClient(new AndroidWebViewClient(this));
        webView.setWebChromeClient(new AndroidWebChromeClient(this));
        //if SDK version is greater of 19 then activate hardware acceleration otherwise activate software acceleration
       
        if (Build.VERSION.SDK_INT >= 19) {
            webView.setLayerType(View.LAYER_TYPE_HARDWARE, null);
        } else if (Build.VERSION.SDK_INT >= 11 && Build.VERSION.SDK_INT < 19) {
            webView.setLayerType(View.LAYER_TYPE_SOFTWARE, null);
        }
        
        ntwrkAvail=new NetworkAvailability(this);
        if(ntwrkAvail.checkInternetConnection()) {
        	webView.loadUrl(PROJECT_WEB_URL);
        }
        else {
        	webView.loadUrl("file:///android_asset/www/network_state.html");
        }
       
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