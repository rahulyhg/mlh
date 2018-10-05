/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.subscriptions;

import anups.dun.modules.user.authentication.UserInformationURL;
import org.apache.log4j.Logger;

/**
 *
 * @author N.L.N.Rao
 */
public class CRUDURL {
 public static final Logger logger = Logger.getLogger(CRUDURL.class); 
 private static final String URL="http://192.168.1.4/mlh/android-web/backend/php/dac/controller.module.app.user.subscriptions.php";
  
 public String url_add_newCategory(String category_Id, String categoryName){
   StringBuilder sb = new StringBuilder(URL);
                 sb.append("?action=ADD_NEW_CATEGORY&category_Id=").append(category_Id);
                 sb.append("&categoryName=").append(categoryName);
   return sb.toString();
 }
 

 
}
