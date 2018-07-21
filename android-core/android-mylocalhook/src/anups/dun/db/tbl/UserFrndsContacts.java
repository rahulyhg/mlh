package anups.dun.db.tbl;

import android.content.ContentValues;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import anups.dun.db.Database;
import anups.dun.util.AndroidLogger;

public class UserFrndsContacts {
org.apache.log4j.Logger logger = AndroidLogger.getLogger(UserFrndsInfo.class);
	
	public static final String TBL_NAME="userFrndsContacts";
	
	public static final String COLUMN_00_CONTACTID = "contact_Id";
	public static final String COLUMN_01_FRNDID = "frnd_Id";
	public static final String COLUMN_02_PHONENUMBER = "phoneNumber";
	
	public String schema_userFrndsContacts(){
      StringBuilder schema = new StringBuilder();
	  schema.append("CREATE TABLE IF NOT EXISTS ").append(TBL_NAME).append("( ");
	  schema.append(COLUMN_00_CONTACTID).append(" INTEGER PRIMARY KEY AUTOINCREMENT, ");
	  schema.append(COLUMN_01_FRNDID).append(" INTEGER, ");
      schema.append(COLUMN_02_PHONENUMBER).append(" text, ");
	  schema.append("FOREIGN KEY (").append(COLUMN_01_FRNDID).append(")");
	  schema.append(" REFERENCES ").append(UserFrndsInfo.TBL_NAME).append("(").append(UserFrndsInfo.COLUMN_00_FRNDID).append(") ");
	  schema.append(");");
	  return schema.toString();
	}
		
	public long adduserFrndsContacts(Database database, long frnd_Id, String phoneNumber){
	  SQLiteDatabase db = database.getWritableDatabase();
	  ContentValues contentValues = new ContentValues();
	  		contentValues.put(COLUMN_01_FRNDID, frnd_Id);
	  		contentValues.put(COLUMN_02_PHONENUMBER, phoneNumber);
	  long id = db.insert(TBL_NAME, null, contentValues);
	  logger.info("adduserFrndsContacts: "+id);
	  db.close();
	  return id; 
	}
	
	public String viewUsrFrndContactsList(Database database){
		StringBuilder jsonData01 = new StringBuilder();
		 jsonData01.append("{\"data\":[");
		 SQLiteDatabase db = database.getReadableDatabase();
		 StringBuilder query01 = new StringBuilder();
		 query01.append( "SELECT ");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_00_FRNDID).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_01_USERID).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_02_SURNAME).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_03_NAME).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_04_YOUCALL).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_05_RELATIONSHIP).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_06_COUNTRY).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_07_STATE).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_08_LOCATION).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_09_MINLOCATION).append("");
		 query01.append(" FROM ").append(UserFrndsInfo.TBL_NAME);
		 
		 Cursor cursor01 =  db.rawQuery(query01.toString(), null );
		 
		 if (cursor01.moveToFirst()) {
		   while ( !cursor01.isAfterLast() ) {
			String frnd_Id=cursor01.getString(0);
			String user_Id=cursor01.getString(1);
			String surName=cursor01.getString(2);
			String name=cursor01.getString(3);
			String youCall=cursor01.getString(4);
			String relationship=cursor01.getString(5);
			String country=cursor01.getString(6);
			String state=cursor01.getString(7);
			String location=cursor01.getString(8);
			String minlocation=cursor01.getString(9);
			
			jsonData01.append("{");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_00_FRNDID).append("\":\"").append(frnd_Id).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_01_USERID).append("\":\"").append(user_Id).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_02_SURNAME).append("\":\"").append(surName).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_03_NAME).append("\":\"").append(name).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_04_YOUCALL).append("\":\"").append(youCall).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_05_RELATIONSHIP).append("\":\"").append(relationship).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_06_COUNTRY).append("\":\"").append(country).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_07_STATE).append("\":\"").append(state).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_08_LOCATION).append("\":\"").append(location).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_09_MINLOCATION).append("\":\"").append(minlocation).append("\",");
			 
			StringBuilder query02 = new StringBuilder();
			query02.append("SELECT ").append(UserFrndsContacts.TBL_NAME).append(".").append(UserFrndsContacts.COLUMN_00_CONTACTID).append(", ")
			.append(UserFrndsContacts.TBL_NAME).append(".").append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append(" FROM ");
		    query02.append(UserFrndsContacts.TBL_NAME).append(" WHERE ");
		    query02.append(UserFrndsContacts.TBL_NAME).append(".").append(UserFrndsContacts.COLUMN_01_FRNDID).append("=").append(frnd_Id);
			
		    Cursor cursor02 =  db.rawQuery(query02.toString(), null );
		    StringBuilder jsonData02 = new StringBuilder();
		    jsonData02.append("[");
			 if (cursor02.moveToFirst()) {
				 while ( !cursor02.isAfterLast() ) {
					 String contact_Id = cursor02.getString(0);
					 String phoneNumber = cursor02.getString(1);
					 jsonData02.append("{");
					 jsonData02.append("\"").append(UserFrndsContacts.COLUMN_00_CONTACTID).append("\":\"").append(contact_Id).append("\",");
					 jsonData02.append("\"").append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append("\":\"").append(phoneNumber).append("\"");
					 jsonData02.append("},");
					 cursor02.moveToNext();
				 }
			 }
			 jsonData02.deleteCharAt(jsonData02.length()-1);
			 jsonData02.append("]");
			 jsonData01.append("\"contacts\":").append(jsonData02);
			 jsonData01.append("},");
			 
			 cursor01.moveToNext();
		   }
		}
		 jsonData01.deleteCharAt(jsonData01.length()-1);
		 jsonData01.append("]}");
		 db.close();
		 logger.info("viewUsrFrndList: "+jsonData01.toString());
		 return jsonData01.toString();
	}
	
	public String getUsrFrndContact(Database database, long frnd_Id){
		StringBuilder jsonData = new StringBuilder();
		
		 return jsonData.toString();
	}
}
