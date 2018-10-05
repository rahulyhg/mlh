/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.mlh.utils;


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
  private static String DB_URL;
  private static String USER;
  private static String PASS;
  public Database(String db_url, String username, String password){
     this.DB_URL = db_url;
     this.USER = username;
     this.USER = password;
  }
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
  
}
