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
	$matricol = $_SESSION["matricol"];
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$conn = mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	$cerinta = "SELECT id_elev, nr_matricol FROM elevi WHERE nr_matricol = $matricol";
	$tip_id = mysqli_query($conn, $cerinta);
	$rand = mysqli_fetch_assoc($tip_id);
	$id_elev = $rand["id_elev"];
	if ($clasa == 0 && $sem == 0){
		$cerinta_note = "SELECT * FROM absente WHERE id_elev = $id_elev";
		}
		else if ($clasa == 0 && $sem != 0) {
				$cerinta_note = "SELECT * FROM absente WHERE id_elev = $id_elev AND semestru = $sem";
				}
				else if ($clasa != 0 && $sem == 0) {
					$cerinta_note = "SELECT * FROM absente WHERE id_elev = $id_elev AND clasa = $clasa";
					}
					else {
						$cerinta_note = "SELECT * FROM absente WHERE id_elev = $id_elev AND clasa = $clasa AND semestru = $sem";
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
						<th>Materia</th>
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
		$id_materie = $rand["id_materie"];
		$out = 0;
		$cerinta_materii = "SELECT * FROM materii";
		$materiile = mysqli_query($conn, $cerinta_materii);
		while ($out == 0 && $linie_materii = mysqli_fetch_assoc($materiile)) {
			if ($linie_materii["id_materie"] === $id_materie) {
				$out = 1;
				$materia_notei = $linie_materii["nume_materie"];
				echo $materia_notei;
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