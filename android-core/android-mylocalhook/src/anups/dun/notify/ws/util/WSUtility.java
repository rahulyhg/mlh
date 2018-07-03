package anups.dun.notify.ws.util;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import anups.dun.util.AndroidLogger;

public class WSUtility {
  org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSUtility.class);
  private final static String USER_AGENT = "Mozilla/5.0";
  public String HttpURLResponse(String url){
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
	 } catch(Exception e){ logger.error("Exception WSUtility: "+e.getMessage()); }
	  finally{
	    	if(in!=null) {  try { in.close(); } catch(Exception e){ logger.error("BufferedReader Close Exception: "+e.getMessage()); } }
	    	if(con!=null) {  try { con.disconnect(); } catch(Exception e){ logger.error("HttpURLConnection Disconnect Exception: "+e.getMessage()); } }
	  }
    return response.toString();
  }
}
