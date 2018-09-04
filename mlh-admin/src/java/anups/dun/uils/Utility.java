/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.uils;

import java.io.File;
import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.net.URLDecoder;

/**
 *
 * @author N.L.N.Rao
 */
public class Utility {
  public String getProjectPath() throws UnsupportedEncodingException {
    String path = this.getClass().getClassLoader().getResource("").getPath();
    String fullPath = URLDecoder.decode(path, "UTF-8");
    String pathArr[] = fullPath.split("build/web/WEB-INF/classes/");
    fullPath = pathArr[0].replaceFirst("/", "");
   return fullPath;
  }
  
  public void runBatchFile(String command) throws UnsupportedEncodingException, IOException, InterruptedException{
    String file="cmd.exe /c start "+new Utility().getProjectPath()+command;
    System.out.println(file);
    Process proc = Runtime.getRuntime().exec(file); 
    proc.waitFor();
  }
  
  public static void main(String args[]) throws UnsupportedEncodingException, IOException, InterruptedException{
      new Utility().runBatchFile("/data/test.bat");
  }
}
