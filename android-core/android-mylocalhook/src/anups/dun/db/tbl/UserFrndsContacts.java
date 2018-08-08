package anups.dun.db.tbl;

import android.content.ContentValues;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import anups.dun.db.Database;
import anups.dun.util.AndroidLogger;

public class UserFrndsContacts {
org.apache.log4j.Logger logger = AndroidLogger.getLogger(UserFrndsContacts.class);
	
	public static final String TBL_NAME="userFrndsContacts";
	public static final double TBL_VERSION=1.0;
	public static final String COLUMN_00_CONTACTID = "contact_Id"; // INTEGER
	public static final String COLUMN_01_FRNDID = "frnd_Id"; // INTEGER
	public static final String COLUMN_02_PHONENUMBER = "phoneNumber"; // TEXT
	public static final String COLUMN_03_USERID = "user_Id"; // TEXT
	public static final String COLUMN_04_ISCONTACTS = "isContacts";
	public static final String COLUMN_05_ISFRIEND = "isFriend";
	
	public long data_add_userFrndsContacts(Database database, String frnd_Id, String phoneNumber, String user_Id, String isContacts, String isFriend){
		/* If PhoneNUmber not exists, then Add */
		long id = 0;
		SQLiteDatabase db = database.getWritableDatabase();
		StringBuilder query01 = new StringBuilder();
		 query01.append( "SELECT count(*) ").append(" FROM ").append(UserFrndsContacts.TBL_NAME);
		 query01.append(" WHERE ").append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append(" = '").append(phoneNumber).append("' ");
		 query01.append(" OR ").append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append(" LIKE '%").append(phoneNumber).append("%'; ");
		 Cursor cursor01 =  db.rawQuery(query01.toString(), null ); 
		   if(cursor01.moveToFirst()) {
		      while(!cursor01.isAfterLast() ) {
		    	  
			    long dataCount=Long.parseLong(cursor01.getString(0));
			    logger.info("dataCount: "+dataCount); 
			    if(dataCount==0){
			     ContentValues contentValues = new ContentValues();
			                   contentValues.put(UserFrndsContacts.COLUMN_01_FRNDID, frnd_Id);
				               contentValues.put(UserFrndsContacts.COLUMN_02_PHONENUMBER, phoneNumber);
				               contentValues.put(UserFrndsContacts.COLUMN_03_USERID, user_Id);
				               contentValues.put(UserFrndsContacts.COLUMN_04_ISCONTACTS, isContacts);
				               contentValues.put(UserFrndsContacts.COLUMN_05_ISFRIEND, isFriend);
			      id = db.insert(UserFrndsContacts.TBL_NAME, null, contentValues);
			      logger.info("Added Successfully: "+id);
			    }
			    cursor01.moveToNext();
		      }
		   }
	 return id; 
    }
	
	public long data_update_usrFrndsContacts(Database database, String phoneNumber, String user_Id, String isContacts, String isFriend){
	/* Check with PhoneNumber already Exists or not.
	 *   IF Exists, Update
	 *   Else New, Insert
	 */
		logger.info("data_update_usrFrndsContacts: ");
		long execution_Id=0;
		String[] phoneNumberArry=phoneNumber.split(",");
		String mCountryCode=phoneNumberArry[0];
		String mobile=phoneNumberArry[1];
		logger.info("phoneNumberArry: "+phoneNumber+" mCountryCode: "+mCountryCode+" mobile: "+mobile);
		SQLiteDatabase db = database.getReadableDatabase();
		 StringBuilder query01 = new StringBuilder();
		 query01.append( "SELECT ").append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append(" FROM ").append(UserFrndsContacts.TBL_NAME);
		 query01.append(" WHERE ").append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append(" = '").append(mCountryCode+mobile).append("' OR ");
		 query01.append(UserFrndsContacts.COLUMN_02_PHONENUMBER).append(" LIKE '%").append(mobile).append("%';");
		logger.info("Update: "+query01);
		 Cursor cursor01 =  db.rawQuery(query01.toString(), null ); 
		 logger.info("cursor01: "+cursor01.getCount());
		   if(cursor01.moveToFirst()) {
		      while(!cursor01.isAfterLast() ) {
			    String phNumber=cursor01.getString(0);
			    try {
			    ContentValues contentValues = new ContentValues();
		        if(phoneNumber !=null){ contentValues.put(UserFrndsContacts.COLUMN_02_PHONENUMBER, mCountryCode+mobile); }
		        if(user_Id !=null){ contentValues.put(UserFrndsContacts.COLUMN_03_USERID, user_Id); }
		        if(isContacts !=null){ contentValues.put(UserFrndsContacts.COLUMN_04_ISCONTACTS, isContacts); }
		        if(isFriend !=null){ contentValues.put(UserFrndsContacts.COLUMN_05_ISFRIEND, isFriend); }
		        execution_Id = db.update(UserFrndsContacts.TBL_NAME, contentValues, UserFrndsContacts.COLUMN_02_PHONENUMBER+" = ? ", new String[] { phNumber } );
		        logger.info("execution_Id: "+execution_Id);
			    }
			    catch(Exception e){ logger.error("Exception: "+e.getMessage());}
			    cursor01.moveToNext();
		      }
		    }
	   return execution_Id;
	}
	
}
