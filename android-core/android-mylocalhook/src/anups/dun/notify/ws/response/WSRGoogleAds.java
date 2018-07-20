package anups.dun.notify.ws.response;

import org.apache.log4j.Level;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

import android.app.Activity;
import android.content.Context;
import anups.dun.ads.GoogleAdmobInterstitial;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;
import anups.dun.util.AndroidLogger;

public class WSRGoogleAds {
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSRGoogleAds.class);
 private Context context;
 private String response;
 
 public WSRGoogleAds(String response,Context context){ this.response=response;this.context=context; }
 
 public void funcTrigger_googleAds(){
	 AppSessionManagement appSessionManagement = new AppSessionManagement(context);
	 String user_Id=appSessionManagement.getAndroidSession(BusinessConstants.AUTH_USER_ID);
	 JSONParser jsonParser = new JSONParser();
	 try {
	   JSONObject responseObject = (JSONObject)jsonParser.parse(response);
	   JSONObject googleAdsObj = (JSONObject) responseObject.get("googleAds");
	   String googleAds = (String) googleAdsObj.get("status");
	   String debug_Id = (String) googleAdsObj.get("debug_Id");
	   String prod_Id = (String) googleAdsObj.get("prod_Id");
	   long duration = (Long)  googleAdsObj.get("duration_in_seconds");
	   JSONArray jsonObjectArry = (JSONArray)googleAdsObj.get("prodExeceptionUsers");
	   boolean exceptionUserExists=false;
	   for(int index=0;index<jsonObjectArry.size();index++){
		   if(jsonObjectArry.get(index).toString().equalsIgnoreCase(user_Id)){ exceptionUserExists=true;break; }
	   }
	   
	   logger.info("googleAds: "+googleAds);
	   logger.info("debug_Id: "+debug_Id);
	   logger.info("prod_Id: "+prod_Id);
	   logger.info("exceptionUserExists: "+exceptionUserExists);
	   logger.info("duration: "+duration);
	   
	   if("ACTIVATE_PROD".equalsIgnoreCase(googleAds)){
		   if(!exceptionUserExists) {
		       GoogleAdmobInterstitial googleAdmobInterstitial = new GoogleAdmobInterstitial(context,prod_Id,duration);
      	       googleAdmobInterstitial.loadInterstitial((Activity) context);
		   } else {
			   GoogleAdmobInterstitial googleAdmobInterstitial = new GoogleAdmobInterstitial(context,debug_Id,duration);
	      	   googleAdmobInterstitial.loadInterstitial((Activity) context);
		   }
	   }
	   else if("ACTIVATE_DEBUG".equalsIgnoreCase(googleAds)){
		   GoogleAdmobInterstitial googleAdmobInterstitial = new GoogleAdmobInterstitial(context,debug_Id,duration);
      	   googleAdmobInterstitial.loadInterstitial((Activity) context);
	   }
	 }
	 catch(Exception e){ logger.error("Exception: "+e.getMessage());}
 }
}
