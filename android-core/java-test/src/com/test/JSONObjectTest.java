package com.test;

import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

public class JSONObjectTest {
 public static void main(String args[]){
	 /* "usrFrndReqAccepted":[{"rel_Id":"FREL113163289416289671228",
		"rel_from":"2018-07-03 18:01:27",
		"rel_tz":"Asia\/Kolkata",
		"requestSent":"[{\"frnd1\":\"USR255798352927\",\"surName\":Srirambhatla\",\"name\":\"Saiteja\",
		\"frnd1_call_frnd2\":\"My LocalHook Friend\"}]",
		"requestrecieved":"[{\"frnd2\":\"USR924357814934\",\"surName\":Nellutla\",\"name\":\"Anup Chakravarthi\",
		\"frnd2_call_frnd1\":\"My LocalHook Friend\"}]","notify":"Y"} 

*/
	 StringBuilder sb = new StringBuilder();
	 sb.append("{\"usrFrndReqAccepted\":[{\"rel_Id\":\"FREL113163289416289671228\",");
	 sb.append("\"rel_from\":\"2018-07-03 18:01:27\",");
	 sb.append("\"rel_tz\":\"AsiaKolkata\",");
	 sb.append("\"requestSent\":\"[{\'frnd1\':\'USR255798352927\',\'surName\':\'Srirambhatla\',\'name\':\'Saiteja\',");
	 sb.append("\'frnd1_call_frnd2\':\'My LocalHook Friend\'}]\",");
	 sb.append("\"requestrecieved\":\"[{\'frnd2\':\'USR924357814934\',\'surName\':\'Nellutla\',\'name\':\'Anup Chakravarthi\',");
	 sb.append("\'frnd2_call_frnd1\':\'My LocalHook Friend\'}]\",\"notify\":\"Y\"}]}");
	 
	 String response = sb.toString();
	 System.out.println(response);
	 
	 try {
		 JSONParser jsonParser = new JSONParser();
		 JSONObject jsonObject = (JSONObject)jsonParser.parse(response);
		 JSONArray jsonObjectArry = (JSONArray)jsonObject.get("usrFrndReqAccepted");
		 for(int index=0;index<jsonObjectArry.size();index++) {
			JSONObject jobj = (JSONObject) jsonParser.parse(jsonObjectArry.get(index).toString());
			   
			   String rel_Id = (String) jobj.get("rel_Id");
			   String rel_from = (String) jobj.get("rel_from");
			   String rel_tz = (String) jobj.get("rel_tz");
			   
			   String requestSent = jobj.get("requestSent").toString().replaceAll("'", "\"");
			   JSONArray requestSentObjectArry = (JSONArray) jsonParser.parse(requestSent);
			   JSONObject requestSentObject = (JSONObject) requestSentObjectArry.get(0);
			   String frnd1_userId = (String) requestSentObject.get("frnd1");
			   String frnd1_surName = (String) requestSentObject.get("surName");
			   String frnd1_name = (String) requestSentObject.get("name");
			   String frnd1_call_frnd2 = (String) requestSentObject.get("frnd1_call_frnd2");
			   
			   String requestrecieved = jobj.get("requestrecieved").toString().replaceAll("'", "\"");
			   JSONArray requestrecievedObjectArry = (JSONArray) jsonParser.parse(requestrecieved);
			   JSONObject requestrecievedObject = (JSONObject) requestrecievedObjectArry.get(0);
			   String frnd2_userId = (String) requestrecievedObject.get("frnd2");
			   String frnd2_surName = (String) requestrecievedObject.get("surName");
			   String frnd2_name = (String) requestrecievedObject.get("name");
			   String frnd2_call_frnd1 = (String) requestrecievedObject.get("frnd2_call_frnd1");

		       String notify = (String) jobj.get("notify");
		       
		       System.out.println("rel_Id: "+rel_Id);
		       System.out.println("rel_from: "+rel_from);
		       System.out.println("rel_tz: "+rel_tz);
		       System.out.println("frnd1_userId: "+frnd1_userId);
		       System.out.println("frnd1_surName: "+frnd1_surName);
		       System.out.println("frnd1_name: "+frnd1_name);
		       System.out.println("frnd1_call_frnd2: "+frnd1_call_frnd2);
		       System.out.println("frnd2_userId: "+frnd2_userId);
		       System.out.println("frnd2_surName: "+frnd2_surName);
		       System.out.println("frnd2_name: "+frnd2_name);
		       System.out.println("frnd2_call_frnd1: "+frnd2_call_frnd1);
		 }
	 }
	 catch(Exception e) { e.printStackTrace(); }
	 
 }
 
}
