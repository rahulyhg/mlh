package anups.dun.notify.ws;

import android.content.Context;
import android.os.AsyncTask;
import anups.dun.notify.ws.response.WSRIntervalMinute;
import anups.dun.notify.ws.util.WSUtility;
import anups.dun.util.AndroidLogger;

public class WSIntervalMinute  extends AsyncTask<String, String, String>{
	  org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSIntervalMinute.class);
	  private Context context;
	  
	  public WSIntervalMinute(Context context){ this.context=context; }
	  
	  @Override
	  protected String doInBackground(String... params) {
		 WSUtility wsUtility = new WSUtility();
		 return wsUtility.HttpURLGETResponse(params[0]);
	  }

	  @Override  
	  protected void onPostExecute(String response) {
		  WSRIntervalMinute wsr=new WSRIntervalMinute(context,response);
		  logger.info("WSIntervalMinute Response: "+response);
	  }

}
