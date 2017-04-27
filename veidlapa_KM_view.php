
 
 
<?php
$agents=$_SESSION['AGENTS']['VARDS'];
if (isset($_POST['pret_risinajums'])) {
	
	$sakuma_datums = date("Y-m-d");
	
//	$dbf = new PDO("mysql:host=".HOST.";dbname=".DB,USER,PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//	$sql ="UPDATE pretenzijas SET sakuma_datums='".$sakuma_datums."', status='REGISTER' WHERE ID='".$_SESSION['PRET']['ID']."'";
    $fwhere= " ID=".$_SESSION['PRET']['ID'];
    sqlupdate('status', 1, 'pretenzijas', $fwhere, $db);
    sqlupdate('sakuma_datums', $sakuma_datums, 'pretenzijas', $fwhere, $db);
    $_SESSION['PRET']['STATUS']='1';
//	$q = $dbf->query($sql);
	
}

if ($_SESSION['STATUS']=="NEW") {
	
	$ID="";
	$reg_nr="";
	$veids="";
	$dokumenta_datums="";
	$sanemsanas_datums="";
	$registr_datums="";
	$konstat_datums="";
	$pret_id="";
	$iesniedzejs="";
	$agents="";
	$produkcija="";
	$pasutijuma_nr="";
	$daudzums_viss="";
	$daudzums_pieg_part="";
	$pieg_part_nr="";
	$daudzums_atsev_paneli="";
	$daudzums_kvmet=" 0.00       ";
	$daudzums_kubmet="";
	$no_partijas="";
	$par_laiks="";
	$par_daudzumu="";
	$par_bojats="";
	$par_kvalitati="";
	$par_izkr_trans="";
	$par_izkr_iepak="";
	$par_izkr_izpak="";
	$par_piemont_jaun="";
	$par_piemont_ekspl="";
	$beigu_dat="";
	$noform_pardev="";
	$noform_e_pasts="";
	$noform_oficial="";
	$iesniegts_nav="";
	$iesniegts_panel_foto="";
	$iesniegts_mark_foto="";
	$obl_dok_crm="";
	$obl_dok_akts="";
	$apraksts="";
	$file_foto="";
	$file_pas="";
	$file_apr="";
	$status="";
	$notikumu_sk="";
	$atbildigais="";
	$budzets="";
	$uzd_izpilda="";
	$akt_uzdevums="";
	$uzd_termins="";
	$sakuma_datums="";
	$nosutits_admin="";
	$nosutits_razosana="";
	$nosutits_logistika="";
	$nosutits_tehniki="";
	$atbildes_datums="";
	$saskanots_ar_klientu="";
	$vienosanas="";
	$beigu_dat="";
} else {


	$pret_id= $_SESSION['PRET']['KODS'];
	if (strlen($pret_id)>0){
		
		$sql ="SELECT * FROM pretenzijas where pret_id='$pret_id'";
		$q = $db->query($sql);
		$pret="";
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
			$pret=$r;
		}
		$reg_nr=$pret['reg_nr'];
		$veids=$pret['veids'];
		$dokumenta_datums=$pret['dokumenta_datums'];
		$sanemsanas_datums=$pret['sanemsanas_datums'];
		$registr_datums=$pret['registr_datums'];
		$konstat_datums=$pret['konstat_datums'];
		$pret_id=$pret['pret_id'];
		$iesniedzejs=$pret['iesniedzejs'];
		$agents=$pret['agents'];
		$produkcija=$pret['produkcija'];
		$pasutijuma_nr=$pret['pasutijuma_nr'];
		$daudzums_viss=$pret['daudzums_viss'];
		$daudzums_pieg_part=$pret['daudzums_pieg_part'];
		$pieg_part_nr=$pret['pieg_part_nr'];
		$daudzums_atsev_paneli=$pret['daudzums_atsev_paneli'];
		$daudzums_kvmet=$pret['daudzums_kvmet'];
		$daudzums_kubmet=$pret['daudzums_kubmet'];
		$no_partijas=$pret['no_partijas'];
		$par_laiks=$pret['par_laiks'];
		$par_daudzumu=$pret['par_daudzumu'];
		$par_bojats=$pret['par_bojats'];
		$par_kvalitati=$pret['par_kvalitati'];
		$beigu_dat=$pret['beigu_dat'];
		$noform_pardev=$pret['noform_pardev'];
		$noform_e_pasts=$pret['noform_e_pasts'];
		$noform_oficial=$pret['noform_oficial'];
		$iesniegts_nav=$pret['iesniegts_nav'];
		$iesniegts_panel_foto=$pret['iesniegts_panel_foto'];
		$iesniegts_mark_foto=$pret['iesniegts_mark_foto'];
		$obl_dok_crm=$pret['obl_dok_crm'];
		$obl_dok_akts=$pret['obl_dok_akts'];
		$apraksts=$pret['apraksts'];
		$file_foto=$pret['file_foto'];
		$file_pas=$pret['file_pas'];
		$file_apr=$pret['file_apr'];
		$status=$pret['status'];
		$notikumu_sk=$pret['notikumu_sk'];
		$budzets=$pret['budzets'];
		$sakuma_datums=$pret['sakuma_datums'];
		$beigu_dat=$pret['beigu_dat'];

		$sql ="SELECT * FROM faili where ident='$pret_id' and source='VEIDLAPA'";
		$q = $db->query($sql);
		$faili="";
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
			$faili=$r;
		}
		$fields=' orginal_name,konvert_name,source,ident,submit_name ';
		$fwhere=" source='pretenzijas' && ident = '".$pret_id."' && submit_name='SD6' ";
		$fil_sd6=sqltoarray($fields, ' faili ', $fwhere, $db);

		$fields=' orginal_name,konvert_name,source,ident,submit_name ';
		$fwhere=" source='pretenzijas' && ident = '".$pret_id."' && submit_name='SD8' ";
		$fil_sd8=sqltoarray($fields, ' faili ', $fwhere, $db);

		$fields=' orginal_name,konvert_name,source,ident,submit_name ';
		$fwhere=" source='pretenzijas' && ident = '".$pret_id."' && submit_name='SD10' ";
		$fil_sd10=sqltoarray($fields, ' faili ', $fwhere, $db);
		
		$fields=' orginal_name,konvert_name,source,ident,submit_name ';
		$fwhere=" source='pretenzijas' && ident = '".$pret_id."' && submit_name='SD11' ";
		$fil_sd11=sqltoarray($fields, ' faili ', $fwhere, $db);
		
	}
}	

?>
 <div id="saturs">
<form action="#" method="post">


	<?php
	if($_SESSION['STATUS']=="NEW"){
		$pret_id=$_SESSION['PRET']['PREFIKS']." - ".($_SESSION['PRET']['REG_NR']+1);
	} else {
		$pret_id=$_SESSION['PRET']['PREFIKS']." - ".$_SESSION['PRET']['REG_NR'];
	}
	
	
	echo "<div id='divFormTitle'>Pretenzija Nr. ".$pret_id."  </div>";
	?>
<!-- ###################   TABULA            ################################################# -->	
	<table>


	  <tr>  <!-- 1 -->
	    <td class="npk">1.</td>
	    <td class="teksts">Šī dokumenta noformēšanas datums</td>
	    <td class="atstarpe"></td>
	    <td class="ievade">
	    	<?php
	    	echo "<span id='list_span'>".$dokumenta_datums."</span>" ;
	    	?>
	    </td>
	  </tr>


	  <tr>  <!--2  -->
	    <td class="npk">2.</td>
	    <td class="teksts">TENAPORS pārdevēja vārds un uzvārds, kas ir pieņēmis pretenziju</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
			<?php echo "<span id='list_span' >".$agents."</span>";  ?>
	    </td>
	  </tr>
	  
	  
	  <tr>  <!--3  -->
	    <td class="npk">3.</td>
	    <td class="teksts">Pretenzijas iesniedzējs (Uzņēmuma/privātpersonas nosaukums)  </td>
		<td class="atstarpe"></td>
		<td>
			<?php echo "<span id='list_span'>".$iesniedzejs."</span>" ;	?>
		</td>
	  </tr>


	  <tr>  <!--4  -->
	    <td class="npk">4.</td>
	    <td class="teksts">Datums, kad saņemta pretenzija</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
	    	<?php echo "<span id='list_span'>".$sanemsanas_datums."</span>"; ?>
		</td>
	  </tr>


	  <tr>  <!-- 5 -->
	    <td class="npk">5.</td>
	    <td class="teksts">Produkta tips un biezums u.c. informācija, par kuru izteikta pretenzija</td>
   		<td class="atstarpe"></td>
      	<td class="ievade">
		    	<?php echo "<span id='list_span'>".$produkcija."</span>"; ?>
    	</td>
	   </tr>


	  <tr>  <!-- 6 -->
	    <td class="npk">6.</td>
	    <td class="teksts">Pasūtījuma numurs, uz kuru attiecas pretenzija <br> (pievienot pasūtījuma kopiju pielikumā)</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
		    	<?php echo "<span id='list_span'>".$pasutijuma_nr."</span>"; ?>
		    	<div style="float: right;">
		    		<?php if (isset($fil_sd6)){
		    					foreach ($fil_sd6 as $fil) {
		    						echo "<a id='span_12_blue_italic' href='uploads\\".$fil['konvert_name']."'>".$fil['orginal_name']."</a>";
		    					}
				    		} ?>
		    	</div>
    	</td>
	  </tr>
	  

	  <tr>  <!-- 7 -->
	    <td class="npk">7.</td>
	    <td class="teksts">Preces daudzums, par kuru izteikta pretenzija</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
				<?php
					StatCheckBox('daudzums_viss',$daudzums_viss,'Viss pasūtījums','<br>',' disabled') ;
					StatCheckBox('daudzums_pieg_part',$daudzums_pieg_part,'Piegādes partija (s) Nr.','',' disabled'); 
					echo $pieg_part_nr."<br>";
					StatCheckBox('daudzums_atsev_paneli',$daudzums_atsev_paneli,'Atsevišķi paneļi, veidņi  ','',' disabled'); 
					echo $daudzums_kvmet." kv.m. piegādes partijā (s) Nr.".$no_partijas;
				
				?>
    	</td>
	  </tr>

	  
	  <tr>  <!--8  -->
	    <td class="npk">8.</td>
   	    <td class="teksts">Pretenzijas apraksts<br> (var pievienot pretenzijas aprakstu pielikumā)</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
		    <textarea disabled rows="4" cols="80">
		    	<?php echo $apraksts; ?>
			</textarea>
            <div style="float: right;">
                <?php if (isset($fil_sd8)){
                    foreach ($fil_sd8 as $fil) {
                        echo "<a id='span_12_blue_italic' href='uploads\\".$fil['konvert_name']."'>".$fil['orginal_name']."</a>";
                    }
                } ?>
            </div>

        </td>
	  </tr>

	
	  <tr>  <!-- 9  -->
	    <td class="npk">9.</td>
   	    <td class="teksts">Pretenzijas iemesls</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
	    	    <?php
	    		StatCheckBox('par_laiks',$par_laiks,' Piegādes laiks','<br>',' disabled') ;
				StatCheckBox('par_daudzumu',$par_daudzumu,'Daudzuma neatbilstība','<br>',' disabled'); 
				StatCheckBox('par_bojats',$par_bojats,'Piegādāta bojāta prece','<br>',' disabled') ;
				StatCheckBox('par_kvalitati',$par_kvalitati,'Neatbilstoša preces kvalitāte','',' disabled'); 
				?>
		    	
	  	</td>
	  </tr>

		
	  <tr>  <!-- 10  -->
	    <td class="npk">10.</td>
   	    <td class="teksts">Iesniegtās fotofiksācijas <br> (pievienot pielikumā)</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
	    	 <?php
				StatCheckBox('iesniegts_nav',$iesniegts_nav,'Sūdzība attiecas uz piegādes laiku (foto nav nepieciešams)','<br>',' disabled'); 
				StatCheckBox('iesniegts_panel_foto',$iesniegts_panel_foto,'Ir saņemtas preces fotofiksācija','<br>',' disabled') ;
				StatCheckBox('iesniegts_mark_foto',$iesniegts_mark_foto,' Ir saņemtas marķējuma fotofiksācijas','',' disabled'); 
			?>
            <div style="float: right;">
                <?php if (isset($fil_sd10)){
                    foreach ($fil_sd10 as $fil) {
                        echo "<a id='span_12_blue_italic' href='uploads\\".$fil['konvert_name']."'>".$fil['orginal_name']."</a>";
                    }
                } ?>
            </div>


        </td>
	  </tr>


	  <tr>  <!-- 11  -->
	    <td class="npk">11.</td>
   	    <td class="teksts">Obligāti iesniedzami dokumenti (ja ir piegādāta <br> bojāta prece vai konstatēta daudzuma neatbilstība</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
	    	<?php
				StatCheckBox('obl_dok_crm',$obl_dok_crm,'CMR','<br>',' disabled') ;
				StatCheckBox('obl_dok_akts',$obl_dok_akts,' Pieņemšanas - nodošanas akts','',' disabled'); 
			?>
            <div style="float: right;">
                <?php if (isset($fil_sd11)){
                    foreach ($fil_sd11 as $fil) {
                        echo "<a id='span_12_blue_italic' href='uploads\\".$fil['konvert_name']."'>".$fil['orginal_name']."</a>";
                    }
                } ?>
            </div>

        </td>
	  </tr>
	</table>
	<?php

	if ($_SESSION['USER']['LOMA']=="Q" && $_SESSION['PRET']['STATUS']=='0') { ?>
		<input type="submit" name="pret_risinajums" value="Sākt">
	<?php }	 ?>
  </form>

</div>
