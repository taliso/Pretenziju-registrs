<?php
session_regenerate_id();
$_SESSION['AGENTS'] = $lAgents;
$_SESSION['USER'] = $lUsername;
$_SESSION['TIESIBAS'] = $lTiesibas;
$_SESSION['AGENTA_ID'] = $lAgenta_id;
$_SESSION['LOMA'] = $lLoma;
$_SESSION['STRUKTURA'] = $lStrukt;
$_SESSION['FORMA'] = 'pret_list.php';
$_SESSION['FORM_TITLE'] = -1;
$_SESSION['NAVIG'] = -1;
$_SESSION['VERSIJA'] = $versija;
$_SESSION['PRET_ID'] = "";
$_SESSION['REG_NR'] = "";
$_SESSION['PREFIKS'] = "KM";
$_SESSION['PASUT_NR'] = "";
$_SESSION['KLIENTS'] = "";
$_SESSION['STATUS'] = "LIST"; // 'VIEW','EDIT',"VIEW_EVENT","EDIT_EVENT",'LIST'
$_SESSION['ID_PRET']="";
$_SESSION['PRET_STATUS']=""; // "NEW","REGISTER","DELETE","ARCHIVE"
$_SESSION['SAKUMA_DATUMS']="0000-00-00";
$_SESSION['NOTIKUMU_SK']="";
$_SESSION['IZDEVUMI']="";
$_SESSION['TASK_NR']=0;
$_SESSION['TASK_ID']="";
$_SESSION['EVENT_ID']="";
$_SESSION['TITLE'] = "Pretenziju saraksts";
$_SESSION['EVENT_FORMA'] ='';
$_SESSION['DEBUG'] ='';
session_write_close();
