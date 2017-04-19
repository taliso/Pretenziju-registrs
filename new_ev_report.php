<?php
$id_pret="";
$pret_id="";
$pasut_nr="";
$event_id="";
$teh_dala=0;
$laboratorija=0;
$logistika=0;
$event_date="0000-00-00";
$lemums="";
$izdevumi="";
$pedejais="";
$izpildes_dat="0000-00-00";
$apraksts="";
$file_doc="";
$filstr="";
$kods="";

$pret_id=$_SESSION['PRET_ID'];
$npk=$_SESSION['NOTIKUMU_SK']+1;
$event_id=$pret_id."-".$npk;

// #############    tmp_files   ###########################
$fields =" name,size,cmdDel ";
$ftabula="tmp_files";
$fwhere=" source='notikumi' and identif='".$event_id."'";
$event_files= sqltoarray($fields,$ftabula,$fwhere,$db);

// #############    Izvelkam aģentu no pretenzijas  ###########################
$fields =" agents ";
$ftabula="pretenzijas";
$fwhere=" pret_id='".$_SESSION['PRET_ID']."'";
$users = sqltoarray($fields,$ftabula,$fwhere,$db);

if (empty()) {
$pers=$users[0];
$sql="select * from kl_agenti where agents='".$pers['agents']."'";
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
    ':uzd_datums'=>'0000-00-00',
    ':event_id'=>$_SESSION['EVENT_ID'],
    ':e_pasts'=>$muser['epasts']);

$q->execute($data);


// #############    tmp_personas_notikums   ###########################
$fields =" persona, strukturas_kods, uzdevums ";
$ftabula="tmp_personas_notikums";
$fwhere="";
$event_users = sqltoarray($fields,$ftabula,$fwhere,$db);



$_SESSION['EVENT_ID']=$event_id;
?>
<div id="divNewEvent" style="width:100%; margin: 7px;">
    <div id="divNewEventTitle">
        <span id="spantitle" style="width:100%;"> Jauns UZDEVUMS         [<?php echo $_SESSION['EVENT_ID'] ?>]</span><br>
    </div>


    <div id="divEventPersonas" style="float:left; width:78%; border: 2px solid black; margin:2px;">

        <div id="divKreisais" style="width:100%; float:left;">
            <table style="width:100%;">
                <tr> <!-- R # 1. -->
                    <td style="width:3%; border: 1px solid darkgreen;"><span id="fspan3" style=" color:#34AE53;background-color:#2e4703;">Strukt.</span></td>
                    <td style="width:15%; border: 1px solid darkgreen;"><span id="fspan3" style=" color:#34AE53;background-color:#2e4703;">Aģents</span></td>
                    <td style="width:80%; border: 1px solid darkgreen;"><span id="fspan3" style=" color:#34AE53;background-color:#2e4703;">Ziņojums</span></td>
                </tr>
                <?php

                if (isset($event_users)){
                    foreach ($event_users as $evUser) {	?>
                        <tr> <!-- R # 1. -->
                            <td style=" background: white;"><span id="list_span"><?php echo $evUser['strukturas_kods'] ?></span></td>
                            <td style=" background: white;"><span id="list_span"><?php echo $evUser['persona'] ?></span></td>
                            <td style=" background: white;"><input style="width:99%;" type="text" name="uzdevums" value="<?php echo $evUser['uzdevums'] ?>" </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>

    </div>


    <div id="divEventFaili" style="float:left;  width:21%; border: 2px solid black; height:100%; margin: 2px;">
        <div id="" style="width:99%;border: 2px solid darkseagreen;text-align: center; height:20px;background-color:#2e4703;">
            <span id="fspan3"> FAILI </span>
        </div>

        <div id="divFailiMenu">
            <input type="file" name="fileUzdev" id="fileDoc" style="margin:4px;"><input style="float:right; margin: 4px;" type="submit" name="doc_to_event" value="Pievienot failu" >
            <table>
                <?php
                if (isset($event_files)){
                    foreach ($event_files as $evFile) {	?>
                        <tr>
                            <td style="width:12%;"><span id="list_span">
							<?php echo $evFile['name'];	?>
			  			</span></td>
                            <td style="width:12%;"><span id="list_span">
							<?php echo $evFile['size'];	?>
			  			</span></td>
                        </tr>
                    <?php   }
                }?>
            </table>

        </div>


    </div>

    <div id="divNewEventTitle"><input type="submit" name="new_event_cancel" value="Atcelt" style="float:right; margin: 4px;"><input type="submit" name="new_event_accept" value="Saglabāt" style="float:right; margin: 4px;">
    </div>
</div>