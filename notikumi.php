
<?php 
$event_npk=0;
if (isset($_POST['addNewEvent'])) {
	if (isset($notik_list)){
		$event_npk=$notik_list[$n_sk-1]['event_npk']+1;
	} else {
		$event_npk=1;
	}
	$_SESSION['STATUS'] = "ADDEVENTS";
}// addNewEvent
if (isset($_POST['submitEvents'])) {

	$sql ="UPDATE pretenzijas SET atbildigais='".$_POST['itd']."',sakuma_datums='".date("Y-m-d")."' where ID='".$_SESSION['ID_PRET']."'";
	//echo $sql;
	$q  = $db->query($sql);

}
if (isset($_POST['addEvent'])) {
	if (strlen($_POST['termins'])=="0") {
		$termins="0000-00-00";
	} else {
		$termins=$_POST['termins'];
	}
	if (strlen($_POST['termins'])=="0") {
		$termins="0000-00-00";
	} else {
		$termins=$_POST['termins'];
	}
	if (strlen($_POST['izpildes_dat'])=="0") {
		$izpildes_dat="0000-00-00";
	} else {
		$izpildes_dat=$_POST['termins'];
	}

	$lauki_notikumi = array(
			'id_pret' =>$_SESSION['ID_PRET'],
			'pret_id'=>$_SESSION['PRET_ID'],
			'pasut_nr'=>$_SESSION['PASUT_NR'],
			'event_id'=>$_SESSION['PRET_ID']."-".$event_npk,
			'event_npk'=>$event_npk,
			'persona'=>$_POST['persona'],
			'uzdevums'=>$_POST['uzdevums'],
			'reg_time'=>date("Y-m-d"),
			'termins'=>$termins,
			'lemums'=>"",
			'izdevumi'=>0,
			'pedejais'=>0,
			'izpildes_dat'=>$izpildes_dat,
			'apraksts'=>""

	);
	$notik_list['event_npk']=$event_npk;
	// #########       IEVIETOJAM JAUNU NOTIKUMU     #############################
	$sql="INSERT INTO notikumi SET ";
	foreach($lauki_notikumi as $key => $item){
		$sql=$sql.$key."='".$item."',";
	}
	$sql=substr($sql,0,strlen($sql)-1);
	$q = $db->query($sql);

	$sql ="UPDATE pretenzijas SET akt_uzdevums='".$lauki_notikumi['uzdevums']."',uzd_termins='".$lauki_notikumi['termins']."',uzd_izpilda='".$lauki_notikumi['persona']."' where ID='".$_SESSION['ID_PRET']."'";
	//echo $sql;
	$q  = $db->query($sql);

}// addEvent-

// #########   DATI PAR KONKRETO PRETENZIJU  ##############################################
 $sql = 'SELECT * FROM pretenzijas where pret_id="'.$_SESSION['PRET_ID'].'"';
    	 $q = $db->query($sql);
    	 $r = $q->fetch(PDO::FETCH_ASSOC);
//var_dump($r);
// #########   VEIDOJAM NOTIKUMU SARAKSTU  ############################################## 
	$sql ="SELECT * from notikumi where id_pret='".$_SESSION['ID_PRET']."'";
	$q  = $db->query($sql);
	$n_sk=0;
	while($n = $q->fetch(PDO::FETCH_ASSOC)){
		$notik_list[]=$n;
		$n_sk=$n_sk+1;
	}
	$event_npk=$n_sk;
	//var_dump($notik_list);
// #########   POGA - PIEVIENOT NOTIKUMU -atveram jauna notikuma logu  ########################################

// #########   POGA - SAGLABAT - saglabajam jauno notikumu  #############################
msg('L 78: atbild='.$r['atbildigais']);
if (strlen($r['atbildigais'])==0){
	$_SESSION['STATUS'] = "NEWEVENTS";
	msg('L 81: atbild='.$r['atbildigais']);
}

?>

<div id='divEventForm'><!--divEventForm    -->
	<div id='divEventHead'><!--divEventHead    --> 
		<span id="fspan3">   Notikumi pēc pretenzijas reģistrācijas </span>
		<table style="width: 100%;">
		<tr> 
		    <td class="hapraksts1"><span id="fspan1">Pretenzija No:</span></td>
		    <td class="hinfo1"><span id="fspan2"> <?php echo $r['pret_id']  ?> </span></td>
		    <td class="hapraksts1"><span id="fspan1">Pasūtījuma Nr: </span></td>
		    <td class="hapraksts1"><span id="fspan2"><?php echo $_SESSION['PASUT_NR']; ?></span></td>
		    <td class="hapraksts1"><span id="fspan1">Reģ.dat.:</span></td>
		    <td class="hinfo1"><span id="fspan2"><?php echo $r['registr_datums'] ?></span></td>
		</tr> 
	</table>
	
	</div><!--divEventHead    -->
	
	<table>
		<tr> 
		    <td class="apraksts1">Atbildīgais:</td>
		    <td class="info1">
		<?php    if ($_SESSION['STATUS'] == "NEWEVENTS") {?>
			    <select id="selekts" name="itd">
			    	<?php
			    		$itd=" --Izvēlaties atbildīgo --";
			    		echo "<option value='$itd'>$itd</option>";
				    	foreach($teh_list as $teh){
				    			$itd=$teh['agents'];
		    					 echo "<option value='$itd'>$itd</option>"; 
				    		}
				    ?>
			    </select>
		 <?php } else { ?>
		 		<?php echo $r['atbildigais'] ?>
		 <?php } ?>
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
		    <?php if ($_SESSION['STATUS']=="NEWEVENTS") { ?>
			    <td class="info2"><input type="submit" name="submitEvents" value="Saglabāt"></td>
			<?php } else {?>
		    	<td class="info2"><input type="submit" name="addNewEvent" value="Pievienot notikumu">
		    						<input type="submit" name="allEvent" value="Visi notikumi">
		    	</td>
		    <?php }?>
		</tr> 
	
	</table>
<?php	
if ($_SESSION['STATUS'] == "ADDEVENTS"){
	include "notikums.php";
}
	?> 
</div><!--divEventForm    -->
