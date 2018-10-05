package anups.dun.util;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.StringReader;
import java.util.Map.Entry;
import java.util.Properties;

import android.content.Context;
import android.widget.Toast;
import anups.dun.app.AndroidWebScreen;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;

public class PropertyUtility {
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(PropertyUtility.class);
 private Context context;
 public PropertyUtility(Context context){  this.context=context; }
 
 public String createProjectPath(AppSessionManagement appSessionManagement){
   String folderPath=BusinessConstants.INTERNALMEMORYPATH+"/"+"mylocalhook";
   File externalDir = new File(folderPath);
   if(!externalDir.exists()) { externalDir.mkdir();  }
   appSessionManagement.setAndroidSession(BusinessConstants.ANDROID_PROJECTPATH, folderPath);
   return folderPath;
 }
 
 public void generateFile(String propertyFileName, String sBody) {
   try { File file = new File(propertyFileName);
		 FileWriter writer = new FileWriter(file);
		            writer.append(sBody);
		            writer.flush();
		            writer.close();
	 } catch (IOException e) {
		 Toast.makeText(context, "IOException: "+e, Toast.LENGTH_LONG).show();
	 }
 }
 
 public String initializePropertyFile(AppSessionManagement appSessionManagement){
	 String projectPath = createProjectPath(appSessionManagement);
	 String propertyFileName=projectPath+"/"+"project.properties";
	 File externalDir = new File(propertyFileName);
	 if(!externalDir.exists()){
	   StringBuilder projectpropBuilder = new StringBuilder();
	   projectpropBuilder.append("PROJECT_URL=").append("http://mlh.kalyanaveena.com/");
	   generateFile(propertyFileName, projectpropBuilder.toString());
	 }
	 return propertyFileName;
 }
 
 public void readPropertyFile(AppSessionManagement appSessionManagement, String propertyFile) {
  StringBuilder sb = new StringBuilder();
  FileInputStream fileInputStream = null;
  InputStreamReader inputStreamReader = null;
  BufferedReader bufferedReader = null;
  try {  fileInputStream = new FileInputStream(new File(propertyFile));
		 inputStreamReader = new InputStreamReader(fileInputStream);
		 bufferedReader = new BufferedReader(inputStreamReader);
		 for(String line="";(line = bufferedReader.readLine()) != null;) {
		     sb.append(line);
		 }
		 Properties properties = new Properties();
		   		      properties.load(new StringReader(sb.toString()));
		 for(Entry<Object, Object> e : properties.entrySet()) {
			appSessionManagement.setAndroidSession("PROPERTY_"+e.getKey().toString(), e.getValue().toString()); 
			logger.info("PROPERTY_"+e.getKey().toString()+": "+appSessionManagement.getAndroidSession("PROPERTY_"+e.getKey().toString()));
		  }
		}
		catch(Exception e){  Toast.makeText(context, "IOException: "+e, Toast.LENGTH_LONG).show();   }
		finally {
			try {  
				fileInputStream.close();
				inputStreamReader.close();
				bufferedReader.close(); 
			} 
			catch(IOException ioe){ Toast.makeText(context, "IOException: "+ioe, Toast.LENGTH_LONG).show(); }
			
		}
	}
}
