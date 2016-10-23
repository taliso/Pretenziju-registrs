
 <!--  Meņjū -->
 <div id="divMenju">
 
 <?php include "logininfo.php";
 		include "autorizacija_v2.php";
	 ?>
</div>

<!--  Kļūdu paziņojums -->
 <div style="padding:1px;color:red;">
  Kļūdas paziņojums
</div>
<div>

	<?php
	if ($agentsir == 1) {?>
		
		<ul>
			<li><a href="?lapa=admin">Administrēšana</a></li>
			<li><a href="?lapa=veidlapa">Pretenziju reģistrācija</a></li>
		</ul>
		
	<?php	if(isset($_GET['lapa'])){
				include($_GET['lapa'].".php");
			} else {
				msg("18. Iedarbinam veidlapu");
				include("veidlapa.php");
			}
	}
	?>
	
</div>