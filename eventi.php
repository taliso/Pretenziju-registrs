
 
 
<?php
if (isset($_POST['addNewEvent'])) {
	$_SESSION['STATUS']="NEWEVENT";
}
 ?>

 <div id="divEventForm">
	<div id="divEventFormTitle">
	<span id= "spantitle">Pretenzijas risinājums</span>
	</div>   <!-- <divEventFormTitle>  -->
	<table style="width:100%;">
		<tr>
			
			<td style="width:25%;">
				<span id="evspan1">Nr.</span><span id="evspan2"><?php echo $_SESSION['PRET_ID']; ?></span></td>
			
			
			<td style="width:45%;">
				<span id="evspan1">Sākuma dat.:</span><span id="evspan2"> <?php echo $_SESSION['SAKUMA_DATUMS']; ?> </span></td>
			

			<td style="width:15%;">
				<span id="evspan1">Notikumu sk.:</span><?php echo $_SESSION['NOTIKUMU_SK']; ?>  </td>
			
			<td style="width:5%;">
			</td>

		</tr>	
		<tr>
			
			<td>
			</td>
			<td>
				<span id="evspan1">Beigu dat.:</span><span id="evspan2"> <?php echo $_SESSION['BEIGU_DAT']; ?> </span>
			</td>
			<td>
				<span id="evspan1">Izdevumi:</span><span id="evspan2"> <?php echo $_SESSION['IZDEVUMI']; ?> </span>
			</td>
			<td>
			</td>
			<td>
			</td>
			
			<td>
				<?php if ($_SESSION['LOMA']=="Q") {	?>
<!-- 					<input type="submit" name="addNewEvent" value="Jauns notikums"> -->
					<?php 
				}
						?>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
				

		</tr>			
	</table>	

	<?php if ($_SESSION['STATUS']=='NEWEVENT') {
		include 'newevent.php';
	}?>
</div>   <!-- <divEventForm>  -->

