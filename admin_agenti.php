<?php 

include "config.php";
include "funkcijas.php";
include "konekcija.php";
$cilv = 'x';
		$sql ="SELECT * FROM kl_agenti";
		$q = $db->query($sql);
		$lietotaji="";
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
			$lietotaji[]=$r;
		}

	//var_dump($lietotaji);
 if (isset($_GET['cilv'])){
  	 	$cilv=$_GET['cilv'];
		echo $cilv;
 } 
	?>
	
<html>
	<head>
		 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		 <link rel="stylesheet" type="text/css" href="pretenz.css" />
	</head>

	<div>
	
		<table>
			<tr>
				<td class="tcol3" style="background-color: indigo;color: ivory;">Vārds, uzvārds
				</td>
				<td class="tcol3" style="background-color: indigo;color: ivory;">Lietotājs
				</td>
				<td class="tcol3" style="background-color: indigo;color: ivory;">Parole
				</td>
				<td class="tcol1" style="background-color: indigo;color: ivory;">Loma
				</td>
				<td class="tcol1" style="background-color: indigo;color: ivory;">Struktūra
				</td>
				<td class="tcol3" style="background-color: indigo;color: ivory;">E-pasts
				</td>
				<td class="tcol1" style="background-color: indigo;color: ivory;">Aktīvs
				</td>

			</tr>
	
<?php 
	 foreach ($lietotaji as $persona) {?>
		
			<tr>
				<td class="tcol3">
					
					<?php 
						echo '<a href="?cilv='.$persona['agents'].'" style= "color: black;">'.$persona['agents']; ?>
				</td>
				<td class="tcol3"><?php echo $persona['username'];?>
				</td>
				<td class="tcol3"><?php echo $persona['pasword'];?>
				</td>
				<td class="tcol1"><?php echo $persona['loma'];?>
				</td>
				<td class="tcol1"><?php echo $persona['struktura_kods'];?>
				</td>
				<td class="tcol3"><?php echo $persona['epasts'];?>
				</td>
				<td class="tcol1">
					<?php StatCheckBox('aktivs',$persona['aktivs'],'','',' disabled') ;
					//echo $persona['aktivs'];
					?>
				</td>

			</tr>		

		<?php 
			}
			?>
	</table>		
	<?php if ($cilv == 'x'){ } else {	
		echo $cilv ?>
		<table>
			<tr>
				<td class="tcol3" style="background-color: ivory;color: indigo;">
					<input type="text" name="agents" value="<?php echo $persona['agents'] ?>" >
				</td>
				<td class="tcol3" style="background-color: ivory;color: indigo;">
					<input type="text" name="username" value="<?php echo $persona['username'] ?>" >
				</td>
				<td class="tcol3" style="background-color: ivory;color: indigo;">
					<input type="text" name="pasword" value="<?php echo $persona['pasword'] ?>" >
				</td>
				<td class="tcol1" style="background-color: ivory;color: indigo;">
					<input type="text" name="loma" value="<?php echo $persona['loma'] ?>" >
				</td>
				<td class="tcol1" style="background-color: ivory;color: indigo;">
					<input type="text" name="struktura_kods" value="<?php echo $persona['struktura_kods'] ?>" >
				</td>
				<td class="tcol3" style="background-color: ivory;color: indigo;">
					<input type="text" name="epasts" value="<?php echo $persona['epasts'] ?>" >
				</td>
				<td class="tcol1" style="background-color: ivory;color: indigo;">
					<input type="text" name="aktivs" value="<?php echo $persona['aktivs'] ?>" >
				</td>
				<td class="tcol1" style="background-color: ivory;color: indigo;">
					<input type="submit" name="agentEdit" value="Saglabāt">
				</td>

			</tr>
		</table>
	<?php }	?>
	
 

	</div>	
</html>