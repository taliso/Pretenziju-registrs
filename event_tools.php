<?php
//###################  EVENTA VEIDA IZVELES GET  ################################################
$ev_veid="";
$ev_nos="";
//var_dump($pret_events);
if(isset($_GET['addev'])){
	$addev=$_GET['addev'];
	if($addev=='mnTask'){
		$_SESSION['EVENT_FORMA']="new_ev_task.php";
		$ev_veid="task";
		$ev_nos="Uzdevums";
	}
	if($addev=='mnInfo'){
		$_SESSION['EVENT_FORMA']="new_ev_report.php";
		$ev_veid="report";
		$ev_nos="Ziņojums";
	}
	if($addev=='mnRezult'){
		$_SESSION['EVENT_FORMA']="new_ev_order.php";
		$ev_veid="order";
		$ev_nos="Lēmums";
	}
	if($addev=='mnKorekt'){
		$_SESSION['EVENT_FORMA']="new_ev_actions.php";
		$ev_veid="actions";
		$ev_nos="Korektīvās darbības";
	}
}

//###################  GRIBU JAUNU EVENTU  ################################################
if (isset($_POST['new_event_create'])) {
	// ***********  Izvelkam notikuma veidu  ******************************
	$_SESSION['STATUS']='NEWEVENT';

	$sql="DELETE FROM `tmp_files`";
	$q = $db->query($sql);

	$sql="DELETE FROM `tmp_personas_notikums`";
	$q = $db->query($sql);
	
	// Izveidojam uzdevumus visiem dalībniekiem
	//Izsūtam piestiprinātos failus visiem dalībniekiem
}

//###################  ATCEĻU  NEWEVENT  ################################################
if (isset($_POST['new_event_cancel'])) {
	// ***********  Atceļam notikumpievienošanu ******************************
	$_SESSION['EVENT_FORMA'] = '';
	$_SESSION['STATUS']='EVENT';

	$sql="DELETE FROM `tmp_files`";
	$q = $db->query($sql);
	
	$sql="DELETE FROM `tmp_personas_notikums`";
	$q = $db->query($sql);
	
}

//###################  APSTIPRINU  NEWEVENT  ################################################ date("Y-m-d")
if (isset($_POST['new_event_accept'])) {
	$_SESSION['STATUS']="EVENTS";
	$id_pret=$_SESSION['ID_PRET'];
	$pret_id=$_SESSION['PRET_ID'];
	$npk=$_SESSION['NOTIKUMU_SK']+1;
	$event_date=date("Y-m-d");
	$event_id=$pret_id."-".$npk;
		
	$sql = "INSERT INTO notikumi SET ";
	$sql=$sql."
 	  	id_pret=:id_pret ,
 	  	pret_id=:pret_id ,
		npk=:npk ,
 	  	event_id=:event_id ,
   		event_date=:event_date";

	$q = $db->prepare($sql);
		
	$data = array(
			':id_pret'=>$id_pret,
			':pret_id'=>$pret_id,
			':npk'=>$npk,
			':event_id'=>$event_id,
			':event_date'=>$event_date);
		
	$q->execute($data);
	sqlupdate('notikumu_sk',$npk,'pretenzijas','pret_id="'.$pret_id.'"',$db);
	sqlupdate('status','PROCESSED','pretenzijas','pret_id="'.$pret_id.'"',$db);

//###############   Saglabājam datus par personām  ###############################################

	$fields =" persona, strukturas_kods, uzdevums, event_id, e_pasts ";
	$ftabula="tmp_personas_notikums";
	$fwhere="";

	$event_users = sqltoarray($fields,$ftabula,$fwhere,$db);

	foreach ($event_users as $OneUser) {
		// var_dump($OneUser);
		$sql = "INSERT INTO personas_notikums SET ";
		$sql=$sql."
 	  	event_id=:event_id ,
 	  	persona=:persona ,
		struktura_kods=:struktura_kods ,
 	  	uzdevums=:uzdevums ,
		e_pasts=:e_pasts ,
   		uzd_datums=:uzd_datums";

		$q = $db->prepare($sql);

		$data = array(
				':event_id'=>$OneUser['event_id'],
				':persona'=>$OneUser['persona'],
				':struktura_kods'=>$OneUser['strukturas_kods'],
				':uzdevums'=>$OneUser['uzdevums'],
				':e_pasts'=>$OneUser['e_pasts'],
				':uzd_datums'=>date("Y-m-d"));
			$uzdevums=$OneUser['uzdevums'];
		$q->execute($data);
	}
// END  ###############   Saglabājam datus par personām  ###############################################
//###############   Saglabājam datus par failiem  ###############################################

		$fields =" source, identif, name, tmp_name, size, cmdDel ";
		$ftabula="tmp_files";
		$fwhere="";
		
		$event_files = sqltoarray($fields,$ftabula,$fwhere,$db);
		
		foreach ($event_files as $OneFile) {
			// var_dump($OneUser);
			$sql = "INSERT INTO faili SET ";
			$sql=$sql."
				 	  	orginal_name=:orginal_name ,
				 	  	konvert_name=:konvert_name ,
						source=:source ,
				 	  	ident=:ident ,
						size=:size ,
				   		submit_name=:submit_name";
		
			$q = $db->prepare($sql);
			$konv_name=substr($OneFile['source'],0,4).'_'.$OneFile['identif'].'_'.$OneFile['name'];
			$data = array(
					':orginal_name'=>$OneFile['name'],
					':konvert_name'=>$konv_name,
					':source'=>'NOTIKUMS',
					':ident'=>$OneFile['identif'],
					':size'=>$OneFile['size'],
					':submit_name'=>'doc_to_event');
				
			$q->execute($data);
//  END  ###############   Saglabājam datus par failiem  ###############################################
		
		
		// Uzdevumu veidošana
		$sql = "INSERT INTO uzdevumi SET ";
		$sql=$sql."
 	  	avots=:avots ,
 	  	id_source=:id_source ,
		identifikators=:identifikators ,
 	  	datums=:datums ,
		uzdevums=:uzdevums ,
   		termins=:termins";

		$q = $db->prepare($sql);

		$data = array(
				':avots'=>'notikumi',
				':id_source'=> 0,
				':identifikators'=>$OneUser['event_id'],
				':datums'=>date("Y-m-d"),
				':uzdevums'=>$uzdevums,
				':termins'=>date("Y-m-d"));
			
		$q->execute($data);

// TMP failu datu dzesana *******************************************************
		$sql="DELETE FROM `tmp_files`";
		$q = $db->query($sql);
		
		$sql="DELETE FROM `tmp_personas_notikums`";
		$q = $db->query($sql);
		

		//E-pastu nosūtīšana

	}

}
//###########   Pievienot personu jaunam eventam     #########################################################
if (isset($_POST['user_to_event'])) {

	// ***********  Izvelkam personu  ******************************
	$pers=$_POST['persona'];
	$sql="select * from kl_agenti where agents='".$pers."'";
	$q = $db->query($sql);
	$muser = $q->fetch(PDO::FETCH_ASSOC);
	$sql = "INSERT INTO tmp_personas_notikums SET ";
	$sql=$sql."
 	  	persona=:persona ,
 	  	strukturas_kods=:strukturas_kods ,
		uzdevums=:uzdevums ,
		uzd_datums=:uzd_datums ,
		event_id=:event_id ,
		e_pasts=:e_pasts";

	$q = $db->prepare($sql);

	$data = array(
			':persona'=>$muser['agents'],
			':strukturas_kods'=>$muser['struktura_kods'],
			':uzd_datums'=>'0000-00-00',
			':uzdevums'=>$_POST['uzdevums'],
			':event_id'=>$_SESSION['EVENT_ID'],
			':e_pasts'=>$muser['epasts']);

	$q->execute($data);
}

//###########   Pievienot failu jaunam eventam     #########################################################
if (isset($_POST['doc_to_event'])) {
	$sql = "INSERT INTO tmp_files SET ";
	$sql=$sql."
 	  	submit_name=:submit_name ,
 	  	source=:source ,
 	  	identif=:identif ,
		name=:name ,
 	  	type=:type ,
   		tmp_name=:tmp_name ,
 		size=:size ,
   		cmdDel=:cmdDel";

	$q = $db->prepare($sql);

	$pret_id=$_SESSION['PRET_ID'];
	$npk=$_SESSION['NOTIKUMU_SK']+1;
	$event_id=$pret_id."-".$npk;

	me(2,'Faila SQL',$sql);

	$data = array(
			':submit_name'=>"fileUzdev",
			':source'=>'NOTIKUMS',
			':identif'=>$event_id,
			':name'=>$_FILES['fileUzdev']['name'],
			':type'=>$_FILES['fileUzdev']['type'],
			':tmp_name'=>$_FILES['fileUzdev']['tmp_name'],
			':size'=>$_FILES['fileUzdev']['size'],
			':cmdDel'=>0);

	$q->execute($data);
//die('TMP fails');

}
