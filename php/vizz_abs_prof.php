<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Creare cont | Catalog online</title>
		<link rel="stylesheet" type="text/css" href="css_pt_afisare.css">
	</head>
	<body>
		<section>
<?php
	session_start();
	$parola = "";
	$clasa = $_POST["clasa"];
	$sem = $_POST["semestrul"];
	$materia = $_SESSION["materia"];
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$conn = mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	$selectie = "SELECT * FROM materii WHERE nume_materie = '$materia'";
	$tipp = mysqli_query($conn, $selectie);
	$randd = mysqli_fetch_assoc($tipp);
	$id_mater = $randd["id_materie"];
	if ($clasa == 0 && $sem == 0){
		$cerinta_note = "SELECT * FROM absente WHERE id_materie = $id_mater";
		}
		else if ($clasa == 0 && $sem != 0) {
				$cerinta_note = "SELECT * FROM absente WHERE id_materie = $id_mater AND semestru = $sem";
				}
				else if ($clasa != 0 && $sem == 0) {
					$cerinta_note = "SELECT * FROM absente WHERE id_materie = $id_mater AND clasa = $clasa";
					}
					else {
						$cerinta_note = "SELECT * FROM absente WHERE id_materie = $id_mater AND clasa = $clasa AND semestru = $sem";
					}
	$info = mysqli_query($conn, $cerinta_note);
	$num_randuri = mysqli_num_rows($info);
?>
				<h3>Situatia absentelor:</h3>
				<table id="afisare_note">
					<tr>
						<th>Clasa</th>
						<th>Semestrul</th> 
						<th>Data absentei</th>
						<th>Nr. matricol</th>
						<th>Nume</th>
						<th>Prenume</th>
					</tr>
					<tr>
<?php
	for ($i = 1; $i <= $num_randuri; $i++) {
		$rand = mysqli_fetch_assoc($info);
		?>
						<td>
<?php
		echo $rand["clasa"];
?>
						</td>
						<td>
<?php
		echo $rand["semestru"];
?>
						</td>
						<td>
<?php
		$data = date_create($rand["data_obtinere"]);
		echo date_format($data, 'd m Y');
?>
						</td>
						<td>
<?php
		$id_elev = $rand["id_elev"];
		$out = 0;
		$cerinta_elevi = "SELECT * FROM elevi";
		$elevi = mysqli_query($conn, $cerinta_elevi);
		while ($out == 0 && $linie_elevi = mysqli_fetch_assoc($elevi)) {
			if ($linie_elevi["id_elev"] === $id_elev) {
				$out = 1;
				$elevul = $linie_elevi["nr_matricol"];
				$elev_nume = $linie_elevi["nume"];
				$elev_pren = $linie_elevi["prenume"];
				echo $elevul;
?>
						</td>
						<td>
<?php
				echo $elev_nume;
?>
						</td>
						<td>
<?php
				echo $elev_pren;
				}
			}
?>
						</td>
					</tr>
<?php
		}
?>
				</table>
		</section>
	</body>
</html>
<?php
	mysqli_close($conn);
?>