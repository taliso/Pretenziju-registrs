<?php
if (isset($_POST['submit'])) {
	$user = $_POST['user'];
  	$psw = $_POST['psw'];
  	$sql = "SELECT agents, username, pasword FROM kl_agenti WHERE username='$user' AND pasword='$psw';";
	$q = $db->query($sql);
	$r = $q->fetch();
//	var_dump($r);
	if ($r != false) {
		session_regenerate_id();
		$_SESSION['AGENTS'] = $user;
//		$_SESSION['TEST'] = $r['agents'];
		session_write_close();
		
	} else {
		echo "Nav lieotājs";
	}
//	var_dump($r);
header( 'refresh: 1; url=http://10.0.4.7/tp_pretenz/index_v2.php' );
}

if (isset($_SESSION['AGENTS'])) {
	echo "SESIJA: " . $_SESSION['AGENTS']['agents'];
}
?>

<?php if(isset($_SESSION['AGENTS'])): ?>

<!-- <form action="#" method="post">
	<input type="submit" name="logout" value="Ieiet">
</form>
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
		<td ><input type="submit" name="submit" value="Ieiet"></td>
	  </tr>
	 </table>
</form> 
<?php endif; ?>


