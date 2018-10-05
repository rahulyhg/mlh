/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.utils;

import anups.dun.modules.user.friends.UserFriendsURL;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import org.apache.log4j.Logger;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;

/**
 *
 * @author N.L.N.Rao
 */
public class Database {
 public static final Logger logger = Logger.getLogger(Database.class);  
    // JDBC driver name and database URL
  private static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";  
  private static final String DB_URL = "jdbc:mysql://192.168.1.4:3306/mlh_basic";
  private static final String USER = "root";
  private static final String PASS = "";
  
  public JSONArray readDataFromQuery(String query){
   Connection conn = null;
   Statement  stmt = null;
   JSONArray jsonArray = new JSONArray();
    try{
      Class.forName("com.mysql.jdbc.Driver");
      conn = DriverManager.getConnection(DB_URL,USER,PASS);
      stmt = conn.createStatement();
      ResultSet rs = stmt.executeQuery(query);
      ResultSetMetaData rsmd = rs.getMetaData();
      while(rs.next()){
          int columns=rsmd.getColumnCount();
          JSONObject jsonObject = new JSONObject();
          for(int index=1;index<=columns;index++){
             String columnName=rsmd.getColumnName(index);
             String columnValue=rs.getString(columnName);
             jsonObject.put(columnName, columnValue);
          }
          jsonArray.add(jsonObject);
      }
    } catch(Exception e){ e.printStackTrace(); }
    finally { 
      try { 
          if(stmt!=null){ stmt.close(); }
          if(conn!=null){ conn.close(); }
      } catch(Exception e){  e.printStackTrace(); } 
    }
   return jsonArray;
  }
 
  public void insertUpdateDeleteDataFromQuery(String query){
    Connection conn = null;
    Statement stmt = null;
    try{
      Class.forName("com.mysql.jdbc.Driver");
      conn = DriverManager.getConnection(DB_URL,USER,PASS);
      stmt = conn.createStatement();
      stmt.executeUpdate(query);
      } catch(Exception e){ e.printStackTrace(); }
    finally { 
      try { 
          if(stmt!=null){ stmt.close(); }
          if(conn!=null){ conn.close(); }
      } catch(Exception e){  e.printStackTrace(); } 
    }
  }
  
  private JSONArray buildJSONDataForDomain(){
    String query1="SELECT subs_dom_info.domain_Id, subs_dom_info.domainName FROM subs_dom_info;";
    JSONArray domainDataArray=new Database().readDataFromQuery(query1); 
    JSONArray finalBuildArray=new JSONArray();
    for(int index=0;index<domainDataArray.size();index++){
        JSONObject domainDataJSON = (JSONObject)domainDataArray.get(index);
        JSONObject finalBuildJSON=new JSONObject();
       for(Iterator iterator = domainDataJSON.keySet().iterator(); iterator.hasNext();) {
            String key =  (String) iterator.next();
            String value = (String) domainDataJSON.get(key);
            finalBuildJSON.put(key, value);
           if(key.equalsIgnoreCase("domain_Id")){
                StringBuilder query2=new StringBuilder();
                query2.append("SELECT subs_subdom_info.subdomain_Id, subs_subdom_info.domain_Id, ");
                query2.append("subs_subdom_info.subdomainName FROM subs_subdom_info ");
                query2.append("WHERE subs_subdom_info.domain_Id='").append(value).append("';");
                JSONArray subdomainDataArray=new Database().readDataFromQuery(query2.toString()); 
                finalBuildJSON.put("subdomainInfo", subdomainDataArray);
           }
           finalBuildArray.add(finalBuildJSON);
       }
    }
    return finalBuildArray;
  }
 
  public static void main(String args[]){
    JSONArray domainData=new Database().buildJSONDataForDomain();
    System.out.println(domainData);
  }
  
}
