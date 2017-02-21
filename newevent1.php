  <?php 
$estrukt="";
$epersona="";
$edatums="";
$euzdevums="";
	
//$list_teh=sqltoarray('agents','kl_agenti','struktura_kods="TEH"',$db);

$fields='agents';
$ftabula='kl_agenti';
$fwhere='struktura_kods="TEH"';
$sql ='SELECT agents, struktura_kods FROM kl_agenti';

$q = $db->query($sql);
$list_teh='';
$list_lab='';
$list_log='';

while($r = $q->fetch(PDO::FETCH_ASSOC)){
	if (trim($r['struktura_kods'])=='TEH') {
		$list_teh[]=$r['agents'];
	}
	if (trim($r['struktura_kods'])=='LAB') {
		$list_lab[]=$r['agents'];
	}
	if (trim($r['struktura_kods'])=='LOG') {
		$list_log[]=$r['agents'];
	}
	
}

