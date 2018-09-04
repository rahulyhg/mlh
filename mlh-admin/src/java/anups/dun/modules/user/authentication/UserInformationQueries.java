/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.user.authentication;

/**
 *
 * @author N.L.N.Rao
 */
public class UserInformationQueries {
  public String query_getUserIdList(){
   StringBuilder query = new StringBuilder();
   query.append("SELECT user_Id FROM user_account ");
   return query.toString();
  }
  
}
