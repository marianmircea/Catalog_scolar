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
					<li><a href="Parinte_viz_note.php" target="_self">Viz. Note</a></li>
					<li><a href="Parinte_viz_abs.php" target="_self">Viz. Abs.</a></li>
				</ul>
				<div class="clear"></div>
				<h3>Datele d-voastra de identificare sunt urmatoarele:</h3>
				<table id="date_identificare">
				  <tr>
					<th>Nume</th>
					<th>Prenume</th> 
					<th>Tel. contact</th>
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
	echo $_SESSION["telefon"];
?>
					</td>
					<td>
<?php
	echo $_SESSION["utilizator"];
?>					
					</td>
				  </tr>
				</table>
			<h3>Elevul(ii) pentru care vom afisa date:</h3>
			<table id="date_identificare">
				  <tr>
					<th>Nume</th>
					<th>Prenume</th> 
					<th>Nr. Matricol</th>
				  </tr>
<?php
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$conn = mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	$cerinta_elevi = "SELECT * FROM elevi";
	$elevi = mysqli_query($conn, $cerinta_elevi);
	$out = 0;
	for ($i = 0; $i < mysqli_num_rows($elevi); $i++) {
		$linie_elevi = mysqli_fetch_assoc($elevi);
		if ($linie_elevi["id_parinte"] == $_SESSION["id_unic"]) {
			$out = 1;
			$elevul = $linie_elevi["nr_matricol"];
			$elev_nume = $linie_elevi["nume"];
			$elev_pren = $linie_elevi["prenume"];
			/*echo $elev_nume."__";
			echo $elev_pren."__";
			echo $elevul."<br>";*/
?>
			
				  <tr>
					<td>
<?php
	echo $elev_nume;
?>
					</td>
					<td>
<?php
	echo $elev_pren;
?>
					</td>
					<td>
<?php
	echo $elevul;
?>
					</td>
				  </tr>
				
<?php
			}
		}
	if ($out == 0) {
		echo "Elevul d-voastra inca nu are cont creat.<br>";
		echo "<br>";
		}
?>
				</table>
			</section>
			<footer>
				<div id="catalog_footer">
					<h2>contact</h2>
				</div>
			</footer>	
		</body>
	</html>