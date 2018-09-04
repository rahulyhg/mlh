/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.user.authentication;

import anups.dun.modules.domain.DomainQueries;
import anups.dun.uils.Database;

/**
 *
 * @author N.L.N.Rao
 */
public class UserInformationService {
  public String service_getUserIdList(){
   return new Database().readDataFromQuery(new UserInformationQueries().query_getUserIdList()).toString();    
  }
}
