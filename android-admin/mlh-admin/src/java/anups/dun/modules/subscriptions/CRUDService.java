/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.subscriptions;

import anups.dun.utils.WSUtility;

/**
 *
 * @author N.L.N.Rao
 */
public class CRUDService {
 public String createNewCategory(String category_Id, String categoryName){
    CRUDURL crudURL = new CRUDURL();
    String url = crudURL.url_add_newCategory(category_Id, categoryName);
     WSUtility wsUtility = new WSUtility();
    String response = wsUtility.httpGETRequest(url);
   return response;
 }
}
