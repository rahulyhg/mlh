package anups.dun.util;

import java.io.IOException;
import java.io.InputStreamReader;
import java.io.Reader;
import java.net.URL;
import java.util.Properties;
import android.content.Context;

public class PropertiesFile {
	
	 public String getProperty(String key,Context context) {
		 
		 /*
		 org.apache.log4j.Logger logger = AndroidLogger.getLogger(PropertiesFile.class);
		 Reader reader = null;
		 Properties properties = new Properties();
		 String propertiesFileURL = "http://www.mylocalhook.com/default.properties";
		 logger.info("propertiesFileURL: "+propertiesFileURL);
		 try {
		    URL url = new URL(propertiesFileURL);
		    reader = new InputStreamReader(url.openStream(), "UTF-8"); 
		 } 
		 catch (Exception ex) { logger.error("Failed at  Reading PropertiesFile: "+ex); }
		 finally { 	
			 		if(reader!=null){ 
			 			try { reader.close();  }
			 			catch(IOException ioe){ logger.error("Failed at  Shutting down Reader Object: "+ioe); }
			 		} 
		 		 }
	    return properties.getProperty(key);
	    */
		 return null;
	 }
}
