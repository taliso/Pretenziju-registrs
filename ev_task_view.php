<?php
/**
 * Created by PhpStorm.
 * User: talivaldis.olekss
 * Date: 09.04.2017
 * Time: 18:45
 */
$where=" event_id ='".$one_event['event_id']."'";
$pret_ev=sqltoarray(' * ','personas_notikums',$where,$db)


?>
<div id="ev_task"  style="width: 100%;">
    <div id="ev_task_title" style="width: 100%;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 25%;">
                    <span id="span_18_yealow">Uzdevums</span>
                </td>
                <td style="width: 50%;">
                    <span id="span_18_yealow">Numurs</span>
                </td>
                <td style="width: 25%;">
                   <span id="span_18_yealow"> Datums</span>
                </td>
            </tr>
        </table>
    </div>
        <table style="width: 100%;text-align: center;">
            <tr style="width: 100%; background: #38d4d4">
                <td style="width: 10%;">
                     <span id="span_12_blue">Personas</span>
                </td>
                <td style="width: 10%;">
                    <span id="span_12_blue">Struktūra</span>

                </td>
                <td style="width: 35%;">

                    <span id="span_12_blue">Uzdevums</span>

                </td>
                <td style="width: 35%;">
                    <span id="span_12_blue">Atbilde</span>

                </td>
                <td style="width: 7%;">
                    <span id="span_12_blue">Datums</span>

                </td>
            </tr>
             <tr>
                <td>
                    Personas
                </td>
                <td>
                    Struktūra
                </td>
                <td>
                    Uzdevums
                </td>
                <td>
                    Atbilde
                </td>
                <td>
                    Datums
                </td>
            </tr>
            <tr>
                <td>
                    Personas
                </td>
                <td>
                    Struktūra
                </td>
                <td>
                    Uzdevums
                </td>
                <td>
                    Atbilde
                </td>
                <td>
                    Datums
                </td>
            </tr>
        </table>




</div>