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
$target_dir = 'uploads';

// ******************************************W*********************************
//*	Mainigie:
//* 		$autor_ir - false/true - ir vai nav notikusi veiksmīga autorizācija
$autor_ir = 0;
$pref="";
$reg_nr="";
$MainInfo="";
$form="";
$prstatus="";


if (isset($_SESSION['INFO'])){
	$MainInfo=$_SESSION['INFO'];
}
//timer_start();
?>

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
 
  <title>Pretenzijas</title>
</head>

<body>

	<?php 
  	//*********  IELĀDĒJAM AĢENTU SARAKSTU MASĪVĀ $agent_list ******************************
  	
  	$sql = "SELECT * FROM kl_agenti";
  	$q = $db->query($sql);
  	while($r = $q->fetch(PDO::FETCH_ASSOC)){
  		if ($r['loma']=='A') {
  			$agent_list[]=$r;
  		}
        if ($r['loma']=='T') {
            $teh_list[]=$r;
        }
        if ($r['loma']=='Q') {
            $qual_list[]=$r;
        }

  		$liet_list[]=$r;
   	}
   	//______________  IELĀDĒJAM KVALITĀTES PERSONU _________________________________________
    if (isset($qual_list)) {
        $_SESSION['QUALITY']['ID'] = $qual_list[0]['ID'];
        $_SESSION['QUALITY']['VARDS'] = $qual_list[0]['agents'];
        $_SESSION['QUALITY']['TIESIBAS'] = $qual_list[0]['tiesibas'];
        $_SESSION['QUALITY']['LOMA'] = $qual_list[0]['loma'];
        $_SESSION['QUALITY']['EPASTS'] = $qual_list[0]['epasts'];
    }
    //*********  IELĀDĒJAM MENJU SARAKSTU MASĪVĀ $menju_list ******************************
//
//  	$sql = "SELECT * FROM menju";
//  	$q = $db->query($sql);
//  	while($r = $q->fetch(PDO::FETCH_ASSOC)){
//  		$menju_list[]=$r;
//  	}
  	//*********  IELĀDĒJAM SISTĒMAS DATUS ***************************************************
  	$sql = "SELECT * FROM dati";
  	$q = $db->query($sql);
  	$r = $q->fetch(PDO::FETCH_ASSOC);
    $_SESSION['VERSIJA']=$r['versija_koncep'].'-'.$r['versija_db'].'-'.$r['versija_kods'];
    //$_SESSION['MAIL']=$r['mail'];






 //#######################    Failu pievienošana veidlapā  ##########################################
 if (isset($_POST['doc_to_pret'])) {
 	
 	$file_get_list=array_keys($_FILES);
 	foreach ($file_get_list as $f_key) {
 		$k=0;
 		$submit_name='';
 		$source='';
 		$identif='';
 		$cmdDel=0;
 		
 		$name=$_FILES[$f_key]['name'];
 		$type=$_FILES[$f_key]['type'];
 		$tmp_name=$_FILES[$f_key]['tmp_name'];
 		$size=$_FILES[$f_key]['size'];
 		$source='pretenzijas';
 		$identif=$_SESSION['PRET']['KODS'];
 		$konv_name=substr($source,0,4).'_'.$identif.'_'.$f_key.'_'.$name;
  		
 			$submit_name=$f_key;

 		if (strlen($name)>0) {
 			$konv_name='tmp\\'.$konv_name;

			$a = copy($tmp_name,$konv_name);

 			$sql = "INSERT INTO tmp_files SET ";
 			$sql=$sql."
			 	  	submit_name=:submit_name ,
			 	  	source=:source ,
			 	  	identif=:identif ,
					name=:name ,
			 	  	type=:type ,
			   		tmp_name=:tmp_name ,
			 		size=:size ,
			   		cmdDel=:cmdDel";
 		
 			$q = $db->prepare($sql);
 		
 			$pret_id=$_SESSION['PRET']['KODS'];
 			$data = array(
 					':submit_name'=>$submit_name,
 					':source'=>$source,
 					':identif'=>$identif,
 					':name'=>$name,
 					':type'=>$type,
 					':tmp_name'=>$konv_name,
 					':size'=>$size,
 					':cmdDel'=>$cmdDel);
 				
 			$q->execute($data);
 		}
  		
 	}

 }
 
//***   IZVELE NO SARAKSTA  ********************************************************************   	 
if (isset($_GET['pret_id'])){
    $_SESSION['PRET']['KODS']=$_GET['pret_id'];

 	$_SESSION['STATUS']="VIEW";
 	$_SESSION['WAY']="CLAIM";
// VISI dati par pretenziju => SESSION['PRET']
 	$fwhere=" pret_id='".$_SESSION['PRET']['KODS']."'";
    $pretenz=sqltoarray(' * ', 'pretenzijas', $fwhere, $db);
 	$r=$pretenz[0];

 //	var_dump($r );
 	$_SESSION['PRET']['STATUS']=$r['status'];
 	$_SESSION['PRET']['ID']=$r['ID'];
 	$_SESSION['PRET']['REG_NR'] = $r['reg_nr'];
 	$_SESSION['PRET']['PREFIKS'] = $r['veids'];
 	$_SESSION['PRET']['PASUT_NR'] = $r['pasutijuma_nr'];
 	$_SESSION['PRET']['KLIENTS'] = $r['iesniedzejs'];
	$_SESSION['PRET']['SAKUMS']=$r['sakuma_datums'];
	$_SESSION['PRET']['NOTIKUMU_SK']=$r['notikumu_sk'];
	$_SESSION['PRET']['BEIGAS']=$r['beigu_dat'];
	$_SESSION['PRET']['IZDEVUMI']=$r['izdevumi'];
   	$_SESSION['TITLE'] = "Pretenzijas veidlapa";
// IELĀDĒJAM datus par AGENTU
    if(strlen($r['agents'])>0){
        $fwhere=" agents='".$r['agents']."'";
        $agenti=sqltoarray(' * ', 'kl_agenti', $fwhere, $db);
        $agents=$agenti[0];

        $_SESSION['AGENTS']['VARDS'] = $agents['agents'];
        $_SESSION['AGENTS']['PASTS'] = $agents['epasts'];
        $_SESSION['AGENTS']['ID'] = $agents['ID'];
        $_SESSION['AGENTS']['STRUKT'] = $agents['struktura_kods'];
    }

// IELĀDEJAM DATUS par KLIENTU

   	 } else {
   	 	$pret_id="";
}

//###################  IEIET SISTĒMĀ  ################################################
 if (isset($_POST['btIeiet'])) {

	$user = $_POST['user'];
	$psw = $_POST['psw'];
	foreach($liet_list as $usr){
        $luser=$usr['username'];
		$lPsw=$usr['pasword'];
		if($luser==$user){
            $_SESSION['USER']['STATUS'] = 1;  					// Autorizācijas pirmais solis - username sakrita
			if($lPsw==$psw){

		//	    include 'sesion_list.php';

                $_SESSION['USER']['ID']=$usr['ID'];
                $_SESSION['USER']['VARDS']=$usr['agents'];
                $_SESSION['USER']['TIESIBAS']=$usr['tiesibas'];
                $_SESSION['USER']['LOMA']=$usr['loma'];
                $_SESSION['USER']['STRUKT']=$usr['struktura_kods'];
                $_SESSION['USER']['STATUS'] = 2;
				$MainInfo="Autorizācija ir veiksmīga";
			} else {
                $_SESSION['USER']['ID']=0;
                $_SESSION['USER']['VARDS']='';
                $_SESSION['USER']['TIESIBAS']='';
                $_SESSION['USER']['LOMA']='';
                $_SESSION['USER']['STRUKT']='';
                $_SESSION['USER']['STATUS'] = 0;
                $MainInfo="Autorizācija ir neveiksmīga !!!!";
            }
		}
	}
}	

include 'event_tools.php';
include 'task_tools.php';


//###################  IZIET  ############################################################
if (isset($_POST['btIziet'])) {
	$_SESSION['USER']['STATUS']=0;
    include 'sesion_list.php';
}
//###################  PRETENZIJAS VEIDS  ################################################
if(isset($_GET['mTools'])){
	$arKey=$_GET['mTools'];
	if ($arKey=="mnEPS"){
		$_SESSION['FORMA'] = 'pret_list.php';
		$_SESSION['PRET']['PREFIKS'] ="EPS";
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['WAY']='CLAIM';
	}
	if ($arKey=="mnKM"){
		$_SESSION['FORMA'] = 'pret_list.php';
		$_SESSION['PRET']['PREFIKS'] ="KM";
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['WAY']='CLAIM';
	}
	if ($arKey=="mnIEK"){
		$_SESSION['FORMA'] = 'pret_list.php';
		$_SESSION['PRET']['PREFIKS'] ="IEK";
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['WAY']='CLAIM';
	}
}

//###################  PRETENZIJAS NAVIGĀCIJA  ################################################
if(isset($_GET['navig'])){
	
	$_SESSION['NAVIG']=$_GET['navig'];
	$navig=$_GET['navig'];
	
	if($navig=='mnLists'){
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['WAY']="CLAIM";
	}
	
	if($navig=='mnEdit'){
		$_SESSION['STATUS'] = "EDIT";
	}

	if($navig=='mnNew'){

		if ($_SESSION['WAY'] == 'CLAIM'){
				
				$_SESSION['STATUS'] = "NEW";
                $_SESSION['PRET']['ID']=max_id('pretenzijas',$db)+1;
                $_SESSION['PRET']['STATUS']=0;

				if ($_SESSION['PRET']['PREFIKS'] =="EPS"){
					$_SESSION['TITLE'] = "EPS pretenzijas veidlapa. Jauna.";
                    $_SESSION['PRET']['REG_NR']=NextNR('pretenzijas','veids',$_SESSION['PRET']['PREFIKS'],$db);
                    $_SESSION['PRET']['KODS'] =$_SESSION['PRET']['PREFIKS']."-".$_SESSION['PRET']['REG_NR'];
				} //$_SESSION['PRET']['PREFIKS'] =="EPS"

				if ($_SESSION['PRET']['PREFIKS'] =="KM"){
					$_SESSION['TITLE'] = "KM pretenzijas veidlapa. Jauna.";
                    $_SESSION['PRET']['REG_NR']=NextNR('pretenzijas','veids',$_SESSION['PRET']['PREFIKS'],$db);
                    $_SESSION['PRET']['KODS'] =$_SESSION['PRET']['PREFIKS']."-".$_SESSION['PRET']['REG_NR'];
				} //$_SESSION['PRET']['PREFIKS'] =="KM"
		}	//$_SESSION['STATUS'] == "VIEW"
	}  //$navig=='mnNew'
	
	if($navig=='mnTasks'){
		$_SESSION['WAY'] = 'TASK';
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['TITLE'] = "Tavu uzdevumu saraksts";
	}
		
	if($navig=='mnEvent'){
		$_SESSION['WAY'] = 'EVENT';
		$_SESSION['STATUS'] = "LIST";
		$_SESSION['TITLE'] = "Notikumu saraksts";
        $_SESSION['EVENTS']['AGENTS'] = $_SESSION['AGENTS'];
	}

	if($navig=='mnAdmin'){
		$_SESSION['WAY'] = "ADMIN";
		$_SESSION['STATUS'] = "LIST";
	}
}

//#########################  PRETENZIJAS  SAVE   ################################################################
if (isset ( $_POST ['pret_save'] )) {

    if ($_SESSION['SAVESTATUS'] =="0") {
        include 'veidlapa_KM_save.php';
        // echo 'Pēc save:'.timer_end();
//        $_SESSION['STATUS'] = "LIST";
        $_SESSION['TITLE'] = "Pretenziju saraksts";
        if ($_SESSION['MAIL'] == 'Y'&& $_SESSION['STATUS'] != "ERROR") {
            if ($_SESSION['PRET']['STATUS'] == '0') {

                $to = $_SESSION['QUALITY']['EPASTS'];
                $sub = 'Jauna pretenzija Nr. ' . $_SESSION['PRET']['KODS'];

                $body = '<p style="color:#731d09; font-family:verdana; font-size:14px;" > Ir registreta jauna pretenzija Nr. ' . $_SESSION['PRET']['KODS'] . '.</p>';

                $body .='<p style="color:blue;font-size: 12px;font-family: verdana;" >Pretenziju ievadīja ' . $_SESSION['USER']['VARDS'] . ' </p>';
                $body .='<p style="color:#565c59;font-size: 12px;font-family: verdana;" >Lūdzu nozīmēt atbildīgos.</p>';

                $body .='<p style="font-size:8px; font-family:verdana;">Informācija par šo pretenziju ir pieejama  <a href="' .$_SESSION['URL'].'">šeit</a></p>';
                $body .='<p style="font-size:10px; font-family:verdana;">Pretenziju pārvaldības sistēma.</p>';
                MailTo($to, $sub, $body, $mail);

            } else {

                $to = $_SESSION['QUALITY']['EPASTS'];
                $sub = 'Pretenzija Nr. ' . $_SESSION['PRET']['KODS'].' ir labota.';

                $body = '<p style="color:#731d09; font-family:verdana; font-size:14px;" > Ir labota pretenzija Nr. ' . $_SESSION['PRET']['KODS'] . '.</p>';

                $body .='<p style="color:blue;font-size: 12px;font-family: verdana;" >Pretenziju laboja ' . $_SESSION['USER']['VARDS'] . ' </p>';

                $body .='<p style="font-size:8px; font-family:verdana;">Informācija par šo pretenziju ir pieejama  <a href="' .$_SESSION['URL'].'">šeit</a></p>';
                $body .='<p style="font-size:10px; font-family:verdana;">Pretenziju pārvaldības sistēma.</p>';
                MailTo($to, $sub, $body, $mail);
            }
        }
        $_SESSION['STATUS'] = "LIST";
    } else {
        $_SESSION['STATUS'] = "LIST";
        $_SESSION['TITLE'] = "Pretenziju saraksts";
    }
    $_SESSION['SAVESTATUS'] ="1";
 //   header('Location: http://www.example.com/');
}
//#########################  PRETENZIJAS  CANCEL   ################################################################
if (isset ( $_POST ['pret_cancel'] )) {
	$sql="DELETE FROM `tmp_files`";
	$q = $db->query($sql);
	$_SESSION['STATUS'] = "LIST";
	$_SESSION['FORMA'] = 'pret_list.php';
	$_SESSION['TITLE'] = "Pretenziju saraksts";
}
if ($_SESSION['USER']['STATUS']==2){
		//<<<<<<<<<<<<<   Formas izvēle   >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		if 	($_SESSION['WAY']=='CLAIM'){
			if ($_SESSION['STATUS'] == "LIST") {
				$_SESSION['FORMA'] = 'pret_list.php';
			}
			
			if ($_SESSION['STATUS'] == "EDIT") {
				
				if ($_SESSION['PRET']['PREFIKS'] =="KM"){
					$_SESSION['FORMA'] = 'veidlapa_KM_edit.php';
				}
				if ($_SESSION['PRET']['PREFIKS'] =="EPS"){
					$_SESSION['FORMA'] = "veidlapa_EPS_edit.php";
				}
				if ($_SESSION['PRET']['PREFIKS'] =="IEK"){
					$_SESSION['FORMA'] = "veidlapa_IEK_edit.php";
				}
			}

			if ($_SESSION['STATUS'] == "NEW") {
				
				if ($_SESSION['PRET']['PREFIKS'] =="KM"){
					$_SESSION['FORMA'] = 'veidlapa_KM_edit.php';
				}
				if ($_SESSION['PRET']['PREFIKS'] =="EPS"){
					$_SESSION['FORMA'] = "veidlapa_EPS_edit.php";
				}
				if ($_SESSION['PRET']['PREFIKS'] =="IEK"){
					$_SESSION['FORMA'] = "veidlapa_IEK_edit.php";
				}
		
			}
			if ($_SESSION['STATUS'] == "VIEW") {
				if ($_SESSION['PRET']['PREFIKS'] =="KM"){
					$_SESSION['FORMA'] = 'veidlapa_KM_view.php';
				}
				if ($_SESSION['PRET']['PREFIKS'] =="EPS"){
					$_SESSION['FORMA'] = "veidlapa_EPS_view.php";
				}
				if ($_SESSION['PRET']['PREFIKS'] =="IEK"){
					$_SESSION['FORMA'] = "veidlapa_IEK_view.php";
				}
			}
		}
		
		if 	($_SESSION['WAY']=='EVENT'){
				
			$_SESSION['FORMA'] = 'eventi.php';
		}
		
		if 	($_SESSION['WAY']=='TASK'){
				
			$_SESSION['FORMA'] = 'tasks.php';
		}
		
		if 	($_SESSION['WAY']=='ADMIN'){
			if ($_SESSION['STATUS'] == "LIST") {
				$_SESSION['FORMA'] = 'admin_general.php';
			}
			if ($_SESSION['STATUS'] == "EDIT") {
		
			}
			if ($_SESSION['STATUS'] == "NEW") {
		
			}
		
		}
}

?>
<form action="#" method="post" enctype="multipart/form-data">
<div id="divMaster"><!--divMaster    -->
	<div id="divGalva"><!--divGalva    -->
		<div id="divTitle"><!--divTitle    -->
<!--			<h1>Pretenziju reģistrācijas sistēma</h1>-->
                 <span id="span_16_yealow">Pretenziju pārvaldības sistēma</span>
		</div><!--divTitle    -->
		<div id="divInfo"><!--divInfo    -->
			<div id="divLoginInfo"><!--divLoginInfo    -->
				<div id="divLUser"><!--divLUser    -->
					<?php 	if ($_SESSION['USER']['STATUS']==2){?>
					<?php 	;} else {?>
						Lietotājs:
                    <?php	}?>
				</div><!--divLUser    -->
				<div id="divAgents"><!--divAgents    -->
					<?php 	if ($_SESSION['USER']['STATUS']==2){
						echo( $_SESSION['USER']['VARDS']);
					} 
					else {?>
						<input type="text" name="user" value="" size="20">
					<?php	}?>
				</div><!--divAgents    -->
				<div id="divPswTxt"><!--divPswTxt    -->
					<?php 	if ($_SESSION['USER']['STATUS']==2){?>
						<input type="submit" name="btIziet" value="Iziet">
					<?php 	;} else {?>
						Parole:
					<?php } ?>
				</div><!--divPswTxt    -->
				<div id="divPswIev"><!--divPswIev    -->
					<?php 	if ($_SESSION['USER']['STATUS']==2){?>
						
					<?php 	;} else {?>
						<input type="password" name="psw" value="" size="8">		
					<?php }?>
				</div><!--divPswIev    -->
				<div id="divIeIz"><!--divIeIz    -->
					<?php 	if ($_SESSION['USER']['STATUS']==2){?>
								
					<?php 	} else { ?>
								<input type="submit" name="btIeiet" value="Ieiet">
					<?php } ?>
				</div><!--divIeIz    -->
 			</div><!--divLoginInfo    -->
				<div id="divAdmin">
<!--					<input type="submit" name="btdebug" value="Debug --><?php //echo $_SESSION['DEBUG']; ?><!--">-->
                    <?php 	if ($_SESSION['USER']['LOMA']=='S'){?>
                        <a href="adm.php">Administrēšana</a>
                    <?php } ?>

                </div>
			<div id="divPapildInfo">
				<div id="divKomp">
				</div><!--divKomp    -->
				<div id="divVersija">
				</div><!--divVersija    -->
			</div><!--divPapildInfo    -->
            <div style="background: #00b0f0; width:100%;height:7px;float: left;">

            </div>

        </div><!--divInfo    -->
 	</div><!--divGalva    -->

	<!-- ##################################################################################################################   -->
	<?php  
	if ($_SESSION['USER']['STATUS']==2){ //====================  PĒC AUTORIZĀCIJAS  ==================================================?>
	<div id="divDarba"><!--divDarba    -->
		<div id="divFormNavig"><!--divFormNavig    -->
			<div id="divTools">
<!-- 	<ul> -->			
					<a id='<?php if ($_SESSION['PRET']['PREFIKS']=="KM"){echo 'mnaToolsSel';} else {echo 'mnaTools';} ?>' title='Kostruktīvo materiālu pretenzijas' href="?mTools=mnKM">KM</a>
					<a id='<?php if ($_SESSION['PRET']['PREFIKS']=="EPS"){echo 'mnaToolsSel';} else {echo 'mnaTools';} ?>' title='EPS materiālu pretenzijas' href="?mTools=mnEPS">EPS</a>
					<a id='<?php if ($_SESSION['PRET']['PREFIKS']=="IEK"){echo 'mnaToolsSel';} else {echo 'mnaTools';} ?>' title='Iekšējās pretenzijas' href="?mTools=mnIEK">IEK</a>

<!-- 				</ul>	<br> -->	
			</div><!--divTools    -->
			<div id='divTextCenter'>
				<span id="spantitle"><?php echo $_SESSION['TITLE'] ?></span>
			</div>
			<ul>
				<?php // HORIZONTĀLAIS menju
				if ($_SESSION['STATUS'] != "LIST" && $_SESSION['STATUS'] != "NEW") { ?>
					<li id='mnNavig'><a id='mnaNavig' href="?navig=mnEdit">Labot</a></li>
				<?php } ?>
				<?php if ($_SESSION['WAY']=='CLAIM') { ?>
					<li id='mnNavig'><a id='mnaNavig' href="?navig=mnNew">Jauns</a></li>
				<?php } ?>
					<li id='mnNavig'><a id='mnaNavig' href="?navig=mnTasks">Uzdevumi</a></li>
				<?php if ($_SESSION['STATUS'] != "LIST" && $_SESSION['PRET']['STATUS'] != 0) { ?>
					<li id='mnNavig'><a id='mnaNavig' href="?navig=mnEvent">Notikumi <?php echo $_SESSION['PRET']['NOTIKUMU_SK'] ?></a></li>
				<?php } ?>

					
			</ul>	
		</div><!--divFormNavig    -->
		<div id="divForma"><!--divForma    -->
				<div id="divView">
				<?php 
					if(isset($_SESSION['FORMA'])) {
						// Pretenzijas forma
						include $_SESSION['FORMA'];
					}
				?>
			</div><!--divView    -->	
		</div><!--divForma    -->
	</div><!--divDarba    -->
	<?php } 
 ?>
</div><!--divMaster    -->
</form>	
</body>
</html>