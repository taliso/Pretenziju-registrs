<?php
me('2',"veidlapa_KM_save","IN");
me("1",'Veidlapa_SAVE', $_SESSION['PRET_ID'] );
me("1",'Veidlapa_STATUS', $_SESSION['STATUS']);
if ($_SESSION['STATUS']=="NEW") {
	$Nr=NextID($_SESSION['PREFIKS']);
}

$dbf = new PDO ( "mysql:host=" . HOST . ";dbname=" . DB, USER, PASS, array (
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
) );



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
$file_obl_doc = "";
$status = $_SESSION['PRET_STATUS'];
$budzets = 0;
$beigu_dat = "0000-00-00";
$registr_datums = date("Y-m-d");
$sakuma_datums = "0000-00-00";

$fields=' * ';
$tabula='tmp_files';
$where='';

$tmp_fil=sqltoarray($fields,$tabula,$where,$db);
me("1",'tmp_file',"Izvilkts");
if ($_SESSION['STATUS']=="NEW") {
	$sql = "INSERT INTO pretenzijas SET ";

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
		file_obl_doc=:file_obl_doc;
		status=:status,
		notikumu_sk=:notikumu_sk,
		budzets=:budzets,
		sakuma_datums=:sakuma_datums";

if ($_SESSION['STATUS']=="EDIT") {
	$sql = $sql." WHERE pret_id='".$_SESSION['PRET_ID']."'";
}
me("1",'Veidlapa KM save',$sql);
	$q = $dbf->prepare($sql);
		
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
			':file_obl_doc'=>$file_obl_doc,
			':status'=>$status,
			':notikumu_sk'=>0,
			':budzets'=>$budzets,
			':sakuma_datums'=>$sakuma_datums,
			':beigu_dat'=>$beigu_dat );

		$q->execute($data);
me("2",'Update_PRET',$sql);
me("2",'PRET_ID',$pret_id);
die("SAVE");		
//#########################  FAILU UPLOADS   ################################################################
		
//^^^^^^^^^^^^^^^^^^    Saglabājam faili sarakstu ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
		
if (isset($tmp_fil)){
	foreach ($tmp_fil as $tmpf){
//		var_dump($tmpf);		
		me("1",'Katrs tmp_file',$tmpf['name']);
		$submit_name=$tmpf['submit_name'];
		$source=$tmpf['source'];
		$identif=$tmpf['identif'];
		$name=$tmpf['name'];
		$type=$tmpf['type'];
		$tmp_name=$tmpf['tmp_name'];
		$size=$tmpf['size'];
		$cmdDel=$tmpf['cmdDel'];
		$konv_name=substr($source,0,4).'_'.$identif.'_'.$name;
		
		if ($cmdDel==0){
			$sql = "INSERT INTO faili SET ";
			$sql=$sql."
			orginal_name=:orginal_name ,
			konvert_name=:konvert_name ,
			path=:path ,
			source=:source ,
			ident=:ident ,
			size=:size ,
			submit_name=:submit_name";
			
			$q = $db->prepare($sql);
			
			
			$data = array(
					':orginal_name'=> $name ,
					':konvert_name'=> $konv_name ,
					':path'=> "uploads/" ,
					':source'=>$source  ,
					':ident'=>$identif  ,
					':size'=>$size  ,
					':submit_name'=>$submit_name  );
			
			$q->execute($data);

		}
	}
	
}
echo 'Save laiks:'.timer_end();		
me('2',"veidlapa_KM_save","OUT");