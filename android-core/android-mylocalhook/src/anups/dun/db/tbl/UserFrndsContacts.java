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
	
	public long data_add_userFrndsContacts(Database database, String frnd_Id, String phoneNumber, String user_Id){
	  SQLiteDatabase db = database.getWritableDatabase();
	  ContentValues contentValues = new ContentValues();
	     contentValues.put(UserFrndsContacts.COLUMN_01_FRNDID, frnd_Id);
		 contentValues.put(UserFrndsContacts.COLUMN_02_PHONENUMBER, phoneNumber);
		 contentValues.put(UserFrndsContacts.COLUMN_03_USERID, user_Id);
	  long id = db.insert(UserFrndsContacts.TBL_NAME, null, contentValues);
	 return id; 
    }
	
	public int data_update_usrFrndsContacts(Database database, String contact_Id, String frnd_Id, String phoneNumber, String user_Id){
		ContentValues contentValues = new ContentValues();
		SQLiteDatabase db = database.getReadableDatabase();
		  if(frnd_Id != null){ contentValues.put(UserFrndsContacts.COLUMN_01_FRNDID, frnd_Id); }
	      if(phoneNumber !=null){ contentValues.put(UserFrndsContacts.COLUMN_02_PHONENUMBER, phoneNumber); }
	      if(phoneNumber !=null){ contentValues.put(UserFrndsContacts.COLUMN_03_USERID, user_Id); }
	   return db.update(UserFrndsContacts.TBL_NAME, contentValues, UserFrndsContacts.COLUMN_00_CONTACTID+" = ? ", new String[] { contact_Id } );
	}
	
}
