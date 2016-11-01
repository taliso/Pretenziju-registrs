<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "config.php";
include "funkcijas.php";
include "konekcija.php";

// ***************************************************************************
//*	Mainigie:
//* 		$autor_ir - false/true - ir vai nav notikusi veiksmīga autorizācija
//*			$agents - Aģents, kurš autorizējies
//*			$tiesibas - aģenta tiesības
//*			$user_ip
//*			$versija
//*
$autor_ir="";
$agents="";
$tiesibas="";
$user_ip="";
$versija="";
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
  	<?php $sql = "SELECT agenta_id,agents, username, pasword, tiesibas FROM kl_agenti";
  	$q = $db->query($sql);
//	$masAgents = $q->fetch();
	$result = $q->setFetchMode(PDO::FETCH_ASSOC);
	if (isset($_SESSION['AGENTS'])) {
		$autor_ir = 1;
		$agents=$_SESSION['AGENTS'];
		msg("Agents ir: ".$agents);
	} else {
		$autor_ir = 0;
		$agents="";
	}
	
	if (isset($_POST['btIeiet'])) {
		$agents = $_POST['user'];
		$psw = $_POST['psw'];
		msg("Izpilda autorizāciju  |".$agents."|");
		var_dump($masAgents);
		for ($k = 1; $k = 10; $k++) {
			msg($masAgents[AGENTS]);
			msg("xxx".$magents);
			if ($magents==user){
				
			}
		}
		
		if ($r != false) {
			msg("Lietotājs atrasts");
		
			session_regenerate_id();
			$_SESSION['AGENTS'] = $user;
			msg("AGENTS: " . $_SESSION['AGENTS']);
			//		$_SESSION['TEST'] = $r['agents'];
			session_write_close();
		
		} else {
			echo "Nav lietotājs";
			msg("Nav lietotājs");
		}
		
		
		
		
	}
?>
<form action="#" method="post">
	<div id="divGalva">
		<div id="divLogo">
			<div id="divLogo">
				<img id="logo" src="TENAX_TENAPORS_logo.jpg" alt="Tenapors logo" style="width:101px;height:56px;margin:10px">
			</div>
		</div>
		<div id="divTitle">
			<h1>Pretenziju reģistrācijas sistēma</h1>
		</div>
		<div id="divInfo">
			<div id="divLoginInfo">
				<div id="divLUser">
				<?php 	if ($autor_ir==0){?>
							Lietotājs:
				<?php 	;} else {
							
						}?>
				</div>
				<div id="divAgents">
					<?php 	if ($autor_ir==0){?>
								<input type="text" name="user" value="" size="15">
					<?php 	;} else {
								echo( $agents);
						}?>
					
				</div>
				<div id="divPswTxt">
					<?php 	if ($autor_ir==0){?>
						Parole:			
					<?php 	;} else {
								
					}?>
					
				</div>
				<div id="divPswIev">
					<?php 	if ($autor_ir==0){?>
						<input type="password" name="psw" value="" size="15">
					<?php 	;} else {
								
					}?>
					
				
				</div>
				<div id="divIeIz">
					<?php 	if ($autor_ir==0){?>
						<input type="submit" name="btIeiet" value="Ieiet">
					<?php 	;} else { ?>
						<input type="submit" name="btIziet" value="Iziet">
					<?php } ?>
				</div>
			</div>
			<div id="divAdmin">
			</div>
			<div id="divPapildInfo">
				<div id="divKomp"></div>
				<div id="divVersija">Ver.2.0.1</div>
			</div>
		</div>
	</div>
<div id="divMaster">
	<div id="divDialog">
		<div id="divDialText"></div>
		<div id="divDialJa"></div>
		<div id="divDialNe"></div>
	</div>
	<div id="divBody">
		<div id="divMenu">
			<div id="divMenuTitle"></div>
			<div id="divMenuSar"></div>
		</div>
		<div id="divDarba">
			<div id="divFormTitle"></div>
			<div id="divForma"></div>
			<div id="divFormNavig"></div>
		
		</div>
		<div id="divStatus"></div>
	</div>
</div>
</form>
</body>
</html>
