package anups.dun.db.tbl;

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
	  				schema_userFrndsInfo.append(UserFrndsInfo.COLUMN_01_YOUCALL).append(" TEXT, ");
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
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_09_ISCONTACTS).append(" TEXT, ");
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_10_ISFRIEND).append(" TEXT, ");
	  				schema_userFrndsProfile.append(UserFrndsProfile.COLUMN_11_CREATEDON).append(" TEXT ");
	  				schema_userFrndsProfile.append(");");
	 
	 /* UserFrndsContacts */
	 StringBuilder schema_userFrndsContacts = new StringBuilder();
	 			   schema_userFrndsContacts.append("CREATE TABLE IF NOT EXISTS ").append(UserFrndsContacts.TBL_NAME).append("( ");
	 			   schema_userFrndsContacts.append(UserFrndsContacts.COLUMN_00_CONTACTID).append(" INTEGER PRIMARY KEY AUTOINCREMENT, ");
	 			   schema_userFrndsContacts.append(UserFrndsContacts.COLUMN_01_FRNDID).append(" INTEGER, ");
	 			   schema_userFrndsContacts.append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append(" TEXT, ");
	 			   schema_userFrndsContacts.append(UserFrndsContacts.COLUMN_03_USERID).append(" TEXT ");
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
	
	public String data_getAll_UsrFrndsInfo(Database database, String limit_start, String limit_end){
		StringBuilder jsonData = new StringBuilder();
		SQLiteDatabase sqliteDatabase = database.getReadableDatabase();
		StringBuilder query01 = new StringBuilder();
		     query01.append( "SELECT ");
		     query01.append(UserFrndsInfo.COLUMN_00_FRNDID).append(",").append(UserFrndsInfo.COLUMN_01_YOUCALL);
		     query01.append(" FROM ").append(UserFrndsInfo.TBL_NAME).append(" LIMIT ");
		     query01.append(limit_start).append(",").append(limit_end);
		Cursor cursor01 =  sqliteDatabase.rawQuery(query01.toString(), null );
		jsonData.append("[");
		if(cursor01.moveToFirst()) {
	      while(!cursor01.isAfterLast()) {
	    	  String frnd_Id=cursor01.getString(0);
			  String youCall=cursor01.getString(1);  
			  StringBuilder query02 = new StringBuilder();
			  query02.append("SELECT ");
			  query02.append(UserFrndsProfile.COLUMN_00_USERID).append(",");
			  query02.append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append(",");
			  query02.append(UserFrndsProfile.COLUMN_01_USERNAME).append(",");
			  query02.append(UserFrndsProfile.COLUMN_02_SURNAME).append(",");
			  query02.append(UserFrndsProfile.COLUMN_03_NAME).append(",");
			  query02.append(UserFrndsProfile.COLUMN_04_RELATIONSHIP).append(",");
			  query02.append(UserFrndsProfile.COLUMN_05_COUNTRY).append(",");
			  query02.append(UserFrndsProfile.COLUMN_06_STATE).append(",");
			  query02.append(UserFrndsProfile.COLUMN_07_LOCATION).append(",");
			  query02.append(UserFrndsProfile.COLUMN_08_MINLOCATION).append(",");
			  query02.append(UserFrndsProfile.COLUMN_09_ISCONTACTS).append(",");
			  query02.append(UserFrndsProfile.COLUMN_10_ISFRIEND).append(",");
			  query02.append(UserFrndsProfile.COLUMN_11_CREATEDON);
			  query02.append(" FROM ");
			  query02.append(UserFrndsContacts.TBL_NAME).append(",").append(UserFrndsProfile.TBL_NAME).append(" WHERE ");
			  query02.append(UserFrndsContacts.COLUMN_01_FRNDID).append("=").append(frnd_Id).append(" AND ");
			  query02.append(UserFrndsContacts.COLUMN_03_USERID).append("=").append(UserFrndsProfile.COLUMN_00_USERID);
			  Cursor cursor02 =  sqliteDatabase.rawQuery(query01.toString(), null );
			  if(cursor02.moveToFirst()) {
			      while(!cursor02.isAfterLast()) {
			    	  String user_Id=cursor02.getString(0);
			    	  String phoneNumber=cursor02.getString(1);
			    	  String userName=cursor02.getString(2);
			    	  String surName=cursor02.getString(3);
			    	  String name=cursor02.getString(4);
			    	  String relationship=cursor02.getString(5);
			    	  String country=cursor02.getString(6);
			    	  String state=cursor02.getString(7);
			    	  String location=cursor02.getString(8);
			    	  String minlocation=cursor02.getString(9);
			    	  String isContacts=cursor02.getString(10);
			    	  String isFriend=cursor02.getString(11);
			    	  String createdOn=cursor02.getString(12);
			    	  
			    	  jsonData.append("{").append("\"frnd_Id\":\"").append(frnd_Id).append("\",");
			    	  jsonData.append("\"youCall\":\"").append(youCall).append("\",");
			    	  jsonData.append("\"user_Id\":\"").append(user_Id).append("\",");
			    	  jsonData.append("\"phoneNumber\":\"").append(phoneNumber).append("\",");
			    	  jsonData.append("\"userName\":\"").append(userName).append("\",");
			    	  jsonData.append("\"surName\":\"").append(surName).append("\",");
			    	  jsonData.append("\"name\":\"").append(name).append("\",");
			    	  jsonData.append("\"relationship\":\"").append(relationship).append("\",");
			    	  jsonData.append("\"country\":\"").append(country).append("\",");
			    	  jsonData.append("\"state\":\"").append(state).append("\",");
			    	  jsonData.append("\"location\":\"").append(location).append("\",");
			    	  jsonData.append("\"minlocation\":\"").append(minlocation).append("\",");
			    	  jsonData.append("\"isContacts\":\"").append(isContacts).append("\",");
			    	  jsonData.append("\"isFriend\":\"").append(isFriend).append("\",");
			    	  jsonData.append("\"createdOn\":\"").append(createdOn).append("\"}");
			    	  
			    	  cursor02.moveToNext();
			      }
			  }
		    cursor01.moveToNext();
		  }
		}
		jsonData.append("]");
		return jsonData.toString();
	}
}
