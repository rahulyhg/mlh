<?php
class search {
  function query_count_search_newsfeed_union($searchKey){
    $sql="SELECT count(*) FROM dash_info_union, union_account WHERE ";
	$sql.="dash_info_union.union_Id=union_account.union_Id AND ";
	$sql.="(artTitle LIKE '%".$searchKey."%' ";
	$sql.="OR artShrtDesc LIKE '%".$searchKey."%' OR artDesc LIKE '%".$searchKey."%')";
    return $sql;
  }
  
  function query_count_search_newsfeed_biz($arry_domainIds,$searchKey){
    $sql="SELECT count(*) FROM dash_info_biz, biz_account WHERE ";
	$sql.="dash_info_biz.biz_Id=biz_account.biz_Id AND ";
	$sql.="(artTitle LIKE '%".$searchKey."%' ";
	$sql.="OR artShrtDesc LIKE '%".$searchKey."%' OR artDesc LIKE '%".$searchKey."%' OR";
    for($index=0;$index<count($arry_domainIds);$index++){
	   $sql.=" domain_Id='".$arry_domainIds[$index]."' OR subdomain_Id='".$arry_domainIds[$index]."' OR";
	}
	$sql=chop($sql,"OR");
	$sql.=")";
	return $sql;
  }
  function query_search_newsfeed_union($searchKey,$limit_start,$limit_end){
    $sql="SELECT * FROM dash_info_union, union_account WHERE ";
	$sql.="dash_info_union.union_Id=union_account.union_Id AND";
	$sql.=" (artTitle LIKE '%".$searchKey."%' ";
	$sql.="OR artShrtDesc LIKE '%".$searchKey."%' OR artDesc LIKE '%".$searchKey."%') LIMIT ".$limit_start.",".$limit_end;
    return $sql;
  }
  function query_search_newsfeed_biz($arry_domainIds,$searchKey,$limit_start,$limit_end){
    $sql="SELECT * FROM dash_info_biz, biz_account WHERE ";
	$sql.="dash_info_biz.biz_Id=biz_account.biz_Id AND ";
	$sql.="(artTitle LIKE '%".$searchKey."%' ";
	$sql.="OR artShrtDesc LIKE '%".$searchKey."%' OR artDesc LIKE '%".$searchKey."%' OR";
    for($index=0;$index<count($arry_domainIds);$index++){
	   $sql.=" domain_Id='".$arry_domainIds[$index]."' OR subdomain_Id='".$arry_domainIds[$index]."' OR";
	}
	$sql=chop($sql,"OR");
	$sql.=") LIMIT ".$limit_start.",".$limit_end;
	return $sql;
  }
}
?>