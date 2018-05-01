<?php 
class app_search {
  function query_searchInformation_NewsFeed($searchKeyword,$limit_start,$limit_end){
    $sql="SELECT * FROM dash_info_union WHERE artTitle LIKE '%".$searchKeyword."%' OR ";
	$sql.=" artShrtDesc LIKE  '%".$searchKeyword."%' OR artDesc LIKE '%".$searchKeyword."%';";
	return $sql;
  }
  function query_searchInformation_community($searchKeyword,$limit_start,$limit_end){
    $sql="SELECT * FROM union_account WHERE unionName LIKE '%".$searchKeyword."%' OR minlocation LIKE '%".$searchKeyword."%' ";
	$sql.=" OR location  LIKE '%".$searchKeyword."%' OR state  LIKE '%".$searchKeyword."%' OR ";
	$sql.="country LIKE '%".$searchKeyword."%'";
	return $sql;
  }
  function query_searchInformation_users($searchKeyword,$limit_start,$limit_end){
    $sql="SELECT * FROM user_account WHERE username LIKE '%".$searchKeyword."%' OR surName LIKE '%".$searchKeyword."%' OR ";
	$sql.="LIKE '%".$searchKeyword."%' name";
	return $sql;
  }
}
?>

	   