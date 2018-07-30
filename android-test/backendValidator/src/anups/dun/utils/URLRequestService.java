/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.utils;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

/**
 *
 * @author N.L.N.Rao
 */
public class URLRequestService {
  private final String USER_AGENT = "Mozilla/5.0";
  
  public String sendGetRequest(String web) {
   BufferedReader bufferedReader =null;
   StringBuilder stringBuilder = new StringBuilder();
   try {
   URL url = new URL(web);
   HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
                     httpURLConnection.setRequestMethod("GET");
                     httpURLConnection.setRequestProperty("User-Agent", USER_AGENT);
   int responseCode = httpURLConnection.getResponseCode();
    bufferedReader = new BufferedReader(new InputStreamReader(httpURLConnection.getInputStream()));
    for(String inputLine="";(inputLine = bufferedReader.readLine()) != null;) {
     stringBuilder.append(inputLine);
    }
   }
   catch(Exception e){ e.printStackTrace(); }
   finally{ try { if(bufferedReader!=null){ bufferedReader.close(); } }catch(Exception e){ e.printStackTrace(); } }
   return stringBuilder.toString();
  }
  
  public String sendPostRequest(String web, String urlParameters) {
   BufferedReader bufferedReader =null;
   StringBuilder stringBuilder = new StringBuilder();
   try {
   URL url = new URL(web);
   HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
                     httpURLConnection.setRequestMethod("POST");
                     httpURLConnection.setRequestProperty("User-Agent", USER_AGENT);
                     httpURLConnection.setRequestProperty("Accept-Language", "en-US,en;q=0.5");
                     httpURLConnection.setDoOutput(true);
   DataOutputStream dataOutputStream = new DataOutputStream(httpURLConnection.getOutputStream());
		dataOutputStream.writeBytes(urlParameters);
		dataOutputStream.flush();
		dataOutputStream.close();
   int responseCode = httpURLConnection.getResponseCode();
   bufferedReader = new BufferedReader(new InputStreamReader(httpURLConnection.getInputStream()));
   for(String inputLine="";(inputLine = bufferedReader.readLine()) != null;) {
     stringBuilder.append(inputLine);
    }
   }
   catch(Exception e){ e.printStackTrace(); }
   finally{ try { if(bufferedReader!=null){ bufferedReader.close(); } }catch(Exception e){ e.printStackTrace(); } }
   return stringBuilder.toString();
  }
  
  public static void main(String[] args) {

  }
}
