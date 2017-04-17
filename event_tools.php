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

//###################  GRIBU JAUNU NOTIKUMU  ################################################
if (isset($_POST['new_event_create'])) {
	// ***********  Izvelkam notikuma veidu  ******************************
    $_SESSION['EVENT_STATUS']='NEW';
    $_SESSION['EVENT_FORMA']="new_ev_task.php";
    $ev_veid="task";
    $ev_nos="Uzdevums";

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

//####['new_event_accept']###############  APSTIPRINU  NEWEVENT  ################################################ date("Y-m-d")
//####['new_event_accept']#### INSERT notikums
if (isset($_POST['new_event_accept'])) {
    $_SESSION['EVENT_STATUS']='LIST';
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
    $_SESSION['ID_EVENT']= max_id('notikumi',$db);
	sqlupdate('notikumu_sk',$npk,'pretenzijas','pret_id="'.$pret_id.'"',$db);
	sqlupdate('status','PROCESSED','pretenzijas','pret_id="'.$pret_id.'"',$db);

//###############   Saglabājam datus par personām  ###############################################

	$fields =" id_pers, persona, strukturas_kods, uzdevums, event_id, e_pasts ";
	$ftabula="tmp_personas_notikums";
	$fwhere="";

	$event_users = sqltoarray($fields,$ftabula,$fwhere,$db);
    $rek_sk=0;
	foreach ($event_users as $OneUser) {
		// var_dump($OneUser);
		$sql = "INSERT INTO personas_notikums SET ";
		$sql=$sql."
		id_pers=:id_pers ,
		id_event=:id_event ,
 	  	event_id=:event_id ,
 	  	persona=:persona ,
		struktura_kods=:struktura_kods ,
 	  	uzdevums=:uzdevums ,
		e_pasts=:e_pasts ,
   		uzd_datums=:uzd_datums";

		$q = $db->prepare($sql);

		$data = array(
                ':id_pers'=>$OneUser['id_pers'],
		        ':id_event'=>$_SESSION['ID_EVENT'],
				':event_id'=>$OneUser['event_id'],
				':persona'=>$OneUser['persona'],
				':struktura_kods'=>$OneUser['strukturas_kods'],
				':uzdevums'=>$OneUser['uzdevums'],
				':e_pasts'=>$OneUser['e_pasts'],
				':uzd_datums'=>date("Y-m-d"));

		$q->execute($data);
        $id_pn=max_id('personas_notikums',$db);
 //###############   Veidojam uzdevumus personām  ###############################################
        // Uzdevumu veidošana
        $sql = "INSERT INTO uzdevumi SET ";
        $sql=$sql."
        persona=:persona ,
 	  	avots=:avots ,
 	  	id_source=:id_source ,
 	  	id_master=:id_master ,
 	  	id_pers=:id_pers ,
		identifikators=:identifikators ,
 	  	datums=:datums ,
		uzdevums=:uzdevums ,
   		termins=:termins";

        $q = $db->prepare($sql);

        $data = array(
            ':persona'=>$OneUser['persona'],
            ':avots'=>'notikumi',
            ':id_source'=>$id_pn ,
            ':id_master'=>$_SESSION['ID_EVENT'] ,
            ':id_pers'=>$OneUser['id_pers'] ,
			':identifikators'=>$OneUser['event_id'],
			':datums'=>date("Y-m-d"),
			':uzdevums'=>$OneUser['uzdevums'],
			':termins'=>date("Y-m-d"));

        $q->execute($data);
//----------- END --------------   Veidojam uzdevumus personām  ###############################################


        $rek_sk=$rek_sk+1;

    }
    //   Fiksējam rindiņu skaitu
    sqlupdate('rec_sk',$rek_sk,'notikumi',' id='.$_SESSION['ID_EVENT'],$db);
// END  ###############   Saglabājam datus par personām  ###############################################
//###############   Saglabājam datus par failiem  ###############################################

    tmp_fil_save('notikumi',$_SESSION['ID_EVENT'],$db);


//  END  -----------------  Saglabājam datus par failiem  -----------------------------------------


// TMP failu datu dzesana *******************************************************
		$sql="DELETE FROM `tmp_files`";
		$q = $db->query($sql);
		
		$sql="DELETE FROM `tmp_personas_notikums`";
		$q = $db->query($sql);
		

		//E-pastu nosūtīšana


}  //#########  ['new_event_accept']  END
//###########   Pievienot personu jaunam eventam     #########################################################
if (isset($_POST['user_to_event'])) {

    // ***********  Izvelkam personu  ******************************
	$pers=$_POST['persona'];
	$sql="select * from kl_agenti where agents='".$pers."'";
	$q = $db->query($sql);
	$muser = $q->fetch(PDO::FETCH_ASSOC);
	$sql = "INSERT INTO tmp_personas_notikums SET ";
	$sql=$sql."
        id_pers=:id_pers ,            
 	  	persona=:persona ,
 	  	strukturas_kods=:strukturas_kods ,
		uzdevums=:uzdevums ,
		uzd_datums=:uzd_datums ,
		event_id=:event_id ,
		e_pasts=:e_pasts";

	$q = $db->prepare($sql);

	$data = array(
            ':id_pers'=>$muser['ID'],
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
    $pret_id=$_SESSION['PRET_ID'];
	$npk=$_SESSION['NOTIKUMU_SK']+1;
	$event_id=$pret_id."-".$npk;
    to_tmp_file('notikumi',$event_id,'fileUzdev',$db);
}
