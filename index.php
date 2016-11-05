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
$autor_ir = 0;
//*			$agents - Aģents, kurš autorizējies
//*			$tiesibas - aģenta tiesības
//*			$user_ip
//*			$versija
//*			$MainInfo - informācijas teksts
$MainInfo="";
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
 	
  	//*********  IELĀDĒJAM AĢENTU SARAKSTU MASĪVĀ $menju_list ******************************
  	
  	$sql = "SELECT * FROM menju";
  	$q = $db->query($sql);
  	while($r = $q->fetch(PDO::FETCH_ASSOC)){
  		$menju_list[]=$r;
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
											$_SESSION['FORMA'] = -1;
											$_SESSION['FORM_TITLE'] = -1;
											$_SESSION['NAVIG'] = -1;
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
					}
					if(isset($_GET['navig'])){
						$_SESSION['NAVIG']=$_GET['navig'];
					}
					
					if(isset($_SESSION['AGENTS'])){
						
						$lAgents=$_SESSION['AGENTS'];
						$lUsername=$_SESSION['USER'];
						$lTiesibas=$_SESSION['TIESIBAS'];
						$lAgenta_id=$_SESSION['AGENTA_ID'];
						$form=$_SESSION['FORMA'];
						$title=$_SESSION['FORM_TITLE'];
						$autor_ir = 2; 					// Autorizācijas otrais solis - password sakrita
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
				<?php 	if ($autor_ir==2){?>
							
				<?php 	;} else {?>
							Lietotājs:
					<?php	}?>
				</div>
				<div id="divAgents">
					<?php 	if ($autor_ir==2){
								echo( $lAgents);
						 	;} else {?>
								
								<input type="text" name="user" value="" size="10">
					<?php	}?>
					
				</div>
				<div id="divPswTxt">
					<?php 	if ($autor_ir==2){?>
								<input type="submit" name="btIziet" value="Iziet">
					<?php 	;} else {?>
								Parole:
					<?php } ?>
					
				</div>
				<div id="divPswIev">
					<?php 	if ($autor_ir==2){?>
						
					<?php 	;} else {?>
						<input type="password" name="psw" value="" size="10">		
					<?php }?>
					
				
				</div>
				<div id="divIeIz">
					<?php 	if ($autor_ir==2){?>
								
					<?php 	;} else { ?>
								<input type="submit" name="btIeiet" value="Ieiet">
						
					<?php } ?>
				</div>
			</div>
			<div id="divAdmin">
			</div>
										
<?php if ($autor_ir==2){ ?>
										<div id="divPapildInfo">
											<div id="divKomp"></div>
											<div id="divVersija">Ver.2.0.1</div>
										</div>
									</div>
								</div>
							<div id="divMaster">
								<div id="divDialog">
									<div id="divDialText"><?php echo $MainInfo ?></div>
									<div id="divDialJa"></div>
									<div id="divDialNe"></div>
								</div>
								<div id="divBody">
									<div id="divMenu">
										<div id="divMenuTitle">Formas</div>
										<div id="divMenuSar">
										
											<ul>
												<?php foreach($menju_list as $key=>$menju){
														echo '<li><a href="?menu='.$key.'">'.$menju['teksts'].'</a></li>';
												}?>
											</ul>
										</div>
									</div>
									<div id="divDarba">
							<?php 
							//Msg("190: ".$title);
									if (isset($title)){
							//			Msg("192: ".$title);
										echo "<div id='divFormTitle'>".$title."</div>";
									}
									else{
										echo "<div id='divFormTitle'></div>";
									}	
							  ?>
									
									
										<div id="divForma">
											<?php 
												if(isset($form) && $form != -1){
													include $form;
												}
											?>
										</div>
										<div id="divFormNavig">
										<ul>
											<li id='mnNavig'><a id='mnaNavig' href="?navig=mnSave">Saglabāt</a></li>
											<li id='mnNavig'><a id='mnaNavig' href="?navig=mnNew">Jauns</a></li>
											<li id='mnNavig'><a id='mnaNavig' href="?navig=mnList">Saraksts</a></li>
										</ul>	
										</div>
									</div>
									<div id="divStatus"></div>
								</div>
							</div>
<?php } ?>							
</form>
</body>
</html>
