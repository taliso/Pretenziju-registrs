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
$target_dir = "uploads/";

// ***************************************************************************
//*	Mainigie:
//* 		$autor_ir - false/true - ir vai nav notikusi veiksmīga autorizācija
$autor_ir = 0;

if (isset($_SESSION['INFO'])){
	$MainInfo=$_SESSION['INFO'];
}
$pref="";
$reg_nr="";
$MainInfo="";
$form="";

?>


<!DOCTYPE html>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	 <link rel="stylesheet" type="text/css" href="pretenz.css" />
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="jquery/jquery-ui.theme.min.css">
	 <link rel="stylesheet" href="jquery/jquery-ui.structure.min.css">
	 <link rel="stylesheet" href="jquery/jquery-ui.theme.min.css">
	 <script src="jquery/jquery-3.1.1.min.js"></script>
	 <script src="jquery/jquery-1.12.4.js"></script>
	 <script src="jquery/jquery-ui.min.js"></script>
 
  <title>Pretenzijas</title>
</head>
 
<body>
 
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
   	 if (isset($_POST['submitCancel'])) {   // Atcelt formas saglabāšanu
   	 	$_SESSION['FORMA'] = 'pret_list.php';
   	 	$_SESSION['STATUS'] = "LIST";
   	 }
   	  
//***   IZVELE NO SARAKSTA  ********************************************************************   	 
   	 if (isset($_GET['pret_id'])){
   	 	$pret_id=$_GET['pret_id'];
   	 	$_SESSION['PRET_ID']=$pret_id;
   	 	$_SESSION['STATUS']="VIEW";
   	 	$sql = 'SELECT * FROM pretenzijas where pret_id="'.$pret_id.'"';
   	 	$q = $db->query($sql);
   	 	$r = $q->fetch(PDO::FETCH_ASSOC);
   	 	$_SESSION['ID_PRET']=$r['ID'];
   	 	$_SESSION['REG_NR'] = $r['reg_nr'];
   	 	$_SESSION['PREFIKS'] = $r['veids'];
   	 	$_SESSION['FORMA']="veidlapa_KM_view.php";
   	 	$_SESSION['PASUT_NR'] = $r['pasutijuma_nr'];
   	 	$_SESSION['KLIENTS'] = $r['iesniedzejs'];
		$_SESSION['SAKUMA_DATUMS']=$r['sakuma_datums'];
		$_SESSION['NOTIKUMU_SK']=$r['notikumu_sk'];
   	 	$_SESSION['PRET_STATUS']='REGISTER';
   	 	$form=$_SESSION['FORMA'];
   	 } else {
   	 	$pret_id="";
   	 }
   	 //###################  APSTIPRINU  NEWEVENT  ################################################date("Y-m-d")
   	 if (isset($_POST['NewEventSave'])){
   	 	//die("nostrādāja");
   	 	$_SESSION['STATUS']="EVENTS";
   	 	echo "Nospiestse";
   	 	msg('NewEventSave');
   	 	$id_pret=$_SESSION['ID_PRET'];
   	 	$pret_id=$_SESSION['PRET_ID'];
   	 	$pasut_nr=$_SESSION['PASUT_NR'];
   	 	$event_id=$_SESSION['NOTIKUMU_SK']+1;
   	 	$teh_cilv=$_POST['teh_cilv'];
   	 	$lab_cilv=$_POST['lab_cilv'];
   	 	$log_cilv=$_POST['log_cilv'];
   	 	$uzd_teh=$_POST['uzd_teh'];
   	 	$uzd_lab=$_POST['uzd_lab'];
   	 	$uzd_log=$_POST['uzd_log'];
   	 	$event_date=$_POST['event_date'];
   	 	$kods=$pret_id."-".$event_id;
   	 	 
   	 	$sql = "INSERT INTO notikumi SET ";
   	 	$sql=$sql."
 	  	id_pret=:id_pret ,
 	  	pret_id=:pret_id ,
 	  	pasut_nr=:pasut_nr ,
 	  	event_id=:event_id ,
   		teh_cilv=:teh_cilv ,
 		lab_cilv=:lab_cilv ,
   		log_cilv=:log_cilv ,
 		uzd_teh=:uzd_teh ,
 		uzd_lab=:uzd_lab ,
 		uzd_log=:uzd_log ,
   	 	kods=:kods ,		
 		event_date=:event_date";

   	 	$q = $db->prepare($sql);
   	 
   	 	$data = array(
   	 			':id_pret'=>$id_pret,
   	 			':pret_id'=>$pret_id,
   	 			':pasut_nr'=>$pasut_nr,
   	 			':event_id'=>$event_id,
   	 			':teh_cilv'=>$teh_cilv,
   	 			':lab_cilv'=>$lab_cilv,
   	 			':log_cilv'=>$log_cilv,
   	 			':uzd_teh'=>$uzd_teh,
   	 			':uzd_lab'=>$uzd_lab,
   	 			':uzd_log'=>$uzd_log,
   	 			':kods'=>$kods,
   	 			':event_date'=>$event_date);
   	 	 
   	 	$q->execute($data);
   	 	sqlupdate('notikumu_sk',$event_id,'pretenzijas','pret_id="'.$pret_id.'"',$db);
   	 }
   	 
   	 //###################    ATCELT   NEWEVENT  ####################################################
   	 if (isset($_POST['NewEventCancel'])) {
   	 	echo "NewEventCancel1";
   	 	$_SESSION['STATUS']="EVENTS";
   	 }
   	  
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
				
				session_regenerate_id();
				$_SESSION['AGENTS'] = $lAgents;
				$_SESSION['USER'] = $lUsername;
				$_SESSION['TIESIBAS'] = $lTiesibas;
				$_SESSION['AGENTA_ID'] = $lAgenta_id;
				$_SESSION['LOMA'] = $lLoma;
				$_SESSION['FORMA'] = 'pret_list.php';
				$_SESSION['FORM_TITLE'] = -1;
				$_SESSION['NAVIG'] = -1;
				$_SESSION['VERSIJA'] = $versija;
				$_SESSION['PRET_ID'] = "";
				$_SESSION['REG_NR'] = "";
				$_SESSION['PREFIKS'] = "KM";
				$_SESSION['PASUT_NR'] = "";
				$_SESSION['KLIENTS'] = "";
				$_SESSION['STATUS'] = "LIST"; // 'VIEW','EDIT',"VIEW_EVENT","EDIT_EVENT",'LIST'
				$_SESSION['ID_PRET']="";
				$_SESSION['PRET_STATUS']=""; // "NEW","REGISTER","DELETE","ARCHIVE"
				$_SESSION['SAKUMA_DATUMS']="";
				$_SESSION['NOTIKUMU_SK']="";
				session_write_close();
				$MainInfo="Autorizācija ir veiksmīga";
			}
		}
	}
}	


if (isset($_POST['btIziet'])) {
	unset($_SESSION['AGENTS']);
}

if(isset($_GET['mTools'])){
	$arKey=$_GET['mTools'];
	if ($arKey=="mnEPS"){
		$_SESSION['FORMA'] = 'pret_list.php';
		$_SESSION['PREFIKS'] ="EPS";
		$_SESSION['STATUS'] = "LIST";
	}
	if ($arKey=="mnKM"){
		$_SESSION['FORMA'] = 'pret_list.php';
		$_SESSION['PREFIKS'] ="KM";
		$_SESSION['STATUS'] = "LIST";
	}
}

if(isset($_GET['navig'])){
	$_SESSION['NAVIG']=$_GET['navig'];
	$navig=$_GET['navig'];
	if($navig=='mnLists'){
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['FORMA'] = 'pret_list.php';
	}
	if($navig=='mnEdit'){
		$_SESSION['STATUS'] = "EDIT";
		$_SESSION['FORMA'] = 'veidlapa_KM_edit.php';
	}
	if($navig=='mnNew'){
		
		$_SESSION['STATUS'] = "EDIT";
		$_SESSION['PRET_STATUS']="NEW";
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
		//*********************************************************************************************************
		if ($_SESSION['PREFIKS'] =="EPS"){
			$_SESSION['FORMA']="veidlapa_EPS_edit.php";
		}
		if ($_SESSION['PREFIKS'] =="KM"){
			$_SESSION['FORMA']="veidlapa_KM_edit.php";
		}
	
	}
	if($navig=='mnDelete'){
		
	}
	if($navig=='mnEvent'){
		//$_SESSION['FORMA'] = 'notikumi.php';
		$_SESSION['FORMA'] = 'eventi.php';
		$_SESSION['STATUS'] = "EVENTS";
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
					
?>
<form action="#" method="post">
<div id="divMaster"><!--divMaster    -->
	<div id="divGalva"><!--divGalva    -->
		<div id="divLogo"><!--divLogo    -->
			<img id="logo" src="TENAX_TENAPORS_logo.jpg" alt="Tenapors logo" style="width:101px;height:56px;margin:10px">
		</div>	<!--divLogo    -->
		<div id="divTitle"><!--divTitle    -->
			<h1>Pretenziju reģistrācijas sistēma</h1>
		</div><!--divTitle    -->
		<div id="divInfo"><!--divInfo    -->
			<div id="divLoginInfo"><!--divLoginInfo    -->
				<div id="divLUser"><!--divLUser    -->
					<?php 	if ($autor_ir==2){?>
					<?php 	;} else {?>
						Lietotājs:
					<?php	}?>
				</div><!--divLUser    -->
				<div id="divAgents"><!--divAgents    -->
					<?php 	if ($autor_ir==2){
						echo( $lAgents);
					} 
					else {?>
						<input type="text" name="user" value="" size="20">
					<?php	}?>
				</div><!--divAgents    -->
				<div id="divPswTxt"><!--divPswTxt    -->
					<?php 	if ($autor_ir==2){?>
						<input type="submit" name="btIziet" value="Iziet">
					<?php 	;} else {?>
						Parole:
					<?php } ?>
				</div><!--divPswTxt    -->
				<div id="divPswIev"><!--divPswIev    -->
					<?php 	if ($autor_ir==2){?>
						
					<?php 	;} else {?>
						<input type="password" name="psw" value="" size="8">		
					<?php }?>
				</div><!--divPswIev    -->
				<div id="divIeIz"><!--divIeIz    -->
					<?php 	if ($autor_ir==2){?>
								
					<?php 	} else { ?>
								<input type="submit" name="btIeiet" value="Ieiet">
					<?php } ?>
				</div><!--divIeIz    -->
			</div><!--divLoginInfo    -->
			<div id="divAdmin">
				<?php 	if ($autor_ir==2){
					$IrTies=stripos($_SESSION['TIESIBAS'],"S",0);
					if ($IrTies>0){
						echo '<input type="submit" name="btAdministret" value="Administrēšana">';
					}
				}?>
			
			</div>
			<div id="divPapildInfo">
				<div id="divKomp">
				</div><!--divKomp    -->
				<div id="divVersija">
				</div><!--divVersija    -->
			</div><!--divPapildInfo    -->
		</div><!--divInfo    -->
	</div><!--divGalva    -->	

	<!-- ##################################################################################################################   -->
	<?php if ($autor_ir==2){ //====================  PĒC AUTORIZĀCIJAS  ==================================================?>
	<div id="divDarba"><!--divDarba    -->
		<div id="divFormNavig"><!--divFormNavig    -->
			<span id="fspan2">Pretenzijas veids:</span>
			<div id="divTools">
				<ul>
					<?php // Tools menju ?>
					<li id='mnTools'><a id='<?php if ($_SESSION['PREFIKS']=="KM"){echo 'mnaToolsSel';} else {echo 'mnaTools';} ?>' href="?mTools=mnKM">KM</a></li>
					<li id='mnTools'><a id='<?php if ($_SESSION['PREFIKS']=="EPS"){echo 'mnaToolsSel';} else {echo 'mnaTools';} ?>' href="?mTools=mnEPS">EPS</a></li>
<!-- 					<li id='mnTools'><a id='mnaTools' href="?mTools=mnKM">KM</a></li> -->
<!-- 					<li id='mnTools'><a id='mnaTools' href="?mTools=mnEPS">EPS</a></li> -->

				</ul>	<br>
			</div><!--divTools    -->
		
			<ul>
				<?php // HORIZONTĀLAIS menju ?>
				<li id='mnNavig'><a id='mnaNavig' href="?navig=mnLists">Saraksts</a></li>
				<?php if ($_SESSION['STATUS'] != "LIST" && $_SESSION['STATUS'] != "NEW") { ?>
					<li id='mnNavig'><a id='mnaNavig' href="?navig=mnEdit">Labot</a></li>
				<?php } ?>
				<?php if ($_SESSION['STATUS'] != "NEW") { ?>
					<li id='mnNavig'><a id='mnaNavig' href="?navig=mnNew">Jauns</a></li>
				<?php } ?>
				<?php if ($_SESSION['STATUS'] != "LIST" && $_SESSION['STATUS'] != "NEW") { ?>
					<li id='mnNavig'><a id='mnaNavig' href="?navig=mnDelete">Dzēst</a></li>
				<?php } ?>
				<?php if ($_SESSION['STATUS'] != "LIST" && $_SESSION['STATUS'] != "NEW") { ?>
					<li id='mnNavig'><a id='mnaNavig' href="?navig=mnEvent">Notikumi</a></li>
				<?php } ?>
					
			</ul>	
		</div><!--divFormNavig    -->
		<div id="divForma"><!--divForma    -->
				<div id="divView">
				<?php 
					if(isset($_SESSION['FORMA'])) {
						// Pretenzijas forma
						msg("L:303=".$_SESSION['FORMA']);
						include $_SESSION['FORMA'];
					}
				?>
			</div><!--divView    -->	
		</div><!--divForma    -->
	</div><!--divDarba    -->
	<?php } ?>				
</div><!--divMaster    -->				
</form>	
</body>
</html>