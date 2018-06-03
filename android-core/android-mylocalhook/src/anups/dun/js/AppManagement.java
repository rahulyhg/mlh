package anups.dun.js;

import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.support.v7.app.ActionBarActivity;
import android.webkit.JavascriptInterface;
import android.widget.Toast;
import anups.dun.app.AndroidWebScreen;
import anups.dun.app.BuildConfig;
import anups.dun.media.AndroidWebScreenVideo;
import anups.dun.web.templates.URLGenerator;

public class AppManagement extends ActionBarActivity {
	Context mContext;
	public AppManagement(Context c) {  mContext = c; }

	@JavascriptInterface
	public String getDefaultPage() {
      URLGenerator urlGenerator=new URLGenerator();
      return urlGenerator.defaultPage();
    }
	
	@JavascriptInterface
	public String checkPlayStoreUpdate(String playstoreversion) {
	String status="UP-TO-DATE";
	if(!playstoreversion.equals("0.0.0")){
	 try {
    	   PackageInfo packageInfo = mContext.getPackageManager().getPackageInfo(mContext.getPackageName(), 0);
    	   String versionName = packageInfo.versionName;
    	   String arry_psversion[]=playstoreversion.split("\\.");
     	   String arry_version[]=versionName.split("\\.");
     	   int psversionNumber=Integer.parseInt(arry_psversion[0]+"00")+Integer.parseInt(arry_psversion[1]+"0")+Integer.parseInt(arry_psversion[2]);
     	   int versionNumber=Integer.parseInt(arry_version[0]+"00")+Integer.parseInt(arry_version[1]+"0")+Integer.parseInt(arry_version[2]);
           if(psversionNumber>versionNumber){
        	   status="APP_TO_UPDATE";
           }
    	   
    	 } catch (PackageManager.NameNotFoundException e) {
    		 status="UP-TO-DATE";
    	 }
	}
	 return status;
    }
	
	@JavascriptInterface
	public void showToast(String toast) {
        Toast.makeText(mContext, toast, Toast.LENGTH_SHORT).show();
    }
	
	
	@JavascriptInterface
	public void showVideo(String videoURL) {
		 Toast.makeText(mContext, "Javascript: "+videoURL, Toast.LENGTH_SHORT).show();
		 
		 try {
		// Start NewActivity.class
		Intent intent = new Intent(mContext, AndroidWebScreenVideo.class);
		intent.putExtra("VIDEO_URL", videoURL);
		intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
		mContext.getApplicationContext().startActivity(intent);
		 } catch(Exception e){
			 Toast.makeText(mContext, "JavascriptException: "+e, Toast.LENGTH_SHORT).show();
		 }
	}
	
}
