package anups.dun.js;

import android.content.ContentResolver;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.provider.Settings;
import android.support.v7.app.ActionBarActivity;
import android.webkit.JavascriptInterface;
import android.widget.Toast;
import anups.dun.app.AndroidWebScreen;
import anups.dun.media.AndroidWebScreenVideo;
import anups.dun.util.AndroidLogger;
import anups.dun.util.CRUDContacts;
import anups.dun.util.GPSTracker;
import anups.dun.util.Masking;
import anups.dun.util.PropertyUtility;
import anups.dun.web.templates.URLGenerator;

public class AppManagement extends ActionBarActivity {
  org.apache.log4j.Logger logger = AndroidLogger.getLogger(AppManagement.class);
	Context mContext;
	public AppManagement(Context c) {  mContext = c; }

	@JavascriptInterface
	public void loadProjectPropertiesFile(){
	  logger.info("loadProjectPropertiesFile (Javascript)...");
	  try {
        AppSessionManagement appSessionManagement = new AppSessionManagement(mContext);
	    PropertyUtility propertyUtility = new PropertyUtility(this.getApplicationContext());
	    String propertyFile = propertyUtility.initializePropertyFile(appSessionManagement);
		       propertyUtility.readPropertyFile(appSessionManagement, propertyFile);
      } catch(Exception e){
		 logger.error("Exception: "+e);
	  }
	}
	
	@JavascriptInterface
	public String getProjectURL() {
	  AppSessionManagement appSessionManagement = new AppSessionManagement(mContext);
      return appSessionManagement.getAndroidSession("PROPERTY_PROJECT_URL"); 
    }
	
	@JavascriptInterface
	public String getVersionNumber() {
	  AppSessionManagement appSessionManagement = new AppSessionManagement(mContext);
      return appSessionManagement.getAndroidSession("PROJECT_VERSION_NUMBER"); 
    }
	
	@JavascriptInterface
	public String getDefaultPage() {
      return new URLGenerator(mContext).defaultPage();
    }
	
	@JavascriptInterface
	public String getHomePage(String projectURL) {
      return new URLGenerator(mContext).latestNews(projectURL);
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
		Intent intent = new Intent(mContext, AndroidWebScreenVideo.class);
		intent.putExtra("VIDEO_URL", videoURL);
		intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
		mContext.getApplicationContext().startActivity(intent);
	}
	
	@JavascriptInterface
	public void goToAppPermissions(){
		Intent intent = new Intent(Settings.ACTION_APPLICATION_DETAILS_SETTINGS, 
			      Uri.parse("package:" + mContext.getPackageName()));
			  intent.addCategory(Intent.CATEGORY_DEFAULT);
			  intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
			  mContext.startActivity(intent);
	}
	
	@JavascriptInterface
	public String listOfContacts(){
		ContentResolver contentResolver = mContext.getContentResolver();
	    CRUDContacts crudContacts = new CRUDContacts();
	    return crudContacts.fetchContacts(contentResolver);
	}
	
	@JavascriptInterface
	public void loadAndroidWebScreen(String directURL){
		Intent intent = new Intent(mContext, AndroidWebScreen.class);
		   intent.setData(Uri.parse(directURL));
		mContext.startActivity(intent);
	}
	
	@JavascriptInterface
	public int getAndroidVersion(){
	  return android.os.Build.VERSION.SDK_INT;
	}
	
	@JavascriptInterface
	public String getUserMobileGPSPosition(){
		GPSTracker gpsTracker = new GPSTracker(mContext);
		StringBuilder jsonData = new StringBuilder();
		jsonData.append("{").append("\"latitude\":\"").append(gpsTracker.latitude).append("\",");
		jsonData.append("\"longitude\":\"").append(gpsTracker.longitude).append("\"}");
	  return jsonData.toString();
	}

	@JavascriptInterface
	public String chatMasking_encryption(String plainMsg, String timestamp){
		String encryption = null;
		try {
			encryption = Masking.encryptMsg(timestamp,plainMsg);
		} catch(Exception e){ }
		return encryption;
	}
	
	@JavascriptInterface
	public String chatMasking_decryption(String encryptMsg, String timestamp){
		String decryption = null;
		try {
			decryption = Masking.decryptMsg(timestamp, encryptMsg);
		} catch(Exception e){}
		return decryption;
	}
}
