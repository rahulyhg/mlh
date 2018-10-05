/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.utils;

import java.io.File;
import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.net.URLDecoder;
import org.apache.log4j.Logger;

/**
 *
 * @author N.L.N.Rao
 */
public class GeneralUtility {
 public static final Logger logger = Logger.getLogger(GeneralUtility.class);  
  public String getProjectPath() throws UnsupportedEncodingException {
    String path = this.getClass().getClassLoader().getResource("").getPath();
    String fullPath = URLDecoder.decode(path, "UTF-8");
    String pathArr[] = fullPath.split("build/web/WEB-INF/classes/");
    fullPath = pathArr[0].replaceFirst("/", "");
   return fullPath;
  }
  
  public static void main(String args[]) throws UnsupportedEncodingException, IOException, InterruptedException{
     //  new GeneralUtility().runBatchFile("/data/test.bat");
  }
}
