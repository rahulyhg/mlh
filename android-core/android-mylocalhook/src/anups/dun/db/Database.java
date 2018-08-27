package anups.dun.db;

import anups.dun.constants.BusinessConstants;
import anups.dun.db.tbl.UserFrndsInfo;
import anups.dun.js.AppSessionManagement;
import android.content.Context;
import android.database.Cursor;
import android.database.DatabaseUtils;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.widget.Toast;

public class Database extends SQLiteOpenHelper {
	private static Database sInstance;
	private static final String DATABASE_NAME = "mylocalhook";
	private static final int DATABASE_VERSION = 1;
	private Context context;
	
	public static final String DATABASE_FILE = "Mylocalhook.db";
    public String DATABASE_FILEPATH;
	 
    public static synchronized Database getInstance(Context context) {
      if (sInstance == null) {
		  sInstance = new Database(context.getApplicationContext()); 
	  }
	  return sInstance;
	}

	private Database(Context context) {
	  super(context, DATABASE_NAME, null, DATABASE_VERSION);
	  this.context=context;
	}

    public SQLiteDatabase connectDatabase(){
      AppSessionManagement appSessionManagement = new AppSessionManagement(context);
      String externalDir = appSessionManagement.getAndroidSession(BusinessConstants.ANDROID_PROJECTPATH);
	  DATABASE_FILEPATH=externalDir+"//"+DATABASE_FILE;
	  SQLiteDatabase db = SQLiteDatabase.openOrCreateDatabase(DATABASE_FILEPATH, null);
	  return db;
    }
	  
	@Override
	public void onCreate(SQLiteDatabase db) {
		new UserFrndsInfo().schema_userFrndsInfo(db);
	}

	@Override
	public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
		new UserFrndsInfo().drop_userFrndsInfoSchema(db);
		onCreate(db);
	}
	
	public int numberOfRows(String tableName){
	  SQLiteDatabase db = this.getReadableDatabase();
	  int numRows = (int) DatabaseUtils.queryNumEntries(db, tableName);
	  db.close();
	  return numRows;
	}
	
	public String getListOfTablesInDatabase(SQLiteDatabase db){
		StringBuilder jsonData = new StringBuilder();
		jsonData.append("{\"Tables\":[");
		Cursor c = db.rawQuery("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name", null);
		if (c.moveToFirst()) {
		    while ( !c.isAfterLast() ) {
		    	jsonData.append("\"").append(c.getString(0)).append("\",");
		        c.moveToNext();
		    }
		}
		jsonData.deleteCharAt(jsonData.length()-1);
		jsonData.append("]}");
		Toast.makeText(context, "Table Name=> "+jsonData.toString(), Toast.LENGTH_LONG).show();
		return jsonData.toString();
	}
}

