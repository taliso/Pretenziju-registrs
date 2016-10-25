<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "config.php";
include "funkcijas.php";
include "konekcija.php";
?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
 <link rel="stylesheet" type="text/css" href="pretenz.css" />
  <title>Pretenzijas</title>
</head>
 
<body>

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
				<div id="divLUser"></div>
				<div id="divAgents"></div>
				<div id="divPswTxt"></div>
				<div id="divPswIev"></div>
				<div id="divIeIz"></div>
			</div>
			<div id="divAdmin">
			</div>
			<div id="divPapildInfo">
				<div id="divKomp"></div>
				<div id="divVersija"></div>
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
</body>
</html>
