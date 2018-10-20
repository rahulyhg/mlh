<meta charset="utf-8">
<?php 

/* UTF-8 is Mandatory */
class language {

  function textTransform($lng_from,$lng_to,$text) {
  /*  ENGLISH: 'en',  AMHARIC: 'am',  ARABIC: 'ar',  BENGALI: 'bn',  CHINESE: 'zh',  GREEK: 'el',  GUJARATI: 'gu',  HINDI: 'hi',
   *  KANNADA: 'kn',  MALAYALAM: 'ml',  MARATHI: 'mr',  NEPALI: 'ne',  ORIYA: 'or',  PERSIAN: 'fa',  PUNJABI: 'pa',  RUSSIAN: 'ru',
   *  SANSKRIT: 'sa',  SINHALESE: 'si', SERBIAN: 'sr',  TAMIL: 'ta',  TELUGU: 'te',  TIGRINYA: 'ti',  URDU: 'ur'
   */
	$url="https://translate.googleapis.com/translate_a/single?client=gtx&sl=".$lng_from."&tl=".$lng_to."&dt=t&q=".urlencode($text);
	$jsonData=file_get_contents($url);
	$dejsonData=json_decode($jsonData);
	return $dejsonData[0][0][0];
  }	
  
}
$langObj=new language();
echo $langObj->textTransform('en','te','Kuttanad');
?>

