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
import anups.dun.db.tbl.UserFrndsInfo;
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
			   		  String[] phoneNumberArry=phoneNumber.split(",");
				      String mCountryCode=phoneNumberArry[0];
				      String mobile=phoneNumberArry[1];
			   String minlocation = (String) jsonObject02.get("minlocation");
			   String profile_pic = (String) jsonObject02.get("profile_pic");
			   String location = (String) jsonObject02.get("location");
			   String state = (String) jsonObject02.get("state");
			   String country = (String) jsonObject02.get("country");
			   String isFriend = (String) jsonObject02.get("IsFriend");
			   String created_on = (String) jsonObject02.get("created_On");
			   String relationship= null;
			   String isContacts = (String) jsonObject02.get("IsContacts");
			   /* Update ::: */
			   
			   /* Update UserFrndsContacts Table */
			   UserFrndsContacts userFrndsContacts = new UserFrndsContacts();
			   UserFrndsProfile userFrndsProfile = new UserFrndsProfile();
			   if(isContacts.equalsIgnoreCase("NO")){ /* Add New */
				   UserFrndsInfo userFrndInfo = new UserFrndsInfo();
					 String frnd_Id="N";
					 String youCall="";
					 isContacts="NO";
					 isFriend="YES";
					 userFrndInfo.data_add_userFrndsInfo(database, frnd_Id, youCall);
					long execution_Id = userFrndsContacts.data_add_userFrndsContacts(database, frnd_Id, mCountryCode+mobile, user_Id, isContacts, isFriend);
					long  execution_Id02 = userFrndsProfile.data_update_userFrndsProfile(database, user_Id, userName, surName, name, relationship,
							   country, state, location, minlocation, created_on, profile_pic);		
					logger.info("execution_Id: "+execution_Id);
			   } else {
			       long execution_Id01 = userFrndsContacts.data_update_usrFrndsContacts(database, phoneNumber, user_Id,isContacts,isFriend);
			       long  execution_Id02 = userFrndsProfile.data_update_userFrndsProfile(database, user_Id, userName, surName, name, relationship,
						   country, state, location, minlocation, created_on, profile_pic);		
				   logger.info("execution_Id: "+execution_Id01);
				   logger.info("execution_Id: "+execution_Id02);
		      }
		   }
	   }
		 catch(Exception e){ logger.error("Exception: "+e.getMessage());}
	     finally{ database.close(); }
	 }
}
