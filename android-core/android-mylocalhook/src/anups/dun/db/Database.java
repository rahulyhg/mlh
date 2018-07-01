package anups.dun.db;

import java.io.File;
import java.util.HashMap;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.DatabaseUtils;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.os.Environment;
import anups.dun.services.OnBootCompleted;
import anups.dun.util.AndroidLogger;

public class Database extends SQLiteOpenHelper {
	 org.apache.log4j.Logger logger = AndroidLogger.getLogger(SQLiteOpenHelper.class);
/* When changing the table schema in code, Delete the old database file so that onCreate() is run again. */
	public static final String DATABASE_NAME = "Mylocalhook.db";
	public static final String MLHTBL_GOOGLEADS = "googleAds";
	public static final String MLHCOL_GOOGLEADS_ADSID = "adsId";
	public static final String MLHCOL_GOOGLEADS_CALDATE = "calDate";
	public static final String MLHCOL_GOOGLEADS_HOUR = "hour";
	public static final String MLHCOL_GOOGLEADS_MAXADS = "max_ads";
	private HashMap hp;
	private static Database sInstance;
	
	public static synchronized Database getInstance(Context context) {
	    if (sInstance == null) {
	      sInstance = new Database(context.getApplicationContext());
	    }
	    return sInstance;
	  }
	
	private Database(Context context) {
	   super(context, DATABASE_NAME , null, 1);
	   String internalMemory=System.getenv("EXTERNAL_STORAGE");
	   String externalMemory=System.getenv("EXTERNAL_STORAGE2");
	   String filePath=externalMemory+"/"+"mylocalhook";
	   if(externalMemory==null){
		   filePath=internalMemory+"/"+"mylocalhook";
	   }
	   logger.info("internalMemory: "+internalMemory);
       logger.info("externalMemory: "+externalMemory);
	   logger.info("filePath: "+filePath);
	   
	   File externalDir = new File(filePath);
       if(!externalDir.exists()) { externalDir.mkdir();  }
       
	   SQLiteDatabase db = SQLiteDatabase.openOrCreateDatabase(externalDir+"//"+DATABASE_NAME, null);
	}
	
	@Override
	public void onCreate(SQLiteDatabase db) {
		logger.info("SQLite onCreate is opened..");
    /*  onCreate() is only run when the database file did not exist.  */
		StringBuilder sb = new StringBuilder();	
		sb.append("CREATE TABLE  ").append(MLHTBL_GOOGLEADS).append("( ");
		sb.append(MLHCOL_GOOGLEADS_ADSID).append(" integer primary key, ");
		sb.append(MLHCOL_GOOGLEADS_CALDATE).append(" text, ");
		sb.append(MLHCOL_GOOGLEADS_HOUR).append(" integer, ");
		sb.append(MLHCOL_GOOGLEADS_MAXADS).append(" integer ");
		sb.append(");");
		db.execSQL(sb.toString());
		
	}

	@Override
	public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
	/*	onUpgrade() is only called when the database file exists but the stored version number is lower than requested in constructor. */
		db.execSQL("DROP TABLE IF EXISTS "+MLHTBL_GOOGLEADS+"; ");
		onCreate(db);
	}

	public boolean insertIntoGoogleAds(String calDate, Integer hour, Integer maxAds){
		SQLiteDatabase db = this.getWritableDatabase();
	    ContentValues contentValues = new ContentValues();
	      contentValues.put(MLHCOL_GOOGLEADS_CALDATE, calDate);
	      contentValues.put(MLHCOL_GOOGLEADS_HOUR, hour);	
	      contentValues.put(MLHCOL_GOOGLEADS_MAXADS, maxAds);
	      db.insert(MLHTBL_GOOGLEADS, null, contentValues);
		return true;
	}
	
	public Cursor getData(Integer maxAds) {
	   StringBuilder sb = new StringBuilder();
	   sb.append("select * from ").append(MLHTBL_GOOGLEADS);
	   sb.append(" where ").append(MLHCOL_GOOGLEADS_ADSID).append(" = ").append(maxAds).append(";");
       SQLiteDatabase db = this.getReadableDatabase();
       Cursor res =  db.rawQuery(sb.toString(), null );
       return res;
    }
	
	public int numberOfRows(){
	   SQLiteDatabase db = this.getReadableDatabase();
	   int numRows = (int) DatabaseUtils.queryNumEntries(db, MLHTBL_GOOGLEADS);
	   return numRows;
	}
	
	public boolean updateGoogleAds(Integer adsId, String calDate, Integer hour, Integer maxAds){
		SQLiteDatabase db = this.getWritableDatabase();
	    ContentValues contentValues = new ContentValues();
	      contentValues.put(MLHCOL_GOOGLEADS_CALDATE, calDate);
	      contentValues.put(MLHCOL_GOOGLEADS_HOUR, hour);	
	      contentValues.put(MLHCOL_GOOGLEADS_MAXADS, maxAds);
	      db.update(MLHTBL_GOOGLEADS, contentValues, MLHCOL_GOOGLEADS_ADSID+" = ? ", new String[] { Integer.toString(adsId) } );
	      db.insert(MLHTBL_GOOGLEADS, null, contentValues);
		return true;
	}
}
