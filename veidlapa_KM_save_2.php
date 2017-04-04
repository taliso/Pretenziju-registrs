<?php
me('2',"veidlapa_KM_save","IN");
me("1",'Veidlapa_SAVE', $_SESSION['PRET_ID'] );
me("1",'Veidlapa_STATUS', $_SESSION['STATUS']);
if ($_SESSION['STATUS']=="NEW") {
	$Nr=NextID($_SESSION['PREFIKS']);
}
$veids = $_SESSION['PREFIKS'];

$dokumenta_datums =(strlen( $_POST['dokumenta_datums'])==0) ? "0000-00-00" : $_POST['dokumenta_datums'];
$pret_id = $_SESSION['PRET_ID'];
$reg_nr=$_SESSION['REG_NR'];
$sakuma_datums = "0000-00-00";



$fields=' * ';
$tabula='tmp_files';
$where='';

$tmp_fil=sqltoarray($fields,$tabula,$where,$db);
me("1",'tmp_file',"Izvilkts");
if ($_SESSION['STATUS']=="NEW") {
	$sql = "INSERT INTO pretenzijas SET ";

} else {
	$sql = "UPDATE pretenzijas SET ";
}
$sql=$sql."
		reg_nr=:reg_nr,
		veids=:veids,
		dokumenta_datums=:dokumenta_datums,
		pret_id=:pret_id,
		iesniedzejs=:iesniedzejs,
		sakuma_datums=:sakuma_datums";

if ($_SESSION['STATUS']=="EDIT") {
	$sql = $sql." WHERE pret_id='".$_SESSION['PRET_ID']."'";
}
me("1",'Veidlapa KM save',$sql);
	$q = $db->prepare($sql);
		
		$data = array(
			':reg_nr'=>$reg_nr,
			':veids'=>$veids,
			':dokumenta_datums'=>$dokumenta_datums,
			':iesniedzejs'=>'',
			':pret_id'=>$pret_id,
			':sakuma_datums'=>$sakuma_datums );

		$q->execute($data);
me("2",'Update_PRET',$sql);
me("2",'PRET_ID',$pret_id);
		
//#########################  FAILU UPLOADS   ################################################################
		
//^^^^^^^^^^^^^^^^^^    Saglabājam faili sarakstu ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
		
if (isset($tmp_fil)){
	foreach ($tmp_fil as $tmpf){
//		var_dump($tmpf);		
		me("1",'Katrs tmp_file',$tmpf['name']);
		$submit_name=$tmpf['submit_name'];
		$source=$tmpf['source'];
		$identif=$tmpf['identif'];
		$name=$tmpf['name'];
		$type=$tmpf['type'];
		$tmp_name=$tmpf['tmp_name'];
		$size=$tmpf['size'];
		$cmdDel=$tmpf['cmdDel'];
		$konv_name=substr($source,0,4).'_'.$identif.'_'.$name;
		
		if ($cmdDel==0){
			$sql = "INSERT INTO faili SET ";
			$sql=$sql."
			orginal_name=:orginal_name ,
			konvert_name=:konvert_name ,
			path=:path ,
			source=:source ,
			ident=:ident ,
			size=:size ,
			submit_name=:submit_name";
			
			$q = $db->prepare($sql);
			
			
			$data = array(
					':orginal_name'=> $name ,
					':konvert_name'=> $konv_name ,
					':path'=> "uploads/" ,
					':source'=>$source  ,
					':ident'=>$identif  ,
					':size'=>$size  ,
					':submit_name'=>$submit_name  );
			
			$q->execute($data);

		}
	}
	
}
echo 'Save laiks:'.timer_end();		
me('2',"veidlapa_KM_save","OUT");