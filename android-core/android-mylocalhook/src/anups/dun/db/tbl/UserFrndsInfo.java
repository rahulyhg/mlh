package anups.dun.db.tbl;

import org.json.JSONArray;
import org.json.JSONObject;
import android.content.ContentValues;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import anups.dun.db.Database;
import anups.dun.util.AndroidLogger;

public class UserFrndsInfo {
 
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(UserFrndsInfo.class);
	
	public static final String TBL_NAME="userFrndsInfo";
	public static final double TBL_VERSION=1.0;
	public static final String COLUMN_00_FRNDID = "frnd_Id";
	public static final String COLUMN_01_YOUCALL = "youCall";
	
	public void schema_userFrndsInfo(SQLiteDatabase sqliteDatabase){
	  /* UserFrndsInfo */
	  StringBuilder schema_userFrndsInfo = new StringBuilder();
	  				schema_userFrndsInfo.append("CREATE TABLE IF NOT EXISTS ").append(UserFrndsInfo.TBL_NAME).append("( ");
	  				schema_userFrndsInfo.append(UserFrndsInfo.COLUMN_00_FRNDID).append(" INTEGER PRIMARY KEY, ");
	  				schema_userFrndsInfo.append(UserFrndsInfo.COLUMN_01_YOUCALL).append(" TEXT ");
	  				schema_userFrndsInfo.append(");");
	  
	  /* UserFrndsProfile */
	  StringBuilder schema_userFrndsProfile = new StringBuilder();
	  				schema_userFrndsProfile.append("CREATE TABLE IF NOT EXISTS ").append(UserFrndsProfile.TBL_NAME).append("( ");
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_00_USERID).append(" TEXT PRIMARY KEY, ");
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_01_USERNAME).append(" TEXT, ");
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_02_SURNAME).append(" TEXT, ");
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_03_NAME).append(" TEXT, ");
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_04_RELATIONSHIP).append(" TEXT, ");
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_05_COUNTRY).append(" TEXT, ");
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_06_STATE).append(" TEXT, ");
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_07_LOCATION).append(" TEXT, ");
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_08_MINLOCATION).append(" TEXT, ");
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_09_CREATEDON).append(" TEXT, ");
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_10_PROFILEPIC).append(" TEXT ");
	  				schema_userFrndsProfile.append(");");
	 
	 /* UserFrndsContacts */
	 StringBuilder schema_userFrndsContacts = new StringBuilder();
	 			   schema_userFrndsContacts.append("CREATE TABLE IF NOT EXISTS ").append(UserFrndsContacts.TBL_NAME).append("( ");
	 			   schema_userFrndsContacts.append(UserFrndsContacts.COLUMN_00_CONTACTID).append(" INTEGER PRIMARY KEY AUTOINCREMENT, ");
	 			   schema_userFrndsContacts.append(UserFrndsContacts.COLUMN_01_FRNDID).append(" INTEGER, ");
	 			   schema_userFrndsContacts.append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append(" TEXT, ");
	 			   schema_userFrndsContacts.append(UserFrndsContacts.COLUMN_03_USERID).append(" TEXT, ");
	 			   schema_userFrndsContacts.append(UserFrndsContacts.COLUMN_04_ISCONTACTS).append(" TEXT, ");
	 			   schema_userFrndsContacts.append(UserFrndsContacts.COLUMN_05_ISFRIEND).append(" TEXT ");
	 			   schema_userFrndsContacts.append(");");
	 	
	 sqliteDatabase.execSQL(schema_userFrndsInfo.toString());
	 sqliteDatabase.execSQL(schema_userFrndsProfile.toString());	   
	 sqliteDatabase.execSQL(schema_userFrndsContacts.toString());
	}
		
	public void drop_userFrndsInfoSchema(SQLiteDatabase sqliteDatabase){
		sqliteDatabase.execSQL("DROP TABLE IF EXISTS " + UserFrndsContacts.TBL_NAME);
		sqliteDatabase.execSQL("DROP TABLE IF EXISTS " + UserFrndsProfile.TBL_NAME);
		sqliteDatabase.execSQL("DROP TABLE IF EXISTS " + UserFrndsInfo.TBL_NAME);
	}
	
	public long data_add_userFrndsInfo(Database database, String frnd_Id, String youCall){
	 SQLiteDatabase db = database.getWritableDatabase();
	 ContentValues contentValues = new ContentValues();
	    contentValues.put(COLUMN_00_FRNDID, frnd_Id);
		contentValues.put(COLUMN_01_YOUCALL, youCall);
	 long id = db.insert(UserFrndsInfo.TBL_NAME, null, contentValues);
     return id; 
	}

	public int data_update_userFrndsInfo(Database database, String frnd_Id, String youCall){
		ContentValues contentValues = new ContentValues();
		SQLiteDatabase db = database.getReadableDatabase();
	      if(youCall !=null){ contentValues.put(UserFrndsInfo.COLUMN_01_YOUCALL, youCall); }
	   return db.update(UserFrndsInfo.TBL_NAME, contentValues, UserFrndsInfo.COLUMN_00_FRNDID+" = ? ", new String[] { frnd_Id } );
	}
	
	public long data_count_userFrndsInfo(Database database){
		long dataCount = 0;
		 SQLiteDatabase db = database.getReadableDatabase();
		 StringBuilder query01 = new StringBuilder();
		 query01.append( "SELECT count(*) FROM ").append(UserFrndsInfo.TBL_NAME);
		 Cursor cursor01 =  db.rawQuery(query01.toString(), null ); 
		 if (cursor01.moveToFirst()) {
		   while ( !cursor01.isAfterLast() ) {
			 dataCount=Long.parseLong(cursor01.getString(0));
			 cursor01.moveToNext();
		   }
		 }
		 return dataCount;
	}
	
	public String data_getAll_UsrFrndsInfo(Database database){
	   JSONArray jsonArrayObject01 = new JSONArray();
	   try {
	   SQLiteDatabase db = database.getReadableDatabase();
	   StringBuilder query01 = new StringBuilder();
	   				 query01.append( "SELECT ");
	   				 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_00_FRNDID).append(", ");
	   				 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_01_YOUCALL);
	   				 query01.append(" FROM ").append(UserFrndsInfo.TBL_NAME).append(" ORDER BY ");
	   				 query01.append(UserFrndsInfo.TBL_NAME).append(".").append(UserFrndsInfo.COLUMN_01_YOUCALL).append("; ");
	   				
	   Cursor cursor01 =  db.rawQuery(query01.toString(), null ); 
	   long indexing = 0;
	   if (cursor01.moveToFirst()) {
		   while ( !cursor01.isAfterLast() ) {
			 indexing++;
			 String frnd_Id = cursor01.getString(0);
			 String youCall = cursor01.getString(1);
			 JSONObject jsonObject01 = new JSONObject();
						jsonObject01.put("index", indexing);
						jsonObject01.put("frnd_Id", frnd_Id);
						jsonObject01.put("youCall", youCall);
			 
			 
			 StringBuilder query02 = new StringBuilder();
			 			   query02.append( "SELECT DISTINCT(");
				           query02.append(UserFrndsContacts.TBL_NAME).append(".").append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append("), ");
				           query02.append(UserFrndsContacts.TBL_NAME).append(".").append(UserFrndsContacts.COLUMN_03_USERID).append(", ");
				           query02.append(UserFrndsContacts.TBL_NAME).append(".").append(UserFrndsContacts.COLUMN_04_ISCONTACTS).append(", ");
				           query02.append(UserFrndsContacts.TBL_NAME).append(".").append(UserFrndsContacts.COLUMN_05_ISFRIEND).append(", ");
				           query02.append(UserFrndsContacts.TBL_NAME).append(".").append(UserFrndsContacts.COLUMN_00_CONTACTID).append(" ");
				           query02.append(" FROM ").append(UserFrndsContacts.TBL_NAME);
				           query02.append(" WHERE ");
				           query02.append(UserFrndsContacts.COLUMN_01_FRNDID).append("=").append(frnd_Id);
		
		      JSONArray jsonArrayObject02 = new JSONArray();
				    
		      
		      Cursor cursor02 =  db.rawQuery(query02.toString(), null );
		      if (cursor02.moveToFirst()) {
				   while ( !cursor02.isAfterLast() ) {
					   String phoneNumber = cursor02.getString(0);
					   String user_Id = cursor02.getString(1);
					   String isContacts = cursor02.getString(2);
					   String isFriend = cursor02.getString(3);
					   String contactId = cursor02.getString(4);
					   
					   JSONObject jsonObject02 = new JSONObject();
					   jsonObject02.put("contactId", contactId);
					   jsonObject02.put("phoneNumber", phoneNumber);
					   jsonObject02.put("isContacts", isContacts);
					   jsonObject02.put("isFriend", isFriend);
					   
					   StringBuilder query03 = new StringBuilder();
					   				 query03.append("SELECT DISTINCT(");
					   				 query03.append(UserFrndsProfile.TBL_NAME).append(".").append(UserFrndsProfile.COLUMN_00_USERID).append("), ");
					   				 query03.append(UserFrndsProfile.TBL_NAME).append(".").append(UserFrndsProfile.COLUMN_01_USERNAME).append(", ");
					   				 query03.append(UserFrndsProfile.TBL_NAME).append(".").append(UserFrndsProfile.COLUMN_02_SURNAME).append(", ");
					   				 query03.append(UserFrndsProfile.TBL_NAME).append(".").append(UserFrndsProfile.COLUMN_03_NAME).append(", ");
					   				 query03.append(UserFrndsProfile.TBL_NAME).append(".").append(UserFrndsProfile.COLUMN_04_RELATIONSHIP).append(", ");
					   				 query03.append(UserFrndsProfile.TBL_NAME).append(".").append(UserFrndsProfile.COLUMN_05_COUNTRY).append(", ");
					   				 query03.append(UserFrndsProfile.TBL_NAME).append(".").append(UserFrndsProfile.COLUMN_06_STATE).append(", ");
					   				 query03.append(UserFrndsProfile.TBL_NAME).append(".").append(UserFrndsProfile.COLUMN_07_LOCATION).append(", ");
					   				 query03.append(UserFrndsProfile.TBL_NAME).append(".").append(UserFrndsProfile.COLUMN_08_MINLOCATION).append(", ");
					   				 query03.append(UserFrndsProfile.TBL_NAME).append(".").append(UserFrndsProfile.COLUMN_09_CREATEDON).append(", ");
					   				query03.append(UserFrndsProfile.TBL_NAME).append(".").append(UserFrndsProfile.COLUMN_10_PROFILEPIC).append(" ");
					   				 query03.append(" FROM ").append(UserFrndsProfile.TBL_NAME);
							         query03.append(" WHERE ");
							         query03.append(UserFrndsProfile.TBL_NAME).append(".").append(UserFrndsProfile.COLUMN_00_USERID).append("= '");
							         query03.append(user_Id).append("';");
							         
					   Cursor cursor03 =  db.rawQuery(query03.toString(), null );
					   if (cursor03.moveToFirst()) {
						   while ( !cursor03.isAfterLast() ) {
							   String userName = cursor03.getString(1);
							   String surName = cursor03.getString(2);
							   String name = cursor03.getString(3);
							   String relationShip = cursor03.getString(4);
							   String country = cursor03.getString(5);
							   String state  = cursor03.getString(6);
							   String location  = cursor03.getString(7);
							   String minlocation = cursor03.getString(8);
							   String createdOn = cursor03.getString(9);
							   String profile_pic = cursor03.getString(10);
							   
							   jsonObject02.put("user_Id", user_Id);
							   jsonObject02.put("userName", userName);
							   jsonObject02.put("surName", surName);
							   jsonObject02.put("name", name);
							   jsonObject02.put("relationShip", relationShip);
							   jsonObject02.put("country", country);
							   jsonObject02.put("state", state);
							   jsonObject02.put("location", location);
							   jsonObject02.put("minlocation", minlocation);
							   jsonObject02.put("createdOn", createdOn);
							   jsonObject02.put("profile_pic", profile_pic);
							   
							   cursor03.moveToNext();
						   }
					   }
					   
					   
					   jsonArrayObject02.put(jsonObject02);
					   jsonObject01.put("data", jsonArrayObject02);
					   cursor02.moveToNext();
				   }
		      }
		     jsonArrayObject01.put(jsonObject01);
			 cursor01.moveToNext();
		   }
		 }
	   } catch(Exception e) { logger.error("Exception: "+e.getMessage());}
		return jsonArrayObject01.toString();
	}
	
}
