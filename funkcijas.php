<?php
function datums() {
	$datums = array ();
	// $sd=string; Error ????
	for($d = 1; $d <= 31; $d ++) {
		$sd = ( string ) $d; // ???
		$lensd = strlen ( $sd );
		if ($lensd < 2) {
			$sd = "0" . $sd;
		}
		$datums ["diena"] [] = $sd;
	}
	
	for($m = 1; $m <= 12; $m ++) {
		$datums ["menes"] [] = $m;
	}
	
	for($g = 2016; $g <= 2018; $g ++) {
		$datums ["gads"] [] = $g;
	}
	
	return $datums;
}
function f_upload($file, $tmp_file, $target_file, $target_dir) {
	if ($file != "") {
		
		
		$kluda = 0;
		// Failu apstrāde
		
		
		me ( "f_upload_tmp_file", $tmp_file );
		
		$path = "C:\\EasyPHP\\eds-www\\Pretenziju-registrs\\uploads\\";
		$target = $path . $target_file;
		
		me ( "f_upload", $target );
		if (move_uploaded_file ( $tmp_file, $target )) {
			echo "The file " . $file . " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}
function msg($mteksts) {
	$log = fopen ( LOGFILE, 'a+' );
	fwrite ( $log, $mteksts . "\n" );
	fwrite ( $log, "====================================================" . date ( 'd', time () ) . "=" . date ( 'm', time () ) . "======\n" );
	fclose ( $log );
}
function list_row($col_count, $var_array) {
	// $row_array- Masīva struktūra: 1-mainīgais,2-nosaukums, 3-klase,
	// $var_array- parādāmo vērtību masīva, kolonnu skaitam jāsakrīt,
	$tab_row = "";
	$tab_row = '<tr>';
	$k = 0;
	for($k = 0; $k <= $col_count; $k ++) {
		if ($k == 0) {
			$tab_row = $tab_row . '<td class="tcol0"><a href="?pret_id=' . $var_array [$k] . '">' . $var_array [$k] . '</td>';
		} else {
			$tab_row = $tab_row . '<td class="tcol' . $k . '">' . $var_array [$k] . '</td>';
		}
	}
	$tab_row = $tab_row . '</tr>';
	return $tab_row;
}
function check($mvert) {
	$vert = "";
	if ($mvert == 1) {
		$vert = "checked ";
	}
	return $vert;
}
function StatCheckBox($mname, $mvariable, $koments, $nobeig, $status) {
	if ($mvariable == 1) {
		$mcheckstat = " checked";
	} else {
		$mcheckstat = "";
	}
	$mteksts = "";
	$mteksts = '<input type="checkbox" name="' . $mname . '"' . $mcheckstat . $status . '> ' . $koments . $nobeig;
	echo $mteksts;
}
function MailTo($to, $sub, $body, $mail) {
	$mail->addAddress ( $to ); // Name is optional
	$mail->Subject = $sub;
	$mail->Body = $body;
	
	if (! $mail->send ()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'E-pasts ir nosūtīts ';
	}
}
function sqltoarray($fields, $ftabula, $fwhere, $db) {
	$myarray = array ();
	
	$sql = "SELECT " . $fields . " FROM " . $ftabula;
	if (strlen ( $fwhere ) > 0) {
		$sql = $sql . " where " . $fwhere;
	}
	
	$q = $db->query ( $sql );
	
	while ( $r = $q->fetch ( PDO::FETCH_ASSOC ) ) {
		$myarray [] = $r;
	}
	return $myarray;
}
function sqlupdate($field, $variable, $ftabula, $fwhere, $db) {
    if (strlen($fwhere)>0) {
        $sql = "UPDATE " . $ftabula . " SET " . $field . "='" . $variable . "' WHERE " . $fwhere;
    } else {
        $sql = "UPDATE " . $ftabula . " SET " . $field . "='" . $variable . "'";
    }

	$q = $db->query ( $sql );
	return 'true';
}
function sqlinsert($ftabula, $db) {
	$sql = "UPDATE " . $ftabula . " SET " . $field . "='" . $variable . "' WHERE " . $fwhere;
	echo $sql;
	$q = $db->query ( $sql );
	
	return 'true';
}
function me($key, $teksts, $vertiba) {
	if ($_SESSION['DEBUG'] == "ON" && $key=="2") {
		$file = fopen("tmp\\log.txt","a");
		$_SESSION['ME_ID']=$_SESSION['ME_ID']+1;
		$dati=debug_backtrace();
		foreach ($dati as $d){
			echo '====================================================='.'<br>';
//			var_dump($d);
		}
		
		$fil=basename($dati[0]['file']);
		$lin=$dati[0]['line'];
		
		$strings="F:[".$fil." / ".$lin." }  =>  WIEV:".$_SESSION['WAY']."  STATUS:".$_SESSION['PRET']['STATUS']."   REG_NR:".$_SESSION['PRET']['REG_NR'].chr(13) ;
		echo fputs($file,$strings)."<br>";
		echo $_SESSION['ME_ID'].":  ".$teksts . " - " . $vertiba.' >> Status:'.$_SESSION['STATUS'].' >> PRET_ID:'.$_SESSION['PRET']['KODS'].' >>REG_NR:'.$_SESSION['PRET']['REG_NR'].' === {'.$fil.' / '.$lin.' }';
		echo '<br>';echo '-----------------------------------------------------------------------------'.'<br>';
		fclose($file);	
	}
}
function timer_start() {
	global $timeparts,$starttime;
	$timeparts = explode(" ",microtime());
	$starttime = $timeparts[1].substr($timeparts[0],1);
	$timeparts = explode(" ",microtime());
}
function timer_end() {
	global $timeparts,$starttime;
	$endtime = $timeparts[1].substr($timeparts[0],1);
	return bcsub($endtime,$starttime,6);
}
function dropbox_select($marray,$mkey,$mselect){
    $rinda='<select name="agents" id="user_select">';
    echo $rinda;
    foreach ($marray as $mone) {
        if (strlen($mselect)>0 && $mselect==$mone[$mkey]) {
            echo "<option value='".$mone[$mkey]."' selected>".$mone[$mkey]."</option>";
        } else {
            echo "<option value='".$mone[$mkey]."'>".$mone[$mkey]."</option>";
            }
    }
    $rinda='</select>';

}
function tmp_fil_to_array($db){
	$fields=' * ';
	$tabula='tmp_files';
	$where='';

	$tmp_fil=sqltoarray($fields,$tabula,$where,$db);
	return $tmp_fil;
	
}
function tmp_fil_save($source,$id_master, $db){
    $tmp_fil=tmp_fil_to_array($db);
    if (isset($tmp_fil)){
        $fail_sk=0;
        foreach ($tmp_fil as $tmpf){
            $submit_name=$tmpf['submit_name'];
            $source=$tmpf['source'];
            $identif=$tmpf['identif'];
            $name=$tmpf['name'];
            $type=$tmpf['type'];
            $tmp_name=$tmpf['tmp_name'];
            $size=$tmpf['size'];
            $cmdDel=$tmpf['cmdDel'];
            $konv_name=substr($source,0,4).'_'.$identif.'_'.$submit_name.'_'.$name;

            $parbaude=sqltoarray(' * ', 'faili', " konvert_name= '$konv_name' ", $db);
            if (count($parbaude)==0) {
                if ($cmdDel==0){
                    $sql = "INSERT INTO faili SET ";
                    $sql=$sql."
                    id_master=:id_master ,
					orginal_name=:orginal_name ,
					konvert_name=:konvert_name ,
					path=:path ,
					source=:source ,
					ident=:ident ,
					size=:size ,
					datums=:datums,
					submit_name=:submit_name";

                    $q = $db->prepare($sql);

                    $data = array(
                        ':id_master'=> $id_master ,
                        ':orginal_name'=> $name ,
                        ':konvert_name'=> $konv_name ,
                        ':path'=> "uploads/" ,
                        ':source'=>$source  ,
                        ':ident'=>$identif  ,
                        ':size'=>$size  ,
                        ':datums'=>date("Y-m-d"),
                        ':submit_name'=>$submit_name  );

                    $q->execute($data);
                    copy('tmp\\'.$konv_name,'uploads\\'.$konv_name);
                    $fail_sk= $fail_sk+1;
                }
            }
        }
    }

return $fail_sk;
}
function to_tmp_file($source,$identif,$submit_name,$db){

     $cmdDel=0;

    $name=$_FILES[$submit_name]['name'];
    $type=$_FILES[$submit_name]['type'];
    $tmp_name=$_FILES[$submit_name]['tmp_name'];
    $size=$_FILES[$submit_name]['size'];
    $konv_name=substr($source,0,4).'_'.$identif.'_'.$submit_name.'_'.$name;
    $konv_name='tmp\\'.$konv_name;
    if(strlen($name)>0) {
        $a = copy($tmp_name, $konv_name);


        $sql = "INSERT INTO tmp_files SET ";
        $sql = $sql . "
                    submit_name=:submit_name ,
                    source=:source ,
                    identif=:identif ,
                    name=:name ,
                    type=:type ,
                    tmp_name=:tmp_name ,
                    size=:size ,
                    cmdDel=:cmdDel";

        $q = $db->prepare($sql);


        $data = array(
            ':submit_name' => $submit_name,
            ':source' => $source,
            ':identif' => $identif,
            ':name' => $name,
            ':type' => $type,
            ':tmp_name' => $konv_name,
            ':size' => $size,
            ':cmdDel' => 0);

        $q->execute($data);
    }
}
function max_id($table,$db){
    $sql = "select MAX(ID) as max_id from ".$table ;
    $q = $db->query($sql);
    $m = $q->fetch(PDO::FETCH_ASSOC);
    $max_id=$m['max_id'];
    return $max_id;
}
function NextNR($table, $filter, $filter_value,$db) {

    $sql = "select MAX(reg_nr) as max_nr from ".$table." where ".$filter." = '".$filter_value."'" ;
    $q = $db->query ( $sql );
    $r = $q->fetch ( PDO::FETCH_ASSOC );

    $reg_nr = $r ['max_nr'];
    $reg_nr = $reg_nr + 1;
    $sql = "UPDATE menju SET reg_nr=" . $reg_nr . " WHERE prefiks='" . $filter_value."'";
    $q = $db->query ( $sql );
    $_SESSION['PRET']['REG_NR']=$reg_nr;
    return $reg_nr;
}
function inser_pers_to_tmp($id_pers,$db){
    $sql="select * from kl_agenti where id=".$id_pers;
    $q = $db->query($sql);
    $muser = $q->fetch(PDO::FETCH_ASSOC);
    $sql = "INSERT INTO tmp_personas_notikums SET ";
    $sql=$sql."
        id_pers=:id_pers ,            
 	  	persona=:persona ,
 	  	strukturas_kods=:strukturas_kods ,
		uzd_datums=:uzd_datums ,
		event_id=:event_id ,
		e_pasts=:e_pasts";

    $q = $db->prepare($sql);

    $data = array(
        ':id_pers'=>$muser['ID'],
        ':persona'=>$muser['agents'],
        ':strukturas_kods'=>$muser['struktura_kods'],
        ':uzd_datums'=>date("Y-m-d"),
        ':event_id'=>$_SESSION['EVENTS']['KODS'],
        ':e_pasts'=>$muser['epasts']);

    $q->execute($data);

}
function inser_text_to_tmp($id_pers,$db){
    $sql="select * from kl_agenti where id=".$id_pers;
    $q = $db->query($sql);
    $muser = $q->fetch(PDO::FETCH_ASSOC);
    $sql = "INSERT INTO tmp_teksts_notikums SET ";
    $sql=$sql."
        id_master=:id_master ,
        source=:source ,
		identif=:identif ,
        id_pers=:id_pers ,
        persona=:persona ,
        datums=:datums";

    $q = $db->prepare($sql);

    $data = array(
        ':id_master'=>$_SESSION['EVENTS']['ID'],
        ':source'=>'notikumi',
        ':identif'=>$_SESSION['EVENTS']['KODS'],
        ':id_pers'=>$muser['ID'],
        ':persona'=>$muser['agents'],
        ':datums'=>date("Y-m-d"));

    $q->execute($data);

}
function tmp_text_save($db)
{

    $sql = "select * from tmp_teksts_notikums";
    $q = $db->query($sql);
    $mtext = $q->fetch(PDO::FETCH_ASSOC);


    foreach ($mtext as $mtx) {

        $fwhere = " identif='" . $_SESSION['EVENTS']['KODS'] . "' and id_pers=" . $mtx['id_pers'] . " and source='" . $mtx['source'] . "'";
        $exist = sqltoarray(' * ', 'teksts_notikums', $fwhere, $db);

        if (empty($exist)) {
            $sql = "INSERT INTO teksts_notikums SET ";
            $sql = $sql . "
                    id_master
                    source=:source ,
                    identif=:identif ,
                    id_pers=:id_pers
                    persona=:persona ,
                    teksts_out=:teksts_out ,
                    teksts_in=:teksts_in ,
                    datums=:datums";

            $q = $db->prepare($sql);

            $data = array(
                ':source' => $mtx['source'],
                ':identif' => $mtx['identif'],
                ':id_pers' => $mtx['id_pers'],
                ':persona' => $mtx['persona'],
                ':teksts_out' => $mtx['teksts_out'],
                ':teksts_in' => $mtx['teksts_in'],
                ':datums' => date("Y-m-d"));

            $q->execute($data);
        } else {
            $ex = $exist[0];
            $sql = "UPDATE teksts_notikums SET ";
            $sql = $sql . "
                    id_master
                    source=:source ,
                    identif=:identif ,
                    id_pers=:id_pers
                    persona=:persona ,
                    teksts_out=:teksts_out ,
                    teksts_in=:teksts_in ,
                    datums=:datums
             where ID=" . $ex['ID'];

            $q = $db->prepare($sql);

            $data = array(
                ':source' => $mtx['source'],
                ':identif' => $mtx['identif'],
                ':id_pers' => $mtx['id_pers'],
                ':persona' => $mtx['persona'],
                ':teksts_out' => $mtx['teksts_out'],
                ':teksts_in' => $mtx['teksts_in'],
                ':datums' => date("Y-m-d"));
        }
    }
}
function BarIndikator05 ($value){
    $rin="";
if ($value==0){
    $clr="red";
}
if ($value>0&&$value<=1){
     $clr="orange";
}
if ($value>1&&$value<5){
    $clr="#ffeb05";
}
if ($value==5){
    $clr="green";
}




    for($v = 0; $v <= $value; $v++) {
        $frag=' <div style="background:'.$clr.'; width:10px; float:left; color:'.$clr.';">'.'.'.'</div>';
        $rin=$rin.$frag;
        $frag= ' <div style="background:#ffffff; width:2px; float:left; color:#ffffff;">'.'.'.'</div>';
        $rin=$rin.$frag;
    }
    return $rin;
}
function BarIndikator09 ($value){
    $rin="";
    if ($value>=0&&$value<=1){
        $clr="red";
    }
    if ($value>=2&&$value<=4){
        $clr="orange";
    }
    if ($value>=5&&$value<=7){
        $clr="#ffeb05";
    }
    if ($value==8){
        $clr="green";
    }




    for($v = 0; $v <= $value; $v++) {
        $frag=' <div style="background:'.$clr.'; width:10px; float:left; color:'.$clr.';">'.'.'.'</div>';
        $rin=$rin.$frag;
        $frag= ' <div style="background:#ffffff; width:2px; float:left; color:#ffffff;">'.'.'.'</div>';
        $rin=$rin.$frag;
    }
    return $rin;
}