
<?php
/* PIESLĒGŠANĀS PARAMETRI */
//Tiek definētas kostantes
define("HOST", "127.0.0.1");
define("USER", "root");
define("DB", "tp_pretenzijas");
define("PASS", "");
/* PIESLĒGŠANĀS BATUBĀZEI */
//Definētās konstantes tiek izmantotas
$db = new PDO("mysql:host=".HOST.";dbname=".DB,USER,PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//Parametrs, kas nosaka, ka kļūdas tiks izvadītas uz ekrāna
//Kamēr izstrādā programmu, ir ļoti noderīgs
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
