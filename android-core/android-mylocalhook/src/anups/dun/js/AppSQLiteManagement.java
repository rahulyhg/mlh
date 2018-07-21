package anups.dun.js;

import android.content.Context;
import android.database.Cursor;
import android.support.v7.app.ActionBarActivity;
import android.webkit.JavascriptInterface;
import android.widget.Toast;
import anups.dun.db.DB;

public class AppSQLiteManagement extends ActionBarActivity {
	Context mContext;
	public AppSQLiteManagement(Context c) {  mContext = c; }
	
	@JavascriptInterface
	public boolean insertIntoAppStatistics(String ipV4, String user_Id, String appOpen, String appClose){
		DB database = DB.getInstance(mContext);
		return database.insertIntoAppStatistics(ipV4, user_Id, appOpen, appClose);
	}
	
	@JavascriptInterface
	public String getAppStatistics(String appOpen, String appClose){
		StringBuilder sb =new StringBuilder();
		DB database = DB.getInstance(mContext);
		Cursor cursor = database.getAppStatisticsData(appOpen, appClose);
		Toast.makeText(mContext, "cursor: "+cursor, Toast.LENGTH_SHORT).show();
		while(cursor.moveToNext()){
		  String data = cursor.getString(cursor.getColumnIndexOrThrow("IPv4Address"));
		  sb.append("data: ").append(data);
		}
		cursor.close();
		return sb.toString();
	}
}
