
<?php $sql = 'SELECT * FROM pretenzijas where pret_id="'.$_SESSION['PRET_ID'].'"';
   	 $q = $db->query($sql);
   	 $r = $q->fetch(PDO::FETCH_ASSOC);
   	 
	$sql ="SELECT * from tp_pretenzijas.notikumi where id_pret='".$_SESSION['PRET_ID']."'";
	$q = $db->query($sql);
	$n_sk=0;
	while($n = $q->fetch(PDO::FETCH_ASSOC)){
		$notik_list[]=$n;
		$n_sk=$n_sk+1;
	}
	
   	 ?>

<!--  	$notikumu_sk -->
<!--  	$atbildigais -->
<!--  	$beigu_dat -->
<!--  	$budzets -->
<!--  	$grupa -->
<?php 

//var_dump($teh_list);


?>

<div id='divEventForm'>
<div id='divEventHead'> 
	<span id="fspan3">   Notikumi pēc pretenzijas reģistrācijas </span>

</div>
	<table style="width: 100%;">
		<tr> 
		    <td class="hapraksts1"><span id="fspan1">No:</span></td>
		    <td class="hinfo1"><span id="fspan2"> <?php echo $r['pret_id']  ?> </span></td>
		    <td class="hapraksts1"><span id="fspan1">Pasūtījuma Nr: </span></td>
		    <td class="hapraksts1"><span id="fspan2"><?php echo $_SESSION['PASUT_NR']; ?></span></td>
		    <td class="hapraksts2">Reģ.dat.:</td>
		    <td class="hinfo1"><?php echo $r['registr_datums'] ?></td>
		    
		</tr> 
	</table>
	
	<table>
		<tr> 
		    <td class="apraksts1">Atbildīgais:</td>
		    <td class="info1">
			    <select id="selekts" name="itd">
				    <?php	foreach($teh_list as $teh){
				    			$itd=$teh['agents'];
		    					 echo "<option value='$itd'>$itd</option>"; 
				    		}
				    ?>
			    </select>					 
		    </td>
		    <td class="apraksts1">Sākts:</td>
		    <td class="info1"><?php echo $r['sakuma_datums'] ?></td>
		    <td class="apraksts1">Notikumu sk.:</td>
		    <td class="info1"><?php echo $n_sk ?></td>
		 </tr>
	</table>	    
	<table>	    
		<tr> 
			<td class="apraksts2">Aktuālais uzdevums:</td>
			<td class="info2"><?php echo $r['akt_uzdevums'] ?></td>
			<td class="apraksts2">Uzdevumu izpilda:</td>
			<td class="info2"><?php echo $r['uzd_izpilda'] ?></td>
		</tr>	
		<tr> 
		    <td class="apraksts2">Termiņš:</td>
		    <td class="info2"><?php echo $r['uzd_termins'] ?></td>
		    <?php if ($_SESSION['STATUS']=="NEW") { ?>
			    <td class="info2"><input type="submit" name="submitEvents" value="Saglabāt"></td>
			<?php } else { ?>
		    	<td class="info2"><input type="submit" name="addNewEvent" value="Pievienot notikumu"></td>
		    <?php } ?>
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
 