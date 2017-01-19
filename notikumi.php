
<?php $sql = 'SELECT * FROM pretenzijas where pret_id="'.$_SESSION['PRET_ID'].'"';
   	 $q = $db->query($sql);
   	 $r = $q->fetch(PDO::FETCH_ASSOC);
   	 
   	 
   	 ?>

<div id='divEventForm'>
<table>
	<tr> 
	    <td class="hapraksts1"><span id="fspan1">No:</span></td>
	    <td class="hinfo1"><span id="fspan2"> <?php echo $r['pret_id']  ?> </span></td>
	    <td class="hapraksts2">Reģ.dat.:</td>
	    <td class="hinfo2"><?php echo $r['registr_datums'] ?></td>
<?php msg("Reg.dat.=".$r['registr_datums']); ?>	    
	    
	</tr> 
	<tr> 
	    <td class="hapraksts1">Pasūt.Nr:</td>
	    <td class="hinfo1"><?php echo $r['pasutijuma_nr'] ?></td>
	    <td class="hapraksts2">Aģents:</td>
	    <td class="hinfo2"><?php echo $_SESSION['AGENTS'] ?></td>
	</tr> 
	<tr> 
	    <td class="hapraksts1">Atbildīgais:</td>
	    <td class="hinfo1"><?php echo $r['atbildigais'] ?></td>
	    <td class="hapraksts2">Not.sk.:</td>
	    <td class="hinfo2">xx</td>
	</tr> 
	<tr> 
	    <td class="hapraksts1"></td>
	    <td class="hinfo1"></td>
	    <td class="hapraksts2"></td>
	    <td class="hinfo2"><input type="submit" name="addNewEvent" value="Pievienot notikumu"></td>
	</tr> 

</table>
<?php
msg("STATUS=".$_SESSION['STATUS']);
if($_SESSION['STATUS'] == "NEWEVENT"){
msg("STATUS=".$_SESSION['STATUS']); ?>
		<table>
			<tr> 
			    <td class="evapraksts">Persona</td>
			    <td class="evapraksts">Uzdevums</td>
			    <td class="evapraksts">Reģ.dat.:</td>
			    <td class="evapraksts">Izdevumi</td>
			    <td class="evapraksts"></td>
			</tr> 
			<tr> 
			    <td class="apraksts"><input type="text" name="evPersona" value="" size="7"></td>
			    <td class="apraksts"><input type="text" name="evUzdevums" value="" size="7"></td>
			    <td class="apraksts"><input type="text" name="evRegDat" value="" size="7"></td>
			    <td class="apraksts"><input type="text" name="evIzdevumi" value="" size="7"></td>
			    <td class="apraksts"><input type="submit" name="addEvent" value="Pievienot"></td>
			</tr> 
		</table>
			

	<?php } ?>
</div>
 