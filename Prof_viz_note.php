<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Creare cont | Catalog online</title>
		<link rel="stylesheet" type="text/css" href="css\css_pt_catalog.css">
	</head>
	<body>
		<header>
			<div id="catalog_header">
				<h1>CN Ion Creanga Bistrita - Catalog online. Bun venit!</h1>
			</div>
		</header>
			<section>
				<ul id="two_buttons">
					<li><a href="php\log_out.php" target="_self">Logout</a></li>
				</ul>
				<div class="clear"></div>
				<div class="form_boxes">
					<form action="php\vizz_note_prof.php" method="post">
						<p>Clasa   <select name="clasa">
							<!--<option value="0">...</option>-->
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select></p>
						<p>Elev <input type="text" name="matricol"/></p>
						<p><input type="submit" value="Arata"/></p>
					</form>
				</div>
			</section>	
		<footer>
			<div id="catalog_footer">
				<h2>contact</h2>
			</div>
		</footer>	
	</body>
</html>