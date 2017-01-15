<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "config.php";
include "funkcijas.php";
include "konekcija.php";

$datums=datums();
define("MAX_FILE_SIZE",5000000);
$target_dir = "uploads/";

// ***************************************************************************
//*	Mainigie:
//* 		$autor_ir - false/true - ir vai nav notikusi veiksmīga autorizācija
$autor_ir = 0;
//*			$agents - Aģents, kurš autorizējies
//*			$tiesibas - aģenta tiesības
//*			$user_ip
//*			$versija
//*			$MainInfo - informācijas teksts
if (isset($_SESSION['INFO'])){
	$MainInfo=$_SESSION['INFO'];
}
$pref="";
$reg_nr="";
$MainInfo="";
$form="";
// $autor_ir="";
// $agents="";
// $tiesibas="";
// $user_ip="";
// $versija="";
//*
//*	Ieraksti: $_SESION
//*						AGENTS
//*						TIESIBAS
//*						USER_IP
//*						VERSIJA
//*						$
//*						$
//*						$

?>


<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
 <link rel="stylesheet" type="text/css" href="pretenz.css" />
  <title>Pretenzijas</title>
</head>
 
<body>
	<?php 
  	//*********  IELĀDĒJAM AĢENTU SARAKSTU MASĪVĀ $agent_list ******************************
  	
  	$sql = "SELECT * FROM kl_agenti";
  	$q = $db->query($sql);
  	while($r = $q->fetch(PDO::FETCH_ASSOC)){
  		$agent_list[]=$r;
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
   	 
//***   IZVELE NO SARAKSTA  ********************************************************************   	 
   	 if (isset($_GET['pret_id'])){
   	 	$pret_id=$_GET['pret_id'];
   	 	$_SESSION['PRET_ID']=$pret_id;
   	 	$_SESSION['STATUS']="VIEW";
   	 	msg('Get strada='.$pret_id);
   	 	$sql = 'SELECT * FROM pretenzijas where pret_id="'.$pret_id.'"';
   	 	msg('SQl='.$sql);
   	 	$q = $db->query($sql);
   	 	$r = $q->fetch(PDO::FETCH_ASSOC);
  // 	 	var_dump($r);
   	 	$_SESSION['REG_NR'] = $r['reg_nr'];
   	 	$_SESSION['PREFIKS'] = $r['veids'];
   	 	msg('L:92 '.$_SESSION['FORMA']);
   	 	$_SESSION['FORMA']="veidlapa_SP.php";
   	 	msg('L:94 '.$_SESSION['FORMA']);
   	 	$form=$_SESSION['FORMA'];
   	 	//msg('L:93 Forma='.$form);
   	 } else {
   	 	$pret_id="";
   	 }
   	  
  	
if (isset($_POST['btIeiet'])) {

	$user = $_POST['user'];
	$psw = $_POST['psw'];
	
	foreach($agent_list as $row){
		$lUsername=$row['username'];
		$lPsw=$row['pasword'];
		if($lUsername==$_POST['user']){
			$autor_ir = 1;  					// Autorizācijas pirmais solis - username sakrita
			if($lPsw==$_POST['psw']){
				
				$lAgenta_id=$row['agenta_id'];
				$lAgents=$row['agents'];
				$lTiesibas=$row['tiesibas'];

				session_regenerate_id();
				$_SESSION['AGENTS'] = $lAgents;
				$_SESSION['USER'] = $lUsername;
				$_SESSION['TIESIBAS'] = $lTiesibas;
				$_SESSION['AGENTA_ID'] = $lAgenta_id;
				$_SESSION['FORMA'] = 'pret_list.php';
				msg('L:125 '.$_SESSION['FORMA']);
				$_SESSION['FORM_TITLE'] = -1;
				$_SESSION['NAVIG'] = -1;
				$_SESSION['VERSIJA'] = $versija;
				$_SESSION['PRET_ID'] = "";
				$_SESSION['REG_NR'] = "";
				$_SESSION['PREFIKS'] = "";
				$_SESSION['STATUS'] = "LIST"; // 'NEW', 'VIEW','EDIT','LIST'
				
				session_write_close();
				$MainInfo="Autorizācija ir veiksmīga";
			}
		}
	}
}	
if (isset($_POST['btIziet'])) {
	unset($_SESSION['AGENTS']);
}
if(isset($_GET['menu'])){
	$arKey=$_GET['menu'];
	$_SESSION['FORMA']=$menju_list[$arKey]['forma'];
	$_SESSION['FORM_TITLE']=$menju_list[$arKey]['title'];
	$npk = $menju_list[$arKey]['npk'];
	
	$sql = "SELECT * FROM menju where npk=$npk";
	$q = $db->query($sql);
	$r = $q->fetch(PDO::FETCH_ASSOC);
	$reg_nr = $r['reg_nr'];
	$pref = $r['prefiks'];
	$_SESSION['REG_NR'] = $reg_nr;
	$_SESSION['PREFIKS'] = $pref;
}

if(isset($_GET['navig'])){
	$_SESSION['NAVIG']=$_GET['navig'];
	$navig=$_GET['navig'];
	
	if($navig=='mnEdit'){
		$_SESSION['STATUS'] = "EDIT";
	}
	if($navig=='mnNew'){
		
		$_SESSION['STATUS'] = "NEW";
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

	}
	if($navig=='mnDelete'){
		
	}
	if($navig=='mnEvent'){
		
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
						<input type="text" name="user" value="" size="8">
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
		<?php 
				if (isset($title)){
					echo "<div id='divFormTitle'>".$title."  -  Nr. ".$_SESSION['PREFIKS']." - ".$_SESSION['REG_NR']."  [ ".$_SESSION['STATUS']." ] </div>";
				}
				else{
					echo "<div id='divFormTitle'></div>";
				}	
		  ?>
		<div id="divFormNavig"><!--divFormNavig    -->
			<ul>
				<?php // HORIZONTĀLAIS menju ?>
				<li id='mnNavig'><a id='mnaNavig' href="?navig=mnEdit">Labot</a></li>
				<li id='mnNavig'><a id='mnaNavig' href="?navig=mnNew">Jauns</a></li>
				<li id='mnNavig'><a id='mnaNavig' href="?navig=mnDelete">Dzēst</a></li>
				<li id='mnNavig'><a id='mnaNavig' href="?navig=mnEvent">Notikumi</a></li>
			</ul>	
		</div><!--divFormNavig    -->
		<div id="divForma"><!--divForma    -->
			<?php 
				if(isset($_SESSION['FORMA']) && $_SESSION['FORMA'] != -1){
					// Pretenzijas forma
					include $_SESSION['FORMA'];
				}
			?>
		</div><!--divForma    -->
	</div><!--divDarba    -->
	<?php } ?>				
</div><!--divMaster    -->				
</form>	
</body>
</html>