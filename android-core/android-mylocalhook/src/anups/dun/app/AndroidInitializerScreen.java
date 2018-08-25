package anups.dun.app;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Intent;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.view.Window;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.widget.Toast;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppManagement;
import anups.dun.js.AppNotifyManagement;
import anups.dun.js.AppSQLiteManagement;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.ws.util.Notifications;
import anups.dun.util.AndroidLogger;
import anups.dun.util.NetworkUtility;
import anups.dun.web.templates.URLGenerator;

@SuppressLint("NewApi")
public class AndroidInitializerScreen extends Activity {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(AndroidInitializerScreen.class);
	public WebView webView;
    public WebSettings webSettings;

    @SuppressLint("SetJavaScriptEnabled")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
    	super.onCreate(savedInstanceState);
    	requestWindowFeature(Window.FEATURE_NO_TITLE);
    	setContentView(R.layout.activity_androidinitializer);
    	
    	
    }

    @Override
    public void onResume(){
      logger.info("Resume AndroidInitializerScreen");
      super.onResume();
      AppManagement appManagement = new AppManagement(this);
  	  AppNotifyManagement appNotifyManagement = new AppNotifyManagement(this);
  	  AppSessionManagement appSessionManagement = new AppSessionManagement(this);
  	  AppSQLiteManagement appSQLiteManagement = new AppSQLiteManagement(this);
  	
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
      
      webView.setWebViewClient(new AndroidInitializerViewClient(this));
      webView.setWebChromeClient(new AndroidInitializerChromeClient(this));
      
      if (Build.VERSION.SDK_INT >= 19) { webView.setLayerType(View.LAYER_TYPE_HARDWARE, null); }
      else if (Build.VERSION.SDK_INT >= 11 && Build.VERSION.SDK_INT < 19) {
          webView.setLayerType(View.LAYER_TYPE_SOFTWARE, null);
      }
      
  	try {
  	
      Toast.makeText(this.getApplicationContext(), "AndroidInitializerScreen", Toast.LENGTH_LONG).show();
  	
  	
  	String USER_ID=appSessionManagement.getAndroidSession(BusinessConstants.AUTH_USER_ID);
  	logger.info("USER_ID: "+USER_ID);
  	
  	if(USER_ID==null){ /* Show SignIn/Register Popup Notification */
  		 new Notifications(this.getApplicationContext()).notify_show_signInRegister();
  		 final Intent intent = new Intent(this, AndroidWebScreen.class);
  		 final Handler handler = new Handler();
		        handler.postDelayed( new Runnable() {
  			    public void run() {
  			    	intent.setData(Uri.parse(new URLGenerator().defaultPage()));
  			        startActivity(intent);
  			    }
  			}, 3000);
		       
		 NetworkUtility networkUtility=new NetworkUtility(this);
		 if(networkUtility.checkInternetConnection()) {
		    webView.loadUrl("file:///android_asset/www/app-default.html");
		 }
  			
  		 
  	} else {
  		NetworkUtility networkUtility=new NetworkUtility(this);
		if(networkUtility.checkInternetConnection()) {
		  webView.loadUrl(new URLGenerator().latestNews());
		}
  	}
  	
  	
  	}
  	catch(Exception e){  logger.info("Exception: "+e); }
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
    	logger.info("AndroidInitializerScreen(onActivityResult): "+requestCode+" "+resultCode+" "+data);
    }
}
