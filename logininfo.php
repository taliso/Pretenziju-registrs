<div ID="divLogin">
	<form>
		<?php 
		if (isset($_POST['btniziet'])) {
				unset($_SESSION['AGENTS']);	
				echo $_SESSION['AGENTS'];
		}		
			$user = $_SESSION['AGENTS'];
			echo ($user)."    ";
			echo '<input type="submit" name="btniziet" value="Iziet">';
		
		?>
	</form>
</div>