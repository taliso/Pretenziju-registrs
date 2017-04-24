<?php
// #############    tmp_personas_notikums   ###########################

$fields =" * ";
$ftabula="tmp_personas_notikums";
$fwhere="";
$event_users = sqltoarray($fields,$ftabula,$fwhere,$db);
$evUser=$event_users[0];

$fields=" teksts_out ";
$ftabula="tmp_teksts_notikums";
$fwhere=" id_master=".$_SESSION['EVENTS']['ID']." and id_pers=".$evUser['id_pers'];
$event_teksts = sqltoarray($fields,$ftabula,$fwhere,$db);

if (empty($event_teksts)) {
    $tekst="";
} else {
    $ev_tekst = $event_teksts[0];
    $tekst=$ev_tekst['teksts_out'];
}
?>
<div id="divNewEvent" style="width:100%; margin: 7px;">
    <div id="divNewEventTitle">
        <span id="spantitle" style="width:100%;"> Jauns ZIŅOJUMS    [<?php echo $_SESSION['EVENTS']['KODS'] ?>]</span><br>
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
                            <td style=" background: white;"><textarea name="zinojums" style="width:80%;font-family: verdana;font-size: 11px;"><?php echo $tekst; ?></textarea>
                                <input type="submit" name="teksts_to_event" value="Saglabāt">
                            </td>
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

    <div id="divNewEventTitle"><input type="submit" name="new_event_cancel" value="Atcelt" style="float:right; margin: 4px;"><input type="submit" name="new_event_accept" value="Pievienot notikumiem" style="float:right; margin: 4px;">
    </div>
</div>