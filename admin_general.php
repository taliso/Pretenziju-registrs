<?php
/**
 * Created by PhpStorm.
 * User: talivaldis.olekss
 * Date: 17.04.2017
 * Time: 12:21
 */


if(isset($_GET['mnAdm'])){
    $mnAdmin=$_GET['mnAdm'];
    switch ($mnAdmin) {
        case 'mnaUsers':
            $AdminForm='admin_agenti.php';
            break;
        case 'mnaStrukt':
            $AdminForm='';
            break;
        case 'mnaTies':
            $AdminForm='';
            break;
        case 'mnaLoma':
            $AdminForm='';
            break;
        case 'mnaOpc':
            $AdminForm='';
            break;
        default:
            $AdminForm='';
    }
}

?>
<div id="divAdminGeneral">
    <div id="divAdminTitle">
        <span id="span_16_yealow">
            Administrēšanas forma
          </span>
    </div>
    <div id="divAdminForma">
        <div id="divAdminMenju">
            <a id='mnAdmin' href="?mnAdm=mnaUsers">Lietotāju saraksts</a>
           <br>
            <a id='mnAdmin' href="?mnAdm=mnaStrukt">Struktūrvienības</a>
           <br>
            <a id='mnAdmin' href="?mnAdm=mnaTies">Tiesību veidi</a>
           <br>
            <a id='mnAdmin' href="?mnAdm=mnaLoma">Lomu veidi</a>
           <br>
            <a id='mnAdmin' href="?mnAdm=mnaOpc">Opcijas</a>
            <br>
            <br>
            <br>

             <a id='mnAdmin' href="index.php">Iziet</a>


        </div>
        <div id="divAdminWork">
        <?php
            include "admin_agenti.php";
        ?>
        </div>
    </div>


</div>