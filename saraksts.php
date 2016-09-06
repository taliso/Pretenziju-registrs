<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
?>


<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="pretenz.css" />
	</head>
<body>

<form form action="saraksts.php" method="post"">
  Pretenziju saraksts<br>
  <?php
	$rindas_lapa=20;
	$kolonu_skaits=4;
	$html_rinda="<table>";
	
	for ($x = 0; $x <= $rindas_lapa-1; $x++){
		$html_rinda=$html_rinda."<tr>";
		for ($y = 0; $y <= $kolonu_skaits-1; $y++){
			$html_rinda=$html_rinda."<td class='npk'>".$x.$y."</td>";
		};
		$html_rinda=$html_rinda."</tr>";
	};
	$html_rinda=$html_rinda."</table>";
	echo $html_rinda
  ?>
  
 </form> 
</body>
</html>
