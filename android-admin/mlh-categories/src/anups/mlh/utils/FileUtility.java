/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.mlh.utils;

import java.io.File;

/**
 *
 * @author N.L.N.Rao
 */
public class FileUtility {
  public void createAFolderIfNotExists(String folderPath){
    File directory = new File(folderPath);
    if(!directory.exists()){ directory.mkdir(); }
  }
  public void createAFileIfExistsAgain(String folderPath,String fileName){
  /* If File Exists, deletes previous File and Recreates */
    File file = new File(folderPath+"//"+fileName);
    if(file.exists()){ file.delete(); }
    try {
    file.createNewFile();
    } catch(Exception e){ e.printStackTrace(); }
  }
}
