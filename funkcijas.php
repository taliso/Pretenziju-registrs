<?php
  function fons($status)
  {
    return $status;
  }
function datums()
{
  $datums = array();

  for($d=1;$d<=31;$d++) {
    $datums["diena"][] = $d;
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