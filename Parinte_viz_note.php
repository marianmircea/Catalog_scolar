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
					<form action="php\vizz_note_parinte.php" method="post">
						<p>Clasa   <select name="clasa">
							<option value="0">...</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select></p>
						<p>Materia   <select name="materia">
							<option value="0">...</option>
							<option value="1">Lb. Romana</option>
							<option value="2">Lb. Engleza</option>
							<option value="3">Lb. Franceza</option>
							<option value="4">Lb. Germana</option>
							<option value="5">Matematica</option>
							<option value="6">Fizica</option>
							<option value="7">Chimia</option>
							<option value="8">Biologia</option>
							<option value="9">Istoria</option>
							<option value="10">Geografia</option>
							<option value="11">Informatica</option>
							<option value="12">St. Socio-Umane</option>
							<option value="13">Religia</option>
							<option value="14">Ed. Muzicala</option>
							<option value="15">Ed. Plastica</option>
							<option value="16">Ed. Fizica & Sport</option>
							<option value="17">Ed. Tehnologica</option>
							<option value="18">TIC (Tehn. Inform. & Comunic.)</option>
							<option value="19">Ed. Antreprenoriala</option>
							<option value="20">Latina</option>
							<option value="21">Materie specifica 1</option>
							<option value="22">Materie specifica 2</option>
							<option value="23">Optional 1</option>
							<option value="24">Optional 2</option>
						</select></p>
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