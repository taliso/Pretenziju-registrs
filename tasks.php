<?php

$tasks_list=array();

$sql = "SELECT * FROM uzdevumi where persona='".$_SESSION['AGENTS']."'";
$q = $db->query($sql);
while($r = $q->fetch(PDO::FETCH_ASSOC)){
	$tasks_list[]=$r;
}
$tasks_count= count($tasks_list);

?>

<div id="divTasksForm">
	<div id="divEventFormTitle">
		<span id= "spantitle">Tavi uzdevumi        (<?php echo $tasks_count?>) </span>
	</div>   <!-- <divEventFormTitle>  -->
	<div id="divTaskForms">
		<table style="width:100%;">
	 		 	<tr> <!-- R # 1. -->
	 				<td style="width:7%;"><span id="evspan1" style="width:100%;text-align:center;">Avots</span></td>
	 				<td style="width:7%;"><span id="evspan1" style="width:100%;text-align:center;">Ident.</span></td>
	 				<td style="width:8%;"><span id="evspan1" style="width:100%;text-align:center;">Datums</span></td>
	 				<td style="width:35%;"><span id="evspan1" style="width:100%;text-align:center;">Uzdevums</span></td>
	 				<td style="width:8%;"><span id="evspan1" style="width:100%;text-align:center;">Termins</span></td>
	  				<td style="width:1%;"><span id="evspan1" style="width:100%;text-align:center;">Stat.</span></td>
	 			</tr>
		</table>
	</div> <!--  divTaskForms -->
<?php 
if ($tasks_count>0) {
	$task_nr=1;
	if(isset($_GET['tasknr'])){
		$thisTask=$_GET['tasknr'];
		
		echo '$thisTask(0)='.$thisTask.'-----TASK_NR(0)='.$_SESSION['TASK_NR'];
		
		if ($thisTask==$_SESSION['TASK_NR']) {
			$_SESSION['TASK_NR']= 0; 
			echo '$thisTask='.$thisTask; 
		} else {
			$_SESSION['TASK_NR']=$thisTask; 
			echo '$thisTask(t)='.$thisTask;
		}
		
	}
	
	foreach ($tasks_list as $OneTask) {	?>
		
		<div id="divEventFormTitle">
			<span id= "spantitle">Uzdevums</span><a id='mnaTasks' href="?tasknr=<?php echo $task_nr; ?>"> Nr.<?php echo $task_nr; ?></a>
		</div>   <!-- <divEventFormTitle>  -->
	
		<div class="item">
			<div class="visible"> 
					<table style="width:100%;">
						<tr> 
							<td style="width:7%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['avots'] ?></span></td>
							<td style="width:7%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['identifikators'] ?></span></td>
							<td style="width:8%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['datums'] ?></span></td>
							<td style="width:35%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['uzdevums'] ?></span></td>
							<td style="width:8%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['termins'] ?></span></td>
							<td style="width:1%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['status'] ?></span></td>
						</tr>
					</table>
			</div>	<!--  class="visible" --> 
			<?php 
			echo 'TASK_NR='.$_SESSION['TASK_NR'].'$task_nr='.$task_nr;
			if ($_SESSION['TASK_NR']==$task_nr) {
				$disp=''; } else {  $disp='none'; 
					}
					?>
			<div class="invisible" style="display:<?php echo $disp ; ?>;"> <!--  invisible -->
				<span id="evspan1"> Atbilde: </span><input type="text" name="atbilde" value="" style="width: 80%;"><input type="submit" name="task_send" value="Nosūtīt">
			
			</div> <!--  class="invisible" -->
		</div>
<?php
		$task_nr = $task_nr + 1;
		
	} // foreach
	
}?> <!--  $tasks_count>0 -->
	
	
</div>    <!-- <divTasksForm>  -->