<?php
$sql = "SELECT * FROM pretenzijas where veids='SP'";
$q = $db->query($sql);
$r = $q->fetch(PDO::FETCH_ASSOC);
$col_name=array('Reģ.Nr.','Veids','Datums','Aģents','Sūdzmanis','Pasūt.Nr','Produkcija');
echo '<table>';
$col_count=6;
$rin="";
for($kk=0;$kk<=$col_count;$kk++){
	$rin=$rin.'<td class="tab_col_name"><input type="text" name="kolonna'.$kk.'" value="'.$col_name[$kk].'"></td>';
}
echo $rin;

while($r = $q->fetch(PDO::FETCH_ASSOC)){
	$pret_list=array($r['reg_nr'],$r['veids'],$r['dokumenta_datums'],$r['agents'],$r['iesniedzejs'],$r['pasutijuma_nr'],$r['produkcija'],);
$rin="";
$rin=list_row(6,$pret_list);
echo $rin;

}
echo '</table>';
?>

