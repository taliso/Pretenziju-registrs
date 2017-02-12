<?php

if ($_SESSION['PRET_STATUS']=="NEW") {
	$Nr=NextID($_SESSION['PREFIKS']);
	$Nr=$Nr + 1;
	$_SESSION['PRET_ID']=$_SESSION['PREFIKS']."-".$Nr;
	
	$dbf = new PDO("mysql:host=".HOST.";dbname=".DB,USER,PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$sql ="UPDATE tp_pretenzijas.menju SET reg_nr=".$Nr." WHERE prefiks='".$_SESSION['PREFIKS']."'";

	$q = $dbf->query($sql);
	$_SESSION['REG_NR']=$Nr;
}
$veids = $_SESSION['PREFIKS'];

$dokumenta_datums =(strlen( $_POST['dokumenta_datums'])==0) ? "0000-00-00" : $_POST['dokumenta_datums'];
$sanemsanas_datums = (strlen( $_POST['sanemsanas_datums'])==0) ? "0000-00-00" : $_POST['sanemsanas_datums'];
$pret_id = $_SESSION['PRET_ID'];
$reg_nr=$_SESSION['REG_NR'];
$iesniedzejs = $_POST['iesniedzejs'];
$agents = $_POST['agents'];
$produkcija = $_POST['produkcija'];
$pasutijuma_nr = $_POST['pasutijuma_nr'];
$daudzums_viss = (!isset($_POST['daudzums_viss'])) ? "0" : "1";
$daudzums_pieg_part = (!isset($_POST['daudzums_pieg_part'])) ? "0" : "1";
$pieg_part_nr = $_POST['pieg_part_nr'];
$daudzums_atsev_paneli = (!isset($_POST['daudzums_atsev_paneli'])) ? "0" : "1";
$daudzums_kvmet = $_POST['daudzums_kvmet'];
$daudzums_kubmet = 0;
$no_partijas = $_POST['no_partijas'];
$par_laiks = (!isset($_POST['par_laiks'])) ? "0" : "1";
$par_daudzumu = (!isset($_POST['par_daudzumu'])) ? "0" : "1";
$par_bojats = (!isset($_POST['par_bojats'])) ? "0" : "1";
$par_kvalitati = (!isset($_POST['par_kvalitati'])) ? "0" : "1";
$iesniegts_nav = (!isset($_POST['iesniegts_nav'])) ? "0" : "1";
$iesniegts_panel_foto = (!isset($_POST['iesniegts_panel_foto'])) ? "0" : "1";
$iesniegts_mark_foto = (!isset($_POST['iesniegts_mark_foto'])) ? "0" : "1";
$obl_dok_crm = (!isset($_POST['obl_dok_crm'])) ? "0" : "1";
$obl_dok_akts = (!isset($_POST['obl_dok_akts'])) ? "0" : "1";
$apraksts = $_POST['apraksts'];
$file_foto = "";
$file_pas = "";
$file_apr = "";
$status = $_SESSION['PRET_STATUS'];
$budzets = 0;
$nosutits_admin = 0;
$nosutits_razosana = 0;
$nosutits_logistika = 0;
$nosutits_tehniki = 0;
$atbildes_datums = "0000-00-00";
$saskanots_ar_klientu = "0000-00-00";
$vienosanas = "";
$beigu_dat = "0000-00-00";
$registr_datums = "0000-00-00";
$sakuma_datums= "0000-00-00";

if ($_SESSION['PRET_STATUS']=="NEW") {
	$sql = "INSERT INTO pretenzijas SET ";
	//ECHO "2_SESSION['PRET_STATUS']=".$_SESSION['PRET_STATUS'];
} else {
	$sql = "UPDATE pretenzijas SET ";
}

$sql=$sql."
		reg_nr=:reg_nr,
		veids=:veids,
		dokumenta_datums=:dokumenta_datums,
		sanemsanas_datums=:sanemsanas_datums,
		registr_datums=:registr_datums,
		pret_id=:pret_id,
		iesniedzejs=:iesniedzejs,
		agents=:agents,
		produkcija=:produkcija,
		pasutijuma_nr=:pasutijuma_nr,
		daudzums_viss=:daudzums_viss,
		daudzums_pieg_part=:daudzums_pieg_part,
		pieg_part_nr=:pieg_part_nr,
		daudzums_atsev_paneli=:daudzums_atsev_paneli,
		daudzums_kvmet=:daudzums_kvmet,
		daudzums_kubmet=:daudzums_kubmet,
		no_partijas=:no_partijas,
		par_laiks=:par_laiks,
		par_daudzumu=:par_daudzumu,
		par_bojats=:par_bojats,
		par_kvalitati=:par_kvalitati,
		par_izkr_trans=:par_izkr_trans,
		par_izkr_iepak=:par_izkr_iepak,
		par_izkr_izpak=:par_izkr_izpak,
		par_piemont_jaun=:par_piemont_jaun,
		par_piemont_ekspl=:par_piemont_ekspl,
		beigu_dat=:beigu_dat,
		noform_pardev=:noform_pardev,
		noform_e_pasts=:noform_e_pasts,
		noform_oficial=:noform_oficial,
		iesniegts_nav=:iesniegts_nav,
		iesniegts_panel_foto=:iesniegts_panel_foto,
		iesniegts_mark_foto=:iesniegts_mark_foto,
		obl_dok_crm=:obl_dok_crm,
		obl_dok_akts=:obl_dok_akts,
		apraksts=:apraksts,
		file_foto=:file_foto,
		file_pas=:file_pas,
		file_apr=:file_apr,
		status=:status,
		notikumu_sk=:notikumu_sk,
		atbildigais=:atbildigais,
		budzets=:budzets,
		uzd_izpilda=:uzd_izpilda,
		akt_uzdevums=:akt_uzdevums,
		uzd_termins=:uzd_termins,
		sakuma_datums=:sakuma_datums,
		nosutits_admin=:nosutits_admin,
		nosutits_razosana=:nosutits_razosana,
		nosutits_logistika=:nosutits_logistika,
		nosutits_tehniki=:nosutits_tehniki,
		atbildes_datums=:atbildes_datums,
		saskanots_ar_klientu=:saskanots_ar_klientu,
		vienosanas=:vienosanas";

if ($_SESSION['PRET_STATUS']=="REGISTER") {
	//ECHO "3_SESSION['PRET_STATUS']=".$_SESSION['PRET_STATUS'];
	$sql = $sql." WHERE pret_id='".$_SESSION['PRET_ID']."'";
}

	$q = $db->prepare($sql);
		
		$data = array(
			':reg_nr'=>$reg_nr,
			':veids'=>$veids,
			':dokumenta_datums'=>$dokumenta_datums,
			':sanemsanas_datums'=>$sanemsanas_datums,
			':registr_datums'=>$registr_datums,
			':pret_id'=>$pret_id,
			':iesniedzejs'=>$iesniedzejs,
			':agents'=>$agents,
			':produkcija'=>$produkcija,
			':pasutijuma_nr'=>$pasutijuma_nr,
			':daudzums_viss'=>$daudzums_viss,
			':daudzums_pieg_part'=>$daudzums_pieg_part,
			':pieg_part_nr'=>$pieg_part_nr,
			':daudzums_atsev_paneli'=>$daudzums_atsev_paneli,
			':daudzums_kvmet'=>$daudzums_kvmet,
			':daudzums_kubmet'=>$daudzums_kubmet,
			':no_partijas'=>$no_partijas,
			':par_laiks'=>$par_laiks,
			':par_daudzumu'=>$par_daudzumu,
			':par_bojats'=>$par_bojats,
			':par_kvalitati'=>$par_kvalitati,
			':par_izkr_trans'=>0,
			':par_izkr_iepak'=>0,
			':par_izkr_izpak'=>0,
			':par_piemont_jaun'=>0,
			':par_piemont_ekspl'=>0,
			':beigu_dat'=>$beigu_dat,
			':noform_pardev'=>0,
			':noform_e_pasts'=>0,
			':noform_oficial'=>0,
			':iesniegts_nav'=>$iesniegts_nav,
			':iesniegts_panel_foto'=>$iesniegts_panel_foto,
			':iesniegts_mark_foto'=>$iesniegts_mark_foto,
			':obl_dok_crm'=>$obl_dok_crm,
			':obl_dok_akts'=>$obl_dok_akts,
			':apraksts'=>$apraksts,
			':file_foto'=>$file_foto,
			':file_pas'=>$file_pas,
			':file_apr'=>$file_apr,
			':status'=>$status,
			':notikumu_sk'=>0,
			':atbildigais'=>$atbildigais,
			':budzets'=>$budzets,
			':uzd_izpilda'=>$uzd_izpilda,
			':akt_uzdevums'=>$akt_uzdevums,
			':uzd_termins'=>"0000-00-00",
			':sakuma_datums'=>$sakuma_datums,
			':nosutits_admin'=>$nosutits_admin,
			':nosutits_razosana'=>$nosutits_razosana,
			':nosutits_logistika'=>$nosutits_logistika,
			':nosutits_tehniki'=>$nosutits_tehniki,
			':atbildes_datums'=>$atbildes_datums,
			':saskanots_ar_klientu'=>$saskanots_ar_klientu,
			':vienosanas'=>$vienosanas,
			':beigu_dat'=>$beigu_dat );
					
		$q->execute($data);
		$_SESSION['STATUS'] = "VIEW";
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['FORMA'] = 'pret_list.php';
		
		
		
		
		
		
		
		
		
		
