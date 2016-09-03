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