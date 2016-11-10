<?php
$sql = "SELECT * FROM pretenzijas where veids='SP'";
$q = $db->query($sql);
$r = $q->fetch(PDO::FETCH_ASSOC);

while($r = $q->fetch(PDO::FETCH_ASSOC)){
	$pret_list[]=$r;
	echo '<li><a href="?menu='.$key.'">'.$r['reg_nr'].\t.$r['veids'].\t.$r['dokumenta_datums'].\t.$r['sanemsanas_datums'].\t.$r['agents'].\t.$r['pasutijuma_nr'].\t.'</a></li>';
}?>