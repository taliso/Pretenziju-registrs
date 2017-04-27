<?php

$tasks_list=array();

$sql = "SELECT * FROM uzdevumi where id_pers='".$_SESSION['USER']['ID']."'";
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
	 		 		<td style="width:3%;"><span id="evspan1" style="width:100%;text-align:center;">N.p.k.</span></td>
	 				<td style="width:5%;"><span id="evspan1" style="width:100%;text-align:center;">Avots</span></td>
	 				<td style="width:5%;"><span id="evspan1" style="width:100%;text-align:center;">Ident.</span></td>
	 				<td style="width:5%;"><span id="evspan1" style="width:100%;text-align:center;">Datums</span></td>
	 				<td style="width:55%;"><span id="evspan1" style="width:100%;text-align:center;">Uzdevums</span></td>
	 				<td style="width:5%;"><span id="evspan1" style="width:100%;text-align:center;">Termins</span></td>
                    <td style="width:5%;"><span id="evspan1" style="width:100%;text-align:center;">Atbildets</span></td>
	  				<td style="width:1%;"><span id="evspan1" style="width:100%;text-align:center;">Stat.</span></td>
	 			</tr>
		</table>
	</div> <!--  divTaskForms -->
<?php 
if ($tasks_count>0) {
	$task_nr=1;
	if(isset($_GET['tasknr'])){
		$thisTask=$_GET['tasknr'];
		
		if ($thisTask==$_SESSION['TASK']['NR']) {
            $_SESSION['TASK']['NR']= 0;
			
		} else {
            $_SESSION['TASK']['NR']=$thisTask;
			
		}
		
	}
//@@@___________ Katrs uzdevums ________@@@@@@@@@@@@@@@@@@@@@@@@@
    $tmp_file=tmp_fil_to_array($db);

	foreach ($tasks_list as $OneTask) {
        ?>

		<div id="divTask">
					<table style="width:100%;">
						<tr> 
							<td style="width:3%; color:blue;"><a id='mnaTasks' href="?tasknr=<?php echo $task_nr; ?>"> Nr.<?php echo $task_nr; ?></a></td>
							<td style="width:5%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['avots'] ?></span></td>
							<td style="width:5%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['identifikators'] ?></span></td>
							<td style="width:5%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['datums'] ?></span></td>
							<td style="width:55%;"><span id="evspan1" style="width:100%;text-align:left;"><?php echo $OneTask['uzdevums'] ?></span></td>
							<td style="width:5%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['termins'] ?></span></td>
                            <td style="width:5%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['izpild_dat'] ?></span></td>
							<td style="width:1%;"><span id="evspan1" style="width:100%;text-align:center;"><?php echo $OneTask['status'] ?></span></td>
						</tr>
					</table>
			<?php 
			if ($_SESSION['TASK']['NR']==$task_nr) {
				$disp='';
                $_SESSION['TASK']['KODS']=$OneTask['identifikators'];
                $_SESSION['TASK']['ID']=$OneTask['id'];
                $tmp_file=sqltoarray(' * ','tmp_files','',$db);
                $task_fil=sqltoarray(' * ','faili'," ident='".$_SESSION['TASK']['KODS']."'",$db);
                ?>
                <div class="invisible" > <!--  invisible -->
                    <table>
                        <tr>
                            <td style="width:3%;"><span id="evspan1"> Atbilde:</span></td>
                            <td style="width:52%;"><textarea name="atbilde[]" style="width:75%;font-family: verdana;font-size: 11px;"><?php echo $OneTask['atbilde']; ?></textarea></td>
                            <td style="width:15%;">
                                <div style="width:100%; text-align: center; float:left;background: burlywood;"><span id="evspan1"> Pievienotie faili</span></div>
                                 <?php if ($OneTask['status']==0) {?>
                                    <input type="file" name="fileTask" id="fileDoc"><input type="submit" name="add_task_file" value="Pievienot">
                                 <?php } ?>
                                <table style="float:left; width:100%;">

                                       <?php  foreach($tmp_file as $OneTmp){
                                          if ($OneTmp['identif']==$_SESSION['TASK']['KODS']){ ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo "<a id='span_12_blue_italic' href='".$OneTmp['tmp_name']."'>".$OneTmp['name']."</a>"; ?>
                                                        </td>
                                                    </tr>

                                          <?php   }
                                      }?>
                                    <?php  foreach($task_fil as $OneFil){   ?>
                                            <tr>
                                                <td>
                                                    <?php echo "<a id='span_12_blue_italic' href='".$OneFil['konvert_name']."'>".$OneFil['orginal_name']."</a>"; ?>
                                                </td>
                                            </tr>

                                        <?php   } ?>

                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td ></td>
                            <td >
                                <?php if ($OneTask['status']==0) {?>
                                    <input type="submit" name="task_save" value="Nosūtīt">
                                <?php } ?>
                            </td>
                            <td ></td>
                        </tr>

                    </table>
                </div> <!--  class="invisible" -->
            <?php } ?>
		</div>
<?php

		$task_nr = $task_nr + 1;
		
	} // foreach
	
}?> <!--  $tasks_count>0 -->
	
	
</div>    <!-- <divTasksForm>  -->