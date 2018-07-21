package anups.dun.db.tbl;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import anups.dun.db.DB;
import anups.dun.db.Database;
import anups.dun.util.AndroidLogger;

public class UserFrndsInfo {

	org.apache.log4j.Logger logger = AndroidLogger.getLogger(UserFrndsInfo.class);
	
	public static final String TBL_NAME="userFrndsInfo";
	
	public static final String COLUMN_00_FRNDID = "frnd_Id";
	public static final String COLUMN_01_USERID = "user_Id";
	public static final String COLUMN_02_SURNAME = "surName";
	public static final String COLUMN_03_NAME = "name";
	public static final String COLUMN_04_YOUCALL = "youCall";
	public static final String COLUMN_05_RELATIONSHIP = "relationship";
	public static final String COLUMN_06_COUNTRY = "country";
	public static final String COLUMN_07_STATE = "state";
	public static final String COLUMN_08_LOCATION = "location";
	public static final String COLUMN_09_MINLOCATION = "minlocation";
	
	public String schema_userFrndsInfo(){
	  StringBuilder schema = new StringBuilder();
	  schema.append("CREATE TABLE IF NOT EXISTS ").append(TBL_NAME).append("( ");
	  schema.append(COLUMN_00_FRNDID).append(" INTEGER PRIMARY KEY AUTOINCREMENT, ");
	  schema.append(COLUMN_01_USERID).append(" text, ");
	  schema.append(COLUMN_02_SURNAME).append(" text, ");
	  schema.append(COLUMN_03_NAME).append(" text, ");
	  schema.append(COLUMN_04_YOUCALL).append(" text, ");
	  schema.append(COLUMN_05_RELATIONSHIP).append(" text, ");
	  schema.append(COLUMN_06_COUNTRY).append(" text, ");
	  schema.append(COLUMN_07_STATE).append(" text, ");
	  schema.append(COLUMN_08_LOCATION).append(" text, ");
	  schema.append(COLUMN_09_MINLOCATION).append(" text ");
	  schema.append(");");
	  return schema.toString();
	}
	
	 public long addUsrFrndInfo(Database database, String surName, String name, String youCall, String relationship, String mobileNumber, 
	  String country, String state, String location, String minlocation){
	  SQLiteDatabase db = database.getWritableDatabase();
	  ContentValues contentValues = new ContentValues();
	      contentValues.put(COLUMN_01_USERID, surName);
		  contentValues.put(COLUMN_02_SURNAME, surName);
		  contentValues.put(COLUMN_03_NAME, name);	
		  contentValues.put(COLUMN_04_YOUCALL, youCall);
		  contentValues.put(COLUMN_05_RELATIONSHIP, relationship);	
		  contentValues.put(COLUMN_06_COUNTRY, country);	
		  contentValues.put(COLUMN_07_STATE, state);
		  contentValues.put(COLUMN_08_LOCATION, location);	
		  contentValues.put(COLUMN_09_MINLOCATION, minlocation);
	  long id = db.insert(TBL_NAME, null, contentValues);
	  logger.info("addUsrFrnd: "+id);
	  db.close();
      return id; 
	 }
	
	 public String viewUsrFrndInfoList(Database database){
		 StringBuilder jsonData = new StringBuilder();
		 jsonData.append("{\"data\":[");
		 SQLiteDatabase db = database.getReadableDatabase();
		 Cursor cursor =  db.rawQuery( "select * from "+TBL_NAME+";", null );
		 if (cursor.moveToFirst()) {
		   while ( !cursor.isAfterLast() ) {
			 jsonData.append("{");
			 jsonData.append("\"").append(COLUMN_01_USERID).append("\":\"").append(cursor.getString(0)).append("\",");
			 jsonData.append("\"").append(COLUMN_02_SURNAME).append("\":\"").append(cursor.getString(1)).append("\",");
			 jsonData.append("\"").append(COLUMN_03_NAME).append("\":\"").append(cursor.getString(2)).append("\",");
			 jsonData.append("\"").append(COLUMN_04_YOUCALL).append("\":\"").append(cursor.getString(3)).append("\",");
			 jsonData.append("\"").append(COLUMN_05_RELATIONSHIP).append("\":\"").append(cursor.getString(4)).append("\",");
			 jsonData.append("\"").append(COLUMN_06_COUNTRY).append("\":\"").append(cursor.getString(5)).append("\",");
			 jsonData.append("\"").append(COLUMN_07_STATE).append("\":\"").append(cursor.getString(6)).append("\",");
			 jsonData.append("\"").append(COLUMN_08_LOCATION).append("\":\"").append(cursor.getString(7)).append("\",");
			 jsonData.append("\"").append(COLUMN_09_MINLOCATION).append("\":\"").append(cursor.getString(8)).append("\"");
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
	 
	 public String getUsrFrndInfo(Database database, long frnd_Id){
		 StringBuilder jsonData = new StringBuilder();
		 jsonData.append("{\"data\":[");
		 SQLiteDatabase db = database.getReadableDatabase();
		 Cursor cursor =  db.rawQuery( "select * from "+TBL_NAME+" where "+COLUMN_00_FRNDID+"='"+frnd_Id+"';", null );
		 if (cursor.moveToFirst()) {
		   while ( !cursor.isAfterLast() ) {
			 jsonData.append("{");
			 jsonData.append("\"").append(COLUMN_01_USERID).append("\":\"").append(cursor.getString(0)).append("\",");
			 jsonData.append("\"").append(COLUMN_02_SURNAME).append("\":\"").append(cursor.getString(1)).append("\",");
			 jsonData.append("\"").append(COLUMN_03_NAME).append("\":\"").append(cursor.getString(2)).append("\",");
			 jsonData.append("\"").append(COLUMN_04_YOUCALL).append("\":\"").append(cursor.getString(3)).append("\",");
			 jsonData.append("\"").append(COLUMN_05_RELATIONSHIP).append("\":\"").append(cursor.getString(4)).append("\",");
			 jsonData.append("\"").append(COLUMN_06_COUNTRY).append("\":\"").append(cursor.getString(5)).append("\",");
			 jsonData.append("\"").append(COLUMN_07_STATE).append("\":\"").append(cursor.getString(6)).append("\",");
			 jsonData.append("\"").append(COLUMN_08_LOCATION).append("\":\"").append(cursor.getString(7)).append("\",");
			 jsonData.append("\"").append(COLUMN_09_MINLOCATION).append("\":\"").append(cursor.getString(8)).append("\"");
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
	 
	 
	public boolean updateUsrFrndInfo(Database database, long frnd_Id, String user_Id, String surName, String name, String youCall, String relationship, String mobileNumber, 
			  String country, String state, String location, String minlocation){
		  SQLiteDatabase db = database.getWritableDatabase();
	      ContentValues contentValues = new ContentValues();
	      if(user_Id != null){  contentValues.put(COLUMN_01_USERID, user_Id);  }
	      if(surName != null){  contentValues.put(COLUMN_02_SURNAME, surName);  }
	      if(name != null){ contentValues.put(COLUMN_03_NAME, name); }
	      if(youCall != null){  contentValues.put(COLUMN_04_YOUCALL, youCall);  }
	      if(relationship != null){ contentValues.put(COLUMN_05_RELATIONSHIP, relationship); }
	      if(country !=null){ contentValues.put(COLUMN_06_COUNTRY, country); }
	      if(state != null){ contentValues.put(COLUMN_07_STATE, state); }
	      if(location !=null){ contentValues.put(COLUMN_08_LOCATION, location); }
	      if(minlocation !=null){ contentValues.put(COLUMN_09_MINLOCATION, minlocation); }
	      db.update(TBL_NAME, contentValues, COLUMN_00_FRNDID+" = ? ", new String[] { Long.toString(frnd_Id) } );
	      db.close();
	      return true;
	}
	
	public Integer deleteUsrFrndInfo (Database database,long frnd_Id) {
	    SQLiteDatabase db = database.getWritableDatabase();
	    return db.delete(TBL_NAME, COLUMN_00_FRNDID+" = ? ", new String[] { Long.toString(frnd_Id) });
	}
	
}
