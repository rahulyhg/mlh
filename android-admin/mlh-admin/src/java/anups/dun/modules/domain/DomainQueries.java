/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.domain;

import anups.dun.modules.community.professional.CommunityInformationQueries;
import org.apache.log4j.Logger;

/**
 *
 * @author N.L.N.Rao
 */
public class DomainQueries {
public static final Logger logger = Logger.getLogger(DomainQueries.class);
  public String query_getDomainList(){
   StringBuilder query = new StringBuilder();
     query.append("SELECT subs_dom_info.domain_Id, subs_dom_info.domainName ");
     query.append("FROM subs_dom_info;");
   return query.toString();
  }
}
