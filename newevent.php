  <?php 
  
  $id_pret="";
  $pret_id="";
  $pasut_nr="";
  $event_id="";
  $teh_dala=0;
  $laboratorija=0;
  $logistika=0;
  $teh_cilv="";
  $lab_cilv="";
  $log_cilv="";
  $uzd_teh="";
  $uzd_lab="";
  $uzd_log="";
  $event_date="0000-00-00";
  $lemums="";
  $izdevumi="";
  $pedejais="";
  $izpildes_dat="0000-00-00";
  $apraksts="";
  $file_doc="";
  $kods="";
  
  $fields='agents';
  $ftabula='kl_agenti';
  $fwhere='struktura_kods="TEH"';
  $sql ='SELECT agents, struktura_kods FROM kl_agenti';
  
  $q = $db->query($sql);
  $list_teh='';
  $list_lab='';
  $list_log='';
  
  while($r = $q->fetch(PDO::FETCH_ASSOC)){
  	if (trim($r['struktura_kods'])=='TEH') {
  		$list_teh[]=$r['agents'];
  	}
  	if (trim($r['struktura_kods'])=='LAB') {
  		$list_lab[]=$r['agents'];
  	}
  	if (trim($r['struktura_kods'])=='LOG') {
  		$list_log[]=$r['agents'];
  	}
  
  }

  ?>
 <div>
 	<div id="dvtitle">
 		<span id="spantitle"> Jauns notikums </span><br>
 	</div>	
 		<table style="width:100%;">
 		 	<tr> <!-- R # 1. -->
 				<td style="width:10%;">Datums:<input type="text" name="event_date" value="<?php echo date("Y-m-d"); ?>" style="width: 60%;">
 				</td>
 				<td style="width:12%;"><span>Izpildītāji</span></td>
 				<td style="width:20%;"><span>Uzdevums</span></td>
 				<td style="width:10%;"><span>Atbild.dat.</span></td>
 				<td style="width:25%;"><span>Atbilde</span></td>
 			</tr>
 		
 			<tr>  <!-- R # 2. -->
 				<td><input type="checkbox" name="teh_dala" value="1"> Tehniskā daļa</td>
 				<td>
 					<select name="teh_cilv" style="width: 80%;">
			         <?php 	foreach($list_teh as $pers){
			            		echo "<option value='$pers'>$pers</option>";
			         } ?>
 					</select>
 				</td>
 				<td><input type="text" name="uzd_teh" value="" style="width: 80%;"></td>
 				<td>Atbildes datums</td>
 				<td>Atbilde</td>
 			</tr>

 			<tr>  <!-- R # 3. -->
 				<td><input type="checkbox" name="laboratorija" value="1"> Laboratorija</td>
 				<td>
 					<select name="lab_cilv" style="width: 80%;">
			         <?php 	foreach($list_lab as $pers){
			            		echo "<option value='$pers'>$pers</option>";
			            	} ?>
 					</select>
 				</td>
 				<td><input type="text" name="uzd_lab" value="" style="width: 80%;"></td>

 				<td>Atbildes datums</td>
 				<td>Atbilde</td>
 				
 			</tr>
 			<tr>  <!-- R # 4. -->
 				<td><input type="checkbox" name="logistika" value="1"> Loģistika</td>
 				<td>
 					<select name="log_cilv" style="width: 80%;">
			         <?php 	foreach($list_log as $pers){
			            		echo "<option value='$pers'>$pers</option>";
			            	} ?>
 					</select>
 				</td>
 				<td><input type="text" name="uzd_log" value="" style="width: 80%;"></td>
 				<td>Atbildes datums</td>
 				<td>Atbilde</td>
 			</tr>
			<tr>   <!-- R # 5. -->
 				<td></td>
 				<td></td>
 				<td></td>
 				<td><input type="submit" name="NewEventSave" value="Apstiprināt"><input type="submit" name="NewEventCancel" value="Atcelt"></td>
 			</tr>
 		</table> 
 
</div>









