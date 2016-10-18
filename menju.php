
 <!--  Meņjū -->
 <div id="divMenju">
	<ul>
		<li><a href="?lapa=veidlapa">Sendvičpaneļi</a></li>
		<li><a href="?lapa=autorizacija_v2">Autorizācija</a></li>
	</ul>
	<?php
	msg("17. Informācija par loginu");
	include "logininfo.php";?>
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
			msg("18. Iedarbinam veidlapu");
			include("veidlapa.php");
		}
	?>
	
</div>