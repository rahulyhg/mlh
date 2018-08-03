package anups.dun.db.js;

import android.content.Context;
import android.support.v7.app.ActionBarActivity;
import android.webkit.JavascriptInterface;
import anups.dun.db.Database;
import anups.dun.db.tbl.UserFrndsContacts;
import anups.dun.db.tbl.UserFrndsInfo;
import anups.dun.db.tbl.UserFrndsProfile;
import anups.dun.util.AndroidLogger;

public class AppSQLiteUsrFrndsContactsInfo extends ActionBarActivity  {

	org.apache.log4j.Logger logger = AndroidLogger.getLogger(AppSQLiteUsrFrndsContactsInfo.class);
	
	private Context mContext;
	
	public AppSQLiteUsrFrndsContactsInfo(Context context) {
	  this.mContext=context;
	}
	
	@JavascriptInterface
	public long data_count_UserFrndsInfo(){
	  long count = 0;
	  try {
		  Database database =Database.getInstance(mContext);
		  UserFrndsInfo userFrndsInfo = new UserFrndsInfo();
		  count = userFrndsInfo.data_count_userFrndsInfo(database);
		  database.close();
		  logger.info("data_count_UserFrndsInfo: "+count);
	  }
	  catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
	  return count;
	}
	
	@JavascriptInterface
	public String data_get_UserFrndsInfo(String limit_start, String limit_end){
	 String jsonData = "";
	 try {
	  Database database =Database.getInstance(mContext);
	  UserFrndsInfo userFrndsInfo = new UserFrndsInfo();
	  jsonData=userFrndsInfo.data_getAll_UsrFrndsInfo(database, limit_start, limit_end);
	  database.close();
	  logger.info("data_get_UserFrndsInfo: "+jsonData);
	 }
	 catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
	 return jsonData;
	}
}
