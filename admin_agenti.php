<?php
$adm_agents_aktivs='';
$lietotaji=sqltoarray('*','kl_agenti','',$db);
	?>

	<div>
        <div id="divLietSar">
                             <table>
                                <tr>
                                    <td style="background-color: indigo;color: ivory;width:30%;">Vārds, uzvārds
                                    </td>
                                    <td style="background-color: indigo;color: ivory;width:12%;">Lietotājs
                                    </td>
                                    <td style="background-color: indigo;color: ivory;width:10%;">Tiesibas
                                    </td>
                                    <td style="background-color: indigo;color: ivory;width:3%;">Loma
                                    </td>
                                    <td style="background-color: indigo;color: ivory;width:5%;">Struktūra
                                    </td>
                                    <td style="background-color: indigo;color: ivory;width:20%;">E-pasts
                                    </td>
                                    <td style="background-color: indigo;color: ivory;width:3%;">Aktīvs
                                    </td>

                                </tr>
                        <?php
                         foreach ($lietotaji as $persona) {?>

                                <tr>
                                    <td style="width:30%;font-family: Verdana;font-size: 12px;">

                                        <?php
                                            echo '<a href="?cilv='.$persona['agents'].'" style= "color: #b9ceb6;">'.$persona['agents']; ?>
                                    </td>
                                    <td  style="width:12%;font-family: Verdana;font-size: 12px;"><?php echo $persona['username'];?>
                                    </td>
                                    <td  style="width:10%;font-family: Verdana;font-size: 12px;"><?php echo $persona['tiesibas'];?>
                                    </td>
                                    <td  style="width:3%;font-family: Verdana;font-size: 12px;"><?php echo $persona['loma'];?>
                                    </td>
                                    <td  style="width:5%;font-family: Verdana;font-size: 12px;"><?php echo $persona['struktura_kods'];?>
                                    </td>
                                    <td  style="width:20%;font-family: Verdana;font-size: 12px;"><?php echo $persona['epasts'];?>
                                    </td>
                                    <td  style="width:3%;font-family: Verdana;font-size: 12px;">
                                        <?php StatCheckBox('aktivs',$persona['aktivs'],'','',' disabled') ;
                                        //echo $persona['aktivs'];
                                        ?>
                                    </td>
                                </tr>
                            <?php
                                }
                                ?>
                        </table>
        </div>

<?php
// $$$$$$$$$$$$$$$$$$$$$$$$$$$   PERSONAS KARTIŅA  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
if (isset($_GET['cilv'])){
    $cilv=$_GET['cilv'];
    $sCilv=sqltoarray(' * ','kl_agenti'," agents = '".$cilv."'",$db);
    if ($_SESSION['ADMIN']['STATUS']!='NEW'){
        $aCilv=$sCilv[0];
        $_SESSION['ADMIN']['ID']=$aCilv['ID'];
    } else {
        $aCilv=array(
            'agents'=>'',
            'username'=>'',
            'pasword'=>'',
            'tiesibas'=>'',
            'loma'=>'',
            'epasts'=>'',
            'esutit'=>'',
            'struktura_kods'=>'',
            'aktivs'=>''
        );
        $_SESSION['ADMIN']['ID']=0;
    }
   $adm_agents_aktivs=$aCilv['aktivs'];
    $adm_agents_esutit=$aCilv['esutit'];
		//echo $cilv.$cilv.$cilv.$cilv.$cilv.$cilv.$cilv;

    if ($_SESSION['ADMIN']['STATUS']=='NEW'){
        $agent_kart_status='';
        $backcolor='black';
        $fcolor='lime';
        $style_adm_kart="background:$backcolor; color:$fcolor;";
    }
    if ($_SESSION['ADMIN']['STATUS']=='EDIT'){
        $agent_kart_status='';
        $backcolor='black';
        $fcolor='lime';
        $style_adm_kart="background:$backcolor; color:$fcolor;";
    }
    if ($_SESSION['ADMIN']['STATUS']=='VIEW' or $_SESSION['ADMIN']['STATUS']=='LIST'){
        $agent_kart_status=' DISABLED';
        $backcolor='grey';
        $fcolor='lime';
        $style_adm_kart="background:$backcolor; color:$fcolor;";
    }

    ?>

        <div id="divLietKart" >
            <div id="divAdmTitle">
                Programmas lietotāja kartiņa
            </div>
        <table style="width:100%;">
                <tr>
                    <td style="width:30%;">
                        <span id="tx_12_dzigs">Vārds:</span>
                    </td>
                    <td style="width:65%;">
                        <input id="text_admin" style="<?php echo $style_adm_kart ?>;" type="text" name="agents" value="<?php echo $aCilv['agents']; ?>" <?php echo $agent_kart_status?>>
                    </td>
                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">Lietotāja vārds:</span>
                    </td>
                    <td>
                        <input ID="text_admin" style="<?php echo $style_adm_kart ?>;" type="text" name="username" value="<?php echo $aCilv['username']; ?>" <?php echo $agent_kart_status?>>
                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">Parole:</span>
                    </td>
                    <td>
                        <input ID="text_admin" style="<?php echo $style_adm_kart ?>;" type="password" name="pasword" value="<?php echo $aCilv['pasword']; ?>" DISABLED><br>
<!--                        <input ID="text_admin" type="text" name="pasword2" value="">-->
                        <?php
                        if ($_SESSION['ADMIN']['STATUS']=='EDIT'){ ?>
                            <input type="submit" name="admin_passw" value="Mainīt">
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">Tiesības:</span>
                    </td>
                    <td>
                        <input ID="text_admin" style="<?php echo $style_adm_kart ?>;" type="text" name="tiesibas" value="<?php echo $aCilv['tiesibas']; ?>"  DISABLED>
                        <?php if ($_SESSION['ADMIN']['STATUS']=='EDIT'){ ?>
                            <input type="submit" name="admin_trust" value="...">
                        <?php } ?>
                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">Loma:</span>
                    </td>
                    <td>
                        <input ID="text_admin" style="<?php echo $style_adm_kart ?>;" type="text" name="loma" value="<?php echo $aCilv['loma']; ?>"  DISABLED>
                        <?php if ($_SESSION['ADMIN']['STATUS']=='EDIT'){ ?>
                            <input type="submit" name="admin_loma" value="...">
                        <?php } ?>
                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">E-pasts:</span>
                    </td>
                    <td>
                        <input ID="text_admin" style="<?php echo $style_adm_kart ?>;" type="text" name="epasts" value="<?php echo $aCilv['epasts']; ?>">
                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">Struktūra:</span>
                    </td>
                    <td>
                        <input ID="text_admin" style="<?php echo $style_adm_kart ?>;" type="text" name="struktura_kods" value="<?php echo $aCilv['struktura_kods']; ?>"   DISABLED>
                        <?php if ($_SESSION['ADMIN']['STATUS']=='EDIT'){ ?>
                            <input type="submit" name="admin_strukt" value="...">
                        <?php } ?>
                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">E-pastu sūtīt:</span>
                    </td>
                    <td>
<!--                        StatCheckBox ( 'obl_dok_crm', $obl_dok_crm, 'CMR', '<br>', '' );-->
                        <?php $aesutit=StatCheckBox1 ( 'esutit',$adm_agents_esutit, $agent_kart_status);
                        echo $aesutit['teksts'];
                        $aCilv['esutit']=$aesutit['teksts'];
                        ?>

                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">Aktīvs:</span>
                    </td>
                    <td>
<!--                        <input ID="text_admin" type="text" name="aktivs" value="--><?php //echo $aCilv['aktivs']; ?><!--">-->
                        <?php $aaktivs=StatCheckBox1 ( 'aktivs',$adm_agents_aktivs, $agent_kart_status);
                        echo $aaktivs['teksts'];
                        $aCilv['aktivs']=$aaktivs['teksts'];
                        ?>
                    </td>
              </tr>
            </table><?php
            if ($_SESSION['ADMIN']['STATUS']=='EDIT' or $_SESSION['ADMIN']['STATUS']=='NEW') {
                echo '<input type="submit" name="admin_save" value="Saglabāt">';
                echo '<input type="submit" name="admin_canc" value="Atcelt">';
            } else {
                echo '<input type="submit" name="admin_new" value= "Jauns">';
                echo ' <input type="submit" name="admin_edit" value="Labot">';
              }?>
        </div>
    <?php }

    // ----------------------   PAROLES MAIŅAS FORMA  -----------------------------------------------------
    if ($_SESSION['ADMIN']['SUBFORM']=='password') {?>
        <div id="divAdminPsw">
            <div id="divAdmTitle">
                Paroles maiņa
            </div>
            <table>
                <tr>
                    <td><span id="tx_12_dzigs">Jaunā parole:</span></td>
                    <td><input type="password" name="parole" value="" style=" margin:2px; width:96%; float:left;"></td>
                    <td><input style="float:right; margin: 4px;" type="submit" name="adm_psw_accept" value="Apstiprinu" ></td>
                </tr>
                <tr>
                    <td><span id="tx_12_dzigs">Vēlreiz parole:</span></td>
                    <td><input type="password" name="parole2" value="" style=" margin:2px; width:96%; float:left;"></td>
                    <td><input style="float:right; margin: 4px;" type="submit" name="adm_psw_cancel" value="Atcelt" ></td>
                </tr>
            </table>
        </div>



    <?php }
        // ----------------------   LOMAS MAIŅAS FORMA  -----------------------------------------------------
         if ($_SESSION['ADMIN']['SUBFORM']=='role') {
            $aRoles=sqltoarray(' kods, nosaukums ', 'kl_lomas', '', $db);
            ?>
                <div id="divAdminPsw">
                    <div id="divAdmTitle">
                        Lomas maiņa
                    </div>
                    <table>
                        <tr>
                            <td><span id="tx_12_dzigs">Jaunā loma:</span></td>
                            <td>
                                <select name="loma" style="width:100%; margin:2px;">
                                    <?php
                                    foreach ($aRoles as $role) {?>
                                        <option value="<?php echo $role['nosaukums'] ?>"><?php echo $role['nosaukums'] ?></option>
                                    <?php }
                                    ?>
                                </select>

                            </td>
                            <td><input style="float:right; margin: 4px;" type="submit" name="adm_role_accept" value="Apstiprinu" >
                                <input style="float:right; margin: 4px;" type="submit" name="adm_psw_cancel" value="Atcelt" ></td>
                        </tr>
                      </table>
                </div>
        <?php }
// ----------------------   STRUKTUAS MAIŅAS FORMA  -----------------------------------------------------
if ($_SESSION['ADMIN']['SUBFORM']=='atrukture') {
    $aRoles=sqltoarray(' kods, nosaukums ', 'kl_strukturas', '', $db);
    ?>
    <div id="divAdminPsw">
        <div id="divAdmTitle">
            Struktūras maiņa
        </div>
        <table>
            <tr>
                <td><span id="tx_12_dzigs">Jaunā struktūra:</span></td>
                <td>
                    <select name="struktura" style="width:100%; margin:2px;">
                        <?php
                        foreach ($aRoles as $role) {?>
                            <option value="<?php echo $role['nosaukums'] ?>"><?php echo $role['nosaukums'] ?></option>
                        <?php }
                        ?>
                    </select>

                </td>
                <td><input style="float:right; margin: 4px;" type="submit" name="admin_strukt_accept" value="Apstiprinu" >
                    <input style="float:right; margin: 4px;" type="submit" name="adm_psw_cancel" value="Atcelt" ></td>
            </tr>
        </table>
    </div>
<?php } ?>

    </div>
