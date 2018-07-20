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

	public static LogConfigurator logConfigurator = new LogConfigurator();
	public static org.apache.log4j.Logger getLogger(Class clazz) {
		
		
		// Environment.getExternalStorageDirectory()
		 Logger log = Logger.getLogger(clazz);
		 try {
     	//   log.setLevel(Level.ERROR);
	    String filePath=BusinessConstants.EXTERNALMEMORYPATH+"/"+"mylocalhook";
	    if(BusinessConstants.EXTERNALMEMORYPATH==null){
		   filePath=BusinessConstants.INTERNALMEMORYPATH+"/"+"mylocalhook";
	    }
        
        logConfigurator.setFileName(filePath+"/logs/log.txt");
        logConfigurator.setRootLevel(Level.ALL);
        logConfigurator.setLevel("org.apache", Level.ALL);
        logConfigurator.setUseFileAppender(true);
        logConfigurator.setFilePattern("%d %-5p [%c{2}]-[%L] %m%n");
        logConfigurator.setMaxFileSize(1024 * 1024 * 5);
        logConfigurator.setImmediateFlush(true);
        logConfigurator.configure();
		 }
		 catch(Exception e){ 
		  
		 }
        return log;
    }
}
