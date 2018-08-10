package com.test;

import java.util.ArrayList;
import java.util.Arrays;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class JSON {
	public String buildJSONArray() throws JSONException{
		JSONArray jsonArray01=new JSONArray();
		  for(int index=0;index<10;index++){
			   String frnd_Id = "frnd_Id"+index;
			   String youCall = "youCall"+index;
			   String contactId = "contactId"+index;
			   // contactId = null;
			   String phoneNumber = "phoneNumber"+index;
			  // phoneNumber =null;
			   String isContacts = "isContacts"+index;
			  // isContacts = null;
			   String isFriend = "isFriend"+index;
			  // isFriend = null;
			   String userId = "userId"+index;
			  // userId = null;
			   String username = "username"+index;
			  // username = null;
			   String surName = "surName"+index;
			  // surName = null;
			   String name = "name"+index;
			 //  name = null;
			   String relationship = "relationship"+index;
			 //  relationship = null;
			   String country = "country"+index;
			  // country = null;
			   String state = "state"+index;
			 //  state = null;
			   String location = "location"+index;
			  // location = null;
			   String minlocation = "minlocation"+index;
			//   minlocation = null;
			   String createdOn = "createdOn"+index;
			 //  createdOn = null;
			   String profile_pic = "profile_pic"+index;
			 //  profile_pic = null;
			   
			  JSONObject jsonObject01 = new JSONObject();
			  			 jsonObject01.put("frnd_Id", frnd_Id);
			  			 jsonObject01.put("youCall", youCall);
			  if(contactId!=null || phoneNumber!=null || isContacts!=null || isFriend!=null || userId!=null || username!=null ||
					  surName!=null || name!=null || relationship!=null || country!=null || state!=null || location!=null || 
					  minlocation!=null || createdOn!=null || profile_pic!=null){
				  JSONArray jsonArray02=new JSONArray();
				  JSONObject jsonObject02 = new JSONObject();
				  if(contactId!=null){ jsonObject02.put("contactId", contactId); }
				  if(phoneNumber!=null){ jsonObject02.put("phoneNumber", phoneNumber); }
				  if(isContacts!=null){ jsonObject02.put("isContacts", isContacts); }
				  if(isFriend!=null){ jsonObject02.put("isFriend", isFriend); }
				  if(userId!=null){ jsonObject02.put("userId", userId); }
				  if(username!=null){ jsonObject02.put("username", username); }
				  if(surName!=null){ jsonObject02.put("surName", surName); }
				  if(name!=null){ jsonObject02.put("name", name); }
				  if(relationship!=null){ jsonObject02.put("relationship", relationship); }
				  if(country!=null){ jsonObject02.put("country", country); }
				  if(state!=null){ jsonObject02.put("state", state); }
				  if(location!=null){ jsonObject02.put("location", location); }
			      if(minlocation!=null){ jsonObject02.put("minlocation", minlocation); }
			      if(createdOn!=null){ jsonObject02.put("createdOn", createdOn); }
			      if(profile_pic!=null){ jsonObject02.put("profile_pic", profile_pic); }
			      jsonArray02.put(jsonObject02);
			      jsonObject01.put("data", jsonArray02);
			  }
			  jsonArray01.put(jsonObject01);
		  }
	 return jsonArray01.toString();
	}
	
	public void searchStringInJSON(String jsonData, String search)throws JSONException{
		JSONArray resultantJsonArray = new JSONArray();
		JSONArray jsonArray = new JSONArray(jsonData);
		for(int i01=0;i01<jsonArray.length();i01++){
			JSONObject jsonObject = (JSONObject) jsonArray.get(i01);
			if(jsonObject!=null){
			  boolean recognizer = false;
				if(jsonObject.get("youCall")!=null){ if(jsonObject.get("youCall").toString().contains(search)){  recognizer = true; } }
				
				JSONArray subJsonArray = (JSONArray) jsonObject.get("data");
				if(subJsonArray !=null){
					for(int i02=0;i02<subJsonArray.length();i02++){
						JSONObject subJsonObject = subJsonArray.getJSONObject(i02);
						if(subJsonObject.get("surName")!=null){  if(subJsonObject.get("surName").toString().contains(search)){  recognizer = true; }  }
						if(subJsonObject.get("name")!=null){  if(subJsonObject.get("name").toString().contains(search)){  recognizer = true; }  }
						
						if(subJsonObject.get("phoneNumber")!=null){  if(subJsonObject.get("phoneNumber").toString().contains(search)){  recognizer = true; }  }
						
						if(subJsonObject.get("country")!=null){  if(subJsonObject.get("country").toString().contains(search)){  recognizer = true; }  }
						if(subJsonObject.get("state")!=null){  if(subJsonObject.get("state").toString().contains(search)){  recognizer = true; }  }
						if(subJsonObject.get("location")!=null){  if(subJsonObject.get("location").toString().contains(search)){  recognizer = true; }  }
						if(subJsonObject.get("minlocation")!=null){  if(subJsonObject.get("minlocation").toString().contains(search)){  recognizer = true; }  }
						
					}
				}
				
				
				if(recognizer){
					resultantJsonArray.put(jsonObject);
				}
			}
			 
		}
		System.out.println(resultantJsonArray.toString());
	}
	public static void main(String args[]) throws JSONException{
		JSON json = new JSON();
		String jsonData = json.buildJSONArray();
		String search = "0";
		System.out.println(jsonData);
		json.searchStringInJSON(jsonData, search);
		
		
	}
	
}
