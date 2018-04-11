<style>
#mlh-loader { position:fixed;width:100px;height:100px;display:none;z-index:2000; }
@media screen and (min-width: 1280px) { 
 #mlh-loader { margin-left:42%;margin-top:12%; }
}
@media (min-width: 1025px) and (max-width: 1280px) { 
 #mlh-loader { margin-left:42%;margin-top:12%; }
}
@media (min-width: 768px) and (max-width: 1024px) { 
 #mlh-loader { margin-left:42%;margin-top:20%; }
}
@media (min-width: 481px) and (max-width: 767px) { 
 #mlh-loader { margin-left:40%;margin-top:25%; }
}
@media (min-width: 325px) and (max-width: 480px) {
 #mlh-loader { margin-left:35%;margin-top:40%; }
}
@media (min-width: 290px) and (max-width: 324px) {
 #mlh-loader { margin-left:24%;margin-top:30%; }
}
</style>
<script type="text/javascript">
function show_toggleMLHLoader(element){
  document.getElementById("mlh-loader").style.display='block';
  $(element).css("opacity","0.6");
}
function hide_toggleMLHLoader(element){
  document.getElementById("mlh-loader").style.display='none';
  $(element).css("opacity","1");
}
</script>
<!-- Loading Symbol -->
<div>
  <img id="mlh-loader" src="images/load.gif"/>
</div>