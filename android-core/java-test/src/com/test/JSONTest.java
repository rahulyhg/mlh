package com.test;

import java.util.Iterator;

import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;
import org.json.simple.parser.ParseException;

import com.google.gson.Gson;
import com.test.LatestNotificationServiceBean.LatestNotify;

public class JSONTest {
  public static void main(String[] args) throws ParseException {
   StringBuilder sb=new StringBuilder();
   sb.append("{\"latest_notify\":[{\"notify_Id\":\"notify_Id\",\"user_Id\":\"user_Id\",");
   sb.append("\"from_Id\":\"from_Id\",\"notifyHeader\":\"notifyHeader\",");
   sb.append("\"notifyTitle\":\"notifyTitle\",\"notifyMsg\":\"notifyMsg\",\"notifyType\":\"notifyType\",");
   sb.append("\"notifyURL\":\"notifyURL\",\"notify_ts\":\"notify_ts\",\"watched\":\"watched\",\"popup\":\"popup\",");
   sb.append("\"req_accepted\":\"req_accepted\",\"cal_event\":\"cal_event\"}]}");
   
   System.out.println(sb.toString());
   System.out.println("");
   JSONParser jsonParser = new JSONParser();
   JSONObject jsonObject = (JSONObject)jsonParser.parse(sb.toString());
 //  JSONArray notifyObj = (JSONArray) );
   System.out.println(jsonObject.get("latest_notify"));
   System.out.println("");
   
   JSONArray msg = (JSONArray)jsonObject.get("latest_notify");
   System.out.println("Array("+msg.size()+"): "+jsonObject.get("latest_notify"));
   System.out.println("");
   for(int i = 0; i < msg.size();i++) {
	   JSONObject jobj=(JSONObject) jsonParser.parse(msg.get(0).toString());
	   System.out.println("from_Id: "+jobj.get("from_Id"));
	   System.out.println("");
   }
  }
}
