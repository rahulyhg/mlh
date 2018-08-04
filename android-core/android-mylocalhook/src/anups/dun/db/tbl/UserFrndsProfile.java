package anups.dun.db.tbl;

import org.json.JSONArray;
import org.json.JSONObject;

import android.content.ContentValues;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import anups.dun.db.Database;
import anups.dun.util.AndroidLogger;

public class UserFrndsProfile {

	org.apache.log4j.Logger logger = AndroidLogger.getLogger(UserFrndsProfile.class);
	
	public static final String TBL_NAME="userFrndsProfile";
	public static final double TBL_VERSION=1.0;
	public static final String COLUMN_00_USERID = "user_Id";
	public static final String COLUMN_01_USERNAME = "username";
	public static final String COLUMN_02_SURNAME = "surName";
	public static final String COLUMN_03_NAME = "name";
	public static final String COLUMN_04_RELATIONSHIP = "relationship";
	public static final String COLUMN_05_COUNTRY = "country";
	public static final String COLUMN_06_STATE = "state";
	public static final String COLUMN_07_LOCATION = "location";
	public static final String COLUMN_08_MINLOCATION = "minlocation";
	public static final String COLUMN_09_ISCONTACTS = "isContacts";
	public static final String COLUMN_10_ISFRIEND = "isFriend";
	public static final String COLUMN_11_CREATEDON = "createdOn";
	
	
	public long data_add_userFrndsProfile(Database database, String user_Id, String userName, String surName, String name, String relationship,
	  String country, String state, String location, String minlocation, String isContacts, String isFriend, String created_on){
	  SQLiteDatabase db = database.getWritableDatabase();
	  ContentValues contentValues = new ContentValues();
	      contentValues.put(UserFrndsProfile.COLUMN_00_USERID, user_Id);
		  contentValues.put(UserFrndsProfile.COLUMN_01_USERNAME, userName);
		  contentValues.put(UserFrndsProfile.COLUMN_02_SURNAME, surName);	
		  contentValues.put(UserFrndsProfile.COLUMN_03_NAME, name);
		  contentValues.put(UserFrndsProfile.COLUMN_04_RELATIONSHIP, relationship);	
		  contentValues.put(UserFrndsProfile.COLUMN_05_COUNTRY, country);	
		  contentValues.put(UserFrndsProfile.COLUMN_06_STATE, state);
		  contentValues.put(UserFrndsProfile.COLUMN_07_LOCATION, location);	
		  contentValues.put(UserFrndsProfile.COLUMN_08_MINLOCATION, minlocation);
		  contentValues.put(UserFrndsProfile.COLUMN_09_ISCONTACTS, isContacts);
		  contentValues.put(UserFrndsProfile.COLUMN_10_ISFRIEND, isFriend);
		  contentValues.put(UserFrndsProfile.COLUMN_11_CREATEDON, created_on);
	  long id = db.insert(UserFrndsProfile.TBL_NAME, null, contentValues);
      return id; 
	}
	
	public long data_update_userFrndsProfile(Database database, String user_Id, String userName, String surName, String name, String relationship,
			  String country, String state, String location, String minlocation, String isContacts, String isFriend, String created_on){
		long executionId=0;
		long dataCount = 0;
		SQLiteDatabase db = database.getReadableDatabase();
		 StringBuilder query01 = new StringBuilder();
		 query01.append( "SELECT count(*) FROM ").append(UserFrndsProfile.TBL_NAME);
		 query01.append(" WHERE user_Id = '").append(user_Id).append("';");
		 logger.info("Update: "+query01);
		 Cursor cursor01 =  db.rawQuery(query01.toString(), null ); 
		 if (cursor01.moveToFirst()) {
		   while ( !cursor01.isAfterLast() ) {
			 dataCount=Long.parseLong(cursor01.getString(0));
			 if(dataCount>0){
				    ContentValues contentValues = new ContentValues();
					if(user_Id != null){  contentValues.put(UserFrndsProfile.COLUMN_00_USERID, user_Id); }
					if(userName != null){ contentValues.put(UserFrndsProfile.COLUMN_01_USERNAME, userName); }
					if(surName != null){  contentValues.put(UserFrndsProfile.COLUMN_02_SURNAME, surName); }
					if(name != null){  contentValues.put(UserFrndsProfile.COLUMN_03_NAME, name); }
					if(relationship != null){  contentValues.put(UserFrndsProfile.COLUMN_04_RELATIONSHIP, relationship); }
					if(country != null){  contentValues.put(UserFrndsProfile.COLUMN_05_COUNTRY, country);	}
					if(state != null){  contentValues.put(UserFrndsProfile.COLUMN_06_STATE, state);  }
					if(location != null){  contentValues.put(UserFrndsProfile.COLUMN_07_LOCATION, location);	 }
					if(minlocation != null){  contentValues.put(UserFrndsProfile.COLUMN_08_MINLOCATION, minlocation); }
					if(isContacts != null){  contentValues.put(UserFrndsProfile.COLUMN_09_ISCONTACTS, isContacts); }
					if(isFriend != null){ contentValues.put(UserFrndsProfile.COLUMN_10_ISFRIEND, isFriend); }
					if(created_on != null){  contentValues.put(UserFrndsProfile.COLUMN_11_CREATEDON, created_on); }
					executionId = db.update(UserFrndsProfile.TBL_NAME, contentValues, UserFrndsProfile.COLUMN_00_USERID+" = ? ", new String[] { user_Id } );
			 } else {
				 executionId = new UserFrndsProfile().data_add_userFrndsProfile(database, user_Id, userName, surName, name, 
						 relationship, country, state, location, minlocation, isContacts, isFriend, created_on);
			 }
			 cursor01.moveToNext();
		   }
		 }
	  return executionId;
	}
	
}
