/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.domain;

/**
 *
 * @author N.L.N.Rao
 */
public class DomainQueries {
  public String query_getDomainList(){
   StringBuilder query = new StringBuilder();
     query.append("SELECT subs_dom_info.domain_Id, subs_dom_info.domainName ");
     query.append("FROM subs_dom_info;");
   return query.toString();
  }
}
