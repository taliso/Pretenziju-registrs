<?php

$pref=$_SESSION['PRET']['PREFIKS'];
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

$pret_list=array($r['pret_id'],$r['dokumenta_datums'],$r['pasutijuma_nr'],$r['iesniedzejs'],$r['produkcija'],$r['agents'],$r['status']);
$rin="";
//$rin=list_row($col_count,$pret_list);
    $tab_row = "";
    $tab_row = '<tr>';
    $tab_col="";
    $k = 0;

    for($k = 0; $k <= $col_count; $k ++) {
        if ($k == 0) {
            $tab_col = '<td class="tcol0"><a href="?pret_id=' . $pret_list [$k] . '">' . $pret_list [$k] . '</td>';
        } else {
            if ($k == $col_count) {
                $tab_col = '<td class="tcol' . $k . '">'. BarIndikator09($r['status']) . '</td>';
            } else {
                       $tab_col = '<td class="tcol' . $k . '">' . $pret_list [$k].'</td>';
        			}
         }
        $tab_row = $tab_row . $tab_col ;
    }
    $tab_row = $tab_row . '</tr>';

echo $tab_row;

}

echo '</table>';
?>

