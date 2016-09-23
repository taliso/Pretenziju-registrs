    <?php	
		$fixdat="";
			echo ("1:fixdat___".$fixdat."<br>");
			$fd=0;
			echo ("2:fd____".$fd."<br>");
			$fixdat=date("d.m.Y",time("tomorrow"));
			$adate=getdate();
			print_r($adate);
			echo ("3:fixdat____".$fixdat."<br>");
			echo ("4:fixdat____".$fixdat."<br>");
	?>
	