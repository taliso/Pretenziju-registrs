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
	  	
	  	while($r = $q->fetch(PDO::FETCH_ASSOC)){
	  		$agent_list[]=$r;
	  	}
	  	
		$rows=count($agent_list);
		
		print "Rindas: ".$rows;
		
		$kols=count($agent_list[0]);

		print_r("Kolonas:".$kols);
		for ($row=0;$row<$rows;$row++){
			print $row;
			for ($kol=0;$kol<$kols;$kol++){
				print $kol;
				print $agent_list[$row][$kol];
			}
		}
		
	?>
			
</body>			
			
		