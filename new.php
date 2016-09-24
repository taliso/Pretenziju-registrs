 <!DOCTYPE html>
<html>
<body>
<style>
	ul li {
		display: inline;
		border: 1px solid red;
		padding: 5px;
		background: orange;
		border-radius: 5px;
		}
		
		a {			
			text-decoration: none;
			font-weight: bold;
			color: yellow;
		}
	
</style>
<h1>My First Heading</h1>
<p>My first paragraph.</p>

<ul>
	<li><a href="?lapa=pirmais">Pirmais</a></li>
	<li><a href="?lapa=otrais">Otrais</a></li>
</ul>



 <?php	
		if(isset($_GET['lapa'])){
			include($_GET['lapa'].".php");
		}
	?>
	
</body>
</html>   

  