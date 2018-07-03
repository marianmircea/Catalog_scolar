<?php
	session_start();
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html>
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Editare | Catalog online</title>
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
					<li><a href="Inreg_prof_note.php" target="_self">Inreg. Note individuale</a></li>
					<li>
						<form action="Inreg_prof_note_grup.php" method="get">
											<select name="clasa">
												<option value="0">Clasa
												<option value="9">9
												<option value="10">10
												<option value="11">11
												<option value="12">12
											</select>
											<input type="submit" name="submit" value="Inreg. Note grup">
						</form>
					</li>
					<li><a href="Inreg_prof_abs.php" target="_self">Inreg. Abs.</a></li>
					<li><a href="Prof_viz_note.php" target="_self">Viz. Note</a></li>
					<li><a href="Prof_viz_abs.php" target="_self">Viz. Abs.</a></li>
				</ul>
				<div class="clear"></div>
				<h3>Datele D-voastra de identificare sunt urmatoarele:</h3>
				<table id="date_identificare">
				  <tr>
					<th>Nume</th>
					<th>Prenume</th> 
					<th>Materia predata</th>
					<th>Utilizator</th>
				  </tr>
				  <tr>
					<td>
<?php
	echo $_SESSION["nume_user"];
?>
					</td>
					<td>
<?php
	echo $_SESSION["prenume_user"];
?>
					</td>
					<td>
<?php
	echo $_SESSION["materia"];
?>
					</td>
					<td>
<?php
	echo $_SESSION["utilizator"];
?>					
					</td>
				  </tr>
				</table>
			</section>
			<footer>
				<div id="catalog_footer">
					<h2>contact</h2>
				</div>
			</footer>	
		</body>
	</html>