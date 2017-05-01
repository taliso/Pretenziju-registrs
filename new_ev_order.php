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

$_SESSION['EVENTS']['KODS']=$_SESSION['PRET']['KODS']."-".($_SESSION['PRET']['NOTIKUMU_SK']+1);

// #############    tmp_files   ###########################
$fields =" * ";
$ftabula="tmp_files";
$fwhere="";
$event_files= sqltoarray($fields,$ftabula,$fwhere,$db);

// #############    tmp_personas_notikums   ###########################
$fields =" persona, strukturas_kods, uzdevums ";
$ftabula="tmp_personas_notikums";
$fwhere="";

$event_users = sqltoarray($fields,$ftabula,$fwhere,$db);

$fields =" persona, teksts_out ";
$ftabula="tmp_teksts_notikums";
$fwhere="";

$event_teksts= sqltoarray($fields,$ftabula,$fwhere,$db);

// #############    personas   ###########################
$fields =" agents, tiesibas, loma, epasts, struktura_kods ";
$ftabula="kl_agenti";
$fwhere=" aktivs>0 and loma='T' ";

$users = sqltoarray($fields,$ftabula,$fwhere,$db);

?>
<div id="divNewEvent" style="width:100%; margin: 7px;">
    <div id="divNewEventTitle">
        <span id="spantitle" style="width:100%;color: #44FF28;"> Jauns LĒMUMS         [<?php echo $_SESSION['EVENTS']['KODS'] ?>]</span><br>
    </div>


    <div id="divEventPersonas" style="float:left; width:78%;margin:0px;">
        <div id="" style="width:100%;border: 2px solid darkseagreen;text-align: center; height:20px; background-color:#008B8B;">
            <span id="fspan3"> IESAISTĪTĀS PERSONAS</span>
        </div>
        <div id="jauns"style="width:99%;border: 1px solid darkseagreen;text-align: center; height:60px; background-color:green; padding:5px;">
            <table style="width:99%;margin: -1px;">
                <tr>
                    <td style="width:10%;"><span id="span_14_right_yellow"> Persona:</span></td>
                    <td style="width:20%;">
                        <select name="persona" style="width:100%; margin:2px;">
                            <?php
                            foreach ($users as $user) {?>
                                <option value="<?php echo $user['agents'] ?>"><?php echo $user['agents'] ?></option>
                            <?php }
                            ?>
                        </select>
                    </td>
                    <td style="width:10%;"><span id="span_14_right_yellow"> Uzdevums:</span></td>
                    <td style="width:58%;"><input type="text" name="uzdevums" value="" style=" margin:2px; width:96%; float:left;"></td>
                    <td style="width:10%;"><input type="submit" name="user_to_event" value="+"></td>
                </tr>
            </table>
            <table style="width:99%;margin: -1px;">
                <tr>
                    <td style="width:10%;"><span id="span_14_right_yellow"> Teksts:</span></td>
                    <td style="width:97%;">
                        <input type="text" name="zinojums" value="" style=" margin:2px; width:96%; float:left;">
                    </td>
                     <td style="width:10%;"><input type="submit" name="teksts_to_order" value="+"></td>
                </tr>
            </table>

        </div>
        <div id="divKreisais" style="width:100%; float:left;">
            <table style="width:100%;">
                <tr> <!-- R # 1. -->
                    <td style="width:3%; border: 1px solid darkgreen;"><span id="fspan3" style=" color:darkgreen;">N.p.k.</span></td>
                    <td style="width:15%; border: 1px solid darkgreen;"><span id="fspan3" style=" color:darkgreen;">Izpildītāji</span></td>
                    <td style="width:82%; border: 1px solid darkgreen;"><span id="fspan3" style=" color:darkgreen;">Uzdevums</span></td>
                </tr>
                <?php

                if (isset($event_users)){
                    $pnpk=0;
                    foreach ($event_users as $evUser) {
                        $pnpk=$pnpk+1;?>
                        <tr> <!-- R # 1. -->
                            <td style="width:3%; background: white;"><span id="list_span"><?php echo $pnpk ?></span></td>
                            <td style="width:15%; background: white;"><span id="list_span"><?php echo $evUser['persona'] ?></span></td>
                            <td style="width:82%; background: white;"><span id="list_span"><?php echo $evUser['uzdevums'] ?></span></td>
                        </tr>
                        <?php
                    }
                }
                if (isset($event_teksts)){
                     foreach ($event_teksts as $evTekst) {
                        $pnpk=$pnpk+1;?>
                        <tr> <!-- R # 1. -->
                            <td style="width:3%; background: white;"><span id="list_span"><?php echo $pnpk ?></span></td>
                            <td style="width:15%; background: white;"><span id="list_span"></span></td>
                            <td style="width:82%; background: white;"><span id="list_span"><?php echo $evTekst['teksts_out'] ?></span></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>

    </div>


    <div id="divEventFaili" style="float:left;  width:21%;height:100%; margin: 0px;">
        <div id="" style="width:104%;border: 2px solid darkseagreen;text-align: center; height:20px;background:#008B8B;">
            <span id="fspan3"> FAILI </span>
        </div>

        <div id="divFailiMenu">
            <input type="file" name="fileUzdev" id="fileDoc" style="margin:4px;"><input style="float:right; margin: 4px;" type="submit" name="doc_to_event" value="+" >
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

    <div id="divNewEventTitle"><input type="submit" name="new_event_cancel" value="Atcelt" style="float:right; margin: 4px;"><input type="submit" name="new_event_accept" value="Pievienot notikumiem" style="float:right; margin: 4px;">
    </div>
</div>