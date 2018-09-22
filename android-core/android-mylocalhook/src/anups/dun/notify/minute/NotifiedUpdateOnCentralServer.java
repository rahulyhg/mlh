package anups.dun.notify.minute;

import android.os.AsyncTask;
import anups.dun.notify.ws.util.WSUtility;

public class NotifiedUpdateOnCentralServer extends AsyncTask<String, String, String>{

	@Override
	protected String doInBackground(String... params) {
	  return new WSUtility().HttpURLGETResponse(params[0]);
	}

}
