
 
 
<?php
if (isset($_POST['addNewEvent'])) {
	$_SESSION['STATUS']="NEWEVENT";
}
 ?>

 <div id="divEventForm">
	<div id="divEventFormTitle">
	<table style="width:100%;">
		<tr>
			
			<td style="width:13%;">
				<span id="fspan1">Nr. </span> </td>
			
			<td style="width:2%;">
			 </td>
				
			<td style="width:13%;"> 	
				<?php echo $_SESSION['PRET_ID']; ?>  </td>
			
			<td style="width:13%;">
				<span id="fspan1">Sākuma dat.:</span> </td>
			
			<td style="width:2%;">
			</td>
				
			<td style="width:13%;">	
				<?php echo $_SESSION['SAKUMA_DATUMS']; ?>  </td>

			<td style="width:13%;">
				<span id="fspan1">Notikumu sk.:</span> </td>
			
			<td style="width:2%;">
			</td>
				
			<td style="width:13%;">	
				<?php echo $_SESSION['NOTIKUMU_SK']; ?>  </td>

		</tr>	
		<tr>
			
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			
			<td>
				<?php if ($_SESSION['LOMA']=="Q") {	?>
					<input type="submit" name="addNewEvent" value="Jauns notikums">
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
	</div>   <!-- <divEventFormTitle>  -->
	<?php if ($_SESSION['STATUS']=='NEWEVENT') {
		include 'newevent.php';
	}?>
</div>   <!-- <divEventForm>  -->

