package anups.dun.notify.ws.util;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import anups.dun.util.AndroidLogger;

public class WSUtility {
  org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSUtility.class);
  private final static String USER_AGENT = "Mozilla/5.0";
  public String HttpURLGETResponse(String url){
	StringBuilder response = new StringBuilder();
	HttpURLConnection con = null;
	BufferedReader in = null;
	try {
		 URL obj = new URL(url);
		 con = (HttpURLConnection)obj.openConnection();
		 con.setRequestMethod("GET");
		 con.setRequestProperty("User-Agent", USER_AGENT);
		 in = new BufferedReader(new InputStreamReader(con.getInputStream()));
		 for(String inputLine;(inputLine = in.readLine()) != null;) {
		    response.append(inputLine);
		 } 	 
	 } catch(Exception e){ logger.error("Exception WSGETUtility: "+e.getMessage()); }
	  finally{
	    	if(in!=null) {  try { in.close(); } catch(Exception e){ logger.error("BufferedReader Close Exception: "+e.getMessage()); } }
	    	if(con!=null) {  try { con.disconnect(); } catch(Exception e){ logger.error("HttpURLConnection Disconnect Exception: "+e.getMessage()); } }
	  }
	logger.info("Response: "+response.toString());
    return response.toString();
  }
  
  public String HttpURLPOSTResponse(String[] params) { /* params[0]->URL, params[1]->params */
	  StringBuilder response = new StringBuilder();
	 try {
		URL obj = new URL(params[0]);
		HttpURLConnection con = (HttpURLConnection) obj.openConnection();
		con.setRequestMethod("POST");
		con.setRequestProperty("User-Agent", USER_AGENT);

		// For POST only - START
		con.setDoOutput(true);
		OutputStream os = con.getOutputStream();
		os.write(params[1].getBytes());
		os.flush();
		os.close();
		// For POST only - END

		int responseCode = con.getResponseCode();
		logger.info("POST Response Code :: " + responseCode);

		if (responseCode == HttpURLConnection.HTTP_OK) { //success
			BufferedReader in = new BufferedReader(new InputStreamReader(
					con.getInputStream()));
			for (String inputLine="";(inputLine = in.readLine()) != null;) {
				response.append(inputLine);
			}
			in.close();

			// print result
			
		} else {
			logger.info("POST request not worked");
		}	
	 } catch(Exception e){ logger.error("Exception WSPOSTUtility: "+e.getMessage()); }
	 logger.info("Response: "+response);
	 return response.toString();
	}

}
