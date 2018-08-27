package anups.dun.db;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.DatabaseUtils;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;
import anups.dun.util.AndroidLogger;

public class DB extends SQLiteOpenHelper {
	 org.apache.log4j.Logger logger = AndroidLogger.getLogger(SQLiteOpenHelper.class);
/* When changing the table schema in code, Delete the old database file so that onCreate() is run again. */
	public static final String DATABASE_FILE = "Mylocalhook.db";
	
	public static final String MLHTBL_GOOGLEADS = "googleAds";
	public static final String MLHCOL_GOOGLEADS_ADSID = "adsId";
	public static final String MLHCOL_GOOGLEADS_CALDATE = "calDate";
	public static final String MLHCOL_GOOGLEADS_HOUR = "hour";
	public static final String MLHCOL_GOOGLEADS_MAXADS = "max_ads";
	
	public static final String MLHTBL_APPSTATS = "appStatistics";
	public static final String MLHTBL_APPSTATS_STATID = "Stat_Id";
	public static final String MLHTBL_APPSTATS_USERID = "user_Id";
	public static final String MLHTBL_APPSTATS_IPV4 = "IPv4Address";
	public static final String MLHTBL_APPSTATS_APPOPEN = "AppOpen";
	public static final String MLHTBL_APPSTATS_APPCLOSE = "AppClose";
	
	public static final String MLHTBL_USERFRNDS = "userFrnds";
	public static final String MLHTBL_USERFRNDS_FRNDID = "frnd_Id";
	public static final String MLHTBL_USERFRNDS_SURNAME = "surName";
	public static final String MLHTBL_USERFRNDS_NAME = "name";
	public static final String MLHTBL_USERFRNDS_YOUCALL = "youCall";
	public static final String MLHTBL_USERFRNDS_RELATIONSHIP = "relationship";
	public static final String MLHTBL_USERFRNDS_MOBILENUMBER = "mobileNumber";
	public static final String MLHTBL_USERFRNDS_COUNTRY = "country";
	public static final String MLHTBL_USERFRNDS_STATE = "state";
	public static final String MLHTBL_USERFRNDS_LOCATION = "location";
	public static final String MLHTBL_USERFRNDS_MINLOCATION = "minlocation";
	private static DB sInstance;
	public Context context;
	public static String DATABASE_FILEPATH;
	public static synchronized DB getInstance(Context context) {
		
	    if (sInstance == null) {
	      sInstance = new DB(context.getApplicationContext());
	    }
	    return sInstance;
	  }
	
	private DB(Context context) {
	   super(context, DATABASE_FILE , null, 1);
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
		logger.info("SQLite onCreate is opened..");
    /*  onCreate() is only run when the database file did not exist.  */
		StringBuilder sb = new StringBuilder();	
		
		sb.append("CREATE TABLE IF NOT EXISTS ").append(MLHTBL_GOOGLEADS).append("( ");
		sb.append(MLHCOL_GOOGLEADS_ADSID).append(" INTEGER PRIMARY KEY AUTOINCREMENT , ");
		sb.append(MLHCOL_GOOGLEADS_CALDATE).append(" text, ");
		sb.append(MLHCOL_GOOGLEADS_HOUR).append(" integer, ");
		sb.append(MLHCOL_GOOGLEADS_MAXADS).append(" integer ");
		sb.append(");");
		
		sb.append("CREATE TABLE IF NOT EXISTS ").append(MLHTBL_APPSTATS).append("( ");
		sb.append(MLHTBL_APPSTATS_STATID).append(" INTEGER PRIMARY KEY AUTOINCREMENT , ");
		sb.append(MLHTBL_APPSTATS_IPV4).append(" text, ");
		sb.append(MLHTBL_APPSTATS_USERID).append(" text, ");
		sb.append(MLHTBL_APPSTATS_APPOPEN).append(" timestamp, ");
		sb.append(MLHTBL_APPSTATS_APPCLOSE).append(" timestamp ");
		sb.append(");");
		
		sb.append("CREATE TABLE IF NOT EXISTS ").append(MLHTBL_USERFRNDS).append("( ");
		sb.append(MLHTBL_USERFRNDS_FRNDID).append(" INTEGER PRIMARY KEY AUTOINCREMENT, ");
		sb.append(MLHTBL_USERFRNDS_SURNAME).append(" text, ");
		sb.append(MLHTBL_USERFRNDS_NAME).append(" text, ");
		sb.append(MLHTBL_USERFRNDS_YOUCALL).append(" text, ");
		sb.append(MLHTBL_USERFRNDS_RELATIONSHIP).append(" text, ");
		sb.append(MLHTBL_USERFRNDS_MOBILENUMBER).append(" text, ");
		sb.append(MLHTBL_USERFRNDS_COUNTRY).append(" text, ");
		sb.append(MLHTBL_USERFRNDS_STATE).append(" text, ");
		sb.append(MLHTBL_USERFRNDS_LOCATION).append(" text, ");
		sb.append(MLHTBL_USERFRNDS_MINLOCATION).append(" text ");
		sb.append(");");
		
		db.execSQL(sb.toString());
		
	}
	
	@Override
	public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
	/*	onUpgrade() is only called when the database file exists but the stored version number is lower than requested in constructor. */
		StringBuilder sql = new StringBuilder();
		sql.append("DROP TABLE IF EXISTS "+MLHTBL_GOOGLEADS+"; ");
		sql.append("DROP TABLE IF EXISTS "+MLHTBL_APPSTATS+"; ");
		sql.append("DROP TABLE IF EXISTS "+MLHTBL_USERFRNDS+"; ");
		db.execSQL(sql.toString());
		onCreate(db);
	}
	
	public int numberOfRows(String tableName){
	  SQLiteDatabase db = this.getReadableDatabase();
	  int numRows = (int) DatabaseUtils.queryNumEntries(db, tableName);
	  return numRows;
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
	
	public Cursor getGoogleAdsData(Integer maxAds) {
	   StringBuilder sb = new StringBuilder();
	   sb.append("select * from ").append(MLHTBL_GOOGLEADS);
	   sb.append(" where ").append(MLHCOL_GOOGLEADS_ADSID).append(" = ").append(maxAds).append(";");
       SQLiteDatabase db = this.getReadableDatabase();
       Cursor res =  db.rawQuery(sb.toString(), null );
       return res;
    }
	
	public boolean updateGoogleAds(Integer adsId, String calDate, Integer hour, Integer maxAds){
		SQLiteDatabase db = this.getWritableDatabase();
	    ContentValues contentValues = new ContentValues();
	      contentValues.put(MLHCOL_GOOGLEADS_CALDATE, calDate);
	      contentValues.put(MLHCOL_GOOGLEADS_HOUR, hour);	
	      contentValues.put(MLHCOL_GOOGLEADS_MAXADS, maxAds);
	      db.update(MLHTBL_GOOGLEADS, contentValues, MLHCOL_GOOGLEADS_ADSID+" = ? ", new String[] { Integer.toString(adsId) } );
	   //   db.insert(MLHTBL_GOOGLEADS, null, contentValues);
		return true;
	}
	
	
	public boolean insertIntoAppStatistics(String ipV4, String user_Id, String appOpen, String appClose){
		SQLiteDatabase db = this.getWritableDatabase();
	    ContentValues contentValues = new ContentValues();
	      contentValues.put(MLHTBL_APPSTATS_IPV4, ipV4);
	      contentValues.put(MLHTBL_APPSTATS_USERID, user_Id);	
	      contentValues.put(MLHTBL_APPSTATS_APPOPEN, appOpen);
	      contentValues.put(MLHTBL_APPSTATS_APPCLOSE, appClose);
	      db.insert(MLHTBL_APPSTATS, null, contentValues);
		return true;
	}
	
	
	public Cursor getAppStatisticsData(String appOpen, String appClose) {
		   StringBuilder sb = new StringBuilder();
		   sb.append("select * from ").append(MLHTBL_APPSTATS);
		   sb.append(" where ").append(MLHTBL_APPSTATS_APPOPEN).append(" > '").append(appOpen).append("' AND ");
		   sb.append(MLHTBL_APPSTATS_APPCLOSE).append(" < '").append(appClose).append("'; ");
	       SQLiteDatabase db = this.getReadableDatabase();
	       Cursor res =  db.rawQuery(sb.toString(), null );
	       return res;
	 }
	
	public boolean updateAppStatistics(int statId, String ipV4, String user_Id, String appOpen, String appClose){
		SQLiteDatabase db = this.getWritableDatabase();
	    ContentValues contentValues = new ContentValues();
	      contentValues.put(MLHTBL_APPSTATS_IPV4, ipV4);
	      contentValues.put(MLHTBL_APPSTATS_USERID, user_Id);	
	      contentValues.put(MLHTBL_APPSTATS_APPOPEN, appOpen);
	      contentValues.put(MLHTBL_APPSTATS_APPCLOSE, appClose);
	      db.update(MLHTBL_APPSTATS, contentValues, MLHTBL_APPSTATS_STATID+" = ? ", new String[] { Integer.toString(statId) } );
	    //  db.insert(MLHTBL_APPSTATS, null, contentValues);
		return true;
	}
}
