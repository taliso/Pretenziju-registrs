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
                                    <td class="tcol3" style="background-color: indigo;color: ivory;">Parole
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
                                            echo '<a href="?cilv='.$persona['agents'].'" style= "color: black;">'.$persona['agents']; ?>
                                    </td>
                                    <td class="tcol3"><?php echo $persona['username'];?>
                                    </td>
                                    <td class="tcol3"><?php echo $persona['pasword'];?>
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
            <table style="width:100%;">
                <tr>
                    <td style="width:50%;">
                        Vārds:
                    </td>
                    <td style="width:50%;">
                        <input ID="text_pret" type="text" name="agents" value="<?php echo $aCilv['agents']; ?>.">
                    </td>

                </tr>
                <tr>
                    <td>
                        Lietotāja vārds:
                    </td>
                    <td>
                        <input ID="text_pret" type="text" name="username" value="<?php echo $aCilv['username']; ?>">
                    </td>

                </tr>
                <tr>
                    <td>
                        Parole:
                    </td>
                    <td>
                        <input ID="text_pret" type="text" name="pasword" value="<?php echo $aCilv['pasword']; ?>"><br>
                        <input ID="text_pret" type="text" name="pasword2" value="">
                    </td>

                </tr>
                <tr>
                    <td>
                        Tiesības:
                    </td>
                    <td>
                        <input ID="text_pret" type="text" name="tiesibas" value="<?php echo $aCilv['tiesibas']; ?>">
                    </td>

                </tr>
                <tr>
                    <td>
                        Loma:
                    </td>
                    <td>
                        <input ID="text_pret" type="text" name="loma" value="<?php echo $aCilv['loma']; ?>">
                    </td>

                </tr>
                <tr>
                    <td>
                        E-pasts:
                    </td>
                    <td>
                        <input ID="text_pret" type="text" name="epasts" value="<?php echo $aCilv['epasts']; ?>">
                    </td>

                </tr>
                <tr>
                    <td>
                        Struktūra:
                    </td>
                    <td>
                        <input ID="text_pret" type="text" name="struktura_kods" value="<?php echo $aCilv['struktura_kods']; ?>">
                    </td>

                </tr>
                <tr>
                    <td>
                        E-pastu sūtīt:
                    </td>
                    <td>
                        <input ID="text_pret" type="text" name="esutit" value="<?php echo $aCilv['aktivs']; ?>">
                    </td>

                </tr>
                <tr>
                    <td>
                        Aktīvs:
                    </td>
                    <td>
                        <input ID="text_pret" type="text" name="aktivs" value="<?php echo $aCilv['aktivs']; ?>">
                    </td>

                </tr>

            </table>
            <input type="submit" name="admin_save" value="Saglabāt">
        </div>
    <?php } ?>
	</div>	
