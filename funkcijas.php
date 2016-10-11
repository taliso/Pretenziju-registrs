<?php
  function fons($status)
  {
    return $status;
  }
function datums()
{
  $datums = array();
	//$sd=string; Error ????
  for($d=1;$d<=31;$d++) {
	$sd=(string)$d; //???
	$lensd=strlen($sd);
	if ($lensd<2){
		$sd="0".$sd;
	}
    $datums["diena"][] = $sd;
  }

  for($m=1;$m<=12;$m++) {
    $datums["menes"][] = $m;
  }


  for($g=2016;$g<=2018;$g++){
    $datums["gads"][] = $g;
  }

return $datums;

}

function faila_nos($regnr,$grupa,$faila_nos){
        return $regnr."_".$grupa."_".$faila_nos; 
 }

/**
 * Augšipielādē failu
 * 
 * @param $fails
 * @param $target_dir
 * @param $regnr
 */
function file_upload($fails,$target_dir,$regnr){
    echo "<pre>";
    var_dump($fails);
    echo "</pre>";

    $keys = array();
    foreach (array_keys($fails) as $k) {
        if ($fails[$k]["name"] != "") {
            $keys[] = $k;
            $kluda = 0;
            //Failu apstrāde


                        
            switch ($k) {
                case "filePas":
                    $grupa = "pas";
                    break;
                case "fileApr":
                    $grupa = "apr";                    
                    break;
                case "fileFoto":
                    $grupa = "foto";
                    break;
                default:
                    echo "Kļūda";
            }

            $faila_nos=faila_nos($regnr,$grupa,basename($fails[$k]["name"]));
            $target_file =$target_dir.$faila_nos;
            if ($fails[$k]["size"] > MAX_FILE_SIZE) {
                echo "Atvainojiet, faila izmērs ir par lielu.";
                $kluda = 1;
            } else {
                if (move_uploaded_file($fails[$k]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $fails[$k]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }

            }



        }
    }
}

// ======================  DIENA_SELECT  ======================================================
function diena_select($fixdat)
{
	// Ja nav norādīts fixdat, pielīdzinam to šodienai
//	$fixdat="";
	$fd=0;
	if (empty($fixdat)) {
		$fixdat=time();
	} 
			
		$fd=date("d",$fixdat);
		$mselect_dienas="";
		for($d=1;$d<=31;$d++){
			$sd=(string)$d;
			if (strlen($sd)==1){
				$sd="0".$sd;
			}
			if ($fd==$sd) {
				$mselect_dienas=$mselect_dienas."<option value='".$sd."' selected>".$sd." </option>"."<br>";
			} else {
				$mselect_dienas=$mselect_dienas."<option value='".$sd."'>".$sd."</option>"."<br>";
			}
		}
	return $mselect_dienas;
}
// ======================  MENES_SELECT  ======================================================
function menes_select($fixdat)
{
	// Ja nav norādīts fixdat, pielīdzinam to šodienai
	//	$fixdat="";
	$fm=0;
	if (empty($fixdat)) {
		$fixdat=time();
	}
		
	$fm=date("m",$fixdat);
	$mmenes_select="";
	for($m=1;$m<=12;$m++){
		$sm=(string)$m;
		if (strlen($sm)==1){
			$sm="0".$sm;
		}
		if ($fm==$sm) {
			$mmenes_select=$mmenes_select."<option value='".$sm."' selected>".$sm." </option>"."<br>";
		} else {
			$mmenes_select=$mmenes_select."<option value='".$sm."'>".$sm."</option>"."<br>";
		}
	}
	return $mmenes_select;
}

// ======================  GADS_SELECT  ======================================================
function gads_select($fixdat)
{
	// Ja nav norādīts fixdat, pielīdzinam to šodienai
	//	$fixdat="";
	$fy=0;
	if (empty($fixdat)) {
		$fixdat=time();
	}

	$fy=date("Y",$fixdat);
	$mgads_select="";
	for($y=$fy-1;$y<=$fy+1;$y++){
		$sy=(string)$y;
		if ($fy==$sy) {
			$mgads_select=$mgads_select."<option value='".$sy."' selected>".$sy." </option>"."<br>";
		} else {
			$mgads_select=$mgads_select."<option value='".$sy."'>".$sy."</option>"."<br>";
		}
	}
	return $mgads_select;
}

// ======================  DATUMS_SELECT  ======================================================
function datums_select($fixdat,$lauka_prefiks){

	if (empty($fixdat)) {
		$fixdat=time();
	}
	$diena=diena_select($fixdat);
	$menes=menes_select($fixdat);
	$gads=gads_select($fixdat);
	$mdatums_select= "<select name='".$lauka_prefiks."_diena'>".$diena."</select><select name='".$lauka_prefiks."_menes'>".$menes."</select><select name='".$lauka_prefiks."_gads'>".$gads."</select>";
	return $mdatums_select;
}

function msg($mteksts){	
	$log = fopen (LOGFILE,'a+');
	fwrite($log,$mteksts."\n");
	fwrite($log,
	"===========================================================\n");
	fclose($log);
}
