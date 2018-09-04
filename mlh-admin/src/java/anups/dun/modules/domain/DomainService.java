/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.domain;
import anups.dun.uils.Database;
/**
 *
 * @author N.L.N.Rao
 */
public class DomainService {
 public String service_getDomainList(){
   return new Database().readDataFromQuery(new DomainQueries().query_getDomainList()).toString();    
 }
}
