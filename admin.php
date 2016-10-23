<?php

$sql = "SELECT agenta_id, agents,pasword, tiesibas FROM kl_agenti";
$q = $db->query($sql);
//ielasa izgūtos datus asociatīvajā masīvā
while($r = $q->fetch(PDO::FETCH_ASSOC)){
	$agent_admin[]=$r;
}

if (isset($_POST['bt_add'])) {
	// Formējam INSERT rindu
	//2016-10-22

	$agenta_id = $_POST['agenta_id'];
	$agents = $_POST['agents'];
	$pasword = $_POST['pasword'];
	$tiesibas = $_POST['tiesibas'];

	$sql = "INSERT INTO kl_agenti SET
 		      	agenta_id=:agenta_id,
   	    		agents=:agents,
   	    		pasword=:pasword,
        		tiesibas=:tiesibas";
        		
	$q = $db->prepare($sql);
	
	$data = array(
			':agenta_id'=>$agenta_id,
			':agents'=>$agents,
			':pasword'=>$pasword,
			':tiesibas'=>$tiesibas,
	);
	
	$q->execute($data);
}

?>
<div>
<form action="#" method="post">
<div id="divAdmin">Administrēšana</div>
<table>
  <tr>
    <td id="t_npk">Nr.p.k.</td>
    <td id="t_kods">Kods</td>
    <td id="t_agents">Aģents</td>
    <td id="t_pasword">Parole</td>
    <td id="t_tiesibas">Tiesības</td>
  </tr>
   </table>
  </form>

  </div>
