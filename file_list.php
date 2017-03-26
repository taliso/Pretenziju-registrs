<?php
echo '<div id="divFailiTitle">';
echo '<input type="file" name="fileUzdev" id="fileDoc" style="margin:4px;"><input style="float:right; margin: 4px;" type="submit" name="doc_to_event" value="Pievienot" >';
echo '</div>';



echo '<div id="divFaili" style="width:100%; float:left; border: 1px solid blue;">';
echo '<table>';
if (isset($event_files)){
	foreach ($event_files as $evFile) {	
echo '<tr>';
echo '						<td style="width:12%;"><span id="list_span">';
							echo $evFile['name'];	
echo '			  			</span></td>';
echo '						<td style="width:12%;"><span id="list_span">';
							echo $evFile['size'];		
echo '			  			</span></td>';			  			
echo '				  </tr>';	  	
 }
			  }		
 echo '			  </table>';
 echo '	  </div>'; ?>
