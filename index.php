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
$reg_nr = "10003";


// Izgūstam datus no kl_agenti
$sql = "SELECT agenta_id, agents FROM kl_agenti";
$q = $db->query($sql);
//ielasa izgūtos datus asociatīvajā masīvā
//masīva elementu atslēgas ir DB tabulas kolonnu nosaukumi
//piem., $data['username']
$fixdat=strtotime("today");
while($r = $q->fetch(PDO::FETCH_ASSOC)){
    $agent_list[]=$r;
	}
	
?>

<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
 <link rel="stylesheet" type="text/css" href="pretenz.css" />
  <title>Pretenzijas</title>
</head>
<body>

 <div id="virsraksts-konteineris" style="background-color:black;color:white;padding:3px;height: 75px">
<!--  	 <img id="logo" src="TENAX_TENAPORS_logo.jpg" alt="Tenapors logo" style="width:30px;height:20px;"> -->
	 	<div id="galvenais-virsraksts"><h3>PRETENZIJU REĢISTRS</h3><h3>Sendvičpaneļi, palīgdetaļas un montāžas materiāli</h3></div>
		<div id="sub-virsraksts"><h3>Pretenzijas noformēšanas veidlapa</h3>
		<?php if (isset($_SESSION['NIKS'])) {
			echo "SESIJA: " . $_SESSION['NIKS'];
		} else { echo "Nav lietotāja (sesija)";};?>
		</div>

	
 </div>
<?php if(!isset($_SESSION['NIKS'])):
if (isset($_POST['btn1'])) {
	$user = $_POST['user'];
  	$psw = $_POST['psw'];
  	$sql = "SELECT username, pasword FROM kl_agenti WHERE username='$user' AND pasword='$psw';";
	$q = $db->query($sql);
	$r = $q->fetch();
//	var_dump($r);
	if ($r != false) {
		echo "Ir lietotājs";
		
				
		session_regenerate_id();
		$_SESSION['NIKS'] = $user;
		session_write_close();
		
	} else {
		echo "Nav lieotājs";
	}
	//var_dump($r);
} ?>

<form action="#" method="post">
  <!-- Autorizācija ************************************************************* -->
	<table style=float:left;width:20%;>
		<tr>  <!-- 1 -->
			<td>Lietotājs:</td>
			<td><input type="text" name="user" value="" size="20"></td>
			<td></td>
		</tr>	  
		<tr>  <!-- 2 -->
			<td>Parole:</td>
			<td><input type="password" name="psw" value="" size="20"></td>
			<td><input type="submit" name="btn1" value="Ieiet"></td>
		</tr>
	</table>	
  <!-- Autorizācija ************************************************************* -->	
  </form> 
<?php else: ?>

 <!--  Meņjū -->
 <div style="background-color:#98a3d5;padding:1px;">
 
  
	<ul>
		<li><a href="?lapa=veidlapa">Veidlapa</a></li>
		<li><a href="?lapa=autorizacija">Autorizācija</a></li>
	</ul>
 
</div>

<!--  Kļūdu paziņojums -->
 <div style="padding:1px;color:red;">
  Kļūdas paziņojums
</div>
<div>

	<?php	
		if(isset($_GET['lapa'])){
			include($_GET['lapa'].".php");
		} else {
			include("veidlapa.php");
		}
	?>
	
</div>
<?php endif; ?>
  </body>
</html>
