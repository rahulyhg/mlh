package anups.dun.notify.ws.response;

import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

import android.app.Activity;
import android.content.Context;
import anups.dun.ads.GoogleAdmobInterstitial;
import anups.dun.util.AndroidLogger;

public class WSRGoogleAds {
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSRGoogleAds.class);
 private Context context;
 private String response;
 
 public WSRGoogleAds(String response,Context context){ this.response=response;this.context=context; }
 
 public void funcTrigger_googleAds(){
	 JSONParser jsonParser = new JSONParser();
	 try {
	   JSONObject jsonObject = (JSONObject)jsonParser.parse(response);
	   String googleAds = (String) jsonObject.get("googleAds");
	   String debug_Id = (String) jsonObject.get("debug_Id");
	   String prod_Id = (String) jsonObject.get("prod_Id");
	   int duration = (Integer)  jsonObject.get("duration_in_seconds");
	   if("ACTIVATE_PROD".equalsIgnoreCase(googleAds)){
		   GoogleAdmobInterstitial googleAdmobInterstitial = new GoogleAdmobInterstitial(prod_Id,duration);
      	   googleAdmobInterstitial.loadInterstitial((Activity) context);
	   }
	   else if("ACTIVATE_DEBUG".equalsIgnoreCase(googleAds)){
		   GoogleAdmobInterstitial googleAdmobInterstitial = new GoogleAdmobInterstitial(debug_Id,duration);
      	   googleAdmobInterstitial.loadInterstitial((Activity) context);
	   }
	 }
	 catch(Exception e){ logger.error("Exception: "+e.getMessage());}
 }
}
