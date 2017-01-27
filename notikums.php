<?php


if($_SESSION['STATUS'] == "NEWEVENT"){
	$notik_list['event_npk']="0";
}?>



<div id="divEvent">
		<div id='divEventTitle'> <span id="fspan2">
		    Jauns notikums </span>
		</div><br>
		<div id="divEventUzdevums">
			<table>
				<tr>
					<td><?php echo $notik_list['event_npk'] ?></td>
					<td><span id="evspan1">Uzdevums:</span><input type="text" name="uzdevums" value="" size="200"></td>
					
				</tr>
				<tr>
					<td></td>
					<td> <input type="submit" name="addEvent" value="Saglabāt"></td>
				</tr>
			</table>
		</div>




<!-- 	<div id="divEventGalva"> -->
<!-- 		<span id="evspan1">Nr: 0</span> -->
<!--		<div style="width:40%"> -->
			
<!-- 		</div> -->
<!-- 		<span id="evspan2">Reģ.datums:</span> -->
<!-- 		<input type="text" name="reg_time" value=""><br> -->
<!-- 		<div id="divEventUzdevums"> -->
<!-- 			<span id="evspan1">Uzdevums:</span><br> -->
<!-- 			<input type="text" name="reg_time" value="" size="200"> -->
<!-- 		</div> -->
<!-- 		<div id="divEventLemums">  -->
<!-- 		</div>  -->
<!-- 		<div id="divEventIzpilde">  -->
<!-- 		</div> -->
<!-- 	</div>  -->
</div>