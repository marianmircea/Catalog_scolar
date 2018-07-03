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
	$elev = $_POST["matricol"];
	$materia = $_SESSION["materia"];
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$conn = mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	$sel_elev = "SELECT * FROM elevi WHERE nr_matricol = '$elev'";
	
	$selectie = "SELECT * FROM materii WHERE nume_materie = '$materia'";
	$tipp = mysqli_query($conn, $selectie);
	$randd = mysqli_fetch_assoc($tipp);
	$id_mater = $randd["id_materie"];
	if ($clasa == 0 && $sem == 0){
		$cerinta_note = "SELECT * FROM note WHERE id_materie = $id_mater";
		}
		else if ($clasa == 0 && $sem != 0) {
				$cerinta_note = "SELECT * FROM note WHERE id_materie = $id_mater AND XXXXXXXXXXXXXXXXXsemestru = $sem";
				}
				else if ($clasa != 0 && $sem == 0) {
					$cerinta_note = "SELECT * FROM note WHERE id_materie = $id_mater AND clasa = $clasa";
					}
					else {
						$cerinta_note = "SELECT * FROM note WHERE id_materie = $id_mater AND clasa = $clasa AND semestru = $sem";
					}
	$info = mysqli_query($conn, $cerinta_note);
	$num_randuri = mysqli_num_rows($info);
	echo "clasa semestru nota data obtinerii____ elev ____ nume ____prenume<br>";
	for ($i = 1; $i <= $num_randuri; $i++) {
		$rand = mysqli_fetch_assoc($info);
		echo $rand["clasa"]."______";
		echo $rand["semestru"]."_____";
		echo $rand["valoare_nota"]."__";
		$data = date_create($rand["data_obtinere"]);
		echo date_format($data, 'd m Y')."_______";
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
				echo $elevul."_____";
				echo $elev_nume."____";
				echo $elev_pren."<br>";
				}
			}
		}
	mysqli_close($conn);
?>
			</section>
		</body>
</html>