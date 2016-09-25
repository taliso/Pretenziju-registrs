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

 <div id="virsraksts-konteineris" style="background-color:black;color:white;padding:1px;">
<!--  	 <img id="logo" src="TENAX_TENAPORS_logo.jpg" alt="Tenapors logo" style="width:30px;height:20px;"> -->
	 	<div id="galvenais-virsraksts"><h2>Pretenziju noformēšanas veidlapa</h2></div>
		<div id="sub-virsraksts"><h3>Sendvičpaneļi, palīgdetaļas un montāžas materiāli</h3>
		<?php if (isset($_SESSION['TEST'])) {
			echo "SESIJA: " . $_SESSION['TEST'];
		} else { echo "Nav lietotāja (sesija)";};?>
		</div>

	
 </div>


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
  </body>
</html>
