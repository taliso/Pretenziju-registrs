<?php
session_regenerate_id();
$_SESSION['WAY'] = "CLAIM";  //"CLAIM"-pretenzija, "EVENT"-notikums,"TASK"- uzdevums
$_SESSION['STATUS'] = "LIST"; // 'VIEW','EDIT','LIST'
$_SESSION['TITLE'] = "Pretenziju saraksts";
$_SESSION['DEBUG'] ='';
$_SESSION['FORMA'] = 'pret_list.php';
$_SESSION['FORM_TITLE'] = -1;
$_SESSION['NAVIG'] = -1;
$_SESSION['VERSIJA'] = $versija;

$_SESSION['AGENTS']['VARDS'] = $lAgents;
$_SESSION['AGENTS']['PASTS'] = '';
$_SESSION['AGENTS']['ID'] = 0;
$_SESSION['AGENTS']['STRUKT'] = 0;

$_SESSION['USER']['VARDS'] = $lUsername;
$_SESSION['USER']['TIESIBAS'] = $lTiesibas;
$_SESSION['USER']['LOMA'] = $lLoma;
$_SESSION['USER']['STRUKT'] = $lStrukt;

$_SESSION['PRET']['REG_NR'] = "";
$_SESSION['PRET']['PREFIKS'] = "KM";
$_SESSION['PRET']['PASUT_NR'] = "";
$_SESSION['PRET']['KLIENTS'] = "";
$_SESSION['PRET']['ID'] = "";
$_SESSION['PRET']['STATUS']=""; // "LOADED","REGISTERED","PROCESS","DECISION" - lēmums,"ACCEPTED","CORRECTIVE"
$_SESSION['PRET']['ID']=0;
$_SESSION['PRET']['SAKUMS']="0000-00-00";
$_SESSION['PRET']['BEIGAS']="0000-00-00";
$_SESSION['PRET']['NOTIKUMU_SK']=0;
$_SESSION['PRET']['IZDEVUMI']="";

$_SESSION['TASK']['NR']=0;
$_SESSION['TASK']['KODS']="";
$_SESSION['TASK']['ID']="";
$_SESSION['TASK']['PERS_ID']="";
$_SESSION['TASK']['PERS_VARDS']="";
$_SESSION['TASK']['PERS_PASTS']="";
$_SESSION['TASK']['STATUS']="";

$_SESSION['EVENTS']['STATUS'] ="";
$_SESSION['EVENTS']['ID'] =0;
$_SESSION['EVENTS']['KODS'] ='';
$_SESSION['EVENTS']['PERS_SK'] =0;
$_SESSION['EVENTS']['FAIL_SK'] =0;
$_SESSION['EVENTS']['VEIDS'] =''; //UZDEVUMS, ZINOJUMS, LEMUMS, NOSLEGUMS, PREVENT
$_SESSION['EVENTS']['AGENTS'] ='';
$_SESSION['EVENTS']['FORMA'] ='';

session_write_close();
