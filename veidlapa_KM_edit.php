<?php
me('2',"veidlapa_KM_edit","IN");
$agents = $_SESSION['AGENTS']['VARDS'];

$sql = "SELECT reg_nr FROM menju where prefiks='".$_SESSION['PRET']['PREFIKS']."'";
$q = $db->query($sql);
$newreg_nr = $q->fetch(PDO::FETCH_ASSOC);


if ($_SESSION['STATUS'] == "NEW") {
	me('2',"reg_nr",$reg_nr);
	$reg_nr = "";
	$veids = "";
	$dokumenta_datums = "";
	$sanemsanas_datums = "";
	$registr_datums = "";
	$konstat_datums = "";
	$pret_id = "";
	$iesniedzejs = "";
	$agent = "";
	$produkcija = "";
	$pasutijuma_nr = "";
	$daudzums_viss = "";
	$daudzums_pieg_part = "";
	$pieg_part_nr = "";
	$daudzums_atsev_paneli = "";
	$daudzums_kvmet = " 0.00       ";
	$daudzums_kubmet = "";
	$no_partijas = "";
	$par_laiks = "";
	$par_daudzumu = "";
	$par_bojats = "";
	$par_kvalitati = "";
	$par_izkr_trans = "";
	$par_izkr_iepak = "";
	$par_izkr_izpak = "";
	$par_piemont_jaun = "";
	$par_piemont_ekspl = "";
	$beigu_dat = "";
	$noform_pardev = "";
	$noform_e_pasts = "";
	$noform_oficial = "";
	$iesniegts_nav = "";
	$iesniegts_panel_foto = "";
	$iesniegts_mark_foto = "";
	$obl_dok_crm = "";
	$obl_dok_akts = "";
	$apraksts = "";
	$file_foto = "";
	$file_pas = "";
	$file_apr = "";
	$status = "";
	$notikumu_sk = "";
	$atbildigais = "";
	$budzets = "";
	$uzd_izpilda = "";
	$akt_uzdevums = "";
	$uzd_termins = "";
	$sakuma_datums = "";
	$nosutits_admin = "";
	$nosutits_razosana = "";
	$nosutits_logistika = "";
	$nosutits_tehniki = "";
	$atbildes_datums = "";
	$saskanots_ar_klientu = "";
	$vienosanas = "";
	$beigu_dat = "";
	$_SESSION['PRET']['ID'] = $_SESSION['PRET']['PREFIKS']."-".($newreg_nr['reg_nr']+1);
	$pret_id = $_SESSION['PRET']['ID'];
} else {
	if (strlen ( $_SESSION['PRET']['ID'] ) > 0) {
		$pret_id = $_SESSION['PRET']['ID'];
		$sql = "SELECT * FROM pretenzijas where pret_id='$pret_id'";
		$q = $db->query ( $sql );
		$pret = "";
		while ( $r = $q->fetch ( PDO::FETCH_ASSOC ) ) {
			$pret = $r;
		}
		
		$reg_nr = $pret ['reg_nr'];
		$veids = $pret ['veids'];
		$dokumenta_datums = $pret ['dokumenta_datums'];
		$sanemsanas_datums = $pret ['sanemsanas_datums'];
		$registr_datums = $pret ['registr_datums'];
		$konstat_datums = $pret ['konstat_datums'];
		$pret_id = $pret ['pret_id'];
		$iesniedzejs = $pret ['iesniedzejs'];
		$agent = $pret ['agents'];
		$produkcija = $pret ['produkcija'];
		$pasutijuma_nr = $pret ['pasutijuma_nr'];
		$daudzums_viss = $pret ['daudzums_viss'];
		$daudzums_pieg_part = $pret ['daudzums_pieg_part'];
		$pieg_part_nr = $pret ['pieg_part_nr'];
		$daudzums_atsev_paneli = $pret ['daudzums_atsev_paneli'];
		$daudzums_kvmet = $pret ['daudzums_kvmet'];
		$daudzums_kubmet = $pret ['daudzums_kubmet'];
		$no_partijas = $pret ['no_partijas'];
		$par_laiks = $pret ['par_laiks'];
		$par_daudzumu = $pret ['par_daudzumu'];
		$par_bojats = $pret ['par_bojats'];
		$par_kvalitati = $pret ['par_kvalitati'];
		$beigu_dat = $pret ['beigu_dat'];
		$noform_pardev = $pret ['noform_pardev'];
		$noform_e_pasts = $pret ['noform_e_pasts'];
		$noform_oficial = $pret ['noform_oficial'];
		$iesniegts_nav = $pret ['iesniegts_nav'];
		$iesniegts_panel_foto = $pret ['iesniegts_panel_foto'];
		$iesniegts_mark_foto = $pret ['iesniegts_mark_foto'];
		$obl_dok_crm = $pret ['obl_dok_crm'];
		$obl_dok_akts = $pret ['obl_dok_akts'];
		$apraksts = $pret ['apraksts'];
		$file_foto = $pret ['file_foto'];
		$file_pas = $pret ['file_pas'];
		$file_apr = $pret ['file_apr'];
		$status = $pret ['status'];
		$notikumu_sk = $pret ['notikumu_sk'];
		$budzets = $pret ['budzets'];
		$sakuma_datums = $pret ['sakuma_datums'];
		$beigu_dat = $pret ['beigu_dat'];
		$izdevumi = $pret ['izdevumi'];
		
		
		//########## Pārbaudam vai nav piesaistīto failu. Ielādējam iekš tmp_faili  #########
		
		$where=" source='VEIDLAPA' and ident = '".$_SESSION['PRET']['ID']."'";
		$fl_pret=sqltoarray('orginal_name','faili',$where,$db);
		
	}
}
me('2',"reg_nr",$reg_nr);
$ident=$_SESSION['PRET']['ID'];

$where=" submit_name='SD6' and identif='".$ident."'" ;
$fl_vd_6=sqltoarray('name','tmp_files',$where,$db);

$where=" submit_name='SD8' and identif='".$ident."'" ;
$fl_vd_8=sqltoarray('name','tmp_files',$where,$db);

$where=" submit_name='SD10' and identif='".$ident."'" ;
$fl_vd_10=sqltoarray('name','tmp_files',$where,$db);

$where=" submit_name='SD11' and identif='".$ident."'" ;
$fl_vd_11=sqltoarray('name','tmp_files',$where,$db);

$where=" loma='A' " ;
$agents=sqltoarray('agents','kl_agenti',$where,$db);

?>

<div id="saturs">
	<form action="#" method="post">
	<?php

	echo "<div id='divFormTitle'>Pretenzija Nr. " . $_SESSION['PRET']['ID'] . "  </div>";
	?>
<!-- ###################   TABULA            ################################################# -->
		<table>


			<tr>
				<!-- 1 -->
				<td class="npk">1.</td>
				<td class="teksts">Šī dokumenta noformēšanas datums</td>
				<td class="atstarpe"></td>
				<td class="ievade"><input ID="dokumenta_datums" type="text"
					name="dokumenta_datums" value="<?php echo $dokumenta_datums ; ?>">
				</td>
			</tr>


			<tr>
				<!--2  -->
				<td class="npk">2.</td>
				<td class="teksts">TENAPORS pārdevēja vārds un uzvārds, kas ir
					pieņēmis pretenziju</td>
				<td class="atstarpe"></td>
				
				
				
				<td class="ievade">
					<?php dropbox_select($agents,'agents',$agent); ?>
<!-- 				<input ID="text_pret" type="text" name="agents" value="<?php echo $agents;  ?>">-->

					</td>
			</tr>


			<tr>
				<!--3  -->
				<td class="npk">3.</td>
				<td class="teksts">Pretenzijas iesniedzējs (Uzņēmuma/privātpersonas
					nosaukums)</td>
				<td class="atstarpe"></td>
				<td>
                    <input ID="text_pret_garss" type="text" name="iesniedzejs" value="<?php echo $iesniedzejs ;	?>"></td>
			</tr>


			<tr>
				<!--4  -->
				<td class="npk">4.</td>
				<td class="teksts">Datums, kad saņemta pretenzija</td>
				<td class="atstarpe"></td>
				<td class="ievade"><input ID="sanemsanas_datums" type="text"
					name="sanemsanas_datums" value="<?php echo $sanemsanas_datums; ?>">
				</td>
			</tr>


			<tr>
				<!-- 5 -->
				<td class="npk">5.</td>
				<td class="teksts">Produkta tips un biezums u.c. informācija, par
					kuru izteikta pretenzija</td>
				<td class="atstarpe"></td>
				<td class="ievade"><input id="text_pret_garss" type="text"
					name="produkcija" value="<?php echo $produkcija; ?>" size="100"></td>
			</tr>


			<tr>
				<!-- 6 -->
				<td class="npk">6.</td>
				<td class="teksts">Pasūtījuma numurs, uz kuru attiecas pretenzija <br>
					(pievienot pasūtījuma kopiju pielikumā)
				</td>
				<td class="atstarpe"></td>
				<td class="ievade">
				<!-- ##############################  Failu izvēle ######################################################################## -->					
					<div id="divVeidSad" style="float:left;  width:70%; height:100%; margin: 2px;">
						<input ID="text_pret" type="text" name="pasutijuma_nr" value="<?php echo $pasutijuma_nr; ?>">
					</div>	
						
					<div id="divEventFaili" style="float:left;  width:26%; border: 1px solid darkgray; height:100%; margin: 2px;">
						<div id="" style="width:99%;border: 2px solid darkgray;text-align: center; height:25px;background-color:darkgray;">
							 <span id="fspan3" style="margin: 0px; width:60%; color:#5b5d51;"> FAILI </span>
							 <input style="float:right; margin: 0px;" type="submit" name="doc_to_pret" value="Pievienot" >
							 
						</div>
						<table>
							<tr>
								<td> 
									<?php 
									foreach ($fl_vd_6 as $faili){
										echo $faili['name'].'<br>';
 									}
									?>
								</td>
							</tr> 
						</table>
						<div id="divFailiMenu">
					  		<input type="file" name="SD6" id="fileDoc" style="margin:4px;">
						</div>
					</div>
				<!-- ##############################  Failu izvēle ######################################################################## -->					
									
				</td>
			</tr>


			<tr>
				<!-- 7 -->
				<td class="npk">7.</td>
				<td class="teksts">Preces daudzums, par kuru izteikta pretenzija</td>
				<td class="atstarpe"></td>
				<td class="ievade">
	    	<?php
						StatCheckBox ( 'daudzums_viss', $daudzums_viss, 'Viss pasūtījums', '<br>', '' );
						StatCheckBox ( 'daudzums_pieg_part', $daudzums_pieg_part, 'Piegādes partija (s) Nr.', '', '' );
						echo "<input ID='text_pret' type='text' name='pieg_part_nr' value='" . $pieg_part_nr . "'><br>";
						StatCheckBox ( 'daudzums_atsev_paneli', $daudzums_atsev_paneli, 'Atsevišķi paneļi, veidņi  ', '', '' );
						echo "<input ID='text_pret' type='text' name='daudzums_kvmet' value='" . $daudzums_kvmet . "'>  kv.m. piegādes partijā (s) Nr.  <input ID='text_pret' type='text' name='no_partijas' value='" . $no_partijas . "'>";
						?>
    	        </td>
			</tr>


			<tr>
				<!--8  -->
				<td class="npk">8.</td>
				<td class="teksts">Pretenzijas apraksts<br> (var pievienot
					pretenzijas aprakstu pielikumā)
				</td>
				<td class="atstarpe"></td>
				<td class="ievade">
					<!-- ##############################  Failu izvēle ######################################################################## -->					
					<div id="divVeidSad" style="float:left;  width:70%; height:100%; margin: 2px;">
						<textarea name="apraksts" style="width:100%;"><?php echo $apraksts; ?></textarea>
					</div>	
						
					<div id="divEventFaili" style="float:left;  width:26%; border: 1px solid darkgray; height:100%; margin: 2px;">
						<div id="" style="width:99%;border: 2px solid darkgray;text-align: center; height:25px;background-color:darkgray;">
							 <span id="fspan3" style="margin: 0px; width:60%; color:#5b5d51;"> FAILI </span>
							 <input style="float:right; margin: 0px;" type="submit" name="doc_to_pret" value="Pievienot" >
							 
						</div>
						<table>
							<tr>
								<td> 
									<?php 
 									foreach ($fl_vd_8 as $faili){
 										echo $faili['name'].'<br>';
 									}
									?>
								</td>
							</tr> 
						</table>
						<div id="divFailiMenu">
					  		<input type="file" name="SD8" id="fileDoc" style="margin:4px;">
						</div>
					</div>
				<!-- ##############################  Failu izvēle ######################################################################## -->					
					
				</td>
			</tr>

			<tr>
				<!-- 9  -->
				<td class="npk">9.</td>
				<td class="teksts">Pretenzijas iemesls</td>
				<td class="atstarpe"></td>
				<td class="ievade">
	    <?php
					StatCheckBox ( 'par_laiks', $par_laiks, ' Piegādes laiks', '<br>', '' );
					StatCheckBox ( 'par_daudzumu', $par_daudzumu, 'Daudzuma neatbilstība', '<br>', '' );
					StatCheckBox ( 'par_bojats', $par_bojats, 'Piegādāta bojāta prece', '<br>', '' );
					StatCheckBox ( 'par_kvalitati', $par_kvalitati, 'Neatbilstoša preces kvalitāte', '', '' );
					?>
	    	
	  	</td>
			</tr>


			<tr>
				<!-- 10  -->
				<td class="npk">10.</td>
				<td class="teksts">Iesniegtās fotofiksācijas <br> (pievienot
					pielikumā)
				</td>
				<td class="atstarpe"></td>
				<td class="ievade">
					<div id="divVeidSad" style="float:left;  width:70%; height:100%; margin: 2px;">
						 <?php
							StatCheckBox ( 'iesniegts_nav', $iesniegts_nav, 'Sūdzība attiecas uz piegādes laiku (foto nav nepieciešams)', '<br>', '' );
							StatCheckBox ( 'iesniegts_panel_foto', $iesniegts_panel_foto, 'Ir saņemtas preces fotofiksācija', '<br>', '' );
							StatCheckBox ( 'iesniegts_mark_foto', $iesniegts_mark_foto, ' Ir saņemtas marķējuma fotofiksācijas', '', '' );
							?>
					</div>	
						
					<div id="divEventFaili" style="float:left;  width:26%; border: 1px solid darkgray; height:100%; margin: 2px;">
						<div id="" style="width:99%;border: 2px solid darkgray;text-align: center; height:25px;background-color:darkgray;">
							 <span id="fspan3" style="margin: 0px; width:60%; color:#5b5d51;"> FAILI </span>
							 <input style="float:right; margin: 0px;" type="submit" name="doc_to_pret" value="Pievienot" >
							 
						</div>
						<table>
							<tr>
								<td> 
									<?php 
 									foreach ($fl_vd_10 as $faili){
 										me("1",'SD10',$faili['name']);
 											
										echo $faili['name'].'<br>';
 									}
									?>
								</td>
							</tr> 
						</table>
						<div id="divFailiMenu">
					  		<input type="file" name="SD10" id="fileDoc" style="margin:4px;">
						</div>
					</div>
			
	  		</td>
			</tr>


			<tr>
				<!-- 11  -->
				<td class="npk">11.</td>
				<td class="teksts">Obligāti iesniedzami dokumenti (ja ir piegādāta <br>
					bojāta prece vai konstatēta daudzuma neatbilstība
				</td>
				<td class="atstarpe"></td>
				<td class="ievade">
	    	<!-- ##############################  Failu izvēle ######################################################################## -->					
					<div id="divVeidSad" style="float:left;  width:70%; height:100%; margin: 2px;">
						<?php
						StatCheckBox ( 'obl_dok_crm', $obl_dok_crm, 'CMR', '<br>', '' );
						StatCheckBox ( 'obl_dok_akts', $obl_dok_akts, ' Pieņemšanas - nodošanas akts', '', '' );
						?>
	
					</div>	
						
					<div id="divEventFaili" style="float:left;  width:26%; border: 1px solid darkgray; height:100%; margin: 2px;">
						<div id="" style="width:99%;border: 2px solid darkgray;text-align: center; height:25px;background-color:darkgray;">
							 <span id="fspan3" style="margin: 0px; width:60%; color:#5b5d51;"> FAILI </span>
							 <input style="float:right; margin: 0px;" type="submit" name="doc_to_pret" value="Pievienot" >
							 
						</div>
						<table>
							<tr>
								<td> 
									<?php 
 									foreach ($fl_vd_11 as $faili){
										echo $faili['name'].'<br>';
 									}
									?>
								</td>
							</tr> 
						</table>
						<div id="divFailiMenu">
					  		<input type="file" name="SD11" id="fileDoc" style="margin:4px;">
						</div>
					</div>
				<!-- ##############################  Failu izvēle ######################################################################## -->					
	    	
	    	
	  	</td>
			</tr>

		</table>
		<input type="submit" name="pret_save" value="Saglabāt"><input type="submit" name="pret_cancel" value="Atcelt">
	</form>
	<script>
    $( function() {
    	$( "#dokumenta_datums" ).datepicker({dateFormat: 'yy-mm-dd'});
        $( "#sanemsanas_datums" ).datepicker({dateFormat: 'yy-mm-dd'});
    } );
    
</script>

</div>
