/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.mlh.service;

import anups.mlh.query.CategoriesQuery;
import anups.mlh.utils.Database;
import anups.mlh.utils.FileUtility;
import java.io.FileWriter;
import java.util.Iterator;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;

/**
 *
 * @author N.L.N.Rao
 */
public class CategoriesService {
 public JSONArray buildJSONDataForDomain(Database database){
  CategoriesQuery categoriesQuery = new CategoriesQuery();
  String query1=categoriesQuery.getCategoriesList();
  JSONArray domainDataArray=database.readDataFromQuery(query1); 
  
  JSONArray finalBuildArray=new JSONArray();
  
  for(int index=0;index<domainDataArray.size();index++){
    JSONObject domainDataJSON = (JSONObject)domainDataArray.get(index);
    JSONObject finalBuildJSON=new JSONObject();
    JSONObject dataBuilderJSON=new JSONObject();
      String private_domain_Id = "";
       for(Iterator iterator = domainDataJSON.keySet().iterator(); iterator.hasNext();) {
            String key =  (String) iterator.next();
            String value = (String) domainDataJSON.get(key);
            
            dataBuilderJSON.put(key, value);
            
           if(key.equalsIgnoreCase("domain_Id")){
               private_domain_Id = value;
               String query2 = categoriesQuery.getSubcategoriesList(value);
               JSONArray subdomainDataArray=database.readDataFromQuery(query2); 
               dataBuilderJSON.put("subdomainInfo", subdomainDataArray);
              
               
           }
           
           if(!iterator.hasNext()){
             finalBuildJSON.put(private_domain_Id, dataBuilderJSON);
             finalBuildArray.add(finalBuildJSON);
           }
           
       }
    }
    return finalBuildArray;
  }

 public void dumpDataIntoFile(String folderPath, String fileName, String fileData){
  FileUtility fileUtility = new FileUtility();
  fileUtility.createAFolderIfNotExists(folderPath);
  fileUtility.createAFileIfExistsAgain(folderPath, fileName);
  try {    
     FileWriter fw=new FileWriter(folderPath+"//"+fileName);    
                fw.write(fileData);    
                fw.close();    
   } catch(Exception e){System.out.println(e);}  
 }
}
