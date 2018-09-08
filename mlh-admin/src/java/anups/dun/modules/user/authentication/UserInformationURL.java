/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.user.authentication;

import org.apache.log4j.Logger;

/**
 *
 * @author N.L.N.Rao
 */
public class UserInformationURL {
  public static final Logger logger = Logger.getLogger(UserInformationURL.class); 
  private static final String URL="http://192.168.1.4/mlh/android-web/backend/php/dac/controller.module.app.user.authentication.php";
  
  public String url_count_getUserIdList(){
    StringBuilder sb = new StringBuilder(URL);
    sb.append("?action=GET_COUNT_USERIDLIST");
    return sb.toString();
  }
  
  public String url_data_getUserIdList(String limit_start, String limit_end){
    StringBuilder sb = new StringBuilder(URL);
    sb.append("?action=GET_DATA_USERIDLIST&limit_start=").append(limit_start);
    sb.append("&limit_end=").append(limit_end);
    return sb.toString();
  }
  
  public String url_data_getUserAccountInformation(String user_Id){
    StringBuilder sb = new StringBuilder(URL);
    sb.append("?action=GET_DATA_USERINFORMATION&user_Id=").append(user_Id);
    return sb.toString(); 
  }
  
  
}
