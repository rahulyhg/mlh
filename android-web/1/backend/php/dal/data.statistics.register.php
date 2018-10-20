<?php
class statistics_register {
	/* Table: area history */
	function query_todaystat_areaExists($area){
	 $sql="SELECT * FROM area_history WHERE areadate='".date('Y-m-d')."' AND area='".$area."'; ";
	 return $sql;
	}
	function query_todaystat_addAuserToArea($area_Id,$area){
		$sql="INSERT INTO area_history(area_Id, areadate, area, t_users, t_unions, t_biz, o_move, c_move, t_move) ";
		$sql.="VALUES ('".$area_Id."','".date('Y-m-d')."','".$area."',1,0,0,0,0,0); ";
	 return $sql;
	}
	function query_todaystat_updateAnuserToArea($area){
	   $sql="UPDATE area_history SET t_users=t_users+1 WHERE areadate='".date('Y-m-d')."' AND area='".$area."'; ";
	  return $sql;
	}
	
	/* Table : area_stat */
	function query_totalstat_areaExists($area){
	  $sql="SELECT * FROM area_stat WHERE area='".$area."'; ";
	 return $sql;
	}
	function query_total_addAuserToArea($area_Id,$area){
	  $sql="INSERT INTO area_stat(area_Id, area, t_users, t_unions, t_biz, o_move, c_move, t_move) ";
	  $sql.="VALUES ('".$area_Id."','".$area."',1,0,0,0,0,0); ";
	  return $sql;
	}
	function query_total_updateAnuserToArea($area){
	  $sql="UPDATE area_stat SET t_users=t_users+1 WHERE area='".$area."'; ";
	  return $sql;
	}
}
?>