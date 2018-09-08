/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.community.professional;

import anups.dun.actions.UserAuthenticationModule;
import anups.dun.utils.Database;
import org.apache.log4j.Logger;

/**
 *
 * @author N.L.N.Rao
 */
public class CommunityInformationService {
 public static final Logger logger = Logger.getLogger(CommunityInformationService.class);
 
 public String service_getCommunityIdList(){
  String query=new CommunityInformationQueries().query_getCommunityIdList();
  return new Database().readDataFromQuery(query).toString();
 }
 public void service_requestLocalBranch(String union_Id, String minlocation, 
        String location, String state, String country, String reqBy){
  String query=new CommunityInformationQueries().query_requestLocalBranch(union_Id, minlocation, 
                                    location, state, country, reqBy);
  Database database = new Database();
  database.insertUpdateDeleteDataFromQuery(query);
 }
}
