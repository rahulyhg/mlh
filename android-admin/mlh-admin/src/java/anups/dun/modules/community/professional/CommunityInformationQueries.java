/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.community.professional;

import anups.dun.actions.UserAuthenticationModule;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Random;
import org.apache.log4j.Logger;

/**
 *
 * @author N.L.N.Rao
 */
public class CommunityInformationQueries {
public static final Logger logger = Logger.getLogger(CommunityInformationQueries.class);
   
 public String query_getCommunityIdList(){
  StringBuilder query = new StringBuilder();
  query.append("SELECT union_Id FROM unionprof_account;");
  return query.toString();
 }
 
 public String query_requestLocalBranch(String union_Id, String minlocation, 
       String location, String state, String country, String reqBy){
   String req_branch_Id="TEST"+new Random().nextInt(50);
   String timeStamp = new SimpleDateFormat("yyyy.MM.dd.HH.mm.ss").format(new Date());
   StringBuilder query = new StringBuilder();
   query.append("INSERT INTO unionprof_branch_req(req_branch_Id, union_Id, minlocation,");
   query.append("location, state, country, reqOn, reqBy) ");
   query.append("VALUES ('").append(req_branch_Id).append("','").append(union_Id);
   query.append("','").append(minlocation).append("','").append(location);
   query.append("','").append(state).append("','").append(country).append("','");
   query.append(timeStamp).append("','").append(reqBy).append("');");
  return query.toString();
 }
}
