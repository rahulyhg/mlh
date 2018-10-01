package anups.dun.util;

import android.annotation.SuppressLint;
import java.io.UnsupportedEncodingException;
import java.security.GeneralSecurityException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Arrays;
import android.util.Base64;
import java.util.Random;

import javax.crypto.Cipher;
import javax.crypto.SecretKey;
import javax.crypto.spec.IvParameterSpec;
import javax.crypto.spec.SecretKeySpec;

@SuppressLint("NewApi")
public class Masking {
 private static SecretKeySpec secretKey;
 private static byte[] key;

 private static final String TAG = "AESCrypt";

 //AESCrypt-ObjC uses CBC and PKCS7Padding
 private static final String AES_MODE = "AES/CBC/PKCS7Padding";
 private static final String CHARSET = "UTF-8";

 //AESCrypt-ObjC uses SHA-256 (and so a 256-bit key)
 private static final String HASH_ALGORITHM = "SHA-256";

 //AESCrypt-ObjC uses blank IV (not the best security, but the aim here is compatibility)
 private static final byte[] ivBytes = {0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00};

 //togglable log option (please turn off in live!)
 public static boolean DEBUG_LOG_ENABLED = false;


 /**
  * Generates SHA256 hash of the password which is used as key
  *
  * @param password used to generated key
  * @return SHA256 of the password
  */
 private static SecretKeySpec generateKey(String timestamp) throws NoSuchAlgorithmException, UnsupportedEncodingException {

	  timestamp = timestamp.replaceAll("-", "").replaceAll(":", "").replaceAll(" ", ""); 
	  String ts = String.valueOf((Long.parseLong(timestamp)%19911015)%19880822).substring(0, 4);

	 final MessageDigest digest = MessageDigest.getInstance(HASH_ALGORITHM);
     byte[] bytes = ts.getBytes("UTF-8");
     digest.update(bytes, 0, bytes.length);
     byte[] key = digest.digest();
     SecretKeySpec secretKeySpec = new SecretKeySpec(key, "AES");
     return secretKeySpec;
 }


 /**
  * Encrypt and encode message using 256-bit AES with key generated from password.
  *
  *
  * @param password used to generated key
  * @param message the thing you want to encrypt assumed String UTF-8
  * @return Base64 encoded CipherText
  * @throws GeneralSecurityException if problems occur during encryption
  */
 public static String encryptMsg(String password, String message)
         throws GeneralSecurityException {
     try {
         final SecretKeySpec key = generateKey(password);
         byte[] cipherText = encrypt(key, ivBytes, message.getBytes(CHARSET));
         String encoded = Base64.encodeToString(cipherText, Base64.NO_WRAP);
         return encoded;
     } catch (UnsupportedEncodingException e) {
         throw new GeneralSecurityException(e);
     }
 }


 /**
  * More flexible AES encrypt that doesn't encode
  * @param key AES key typically 128, 192 or 256 bit
  * @param iv Initiation Vector
  * @param message in bytes (assumed it's already been decoded)
  * @return Encrypted cipher text (not encoded)
  * @throws GeneralSecurityException if something goes wrong during encryption
  */
 public static byte[] encrypt(final SecretKeySpec key, final byte[] iv, final byte[] message)
         throws GeneralSecurityException {
     final Cipher cipher = Cipher.getInstance(AES_MODE);
     IvParameterSpec ivSpec = new IvParameterSpec(iv);
     cipher.init(Cipher.ENCRYPT_MODE, key, ivSpec);
     byte[] cipherText = cipher.doFinal(message);
     return cipherText;
 }


 /**
  * Decrypt and decode ciphertext using 256-bit AES with key generated from password
  *
  * @param password used to generated key
  * @param base64EncodedCipherText the encrpyted message encoded with base64
  * @return message in Plain text (String UTF-8)
  * @throws GeneralSecurityException if there's an issue decrypting
  */
 public static String decryptMsg(String password, String base64EncodedCipherText)
         throws GeneralSecurityException {

     try {
         final SecretKeySpec key = generateKey(password);
         byte[] decodedCipherText = Base64.decode(base64EncodedCipherText, Base64.NO_WRAP);

         byte[] decryptedBytes = decrypt(key, ivBytes, decodedCipherText);
         String message = new String(decryptedBytes, CHARSET);


         return message;
     } catch (UnsupportedEncodingException e) {throw new GeneralSecurityException(e);  }
 }


 /**
  * More flexible AES decrypt that doesn't encode
  *
  * @param key AES key typically 128, 192 or 256 bit
  * @param iv Initiation Vector
  * @param decodedCipherText in bytes (assumed it's already been decoded)
  * @return Decrypted message cipher text (not encoded)
  * @throws GeneralSecurityException if something goes wrong during encryption
  */
 public static byte[] decrypt(final SecretKeySpec key, final byte[] iv, final byte[] decodedCipherText)
         throws GeneralSecurityException {
         final Cipher cipher = Cipher.getInstance(AES_MODE);
         IvParameterSpec ivSpec = new IvParameterSpec(iv);
         cipher.init(Cipher.DECRYPT_MODE, key, ivSpec);
         byte[] decryptedBytes = cipher.doFinal(decodedCipherText);
    return decryptedBytes;
 }

 /**
  * Converts byte array to hexidecimal useful for logging and fault finding
  * @param bytes
  * @return
  */
 private static String bytesToHex(byte[] bytes) {
     final char[] hexArray = {'0', '1', '2', '3', '4', '5', '6', '7', '8',
             '9', 'A', 'B', 'C', 'D', 'E', 'F'};
     char[] hexChars = new char[bytes.length * 2];
     int v;
     for (int j = 0; j < bytes.length; j++) {
         v = bytes[j] & 0xFF;
         hexChars[j * 2] = hexArray[v >>> 4];
         hexChars[j * 2 + 1] = hexArray[v & 0x0F];
     }
     return new String(hexChars);
 }

 /*
 public static byte[] encryptMsg(String message, SecretKey secret){ 
  Cipher cipher = null; 
  byte[] cipherText = null;
  try {		   
	cipher = Cipher.getInstance("AES/ECB/PKCS5Padding");
		   cipher.init(Cipher.ENCRYPT_MODE, secret); 
	cipherText = cipher.doFinal(message.getBytes("UTF-8")); 
  } catch(Exception e){ }
  return cipherText; 
 }

 public static String decryptMsg(byte[] cipherText, SecretKey secret){
  Cipher cipher = null;
  String decryptString = null;
  try{
		 cipher = Cipher.getInstance("AES/ECB/PKCS5Padding");
		 cipher.init(Cipher.DECRYPT_MODE, secret); 
   decryptString = new String(cipher.doFinal(cipherText), "UTF-8");
  } catch(Exception e){ }
  return decryptString; 
 }*/
}
