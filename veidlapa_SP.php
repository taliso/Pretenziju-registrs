
 
  <div id="saturs">
<?php
if (isset($_POST['submit'])) {
	
	file_upload($_FILES,$target_dir,$reg_nr);
	
	$noform_datums =$_POST['noform_gads']."-".$_POST['noform_menes']."-".$_POST['noform_diena'];
	$agents = $_POST['agents'];
	$iesniedzejs = $_POST['iesniedzejs'];
	$sanemts_datums = $_POST['sanemts_gads']."-".$_POST['sanemts_menes']."-".$_POST['sanemts_diena'];
	$produkcija = $_POST['produkcija'];
	$pasutijuma_nr = $_POST['pasutijuma_nr'];
	$daudzums_viss = (!isset($_POST['daudzums_viss'])) ? "0" : $_POST['daudzums_viss'];
	$daudzums_pieg_part =  (!isset($_POST['daudzums_pieg_part'])) ? "0" : $_POST['daudzums_pieg_part'];
	$pieg_part_nr = $_POST['pieg_part_nr'];
	$daudzums_atsev_paneli =  (!isset($_POST['daudzums_atsev_paneli'])) ? "0" : $_POST['daudzums_atsev_paneli'];
	$daudzums_kvmet = ($_POST['daudzums_kvmet']=="") ? "0" : $_POST['daudzums_kvmet'];
	$no_partijas = $_POST['no_partijas'];
	$par_laiks =  (!isset($_POST['par_laiks'])) ? "0" : $_POST['par_laiks'];
	$par_izkr_trans =  (!isset($_POST['par_izkr_trans'])) ? "0" : $_POST['par_izkr_trans'];
	$par_izkr_iepak =  (!isset($_POST['par_izkr_iepak'])) ? "0" : $_POST['par_izkr_iepak'];
	$par_izkr_izpak =  (!isset($_POST['par_izkr_izpak'])) ? "0" : $_POST['par_izkr_izpak'];
	$par_piemont_jaun =  (!isset($_POST['par_piemont_jaun'])) ? "0" : $_POST['par_piemont_jaun'];
	$par_piemont_ekspl =  (!isset($_POST['par_piemont_ekspl'])) ? "0" : $_POST['par_piemont_ekspl'];
	$noform_pardev =  (!isset($_POST['noform_pardev'])) ? "0" : $_POST['noform_pardev'];
	$noform_e_pasts =  (!isset($_POST['noform_e_pasts'])) ? "0" : $_POST['noform_e_pasts'];
	$noform_oficial =  (!isset($_POST['noform_oficial'])) ? "0" : $_POST['noform_oficial'];
	$apraksts = $_POST['apraksts'];
	$iesniegts_nav =  (!isset($_POST['iesniegts_nav'])) ? "0" : $_POST['iesniegts_nav'];
	$iesniegts_panel_foto =  (!isset($_POST['iesniegts_panel_foto'])) ? "0" : $_POST['iesniegts_panel_foto'];
	$iesniegts_mark_foto =  (!isset($_POST['iesniegts_mark_foto'])) ? "0" : $_POST['iesniegts_mark_foto'];
	$konstatets_datums = $_POST['konstatets_gads']."-".$_POST['konstatets_menes']."-".$_POST['konstatets_diena'];
	$veids=$_SESSION['PREFIKS'];
	$pret_id=$_SESSION['PREFIKS']."-".$_SESSION['REG_NR'];
	
	$sql = "INSERT INTO pretenzijas SET
	dokumenta_datums=:noform_datums,
	agents=:agents,
	iesniedzejs=:iesniedzejs,
	sanemsanas_datums=:sanemts_datums,
	produkcija=:produkcija,
	pasutijuma_nr=:pasutijuma_nr,
	daudzums_viss=:daudzums_viss,
	daudzums_pieg_part=:daudzums_pieg_part,
	pieg_part_nr=:pieg_part_nr,
	daudzums_atsev_paneli=:daudzums_atsev_paneli,
	daudzums_kvmet=:daudzums_kvmet,
	no_partijas=:no_partijas,
	par_laiks=:par_laiks,
	par_izkr_trans=:par_izkr_trans,
	par_izkr_iepak=:par_izkr_iepak,
	par_izkr_izpak=:par_izkr_izpak,
	par_piemont_jaun=:par_piemont_jaun,
	par_piemont_ekspl=:par_piemont_ekspl,
	noform_pardev=:noform_pardev,
	noform_e_pasts=:noform_e_pasts,
	noform_oficial=:noform_oficial,
	apraksts=:apraksts,
	iesniegts_nav=:iesniegts_nav,
	iesniegts_panel_foto=:iesniegts_panel_foto,
	iesniegts_mark_foto=:iesniegts_mark_foto,
	konstat_datums=:konstatets_datums,
	reg_nr=:reg_nr,
	veids=:veids,
	pret_id=:pret_id";
	
	$q = $db->prepare($sql);
	
	$data = array(
			':noform_datums'=>$noform_datums,
			':agents'=>$agents,
			':iesniedzejs'=>$iesniedzejs,
			':sanemts_datums'=>$sanemts_datums,
			':produkcija'=>$produkcija,
			':pasutijuma_nr'=>$pasutijuma_nr,
			':daudzums_viss'=>$daudzums_viss,
			':daudzums_pieg_part'=>$daudzums_pieg_part,
			':pieg_part_nr'=>$pieg_part_nr,
			':daudzums_atsev_paneli'=>$daudzums_atsev_paneli,
			':daudzums_kvmet'=>$daudzums_kvmet,
			':no_partijas'=>$no_partijas,
			':par_laiks'=>$par_laiks,
			':par_izkr_trans'=>$par_izkr_trans,
			':par_izkr_iepak'=>$par_izkr_iepak,
			':par_izkr_izpak'=>$par_izkr_izpak,
			':par_piemont_jaun'=>$par_piemont_jaun,
			':par_piemont_ekspl'=>$par_piemont_ekspl,
			':noform_pardev'=>$noform_pardev,
			':noform_e_pasts'=>$noform_e_pasts,
			':noform_oficial'=>$noform_oficial,
			':apraksts'=>$apraksts,
			':iesniegts_nav'=>$iesniegts_nav,
			':iesniegts_panel_foto'=>$iesniegts_panel_foto,
			':iesniegts_mark_foto'=>$iesniegts_mark_foto,
			':konstatets_datums'=>$konstatets_datums,
			':reg_nr'=>$reg_nr,
			':veids'=>$veids,
			':pret_id'=>$pret_id);
	
	$q->execute($data);
	
}
$pret_id= $_SESSION['PRET_ID'];
// var_dump ($akt_id);
if (strlen($pret_id)>0){
	var_dump ('Ieksa'.$pret_id);
	$sql ="SELECT * FROM tp_pretenzijas.pretenzijas where pret_id='.$pret_id.'";
	$q = $db->query($sql);
	while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$agent_list[]=$r;
		var_dump($r);
	}
	
	$noform_datums;
	$agents;
	$iesniedzejs;
	$sanemts_datums;
	$produkcija;
	$pasutijuma_nr;
	$daudzums_viss;
	$daudzums_pieg_part;
	$pieg_part_nr;
	$daudzums_atsev_paneli;
	$daudzums_kvmet;
	$no_partijas;
	$par_laiks;
	$par_izkr_trans;
	$par_izkr_iepak;
	$par_izkr_izpak;
	$par_piemont_jaun;
	$par_piemont_ekspl;
	$noform_pardev;
	$noform_e_pasts;
	$noform_oficial;
	$apraksts;
	$iesniegts_nav;
	$iesniegts_panel_foto;
	$iesniegts_mark_foto;
	$konstatets_datums;
	
}


?>

<form action="#" method="post">
<table>
  <tr>  <!-- 1 -->
    <td class="npk">1.</td>
    <td class="teksts">Šī dokumenta noformēšamas datums</td>
    <td class="ievade">
		<?php echo datums_select("","noform") ?>
      Izvēlaties noformēšanas datumu.
      </td>
  </tr>
  <tr>  <!--2  -->
    <td class="npk">2.</td>
    <td class="teksts">TENAPORS pārdevēja vārds un uzvārds, kas pieņēma pretenziju</td>
    <td class="ievade">
     <select name="agents">
          <?php
            foreach($agent_list as $agents){
				$magents=$agents["agenta_id"]." : ".$agents["agents"];
				echo "<option value='$magents'>$magents</option>";
            } 
          ?>
       </select>
	
    </td>
  </tr>
  <tr>  <!--3  -->
    <td class="npk">3.</td>
    <td class="teksts">Pretenzijas iesniedzējs (Uzņēmuma/privātpersonas nosaukums)
    </td>
    <td class="ievade"><input type="text" name="iesniedzejs" value="" size="70"></td>
  </tr>
  <tr>  <!--4  -->
    <td class="npk">4.</td>
    <td class="teksts">Datums, kad pieņemta pretenzija</td>
    <td class="ievade">
    <?php echo datums_select("","sanemts") ?>
      Izvēlaties pretenzijas pieņemšanas datumu
</td>
  </tr>
  <tr>  <!-- 5 -->
    <td class="npk">5.</td>
    <td class="teksts">Produkta tips un biezums, par kuru iztekta pretenzija</td>
    <td class="ievade"><input type="text" name="produkcija" value="" size="100"></td>
  </tr>
  <tr>  <!-- 6 -->
    <td class="npk">6.</td>
    <td class="teksts">Pasūtījums numurs, uz kuru attiecas pretenzija
	pievienot pasūtījuma kopiju Pielikumā</td>
    <td class="ievade"> <input type="text" name="pasutijuma_nr" value=""><br>
              <input type="file" name="filePas" id="filePas">
   </td>
  </tr>
    <tr>  <!--7  -->
    <td class="npk">7.</td>
    <td class="teksts">Preces daudzums, par kuru izteikta pretenzija</td>
    <td class="ievade"><input type="checkbox" name="daudzums_viss" value="1"> Viss pasūtījums<br>
                      <input type="checkbox" name="daudzums_pieg_part" value="1"> Piegādes partija(s) Nr.<input type="text" name="pieg_part_nr" value=""><br>
                      <input type="checkbox" name="daudzums_atsev_paneli" value="1"> Atsevišķi paneļi <input type="text" name="daudzums_kvmet" value="" size="7">
                      <select name="mervieniba">
                          <option value='kvm'>kv.m.</option>
                          <option value='m'>m</option>
                     </select>
                        piegādes partijā(s) Nr.<input type="text" name="no_partijas" value="" size="16"><br>
  </td>
  </tr>
  <tr>  <!-- 8 -->
    <td class="npk">8.</td>
    <td class="teksts">Pretenzijas objekts</td>
    <td class="ievade"><input type="checkbox" name="par_laiks" value="1"> Piegādes laiks <br>
						<input type="checkbox" name="par_izkr_trans" value="1"> Prece, kas ir izkrauta no transportlīdzekļa <br>
						<input type="checkbox" name="par_izkr_iepak" value="1"> Izkrauta, neizpakota prece <br>
						<input type="checkbox" name="par_izkr_izpak" value="1"> Izkrauta, izpakota prece <br>
						<input type="checkbox" name="par_piemont_jaun" value="1"> Piemontēta prece jaunbūvē<br>
						<input type="checkbox" name="par_piemont_ekspl" value="1"> Piemontēta prece ekspluatētā ēkā</td>
  </tr>
  <tr>  <!-- 9 -->
    <td class="npk">9.</td>
    <td class="teksts">Pretenzijas apraksts
	  </td>
    <td class="ievade"><input type="checkbox" name="noform_pardev" value="1"> Noformējis TENAPORS pārdevējs<br>
                      <input type="checkbox" name="noform_e_pasts" value="1"> Saņemta e-pasta vēstule no pretenzijas iesniedzēja<br>
                      <input type="checkbox" name="noform_oficial" value="1"> Saņemta oficiāla vēstule no pretenzijas iesniedzēja<br>
                      Komentārs: <input type="text" name="apraksts" value="" size="70"><br>
                      <input type="file" name="fileApr" id="fileApr">
    </td>
  </tr>
  <tr>  <!-- 10 -->
    <td class="npk">10.</td>
    <td class="teksts">Iesniegtās fotofiksācijas
	  </td>
    <td class="ievade"><input type="checkbox" name="iesniegts_nav" value="1"> Sūdzība attiecas uz piegādes laiku (foto nav nepieciešams)<br>
                      <input type="checkbox" name="iesniegts_panel_foto" value="1">Ir saņemta paneļa fotofuksācijas<br>
                      <input type="checkbox" name="iesniegts_mark_foto" value="1">Ir saņemta marķējuma fotofiksācijas<br>
                      <input type="file" name="fileFoto" id="fileFoto">
    </td>
  </tr>
    <tr>  <!--11  -->
    <td class="npk">11.</td>
    <td class="teksts">Datums, kad pretenzijas iesniedzējs ir ievērojis problēmu</td>
    <td class="ievade">
    <?php echo datums_select("","konstatets") ?>
      Izvēlaties datumu, kurā klients konstatējis problēmu.
</td>
  </tr>
  <tr>  <!-- 12 -->
    <td class="npk">12.</td>
    <td class="teksts">Pretenzijas reģistrācijas datums TENAPORS uzskaites sistēmā</td>
    <td class="ievade">Reģistrācijas datums tiks fiksēts automātiski</td>
  </tr>
 <tr>  <!-- 13 -->
<!--     <td class="npk">13.</td> -->
<!--     <td class="teksts">Pretenzijas reģistrācijas numurs</td> -->
<!--     <td class="ievade"><?php echo $reg_nr ?></td> -->
	
<!--   </tr> -->

 </table>
  <input type="submit" name="submit" value="Apstiprināt">
  </form>

    </div>
