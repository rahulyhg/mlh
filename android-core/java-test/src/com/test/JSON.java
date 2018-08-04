package com.test;

import java.util.ArrayList;
import java.util.Arrays;

public class JSON {

	public static void main(String args[]){
		String phoneNumber="+91,9160869337";
		for(String data : phoneNumber.split(",")){
			System.out.println(data);
		}
		
		/* ArrayList<String> phoneNumberArry=new ArrayList<String>();
		for(String data : ){
		   phoneNumberArry.add(data);
		   System.out.println(data);
		}
		String mCountryCode=phoneNumberArry.get(0);
		String mobile=phoneNumberArry.get(1);
		*/
		// System.out.println(phoneNumber);
		// System.out.println(mCountryCode);
		// System.out.println(mobile);
	}
}
