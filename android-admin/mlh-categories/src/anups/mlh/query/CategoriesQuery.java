/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.mlh.query;

/**
 *
 * @author N.L.N.Rao
 */
public class CategoriesQuery {
   public String getCategoriesList(){
     StringBuilder query=new StringBuilder();
                   query.append("SELECT subs_dom_info.domain_Id, subs_dom_info.domainName ");
                   query.append("FROM subs_dom_info ORDER BY subs_dom_info.domain_Id ASC; ");
     return query.toString();
   }
   
   public String getSubcategoriesList(String domain_Id){
       StringBuilder query=new StringBuilder();
                query.append("SELECT subs_subdom_info.subdomain_Id, subs_subdom_info.domain_Id, ");
                query.append("subs_subdom_info.subdomainName FROM subs_subdom_info ");
                query.append("WHERE subs_subdom_info.domain_Id='").append(domain_Id).append("'");
                query.append(" ORDER BY subs_subdom_info.subdomain_Id ASC;");
    return query.toString();
   }
}
