<?php
/**
 * Created by PhpStorm.
 * User: talivaldis.olekss
 * Date: 09.04.2017
 * Time: 18:45
 */
$where=" id_event =".$one_event['ID'];
$ev_pers=sqltoarray(' * ','personas_notikums',$where,$db);
$pers=count($ev_pers);

$where=" id_event =".$one_event['ID']." and status = 1 ";
$ev_atb=sqltoarray(' * ','personas_notikums',$where,$db);
$atb=count($ev_atb);

$visas_atb=0;
if ($pers==$atb){
    $visas_atb=1;
}


$where=" source='notikumi' && id_master =".$one_event['ID'];
$ev_faili=sqltoarray(' * ','faili',$where,$db);


?>
<div id="ev_task"  style="width: 100%;">
    <div id="ev_task_title" style="width: 100%;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 25%;">
                    <div>
                        <?php   if ($visas_atb==0){
                            $imag = '<img id="logo" src="icons\rosette.png" alt="NEW" >';
                        }
                        if ($visas_atb==1){
                            $imag = '<img id="logo" src="icons\tick.png" alt="ACCEPT" >';

                        }
                        if ($atb>0&&$atb<$pers){
                            $imag = '<img id="logo" src="icons\error.png" alt="WAIT" >';
                        }
                        echo $imag;
                        ?>
                    </div>
                    <span id="span_14_br">UZDEVUMS</span>
                </td>
                <td style="width: 50%;">
                    <span id="span_16_yealow">ID: </span>
                    <span id="span_14_br"><?php echo $one_event['event_id'] ?></span>
                </td>
                <td style="width: 25%;">
                    <span id="span_16_yealow">Datums: </span>
                   <span id="span_14_br"> <?php echo $one_event['event_date'] ?></span>
                </td>
            </tr>
        </table>
    </div>
    <div style="width:85%;float:left;">
        <table style="width: 100%;text-align: center;border-collapse: collapse;">
            <tr style="width: 100%; background: cornsilk;" >
                <td style="width: 10%;border-bottom: 2px solid silver;background: darkgoldenrod;">
                    <span id="span_13_yealow">Personas</span>
                </td>
                <td style="width: 3%;border-bottom: 2px solid silver;background: darkgoldenrod;border-left: 2px solid burlywood;">
                    <span id="span_13_yealow">Struktūra</span>

                </td>
                <td style="width: 33%;border-bottom: 2px solid silver;background: darkgoldenrod;border-left: 2px solid burlywood;">

                    <span id="span_13_yealow">Uzdevums</span>

                </td>
                <td style="width: 33%;border-bottom: 2px solid silver;background: darkgoldenrod;border-left: 2px solid burlywood;">
                    <span id="span_13_yealow">Atbilde</span>

                </td>
                <td style="width: 5%;border-bottom: 2px solid silver;background: darkgoldenrod;border-left: 2px solid burlywood;">
                    <span id="span_13_yealow">Atb.dat.</span>

                </td>
             </tr>
        </table>
        <table>
            <?php foreach ($ev_pers as $one_ev_pers){ ?>
            <tr style="width: 100%; background: cornsilk;" >
                <td  style="width: 1%;">
                    <?php   if ($one_ev_pers['status']==0){
                        $imag = '<img id="logo" src="icons\stop.png" alt="STOP" >';
                    }
                     if ($one_ev_pers['status']==1){
                         $imag = '<img id="logo" src="icons\accept.png" alt="ACCEPT" >';
                     }
                     if ($one_ev_pers['status']==2){
                        $imag = '<img id="logo" src="icons\error.png" alt="ERROR" >';
                    }
                    echo $imag;
                    ?>
<!--                    <span id="span_12_blue">--><?php //echo $one_ev_pers['status'] ?><!--</span>-->
                </td>
                <td style="width: 10%;">
                     <span id="span_12_blue"><?php echo $one_ev_pers['persona'] ?></span>
                </td>
                <td  style="width: 3%;">
                    <span id="span_12_blue"><?php echo $one_ev_pers['struktura_kods'] ?></span>

                </td>
                <td  style="width: 33%;">

                    <span id="span_12_blue"><?php echo $one_ev_pers['uzdevums'] ?></span>

                </td>
                <td  style="width: 33%;">
                    <span id="span_12_blue"><?php echo $one_ev_pers['atbilde'] ?></span>

                </td>
                <td  style="width: 5%;">
                    <span id="span_12_blue"><?php echo $one_ev_pers['atbild_datums'] ?></span>

                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div style="width:15%;float:left;">

            <?php if (!empty($ev_faili)) {?>
                <table style="width:100%;border-collapse: collapse;">
                    <tr>
                        <td style="background: darkgoldenrod;text-align: center;">
                            <span id="span_13_yealow">Pievienotie faili</span>
                        </td>
                    </tr>

                <?php foreach ($ev_faili as $efile) { ?>
                    <tr>
                        <td>
                             <?php echo  "<a id='span_12_blue_italic' href='uploads\\".$efile['konvert_name']."'>".$efile['orginal_name']."</a>"; ?>
                        </td>
                    </tr>
                <?php }
            }?>
        </table>
    </div>


</div>