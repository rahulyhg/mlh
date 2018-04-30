package anups.dun.util;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.Properties;

import android.content.Context;
import android.content.res.AssetManager;
import android.os.AsyncTask;
import android.util.Log;
import android.widget.Toast;
import anups.dun.app.AndroidWebScreen;

public class PropertiesFile {
	
	 public String getProperty(String key,Context context) {
		 org.apache.log4j.Logger logger = AndroidLogger.getLogger(PropertiesFile.class);
	    Properties properties = new Properties();
	    AssetManager assetManager = context.getAssets();
	    try {
	      InputStream inputStream = assetManager.open("config.properties");
	      properties.load(inputStream);
	    }
	    catch(IOException ioe){ logger.error("PropertiesFile Exception: "+ioe.getMessage()); }
	    return properties.getProperty(key);
	 }
}
