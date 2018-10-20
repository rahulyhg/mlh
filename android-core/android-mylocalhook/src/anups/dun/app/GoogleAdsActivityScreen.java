package anups.dun.app;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Intent;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import anups.dun.app.R;
import anups.dun.util.AndroidLogger;

@SuppressLint("NewApi")
public class GoogleAdsActivityScreen extends Activity {
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(GoogleAdsActivityScreen.class);
 public WebView webView;
 public WebSettings webSettings;

 @SuppressLint({ "SetJavaScriptEnabled", "NewApi" })
 @Override
 public void onCreate(Bundle savedInstanceState) {
  requestWindowFeature(Window.FEATURE_NO_TITLE);
  super.onCreate(savedInstanceState); 
  setTitle(R.string.ad_title);
  setContentView(R.layout.activity_googleads);
  
  webView = (WebView) findViewById(R.id.webView);
  webView.clearCache(true);
  webView.clearHistory();
  webView.setWebViewClient(new WebViewClient() { 
   @Override 
   public boolean shouldOverrideUrlLoading(WebView view, String url) {  
    if(url.startsWith("http://www.youtube.com/")) { 
	   startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse(url)));
	    return true;
	 }
	view.loadUrl(url); 
	return false; } }); 
  //webView.setWebViewClient(new AndroidWebViewClient(this));
  // webView.setWebChromeClient(new GoogleAdsActivityChromeClient(this));
  webSettings = webView.getSettings();
  webSettings.setJavaScriptEnabled(true);
  webSettings.setJavaScriptCanOpenWindowsAutomatically(true);
  webSettings.setDomStorageEnabled(true);
  
  if (Build.VERSION.SDK_INT >= 19) { webView.setLayerType(View.LAYER_TYPE_HARDWARE, null); }
  else if (Build.VERSION.SDK_INT >= 11 && Build.VERSION.SDK_INT < 19) {
      webView.setLayerType(View.LAYER_TYPE_SOFTWARE, null);
  }
  
  webView.loadUrl("http://www.youtube.com/");
 }
}
	