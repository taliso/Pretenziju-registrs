
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<h1>Pieslēgšanās datubāzei</h1>
<h3>Datu izgūšana</h3>
<?php
/* PIESLĒGŠANĀS PARAMETRI */
//Tiek definētas kostantes
define("HOST", "127.0.0.1");
define("USER", "root");
define("DB", "itcrowd");
define("PASS", "");
/* PIESLĒGŠANĀS BATUBĀZEI */
//Definētās konstantes tiek izmantotas
$db = new PDO("mysql:host=".HOST.";dbname=".DB,USER,PASS,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//Parametrs, kas nosaka, ka kļūdas tiks izvadītas uz ekrāna
//Kamēr izstrādā programmu, ir ļoti noderīgs
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
/* DATU IZGŪŠANA */
$data = array();
//Vaicājums
$sql="SELECT id,name FROM room";
//Izpilda vaicājumu
//'or die' liek kodam apstāties, ja vaicājumu DB serveris nevar izpildīt (kļūda)
$q = $db->query($sql) or die("KĻŪDA!");
//ielasa izgūtos datus asociatīvajā masīvā
//masīva elementu atslēgas ir DB tabulas kolonnu nosaukumi
//piem., $data['username']
while($r = $q->fetch(PDO::FETCH_ASSOC)){
	$data[]=$r;
}
//ALTERNATĪVA: Datu izvadīšana uzreiz iekš WHILE cikla
//Nav nepieciešams FOREACH
//Tomēr rekomendēju izmantot variantu ar FOREACH
//while($r = $q->fetch(PDO::FETCH_ASSOC)){
//    echo $r['id']. " : ".$r['name'];
//    echo "<br />";
//}
//FOREACH cikls iet caur $data apakšmasīviem (izgūtās rindiņas)
//un attēlo informāciju uz ekrāna
foreach ($data as $row)
{
	echo $row['id']. " : ".$row['name'];
	echo "<br />";
}
?>
    </body>
</html>