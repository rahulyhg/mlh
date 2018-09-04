package anups.dun.util;

import android.annotation.SuppressLint;
import java.io.File;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

public class Utility {
  org.apache.log4j.Logger logger = AndroidLogger.getLogger(Utility.class);

  
  
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
