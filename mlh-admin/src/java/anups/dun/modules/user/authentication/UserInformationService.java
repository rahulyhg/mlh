/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.user.authentication;

import anups.dun.modules.domain.DomainQueries;
import anups.dun.uils.Database;
import anups.dun.uils.WSUtility;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;

/**
 *
 * @author N.L.N.Rao
 */
public class UserInformationService {
    
  public String service_count_getUserIdList(){
   WSUtility wsUtility = new WSUtility();
   UserInformationURL userInformationURL = new UserInformationURL();
   String url = userInformationURL.url_count_getUserIdList();
   String response = wsUtility.httpGETRequest(url);
   return response;
  }  
 
  public String service_data_getUserIdList(String limit_start, String limit_end){
   WSUtility wsUtility = new WSUtility();
   UserInformationURL userInformationURL = new UserInformationURL();
   String url = userInformationURL.url_data_getUserIdList(limit_start, limit_end);
   String response = wsUtility.httpGETRequest(url);
   return response;
  }
  
  public String service_getUserInformation(String user_Id){
   WSUtility wsUtility = new WSUtility();
   UserInformationURL userInformationURL = new UserInformationURL();
   String url = userInformationURL.url_data_getUserAccountInformation(user_Id);
   String response = wsUtility.httpGETRequest(url);
   return response;
  }
}
