package anups.dun.util;

import java.io.File;

import android.os.Environment;
import de.mindpipe.android.logging.log4j.LogConfigurator;
import org.apache.log4j.Level;
import org.apache.log4j.Logger;

public class AndroidLogger {
	public static org.apache.log4j.Logger getLogger(Class clazz) {
		String internalMemory=System.getenv("EXTERNAL_STORAGE");
		String externalMemory=System.getenv("EXTERNAL_STORAGE2");
		   String filePath=externalMemory+"/"+"mylocalhook";
		   if(externalMemory==null){
			   filePath=internalMemory+"/"+"mylocalhook";
		   }
		   File externalDir = new File(filePath);
	       if(!externalDir.exists()) { externalDir.mkdir();  }
	       
        final LogConfigurator logConfigurator = new LogConfigurator();
        logConfigurator.setFileName(filePath + "/log/file.txt");
        logConfigurator.setRootLevel(Level.ALL);
        logConfigurator.setLevel("org.apache", Level.ALL);
        logConfigurator.setUseFileAppender(true);
        logConfigurator.setFilePattern("%d %-5p [%c{2}]-[%L] %m%n");
        logConfigurator.setMaxFileSize(1024 * 1024 * 5);
        logConfigurator.setImmediateFlush(true);
        logConfigurator.configure();
        Logger log = Logger.getLogger(clazz);
        	//   log.setLevel(Level.ERROR);
        return log;
    }
}
