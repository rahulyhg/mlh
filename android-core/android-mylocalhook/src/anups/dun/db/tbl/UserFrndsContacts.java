package anups.dun.db.tbl;

import android.content.ContentValues;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import anups.dun.db.Database;
import anups.dun.util.AndroidLogger;

public class UserFrndsContacts {
org.apache.log4j.Logger logger = AndroidLogger.getLogger(UserFrndsContacts.class);
	
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
		
	public long data_add_userFrndsContacts(Database database, long frnd_Id, String phoneNumber){
	  SQLiteDatabase db = database.getWritableDatabase();
	  ContentValues contentValues = new ContentValues();
	  		contentValues.put(COLUMN_01_FRNDID, frnd_Id);
	  		contentValues.put(COLUMN_02_PHONENUMBER, phoneNumber);
	  long id = db.insert(TBL_NAME, null, contentValues);
	  logger.info("adduserFrndsContacts: "+id);
	  return id; 
	}
	

	public long data_count_usrFrndInfo(Database database){
	  long count = 0;
	  SQLiteDatabase sqLiteDatabase = database.getReadableDatabase();
	  StringBuilder query = new StringBuilder();
	  query.append( "SELECT count(*) FROM ").append(UserFrndsInfo.TBL_NAME);
	  Cursor cursor =  sqLiteDatabase.rawQuery(query.toString(), null );
	  if (cursor.moveToFirst()) {
		  while ( !cursor.isAfterLast() ) {
			count = Long.parseLong(cursor.getString(0));
			cursor.moveToNext();
		  }
	  }
	  sqLiteDatabase.close();
	  return count;
	}
	 
	public String data_getAll_UsrFrndContacts(Database database, String limit_start, String limit_end){
		StringBuilder jsonData01 = new StringBuilder();
		 jsonData01.append("{\"data\":[");
		 SQLiteDatabase db = database.getReadableDatabase();
		 StringBuilder query01 = new StringBuilder();
		 query01.append( "SELECT ");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_00_FRNDID).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_01_USERID).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_02_USERNAME).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_03_SURNAME).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_04_NAME).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_05_YOUCALL).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_06_RELATIONSHIP).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_07_COUNTRY).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_08_STATE).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_09_LOCATION).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_10_MINLOCATION).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_11_ISCONTACTS).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_12_ISFRIEND).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_13_CREATEDON).append(" ");
		 query01.append(" FROM ").append(UserFrndsInfo.TBL_NAME).append(" LIMIT ").append(limit_start).append(", ").append(limit_end).append(";");
		 
		 Cursor cursor01 =  db.rawQuery(query01.toString(), null );
		 
		 if (cursor01.moveToFirst()) {
		   while ( !cursor01.isAfterLast() ) {
			String frnd_Id=cursor01.getString(0);
			String user_Id=cursor01.getString(1);
			String userName=cursor01.getString(2);
			String surName=cursor01.getString(3);
			String name=cursor01.getString(4);
			String youCall=cursor01.getString(5);
			String relationship=cursor01.getString(6);
			String country=cursor01.getString(7);
			String state=cursor01.getString(8);
			String location=cursor01.getString(9);
			String minlocation=cursor01.getString(10);
			String isContacts=cursor01.getString(11);
			String isFriend=cursor01.getString(12);
			String createdOn=cursor01.getString(13);
			
			jsonData01.append("{");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_00_FRNDID).append("\":\"").append(frnd_Id).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_01_USERID).append("\":\"").append(user_Id).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_02_USERNAME).append("\":\"").append(userName).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_03_SURNAME).append("\":\"").append(surName).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_04_NAME).append("\":\"").append(name).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_05_YOUCALL).append("\":\"").append(youCall).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_06_RELATIONSHIP).append("\":\"").append(relationship).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_07_COUNTRY).append("\":\"").append(country).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_08_STATE).append("\":\"").append(state).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_09_LOCATION).append("\":\"").append(location).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_10_MINLOCATION).append("\":\"").append(minlocation).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_11_ISCONTACTS).append("\":\"").append(isContacts).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_12_ISFRIEND).append("\":\"").append(isFriend).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_13_CREATEDON).append("\":\"").append(createdOn).append("\"");
			
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
		 logger.info("viewUsrFrndList: "+jsonData01.toString());
		 return jsonData01.toString();
	}
	
	
	public String data_get_UsrFrndContacts(Database database, long frnd_Id){
		StringBuilder jsonData01 = new StringBuilder();
		 jsonData01.append("{\"data\":[");
		 SQLiteDatabase db = database.getReadableDatabase();
		 StringBuilder query01 = new StringBuilder();
		 query01.append( "SELECT ");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_01_USERID).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_02_USERNAME).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_03_SURNAME).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_04_NAME).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_05_YOUCALL).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_06_RELATIONSHIP).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_07_COUNTRY).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_08_STATE).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_09_LOCATION).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_10_MINLOCATION).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_11_ISCONTACTS).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_12_ISFRIEND).append(",");
		 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_13_CREATEDON).append(" ");
		 query01.append(" FROM ").append(UserFrndsInfo.TBL_NAME).append(" WHERE ").append(UserFrndsInfo.COLUMN_00_FRNDID).append(" = ").append(frnd_Id);
		 
		 Cursor cursor01 =  db.rawQuery(query01.toString(), null );
		 
		 if (cursor01.moveToFirst()) {
		   while ( !cursor01.isAfterLast() ) {
			String user_Id=cursor01.getString(0);
			String userName=cursor01.getString(1);
			String surName=cursor01.getString(2);
			String name=cursor01.getString(3);
			String youCall=cursor01.getString(4);
			String relationship=cursor01.getString(5);
			String country=cursor01.getString(6);
			String state=cursor01.getString(7);
			String location=cursor01.getString(8);
			String minlocation=cursor01.getString(9);
			String isContacts=cursor01.getString(10);
			String isFriend=cursor01.getString(11);
			String createdOn=cursor01.getString(12);
			
			jsonData01.append("{");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_01_USERID).append("\":\"").append(user_Id).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_02_USERNAME).append("\":\"").append(userName).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_03_SURNAME).append("\":\"").append(surName).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_04_NAME).append("\":\"").append(name).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_05_YOUCALL).append("\":\"").append(youCall).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_06_RELATIONSHIP).append("\":\"").append(relationship).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_07_COUNTRY).append("\":\"").append(country).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_08_STATE).append("\":\"").append(state).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_09_LOCATION).append("\":\"").append(location).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_10_MINLOCATION).append("\":\"").append(minlocation).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_11_ISCONTACTS).append("\":\"").append(isContacts).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_12_ISFRIEND).append("\":\"").append(isFriend).append("\",");
			jsonData01.append("\"").append(UserFrndsInfo.COLUMN_13_CREATEDON).append("\":\"").append(createdOn).append("\"");
			
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
		 logger.info("viewUsrFrndList: "+jsonData01.toString());
		 return jsonData01.toString();
	}

	public boolean data_update_usrFrndContacts(Database database, String user_Id, String username, String surName, String name, String youCall,
			String relationship, String country, String state, String location, String minlocation, String isContacts, String isFriend, String createdOn,
			String mcountrycode, String mobile){
	  SQLiteDatabase db = database.getWritableDatabase();
	  StringBuilder query01 = new StringBuilder();
	  	query01.append("SELECT ");
	  	query01.append(UserFrndsContacts.COLUMN_01_FRNDID);
	  	query01.append(" FROM ");
	    query01.append(UserFrndsContacts.TBL_NAME).append(" WHERE ");
	    query01.append("(").append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append(" LIKE '%").append(mcountrycode).append(mobile).append("%') OR ");
	    query01.append("(").append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append(" LIKE '%").append(mobile).append("%'); ");
	    
	  Cursor cursor01 =  db.rawQuery(query01.toString(), null );
	  if (cursor01.moveToFirst()) {
		while ( !cursor01.isAfterLast() ) {
		 String frnd_Id = cursor01.getString(0);
		 ContentValues contentValues = new ContentValues();
	      if(user_Id != null){  contentValues.put(UserFrndsInfo.COLUMN_01_USERID, user_Id);  }
	      if(username != null){  contentValues.put(UserFrndsInfo.COLUMN_02_USERNAME, username);  }
	      if(surName != null){  contentValues.put(UserFrndsInfo.COLUMN_03_SURNAME, surName);  }
	      if(name != null){ contentValues.put(UserFrndsInfo.COLUMN_04_NAME, name); }
	      if(youCall != null){  contentValues.put(UserFrndsInfo.COLUMN_05_YOUCALL, youCall);  }
	      if(relationship != null){ contentValues.put(UserFrndsInfo.COLUMN_06_RELATIONSHIP, relationship); }
	      if(country !=null){ contentValues.put(UserFrndsInfo.COLUMN_07_COUNTRY, country); }
	      if(state != null){ contentValues.put(UserFrndsInfo.COLUMN_08_STATE, state); }
	      if(location !=null){ contentValues.put(UserFrndsInfo.COLUMN_09_LOCATION, location); }
	      if(minlocation !=null){ contentValues.put(UserFrndsInfo.COLUMN_10_MINLOCATION, minlocation); }
	      if(isContacts !=null){ contentValues.put(UserFrndsInfo.COLUMN_11_ISCONTACTS, isContacts); }
	      if(isFriend !=null){ contentValues.put(UserFrndsInfo.COLUMN_12_ISFRIEND, isFriend); }
	      if(createdOn !=null){ contentValues.put(UserFrndsInfo.COLUMN_13_CREATEDON, createdOn); }
	      db.update(UserFrndsInfo.TBL_NAME, contentValues, UserFrndsInfo.COLUMN_00_FRNDID+" = ? ", new String[] { frnd_Id } );
		 cursor01.moveToNext();
		}	 
	 }
	  return true;
	}

	public long data_count_usrFrndContacts(Database database, long frnd_Id, String phoneNumber){
		long dataCount = 0;
		 SQLiteDatabase db = database.getReadableDatabase();
		 StringBuilder query01 = new StringBuilder();
		 query01.append( "SELECT count(*) FROM ").append(UserFrndsInfo.TBL_NAME).append(" WHERE ");
		 query01.append(UserFrndsContacts.COLUMN_01_FRNDID).append(" = ").append(frnd_Id).append(" AND ");
		 query01.append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append(" = ").append(phoneNumber).append(";");
		 
		 Cursor cursor01 =  db.rawQuery(query01.toString(), null );
		 
		 if (cursor01.moveToFirst()) {
		   while ( !cursor01.isAfterLast() ) {
			 dataCount=Long.parseLong(cursor01.getString(0));
			 cursor01.moveToNext();
		   }
		 }
		 logger.info("viewUsrFrndContactsList: "+dataCount);
		 return dataCount;
	}

	public int data_update_usrFrndContacts(Database database, String frnd_Id, String phoneNumber){
		ContentValues contentValues = new ContentValues();
		SQLiteDatabase db = database.getReadableDatabase();
	      if(phoneNumber !=null){ contentValues.put(UserFrndsContacts.COLUMN_02_PHONENUMBER, phoneNumber); }
	   return db.update(UserFrndsContacts.TBL_NAME, contentValues, UserFrndsContacts.COLUMN_00_CONTACTID+" = ? ", new String[] { frnd_Id } );
	}
}
