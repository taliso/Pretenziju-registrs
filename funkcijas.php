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
<<<<<<< HEAD
	//$lensd=strlen($sd);
	if (strlen($sd)<2){
=======
	$lensd=strlen($sd);
	if ($lensd<2){
>>>>>>> 1936e59dd5882c8a2fc6635695495a7195c86b07
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

<<<<<<< HEAD
function diena_select($fixdat)
{
	// Ja nav norādīts fixdat, pielīdzinam to šodienai
	if (empty($fixdat)){$fixdat=date("d.m.Y");}
	$fd=date("d",$fixdat);
	$mselect_dienas="";
	for($d=1;$d<=31;$d++){
		$sd=(string)$d;
		if (strlen($sd)==1){
			$sd="0".$sd;
		}
		if ($fd=$sd) {
			$mselect_dienas=$mselect_dienas."<option selected value='".$sd."'>".$sd."</option>"."<br>";
		} else {
			$mselect_dienas=$mselect_dienas."<option value='".$sd."'>".$sd."</option>"."<br>";
		}
		
		
	}
	return $mselect_dienas;
=======

function diena_select()
{
	for($d=1;$d<=31;$d++) {
		$id=(string)$d;	
//		if strlen($id)=1
//		{
		$id="0".$id;
//		}
	}
    //$datums["diena"][] = $d;
	//echo "$d";
>>>>>>> 1936e59dd5882c8a2fc6635695495a7195c86b07

}