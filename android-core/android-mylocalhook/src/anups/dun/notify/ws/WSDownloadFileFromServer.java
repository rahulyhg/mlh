package anups.dun.notify.ws;

import java.net.HttpURLConnection;
import java.net.URL;

import android.content.Context;
import android.os.AsyncTask;
import anups.dun.app.AndroidWebScreen;
import anups.dun.util.AndroidLogger;

public class WSDownloadFileFromServer extends AsyncTask<String, String, String> {
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSDownloadFileFromServer.class);
 private Context context;
	
 public WSDownloadFileFromServer(Context context){ this.context=context; }
	
 @Override
 protected String doInBackground(String... params) {
  try {
    URL url = new URL(params[0]);//Create Download URl
    HttpURLConnection c = (HttpURLConnection) url.openConnection();//Open Url Connection
    c.setRequestMethod("GET");//Set Request Method to "GET" since we are grtting data
    c.connect();//connect the URL Connection

    //If Connection response is not OK then show Logs
    if (c.getResponseCode() != HttpURLConnection.HTTP_OK) {
    	logger.error("Server returned HTTP " + c.getResponseCode()+ " " + c.getResponseMessage());

    }
  }
  catch(Exception e){  }
  return null;
 }

}
