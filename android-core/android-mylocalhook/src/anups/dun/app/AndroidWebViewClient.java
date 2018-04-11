package anups.dun.app;

import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.view.View;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;
import anups.dun.media.AndroidWebScreenVideo;
import anups.dun.util.NetworkAvailability;
public class AndroidWebViewClient extends WebViewClient {
   
	AndroidWebScreen webscreenObject;
	
	public AndroidWebViewClient(AndroidWebScreen webscreenObject){
		this.webscreenObject=webscreenObject;
	}
	
	ProgressDialog progressDialog;

    public boolean shouldOverrideUrlLoading(WebView view, String url) {

    	if (url.startsWith("tel:")) { 
            Intent intent = new Intent(Intent.ACTION_DIAL, Uri.parse(url)); 
            view.getContext().startActivity(intent);
            return true;
         } 
    	  
    	else  if (url.contains("http") || url.contains("https")) {
    		if(!webscreenObject.ntwrkAvail.checkInternetConnection()) {
    			view.loadUrl("file:///android_asset/www/network_state.html"); 
    		} 
    		return false; 
    	}
    	else  if (url.contains(".php")) {
    		if(!webscreenObject.ntwrkAvail.checkInternetConnection()) {
    			view.loadUrl("file:///android_asset/www/network_state.html"); 
    		}
            return false;
    	}
    	else  if (url.contains(".pdf")) {
    		if(!webscreenObject.ntwrkAvail.checkInternetConnection()) {
    			view.loadUrl("file:///android_asset/www/network_state.html"); 
    		}
            return false;
    	} else {
        Intent intent = new Intent(Intent.ACTION_VIEW, Uri.parse(url));
        view.getContext().startActivity(intent);
        return true;
    	 }
    }

    //Show loader on url load
    public void onPageStarted(WebView view, String url, Bitmap favicon) {
    	webscreenObject.progressBar.setVisibility(View.GONE);
        // Then show progress  Dialog
        // in standard case YourActivity.this
       /* if (progressDialog == null) {
            progressDialog = new ProgressDialog(webscreenObject);
            progressDialog.setMessage("Loading...");
            progressDialog.hide();
        } */
    }

    // Called when all page resources loaded
    public void onPageFinished(WebView view, String url) {
    	webscreenObject.webView.loadUrl("javascript:(function(){ " +
                "document.getElementById('android-app').style.display='none';})()");

       /* try {
            // Close progressDialog
            if (progressDialog.isShowing()) {
                progressDialog.dismiss();
                progressDialog = null;
            }
        } catch (Exception exception) {
            exception.printStackTrace();
        }  */
    }
}
