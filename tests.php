$par_laiks
$par_izkr_trans
$par_izkr_iepak
$par_izkr_izpak
$par_piemont_jaun
$par_piemont_ekspl
$noform_pardev
$noform_e_pasts
$noform_oficial
$iesniegts_nav
$iesniegts_panel_foto
$iesniegts_mark_foto










<h2 id="tips">Useful Tips Section</h2>

<a href="#tips">Visit the Useful Tips Section</a>

<?php if () { ?>
<script>alert("Paziņojums");</script>
<?php } ?>

<span onclick="alert('<?php echo "adssadsad"; ?>')">Info</span>



foreach($samplearr as $key => $item){
  print "<tr><td>" . $key . "</td><td>" . $item['value1'] . "</td><td>" . $item['value2'] . "</td></tr>";
}




//Iezīmēt tikai apakšējos borderus
tr td {
    border-bottom: 1px solid silver;
}

//Iezīmēt pāra kolonnu
tr:nth-child(even) {background: #CCC}
//Iezīmēt nepāra kolonnas
tr:nth-child(odd) {background: #FFF}


//Iekrāsot rindu zem kursora
tr:hover { background-color: green; }



function sutit_epastu_adresatam ($adresats, $virsraksts, $zinojums)
{
    //debug:
    $adresats_ists = $adresats;
    $adresats = 'martins@tenax.lv';
    
    $to = $adresats;
    
    $headers = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n";
    
    if(mail($to,'=?UTF-8?B?'.base64_encode($virsraksts).'?=',$zinojums." Kam:".$adresats_ists,$headers))
    {
        //echo('Ziņojums nosūtīts');
        aktivitate ("2", "Atgādinājums - rezervācija - ražošana", "Atgādinājums nosūtīts uz: ".str_replace("[ at ]", "@", $adresats));
    }
    else 
    { 
        echo('Ziņojums netika nosūtīts');
    }
}




// Datuma izvēle / kalendārs
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Datepicker - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/hemes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function()
            $( "#datepicker1" ).datepicker();
            $( "#datepicker2" ).datepicker();
            $( "#datepicker3" ).datepicker({dateFormat: 'mm-dd-yy'});
        } );
    </script>
</head>
<body>

<p>Date: <input type="text" id="datepicker1"></p>
<p>Date: <input type="text" id="datepicker2"></p>
<p>Date: <input type="text" id="datepicker3"></p>


</body>



// ========================  SQL pieprasījums uz masīvu ========================================
function sqltoarray($fields,$ftabula,$fwhere) {
	$sql ="SELECT ".$fields." FROM ".$ftabula;
	if (strlen($fwhere)>0){
		$sql=$sql." where ".$fwhere ;
	}
	$q = $db->query($sql);
	$myarray="";
	while($rrow = $q->fetch(PDO::FETCH_ASSOC)){
		$myarray[]=$rrow;
	}
	
	return $myarray

}


<option value=' <?php $pers ?>' ><?php $pers ?></option>

teh_dala
laboratorija
logistika
teh_cilv
lab_cilv
log_cilv
uzd_teh
uzd_lab
uzd_log
event_date

//#############  Parādīt / paslēpt @################################ 
 
<html>
<head>
 
</head>
 
<body>
 
<style>
 
.item {
border: 1px solid red;
padding: 5px;
border-radius: 10px;
width: 50%;
}
.invisible {
display: none;
}


h1, p, div, span {
asd
}
</style>
 
<?php for($i=0;$i<20;$i++): ?>
 
<div class="item">
        <a onclick="$('#container-<?php echo $i ?>-invisible').toggle()">click</a>
        <div class="visible">visible</div>
        <div class="invisible" id="container-<?php echo $i ?>-invisible">invisible</div>
</div>
 
 
<?php endfor ?>
 
 
?>
   
 
 
 
<script
              src="https://code.jquery.com/jquery-3.1.1.min.js"
              integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
              crossorigin="anonymous"></script>
 
</body>

    </html>






















