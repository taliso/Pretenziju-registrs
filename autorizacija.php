<?php
if (isset($_POST['submit'])) {
	$user = $_POST['user'];
  	$psw = $_POST['psw'];
  	$sql = "SELECT username, pasword FROM kl_agenti WHERE username='$user' AND pasword='$psw';";
	$q = $db->query($sql);
	$r = $q->fetch();
	var_dump($r);
	if ($r != false) {
		echo "Ir lietotājs";
		
				
		session_regenerate_id();
		$_SESSION['TEST'] = $user;
		session_write_close();
		
	} else {
		echo "Nav lieotājs";
	}
	//var_dump($r);
}

if (isset($_POST['logout'])) {
	unset($_SESSION['TEST']);
}


if (isset($_SESSION['TEST'])) {
	echo "SESIJA: " . $_SESSION['TEST'];
}


?>

<?php if(isset($_SESSION['TEST'])): ?>


<form action="#" method="post">
	<input type="submit" name="logout" value="Ieiet">
</form>
<?php else: ?>
<form action="#" method="post">
	Lietotāja vārds:<input type="text" name="user" value="" size="20"><br>
	Parole:<input type="password" name="psw" value="" size="20"><br>
	<input type="submit" name="submit" value="Ieiet">
</form> 
<?php endif; ?>

 

