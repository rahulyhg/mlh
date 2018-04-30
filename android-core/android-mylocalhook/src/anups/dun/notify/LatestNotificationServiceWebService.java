package anups.dun.notify;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import javax.net.ssl.HttpsURLConnection;

import org.json.JSONArray;
import org.json.JSONObject;

import com.google.gson.Gson;

import android.content.Context;
import android.os.AsyncTask;
import android.os.Looper;
import android.widget.Toast;
import anups.dun.app.AndroidWebScreen;
import anups.dun.js.AppSessionManagement;
import anups.dun.util.AndroidLogger;
import anups.dun.util.PropertiesFile;
import anups.dun.util.PushNotification;

public class LatestNotificationServiceWebService  extends AsyncTask<String, String, String> {
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
	@Override
	protected String doInBackground(String... params) {
	 Looper.prepare();
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
	  Looper.myLooper().quit();
		  logger.info("LatestNotificationService (Output): "+response.toString());
	 } catch(Exception e){logger.info("LatestNotificationServiceException: "+e); }	
	 return response.toString();
	}

	@Override  
	protected void onPostExecute(String response) {  
		logger.info("LatestNotificationService (PostExecute): "+response.toString());
		
		 
				
		try {
			PushNotification pnotify=new PushNotification();
			Gson gson=new Gson();
			LatestNotificationServiceBean lnsb=gson.fromJson(response.toString(), LatestNotificationServiceBean.class);

		/*	JSONArray data=new JSONArray(response); 
			for(int index=0;index<data.length();index++){
				String info_Id = data.getJSONObject(index).getString("info_Id");
				String artTitle = data.getJSONObject(index).getString("artTitle");
				String artShrtDesc = data.getJSONObject(index).getString("artShrtDesc");
				String createdOn = data.getJSONObject(index).getString("createdOn");
				
				
				String directURL="http://www.google.co.in/";
				boolean inapp=true;
				
				String[] events = new String[3];
					     events[0] = new String(artShrtDesc);
				pnotify.display_closableNotification(context, directURL, inapp, artTitle, artTitle, 
						artShrtDesc, artTitle, events);
			} */
		
		} catch(Exception e){
			logger.error("LatestNotificationServiceException (PostExecute): "+e);
		} 
	}
}
