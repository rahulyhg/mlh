<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){
var data = [{ "name": "Anup", "city":"Hyderabad"},
			{ "name": "Kittu","city":"Mumbai"},
			{ "name": "Phani","city":"Delhi",
			"accounts":[{"location": "Phani","city":"Kolkatta"},
					  { "location": "Kittu","city":"Bangalore"},
					  { "location": "Anup","city":"Chennai"}]}];
searchDataFromJSON(data, 'search',["name","city"]);
});

/* Search Data Results From JSON */
/* Start: */
var SEARCHDATA_RESULT_FROMJSON;
function searchDataFromJSON(data, searchFieldDivId, params){
$('#'+searchFieldDivId).keyup(function(){
var searchField=$('#'+searchFieldDivId).val().trim();
var regex = new RegExp(searchField, "gi");
var i=0;var content='';SEARCHDATA_RESULT_FROMJSON=[];
$.each( data, function( key, val ) {
 var existence=false;var arry=[];
 for(var index=0;index<params.length;index++){
   if(val[params[index]]!=null && val[params[index]].search(regex) != -1){
       SEARCHDATA_RESULT_FROMJSON[SEARCHDATA_RESULT_FROMJSON.length]=data[i];break;
    }
 }
 i++;
});
});
}
/* End: */
function searchBtn(){
  document.getElementById("result").innerHTML=JSON.stringify(SEARCHDATA_RESULT_FROMJSON);
}
</script>
<input id="search" type="text"/><button onclick="javascript:searchBtn();">Search</button><br/>
<span id="result"></span>