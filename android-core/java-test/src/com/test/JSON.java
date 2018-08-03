package com.test;

public class JSON {

	public static void main(String args[]){
		
		String phoneNumberToRecoginze="9160869337";
		String phoneNumber="919160869337";
		
		System.out.println(phoneNumberToRecoginze.equalsIgnoreCase(phoneNumber));
		System.out.println(!phoneNumber.contains(phoneNumberToRecoginze));
		System.out.println(!phoneNumberToRecoginze.contains(phoneNumberToRecoginze));
		
		if(phoneNumberToRecoginze.equalsIgnoreCase(phoneNumber) ||
    			phoneNumber.contains(phoneNumberToRecoginze) || 
    			phoneNumberToRecoginze.contains(phoneNumberToRecoginze)){
			System.out.println("Play");
		}
		
	}
}
