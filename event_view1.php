<?php
//var_dump($one_event);
if ($event_count>0) {
	$event_nr=1;
	if(isset($_GET['eventnr'])){
		$thisEvent=$_GET['eventnr'];

		if ($thisEvent==$_SESSION['EVENT_ID']) {
			$_SESSION['EVENT_ID']= 0;
				
		} else {
			$_SESSION['EVENT_ID']=$thisEvent;
				
		}

	}
}
	
?>
<div id="divEventView" style=" width:100%;">
	<div id="divEventVisible" style=" width:100%;">
		<table style=" width:100%;">
			<tr> 
				<td><a id='mnaEvents' href="?eventnr=<?php echo $one_event['event_id']; ?>"> Nr.<?php echo $one_event['event_id']; ?></a></td>
				<td><span id="span_14_br" style="float:right;"> Iesaistītās personas: </span></td>
				<td><span id="span_14_bl" style="float:left;"><?php  echo $visaspersonas ?> </span></td>
				<td><span id="span_14_br" style="float:right;">Datums:  </span></td>
				<td><span id="span_14_bl" style="float:left;"><?php  echo $one_event['event_date']; ?> </span></td>
			</tr>
		</table>
		
	</div>
	<div id="divEventInvisible" style=" width:100%;">
	
	</div>
	
</div>