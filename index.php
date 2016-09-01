<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
 <link rel="stylesheet" type="text/css" href="pretenz.css">
</head>
<body>

<h2>Pretenziju noformēšanas veidlapa<h2>
<h2>Sendvičpaneļi, palīgdetaļas un montāžas materiāli<h2>
<h1>1. VISPĀRĪGĀ INFORMĀCIJA PAR PRETENZIJU</h1>

<?php
/* PIESLĒGŠANĀS PARAMETRI */
//Tiek definētas kostantes
define("HOST", "10.0.4.7");
define("USER", "root");
define("DB", "tp_pretenzijas");
define("PASS", "1labaparole");
/* PIESLĒGŠANĀS BATUBĀZEI */
//Definētās konstantes tiek izmantotas
$db = new PDO("mysql:host=".HOST.";dbname=".DB,USER,PASS,
              array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//Parametrs, kas nosaka, ka kļūdas tiks izvadītas uz ekrāna
//Kamēr izstrādā programmu, ir ļoti noderīgs
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

define(fdokumenta_datums, date);
define("HOST", "10.0.4.7");

if (isset($_POST['form-submit']))
{
    $atext = $_POST['atext'];
    $btext = $_POST['btext'];
    
    $sql = "INSERT INTO data SET title=:atext, text=:btext";
    $q = $db->prepare($sql);
    $q->execute(array(':atext'=>$atext,':btext'=>$btext));
}
?>


<table style="width:70%">
  
  <tr>  <!--- 1 --->
    <td class="npk">1.</td>
    <td class="teksts">Šī dokumenta noformēšamas datums</td>
    <td class="ievade">                                
	<input type="text" name="dokumenta_datums" value="00.00.2016"</td>
  </tr>
  <tr>  <!---2  --->
    <td class="npk">2.</td>
    <td class="teksts">TENAPORS pārdevēja vārds un uzvārds, kas pieņēma pretenziju</td>
    <td class="ievade">                                </td>
  </tr>
  </table>
  
  <table style="width:70%">
  <tr>  <!---3  --->
    <td class="npk">3.</td>
    <td class="teksts">Pretenzijas iesniedzējs </br>
	(Uzņēmuma/privātpersonas nosaukums)</td>
    <td class="ievade">                                </td>
  </tr>
  <tr>  <!---4  --->
    <td class="npk">4.</td>
    <td class="teksts">Datums, kad pieņemta pretenzija</td>
    <td class="ievade">                                </td>
  </tr>
  <tr>  <!--- 5 --->
    <td class="npk">5.</td>
    <td class="teksts">Produkta tips un biezums, par kuru iztekta pretenzija</td>
    <td class="ievade">                                </td>
  </tr>
  <tr>  <!--- 6 --->
    <td class="npk">6.</td>
    <td class="teksts">Pasūtījums numurs, uz kuru attiecas pretenzija
	pievienot pasūtījuma kopiju Pielikumā</td>
    <td class="ievade">                                </td>
  </tr>
    <tr>  <!---7  --->
    <td class="npk">7.</td>
    <td class="teksts">Preces daudzums, par kuru iztekta pretenzija</td>
    <td class="ievade"><input type="checkbox" name="vehicle1" value="Bike"> I have a bike</td>
  </tr>
  <tr>  <!--- 8 --->
    <td class="npk">8.</td>
    <td class="teksts">Pretenzijas objekts</td>
    <td class="ievade"><input type="checkbox" name="par_laiks" value="Bike"> Piegādes laiks </br>
						<input type="checkbox" name="par_izkr_trans" value="Bike"> Prece, kas ir izkrauta no transportlīdzekļa </br>
						<input type="checkbox" name="par_izkr_iepak" value="Bike"> Izkrauta, neizpakota prece </br>
						<input type="checkbox" name="par_izkr_izpak" value="Bike"> Izkrauta, izpakota prece </br>
						<input type="checkbox" name="par_piemont_jaun" value="Bike"> Piemontēta prece jaunbūvē</br>
						<input type="checkbox" name="par_piemont_ekspl" value="Bike"> Piemontēta prece ekspluatētā ēkā</td>
  </tr>
  <tr>  <!--- 9 --->
    <td class="npk">9.</td>
    <td class="teksts">Pretenzijas apraksts
	pievienot pretenzijas aprakstu Pielikumā</td>
    <td class="ievade">                                </td>
  </tr>
  <tr>  <!--- 10 --->
    <td class="npk">10.</td>
    <td class="teksts">Iesniegtās fotofiksācijas
	pievienot Pielikumā</td>
    <td class="ievade">                                </td>
  </tr>
    <tr>  <!---11  --->
    <td class="npk">11.</td>
    <td class="teksts">Datums, kad pretenzijas iesniedzējs ir ievērojis problēmu</td>
    <td class="ievade">                                </td>
  </tr>
  </table>
  
 <table style="width:70%">
  <tr>  <!--- 12 --->
    <td class="npk">12.</td>
    <td class="teksts">Pretenzijas reģistrācijas datums TENAPORS uzskaites sistēmā</td>
    <td class="ievade">                                </td>
  </tr>
 <tr>  <!--- 13 --->
    <td class="npk">13.</td>
    <td class="teksts">Pretenzijas reģistrācijas numurs</td>
    <td class="ievade">                                </td>
  </tr>
 
 </table>



</body>
</html>
