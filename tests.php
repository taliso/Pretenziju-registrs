<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h1>Pieslēgšanās datubāzei</h1>
        <h3>Datu ievietošana</h3>
<?php
/* PIESLĒGŠANĀS PARAMETRI */
//Tiek definētas kostantes
define("HOST", "127.0.0.1");
define("USER", "root");
define("DB", "phpshack");
define("PASS", "");
/* PIESLĒGŠANĀS BATUBĀZEI */
//Definētās konstantes tiek izmantotas
$db = new PDO("mysql:host=".HOST.";dbname=".DB,USER,PASS,
              array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//Parametrs, kas nosaka, ka kļūdas tiks izvadītas uz ekrāna
//Kamēr izstrādā programmu, ir ļoti noderīgs
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
if (isset($_POST['form-submit']))
{
    $atext = $_POST['atext'];
    $btext = $_POST['btext'];
    
    $sql = "INSERT INTO data SET title=:atext, text=:btext";
    $q = $db->prepare($sql);
    $q->execute(array(':atext'=>$atext,':btext'=>$btext));
}
?>
        <form action='tests.php' method='post'>
            <input type='text' name='atext'><br />
            <input type='text' name='btext'><br />
            <input type='submit' name='form-submit'>
        </form>
        
    </body>
</html>