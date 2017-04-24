<?php
//###################  GRIBU JAUNU NOTIKUMU - UZDEVUMS  ################################################
if (isset($_POST['new_event_task_create'])) {
	// ***********  Izvelkam notikuma veidu  ******************************
    $_SESSION['EVENTS']['STATUS']='NULL';
    $_SESSION['EVENTS']['FORMA']="new_ev_task.php";
    $_SESSION['EVENTS']['NR']=$_SESSION['PRET']['NOTIKUMU_SK']+1;
    $_SESSION['EVENTS']['KODS']=$_SESSION['PRET']['KODS']."-".$_SESSION['EVENTS']['NR'];
    $_SESSION['EVENTS']['VEIDS']='T';
    $_SESSION['EVENTS']['VEIDS_NOS']='UZDEVUMS';
    $_SESSION['EVENTS']['PERS_SK'] =0;
    $_SESSION['EVENTS']['FAIL_SK'] =0;

	$sql="DELETE FROM `tmp_files`";
	$q = $db->query($sql);

	$sql="DELETE FROM `tmp_personas_notikums`";
	$q = $db->query($sql);
	
	// Izveidojam uzdevumus visiem dalībniekiem
	//Izsūtam piestiprinātos failus visiem dalībniekiem
}
//###################  GRIBU JAUNU NOTIKUMU - ZINOJUMS  ################################################
if (isset($_POST['new_event_report_create'])) {
    // ***********  Izvelkam notikuma veidu  ******************************
    $_SESSION['EVENTS']['STATUS']='NULL';
    $_SESSION['EVENTS']['FORMA']="new_ev_report.php";
    $_SESSION['EVENTS']['NR']=$_SESSION['PRET']['NOTIKUMU_SK']+1;
    $_SESSION['EVENTS']['KODS']=$_SESSION['PRET']['KODS']."-".$_SESSION['EVENTS']['NR'];
    $_SESSION['EVENTS']['VEIDS']='R';
    $_SESSION['EVENTS']['VEIDS_NOS']='ZIŅOJUMS';
    $_SESSION['EVENTS']['PERS_SK'] =0;
    $_SESSION['EVENTS']['FAIL_SK'] =0;

    $sql="DELETE FROM `tmp_files`";
    $q = $db->query($sql);

    $sql="DELETE FROM `tmp_personas_notikums`";
    $q = $db->query($sql);

    $sql="DELETE FROM `tmp_teksts_notikums`";
    $q = $db->query($sql);

    inser_pers_to_tmp($_SESSION['AGENTS']['ID'],$db);
    inser_text_to_tmp($_SESSION['AGENTS']['ID'],$db);
    // Izveidojam uzdevumus visiem dalībniekiem
    //Izsūtam piestiprinātos failus visiem dalībniekiem
}
//###################  GRIBU JAUNU NOTIKUMU - LEMUMS  ################################################
if (isset($_POST['new_event_order_create'])) {
    // ***********  Izvelkam notikuma veidu  ******************************
    $_SESSION['EVENTS']['STATUS']='NULL';
    $_SESSION['EVENTS']['FORMA']="new_ev_task.php";
    $_SESSION['EVENTS']['NR']=$_SESSION['PRET']['NOTIKUMU_SK']+1;
    $_SESSION['EVENTS']['KODS']=$_SESSION['PRET']['KODS']."-".$_SESSION['EVENTS']['NR'];
    $_SESSION['EVENTS']['VEIDS']='O';
    $_SESSION['EVENTS']['VEIDS_NOS']='LĒMUMS';
    $_SESSION['EVENTS']['PERS_SK'] =0;
    $_SESSION['EVENTS']['FAIL_SK'] =0;

    $sql="DELETE FROM `tmp_files`";
    $q = $db->query($sql);

    $sql="DELETE FROM `tmp_personas_notikums`";
    $q = $db->query($sql);

    // Izveidojam uzdevumus visiem dalībniekiem
    //Izsūtam piestiprinātos failus visiem dalībniekiem
}
//###################  GRIBU JAUNU NOTIKUMU - KOPSAVILKUMS  ################################################
if (isset($_POST['new_event_summary_create'])) {
    // ***********  Izvelkam notikuma veidu  ******************************
    $_SESSION['EVENTS']['STATUS']='NULL';
    $_SESSION['EVENTS']['FORMA']="new_ev_task.php";
    $_SESSION['EVENTS']['NR']=$_SESSION['PRET']['NOTIKUMU_SK']+1;
    $_SESSION['EVENTS']['KODS']=$_SESSION['PRET']['KODS']."-".$_SESSION['EVENTS']['NR'];
    $_SESSION['EVENTS']['VEIDS']='S';
    $_SESSION['EVENTS']['VEIDS_NOS']='KOPSAVILKUMS';
    $_SESSION['EVENTS']['PERS_SK'] =0;
    $_SESSION['EVENTS']['FAIL_SK'] =0;

    $sql="DELETE FROM `tmp_files`";
    $q = $db->query($sql);

    $sql="DELETE FROM `tmp_personas_notikums`";
    $q = $db->query($sql);

    // Izveidojam uzdevumus visiem dalībniekiem
    //Izsūtam piestiprinātos failus visiem dalībniekiem
}
//###################  GRIBU JAUNU NOTIKUMU - DARBIBAS  ################################################
if (isset($_POST['new_event_action_create'])) {
    // ***********  Izvelkam notikuma veidu  ******************************
    $_SESSION['EVENTS']['STATUS']='NULL';
    $_SESSION['EVENTS']['FORMA']="new_ev_task.php";
    $_SESSION['EVENTS']['NR']=$_SESSION['PRET']['NOTIKUMU_SK']+1;
    $_SESSION['EVENTS']['KODS']=$_SESSION['PRET']['KODS']."-".$_SESSION['EVENTS']['NR'];
    $_SESSION['EVENTS']['VEIDS']='A';
    $_SESSION['EVENTS']['VEIDS_NOS']='DARBĪBAS';
    $_SESSION['EVENTS']['PERS_SK'] =0;
    $_SESSION['EVENTS']['FAIL_SK'] =0;


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
	$_SESSION['EVENTS']['FORMA'] = '';
    $_SESSION['EVENTS']['STATUS']='LIST';
	$_SESSION['WAY']='EVENT';

	$sql="DELETE FROM `tmp_files`";
	$q = $db->query($sql);

	$sql="DELETE FROM `tmp_personas_notikums`";
	$q = $db->query($sql);

    $sql="DELETE FROM `tmp_teksts_notikums`";
    $q = $db->query($sql);

}
//####['new_event_accept']###############  APSTIPRINU  NEWEVENT - TASKS    ############################################
//####['new_event_accept']#### INSERT notikums
if (isset($_POST['new_event_accept'])) {
    $_SESSION['EVENTS']['STATUS']="NEW";
    $_SESSION['WAY']="EVENTS";
//	$id_pret=$_SESSION['PRET']['ID'];
//	$pret_id=$_SESSION['PRET']['KODS'];
//	$npk=$_SESSION['PRET']['NOTIKUMU_SK']+1;
//	$event_date=date("Y-m-d");
//	$event_id=$pret_id."-".$npk;
		
	$sql = "INSERT INTO notikumi SET ";
	$sql=$sql."
 	  	id_pret=:id_pret ,
 	  	pret_id=:pret_id ,
		reg_nr=:reg_nr ,
 	  	event_id=:event_id ,
   		event_date=:event_date,
	    pers_sk=:pers_sk ,
        fail_sk=:pers_sk ,
        status=:status ,
        veids_nos=:veids_nos ,
        veids=:veids";

	$q = $db->prepare($sql);
		
	$data = array(
			':id_pret'=>$_SESSION['PRET']['ID'],
			':pret_id'=>$_SESSION['PRET']['KODS'],
			':reg_nr'=>$_SESSION['EVENTS']['NR'],
			':event_id'=>$_SESSION['EVENTS']['KODS'],
			':event_date'=>date("Y-m-d"),
	        ':pers_sk'=>$_SESSION['EVENTS']['PERS_SK'],
	        ':fail_sk'=>$_SESSION['EVENTS']['FAIL_SK'],
            ':status'=>$_SESSION['EVENTS']['STATUS'] ,
            ':veids_nos'=>$_SESSION['EVENTS']['VEIDS_NOS'],
            ':veids'=>$_SESSION['EVENTS']['VEIDS']);

	$q->execute($data);

	//####['new_event_accept']#### INSERT notikums
    $_SESSION['EVENTS']['ID']= max_id('notikumi',$db);
	sqlupdate('notikumu_sk',$_SESSION['PRET']['NOTIKUMU_SK']+1,'pretenzijas',' ID="'.$_SESSION['PRET']['ID'].'"',$db);
	sqlupdate('status','PROCESSED','pretenzijas',' ID="'.$_SESSION['PRET']['ID'].'"',$db);

	//###############   Saglabājam tekstus, ja tādi ir  ###############################################

    if (isset($_POST['zinojums'])){
//        $tmp_id=max_id('tmp_teksts_notikums',$db);
//        $sql = "UPDATE tmp_teksts_notikums SET ";
//        $sql = $sql . "
//                    teksts_out=:teksts_out
//             where ID=".$tmp_id;
//        $data = array(
//            ':teksts_out' => $mtx['teksts_out']);
        $tmp_id=max_id('tmp_teksts_notikums',$db);
        $teksts=$_POST['zinojums'];
        $fwhere=" ID=".$tmp_id;
        sqlupdate(' teksts_out ' , $teksts, ' tmp_teksts_notikums ', $fwhere, $db);
    }


//###############   Saglabājam datus par personām  ###############################################

	$fields =" id_pers, persona, strukturas_kods, uzdevums, event_id, e_pasts ";
	$ftabula="tmp_personas_notikums";
	$fwhere="";

	$event_users = sqltoarray($fields,$ftabula,$fwhere,$db);
    $_SESSION['EVENTS']['PERS_SK'] =0;
//####['new_event_accept']#### INSERT katru personu no tmp_personam
	foreach ($event_users as $OneUser) {
		// var_dump($OneUser);
        $_SESSION['EVENTS']['PERS_SK']=$_SESSION['EVENTS']['PERS_SK']+1;
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
		        ':id_event'=>$_SESSION['EVENTS']['ID'],
				':event_id'=>$OneUser['event_id'],
				':persona'=>$OneUser['persona'],
				':struktura_kods'=>$OneUser['strukturas_kods'],
				':uzdevums'=>$OneUser['uzdevums'],
				':e_pasts'=>$OneUser['e_pasts'],
				':uzd_datums'=>date("Y-m-d"));

		$q->execute($data);
        sqlupdate('pers_sk',$_SESSION['EVENTS']['PERS_SK'],'notikumi',' ID='.$_SESSION['EVENTS']['ID'],$db);



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
            ':id_source'=>$_SESSION['PRET']['ID'] ,
            ':id_master'=>$_SESSION['EVENTS']['ID'] ,
            ':id_pers'=>$OneUser['id_pers'] ,
			':identifikators'=>$OneUser['event_id'],
			':datums'=>date("Y-m-d"),
			':uzdevums'=>$OneUser['uzdevums'],
			':termins'=>date("Y-m-d"));

        $q->execute($data);
    }
// END  ###############   Saglabājam datus par personām  ###############################################
//###############   Saglabājam datus par failiem  ###############################################

    $_SESSION['EVENTS']['FAIL_SK']=tmp_fil_save('notikumi',$_SESSION['EVENTS']['ID'],$db);
    sqlupdate('fail_sk',$_SESSION['EVENTS']['FAIL_SK'],'notikumi',' ID='.$_SESSION['EVENTS']['ID'],$db);

//  END  -----------------  Saglabājam datus par failiem  -----------------------------------------


// TMP failu datu dzesana *******************************************************
    $sql="DELETE FROM `tmp_files`";
    $q = $db->query($sql);

    $sql="DELETE FROM `tmp_personas_notikums`";
    $q = $db->query($sql);

    $sql="DELETE FROM `tmp_teksts_notikums`";
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
	    id_event=:id_event ,
        id_pers=:id_pers ,            
 	  	persona=:persona ,
 	  	strukturas_kods=:strukturas_kods ,
 	  	uzdevums=:uzdevums ,
		uzd_datums=:uzd_datums ,
		event_id=:event_id ,
		e_pasts=:e_pasts";

	$q = $db->prepare($sql);

	$data = array(
	        ':id_event'=>$_SESSION['EVENTS']['ID'] ,
            ':id_pers'=>$muser['ID'],
			':persona'=>$muser['agents'],
			':strukturas_kods'=>$muser['struktura_kods'],
			':uzdevums'=>$_POST['uzdevums'],
			':uzd_datums'=>'0000-00-00',
			':event_id'=>$_SESSION['EVENTS']['KODS'],
			':e_pasts'=>$muser['epasts']);

	$q->execute($data);

}
//###########   Pievienot failu jaunam eventam     #########################################################
if (isset($_POST['doc_to_event'])) {
    $pret_id=$_SESSION['PRET']['KODS'];
	$npk=$_SESSION['PRET']['NOTIKUMU_SK']+1;
	$event_id=$pret_id."-".$npk;
    to_tmp_file('notikumi',$event_id,'fileUzdev',$db);
}
//###########   Saglabājam tekstu tmp failā     #########################################################
if (isset($_POST['teksts_to_event'])) {
    if (isset($_POST['zinojums'])) {
        $variable = $_POST['zinojums'];
        $tmp_id = max_id('tmp_teksts_notikums', $db);
        $fwhere = " ID= " . $tmp_id;
        sqlupdate(' teksts_out ', $variable, 'tmp_teksts_notikums', $fwhere, $db);
    }

}