<div ID="divLogin">
	<form method="post">
		<?php 
		if (isset($_POST['btniziet'])) {
			msg("19. Poga nospiesta");
			unset($_SESSION['AGENTS']);	
			//echo $_SESSION['AGENTS'];
		}		
		if (isset($_SESSION['AGENTS'])) {
			$user = $_SESSION['AGENTS'];
		} else {
			$user = "";
		}
		//echo ($user)."    ";
		msg("20. Users ir ".$user);
		echo $user.'   <input type="submit" name="btniziet" value="Iziet">';
		?>
	</form>
</div> 