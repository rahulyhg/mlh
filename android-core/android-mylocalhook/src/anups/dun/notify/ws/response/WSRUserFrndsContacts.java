package anups.dun.notify.ws.response;

import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import anups.dun.constants.BusinessConstants;
import anups.dun.db.Database;
import anups.dun.db.js.AppSQLiteUsrFrndsContactsInfo;
import anups.dun.db.tbl.UserFrndsContacts;
import anups.dun.js.AppSessionManagement;
import anups.dun.util.AndroidLogger;

public class WSRUserFrndsContacts {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSRUserFrndsContacts.class);
	 private Context context;
	 private String response;
	 
	 public WSRUserFrndsContacts(String response,Context context){ this.response=response;this.context=context; }
	 
	 public void funcTrigger_usrFrndsContacts(){
	   JSONParser jsonParser = new JSONParser();
	   try {
		   JSONObject jsonObject01 = (JSONObject)jsonParser.parse(response);
		   JSONArray jsonArray = (JSONArray)jsonObject01.get("data");
		   for(int index=0;index<jsonArray.size();index++){
			   JSONObject jsonObject02=(JSONObject) jsonParser.parse(jsonArray.get(index).toString());
			   String user_Id = (String) jsonObject02.get("user_Id");
			   String username = (String) jsonObject02.get("username");
			   String surName = (String) jsonObject02.get("surName");
			   String name = (String) jsonObject02.get("name");
			   String mcountrycode = (String) jsonObject02.get("mcountrycode");
			   String youCall = null;
			   String relationship = null;
			   String isContacts = null;
			   String mobile = (String) jsonObject02.get("mobile");
			   String minlocation = (String) jsonObject02.get("minlocation");
			   String location = (String) jsonObject02.get("location");
			   String state = (String) jsonObject02.get("state");
			   String country = (String) jsonObject02.get("country");
			   String isFriend = (String) jsonObject02.get("IsFriend");
			   String created_On = (String) jsonObject02.get("created_On");
			   
			   /* Update ::: */
			   Database database = Database.getInstance(context);
			   UserFrndsContacts usrFrndsContacts = new UserFrndsContacts();
			   boolean status = usrFrndsContacts.data_update_usrFrndContacts(database, user_Id, username, surName, surName, 
					   youCall, relationship, country, state, location, minlocation, isContacts, isFriend, 
					   created_On, mcountrycode, mobile);
			   logger.info("Updated Status : "+status);
			   
			  String jsonData = usrFrndsContacts.data_getAll_UsrFrndContacts(database, "0", String.valueOf(usrFrndsContacts.data_count_usrFrndInfo(database)));
			  logger.info("jsonData : "+jsonData);
			  database.close();
		   }
	   }
		 catch(Exception e){ logger.error("Exception: "+e.getMessage());}
	 }
}
