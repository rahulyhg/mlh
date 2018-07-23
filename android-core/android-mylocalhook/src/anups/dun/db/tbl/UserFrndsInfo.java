package anups.dun.db.tbl;

import android.content.ContentValues;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import anups.dun.db.Database;
import anups.dun.util.AndroidLogger;

public class UserFrndsInfo {

	org.apache.log4j.Logger logger = AndroidLogger.getLogger(UserFrndsInfo.class);
	
	public static final String TBL_NAME="userFrndsInfo";
	
	public static final String COLUMN_00_FRNDID = "frnd_Id";
	public static final String COLUMN_01_USERID = "user_Id";
	public static final String COLUMN_02_USERNAME = "username";
	public static final String COLUMN_03_SURNAME = "surName";
	public static final String COLUMN_04_NAME = "name";
	public static final String COLUMN_05_YOUCALL = "youCall";
	public static final String COLUMN_06_RELATIONSHIP = "relationship";
	public static final String COLUMN_07_COUNTRY = "country";
	public static final String COLUMN_08_STATE = "state";
	public static final String COLUMN_09_LOCATION = "location";
	public static final String COLUMN_10_MINLOCATION = "minlocation";
	public static final String COLUMN_11_ISCONTACTS = "isContacts";
	public static final String COLUMN_12_ISFRIEND = "isFriend";
	public static final String COLUMN_13_CREATEDON = "createdOn";
	
	public String schema_userFrndsInfo(){
	  StringBuilder schema = new StringBuilder();
	  schema.append("CREATE TABLE IF NOT EXISTS ").append(TBL_NAME).append("( ");
	  schema.append(COLUMN_00_FRNDID).append(" INTEGER PRIMARY KEY AUTOINCREMENT, ");
	  schema.append(COLUMN_01_USERID).append(" text, ");
	  schema.append(COLUMN_02_USERNAME).append(" text, ");
	  schema.append(COLUMN_03_SURNAME).append(" text, ");
	  schema.append(COLUMN_04_NAME).append(" text, ");
	  schema.append(COLUMN_05_YOUCALL).append(" text, ");
	  schema.append(COLUMN_06_RELATIONSHIP).append(" text, ");
	  schema.append(COLUMN_07_COUNTRY).append(" text, ");
	  schema.append(COLUMN_08_STATE).append(" text, ");
	  schema.append(COLUMN_09_LOCATION).append(" text, ");
	  schema.append(COLUMN_10_MINLOCATION).append(" text, ");
	  schema.append(COLUMN_11_ISCONTACTS).append(" text, ");
	  schema.append(COLUMN_12_ISFRIEND).append(" text, ");
	  schema.append(COLUMN_13_CREATEDON).append(" text ");
	  schema.append(");");
	  return schema.toString();
	}
	
	 public long data_add_usrFrndInfo(Database database, String user_Id, String userName, String surName, String name, String youCall, String relationship,
	  String country, String state, String location, String minlocation, String isContacts, String isFriend, String created_on){
	  SQLiteDatabase db = database.getWritableDatabase();
	  ContentValues contentValues = new ContentValues();
	      contentValues.put(COLUMN_01_USERID, user_Id);
		  contentValues.put(COLUMN_02_USERNAME, userName);
		  contentValues.put(COLUMN_03_SURNAME, surName);	
		  contentValues.put(COLUMN_04_NAME, name);
		  contentValues.put(COLUMN_05_YOUCALL, youCall);
		  contentValues.put(COLUMN_06_RELATIONSHIP, relationship);	
		  contentValues.put(COLUMN_07_COUNTRY, country);	
		  contentValues.put(COLUMN_08_STATE, state);
		  contentValues.put(COLUMN_09_LOCATION, location);	
		  contentValues.put(COLUMN_10_MINLOCATION, minlocation);
		  contentValues.put(COLUMN_11_ISCONTACTS, isContacts);
		  contentValues.put(COLUMN_12_ISFRIEND, isFriend);
		  contentValues.put(COLUMN_13_CREATEDON, created_on);
	  long id = db.insert(TBL_NAME, null, contentValues);
	  logger.info("addUsrFrnd: "+id);
      return id; 
	 }
	
	 public String data_getAll_usrFrndInfo(Database database, int limit_start, int limit_end){
		 StringBuilder jsonData = new StringBuilder();
		 jsonData.append("{\"data\":[");
		 SQLiteDatabase db = database.getReadableDatabase();
		 Cursor cursor =  db.rawQuery( "select * from "+TBL_NAME+" limit "+limit_start+","+limit_end+";", null );
		 if (cursor.moveToFirst()) {
		   while ( !cursor.isAfterLast() ) {
			 jsonData.append("{");
			 jsonData.append("\"").append(COLUMN_01_USERID).append("\":\"").append(cursor.getString(0)).append("\",");
			 jsonData.append("\"").append(COLUMN_02_USERNAME).append("\":\"").append(cursor.getString(1)).append("\",");
			 jsonData.append("\"").append(COLUMN_03_SURNAME).append("\":\"").append(cursor.getString(2)).append("\",");
			 jsonData.append("\"").append(COLUMN_04_NAME).append("\":\"").append(cursor.getString(3)).append("\",");
			 jsonData.append("\"").append(COLUMN_05_YOUCALL).append("\":\"").append(cursor.getString(4)).append("\",");
			 jsonData.append("\"").append(COLUMN_06_RELATIONSHIP).append("\":\"").append(cursor.getString(5)).append("\",");
			 jsonData.append("\"").append(COLUMN_07_COUNTRY).append("\":\"").append(cursor.getString(6)).append("\",");
			 jsonData.append("\"").append(COLUMN_08_STATE).append("\":\"").append(cursor.getString(7)).append("\",");
			 jsonData.append("\"").append(COLUMN_09_LOCATION).append("\":\"").append(cursor.getString(8)).append("\",");
			 jsonData.append("\"").append(COLUMN_10_MINLOCATION).append("\":\"").append(cursor.getString(9)).append("\",");
			 jsonData.append("\"").append(COLUMN_11_ISCONTACTS).append("\":\"").append(cursor.getString(10)).append("\",");
			 jsonData.append("\"").append(COLUMN_12_ISFRIEND).append("\":\"").append(cursor.getString(11)).append("\",");
			 jsonData.append("\"").append(COLUMN_13_CREATEDON).append("\":\"").append(cursor.getString(12)).append("\"");
			 jsonData.append("},");
			 cursor.moveToNext();
		   }
		}
		 jsonData.deleteCharAt(jsonData.length()-1);
		 jsonData.append("]}");
		 logger.info("viewUsrFrndList: "+jsonData.toString());
		 return jsonData.toString();
	 }
	 
	 public String data_get_usrFrndInfo(Database database, long frnd_Id){
		 StringBuilder jsonData = new StringBuilder();
		 jsonData.append("{\"data\":[");
		 SQLiteDatabase db = database.getReadableDatabase();
		 Cursor cursor =  db.rawQuery( "select * from "+TBL_NAME+" where "+COLUMN_00_FRNDID+"='"+frnd_Id+"';", null );
		 if (cursor.moveToFirst()) {
		   while ( !cursor.isAfterLast() ) {
			 jsonData.append("{");
			 jsonData.append("\"").append(COLUMN_01_USERID).append("\":\"").append(cursor.getString(0)).append("\",");
			 jsonData.append("\"").append(COLUMN_02_USERNAME).append("\":\"").append(cursor.getString(1)).append("\",");
			 jsonData.append("\"").append(COLUMN_03_SURNAME).append("\":\"").append(cursor.getString(2)).append("\",");
			 jsonData.append("\"").append(COLUMN_04_NAME).append("\":\"").append(cursor.getString(3)).append("\",");
			 jsonData.append("\"").append(COLUMN_05_YOUCALL).append("\":\"").append(cursor.getString(4)).append("\",");
			 jsonData.append("\"").append(COLUMN_06_RELATIONSHIP).append("\":\"").append(cursor.getString(5)).append("\",");
			 jsonData.append("\"").append(COLUMN_07_COUNTRY).append("\":\"").append(cursor.getString(6)).append("\",");
			 jsonData.append("\"").append(COLUMN_08_STATE).append("\":\"").append(cursor.getString(7)).append("\",");
			 jsonData.append("\"").append(COLUMN_09_LOCATION).append("\":\"").append(cursor.getString(8)).append("\",");
			 jsonData.append("\"").append(COLUMN_10_MINLOCATION).append("\":\"").append(cursor.getString(9)).append("\",");
			 jsonData.append("\"").append(COLUMN_11_ISCONTACTS).append("\":\"").append(cursor.getString(10)).append("\",");
			 jsonData.append("\"").append(COLUMN_12_ISFRIEND).append("\":\"").append(cursor.getString(11)).append("\",");
			 jsonData.append("\"").append(COLUMN_13_CREATEDON).append("\":\"").append(cursor.getString(12)).append("\"");
			 jsonData.append("},");
			 cursor.moveToNext();
		   }
		}
		 jsonData.deleteCharAt(jsonData.length()-1);
		 jsonData.append("]}");
		 db.close();
		 logger.info("viewUsrFrndList: "+jsonData.toString());
		 return jsonData.toString();
	 }
	 
	 
	public boolean data_update_usrFrndInfo(Database database, long frnd_Id, String user_Id, String username, String surName, String name, String youCall, 
			String relationship,  String country, String state, String location, String minlocation, String isContacts, String isFriend, String createdOn){
		  SQLiteDatabase db = database.getWritableDatabase();
	      ContentValues contentValues = new ContentValues();
	      if(user_Id != null){  contentValues.put(COLUMN_01_USERID, user_Id);  }
	      if(username != null){  contentValues.put(COLUMN_02_USERNAME, username);  }
	      if(surName != null){  contentValues.put(COLUMN_03_SURNAME, surName);  }
	      if(name != null){ contentValues.put(COLUMN_04_NAME, name); }
	      if(youCall != null){  contentValues.put(COLUMN_05_YOUCALL, youCall);  }
	      if(relationship != null){ contentValues.put(COLUMN_06_RELATIONSHIP, relationship); }
	      if(country !=null){ contentValues.put(COLUMN_07_COUNTRY, country); }
	      if(state != null){ contentValues.put(COLUMN_08_STATE, state); }
	      if(location !=null){ contentValues.put(COLUMN_09_LOCATION, location); }
	      if(minlocation !=null){ contentValues.put(COLUMN_10_MINLOCATION, minlocation); }
	      if(isContacts !=null){ contentValues.put(COLUMN_11_ISCONTACTS, isContacts); }
	      if(isFriend !=null){ contentValues.put(COLUMN_12_ISFRIEND, isFriend); }
	      if(createdOn !=null){ contentValues.put(COLUMN_13_CREATEDON, createdOn); }
	      db.update(TBL_NAME, contentValues, COLUMN_00_FRNDID+" = ? ", new String[] { Long.toString(frnd_Id) } );
	      return true;
	}
	
	public Integer data_delete_usrFrndInfo(Database database,long frnd_Id) {
	    SQLiteDatabase db = database.getWritableDatabase();
	    return db.delete(TBL_NAME, COLUMN_00_FRNDID+" = ? ", new String[] { Long.toString(frnd_Id) });
	}
	
}
