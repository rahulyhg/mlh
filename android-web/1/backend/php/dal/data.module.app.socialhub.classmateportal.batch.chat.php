<?php
class ClassmateBatchChat {
  function query_data_getAllMsgs($batch_Id){
    $sql="SELECT cmp_batch_mem_chat.chat_Id, cmp_batch_mem_chat.batch_Id, cmp_batch_mem_chat.msg_by, ";
	$sql.="cmp_batch_mem_chat.sent_On, cmp_batch_mem_chat.msg, cmp_batch_mem_chat.reply_reference, user_account.user_Id, ";
	$sql.=" user_account.username, user_account.surName, user_account.name, user_account.profile_pic ";
	$sql.=" FROM cmp_batch_mem_chat, user_account ";
	$sql.="WHERE cmp_batch_mem_chat.batch_Id='".$batch_Id."' AND user_account.user_Id=cmp_batch_mem_chat.msg_by ";
	$sql.="ORDER BY cmp_batch_mem_chat.sent_On ASC ";
	return $sql;
  }
  function query_data_getLatestTwentyMsgs($batch_Id){
    $sql="SELECT cmp_batch_mem_chat.chat_Id, cmp_batch_mem_chat.batch_Id, cmp_batch_mem_chat.msg_by, ";
	$sql.="cmp_batch_mem_chat.sent_On, cmp_batch_mem_chat.msg, cmp_batch_mem_chat.reply_reference, user_account.user_Id, ";
	$sql.=" user_account.username, user_account.surName, user_account.name, user_account.profile_pic ";
	$sql.=" FROM cmp_batch_mem_chat, user_account ";
	$sql.="WHERE cmp_batch_mem_chat.batch_Id='".$batch_Id."' AND user_account.user_Id=cmp_batch_mem_chat.msg_by ";
	$sql.="ORDER BY cmp_batch_mem_chat.sent_On ASC LIMIT 0,20;";
	return $sql;
  }
  function query_add_newMessage($chat_Id, $batch_Id, $msg_by, $sent_On, $msg, $reply_reference){
    $sql="INSERT INTO cmp_batch_mem_chat(chat_Id, batch_Id, msg_by, sent_On, msg, reply_reference) ";
	$sql.="VALUES ('".$chat_Id."','".$batch_Id."','".$msg_by."','".$sent_On."','".$msg."','".$reply_reference."');";
	return $sql;
  }
  function query_data_getLatestMsgs($batch_Id,$afterTS){
    $sql="SELECT cmp_batch_mem_chat.chat_Id, cmp_batch_mem_chat.batch_Id, cmp_batch_mem_chat.msg_by, ";
	$sql.="cmp_batch_mem_chat.sent_On, cmp_batch_mem_chat.msg, cmp_batch_mem_chat.reply_reference, user_account.user_Id, ";
	$sql.=" user_account.username, user_account.surName, user_account.name, user_account.profile_pic ";
	$sql.=" FROM cmp_batch_mem_chat, user_account ";
	$sql.="WHERE cmp_batch_mem_chat.batch_Id='".$batch_Id."' AND user_account.user_Id=cmp_batch_mem_chat.msg_by AND ";
	$sql.=" cmp_batch_mem_chat.sent_On>'".$afterTS."' ";
	$sql.="ORDER BY cmp_batch_mem_chat.sent_On ASC LIMIT 0,20;";
	return $sql;
  }
}

?>