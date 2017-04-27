<?php
$event_sk=0;
$pret_events=array();

$kl_events = sqltoarray(' * ','kl_notikumi','',$db);

$sql = "SELECT * FROM notikumi where id_pret='".$_SESSION['PRET']['ID']."'";
$q = $db->query($sql);
while($r = $q->fetch(PDO::FETCH_ASSOC)){
	$pret_events[]=$r;
}
$event_sk=count($pret_events);
$izd_sum=0;
$event_count=0;
foreach ($pret_events as $one_event){
	$izd_sum=$izd_sum + $one_event['izdevumi'];
	$event_count=$event_count+1;
}
$_SESSION['PRET']['NOTIKUMU_SK']=$event_sk;
$_SESSION['PRET']['IZDEVUMI']=$izd_sum;
?>


 <div id="divEventForm">
	<div id="divEventFormTitle">
		<table style="width:100%;">
			<tr>
				<td>
					<span id= "span_18_gaish">Pretenzijas</span>
					<span id= "span_18_yealow"> <?php echo $_SESSION['PRET']['KODS']; ?></span>
					<span id= "span_18_gaish"> risinājums</span>
					</td>
				<td>
					<span id= "span_18_gaish">Sākums:</span>
					<span id= "span_18_yealow"> <?php echo $_SESSION['PRET']['SAKUMS']; ?> </span>
					</td>
				<td>
					<span id= "span_18_gaish">Beigas:</span>
					<span id= "span_18_yealow"><?php echo $_SESSION['PRET']['BEIGAS']; ?> </span>
					</td>
			</tr>
		</table>
		
	</div>   <!-- <divEventFormTitle>  -->
	<table style="width:100%; background:bisque;">
		<tr>
			
			<td style="width:12%;">
                <?php  if ($_SESSION['USER']['LOMA']=='Q') {?>
				    <span id="evspan2">Jauns notikums :</span></td>
                <?php }?>
			<td style="width:100%; float:left;">
                <?php  if ($_SESSION['USER']['LOMA']=='Q') {?>
                    <input type="submit" name="new_event_task_create" value="Uzdevums">
                    <input type="submit" name="new_event_report_create" value="Ziņojums">
                    <input type="submit" name="new_event_order_create" value="Lēmums">
                    <input type="submit" name="new_event_summary_create" value="Kopsavilkums">
                    <input type="submit" name="new_event_action_create" value="Korekcijas">
                <?php }?>
			</td>

			<td style="width:10%;">
				<span id="span_14_br"><?php  echo $_SESSION['EVENTS']['VEIDS_NOS'];  ?></span>
			</td>
		</tr>	
	</table>	

	<?php 
	if ($_SESSION['EVENTS']['STATUS']=='NULL'&&strlen($_SESSION['EVENTS']['NEWFORMA'])>0) {
		include $_SESSION['EVENTS']['NEWFORMA'];
	}?>

</div>   <!-- <divEventForm>  -->
<?php

foreach ($pret_events as $one_event){?>
	<div id="divEventForm">
		<?php
        $_SESSION['EVENTS']['ID']=$one_event['ID'];
        switch($one_event['veids']){
            case 'T':
                $_SESSION['EVENTS']['FORMA']="ev_task_view.php";
                break;
            case 'R':
                $_SESSION['EVENTS']['FORMA']="ev_report_view.php";
                break;
            case 'O':
                $_SESSION['EVENTS']['FORMA']="ev_order_view.php";
                break;
            case 'S':
                $_SESSION['EVENTS']['FORMA']="ev_sumary_view.php";
                break;
            case 'P':
                $_SESSION['EVENTS']['FORMA']="ev_preventive_view.php";
                break;
            default:
                $_SESSION['EVENTS']['FORMA']="";
        }
        if (strlen( $_SESSION['EVENTS']['FORMA'])>0) {
            include $_SESSION['EVENTS']['FORMA'];
        }?>
	</div>
<?php 

} ?>

