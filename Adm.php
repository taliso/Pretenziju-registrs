<?php
/**
 * Created by PhpStorm.
 * User: talivaldis.olekss
 * Date: 30.04.2017
 * Time: 00:26
 */ ?>

<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "config.php";
include "funkcijas.php";
include "konekcija.php";
include "\\phpmailer\\mailset.php";
if (!isset($_SESSION['USER']['STATUS'])){
    include 'sesion_list.php';
}
$datums=datums();
define("MAX_FILE_SIZE",5000000);
$target_dir = 'uploads'; ?>

<!DOCTYPE html>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	 <link rel="stylesheet" type="text/css" href="pretenz.css" />
	 <link rel="stylesheet" type="text/css" href="teksti.css" />
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="jquery/jquery-ui.theme.min.css">
	 <link rel="stylesheet" href="jquery/jquery-ui.structure.min.css">
	 <link rel="stylesheet" href="jquery/jquery-ui.theme.min.css">
	 <script src="jquery/jquery-3.1.1.min.js"></script>
	 <script src="jquery/jquery-ui.min.js"></script>

  <title>Pretenzijas (administrēšana)</title>
</head>

<body>
<?php
if (isset($_POST['admin_save'])){
    if ($_SESSION['ADMIN']['STATUS']=='NEW') {
        $sql = "INSERT INTO kl_agenti SET ";
        $sql = $sql . "
			 	  	agents=:agents ,
			 	  	username=:username ,
			   		epasts=:epasts ,
			   		esutit=:esutit ,
			   		aktivs=:aktivs";


    }
    if ($_SESSION['ADMIN']['STATUS']=='EDIT') {
        $sql = "UPDATE kl_agenti SET ";
        $sql=$sql."
 			 	  	agents=:agents ,
			 	  	username=:username ,
			   		epasts=:epasts ,
			   		esutit=:esutit ,
			   		aktivs=:aktivs where ID=".$_SESSION['ADMIN']['ID'];
    }

    if ($_SESSION['ADMIN']['STATUS']=='EDIT' or $_SESSION['ADMIN']['STATUS']=='NEW') {
        $q = $db->prepare($sql);
        $data = array(
            ':agents' => $_POST['agents'],
            ':username' => $_POST['username'],
            ':epasts' => $_POST['epasts'],
            ':esutit' =>(!isset($_POST['esutit'])) ? "0" : "1",
            ':aktivs' =>(!isset($_POST['aktivs'])) ? "0" : "1");

        $q->execute($data);
    }
    $_SESSION['ADMIN']['STATUS']='VIEW';
}

if (isset($_POST['admin_new'])){
    $_SESSION['ADMIN']['STATUS']='NEW';
}

if (isset($_POST['admin_edit'])){
    $_SESSION['ADMIN']['STATUS']='EDIT';
}

if (isset($_POST['admin_canc'])){
    $_SESSION['ADMIN']['STATUS']='VIEW';
}

if (isset($_POST['admin_passw'])){
    $_SESSION['ADMIN']['SUBFORM']='password';
}

if (isset($_POST['adm_psw_accept'])){
    if ($_POST['parole']==$_POST['parole2']){
        $pasw=$_POST['parole'];
        sqlupdate('pasword',$pasw,'kl_agenti',' id='.$_SESSION['ADMIN']['ID'],$db);
    }
    $_SESSION['ADMIN']['SUBFORM']='';

}
if (isset($_POST['adm_psw_cancel'])){
    $_SESSION['ADMIN']['SUBFORM']='';
}

if (isset($_POST['admin_loma'])){
    $_SESSION['ADMIN']['SUBFORM']='role';

}

if (isset($_POST['adm_role_accept'])){
    $_SESSION['ADMIN']['SUBFORM']='';
    $sRole=$_POST['loma'];
    $aRoles=sqltoarray(' ID, kods ', 'kl_lomas', " nosaukums='".$sRole."'", $db);
    $Role=$aRoles[0];
    sqlupdate('loma',$Role['kods'],'kl_agenti',' id='.$_SESSION['ADMIN']['ID'],$db);

}
if (isset($_POST['admin_strukt'])){
    $_SESSION['ADMIN']['SUBFORM']='atrukture';

}

if (isset($_POST['admin_strukt_accept'])){
    $_SESSION['ADMIN']['SUBFORM']='';
    $sRole=$_POST['struktura'];
    $aRoles=sqltoarray(' ID, kods, nosaukums ', 'kl_strukturas', " nosaukums='".$sRole."'", $db);
    $Role=$aRoles[0];
    sqlupdate('struktura_kods',$Role['kods'],'kl_agenti',' id='.$_SESSION['ADMIN']['ID'],$db);
    sqlupdate('struktura',$Role['nosaukums'],'kl_agenti',' id='.$_SESSION['ADMIN']['ID'],$db);

}
?>

<form action="#" method="post" enctype="multipart/form-data">
    <?php
    include "admin_general.php"; ?>
</form>
</body>
</html>
