<?php

$pref=$_SESSION['PREFIKS'];
$sql = 'SELECT * FROM pretenzijas where veids="'.$pref.'"';

$q = $db->query($sql);

$col_name=array('Reģ.Nr.','Datums','Pasūt.Nr','Klients','Produkcija','Aģents','Atbildīgais','Status');
echo '<table>';
$col_count=7;
$rin="";
for($kk=0;$kk<=$col_count;$kk++){
  	$rin=$rin.'<td class="htcol'.$kk.'">'.$col_name[$kk].'</td>';
  }
echo $rin;

while($r = $q->fetch(PDO::FETCH_ASSOC)){
	switch ($r['status']) {
		case 'NEW':
			$stat='0';
			break;
		case 'REGISTER':
			$stat='1';
			break;
		case 'PROCESSED':
			$stat='2';
			break;
	} 
	$pret_list=array($r['pret_id'],$r['dokumenta_datums'],$r['pasutijuma_nr'],$r['iesniedzejs'],$r['produkcija'],$r['agents'],$r['atbildigais'],$stat);
$rin="";
$rin=list_row($col_count,$pret_list);
echo $rin;

}

echo '</table>';
?>

