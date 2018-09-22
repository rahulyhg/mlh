/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.utils;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import org.apache.log4j.Logger;

/**
 *
 * @author N.L.N.Rao
 */
public class WSUtility {
  public static final Logger logger = Logger.getLogger(WSUtility.class); 
  private final String USER_AGENT = "Mozilla/5.0";
  public String httpGETRequest(String url) {
   StringBuilder response = new StringBuilder();
   BufferedReader in = null;
   try {
    URL obj = new URL(url);
    HttpURLConnection con = (HttpURLConnection) obj.openConnection();
                      con.setRequestMethod("GET");
                      con.setRequestProperty("User-Agent", USER_AGENT);

    int responseCode = con.getResponseCode();
    in = new BufferedReader(new InputStreamReader(con.getInputStream()));
    
    for(String inputLine;(inputLine = in.readLine()) != null;) {
        response.append(inputLine);
     }
   } catch(Exception e) { e.printStackTrace(); }
   finally{ 
     try { in.close(); } 
     catch(Exception e ){ e.printStackTrace(); } 
   }
   return response.toString(); 
  }
  
  public String httpPOSTRequest(String url, String urlParameters){
    StringBuilder response = new StringBuilder();
    BufferedReader in = null;
    try {
      URL obj = new URL(url);
      HttpURLConnection con = (HttpURLConnection) obj.openConnection();
                        con.setRequestMethod("POST");
                        con.setRequestProperty("User-Agent", USER_AGENT);
                        con.setRequestProperty("Accept-Language", "en-US,en;q=0.5"); 
                        con.setDoOutput(true);
      OutputStream os = con.getOutputStream();
	           os.write(urlParameters.getBytes());
		   os.flush();
		   os.close();
      int responseCode = con.getResponseCode();
      in = new BufferedReader(new InputStreamReader(con.getInputStream()));
      for(String inputLine;(inputLine = in.readLine()) != null;) {
         response.append(inputLine);
      }
    } catch(Exception e) { e.printStackTrace(); }
      finally{ 
        try { in.close(); } 
        catch(Exception e ){ e.printStackTrace(); } 
      }
    return response.toString();
  }
}
