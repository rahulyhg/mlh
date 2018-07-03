package anups.dun.notify.ws.response;

import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

import android.content.Context;
import anups.dun.util.AndroidLogger;
import anups.dun.util.PushNotification;

public class WSRIntervalMinute {
/*
 { "peopleRelationshipRequestData": [{"notify_Id":"<notify_Id>","from_Id":"<from_Id>","notifyHeader":"<notifyHeader>",
 									  "notifyMsg":"<notifyMsg>","notifyTitle":"<notifyTitle>","notifyURL":"<notifyURL>",
 									  "notify_ts":"<notify_ts>","watched":"<Y/N>", "surName":"<surName>","name":"<name>",
 									  "profile_pic":"<profile_pic>"}]
  }
 */
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSRIntervalMinute.class);
	 private Context context;
	 private String response;
		
	 public WSRIntervalMinute(Context context,String response){
	  this.context=context;
	  this.response=response;
	 }
	 
	 public void funcTrigger_userNotifications(){
		 JSONParser jsonParser = new JSONParser();
		 try {
		   JSONObject jsonObject = (JSONObject)jsonParser.parse(response);
		   JSONArray jsonObjectArry = (JSONArray)jsonObject.get("peopleRelationship");
			 logger.info("peopleRelationship RequestData Size: "+jsonObjectArry.size());
			 for(int index=0;index<jsonObjectArry.size();index++) {
				 JSONObject jobj=(JSONObject) jsonParser.parse(jsonObjectArry.get(index).toString());
			     String notify_Id=(String) jobj.get("notify_Id");
			     String from_Id=(String) jobj.get("from_Id");
			     String notifyHeader=(String) jobj.get("notifyHeader");
			     String notifyMsg=(String) jobj.get("notifyMsg");
			     String notifyTitle=(String) jobj.get("notifyTitle");
			     String notifyURL=(String) jobj.get("notifyURL");
			     String notify_ts=(String) jobj.get("notify_ts");
			     String watched=(String) jobj.get("watched");
			     String surName=(String) jobj.get("surName");
			     String name=(String) jobj.get("name");
			     String profile_pic=(String) jobj.get("profile_pic");
			     logger.info("peopleRelationshipRequestData [notify_Id]: "+notify_Id);
			     logger.info("peopleRelationshipRequestData [from_Id]: "+from_Id);
			     logger.info("peopleRelationshipRequestData [notifyHeader]: "+notifyHeader);
			     logger.info("peopleRelationshipRequestData [notifyMsg]: "+notifyMsg);
			     logger.info("peopleRelationshipRequestData [notifyTitle]: "+notifyTitle);
			     logger.info("peopleRelationshipRequestData [notifyURL]: "+notifyURL);
			     logger.info("peopleRelationshipRequestData [notify_ts]: "+notify_ts);
			     logger.info("peopleRelationshipRequestData [watched]: "+watched);
			     logger.info("peopleRelationshipRequestData [surName]: "+surName);
			     logger.info("peopleRelationshipRequestData [name]: "+name);
			     logger.info("peopleRelationshipRequestData [profile_pic]: "+profile_pic);
				 boolean inapp=true;
				 String contentTitle="You recieved 1 Friendship Request";
					String bigContentTitle="You recieved 1 Friendship Request"; // Big Title Details:
					String contentText=surName+" "+name+" sent you Friendship Request"; // You have recieved new message
					String ticker="New Friendship Request"; // New Message Alert!
					String[] events = new String[1];
						     events[0] = new String(surName+" "+name+" sent you Friendship Request");
				 new PushNotification().display_closableNotification(context, notifyURL, inapp,
					 contentTitle, bigContentTitle,  contentText, ticker, events);
			 }
		 }
		 catch(Exception e){ logger.error("Exception: "+e.getMessage());}
	 }
}
