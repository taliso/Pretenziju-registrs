<?php
$event_sk=0;
$pret_events=array();
$izd_sum=0;
$sql = "SELECT * FROM notikumi where pret_id='".$_SESSION['PRET_ID']."'";
$q = $db->query($sql);
while($r = $q->fetch(PDO::FETCH_ASSOC)){
	$pret_events[]=$r;
}
$event_sk=count($pret_events);
$izd_sum=0;
foreach ($pret_events as $one_event){
	$izd_sum=$izd_sum + $one_event['izdevumi'];
}
$_SESSION['NOTIKUMU_SK']=$event_sk;
$_SESSION['IZDEVUMI']=$izd_sum;

//var_dump($pret_events);

?>



<div id="divEventVis">
	<table style="width:100%;">
		<tr> 
			<td style="width:3%; color:blue;"><a id='mnaTasks' href="?tasknr=<?php echo $task_nr; ?>"> Nr.<?php echo $task_nr; ?></a></td>
			<td style="width:7%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['avots'] ?></span></td>
			<td style="width:7%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['identifikators'] ?></span></td>
			<td style="width:8%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['datums'] ?></span></td>
			<td style="width:35%;"><span id="evspan1" style="width:100%;text-align:left;"><?php echo $OneTask['uzdevums'] ?></span></td>
			<td style="width:8%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['termins'] ?></span></td>
			<td style="width:1%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['status'] ?></span></td>
		</tr>
	</table>
        
        <div class="visible"> 						<!--  visible -->
          	<table>
          		<tr> 
          			<td>
          				<span id="evspan1">Datums:</span>
          				
          			</td>
          			<td>
          				<span id="evspan2"><?php echo $ev_dat; ?></span>
          				
          			</td>

          			<td>
          				<span id="evspan1">Uzdevumi nosūtīti:</span>
          			</td>
          			<td>
          				<span id="evspan2"> <?php echo $cilv; ?> </span>
          				
          			</td>
          			
          		</tr> 
          	</table>
        </div>	<!--  class="visible" --> 
        <div class="invisible" id="container-<?php echo $one_event['event_id'] ?>-invisible" style="display:none;"> <!--  invisible -->
	        
	        <table>
	           	<tr> <!-- R # 1. -->
	           		<td style="width:5%;"><span id="evspan1" style="width:100%;text-align:center;">Struktūra</span></td>
	 				<td style="width:7%;"><span id="evspan1" style="width:100%;text-align:center;">Izpildītāji</span></td>
	 				<td style="width:35%;"><span id="evspan1" style="width:100%;text-align:center;">Uzdevums</span></td>
	 				<td style="width:8%;"><span id="evspan1" style="width:100%;text-align:center;">Atbild.dat.</span></td>
	 				<td style="width:35%;"><span id="evspan1" style="width:100%;text-align:center;">Atbilde</span></td>
	 				<td style="width:5%;"><span id="evspan1" style="width:100%;text-align:center;">Izdevumi</span></td>
	 			</tr>
	        
	        	<?php if (strlen($one_event['teh_cilv'])>1) { ?>
	        	<tr> <!-- R #2. -->
	 				<td><span id="evspan1"> Tehniskā daļa:</span></td>
	 				<td><span id="evspan2"><?php echo $one_event['teh_cilv']; ?></span></td>
	 				<td><span id="evspan2"> <?php echo $one_event['uzd_teh']; ?></span></td>
	 				<td><span id="evspan2"> <?php echo $one_event['dat_teh']; ?></span></td>
	 				<td><span id="evspan2"> <?php echo $one_event['teh_atbild']; ?></span></td>
	 				<td><span id="evspan2"> <?php echo $one_event['teh_izdev']; ?></span></td>
	 		 	 </tr>
	 		 	<?php } ?>
	        	<?php if (strlen($one_event['lab_cilv'])>1) { ?>
	        	<tr> <!-- R #2. -->
	 				<td><span id="evspan1"> Laboratorija:</span></td>
	 				<td><span id="evspan2"><?php echo $one_event['lab_cilv']; ?></span></td>
	 				<td><span id="evspan2"> <?php echo $one_event['uzd_lab']; ?></span></td>
	 				<td><span id="evspan2"> <?php echo $one_event['dat_lab']; ?></span></td>
	 				<td><span id="evspan2"> <?php echo $one_event['lab_atbild']; ?></span></td>
	 				<td><span id="evspan2"> <?php echo $one_event['lab_izdev']; ?></span></td>
	 		 	 </tr>
	 		 	<?php } ?>
	        	<?php if (strlen($one_event['log_cilv'])>1) { ?>
	        	<tr> <!-- R #2. -->
	 				<td><span id="evspan1"> Loģistika:</span></td>
	 				<td><span id="evspan2"><?php echo $one_event['log_cilv']; ?></span></td>
	 				<td><span id="evspan2"> <?php echo $one_event['uzd_log']; ?></span></td>
	 				<td><span id="evspan2"> <?php echo $one_event['dat_log']; ?></span></td>
	 				<td><span id="evspan2"> <?php echo $one_event['log_atbild']; ?></span></td>
	 				<td><span id="evspan2"> <?php echo $one_event['log_izdev']; ?></span></td>
	 		 	 </tr>
	 		 	<?php } ?>
	 		 	
	 		</table>
        
        </div> <!--  class="invisible" --> 
</div>

























