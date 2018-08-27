package anups.dun.db.js;

import org.json.JSONArray;
import org.json.JSONObject;
import android.annotation.SuppressLint;
import android.content.Context;
import android.support.v7.app.ActionBarActivity;
import android.webkit.JavascriptInterface;
import anups.dun.db.Database;
import anups.dun.db.tbl.UserFrndsInfo;
import anups.dun.util.AndroidLogger;

@SuppressLint("DefaultLocale")
public class AppSQLiteUsrFrndsContactsInfo extends ActionBarActivity  {

	org.apache.log4j.Logger logger = AndroidLogger.getLogger(AppSQLiteUsrFrndsContactsInfo.class);
	
	private Context mContext;
	
	public AppSQLiteUsrFrndsContactsInfo(Context context) {
	  this.mContext=context;
	}
	
	@JavascriptInterface
	public long data_count_UserFrndsInfo(){
	  long count = 0;
	  Database database =Database.getInstance(mContext);
	  try {
		  
		  UserFrndsInfo userFrndsInfo = new UserFrndsInfo();
		  count = userFrndsInfo.data_count_userFrndsInfo(database);
		  logger.info("data_count_UserFrndsInfo: "+count);
	  }
	  catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
	  finally{ database.close(); }
	  return count;
	}
	
	@JavascriptInterface
	public String data_get_UserFrndsInfo(){
	 String jsonData = "";
	 Database database =Database.getInstance(mContext);
	 try {
	   UserFrndsInfo userFrndsInfo = new UserFrndsInfo();
	   jsonData=userFrndsInfo.data_getAll_UsrFrndsInfo(database);
	   logger.info("data_get_UserFrndsInfo: "+jsonData);
	 }
	 catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
	 finally{ database.close(); }
	 return jsonData;
	}
	
	@JavascriptInterface
	public String data_get_searchUserFrndsInfo(String search){
		search = search.toUpperCase();
		 JSONArray resultantJsonArray = new JSONArray();
		 Database database =Database.getInstance(mContext);
		 try {
		   UserFrndsInfo userFrndsInfo = new UserFrndsInfo();
		   String jsonData=userFrndsInfo.data_getAll_UsrFrndsInfo(database);
		   
		   /* Find a String in JsonData and Display */
		    JSONArray editJsonArray = new JSONArray(jsonData);
			for(int i01=0;i01<editJsonArray.length();i01++){
				JSONObject jsonObject = (JSONObject) editJsonArray.get(i01);
				logger.info("jsonObject: "+jsonObject.toString());
				if(jsonObject!=null){
				  boolean recognizer = false;
					if(!jsonObject.isNull("youCall")){ if(jsonObject.get("youCall").toString().toUpperCase().contains(search)){  recognizer = true; } }
					
					JSONArray subJsonArray = (JSONArray) jsonObject.get("data");
					if(subJsonArray !=null){
						for(int i02=0;i02<subJsonArray.length();i02++){
							JSONObject subJsonObject = subJsonArray.getJSONObject(i02);
							if(!subJsonObject.isNull("surName")){  
								if(subJsonObject.get("surName").toString().toUpperCase().contains(search)){  recognizer = true; }  
							}
							if(!subJsonObject.isNull("name")){  
								if(subJsonObject.get("name").toString().toUpperCase().contains(search)){  recognizer = true; }  
							}
							if(!subJsonObject.isNull("phoneNumber")){  
								if(subJsonObject.get("phoneNumber").toString().toUpperCase().contains(search)){  recognizer = true; } 
							}
							if(!subJsonObject.isNull("country")){  
								if(subJsonObject.get("country").toString().toUpperCase().contains(search)){  recognizer = true; } 
							}
							if(!subJsonObject.isNull("state")){  
								if(subJsonObject.get("state").toString().toUpperCase().contains(search)){  recognizer = true; }  
							}
							if(!subJsonObject.isNull("location")){  
								if(subJsonObject.get("location").toString().toUpperCase().contains(search)){  recognizer = true; } 
							}
							if(!subJsonObject.isNull("minlocation")){ 
								if(subJsonObject.get("minlocation").toString().toUpperCase().contains(search)){  recognizer = true; }  
							}
							
						}
					}
				    logger.info("recognizer: "+recognizer);
					if(recognizer){ resultantJsonArray.put(jsonObject); }
				}
				 
			}
			
		   logger.info("data_get_UserFrndsInfo: "+resultantJsonArray.toString());
		 }
		 catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
		 finally{ database.close(); }
		 return resultantJsonArray.toString();
	}
}
