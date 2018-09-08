/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.domain;
import anups.dun.utils.Database;
import org.apache.log4j.Logger;
/**
 *
 * @author N.L.N.Rao
 */
public class DomainService {
 public static final Logger logger = Logger.getLogger(DomainService.class);
 public String service_getDomainList(){
   return new Database().readDataFromQuery(new DomainQueries().query_getDomainList()).toString();    
 }
}
