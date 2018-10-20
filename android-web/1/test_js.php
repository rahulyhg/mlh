<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<style>
.hlLetterString { background-color:yellow;color:#000;}
</style>
<script type="text/javascript">
function highlightLetterInAString(innerHTML,text) {
 var content='';
 if(text.length>0){
  var index = innerHTML.toLowerCase().indexOf(text.toLowerCase());
  if (index >= 0) { 
   content = innerHTML.substring(0,index) + "<span class='hlLetterString'>" + innerHTML.substring(index,index+text.length) + "</span>" + innerHTML.substring(index + text.length);
  }
 } else {
    content= innerHTML;
 }
 return content;
}
document.write(highlightLetterInAString('This is a FoX','fo'));
</script>
<span id="result"></span>