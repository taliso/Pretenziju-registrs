<?php
$event_sk=0;
$pret_events=array();

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
		</tr>			
	</table>	

	<?php 
	if ($_SESSION['STATUS']=='NEWEVENT') {
		include 'newevent1.php';
	}?>
	
	
	
	
</div>   <!-- <divEventForm>  -->
<?php
foreach ($pret_events as $one_event){?>
<?php 
$fields=" persona, struktura_kods, uzdevums, uzd_datums, atbilde, atbild_datums, file_atbild ";
$ftabula="personas_notikums";
$fwhere=" id_event='".$one_event['ID']."'";

	$evPersonas=sqltoarray($fields,$ftabula,$fwhere,$db)?>
	<div id="divEventForm"> 
		<?php 
		include 'event_view1.php'; ?>
	</div>
<?php } ?>

