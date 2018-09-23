package anups.dun.notify.ws;

import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Handler;
import anups.dun.notify.ws.response.WSRIntervalMinute;
import anups.dun.notify.ws.util.WSUtility;
import anups.dun.services.BGServiceMinute;
import anups.dun.util.AndroidLogger;

public class WSIntervalMinute  extends AsyncTask<String, String, String>{
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSIntervalMinute.class);
 private Context context;
 public WSIntervalMinute(Context context){ this.context=context; }

 @Override
 protected String doInBackground(String... params) {
  return new WSUtility().HttpURLPOSTResponse(params);
 }

 @Override  
 protected void onPostExecute(String response) {
  logger.info("WSIntervalMinute Response: "+response);
  WSRIntervalMinute wsr=new WSRIntervalMinute(context,response);
  				    wsr.funcTrigger_usrFrndReqRecieved();
			   		wsr.funcTrigger_usrFrndReqAccepted();
			   		
  new Handler().postDelayed(new Runnable(){
	@Override
	public void run() {   
	 context.stopService(new Intent(context.getApplicationContext(),BGServiceMinute.class));
	 context.startService(new Intent(context.getApplicationContext(),BGServiceMinute.class));
	}
  }, 60000);
 }

}
