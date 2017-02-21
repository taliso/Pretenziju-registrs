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

//###################  APSTIPRINU  ####################################################date("Y-m-d")
  if (isset($_POST['addNewEvent'])){
  	$_SESSION['STATUS']="EVENTS";
msg("pret_id=".$_SESSION['ID_PRET']);
  	$id_pret=$_SESSION['ID_PRET'];
  	$pret_id=$_SESSION['PRET_ID'];
  	$pasut_nr=$_SESSION['PASUT_NR'];
  	$event_id=$_SESSION['NOTIKUMU_SK']+1;
  	$teh_cilv=$_POST['teh_cilv'];
  	$lab_cilv=$_POST['lab_cilv'];
  	$log_cilv=$_POST['log_cilv'];
  	$uzd_teh=$_POST['uzd_teh'];
  	$uzd_lab=$_POST['uzd_lab'];
  	$uzd_log=$_POST['uzd_log'];
  	$event_date=$_POST['event_date'];
  	
  	$sql = "INSERT INTO notikumi SET ";
  	$sql=$sql."
	  	id_pret=:id_pret ,
	  	pret_id=:pret_id ,
	  	pasut_nr=:pasut_nr ,
	  	event_id=:event_id ,
  		teh_cilv=:teh_cilv ,
		lab_cilv=:lab_cilv ,
  		log_cilv=:log_cilv ,
		uzd_teh=:uzd_teh ,
		uzd_lab=:uzd_lab ,
		uzd_log=:uzd_log ,
		event_date=:event_date ,
   		lemums=:lemums ,
	  	izdevumi=:izdevumi ,
	  	pedejais=:pedejais ,
	  	izpildes_dat=:izpildes_dat ,
	  	apraksts=:apraksts ,
	  	file_doc=:file_doc";
 
  	$q = $db->prepare($sql);
  	 
  	$data = array(
  			':id_pret'=>$id_pret,
  			':pret_id'=>$pret_id,
  			':pasut_nr'=>$pasut_nr,
  			':event_id'=>$event_id,
  			':teh_cilv'=>$teh_cilv,
  			':lab_cilv'=>$lab_cilv,
  			':log_cilv'=>$log_cilv,
   			':uzd_teh'=>$uzd_teh,
  			':uzd_lab'=>$uzd_lab,
  			':uzd_log'=>$uzd_log,
  			':event_date'=>$event_date,
  			':lemums'=>$lemums,
  			':izdevumi'=>$izdevumi,
  			':pedejais'=>$pedejais,
  			':izpildes_dat'=>$izpildes_dat,
  			':apraksts'=>$apraksts,
  			':file_doc'=>$file_doc);
  	$q->execute($data);
  }

//###################    ATCELT    ####################################################
  if (isset($_POST['NewEventCancel'])) {
  	$_SESSION['STATUS']="EVENTS";
  }
  ?>
  
 <div>
 	<div id="dvtitle">
 		<span id="spantitle"> Jauns notikums </span><br>
 	</div>	
 		<table style="width:100%;">
 			<tr>
 				<td><input type="checkbox" name="teh_dala" value="1"> Tehniskā daļa</td>
 				<td> 	
 				</td>
 				<td>
 					<select name="teh_cilv" style="width: 80%;">
			         <?php 	foreach($list_teh as $pers){
			            		echo "<option value='$pers'>$pers</option>";
			         } ?>
 					</select>
 				</td>
 				<td>Uzdevums:<input type="text" name="uzd_teh" value="" style="width: 80%;"></td>
 			</tr>
 			<tr>
 				<td><input type="checkbox" name="laboratorija" value="1"> Laboratorija</td>
 				<td> 	
 				</td>
 				<td>
 					<select name="lab_cilv" style="width: 80%;">
			         <?php 	foreach($list_lab as $pers){
			            		echo "<option value='$pers'>$pers</option>";
			            	} ?>
 					</select>
 				</td>
 				<td>Uzdevums:<input type="text" name="uzd_lab" value="" style="width: 80%;"></td>
 			</tr>
 			<tr>
 				<td><input type="checkbox" name="logistika" value="1"> Loģistika</td>
 				<td> 	
 				</td>
 				<td>
 					<select name="log_cilv" style="width: 80%;">
			         <?php 	foreach($list_log as $pers){
			            		echo "<option value='$pers'>$pers</option>";
			            	} ?>
 					</select>
 				</td>
 				<td>Uzdevums:<input type="text" name="uzd_log" value="" style="width: 80%;"></td>
 			</tr>
			<tr>
 				<td>Datums:<input type="text" name="event_date" value=".<?php echo date("Y-m-d"); ?>." style="width: 80%;"></td>
 				<td></td>
 				<td></td>
 				<td><input type="submit" name="NewEventSave" value="Apstiprināt"><input type="submit" name="NewEventCancel" value="Atcelt"></td>
 			</tr>
 		</table> 
 
</div>











