package com.test;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.Calendar;

public class Cal {
	private final static String USER_AGENT = "Mozilla/5.0";
	public static void main(String[] args) {
		/* Calendar calendar=Calendar.getInstance();
		         calendar.setTimeInMillis(System.currentTimeMillis());
	    System.out.println(calendar.getTime());
		         calendar.set(Calendar.MINUTE,calendar.get(Calendar.MINUTE)+1);
		System.out.println(calendar.getTime());
		*/
		StringBuilder response=new StringBuilder();
		try {
			  
			 URL obj = new URL("http://192.168.1.4");
			  HttpURLConnection con = (HttpURLConnection)obj.openConnection();
			                     con.setRequestMethod("GET");
			                     con.setRequestProperty("User-Agent", USER_AGENT);
			  BufferedReader in = new BufferedReader(new InputStreamReader(con.getInputStream()));
			 
			  for(String inputLine;(inputLine = in.readLine()) != null;) {
			    response.append(inputLine);
			  } 
			  in.close();
		   } catch(Exception e){ System.out.println("Exception AppNotificationWebService: "+e.getMessage()); }
		System.out.println("Output: "+response.toString());
	}

}
