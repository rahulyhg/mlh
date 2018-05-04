package com.test;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class RestService {
	private final static String USER_AGENT = "Mozilla/5.0";
	public void testURL(){
		String url="http://192.168.1.4/mlh/android-web/backend/php/cj/cron.notification.reciever.php?action=LATEST_NOTIFICATION_SERVICE&user_Id=USR924357814934";
		StringBuilder response=new StringBuilder();
		 HttpURLConnection con = null;
		// BufferedReader in = null;
		 try {
			 URL obj = new URL(url);
			  con = (HttpURLConnection)obj.openConnection();
			                     con.setRequestMethod("GET");
			                     con.setRequestProperty("User-Agent", USER_AGENT);
			  int responseCode = con.getResponseCode();
			  // in = new BufferedReader(new InputStreamReader(con.getInputStream()));
			 
			//  for(String inputLine;(inputLine = in.readLine()) != null;) {
			//    response.append(inputLine);
			//  }
			// in.close(); 

		        InputStream in = con.getInputStream();
                InputStreamReader isw = new InputStreamReader(in);

		        
		        for (int data = isw.read();data != -1;) {
		            char current = (char) data;
		                 data = isw.read();
		                 response.append(current);
		        }
		        in.close(); 
			 System.out.println(response.toString());
		 } catch(Exception e){e.printStackTrace();}	
		 finally{ 
			 if(con!=null) { con.disconnect(); } 
			 
		 }
		
	}
	public static void main(String args[]){
		RestService rs=new RestService();
		for(int i=0;i<30;i++){
		  rs.testURL();
		}
	}
	

}
