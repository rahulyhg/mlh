<?php
/* Platform includes Domain, Subdomain, 
 *
 */
class tbl_platform {
  function query_getdom_infoData($domain_Id){
    $query="SELECT * FROM dom_info WHERE domain_Id='".$domain_Id."';";
	return $query;
  }
  function query_adddom_infoData($domain_Id,$t_users,$t_unions,$t_move,$o_move,$c_move,$t_signers){
    $query="INSERT INTO `dom_info`(`domain_Id`, `t_users`, `t_unions`, `t_move`, `o_move`, `c_move`, `t_signers`)";
	$query.="VALUES ('".$domain_Id."',".$t_users.",".$t_unions.",".$t_move.",".$o_move.",".$c_move.",".$t_signers.")";
	return $query;
  }
  function query_peopleSubscribedDomain($domain_Id){
  $selectQuery="SELECT t_users FROM dom_info WHERE domain_Id='".$domain_Id."';";
  return $selectQuery;
  }
}
?>