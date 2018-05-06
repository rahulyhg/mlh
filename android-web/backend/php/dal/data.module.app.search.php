<?php
class app_Search {
/* People */
function query_count_getSearchedUserList($searchQuery){
 $sql="SELECT count(*) FROM user_account WHERE username LIKE '%".$searchQuery."%' OR surName LIKE '%".$searchQuery."%' OR 	";
 $sql.="name LIKE '%".$searchQuery."%' OR  minlocation LIKE '%".$searchQuery."%' OR location LIKE '%".$searchQuery."%' ";
 $sql.="OR state LIKE '%".$searchQuery."%' OR country LIKE '%".$searchQuery."%';";
 return $sql;
}

function query_getSearchedUserList($searchQuery,$limit_start,$limit_end){
 $sql="SELECT * FROM user_account WHERE username LIKE '%".$searchQuery."%' OR surName LIKE '%".$searchQuery."%' OR 	";
 $sql.="name LIKE '%".$searchQuery."%' OR  minlocation LIKE '%".$searchQuery."%' OR location LIKE '%".$searchQuery."%' ";
 $sql.="OR state LIKE '%".$searchQuery."%' OR country LIKE '%".$searchQuery."%' LIMIT ".$limit_start.",".$limit_end.";";
 return $sql;
}

/* Community */
function query_count_getSearchedCommunityList($searchQuery){
 $sql="SELECT count(*) FROM union_account WHERE unionName LIKE '%".$searchQuery."%' OR ";
 $sql.="minlocation LIKE '%".$searchQuery."%' ";
 $sql.=" OR location  LIKE '%".$searchQuery."%' OR state  LIKE '%".$searchQuery."%' OR ";
 $sql.="country LIKE '%".$searchQuery."%';";
 return $sql;
}

function query_getSearchedCommunityList($searchQuery,$limit_start,$limit_end){
 $sql="SELECT * FROM union_account WHERE unionName LIKE '%".$searchQuery."%' ";
 $sql.="OR minlocation LIKE '%".$searchQuery."%' ";
 $sql.=" OR location  LIKE '%".$searchQuery."%' OR state  LIKE '%".$searchQuery."%' OR ";
 $sql.="country LIKE '%".$searchQuery."%' LIMIT ".$limit_start.",".$limit_end.";";
 return $sql;
}

/* NewsFeed */
function query_count_getSearchedNewsFeedList($searchQuery){
 $sql="SELECT count(*) FROM dash_info_union WHERE artTitle LIKE '%".$searchQuery."%' OR ";
 $sql.=" artShrtDesc LIKE  '%".$searchQuery."%' OR artDesc LIKE '%".$searchQuery."%';";
 return $sql;
}

function query_getSearchedNewsFeedList($searchQuery,$limit_start,$limit_end){
 $sql="SELECT * FROM dash_info_union WHERE artTitle LIKE '%".$searchQuery."%' OR ";
 $sql.=" artShrtDesc LIKE  '%".$searchQuery."%' OR artDesc LIKE '%".$searchQuery."%' ";
 $sql.="LIMIT ".$limit_start.",".$limit_end.";";
 return $sql;
}

/* Movement */
function query_count_getSearchedMovementList($searchQuery){
 $sql="SELECT count(*) FROM  move_info WHERE petitionTitle LIKE '%".$searchQuery."%' OR toA_pName1 LIKE '%".$searchQuery."%' OR ";
 $sql.="toA_dd1 LIKE '%".$searchQuery."%' OR toA_pName2 LIKE '%".$searchQuery."%' OR toA_dd2 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_pName3 LIKE '%".$searchQuery."%' OR toA_dd3 LIKE '%".$searchQuery."%' OR issue_desc LIKE '%".$searchQuery."%' ";
 $sql.="OR issue_facedby LIKE '%".$searchQuery."%' OR expectedSolution LIKE '%".$searchQuery."%';";       	   
 return $sql;
}

function query_getSearchedMovementList($searchQuery,$limit_start,$limit_end){
 $sql="SELECT * FROM  move_info WHERE petitionTitle LIKE '%".$searchQuery."%' OR toA_pName1 LIKE '%".$searchQuery."%' OR ";
 $sql.="toA_dd1 LIKE '%".$searchQuery."%' OR toA_pName2 LIKE '%".$searchQuery."%' OR toA_dd2 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_pName3 LIKE '%".$searchQuery."%' OR toA_dd3 LIKE '%".$searchQuery."%' OR issue_desc LIKE '%".$searchQuery."%' ";
 $sql.="OR issue_facedby LIKE '%".$searchQuery."%' OR expectedSolution LIKE '%".$searchQuery."%' ";
 $sql.="LIMIT ".$limit_start.",".$limit_end.";";       	   
 return $sql;
}

}
?>