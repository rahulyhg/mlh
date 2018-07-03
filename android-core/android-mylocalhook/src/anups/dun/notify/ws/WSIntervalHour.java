package anups.dun.notify.ws;

import android.content.Context;
import android.os.AsyncTask;
import anups.dun.notify.ws.response.WSRIntervalHour;
import anups.dun.notify.ws.util.WSUtility;
import anups.dun.util.AndroidLogger;

public class WSIntervalHour extends AsyncTask<String, String, String>{
  org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSIntervalDay.class);
  private Context context;
  
  public WSIntervalHour(Context context){ this.context=context; }
  
  @Override
  protected String doInBackground(String... params) {
	 WSUtility wsUtility = new WSUtility();
	 return wsUtility.HttpURLResponse(params[0]);
  }


  @Override  
  protected void onPostExecute(String response) {
	WSRIntervalHour wsrIntervalHour = new WSRIntervalHour(context,response);
	wsrIntervalHour.funcTrigger_playStoreAppVersion();
  }
}
