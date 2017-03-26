<?php
//###################  UZDEVUMA SAGLABĀŠANA  ################################################
if (isset($_POST['task_save'])) {
	$atbilde=$_POST['atbilde'];
	$fileAtbilde=$_POST['fileAtbilde'];
	sqlupdate("atbilde",$atbilde,"uzdevumi"," identifikators ='".$_SESSION['TASK_ID']."'",$db);
	sqlupdate("izpild_dat",date("Y-m-d"),"uzdevumi"," identifikators ='".$_SESSION['TASK_ID']."'",$db);
	sqlupdate("fileAtbilde",$fileAtbilde,"uzdevumi"," identifikators ='".$_SESSION['TASK_ID']."'",$db);

	if ($_SESSION['STRUKTURA']=='TEH') {
		$sql ="UPDATE notikumi SET dat_teh='".date("Y-m-d")."', teh_atbild='".$atbilde."'  WHERE event_id='".$_SESSION['TASK_ID']."' AND teh_cilv='".$_SESSION['AGENTS']."'" ;
		msg("$sql=".$sql);
		$q = $db->query($sql);
	}
	if ($_SESSION['STRUKTURA']=='LAB') {
		$sql ="UPDATE notikumi SET dat_lab='".date("Y-m-d")."', lab_atbild='".$atbilde."'  WHERE event_id='".$_SESSION['TASK_ID']."' AND teh_cilv='".$_SESSION['AGENTS']."'" ;
		msg("$sql=".$sql);
		$q = $db->query($sql);

	}
	if ($_SESSION['STRUKTURA']=='LOG') {
		$sql ="UPDATE notikumi SET dat_log='".date("Y-m-d")."', log_atbild='".$atbilde."'  WHERE event_id='".$_SESSION['TASK_ID']."' AND teh_cilv='".$_SESSION['AGENTS']."'" ;
		msg("$sql=".$sql);
		$q = $db->query($sql);

	}
}