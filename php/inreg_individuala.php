<?php
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$conn = mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	$id_elev = $_GET["id_elev"];
	$clasa = $_SESSION["clasa"];
	$materia = $_SESSION["materia"];
	$_SESSION["elev_curent"] = $id_elev;
	$cerinta_materii = "SELECT * FROM materii";
	$materiile = mysqli_query($conn, $cerinta_materii);
	while ($linie_materii = mysqli_fetch_assoc($materiile)) {
		if ($linie_materii["nume_materie"] === $materia) {
			$id_mat = $linie_materii["id_materie"];
			$_SESSION["mat_curenta"] = $id_mat;
			}
		}
	/*$info_elev = "SELECT * FROM note WHERE id_elev = $id_elev AND id_materie = $id_mat";
	$materiile = mysqli_query($conn, $cerinta_materii);*/
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html>
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Editare | Catalog online</title>
			<link rel="stylesheet" type="text/css" href="css_pt_afisare.css">
		</head>
		<body>
			<h3>Inregistrare individuala elev
<?php
	/*echo $_SESSION["elev_curent"];*/echo $id_elev;
?>
												</h3>
			<table id="afisare_note">
				<tr>
					<th>Semestrul</th>
					<th>Nota</th> 
					<th>Data obtinerii</th>
				</tr>
<?php
	/*notele obtinute si existente pana in acest moment*/
	for ($t = 1; $t <= 2; $t++) { 
		$semestru = $t;
		$selectie = "SELECT * FROM note WHERE clasa = $clasa AND id_materie = $id_mat AND semestru = $semestru";
		$elevii = mysqli_query($conn, $selectie);
		$note[0] = 0;
		$i = 1;
		while ($linii_note = mysqli_fetch_assoc($elevii)) {
			if ($linii_note["id_elev"] == $id_elev) {
				$note[$i] = $linii_note["valoare_nota"];
				$i++;
				}
			}
		
		if (count ($note) > 1) {
			for ($j = 1; $j < count($note); $j++) {
?>
					<tr>
						<td>
<?php
			echo $semestru;
?>
						</td>
						<td>
<?php
			echo $note[$j];
			$nota = $note[$j];
?>
						</td>
						<td>
<?php
		$aduce_data = "SELECT * FROM note WHERE semestru = $semestru AND id_materie = $id_mat AND id_elev = $id_elev AND valoare_nota = $nota";
		$data_necesara = mysqli_query($conn, $aduce_data);
		$nr_randuri = mysqli_num_rows($data_necesara);
		$linie = mysqli_fetch_assoc($data_necesara);
		$dataa = date_create($linie["data_obtinere"]);
			echo date_format($dataa, 'd m Y');
?>
						</td>
					</tr>
<?php
				}
			}
			else {
?>
					<tr>
						<td>
<?php
				echo $semestru;
?>
						</td>
						<td>
<?php
				echo "-";
?>
						</td>
						<td>
<?php
				echo "-";				
			
				}
?>
			  			</td>
					</tr>
<?php
		}
?>
			</table>
			<ul id="single_elev">
				<li>
				<form action="conf_inreg_nota.php" method = "POST">
					Sem <input type="number" name="sem" min="1" max="2">
				</li>
				<li>
					Data <input type = "date" name = "data">
				</li>
				<li>
					Nota <input type="number" name="nota" min="1" max="10">
				</li>
				<li>
					<input type = "submit" value = "Salvare">
				</li>
			</ul>
		</body>
	</html>