<?php
if (isset($_POST['autoriz_submit'])) {
	
	$user = $_POST['user'];
  	$psw = $_POST['psw'];
  	msg("Izpilda autorizāciju  |".$user."|");
  	$sql = "SELECT agents, username, pasword FROM kl_agenti WHERE username='$user' AND pasword='$psw';";
	$q = $db->query($sql);
	$r = $q->fetch();
//	var_dump($r);
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

//	var_dump($r);
//header( 'refresh: 1; url=http://127.0.0.1/Pretenziju-registrs/index_v2.php');
// $page = $_SERVER['PHP_SELF'];
// $sec = "0";
// header("Refresh: $sec; url=$page");
}
if (isset($_SESSION['AGENTS'])) {$agentsir = 1;} else {$agentsir = 0;}
?>

<?php if(isset($_SESSION['AGENTS'])): ?>

<!-- <form action="#" method="post">
	<input type="submit" name="logout" value="Ieiet">
</form> -->
<?php else: ?>
<form action="#" method="post">
 	<table>
	  <tr>  <!-- 1 -->
		<td >Lietotāja vārds:</td>
		<td ><input type="text" name="user" value="" size="20"></td>
		<td >   </td>
	  </tr>
	  <tr>  <!--2  -->
		<td >Parole:</td>
		<td ><input type="password" name="psw" value="" size="20"></td>
		<td ><input type="submit" name="autoriz_submit" value="Ieiet"></td>
	  </tr>
	 </table>
</form> 
<?php endif; ?>


