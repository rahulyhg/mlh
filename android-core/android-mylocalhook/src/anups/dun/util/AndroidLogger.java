package anups.dun.util;

import java.io.File;
import de.mindpipe.android.logging.log4j.LogConfigurator;
import org.apache.log4j.Level;
import org.apache.log4j.Logger;

import android.Manifest;
import android.content.Context;
import android.os.Environment;
import android.widget.Toast;
import anups.dun.app.AndroidWebScreen;
import anups.dun.constants.BusinessConstants;

public class AndroidLogger {

	private static org.apache.log4j.Logger logger = AndroidLogger.getLogger(AndroidLogger.class);
	public static LogConfigurator logConfigurator = new LogConfigurator();
	public static final long LOGGER_FILESIZE=2097152; // 1 MB  (1048576)  2MB (2097152)
	
    public static org.apache.log4j.Logger getLogger(Class clazz) {
	  Logger log = Logger.getLogger(clazz);
	  try {
     	//   log.setLevel(Level.ERROR);
	    String filePath=BusinessConstants.INTERNALMEMORYPATH+"/"+"mylocalhook";
        logConfigurator.setFileName(filePath+"/logs/log.txt");
        logConfigurator.setRootLevel(Level.ALL);
        logConfigurator.setLevel("org.apache", Level.ALL);
        logConfigurator.setUseFileAppender(true);
        logConfigurator.setFilePattern("%d %-5p [%c{2}]-[%L] %m%n");
        logConfigurator.setMaxFileSize(1024 * 1024 * 5);
        logConfigurator.setImmediateFlush(true);
        logConfigurator.configure();
	  }
	  catch(Exception e){  }
     return log;
    }

	public static void regulateLoggerFile(){
        String filePath=BusinessConstants.INTERNALMEMORYPATH+"/mylocalhook/logs/log.txt";
 	   File file = new File(filePath);
 	   long fileSize = Integer.parseInt(String.valueOf(file.length()));
 	   logger.info("Logger File Size: "+fileSize);
 	   if(fileSize>LOGGER_FILESIZE){ /* Delete File */
 		  boolean deleted = file.delete();
 		  if(deleted) { logger.info("Deleted Logger"); }
 		  else { logger.info("Not Deleted Logger"); } 
 	   } 
    }
	
	
}
