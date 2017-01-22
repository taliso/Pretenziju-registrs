
<?php $sql = 'SELECT * FROM pretenzijas where pret_id="'.$_SESSION['PRET_ID'].'"';
   	 $q = $db->query($sql);
   	 $r = $q->fetch(PDO::FETCH_ASSOC);
   	 
//    	 $sql ="SELECT count(id_pret) as skaits from tp_pretenzijas.notikumi where id_pret='".$_SESSION['PRET_ID']."'";
//    	 $q = $db->query($sql);
//    	 $r = $q->fetch(PDO::FETCH_ASSOC);
//    	 $notikumu_sk=$r['skaits'];
   	  
   	 ?>

<!--  	$notikumu_sk -->
<!--  	$atbildigais -->
<!--  	$beigu_dat -->
<!--  	$budzets -->
<!--  	$grupa -->
<?php 



?>

<div id='divEventForm'>
<div id='divEventHead'> 
	<span id="fspan3">   Notikumi pēc pretenzijas reģistrācijas </span>

</div>
	<table style="width: 100%;">
		<tr> 
		    <td class="hapraksts1"><span id="fspan1">No:</span></td>
		    <td class="hinfo1"><span id="fspan2"> <?php echo $r['pret_id']  ?> </span></td>
		    <td class="hapraksts1"></span></td>
		    <td class="hapraksts2">Reģ.dat.:</td>
		    <td class="hinfo2"><?php echo $r['registr_datums'] ?></td>
	<?php msg("Reg.dat.=".$r['registr_datums']); ?>	    
		    
		</tr> 
		<tr> 
		    <td class="hapraksts1">Pasūt.Nr:</td>
		    <td class="hinfo1"><?php echo $r['pasutijuma_nr'] ?></td>
		    <td class="hapraksts1"></span></td>
		    <td class="hapraksts2">Aģents:</td>
		    <td class="hinfo2"><?php echo $_SESSION['AGENTS'] ?></td>
		</tr> 
		<tr> 
		    <td class="hapraksts1">Atbildīgais:</td>
		    <td class="hinfo1"><?php echo $r['atbildigais'] ?></td>
		    <td class="hapraksts1"></span></td>
		    <td class="hapraksts2">Not.sk.:</td>
		    <td class="hinfo2"><?php echo $r['notikumu_sk'] ?></td>
		</tr> 
		<tr> 
		    <td class="hapraksts1">Atbilde no:</td>
		    <td class="hinfo1"><?php echo $r['aktiv_pers'] ?></td>
		    <td class="hapraksts1"></span></td>
		    <td class="hapraksts2"></td>
		    <td class="hinfo2"><input type="submit" name="addNewEvent" value="Pievienot notikumu"></td>
		</tr> 
	
	</table>
<?php

if($_SESSION['STATUS'] == "NEWEVENT"){?>

		<div id='divEventTitle'> <span id="fspan2">
		    Janus notikums </span>
		</div><br>
		
<!-- 		<table> -->
<!-- 			<tr>  -->
<!-- 			    <td class="evapraksts">Persona</td> -->
<!-- 			    <td class="evapraksts">Uzdevums</td> -->
<!-- 			    <td class="evapraksts">Reģ.dat.:</td> -->
<!-- 			    <td class="evapraksts">Izdevumi</td> -->
<!-- 			    <td class="evapraksts"></td> -->
<!-- 			</tr>  -->
<!-- 			<tr>  -->
<!-- 			    <td class="apraksts"><input type="text" name="evPersona" value="" size="7"></td> -->
<!-- 			    <td class="apraksts"><input type="text" name="evUzdevums" value="" size="7"></td> -->
<!-- 			    <td class="apraksts"><input type="text" name="evRegDat" value="" size="7"></td> -->
<!-- 			    <td class="apraksts"><input type="text" name="evIzdevumi" value="" size="7"></td> -->
<!-- 			    <td class="apraksts"><input type="submit" name="addEvent" value="Pievienot"></td> -->
<!-- 			</tr>  -->
<!-- 		</table> -->
	<?php include "notikums.php";		

	 } ?>
</div>
 