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
		$_SESSION['AGENTS']['VARDS'] = $user;
//		$_SESSION['TEST'] = $r['agents'];
		session_write_close();
		
	} else {
		echo "Nav lieotājs";
	}
//	var_dump($r);
header( 'refresh: 1; url=http://10.0.4.7/tp_pretenz/index_v2.php' );
}

if (isset($_POST['logout'])) {
	unset($_SESSION['TEST']);
}


if (isset($_SESSION['AGENTS']['VARDS'])) {
	echo "SESIJA: " . $_SESSION['AGENTS']['VARDS'];
}


?>

<?php if(isset($_SESSION['AGENTS']['VARDS'])): ?>


<form action="#" method="post">
	<input type="submit" name="logout" value="Ieiet">
</form>
<?php else: ?>
<form action="#" method="post">
	<h4>Lietotāja vārds:</h4><input type="text" name="user" value="" size="20"><br>
	<br>
	<h4>Parole:</h4><input type="password" name="psw" value="" size="20"><br>
	<input type="submit" name="submit" value="Ieiet">
</form> 
<?php endif; ?>

 

