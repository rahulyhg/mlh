package anups.dun.util;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import android.content.Context;
import android.os.AsyncTask;
import android.util.Log;
import android.widget.Toast;
import anups.dun.app.AndroidWebScreen;

public class PropertiesFile  extends AsyncTask<String, String, String>{
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(PropertiesFile.class);
	private static final String TAG = "PropertiesFile.java";
	Context context;
	public PropertiesFile(Context context){
	 this.context=context;	
	}
	private final static String USER_AGENT = "Mozilla/5.0";
	@Override
	protected String doInBackground(String... params) {
		String url = "http://anups.epizy.com/mlh.properties";
		logger.info("[PropertiesFile]: URL- "+url);
		 StringBuilder response = new StringBuilder();
		 try {
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
		 } catch(Exception e){ 
			 logger.error("[PropertiesFile]: URL- "+e.getMessage());
		 }	
		 logger.info("[PropertiesFile]: response(doInBackground)- "+response.toString());
		 return response.toString();
	}
	@Override  
	protected void onPostExecute(String response) {  
		logger.info("[PropertiesFile]: response(onPostExecute)- "+response.toString());
	}
}
