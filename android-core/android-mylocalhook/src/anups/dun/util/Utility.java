package anups.dun.util;

import android.annotation.SuppressLint;
import java.io.File;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

public class Utility {
  org.apache.log4j.Logger logger = AndroidLogger.getLogger(Utility.class);
	
  public String dateFormatSetup(String timestamp){
	  String output="";
	   try {
		  String[] months={"January","February","March","April","May","June","July","August","September","October","November","December"};	
		  Date formattedDate = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss").parse(timestamp);
		  Calendar setCalendar = Calendar.getInstance();
		  setCalendar.setTime(formattedDate);
		  int setYear = setCalendar.get(Calendar.YEAR);
		  int setMonth = setCalendar.get(Calendar.MONTH);
		  int setDay = setCalendar.get(Calendar.DAY_OF_MONTH);
		  String setDateFormat = new SimpleDateFormat("hh:mm a").format(formattedDate);
		  
		  Calendar todayCalendar = Calendar.getInstance();
		  int todayYear = todayCalendar.get(Calendar.YEAR);
		  int todayMonth = todayCalendar.get(Calendar.MONTH);
		  int todayDay = todayCalendar.get(Calendar.DAY_OF_MONTH);
		  
		  long diffMilliSeconds=todayCalendar.getTimeInMillis()-setCalendar.getTimeInMillis();
		  long diffSeconds = diffMilliSeconds / 1000 % 60;
		  long diffMinutes = diffMilliSeconds / (60 * 1000) % 60;
		  long diffHours = diffMilliSeconds / (60 * 60 * 1000) % 24;
		  long diffDays = diffMilliSeconds / (24 * 60 * 60 * 1000);
		  
		  if(diffDays>0 && diffDays<5){ 
			  if(diffDays==1){  output=diffDays+" Day ago"; }
			  else { output=diffDays+" Days ago"; }
		   }
		  else if(diffDays==0 && diffHours>0){ 
			  if(diffDays==1){ output=diffHours+" Hour ago"; }
			  else { output=diffHours+" Hours ago"; }
		  }
		  else if(diffDays==0 && diffHours==0 && diffMinutes>0){ 
			  if(diffMinutes==1){ output=diffMinutes+" Minute ago"; }
			  else { output=diffMinutes+" Minutes ago"; }
		  }
		  else if(diffDays==0 && diffHours==0 && diffMinutes==0) { output="Now"; }
		  else {  output=setDay+" "+months[setMonth]+" "+setYear+" "+setDateFormat; }
		  
	   } 
	   catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
	   return output;
	  }

  
  public void setProjectPathOnMobile(){
	  
    String internalMemory=System.getenv("EXTERNAL_STORAGE");
	String externalMemory=System.getenv("EXTERNAL_STORAGE2");
	String filePath=externalMemory+"/"+"mylocalhook";
	if(externalMemory==null){
		filePath=internalMemory+"/"+"mylocalhook";
	}
		   logger.info("internalMemory: "+internalMemory);
	       logger.info("externalMemory: "+externalMemory);
		   logger.info("filePath: "+filePath);
		   
		   File externalDir = new File(filePath);
	       if(!externalDir.exists()) { externalDir.mkdir();  }
	}
}
