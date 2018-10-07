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
 public JSONObject buildJSONDataForDomain(Database database){
  CategoriesQuery categoriesQuery = new CategoriesQuery();
  String query1=categoriesQuery.getCategoriesList();
  JSONArray domainDataArray=database.readDataFromQuery(query1); 
  JSONObject finalBuildJSON=new JSONObject();
  
  for(int index01=0;index01<domainDataArray.size();index01++){
    JSONObject domainDataJSON = (JSONObject)domainDataArray.get(index01);
    
    JSONObject dataBuilderJSON01=new JSONObject();
      String private_domain_Id = "";
       for(Iterator iterator01 = domainDataJSON.keySet().iterator(); iterator01.hasNext();) {
            String key01 =  (String) iterator01.next();
            String value01 = (String) domainDataJSON.get(key01);
            JSONObject subDomainJSONObject = new JSONObject();
            dataBuilderJSON01.put(key01, value01);
            
           if(key01.equalsIgnoreCase("domain_Id")){
               private_domain_Id = value01;
               String query2 = categoriesQuery.getSubcategoriesList(value01);
               JSONArray subdomainDataArray=database.readDataFromQuery(query2);
               for(int index02=0;index02<subdomainDataArray.size();index02++){
                   JSONObject subdomainDataJSON = (JSONObject)subdomainDataArray.get(index02);
                   String private_subdomain_Id = "";
                   JSONObject dataBuilderJSON02=new JSONObject();
                   for(Iterator iterator02 = subdomainDataJSON.keySet().iterator(); iterator02.hasNext();) {
                      String key02 =  (String) iterator02.next();
                      String value02 = (String) subdomainDataJSON.get(key02); 
                      dataBuilderJSON02.put(key02, value02);
                      if("subdomain_Id".equalsIgnoreCase(key02)){
                          private_subdomain_Id=value02;
                      }
                      if(!iterator02.hasNext()){
                          
                          subDomainJSONObject.put(private_subdomain_Id, dataBuilderJSON02);
                          dataBuilderJSON01.put("subdomainInfo", subDomainJSONObject);
                          
                      }
                   }
               }
               
              
               
           }
           
           if(!iterator01.hasNext()){
             finalBuildJSON.put(private_domain_Id, dataBuilderJSON01);
           }
           
       }
    }
    System.out.println(finalBuildJSON.toJSONString());
    return finalBuildJSON;
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
