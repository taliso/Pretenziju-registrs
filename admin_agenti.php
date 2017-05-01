<?php

$lietotaji=sqltoarray('*','kl_agenti','',$db);
	?>

	<div>
        <div id="divLietSar">
                             <table>
                                <tr>
                                    <td class="tcol3" style="background-color: indigo;color: ivory;">Vārds, uzvārds
                                    </td>
                                    <td class="tcol3" style="background-color: indigo;color: ivory;">Lietotājs
                                    </td>
                                    <td class="tcol3" style="background-color: indigo;color: ivory;">Tiesibas
                                    </td>
                                    <td class="tcol1" style="background-color: indigo;color: ivory;">Loma
                                    </td>
                                    <td class="tcol1" style="background-color: indigo;color: ivory;">Struktūra
                                    </td>
                                    <td class="tcol3" style="background-color: indigo;color: ivory;">E-pasts
                                    </td>
                                    <td class="tcol1" style="background-color: indigo;color: ivory;">Aktīvs
                                    </td>

                                </tr>
                        <?php
                         foreach ($lietotaji as $persona) {?>

                                <tr>
                                    <td class="tcol3">

                                        <?php
                                            echo '<a href="?cilv='.$persona['agents'].'" style= "color: #b9ceb6;">'.$persona['agents']; ?>
                                    </td>
                                    <td class="tcol3"><?php echo $persona['username'];?>
                                    </td>
                                    <td class="tcol3"><?php echo $persona['tiesibas'];?>
                                    </td>
                                    <td class="tcol1"><?php echo $persona['loma'];?>
                                    </td>
                                    <td class="tcol1"><?php echo $persona['struktura_kods'];?>
                                    </td>
                                    <td class="tcol3"><?php echo $persona['epasts'];?>
                                    </td>
                                    <td class="tcol1">
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
<?php if (isset($_GET['cilv'])){
    $cilv=$_GET['cilv'];
    $sCilv=sqltoarray(' * ','kl_agenti'," agents = '".$cilv."'",$db);
    $aCilv=$sCilv[0];
		//echo $cilv.$cilv.$cilv.$cilv.$cilv.$cilv.$cilv; ?>


        <div id="divLietKart" >
            <div style="background-color: indigo;color: ivory; height:20px;">
                Programmas lietotāja kartiņa
            </div>
        <table style="width:100%;">
                <tr>
                    <td style="width:50%;">
                        <span id="tx_12_dzigs">Vārds:</span>
                    </td>
                    <td style="width:50%;">
                        <input id="text_admin" type="text" name="agents" value="<?php echo $aCilv['agents']; ?>.">
                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">Lietotāja vārds:</span>
                    </td>
                    <td>
                        <input ID="text_admin" type="text" name="username" value="<?php echo $aCilv['username']; ?>">
                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">Parole:</span>
                    </td>
                    <td>
                        <input ID="text_admin" type="text" name="pasword" value="<?php echo $aCilv['pasword']; ?>"><br>
                        <input ID="text_admin" type="text" name="pasword2" value="">
                        <input type="submit" name="admin_passw" value="Saglabāt">
                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">Tiesības:</span>
                    </td>
                    <td>
                        <input ID="text_admin" type="text" name="tiesibas" value="<?php echo $aCilv['tiesibas']; ?>">
                        <input type="submit" name="admin_trust" value="...">
                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">Loma:</span>
                    </td>
                    <td>
                        <input ID="text_admin" type="text" name="loma" value="<?php echo $aCilv['loma']; ?>">
                        <input type="submit" name="admin_loma" value="...">
                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">E-pasts:</span>
                    </td>
                    <td>
                        <input ID="text_admin" type="text" name="epasts" value="<?php echo $aCilv['epasts']; ?>">
                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">Struktūra:</span>
                    </td>
                    <td>
                        <input ID="text_admin" type="text" name="struktura_kods" value="<?php echo $aCilv['struktura_kods']; ?>">
                        <input type="submit" name="admin_strukt" value="...">
                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">E-pastu sūtīt:</span>
                    </td>
                    <td>
                        <input ID="text_admin" type="text" name="esutit" value="<?php echo $aCilv['aktivs']; ?>">
                    </td>

                </tr>
                <tr>
                    <td>
                         <span id="tx_12_dzigs">Aktīvs:</span>
                    </td>
                    <td>
                        <input ID="text_admin" type="text" name="aktivs" value="<?php echo $aCilv['aktivs']; ?>">
                    </td>

                </tr>

            </table>
            <input type="submit" name="admin_save" value="Saglabāt"><input type="submit" name="admin_new" value="Jauns"><input type="submit" name="admin_canc" value="Atcelt">
        </div>
    <?php } ?>
	</div>	
