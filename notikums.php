<?php




?>

<div id="divNewEvent">
		<div id='divEventTitle'> <span id="fspan2">
		     Notikums Nr:<?php echo $event_npk ?></span>
		</div>
		<div id="divEventUzdevums">
			<span id="evspan1">Uzdevums:</span><input type="text" name="uzdevums" value="" size="200">
			<table>
				<tr>
					<td class="info2"><span id="evspan2">Sākts:</span><input type="text" name="reg_time" value="<?php echo date("Y-m-d"); ?>" size="50" disabled></td>
					<td class="info2"><span id="evspan2">Termiņš:</span><input type="text" name="termins" value="" size="50"></td>
					<td class="info2"><span id="evspan2">Izpildīts:</span><input type="text" name="izpildes_dat" value="" size="50"></td>
				</tr>
				<tr>
					<td class="info2"><span id="evspan2">Izpildītājs:</span>
						<select id="selekts" name="persona">
				    			<?php	foreach($teh_list as $teh){
				    			$itd=$teh['agents'];
		    					 echo "<option value='$itd'>$itd</option>"; 
				    		}   ?>
			    		</select>					 
						
					
					</td>
					<td class="info2"></td>
					<td class="info2"><input type="checkbox" name="pedejais" value="1"> Šis ir pēdējais notikums</td>
				</tr>
				
			</table>
		</div>
		<input type="submit" name="addEvent" value="Saglabāt">
</div>