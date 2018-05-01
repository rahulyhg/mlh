package anups.dun.notify;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import javax.net.ssl.HttpsURLConnection;

import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;


import android.content.Context;
import android.os.AsyncTask;
import android.os.Looper;
import android.widget.Toast;
import anups.dun.app.AndroidWebScreen;
import anups.dun.js.AppSessionManagement;
import anups.dun.util.AndroidLogger;
import anups.dun.util.PropertiesFile;
import anups.dun.util.PushNotification;

public class LatestNotificationServiceWebService extends AsyncTask<String, String, String> {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(LatestNotificationServiceWebService.class);
	/* Checks over NewsFeed posted before Current Minute and Before Minute 
     * IF posted, pushes Notification */
	private final static String USER_AGENT = "Mozilla/5.0";
	Context context;
	public LatestNotificationServiceWebService(Context context){ this.context=context;	}
	 @Override
	 protected void onPreExecute() {
	   super.onPreExecute();
	   logger.info("LatestNotificationService : onPreExecute");
	 }
	@SuppressWarnings("static-access")
	@Override
	protected String doInBackground(String... params) {
	 Looper myLooper = Looper.myLooper();
	 myLooper.prepare();
	 StringBuilder response = new StringBuilder();
	 try {
		 AppSessionManagement appSessionManager = new AppSessionManagement(context);
		 String url = new PropertiesFile().getProperty("LATEST_NOTIFICATION_SERVICE", context)+"&user_Id="+appSessionManager.getAndroidSession("AUTH_USER_ID");
		 logger.info("LatestNotificationServiceURL: "+url);
		  URL obj = new URL(url);
		  HttpURLConnection con = (HttpURLConnection)obj.openConnection();
		                     con.setRequestMethod("GET");
		                     con.setRequestProperty("User-Agent", USER_AGENT);
		  int responseCode = con.getResponseCode();
		  BufferedReader in = new BufferedReader(new InputStreamReader(con.getInputStream()));
		 
		  for(String inputLine;(inputLine = in.readLine()) != null;) {
		    response.append(inputLine);
		  }
		  in.close();	
		 
		  logger.info("LatestNotificationService (Output): "+response.toString());
	 } catch(Exception e){logger.info("LatestNotificationServiceException: "+e); }	
	 if (myLooper!=null) { myLooper.quit(); }
	 return response.toString();
	}

	@Override  
	protected void onPostExecute(String response) { 
		 super.onPostExecute(response);
		
		logger.info("LatestNotificationService (PostExecute): "+response.toString());
		try {
			PushNotification pnotify=new PushNotification();
			JSONParser jsonParser = new JSONParser();
		    JSONObject jsonObject = (JSONObject)jsonParser.parse(response.toString());
		    JSONArray jsonObjectArry = (JSONArray)jsonObject.get("latest_notify");
		    for(int index=0;index<jsonObjectArry.size();index++) {
		    	JSONObject jobj=(JSONObject) jsonParser.parse(jsonObjectArry.get(index).toString());
		    	String notify_Id=(String) jobj.get("notify_Id");
		    	String user_Id=(String) jobj.get("user_Id");
		    	String from_Id=(String) jobj.get("from_Id");
		    	String notifyHeader=(String) jobj.get("notifyHeader");
		    	String notifyTitle=(String) jobj.get("notifyTitle");
		    	String notifyMsg=(String) jobj.get("notifyMsg");
		    	String notifyType=(String) jobj.get("notifyType");
		    	String notifyURL=(String) jobj.get("notifyURL");
		    	String notify_ts=(String) jobj.get("notify_ts");
		    	String watched=(String) jobj.get("watched");
		    	String popup=(String) jobj.get("popup");
		    	String req_accepted=(String) jobj.get("req_accepted");
		    	String cal_event=(String) jobj.get("cal_event");
	
		    	 String[] events = new String[1];
		                  events[0] = new String(notifyMsg);
		         boolean inapp=true;
		         pnotify.display_closableNotification(context, notifyURL, inapp, notifyHeader, notifyTitle, 
				       notifyMsg, notifyTitle, events);
		         logger.info("Latest Notification Pushed...");
		    }
		} catch(Exception e){
			logger.error("LatestNotificationServiceException (PostExecute): "+e);
		} 
	}
}
