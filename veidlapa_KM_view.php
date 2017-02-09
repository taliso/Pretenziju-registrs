
 
 
<?php
$agents=$_SESSION['AGENTS'];
$iesniedzejs="";
$produkcija="";
$pasutijuma_nr="";
$pieg_part_nr="";
$daudzums_kvmet=0;
$no_partijas="";
$apraksts="";
$veids="";
$pret_id="";
$par_laiks="";
$par_izkr_trans="";
$par_izkr_iepak="";
$par_izkr_izpak="";
$par_piemont_jaun="";
$par_piemont_ekspl="";
$noform_pardev="";
$noform_e_pasts="";
$noform_oficial="";
$iesniegts_nav="";
$iesniegts_panel_foto="";
$iesniegts_mark_foto="";
$notikumu_sk=0;
$atbildigais="";
$beigu_dat="";
$budzets=0;
$grupa="";

	$_SESSION['STATUS'] = "VIEW";
	$_SESSION['FORMA'] = 'pret_list.php';
$pret_id= $_SESSION['PRET_ID'];
if (strlen($pret_id)>0){
	
	$sql ="SELECT * FROM tp_pretenzijas.pretenzijas where pret_id='$pret_id'";
	$q = $db->query($sql);
	$pret="";
	while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$pret=$r;
	}
	
	$_SESSION['ID_PRET']=$pret['ID'];
	
	$noform_datums=$pret['dokumenta_datums'];
	$agents=$pret['agents'];
	$iesniedzejs=$pret['iesniedzejs'];
	$sanemts_datums=$pret['sanemsanas_datums'];
	$produkcija=$pret['produkcija'];
	$pasutijuma_nr=$pret['pasutijuma_nr'];
	$daudzums_viss=$pret['daudzums_viss'];
	$daudzums_pieg_part=$pret['daudzums_pieg_part'];
	echo $daudzums_pieg_part;
	$pieg_part_nr=$pret['pieg_part_nr'];
	$daudzums_atsev_paneli=$pret['daudzums_atsev_paneli'];
	$daudzums_kvmet=$pret['daudzums_kvmet'];
	$daudzums_kubmet=$pret['daudzums_kubmet'];
	$no_partijas=$pret['no_partijas'];
	$par_laiks=$pret['par_laiks'];
	$par_izkr_trans=$pret['par_izkr_trans'];
	$par_izkr_iepak=$pret['par_izkr_iepak'];
	$par_izkr_izpak=$pret['par_izkr_izpak'];
	$par_piemont_jaun=$pret['par_piemont_jaun'];
	$par_piemont_ekspl=$pret['par_piemont_ekspl'];
	$noform_pardev=$pret['noform_pardev'];
	$noform_e_pasts=$pret['noform_e_pasts'];
	$noform_oficial=$pret['noform_oficial'];
	$apraksts=$pret['apraksts'];
	$iesniegts_nav=$pret['iesniegts_nav'];
	$iesniegts_panel_foto=$pret['iesniegts_panel_foto'];
	$iesniegts_mark_foto=$pret['iesniegts_mark_foto'];
	$konstatets_datums=$pret['konstat_datums'];
	
}


?>
 <div id="saturs">
<form action="#" method="post">
	<?php
	if($_SESSION['STATUS']=="NEW"){
		$pret_id=$_SESSION['PREFIKS']." - ".($_SESSION['REG_NR']+1);
	} else {
		$pret_id=$_SESSION['PREFIKS']." - ".$_SESSION['REG_NR'];
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
	    	<?php echo "<span id='list_span'>".$noform_datums."</span>" ; ?>
	    </td>
	  </tr>


	  <tr>  <!--2  -->
	    <td class="npk">2.</td>
	    <td class="teksts">TENAPORS pārdevēja vārds un uzvārds, kas ir pieņēmis pretenziju</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
			<?php echo "<span id='list_span >".$agents."</span>";  ?>
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
	    	<?php echo "<span id='list_span'>".$sanemts_datums."</span>"; ?>
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
    	</td>
	  </tr>
	  

	  <tr>  <!-- 7 -->
	    <td class="npk">7.</td>
	    <td class="teksts">Preces daudzums, par kuru izteikta pretenzija</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
	    	<input type="checkbox" name="daudzums_viss" value="1"> Viss pasūtījums<br>
	    	<input type="checkbox" name="daudzums_viss" value="1"> Piegādes partija (s) Nr.<input type="text" name="pieg_part_nr" value=""><br>
	    	<input type="checkbox" name="daudzums_viss" value="1"> Atsevišķi paneļi, veidņi <input type="text" name="pieg_part_nr" value="">kv.m. piegādes partijā (s) Nr.<input type="text" name="pieg_part_nr" value="">
    	</td>
	  </tr>

	  
	  <tr>  <!--8  -->
	    <td class="npk">8.</td>
   	    <td class="teksts">Pretenzijas apraksts<br> (var pievienot pretenzijas aprakstu pielikumā)</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
		    <textarea rows="4" cols="120">At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
			</textarea>
	    
	  	</td>
	  </tr>
	
	
	  <tr>  <!-- 9  -->
	    <td class="npk">9.</td>
   	    <td class="teksts">Pretenzijas iemesls</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
	    	<input type="checkbox" name="daudzums_viss" value="1"> Piegādes laiks<br>
	    	<input type="checkbox" name="daudzums_viss" value="1"> Daudzuma neatbilstība<br>
	    	<input type="checkbox" name="daudzums_viss" value="1"> Piegādāta bojāta prece<br>
	    	<input type="checkbox" name="daudzums_viss" value="1"> Neatbilstoša preces kvalitāte
	  	</td>
	  </tr>

		
	  <tr>  <!-- 10  -->
	    <td class="npk">10.</td>
   	    <td class="teksts">Iesniegtās fotofiksācijas <br> (pievienot pielikumā)</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
	    	<input type="checkbox" name="daudzums_viss" value="1"> Sūdzība attiecas uz piegādes laiku (foto nav nepieciešams)<br>
	    	<input type="checkbox" name="daudzums_viss" value="1"> Ir saņemtas preces fotofiksācija<br>
	    	<input type="checkbox" name="daudzums_viss" value="1"> Ir saņemtas marķējuma fotofiksācijas
	  	</td>
	  </tr>


	  <tr>  <!-- 11  -->
	    <td class="npk">11.</td>
   	    <td class="teksts">Obligāti iesniedzami dokumenti (ja ir piegādāta <br> bojāta prece vai konstatēta daudzuma neatbilstība</td>
		<td class="atstarpe"></td>
	    <td class="ievade">
	    	<input type="checkbox" name="daudzums_viss" value="1"> CMR<br>
	    	<input type="checkbox" name="daudzums_viss" value="1"> Pieņemšanas nodošanas akts<br>
	  	</td>
	  </tr>
	
	</table>
  </form>

</div>
