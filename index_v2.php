<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "config.php";
include "funkcijas.php";
include "konekcija.php";
include "\phpmailer\mailset.php";

$datums=datums();
define("MAX_FILE_SIZE",5000000);
$target_dir = 'uploads';

// ******************************************W*********************************
//*	Mainigie:
//* 		$autor_ir - false/true - ir vai nav notikusi veiksmīga autorizācija
$autor_ir = 0;
$pref="";
$reg_nr="";
$MainInfo="";
$form="";

if (isset($_SESSION['INFO'])){
	$MainInfo=$_SESSION['INFO'];
}
timer_start();
?>

<!DOCTYPE html>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	 <link rel="stylesheet" type="text/css" href="pretenz.css" />
	 <link rel="stylesheet" type="text/css" href="teksti.css" />
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="jquery/jquery-ui.theme.min.css">
	 <link rel="stylesheet" href="jquery/jquery-ui.structure.min.css">
	 <link rel="stylesheet" href="jquery/jquery-ui.theme.min.css">
	 <script src="jquery/jquery-3.1.1.min.js"></script>
	 <script src="jquery/jquery-ui.min.js"></script>
 
  <title>Pretenzijas</title>
</head>
 
 
<?php
  	//*********  IELĀDĒJAM AĢENTU SARAKSTU MASĪVĀ $agent_list ******************************
  	
  	$sql = "SELECT * FROM kl_agenti";
  	$q = $db->query($sql);
  	while($r = $q->fetch(PDO::FETCH_ASSOC)){
  		if ($r['loma']=='A') {
 		$agent_list[]=$r;
  		}	
  		if ($r['loma']=='T') {
  			$teh_list[]=$r;
  		}
  		$liet_list[]=$r;
   	}
   	//*********  IELĀDĒJAM MENJU SARAKSTU MASĪVĀ $menju_list ******************************
  	
  	$sql = "SELECT * FROM menju";
  	$q = $db->query($sql);
  	while($r = $q->fetch(PDO::FETCH_ASSOC)){
  		$menju_list[]=$r;
 	}
  	//*********  IELĀDĒJAM SISTĒMAS DATUS ***************************************************
 	$sql = "SELECT * FROM dati";
 	$q = $db->query($sql);
 	$r = $q->fetch(PDO::FETCH_ASSOC);
 	 $versija=$r['versija'];
 //#######################    Failu pievienošana veidlapā  ##########################################
 if (isset($_POST['doc_to_pret'])) {
 	
 	$file_get_list=array_keys($_FILES);
 	foreach ($file_get_list as $f_key) {
 		$k=0;
 		$submit_name='';
 		$source='';
 		$identif='';
 		$cmdDel=0;
 		
 		me("1",'Failu piev. PRET_ID',$_SESSION['PRET_ID']);
 		$name=$_FILES[$f_key]['name'];
 		$type=$_FILES[$f_key]['type'];
 		$tmp_name=$_FILES[$f_key]['tmp_name'];
 		$size=$_FILES[$f_key]['size'];
 		$source='VEIDLAPA';
 		$identif=$_SESSION['PRET_ID'];
 		$konv_name=substr($source,0,4).'_'.$identif.'_'.$f_key.'_'.$name;
  		
 			$submit_name=$f_key;
   			me("1",'Submit_name',$submit_name);

 		if (strlen($name)>0) {
 			$konv_name='tmp\\'.$konv_name;
 			me("1",'f_key',$f_key);
 				
			$a = copy($tmp_name,$konv_name);
 			me("1",'Parkopets',$a);
 			
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
 			$data = array(
 					':submit_name'=>$submit_name,
 					':source'=>$source,
 					':identif'=>$identif,
 					':name'=>$name,
 					':type'=>$type,
 					':tmp_name'=>$konv_name,
 					':size'=>$size,
 					':cmdDel'=>$cmdDel);
 				
 			$q->execute($data);
 		}
  		
 	}

 }
//***   IZVELE NO SARAKSTA  ********************************************************************   	 
if (isset($_GET['pret_id'])){
 	$pret_id=$_GET['pret_id'];
	$_SESSION['PRET_ID']=$pret_id;
 	$_SESSION['STATUS']="VIEW";
 	$_SESSION['WAY']="CLAIM";
	
 	$sql = 'SELECT * FROM pretenzijas where pret_id="'.$pret_id.'"';
 	$q = $db->query($sql);
 	$r = $q->fetch(PDO::FETCH_ASSOC);
 	
 	$_SESSION['PRET_STATUS']=$r['status'];
 	$_SESSION['ID_PRET']=$r['ID'];
 	$_SESSION['REG_NR'] = $r['reg_nr'];
 	$_SESSION['PREFIKS'] = $r['veids'];
 	$_SESSION['PASUT_NR'] = $r['pasutijuma_nr'];
 	$_SESSION['KLIENTS'] = $r['iesniedzejs'];
	$_SESSION['SAKUMA_DATUMS']=$r['sakuma_datums'];
	$_SESSION['NOTIKUMU_SK']=$r['notikumu_sk'];
	$_SESSION['BEIGU_DAT']=$r['beigu_dat'];
	$_SESSION['IZDEVUMI']=$r['izdevumi'];
   	$_SESSION['TITLE'] = "Pretenzijas veidlapa";
   	
// 	$form=$_SESSION['FORMA'];
   	 } else {
   	 	$pret_id="";
}
//###################  IEIET SISTĒMĀ  ################################################
 if (isset($_POST['btIeiet'])) {

	$user = $_POST['user'];
	$psw = $_POST['psw'];
	foreach($liet_list as $row){
		$lUsername=$row['username'];
		$lPsw=$row['pasword'];
		if($lUsername==$_POST['user']){
			$autor_ir = 1;  					// Autorizācijas pirmais solis - username sakrita
			if($lPsw==$_POST['psw']){
				
				$lAgenta_id=$row['agenta_id'];
				$lAgents=$row['agents'];
				$lTiesibas=$row['tiesibas'];
				$lLoma=$row['loma'];
				$lStrukt=$row['struktura_kods'];
			include 'sesion_list.php';
				$MainInfo="Autorizācija ir veiksmīga";
			}
		}
	}
}	

include 'event_tools.php';
include 'task_tools.php';

//###################  IZIET  ############################################################
if (isset($_POST['btIziet'])) {
	unset($_SESSION['AGENTS']);
}
if (isset($_POST['btdebug'])) {
	if($_SESSION['DEBUG']=='ON'){
		$_SESSION['DEBUG']='OFF'; } else {
		$_SESSION['DEBUG']='ON';
	}
}
//###################  PRETENZIJAS VEIDS  ################################################
if(isset($_GET['mTools'])){
	$arKey=$_GET['mTools'];
	if ($arKey=="mnEPS"){
		$_SESSION['FORMA'] = 'pret_list.php';
		$_SESSION['PREFIKS'] ="EPS";
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['WAY']='CLAIM';
	}
	if ($arKey=="mnKM"){
		$_SESSION['FORMA'] = 'pret_list.php';
		$_SESSION['PREFIKS'] ="KM";
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['WAY']='CLAIM';
	}
	if ($arKey=="mnIEK"){
		$_SESSION['FORMA'] = 'pret_list.php';
		$_SESSION['PREFIKS'] ="IEK";
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['WAY']='CLAIM';
	}
}
if(isset($_GET['navig'])){
	
	$_SESSION['NAVIG']=$_GET['navig'];
	$navig=$_GET['navig'];
	me("1",'Navig',$_SESSION['NAVIG']);
	
	if($navig=='mnLists'){
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['WAY']="CLAIM";
		
	}
	
	if($navig=='mnEdit'){
		$_SESSION['STATUS'] = "EDIT";
		
	}

	if($navig=='mnNew'){

		if ($_SESSION['WAY'] == 'CLAIM'){
				
				$_SESSION['STATUS'] = "NEW";
				$_SESSION['PRET_ID'] = "";
		
				//********************************************************************************************************
				// Registracijas numura apdeitosana +1
				$sql = "SELECT reg_nr FROM menju where prefiks='".$_SESSION['PREFIKS']."'";
				$q = $db->query($sql);
				$r = $q->fetch(PDO::FETCH_ASSOC);
				$reg_nr=$r['reg_nr'];
				$reg_nr=$reg_nr+1;
				$_SESSION['REG_NR']=$reg_nr;
				// Registracijas numura apdeitosana +1
				$_SESSION['PRET_ID']=$_SESSION['PREFIKS']."-".$_SESSION['REG_NR'];
				me("1",'Jaunais PRET_ID',$_SESSION['PRET_ID']);
				
				//*********************************************************************************************************
					
				if ($_SESSION['PREFIKS'] =="EPS"){
					$_SESSION['TITLE'] = "EPS pretenzijas veidlapa. Jauna.";
				} //$_SESSION['PREFIKS'] =="EPS"

				if ($_SESSION['PREFIKS'] =="KM"){
					$_SESSION['TITLE'] = "KM pretenzijas veidlapa. Jauna.";
				} //$_SESSION['PREFIKS'] =="KM"

		}	//$_SESSION['STATUS'] == "VIEW"
		
		if ($_SESSION['WAY'] == "EVENT"){
			if ($_SESSION['LOMA']=="Q") {
				$_SESSION['TITLE'] = "Jauna notikuma pievienošana";
				$_SESSION['STATUS']="NEW";
				$sql="DELETE FROM `tp_pretenzijas`.`tmp_files`";
				$q = $db->query($sql);
				
				$sql="DELETE FROM `tp_pretenzijas`.`tmp_personas_notikums`";
				$q = $db->query($sql);
				
			} // $_SESSION['LOMA']=="Q"  

			else {
			//alert('Jums nav nepieciešamo tiesību');
			}
		
		} //$_SESSION['STATUS'] == "EVENTS"
		
	}  //$navig=='mnNew'
	
	if($navig=='mnTasks'){
		$_SESSION['WAY'] = 'TASK';
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['TITLE'] = "Tavu uzdevumu saraksts";
		}
		
	if($navig=='mnEvent'){
		$_SESSION['WAY'] = 'EVENT';
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['TITLE'] = "Notikumu saraksts";
	}
	if($navig=='mnAdmin'){
		$_SESSION['WAY'] = "ADMIN";
		$_SESSION['STATUS'] = "LIST";
	}
	
	
}
if(isset($_SESSION['AGENTS'])){
	$lAgents=$_SESSION['AGENTS'];
	$lUsername=$_SESSION['USER'];
	$lTiesibas=$_SESSION['TIESIBAS'];
	$lAgenta_id=$_SESSION['AGENTA_ID'];
	$title=$_SESSION['FORM_TITLE'];
	$autor_ir = 2; 					// Autorizācijas otrais solis - password sakrita
}
//#########################  PRETENZIJAS  SAVE   ################################################################
if (isset ( $_POST ['pret_save'] )) {
	include 'veidlapa_KM_save.php';
	 echo 'Pēc save:'.timer_end();
	$_SESSION ['STATUS'] = "LIST";
	$_SESSION['TITLE'] = "Pretenziju saraksts";
	if ($_SESSION ['PRET_STATUS'] == 'NEW') {
		$to = 'talis@tenax.lv';
		$sub = 'Ir registreta jauna pretenzija Nr. ' . $_SESSION ['PRET_ID'];
		$body = 'Ir registreta jauna pretenzija Nr. ' . $_SESSION ['PRET_ID'] . '. Ludzu nozimet atbildigos.';
		 
		$mail->addAddress ( $to ); // Name is optional
		$mail->Subject = $sub;
		$mail->Body = $body;
		 
		if (! $mail->send ()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'E-pasts ir nosūtīts. Par jaunu pretenziju.';
		}
	} else {
		 
		$to = 'service@tenax.lv';
		$sub = 'Pretenzija Nr. ' . $_SESSION ['PRET_ID'] . ' ir labota.';
		$body = 'Pretenzija Nr. ' . $_SESSION ['PRET_ID'] . ' ir labota.';
		 
		$mail->addAddress ( $to ); // Name is optional
		$mail->Subject = $sub;
		$mail->Body = $body;
		 
		if (! $mail->send ()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'E-pasts ir nosūtīts. Par labošanu.';
		}
	}

	$_SESSION ['STATUS'] = "LIST";
}
	?>
<?php echo 'Ielādēts' ?>