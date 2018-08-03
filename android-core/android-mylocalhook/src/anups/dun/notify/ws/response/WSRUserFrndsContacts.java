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
import anups.dun.db.tbl.UserFrndsProfile;
import anups.dun.js.AppSessionManagement;
import anups.dun.util.AndroidLogger;

public class WSRUserFrndsContacts {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSRUserFrndsContacts.class);
	 private Context context;
	 private String response;
	 
	 public WSRUserFrndsContacts(String response,Context context){ this.response=response;this.context=context; }
	 
	 public void funcTrigger_usrFrndsContacts(){
	 /* Sample Response:  {"data":[{"user_Id":"USR273782437846","username":"geetha","surName":"Nellutla","name":"Geetha Rani ","phoneNumber":"+91|9959633209",
	  * 							"minlocation":"L. B. Nagar","location":"Ranga Reddy District","state":"Telangana","country":"India","IsFriend":"NO"},
	  * 						   {"user_Id":"USR461726196865","username":"anupwefe","surName":"Nelwefl","name":"eeffwee","phoneNumber":"+91|9948390094",
	  * 							"minlocation":"Bijapur City","location":"Bijapur","state":"Karnataka","country":"India","IsFriend":"NO"},
	  * 						   {"user_Id":"USR715494757975","username":"asdwww","surName":"aasc","name":"acedqw","phoneNumber":"+91|9177221984",
	  * 							 "minlocation":"Araku Valley","location":"Araku","state":"Andhra Pradesh","country":"India","IsFriend":"NO"}]}
	  */
	   JSONParser jsonParser = new JSONParser();
	   Database database = Database.getInstance(context);
	   try {
		   JSONObject jsonObject01 = (JSONObject)jsonParser.parse(response);
		   JSONArray jsonArray = (JSONArray)jsonObject01.get("data");
		   
		   for(int index=0;index<jsonArray.size();index++){
			   JSONObject jsonObject02=(JSONObject) jsonParser.parse(jsonArray.get(index).toString());
			   String user_Id = (String) jsonObject02.get("user_Id");
			   String userName = (String) jsonObject02.get("username");
			   String surName = (String) jsonObject02.get("surName");
			   String name = (String) jsonObject02.get("name");
			   String phoneNumber=(String) jsonObject02.get("phoneNumber");
			   String minlocation = (String) jsonObject02.get("minlocation");
			   String location = (String) jsonObject02.get("location");
			   String state = (String) jsonObject02.get("state");
			   String country = (String) jsonObject02.get("country");
			   String isFriend = (String) jsonObject02.get("IsFriend");
			   String created_on = (String) jsonObject02.get("created_On");
			   String relationship= null;
			   String isContacts = null;
			   /* Update ::: */
			   
			   /* Update UserFrndsContacts Table */
			   UserFrndsContacts userFrndsContacts = new UserFrndsContacts();
			   UserFrndsProfile userFrndsProfile = new UserFrndsProfile();
			   userFrndsContacts.data_update_usrFrndsContacts(database, phoneNumber, user_Id);
			   long execution_Id = userFrndsProfile.data_update_userFrndsProfile(database, user_Id, userName, surName, name, relationship,
						            country, state, location, minlocation, isContacts, isFriend, created_on);
			   logger.info("execution_Id: "+execution_Id);
		   }
	   }
		 catch(Exception e){ logger.error("Exception: "+e.getMessage());}
	     finally{ database.close(); }
	 }
}
