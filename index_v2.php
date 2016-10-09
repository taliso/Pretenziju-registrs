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
$agentsir = 0;  // Vai ir bijusi autorizācija un aģents ir atpazīts


// Izgūstam datus no kl_agenti
$sql = "SELECT agenta_id, agents FROM kl_agenti";
$q = $db->query($sql);
//ielasa izgūtos datus asociatīvajā masīvā
//masīva elementu atslēgas ir DB tabulas kolonnu nosaukumi
//piem., $data['username']

?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
 <link rel="stylesheet" type="text/css" href="pretenz.css" />
  <title>Pretenzijas</title>
</head>
<body>
 <!-- Nemainīgā daļa -->
<div id="divLogo"><img id="logo" src="TENAX_TENAPORS_logo.jpg" alt="Tenapors logo" style="width:50px;height:30px;">
Pretenziju noformēšanas veidlapa</div>
 <!-- Pārbaudam, vai ir autorizacoja  $_SESSION['AGENTS']-->
		<?php if (isset($_SESSION['AGENTS'])) {$agentsir = 1;} else {$agentsir = 0;}?>
<!-- Darbības pēc veiksmīgas autorizācijas -->
<!-- ========================================================================================================= -->
<?php
//msg("Autorizacija ir notikusi");
if ($agentsir==1) {
	include "Menju.php";
	
} else {	
//msg("Sākam autorizāciju");
// Nav veiksmīgas autorizācijas		 -->
// ======================================================================================================= -->
	include "autorizacija_v2.php";
// Pārlādējam lapu



} ?>
		
		
		








  </body>
</html>
