/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.mlh.app;

import anups.mlh.service.CategoriesService;
import anups.mlh.utils.Database;
import java.util.ArrayList;
import java.util.Scanner;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

/**
 *
 * @author N.L.N.Rao
 */
public class ApplicationStartup {
 private static String DB_URL; // "jdbc:mysql://192.168.1.4:3306/mlh_basic"
 private static String USERNAME; // root
 private static String PASSWORD;
 private static String FOLDERPATH;
 private static String FILENAME;
 public static void main(String[] args) {
   try {
  DB_URL = args[0]; if("-".equalsIgnoreCase(DB_URL)){ DB_URL = ""; }
  USERNAME = args[1]; if("-".equalsIgnoreCase(USERNAME)){ USERNAME = ""; }
  PASSWORD = args[2]; if("-".equalsIgnoreCase(PASSWORD)){ PASSWORD = ""; }
  FOLDERPATH = args[3]; if("-".equalsIgnoreCase(FOLDERPATH)){ FOLDERPATH = ""; }
  FILENAME = args[4]; if("-".equalsIgnoreCase(FILENAME)){ FILENAME = ""; }
     
  /* Build Categories */
  Database database = new Database(DB_URL, USERNAME, PASSWORD);
  CategoriesService categoriesService = new CategoriesService();
  JSONObject jsonArray = categoriesService.buildJSONDataForDomain(database);
  
  /* Dump Data into File */
  categoriesService.dumpDataIntoFile(FOLDERPATH,FILENAME,jsonArray.toJSONString());
  System.out.println("Build Categories.json Successfully...");
  System.out.println("Press any key to close Shell");
  Scanner scanner = new Scanner(System.in);
  scanner.nextLine();
  scanner.close();
   } catch(Exception e ){ e.printStackTrace(); }
  
          
 }
    
}
