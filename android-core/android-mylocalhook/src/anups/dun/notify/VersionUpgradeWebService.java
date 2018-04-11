package anups.dun.notify;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.URL;
import java.sql.Timestamp;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import javax.net.ssl.HttpsURLConnection;

import android.content.Context;
import android.os.AsyncTask;
import android.webkit.WebView;
import android.widget.Toast;
import anups.dun.app.AndroidWebScreen;
import anups.dun.constants.UnclosedNotifications;
import anups.dun.js.AppManagement;
import anups.dun.util.PushNotification;

public class VersionUpgradeWebService extends AsyncTask<String, String, String> {
Context context;
public VersionUpgradeWebService(Context context){
 this.context=context;	
}
	
private final static String USER_AGENT = "Mozilla/5.0";
@Override
protected String doInBackground(String... params) {
String playstoreversion="0.0.0";
try {
  String url = "https://play.google.com/store/apps/details?id=anups.dun.app";
  URL obj = new URL(url);
  HttpsURLConnection con = (HttpsURLConnection)obj.openConnection();
                     con.setRequestMethod("GET");
                     con.setRequestProperty("User-Agent", USER_AGENT);
  int responseCode = con.getResponseCode();
  BufferedReader in = new BufferedReader(new InputStreamReader(con.getInputStream()));
  StringBuilder response = new StringBuilder();
  for(String inputLine;(inputLine = in.readLine()) != null;) {
    response.append(inputLine);
  }
  in.close();
  Pattern pattern = Pattern.compile(".*<div class=\"content\" itemprop=\"softwareVersion\">(.*?)</div>.*");
  Matcher matcher = pattern.matcher(response);

  if(matcher.find()) {
	 playstoreversion=matcher.group(1).trim();
  }
} catch(Exception e){ playstoreversion="0.0.0"; }	
return playstoreversion;
}

@Override  
protected void onPostExecute(String playstoreversion) {    
//progess_msz.setVisibility(View.GONE);  
Toast.makeText(context, "PLAYSTOREVERSION: "+playstoreversion, 3000).show();
String status=new AppManagement(context).checkPlayStoreUpdate(playstoreversion);
if(status.equalsIgnoreCase("APP_TO_UPDATE")){  // APP_TO_UPDATE
String directURL="market://details?id=anups.dun.app";
boolean inapp=false;
String contentTitle="New Version Available";
String bigContentTitle="New Version Available"; // Big Title Details:
String contentText="You are using old Version"; // You have recieved new message
String ticker="New Version Available"; // New Message Alert!
	

String[] events = new String[3];
	     events[0] = new String("You are using old Version");
	     events[1] = new String("New Version is in Playstore");
	     events[2] = new String("Upgrade your App Now!");
new PushNotification().display_unclosableNotification(UnclosedNotifications.UNCLOSEDNOTIFICATION_VERSIONUPGRADE,
		context, directURL, inapp, contentTitle, bigContentTitle, contentText, ticker, events);
}
}  

}
