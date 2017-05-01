<?php
//###################  UZDEVUMA SAGLABĀŠANA  ################################################
if (isset($_POST['task_save'])) {
    $atbilde = $_POST['atbilde'];

    $thistask=sqltoarray(' * ', 'uzdevumi', " ID='".$_SESSION['TASK']['ID']."' ", $db);
    $OneTask=$thistask[0];
    FOREACH ($atbilde as $atb) {
        if (strlen($atb)) {
            // Ierakstam atbildi
            $field = " atbilde ";
            $variable = $atb;
            $ftabula = 'personas_notikums';
            $fwhere = " ID = " . $OneTask['id_master'] . " ";
            sqlupdate($field, $variable, $ftabula, $fwhere, $db);

            $field = " atbild_datums ";
            $variable = date("Y-m-d");
            $ftabula = 'personas_notikums';
            $fwhere = " ID = " . $OneTask['id_master'] . " ";
            sqlupdate($field, $variable, $ftabula, $fwhere, $db);

            $field = " status ";
            $variable = 1;
            $ftabula = 'personas_notikums';
            $fwhere = " ID = " . $OneTask['id_master'] . " ";
            sqlupdate($field, $variable, $ftabula, $fwhere, $db);


            $field = " atbilde ";
            $variable = $atb;
            $ftabula = 'uzdevumi';
            $fwhere = " ID = " . $OneTask['id'] . " ";
            sqlupdate($field, $variable, $ftabula, $fwhere, $db);


            $field = " status ";
            $variable = 1;
            $ftabula = 'uzdevumi';
            $fwhere = " ID = " . $OneTask['id'] . " ";
            sqlupdate($field, $variable, $ftabula, $fwhere, $db);

            $field = " izpild_dat ";
            $variable = date("Y-m-d");
            $ftabula = 'uzdevumi';
            $fwhere = " ID = " . $OneTask['id'] . " ";
            sqlupdate($field, $variable, $ftabula, $fwhere, $db);
        }
    }
    tmp_fil_save('uzdevumi',$OneTask['id'],$db);

    $sql="DELETE FROM `tmp_files`";
    $q = $db->query($sql);
//#########______________   Failu pārnešana  uzdevumi -> notikumi __________
    $fil_to_ev=sqltoarray(' * ','faili',' id_master = '.$OneTask['id'],$db);
    if (!empty($fil_to_ev)) {
        $fail_sk=0;
        foreach ($fil_to_ev as $fev) {
            $submit_name='fileUzdev';
            $source='notikumi';
            $id_master=$OneTask['id_source'];
            $identif=$fev['ident'];
            $name=$fev['orginal_name'];
            $konv_name=$fev['konvert_name'];
            $size=$fev['size'];
            $datums=$fev['datums'];

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
 //                   copy('tmp\\'.$konv_name,'uploads\\'.$konv_name);
                    $fail_sk= $fail_sk+1;

        }
    }

}
//###################  tmp failu pievienošana  ################################################
if (isset($_POST['add_task_file'])) {
     to_tmp_file('uzdevumi',$_SESSION['TASK']['KODS'],'fileTask',$db);
}
