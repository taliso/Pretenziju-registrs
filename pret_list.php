<?php

$pref=$_SESSION['PREFIKS'];
$sql = 'SELECT * FROM pretenzijas where veids="'.$pref.'"';
$q = $db->query($sql);
me('1','SQL pret',$sql);

$col_name=array('Reģ.Nr.','Datums','Pasūt.Nr','Klients','Produkcija','Aģents','Status');
echo '<table>';
$col_count=6;
$rin="";
for($kk=0;$kk<=$col_count;$kk++){
  	$rin=$rin.'<td class="htcol'.$kk.'">'.$col_name[$kk].'</td>';
  }
echo $rin;

while($r = $q->fetch(PDO::FETCH_ASSOC)){
	$stat="---";
	switch ($r['status']){
		case 'NEW':
			$stat='0';
			break;
		case 'PROCESSED':
			$stat='1';
			break;
		default:
			$stat='X';
			break;
	
	}
	
	
	
	
	
	$pret_list=array($r['pret_id'],$r['dokumenta_datums'],$r['pasutijuma_nr'],$r['iesniedzejs'],$r['produkcija'],$r['agents'],$stat);
$rin="";
$rin=list_row($col_count,$pret_list);
echo $rin;

}

echo '</table>';
?>

