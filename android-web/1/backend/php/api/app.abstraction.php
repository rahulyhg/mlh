<?php 
class Abstraction {
function encrypt_decrypt($action, $string) {
  $output = false;
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'your secret key'; //900150983cd24fb0d6963f7d28e17f72(example key)
  $secret_iv = 'your secret iv'; //098f6bcd4621d373cade4e832627b4f6(example iv)
  // hash
  $key = hash('sha256', $secret_key);
  // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
  $iv = substr(hash('sha256', $secret_iv), 0, 16);
  if ($action == 'encrypt') {
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
  } else if ($action == 'decrypt') {
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  }
  return $output;
}

}
/* Sample Code 
$abstraction = new Abstraction();
$plain_txt = "This is my plain text. This is my plain text. This is my plain text. Anup Chakravarthi.";
echo "Plain Text = ".$plain_txt."<br/>";
$encrypted_txt = $abstraction->encrypt_decrypt('encrypt', $plain_txt);
echo "Encrypted Text = ".$encrypted_txt."<br/>";
$decrypted_txt = $abstraction ->encrypt_decrypt('decrypt', $encrypted_txt);
echo "Decrypted Text = ".$decrypted_txt."<br/>";
if ($plain_txt === $decrypted_txt) echo "SUCCESS";
else echo "FAILED";
*/
?>