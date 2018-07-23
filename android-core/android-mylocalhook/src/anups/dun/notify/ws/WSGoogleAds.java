package anups.dun.notify.ws;

import android.content.Context;
import android.os.AsyncTask;
import anups.dun.notify.ws.response.WSRGoogleAds;
import anups.dun.notify.ws.util.WSUtility;

public class WSGoogleAds extends AsyncTask<String, String, String> {

	private Context context;
	public WSGoogleAds(Context context){ this.context=context; }
	@Override
	protected String doInBackground(String... params) {
	  WSUtility wsUtility = new WSUtility();
	  return wsUtility.HttpURLGETResponse(params[0]);
	}
	
	@Override  
	protected void onPostExecute(String response) {
	  WSRGoogleAds wsrGoogleAds = new WSRGoogleAds(response,context);
	  wsrGoogleAds.funcTrigger_googleAds();
	  
	}
	
}
